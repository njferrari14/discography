<?php ob_start();
try {
include './includes/title.php';
require_once './includes/header.php';
require_once './includes/session_timeout_db.php';


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
<h1>Manage Albums</h1>
<p><a href="insert.php">Insert new entry</a></p>
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
<table>
    <tr>
        <th>Created</th>
        <th>Title</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    <?php while ($row = $result->fetch()) { ?>
    <tr>
        <td><?= $row['album_id']; ?></td>
        <td><?= $row['album_name']; ?></td>
        <td><?= $row['record_label']; ?></td>
        <td><?= $row['year_released']; ?></td>
        <td><a href="album_update_pdo.php?article_id=<?= $row['album_id']; ?>">EDIT</a></td>
        <td><a href="album_delete_pdo.php?article_id=<?= $row['album_id']; ?>">DELETE</a></td>
    </tr>
    <?php } ?>
</table>
<?php } ?>
</body>
</html>
<?php } catch (Exception $e) {
    ob_end_clean();
    header('Location: http://localhost/phpsols-4e/error.php');
}
ob_end_flush();
?>