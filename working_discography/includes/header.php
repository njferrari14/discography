<?php
if (isset($_POST['insert'])) {
    require_once '../includes/connection.php';
    // initialize flag
    $OK = false;
    // create database connection
    $conn = dbConnect('write', 'pdo');
    // create SQL
    $sql = 'INSERT INTO blog (title, article)
            VALUES(:title, :article)';
    // prepare the statement
    $stmt = $conn->prepare($sql);
    // bind the parameteres and execute the statement
    $stmt->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
    $stmt->bindParam(':article', $_POST['article'], PDO::PARAM_STR);
    // exectue and get number of affected rows
    $stmt->execute();
    $OK = $stmt->rowCount();
    // redirect if successful or display error
    if ($OK) {
        header('Location: http://localhost/phpsols-4e/admin/blog_list_pdo.php');
        exit;
    } else {
        $error = $stmt->errorInfo()[2];
    }
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