<?php
require_once './includes/connection.php';
require_once './includes/utility_funcs.php';
// create database connection
$conn = dbConnect('write', 'pdo');
// initialize flags
$OK = false;
$deleted = false;
// get details of selected record
if (isset($_GET['album_id']) && !$_POST) {
    // prepare SQL query
    $sql = 'SELECT album_id, album_name, record_label, year_released, album_cover FROM albums WHERE album_id = ?';
    $stmt = $conn->prepare($sql);
    // pass the placeholder value to execute() as a single-element array
    $OK = $stmt->execute([$_GET['album_id']]);
    // assign result array to variables
    $stmt->bindColumn(1, $album_id);
    $stmt->bindColumn(2, $album_name);
    $stmt->bindColumn(3, $record_label);
    $stmt->bindColumn(4, $year_released);
    $stmt->bindColumn(5, $album_cover);
    // fetch the result
    $stmt->fetch();
    $error = $stmt->errorInfo()[2];
}
// if confirm deletion button has been clicked, delete record
if (isset($_POST['delete'])) {
    $sql = 'DELETE FROM albums WHERE album_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_POST['album_id']]);
    // get number of affected rows
    $deleted = $stmt->rowCount();
    if (!$deleted) {
        $error = 'There was a problem deleting the record. ';
        $error .= $stmt->errorInfo()[2];
    }
    $sql2 = 'DELETE FROM tracks WHERE album_id = ?';
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute([$_POST['album_id']]);
    // get number of affected rows
    $deleted = $stmt2->rowCount();
    if (!$deleted) {
        $error = 'There was a problem deleting the record. ';
        $error .= $stmt2->errorInfo()[2];
    }
}
// redirect the page if deleted, cancel button clicked, or $_GET['article_id'] not defined
if ($deleted || isset($_POST['cancel_delete']) || !isset($_GET['album_id']))  {
    header('Location: http://localhost/working_revamp/admin.php');
    exit;
}

require_once './includes/header.php';
?>

<style>
    input:hover {
        background: red;
    }
</style>
<body>
<?php
require_once './includes/menu.php';
?>
<div class="container text-center mt-5 mb-5">
    <h1 class="">Delete Album</h1>
</div>
<?php
if (isset($error)) {
    echo "<p class='warning'>Error: $error</p>";
} elseif (isset($album_id) && $album_id == 0) { ?>
    <p class="">Invalid request: record does not exist.</p>
<?php } else { ?>
    <div class="container">
        <div class="container text-danger text-center">
            <h4 class="mb-5">Please confirm that you want to delete the following item. <br>This action cannot be undone.</h4>
        </div>
        <div class="container text-center">
            <h2 class=""><?= safe($album_name) . ' (' . safe($record_label) . ') ' . safe($year_released); ?></h2>
        </div>
    </div>
<?php } ?>
<div class="container text-center mt-5">
    <form method="post" action="delete.php">
        <p>
            <input class="mr-5" name="cancel_delete" type="submit" value="Cancel">
            <?php if (isset($album_id) && $album_id > 0) { ?>
                <input name="album_id" type="hidden" value="<?= $album_id; ?>">
            <?php } ?>
            <?php if (isset($album_id) && $album_id > 0) { ?>
                <input type="submit" name="delete" value="Confirm Deletion">
            <?php } ?>
        </p>
    </form>
</div>
</body>
</html>
