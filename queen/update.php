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
    $sql = 'SELECT album_id, album_name, record_label, year_released, album_cover FROM albums
            WHERE album_id = ?';
    $stmt = $conn->prepare($sql);
    // pass the placeholder value to execute() as a single-element array
    $OK = $stmt->execute([$_GET['album_id']]);
    // bind the results
    $stmt->bindColumn(1, $album_id);
    $stmt->bindColumn(2, $album_name);
    $stmt->bindColumn(3, $record_label);
    $stmt->bindColumn(4, $year_released);
    $stmt->bindColumn(5, $album_cover);
    $stmt->fetch();
}
// if form has been submitted, update record
if (isset($_POST['update'])) {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
        $conn->beginTransaction();
        // prepare update query
        $sql = 'UPDATE albums SET album_name = ?, record_label = ?, year_released = ?, album_cover = ?
                WHERE album_id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $_POST['album_name'], PDO::PARAM_STR);
        $stmt->bindParam(2, $_POST['record_label'], PDO::PARAM_STR);
        $stmt->bindParam(3, $_POST['year_released'], PDO::PARAM_INT);
        $stmt->bindParam(4, $_POST['album_cover'], PDO::PARAM_STR);
        $stmt->bindParam(5, $_POST['album_id'], PDO::PARAM_INT);
        // execute query
        $stmt->execute();
        $done = $conn->commit();
    } catch (Exception $e) {
        $conn->rollBack();
        $trans_error = $e->getMessage();
    }
}
// redirect page after updating or if $_GET['article_id'] not defined
if (($done ||  $trans_error)||(!$_POST && !isset($_GET['album_id']))) {
    $url = 'http://site12.wdd.francistuttle.edu/projects/queen/admin.php';
    if ($trans_error) {
        $url .= "?trans_error=$trans_error";
    }
    header("Location: $url");
    exit;
}
if (isset($stmt)) {
    // get error message (will be null if no error)
    $error = $stmt->errorInfo()[2];
}
?>

<body>
<?php
require_once './includes/menu.php';

if (isset($error)) {
    echo "<p class='warning'>Error: $error</p>";
}
if($album_id == 0) { ?>
    <p class="warning">Invalid request: record does not exist.</p>
<?php } else { ?>
<div class="container mt-5 col-6 queen-container qc-lg-update">
    <div class="row">
        <div class="col-12">    
            <div class="col bg-danger text-white qc-sm">
                <h1 class="text-center">Update Album: "<?= $album_name ?>"</h1>
                <form method="post" action="update.php" enctype="multipart/form-data">
                    <p class="form-group col">
                        <label for="album_name">Title (<?= $album_name ?>):</label>
                        <input class="form-control" name="album_name" type="text" id="album_name" value="<?php
                            if (isset($error)) {
                                echo safe($_POST['album_name']);
                            } 
                            ?>">
                    </p>
                    <p class="form-group col">
                        <label for="record_label">Record Label (<?= $record_label ?>):</label>
                        <input class="form-control" name="record_label" type="text" id="record_label" value="<?php
                            if (isset($error)) {
                                echo safe($_POST['record_label']);
                            } 
                            ?>">
                    </p>
                    <p class="form-group col">
                        <label for="year_released">Year Released (<?= $year_released ?>):</label>
                        <input class="form-control" name="year_released" type="text" id="year_released" value="<?php
                            if (isset($error)) {
                                echo safe($_POST['year_released']);
                            } 
                            ?>">
                    </p>
                    <p class="form-group col">
                        <input name="album_id" type="hidden" value="<?= $album_id ?>">
                        <label for="album_cover">Name of Cover Image File (<?= $album_cover ?>):</label>
                        <input class="form-control" name="album_cover" type="text" id="album_cover" value="<?php
                            if (isset($error)) {
                                echo safe($_POST['album_cover']);
                            } 
                            ?>">
                    </p>
                    <p class="form-group col">
                        <input type="submit" name="update" value="Update Album">
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
</body>
</html>