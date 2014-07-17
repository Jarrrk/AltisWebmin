<?php

require 'config.php';

session_start();

$adminRank = 0;

if(isset($_SESSION['username'])){
	try {
		$DBC = new PDO('mysql:host=' . MYSQL_HOSTNAME . ';dbname=' . MYSQL_DATABASE, MYSQL_USERNAME, MYSQL_PASSWORD);
		$DBC->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$STH = $DBC->query("SELECT rank FROM " . MYSQL_ADMTABLE . " WHERE username='" . $_SESSION['username'] . "'");
		foreach ($STH as $row) {
			$adminRank = $row['rank'];
		}
	} 
	catch (PDOException $e) {
		echo "Unable to retrive user rank from database: " . $e->getMessage();
	}
}

?>