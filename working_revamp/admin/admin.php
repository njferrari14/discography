<?php 
require_once './includes/session_timeout_db.php';
require_once './includes/utility_funcs.php';
require_once './includes/connection.php';
ob_start();
try {
include './includes/title.php';

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
}

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Page</title>
</head>
<body>

<h1>Insert New Album</h1>
<form method="post" action="admin.php" enctype="multipart/form-data">
	<p>
		<label for="title">Title:</label>
		<input name="title" type="text" id="title" value="<?php
			if (isset($error)) {
            	echo safe($_POST['title']);
        	} 
        	?>">
    </p>
	<p>
		<label for="label">Record Label:</label>
		<input name="label" type="text" id="label" value="<?php
			if (isset($error)) {
            	echo safe($_POST['label']);
        	} 
        	?>">
    </p>
	<p>
		<label for="year">Year Released:</label>
		<input name="year" type="text" id="year" value="<?php
			if (isset($error)) {
            	echo safe($_POST['year']);
        	} 
        	?>">
    </p>
	<p>
		<label for="image">Name of Image File:</label>
		<input name="image" type="text" id="image" value="<?php
			if (isset($error)) {
            	echo safe($_POST['image']);
        	} 
        	?>">
    </p>
	<p>
		<label for="tracks">Track Names (separated by commas):</label>
		<textarea name="tracks" type="text" id="tracks" value="<?php
			if (isset($error)) {
            	echo safe($_POST['tracks']);
        	} 
        	?>"></textarea>
    </p>
    <p>
    	<input type="submit" name="submit" value="Insert Album">
    </p>

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