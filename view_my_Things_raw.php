<?php
include 'header1.php';
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
include 'openDB.php';
include 'dquestions.php';
//$ADD_THING="inert into dat_things(customer_id_fk,thing_name,desc,isDisabled) values('";

date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time());

//$GET_ALL_THINGS="SELECT customer_id_fk,thing_name,description,isDisabled FROM dat_things t1, dat_customers t2 WHERE t2.id=t1.customer_id_fk AND customer_id_fk=";
$sql=$GET_ALL_THINGS . $_SESSION['userdbid'];
//echo $sql;
$result = mysql_query($sql) or die ("get request  failed" . mysql_error());


$rowcount=mysql_num_rows($result);
$count=0;

while($row = mysql_fetch_array($result)){
   // echo "while ";
if($count==0){
    echo "<table border=1><tr bgcolor=ccddff><td>Thing Name</td><td>Thing Description</td><td>Created On</td><td>isEnabled</td><td></td></tr>";
}
 $count++;                    
                     echo "<tr><td>".$row['thing_name'] ."</td><td>". $row['description']."</td><td>" .$row['created_on']. "</td><td>" .$row['isDisabled'] ."</td><td><a href=view_services.php?tid=" .  $row['tid'].">View Services</a></td></tr>";
                     
}//while

if($count!=0){
//$retStr = $retStr . "]}";
     echo "</table>";
}
  
?> 