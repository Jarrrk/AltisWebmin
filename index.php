<?php require 'assets/php/adminCheck.php'; require 'assets/php/homeInit.php'; require 'assets/php/sessionGET.php'; catchFunction(); ?>

<!DOCTYPE html>
<html lang="EN">
	<head>
		<title><?php echo $pageTitle; ?></title>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/base.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<meta charset="UTF-8">
	</head>

	<body>
		<div class="content-header">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  				<div class="container-fluid">
  					<?php 
  						if($sessionType){
							echo "<p class='navbar-text navbar-right'>Signed in as <a href='profile/?u=" . $_SESSION['username'] . "' class='navbar-link capitalize-text'>" . $_SESSION['username'] .  "</a>, <a href='assets/php/sessionLogout.php'>logout</a>?</p>";
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
      			      		<li class="active"><a href="#"><img class="nav-icon" alt="Home" src="assets/img/001.png"/>Home</a></li>
      			      		<?php
      			      		if($sessionType){
      			      			echo "<li><a href='players/'><img class='nav-icon' alt='Players' src='assets/img/002.png'/>Players</a></li><li><a href='vehicles/''><img class='nav-icon' alt='Vehicles' src='assets/img/003.png'/>Vehicles</a></li>";
      			      			if($adminRank == 1){
      			      				echo "<li><a href='admin/'><img class='nav-icon' alt='Manage Admins' src='assets/img/004.png'/>Manage Admins</a></li>";
      			      			}
      			      		}
      			      		?>
      			    	</ul>
      			  	</div>
      			</div>
			</nav>
		</div>

		<div class="content-main">
			<div class="login-form fadeDown" style='<?php if($sessionType){echo "display: none";} else {echo "display: block";} ?>'>
				<form id="login-form-parse" method="post" action="assets/php/sessionLogin.php" class="form-signin" role="form" name="login-form">
    				<h2 class="form-signin-heading">Login</h2>
    				<input type="text" class="form-control" name="username" id="username" placeholder="Username" required autofocus>
    				<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
    				<button class="btn btn-lg btn-primary btn-block" type="submit" value="login">Sign in</button>
    				<h3 style="text-align: center; color: rgb(133, 133, 133);"><?php echo $stateCall; ?></h3>
				</form>
			</div>
			<?php if($sessionType){include 'assets/php/sessionLogged.php';} ?>
		</div>

		<div class="content-footer">
            <div class="footer-center">
                <h3>Created by <a href="http://jarrrk.com">Jarrrk</a></h3>
            </div>
		</div>
	</body>
</html>

<!-- 

Add new admins, view admins, admin ranks

log file, admin actions in data file per line

!-->