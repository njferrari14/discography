<?php
require_once './includes/header.php';
require_once './includes/utility_funcs.php';
// initialize flags
$OK = false;
$done = false;
$trans_error = false;
// create database connection
$conn = dbConnect('write', 'pdo');
// get details of selected record
if (isset($_GET['album_id']) && !$_POST) {
    // prepare SQL query
    $sql = 'SELECT track_id, album_id, album_name, name FROM tracks
            WHERE album_id = ?';
    $stmt = $conn->prepare($sql);
    // pass the placeholder value to execute() as a single-element array
    $OK = $stmt->execute([$_GET['album_id']]);
    // bind the results
    $stmt->bindColumn(1, $track_id);
    $stmt->bindColumn(2, $album_id);
    $stmt->bindColumn(3, $album_name);
    $stmt->bindColumn(4, $name);
    $stmt->fetch();
}
// if form has been submitted, update record
if (isset($_POST['update'])) {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $album_id = $_POST['album_id'];
    $album_name = $_POST['album_name'];
    // delete old tracks
    $sql2 = 'DELETE FROM tracks WHERE album_id = :album_id';
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bindParam(':album_id', $album_id, PDO::PARAM_INT);
    $stmt2->execute();

	// convert string of new tracks into array
	$tnames = explode(",", safe($_POST['tracks']));
	$numTracks = count($tnames);
	$sql3 = 'INSERT INTO tracks (album_id, album_name, name) 
    		 	VALUES (:a_id, :a_name, :t_name)';
	$stmt3 = $conn->prepare($sql3);
	$stmt3->bindParam(':a_id', $album_id, PDO::PARAM_INT);
	$stmt3->bindParam(':a_name', $album_name, PDO::PARAM_STR);

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
    $url = 'http://site12.wdd.francistuttle.edu/projects/queen/admin.php';
    if ($trans_error) {
        $url .= "?trans_error=$trans_error";
    }
    header("Location: $url");
}

?>
<body>
<?php
require_once './includes/menu.php';
if($album_id == 0) { ?>
    <p class="warning">Invalid request: record does not exist.</p>
<?php } else { ?>
<div class="container mt-5 col-6" style="background: #C9BF67; padding-top:15px; padding-bottom: 15px;">
    <div class="row">
        <div class="col-12">    
            <div class="col bg-danger text-white" style="padding-top: 15px; padding-left:25px; padding-bottom: 10px;">
                <h1 class="text-center">Update Tracks For "<?= $album_name ?>":</h1>
                <form method="post" action="update_tracks.php" enctype="multipart/form-data">
                    <p class="form-group col">
                        <label for="tracks">Enter Track Names (separated by commas):</label>
                        <textarea class="form-control" name="tracks" type="text" id="tracks" value="<?php
                        	if (isset($error)) {
                            	echo safe($_POST['tracks']);
                        	} 
                        	?>"></textarea>
                        <input name="album_id" type="hidden" value="<?= $album_id ?>">
                        <input name="album_name" type="hidden" value="<?= $album_name ?>">
                    </p>
                    <p class=" text-center form-group col">
                        <input type="submit" name="update" id="update" value="Update Tracks">
                        <p class="text-center">Warning! <br>This will delete all existing tracks associated with this album and insert the new values</p>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col">
    <p>
        <h5 class="text-center"><a href="admin.php">&laquo; Back to Album List</a></h5>
    </p>
</div>
<?php } ?>