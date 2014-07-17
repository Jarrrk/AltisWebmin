<?php

session_start();

require 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

$username = stripslashes($username);
$password = stripslashes(md5($password));

try {
	$DBC = new PDO('mysql:host=' . MYSQL_HOSTNAME . ';dbname=' . MYSQL_DATABASE, MYSQL_USERNAME, MYSQL_PASSWORD);
	$DBC->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$STH = $DBC->query("SELECT count(*) FROM " . MYSQL_ADMTABLE . " WHERE username='$username' AND password='$password'");

	$rowCount = $STH->fetchColumn();

	if($rowCount == 1){
		$_SESSION['username'] = $username;
    	header('Location: ../../');
	}
	else {
		header('Location: ../../?state=' . rand(1000, 9000));
	}

} 
catch (PDOException $e) {
	echo "Unable to retrive user rank from database: " . $e->getMessage();
}

?>