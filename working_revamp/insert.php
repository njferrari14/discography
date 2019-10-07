<?php
ob_start();
try {
include './includes/title.php';
require_once './includes/session_timeout_db.php';
require_once './includes/header.php';

if (isset($_POST['submit'])) {
    // initialize flag
    $OK = false;
    // create database connection
    $conn = dbConnect('write', 'pdo');
    // create SQL
    $sql = 'INSERT INTO albums (album_name, record_label, year_released, album_cover) 
    			VALUES (:title, :label, :year, :image)';
    // prepare the statement
    $stmt = $conn->prepare($sql);
    // bind the parameteres and execute the statement
    $title = safe($_POST['title']);
    $label = safe($_POST['label']);
    $year = safe($_POST['year']);
    $image = safe($_POST['image']);

    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':label', $label, PDO::PARAM_STR);
    $stmt->bindParam(':year', $year, PDO::PARAM_INT);
    $stmt->bindParam(':image', $image, PDO::PARAM_STR);

    // exectue
    $stmt->execute();

    // get album id from inserted album
    $a_id = $conn->lastInsertId();

    // convert string of tracks into array
    $tnames = explode(",", safe($_POST['tracks']));
    $numTracks = count($tnames);
    
    // insert multiple rows of tracks into tracks table
    $sql3 = 'INSERT INTO tracks (album_id, album_name, name) 
    		 	VALUES (:a_id, :a_name, :t_name)';
	$stmt3 = $conn->prepare($sql3);
	$stmt3->bindParam(':a_id', $a_id, PDO::PARAM_INT);
	$stmt3->bindParam(':a_name', $title, PDO::PARAM_STR);

	try {
	    $conn->beginTransaction();
	    $i = 0;
	    while ($i < $numTracks)
	    {
	    	$tname = $tnames[$i];
	    	$stmt3->bindParam(':t_name', $tname, PDO::PARAM_STR);
	        $stmt3->execute();
	        $i++;
	    }
	    $conn->commit();
	} catch (Exception $e){
	    $conn->rollback();
	    throw $e;
	}
    $url = 'http://localhost/working_revamp/admin.php';
    if ($trans_error) {
        $url .= "?trans_error=$trans_error";
    }
    header("Location: $url");
}

?>
<body>
<?php
require_once './includes/menu.php';
?>
<div class="container mt-5" style="background: #C9BF67;padding-top:15px; padding-bottom:15px;">
    <div class="row">
        <div class="col-12">    
            <div class="col bg-danger text-white" style="padding-top: 15px; padding-left:25px; padding-bottom: 10px;">
                <h1>Insert New Album</h1>
                <form method="post" action="insert.php" enctype="multipart/form-data">
                    <p class="form-group col">
                        <label for="title">Title:</label>
                        <input class="form-control" name="title" type="text" id="title" value="<?php
                        	if (isset($error)) {
                            	echo safe($_POST['title']);
                        	} 
                        	?>">
                    </p>
                    <p class="form-group col">
                        <label for="label">Record Label:</label>
                        <input class="form-control" name="label" type="text" id="label" value="<?php
                        	if (isset($error)) {
                            	echo safe($_POST['label']);
                        	} 
                        	?>">
                    </p>
                    <p class="form-group col">
                        <label for="year">Year Released:</label>
                        <input class="form-control" name="year" type="text" id="year" value="<?php
                        	if (isset($error)) {
                            	echo safe($_POST['year']);
                        	} 
                        	?>">
                    </p>
                    <p class="form-group col">
                        <label for="image">Name of Image File:</label>
                        <input class="form-control" name="image" type="text" id="image" value="<?php
                        	if (isset($error)) {
                            	echo safe($_POST['image']);
                        	} 
                        	?>">
                    </p>
                    <p class="form-group col">
                        <label for="tracks">Track Names (separated by commas):</label>
                        <textarea class="form-control" name="tracks" type="text" id="tracks" value="<?php
                        	if (isset($error)) {
                            	echo safe($_POST['tracks']);
                        	} 
                        	?>"></textarea>
                    </p>
                    <p class="form-group col">
                        <input type="submit" name="submit" value="Insert Album">
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php } catch (Exception $e) {
    ob_end_clean();
    header('Location: http://localhost/working_revamp/thanks.php');
}
ob_end_flush();
?>