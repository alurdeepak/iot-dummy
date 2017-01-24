<?php

include 'header1.php';

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
?>

<table border=1>

<tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
    <?php
//session_start();
include 'openDB.php';
include 'dquestions.php';
//$ADD_SERVICE="insert into dat_services(thing_id_fk,service_name,description,isenabled,created_on) values(";

date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time());

//$GET_SERVICES_FOR_USER="SELECT t2.thing_name,t2.description, t1.id as serid, t1.service_name,t1.description, t1.isenabled, t1.created_on, t2.created_on FROM dat_services t1, dat_things t2 WHERE t1.thing_id_fk=t2.id";

$sql=$GET_SERVICES_FOR_USER . " and t3.id=" . $_SESSION['userdbid'];
//echo $sql;
$result = mysql_query($sql) or die ("get request  failed" . mysql_error());
$count=0;
while($row = mysql_fetch_array($result)){
    
    if($count==0){
  //echo "<tr><td>Thing Name</td><td>Service Name</td><td>Service Description</td><td></td><td></td><td></td></tr>";  
echo "<tr bgcolor=11ccff><td>Thing Name</td><td>Service Name</td><td>Service Description</td><td>is Enabled</td><td>Created_on</td><td></td><td></td></tr>";  
        
    
    }
$count++;
    
    echo "<tr><td>" .$row['thing_name']  .  "</td><td>" . $row['service_name'] . "</td><td>" . $row['description'] . "</td><td>" . $row['isenabled'] . "</td><td>" . $row['created_on'] . "</td><td><a href=\"mastermash1.php?sid=" . $row['serid'] . "\">View mashup</a></td><td></td></tr>";
    
        
}//while

?>

</table>