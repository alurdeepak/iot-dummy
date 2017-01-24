<?php
session_start();
if (!isset($_SESSION['LOGIN']) || !isset($_SESSION['userdbid'])){
	$_SESSION['msg']="You have to be logged-in for the requested page. This system tracks illegal access.";
	header("Location: /index.php");
}

?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>

<table style="text-align: left; width: 100%; height: 2px;" border="0" cellpadding="0" cellspacing="0">
<tr><td><h2>Altf4 M2M Server</h2></td><td align=right>Version 1.0, Released on Feb 15, 2016<br><a href="logout.php">Logout</a></td></tr>
<tr>
<td style="background-color: #0099ff;" colspan="2" ><?php echo "<b>Welcome, " . $_SESSION['LOGIN'] . " [". $_SERVER['REMOTE_ADDR'] . "]" ?> </td>

</tr>
</table>

</head>

<body>
<script type='text/javascript'>


function Go(){return}

</script>


<script type='text/javascript' src='default.js'></script><br><br>

<script type='text/javascript' src='menu_com.js'></script><br><br>