<?php
function dbConnect($usertype, $connectionType = 'pdo') {
	$host = 'localhost';
	$db = 'site12';
	if ($usertype == 'read') {
		$user = 'student12.site12';
		$pwd = 'red28car';
	} elseif ($usertype == 'write') {
		$user = 'student12.site12';
		$pwd = 'red28car';
	} else {
		exit('Unrecognized user');
	}
	if ($connectionType == 'mysqli') {
		$conn = @ new mysqli($host, $user, $pwd, $db);
		if ($conn->connect_error) {
			exit($conn->connect_error);
		}
		return $conn;
	} else {
		try {
			return new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}