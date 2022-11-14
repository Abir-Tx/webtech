<?php
function db_conn()
{
	$servername = "localhost";
	$username = "abir";
	$password = "12918";
	$dbname = "lab5";

	try {
		$conn = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname . ';charset=utf8', $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	return $conn;
}
