<?php
session_start();
include 'openDB.php';
include 'dquestions.php';
//$ADD_SERVICE="insert into dat_services(thing_id_fk,service_name,description,isenabled,created_on) values(";

date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time());
if($_REQUEST['isenabled']){
$add_sql=$ADD_SERVICE ."". $_REQUEST['speed'] . ",'" . $_REQUEST['sname'] . "','" . $_REQUEST['sdesc'] . "'," . $_REQUEST['isenabled'] . ",'". $today ."'," . $_REQUEST['transport']. ")";
}else{
    //$add_sql=$ADD_THING . $_SESSION['userdbid'] . ",'" . $_REQUEST['tname'] . "','" . $_REQUEST['tdesc'] . "',0,'" . $today . "')";
    $add_sql=$ADD_SERVICE . $_REQUEST['speed'] . ",'" . $_REQUEST['sname'] . "','" . $_REQUEST['sdesc'] . "',0,'". $today ."'," . $_REQUEST['transport']. ")";;
}
echo $add_sql;

    
    

   // echo $sql;
$result = mysql_query($add_sql) or die ("insert request  failed" . mysql_error());

if($result){
echo  "success";
	$sfurl="Location: /view_services.php?tid=" .$_REQUEST['speed']  ;
	header($sfurl);
}else{
echo  "Failure";
}

?>