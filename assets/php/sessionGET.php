<?php

function singleRequire(){
	require 'config.php';
}

$lastAction = "none";

if(isset($_SESSION['username'])){
	try {
		$DBC = new PDO('mysql:host=' . MYSQL_HOSTNAME . ';dbname=' . MYSQL_DATABASE, MYSQL_USERNAME, MYSQL_PASSWORD);
		$DBC->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$STH = $DBC->query("SELECT last_action FROM " . MYSQL_DTATABLE);
		foreach ($STH as $row) {
			$lastAction = $row['last_action'];
		}
	} 
	catch (PDOException $e) {
		echo "Unable to retrive last action from database: " . $e->getMessage();
	}
}

?>