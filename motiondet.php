<?php

   session_start();
    if(isset($_REQUEST['msg'])){
    
    
    $dbhost = '10.1.4.12';
$dbport='3306';
$dbuser = 'motionadmin';
$dbpass = 'techno098';
$dbname = 'motiondet';
    
 
date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time());
    
$conn = mysql_connect($dbhost.":". $dbport, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysql_select_db($dbname);
    
    $sql="insert into dat_motion_logs(det_moment,isEnabled) values ('" . $today . "',1)";
   // echo $sql;
$result = mysql_query($sql) or die ("insert request  failed" . mysql_error());

if($result){
echo  "success";
	
}else{
echo  "Failure";
}
    
}//main if
else{
 echo  "var not set";   
}

?>