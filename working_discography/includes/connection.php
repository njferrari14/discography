<?php
function dbConnect($usertype, $connectionType = 'pdo') {
	$host = 'localhost';
	$db = 'queen';
	if ($usertype == 'read') {
		$user = 'qread';
		$pwd = 'ya$$queeN72?';
	} elseif ($usertype == 'write') {
		$user = 'qwrite';
		$pwd = 'ya$$queeN72?';
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