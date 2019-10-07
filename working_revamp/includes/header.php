<?php
require_once './includes/utility_funcs.php';
require_once './includes/connection.php';
if (basename($_SERVER['PHP_SELF']) !== 'admin.php' && basename($_SERVER['PHP_SELF']) !== 'login.php' && basename($_SERVER['PHP_SELF']) !== 'delete.php' && basename($_SERVER['PHP_SELF']) !== 'update.php' && basename($_SERVER['PHP_SELF']) !== 'insert.php') {
    require_once './includes/form_insert.php';
}
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Queen <?= $title ?? '' ?></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Peralta" rel="stylesheet">
</head>