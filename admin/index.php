<?php 

require '../assets/php/adminCheck.php'; 
require '../assets/php/homeInit.php';

if(!(isset($_SESSION['username']))){header('Location: ../');} 
if($adminRank != 1){header('Location: ../');}


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Altis Life Panel: Admin</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/base.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="../assets/js/bootstrap.min.js"></script>
	</head>

	<body>
		<div class="content-header">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  				<div class="container-fluid">
  					<?php 
  						if($sessionType){
							echo "<p class='navbar-text navbar-right'>Signed in as <a href='profile/?u=" . $_SESSION['username'] . "' class='navbar-link capitalize-text'>" . $_SESSION['username'] .  "</a>, <a href='../assets/php/sessionLogout.php'>logout</a>?</p>";
  						}
  						else {
  							echo "<p class='navbar-text navbar-right'>Currently not signed in</a></p>";
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
      			      		<li><a href="../"><img class="nav-icon" src="../assets/img/001.png"/>Home</a></li>
      			      		<?php
      			      		if($sessionType){
      			      			echo "<li><a href='../players/'><img class='nav-icon' src='../assets/img/002.png'/>Players</a></li><li><a href='../vehicles/''><img class='nav-icon' src='../assets/img/003.png'/>Vehicles</a></li>";
      			      			if($adminRank == 1){
      			      				echo "<li class='active'><a href='#'><img class='nav-icon' src='../assets/img/004.png'/>Manage Admins</a></li>";
      			      			}
      			      		}
      			      		?>
      			    	</ul>
      			  	</div>
      			</div>
			</nav>
		</div>

		<div class="content-main">
			<div class="admin-panel fadeDown"> 
				<div class="panel-title">
					<h1><u>Admin Area</u></h1>
					<p>Create and manage panel accounts</p>
				</div>
				<div class="panel-content">
					
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