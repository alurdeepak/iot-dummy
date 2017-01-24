<?php
include 'openDB.php';
include 'dquestions.php';
//$DEL_PROP="delete from dat_properties where id=";
$sql=$DEL_PROP . $_REQUEST['pid'];

//echo $sql;
$result = mysql_query($sql) or die ("get request  failed" . mysql_error());

if($result){
//echo  "success";
	$sfurl="Location: /view_props_ser.php?sid=" .$_REQUEST['sid']  ;
	header($sfurl);
}else{
echo  "Failure";
}

?>