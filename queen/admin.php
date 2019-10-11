<?php ob_start();
try {
include './includes/title.php';
require_once './includes/header.php';

// create database connection
$conn = dbConnect('read', 'pdo');
$sql = 'SELECT * FROM albums ORDER BY album_id';
$result = $conn->query($sql);
$error = $conn->errorInfo()[2];
?>


<body>

<?php
require_once './includes/menu.php';
?>

<h1 class="text-center">Welcome, <?= $_SESSION['username'] ?>!</h1>

<div class="container queen-container qc-lg">
    <div class="row">
        <div class="col-12">    
            <div class="col bg-danger text-white qc-sm">
                <div class="row">
                    <h1 class="col-12 text-center">Manage Albums</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (isset($error)) {
    echo "<p>$error</p>";
} else {
    if (isset($_GET['updated'])) {
        echo '<p>Record updated</p>';
    } elseif (isset($_GET['trans_error'])) {
        echo "Can't update record because of the following error: ";
        echo htmlentities($_GET['trans_error']) . '</p>';
    }
?>

<div class="container queen-container">
    <div class="row">
        <div class="col-12">    
            <table class="table table-hover table-striped table-dark">
                <tr>
                    <th class="text-center">Title</th>
                    <th class="text-center">Record Label</th>
                    <th class="text-center">Year Released</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <?php while ($row = $result->fetch()) { ?>
                <tr>
                    <td class="text-center"><?= $row['album_name']; ?></td>
                    <td class="text-center"><?= $row['record_label']; ?></td>
                    <td class="text-center"><?= $row['year_released']; ?></td>
                    <td><a class="linq" href="update.php?album_id=<?= $row['album_id']; ?>">EDIT</a></td>
                    <td><a class="linq" href="delete.php?album_id=<?= $row['album_id']; ?>">DELETE</a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<div class="container text-right">
    <h5><a class="linq" href="insert.php">Insert New Album</a></h5>
</div>

<?php } ?>

</body>
</html>

<?php } catch (Exception $e) {
    ob_end_clean();
    header('Location: http://site12.wdd.francistuttle.edu/projects/queen/error.php');
}
ob_end_flush();
?>