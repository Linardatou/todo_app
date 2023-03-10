<?php
include "../config/config.php";
 
$dsn = "mysql:host=$hostname;dbname=$dbname;charset=UTF8";
//create connection
try {
	$pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
	echo $e->getMessage();
}
//this code connects to the server
?>
