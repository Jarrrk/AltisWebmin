<?php 

require '../../assets/php/adminCheck.php';
require '../../assets/php/homeInit.php';

$playerName = "Invalid User";

if(!(isset($_SESSION['username']))){header('Location: ../');}

if((isset($_GET['player'])) && (!empty($_GET['player']))){
	$initialPID = $_GET['player'];
	retrieveListing($initialPID);
}
else {
	header('Location: ../');
}

function retrieveListing($PID){
	try {
		$DBC = new PDO('mysql:host=' . MYSQL_HOSTNAME . ';dbname=' . MYSQL_DATABASE, MYSQL_USERNAME, MYSQL_PASSWORD);
		$DBC->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$STH = $DBC->query('SELECT * FROM ' . MYSQL_PLAYERSTABLE . " WHERE `playerid`=$PID");
		foreach ($STH as $selection) {
			if(!empty($selection['name'])){
				$GLOBALS['playerName'] = $selection['name'];
			}
			else {
				header('Location: ./');
			}
		}
	} 
	catch (PDOException $e) {
		echo "Unable to retrive players from DB: " . $e->getMessage();
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Altis Life Panel: Edit Players</title>
		<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="../../assets/css/base.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="../../assets/js/bootstrap.min.js"></script>
		<script src="../../assets/js/livePull.js"></script>
		<style type="text/css">
			.input-group {
				margin-bottom: 15px;
			}
		</style>
	</head>

	<body>
		<div class="content-header">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  				<div class="container-fluid">
  					<?php 
  						if($sessionType){
							echo "<p class='navbar-text navbar-right'>Signed in as <a href='profile/?u=" . $_SESSION['username'] . "' class='navbar-link capitalize-text'>" . $_SESSION['username'] .  "</a>, <a href='../assets/php/sessionLogout.php'>logout</a>?</p>";
  						}
  					?>
      				<div class="navbar-header">
      			    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-7">
      			      		<span class="sr-only">Toggle navigation</span>
      			      		<span class="icon-bar"></span>
      			      		<span class="icon-bar"></span>
      			      		<span class="icon-bar"></span>
      			    	</button>
      			    	<a class="navbar-brand" href="#">Altis Life Admin</a>
      			  	</div>
			
      			  	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-7">
      			    	<ul class="nav navbar-nav">
      			      		<li><a href="../../"><img class="nav-icon" src="../../assets/img/001.png"/>Home</a></li>
      			      		<?php
      			      		if($sessionType){
      			      			echo "<li class='active'><a href='#'><img class='nav-icon' src='../../assets/img/002.png'/>Players</a></li><li><a href='../../vehicles/''><img class='nav-icon' src='../../assets/img/003.png'/>Vehicles</a></li>";
      			      			if($adminRank == 1){
      			      				echo "<li><a href='../../admin/'><img class='nav-icon' src='../../assets/img/004.png'/>Manage Admins</a></li>";
      			      			}
      			      		}
      			      		?>
      			    	</ul>
      			  	</div>
      			</div>
			</nav>
		</div>

		<div class="content-main">
			<div class="admin-panel fadeDown" style="min-width: 840px;"> 
				<div class="panel-title">
					<h1><u>Editing Player: <?php echo $playerName; ?></u></h1>
					<p>No previous edits have been made to <?php echo $playerName; ?></p>
				</div>
				<div class="panel-content">
					<form role="form" action="submitInfo.php" method="POST">
						<label for="inputCashHelper">Cash (in players inventory)</label>
						<div class="input-group">
  							<span class="input-group-addon">$</span>
  							<input id="inputCash" autocomplete="off" type="text" class="form-control" value="10000" placeholder="Amount of cash the player has in their hand">
  							<span class="input-group-addon">.00</span>
						</div>
						<label for="inputCashHelper">Bank Account</label>
						<div class="input-group">
  							<span class="input-group-addon">$</span>
  							<input id="inputBank" autocomplete="off" type="text" class="form-control" value="10000" placeholder="Amount of cash the player has in their bank">
  							<span class="input-group-addon">.00</span>
						</div>
  						<div class="form-group">
  						  	<label for="inputLicenseHelper">Civillian Licenses</label>
  						  	<input type="text" autocomplete="off" class="form-control" id="inputCivl" value="" placeholder="Add or remove if a player has or hasn't got a certain civillian license">
  						</div>
  						<div class="form-group">
  						  	<label for="inputCopLicenseHelper">Cop Licenses</label>
  						  	<input type="text" autocomplete="off" class="form-control" id="inputCopl" value="" placeholder="Add or remove if a player has or hasn't got a certain cop license">
  						</div>

						<a href="../"><button id="cancelButton" value="cancel" class="btn btn-default">Cancel</button></a>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
				</div>
			</div>
		</div>

		<div class="content-footer">
            <div class="footer-center">
                <h3>Created by <a href="http://jarrrk.com">Jarrrk</a></h3>
            </div>
		</div>
	</body>
</html>