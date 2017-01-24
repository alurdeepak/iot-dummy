<?php
session_start();

unset($_SESSION['LOGIN']);
unset($_SESSION['userdbid']);
unset($_SESSION['empname']);

session_unset();
//session_destroy();
//$_SESSION = array();
	$path="Location: /index.php";

$_SESSION['msg']="Successfully Logged out.";

$sfurl="Location: /index.php";
	header($sfurl);


?>