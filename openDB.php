<?php
include 'config.php';

$conn = mysql_connect($dbhost.":". $dbport, $dbuser, $dbpass) or die ('Error connecting to mysql');

mysql_select_db($dbname);
?> 