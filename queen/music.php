<?php ob_start();
try {
include './includes/title.php';
 ?>
<!--header-->
<?php
$file = './includes/header.php';
if (file_exists($file) && is_readable($file)) {
     require $file;
} else {
     throw new Exception("$file can't be found");
}
// establish connection and build SQL
$conn = dbConnect('read', 'pdo');
$sql = 'SELECT a.*, GROUP_CONCAT(t.name) as track_name 
        FROM albums AS a LEFT JOIN tracks AS t 
        ON a.album_id = t.album_id GROUP BY a.album_id';
?>

<body>
<!--navigation-->
<?php
$file = './includes/menu.php';
if (file_exists($file) && is_readable($file)) {
     require $file;
} else {
     throw new Exception("$file can't be found");
}
?>

<div class="container">
    <div class="row">
    <?php 
    // loop through albums
    foreach ($conn->query($sql) as $row) { ?>
        <div class="col-6">
            <img src="./images/<?= $row['album_cover']?>" alt="Card image cap" style="width:100%;">
            <!--shadow-->
            <div class="shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-body" style="padding-left:10px;">
                    <h4 class="card-title"><?= $row['album_name'] ?></h4>
                    <b><?= print_r($row['album_name'] . ' (' . $row['record_label'] . ') (' . $row['year_released'] . ')', true); ?><br><br></b>
                    <ul class="list-group list-group-flush">
                    <?php
                    // get tracks from long string
                    $tracks = explode(",", $row['track_name']);
                    $numTracks = count($tracks);
                    $i = 0;
                    // loop through tracks
                    while ($i < $numTracks) { ?>
                        <li class="list-group-item"><?php echo $tracks[$i]; $i++; ?></li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>


<!--feedback form-->
<?php
$file = './includes/form.php';
if (file_exists($file) && is_readable($file)) {
     require $file;
} else {
     throw new Exception("$file can't be found");
}
?>

<script src="js/jquery.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php } catch (Exception $e) {
    ob_end_clean();
    header('Location: http://site12.wdd.francistuttle.edu/projects/queen/error.php');
}
ob_end_flush();
?>