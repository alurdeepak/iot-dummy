<?php

   session_start();
    
    
    
    $dbhost = 'localhost';
$dbport='3306';
$dbuser = 'root';
$dbpass = 'toor';
$dbname = 'iot';
    
 
date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time());
    
$conn = mysql_connect($dbhost.":". $dbport, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysql_select_db($dbname);


//$sql="insert into dat_energy_monitor(device_id,customer_id_fk,record_date,power_consumed,voltage_measured,current_measured,updated_date) values ('" . $_REQUEST['devid'] . "'," . $_REQUEST['cid'] . ",'" . recDate($_REQUEST['rdate']) . "'," . $_REQUEST['pow_con'] . "," . $_REQUEST['vol_mea']. "," . $_REQUEST['cur_mea'] . ",'". $today ."')" ;

$sql="insert into dat_energy_monitor(device_id,customer_id_fk,record_date,power_consumed,voltage_measured,current_measured,updated_date) values ('" . $_REQUEST['devid'] . "'," . $_REQUEST['cid'] . ",'" . $today . "'," . $_REQUEST['pow_con'] . "," . $_REQUEST['vol_mea']. "," . $_REQUEST['cur_mea'] . ",'". $today ."')" ;
    
echo $sql;

        $result = mysql_query($sql) or die ("insert request  failed" . mysql_error());

if($result){
echo  "success";
	
}else{
echo  "Failure";
}
    
    function recDate(){
     return '2016-01-01';   
    }

?>