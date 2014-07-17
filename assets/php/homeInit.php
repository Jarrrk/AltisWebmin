<?php

/* Variable Defines */

$sessionType = 0;
$stateCall = "";
$adminBodyContent = "";
$pageTitle;

/* Variable Defines End */

if(isset($_SESSION['username'])){$sessionType = 1;}

switch ($sessionType) {
	case 0:
		defaultVariables();
		break;
	case 1:
		sessionVariables();
		break;
	default:
		defaultVariables();
	break;
}

if(isset($_GET['state']) && trim($_GET["state"])){
	$returnState = $_GET['state'];

	if ($returnState <= 900){
    	$stateCall = "Logged out successfully";
	}

	if($returnState >= 1000){
	    $stateCall = "Incorrect login credentials";
	}
}

function defaultVariables(){
	global $sessionType;
	global $pageTitle;
	$pageTitle = "Altis Life Panel: Login";
	$sessionType = FALSE;
}

function sessionVariables(){
	global $sessionType;
	global $pageTitle;
	$pageTitle = "Altis Life Panel: Home";
	$sessionType = TRUE;
}

function catchFunction(){
	global $adminBodyContent;
	$adminBodyContent = file_get_contents('assets/php/sessionLogged.php');
}

?>