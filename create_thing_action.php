<?php
session_start();
include 'openDB.php';
include 'dquestions.php';
//$ADD_THING="inert into dat_things(customer_id_fk,thing_name,desc,isDisabled) values('";

date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time());
if($_REQUEST['isenabled']){
$add_sql=$ADD_THING . $_SESSION['userdbid'] . ",'" . $_REQUEST['tname'] . "','" . $_REQUEST['tdesc'] . "'," . $_REQUEST['isenabled'] . ",'". $today ."')";
}else{
    $add_sql=$ADD_THING . $_SESSION['userdbid'] . ",'" . $_REQUEST['tname'] . "','" . $_REQUEST['tdesc'] . "',0,'" . $today . "')";
}
//echo $add_sql;

    
    

   // echo $sql;
$result = mysql_query($add_sql) or die ("insert request  failed" . mysql_error());

if($result){
echo  "success";
	$sfurl="Location: /view_my_Things_raw.php";
	header($sfurl);
}else{
echo  "Failure";
}

?>