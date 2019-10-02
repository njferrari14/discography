<?php ob_start();
try {
include './includes/title.php'; ?>

<!--header-->
<?php
$file = './includes/header.php';
if (file_exists($file) && is_readable($file)) {
     require $file;
} else {
     throw new Exception("$file can't be found");
}
?>
<!--Navigation-->
<?php
$file = './includes/menu.php';
if (file_exists($file) && is_readable($file)) {
     require $file;
} else {
     throw new Exception("$file can't be found");
}
?>

<body>
	<div class="container-fluid text-center .h1 .mt-4">
		<h1>Thank you for joining the fan club!</h1>

	</div>
</body>
</html>

<?php } catch (Exception $e) {
    ob_end_clean();
    header('Location: http://localhost/phpsols-4e/error.php');
}
ob_end_flush();
?>