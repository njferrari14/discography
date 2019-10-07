<?php
require_once './includes/connection.php';
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

	// convert string of tracks into array
	$tnames = explode(",", safe($_POST['tracks']));
	$numTracks = count($tnames);

	// perform an update for each track
	$sql3 = 'UPDATE tracks SET name = :t_name
	    	WHERE album_id = :album_id';
	$stmt3 = $conn->prepare($sql3);
	$stmt3->bindParam(':album_id', $album_id, PDO::PARAM_STR);
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

require_once './includes/header.php';
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
                <form method="post" action="update.php" enctype="multipart/form-data">
                    <p class="form-group col">
                        <label for="tracks">Track Names (separated by commas):</label>
                        <textarea class="form-control" name="tracks" type="text" id="tracks" value="<?php
                        	if (isset($error)) {
                            	echo safe($_POST['tracks']);
                        	} 
                        	?>"></textarea>
                        <input name="album_id" type="hidden" value="<?= $album_id ?>">
                    </p>
                    <p class="form-group col">
                        <input type="submit" name="update" value="Update Tracks">
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col">
    <p>
        <h5 class="text-center"><a href="admin.php">&laquo; Back to list</a></h5>
        <h5 class="text-center">OR</h5>
        <h5 class="text-center"><a href="update_tracks.php?album_id=<?= $album_id; ?>">Edit Tracks &raquo;</a></h5>
    </p>
</div>
<?php } ?>