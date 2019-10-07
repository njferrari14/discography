<?php
// run this script only if the logout button has been clicked
if (isset($_POST['logout'])) {
	// empty the $_SESSION array
	$_SESSION = array();
	// invalidate the session cookie
	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time()-86400, '/');
	}
	// end session and redirect
	session_destroy();

	header('Location: http://site12.wdd.francistuttle.edu/projects/queen/login.php');
	exit;
}
?>
<form class="text-right" method="post">
	<input class="btn btn-dark mr-3 mt-1" name="logout" type="submit" value="Log out">
</form>