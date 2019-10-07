 <nav class="navbar sticky-top navbar-dark bg-danger">
  <a class="navbar-brand" href="index.php">Band</a>
  <a class="navbar-brand" href="music.php">Music</a>
  <a class="navbar-brand" href="fun.php">Fun Facts</a>
  <a class="navbar-brand" href="cite.php">Cite Info</a>
  <a class="navbar-brand" href="admin.php">Admin</a>
</nav>

<?php
if (basename($_SERVER['PHP_SELF']) == 'admin.php' || basename($_SERVER['PHP_SELF']) == 'delete.php' || basename($_SERVER['PHP_SELF']) == 'update.php' || basename($_SERVER['PHP_SELF']) == 'insert.php' || basename($_SERVER['PHP_SELF']) == 'update_tracks.php') {
    require_once './includes/logout.php';
}
?>