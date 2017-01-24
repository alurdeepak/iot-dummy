<?php
session_start();
include 'openDB.php';
include 'dquestions.php';
//$ADD_PROPS="insert into dat_properties(service_id_fk,prop_name,prop_type_fk,created_on) values(";

date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time());

$add_sql=$ADD_PROPS ."". $_REQUEST['sid'] . ",'" . $_REQUEST['pname'] . "','" . $_REQUEST['speed'] . "','" . $today ."'," . $_REQUEST['minvalue']. "," . $_REQUEST['maxvalue']. ")";

echo $add_sql;

    
    

   // echo $sql;
$result = mysql_query($add_sql) or die ("insert request  failed" . mysql_error());

if($result){
echo  "success";
	$sfurl="Location: /create_properties.php?sid=" .$_REQUEST['sid']  ;
	header($sfurl);
}else{
echo  "Failure";
}

?>