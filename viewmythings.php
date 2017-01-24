<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
include 'openDB.php';
include 'dquestions.php';
//$ADD_THING="inert into dat_things(customer_id_fk,thing_name,desc,isDisabled) values('";

date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time());

//$GET_ALL_THINGS="SELECT customer_id_fk,thing_name,description,isDisabled FROM dat_things t1, dat_customers t2 WHERE t2.id=t1.customer_id_fk AND customer_id_fk=";
$sql=$GET_ALL_THINGS . $_SESSION['userdbid'];
$result = mysql_query($sql) or die ("get request  failed" . mysql_error());

$count=0;
//echo $SQL_GET_PRJ_STATUS;

$retStr="{\"draw\": 1,\"recordsTotal\":". mysql_num_rows($result) . ",\"recordsFiltered\":" . mysql_num_rows($result). ",\"data\": [";


$rowcount=mysql_num_rows($result);
$count=0;

while($row = mysql_fetch_array($result)){
    
if($count < $rowcount){
$retStr = $retStr . "[\"" . $row['thing_name'] . "\",\"" . $row['description']. "\",\"" . $row['isDisabled'] . "\",\"" . $row['created_on'] . "\"],";
    
}//if
                         
$count++;

if($count==$rowcount){

$retStr = $retStr . "[\"" . $row['thing_name'] . "\",\"" . $row['description']. "\",\"" . $row['isDisabled'] . "\",\"" . $row['created_on'] . "\"]";


}//if
                     
                     
                     
}//while

if($count!=0){
$retStr = $retStr . "]}";
}
   echo $retStr;
?> 