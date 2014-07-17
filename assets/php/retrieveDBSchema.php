<?php

require 'config.php';

session_start();

if(isset($_SESSION['username'])){
	try {
		$DBC = new PDO('mysql:host=' . MYSQL_HOSTNAME . ';dbname=' . MYSQL_DATABASE, MYSQL_USERNAME, MYSQL_PASSWORD);
		$DBC->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$STH = $DBC->query('SELECT * FROM ' . MYSQL_PLAYERSTABLE);
		foreach ($STH as $selection) {
			echo "<tr>";
			echo '    <td>' . $selection['uid'] . '</td>';
			echo '    <td>' . $selection['name'] . '</td>';
			echo '    <td>' . $selection['playerid'] . '</td>';
			echo '    <td>$' . number_format($selection['cash']) . '</td>';
			echo '    <td>$' . number_format($selection['bankacc']) . '</td>';
			echo '    <td>' . $selection['arrested'] . '</td>';
			echo '    <td>' . $selection['aliases'] . '</td>';
			echo "    <td><a href='edit/?player=". $selection['playerid'] ."'><button style='width: 70px; font-size: 16px; padding: 0; padding-left:0px; padding-right: 1px;' class='btn btn-lg btn-primary btn-block'>Edit</button></a></td>";
			echo "</tr>";
		}
	} 
	catch (PDOException $e) {
		echo "Unable to retrive players from DB: " . $e->getMessage();
	}
}

?>