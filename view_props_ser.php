<?php

include 'header1.php';

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
?>

<table border=1>


    <?php
//session_start();
include 'openDB.php';
include 'dquestions.php';
//$ADD_SERVICE="insert into dat_services(thing_id_fk,service_name,description,isenabled,created_on) values(";

date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time());

//$GET_PROPS_FOR_SER="SELECT t1.prop_name, t2.type_name,t3.service_name,t4.thing_name FROM dat_properties t1, mas_data_types t2, dat_services t3, dat_things t4 WHERE t1.prop_type_fk=t2.id AND t1.service_id_fk=t3.id AND t3.thing_id_fk=t4.id and t3.id=";

$sql=$GET_PROPS_FOR_SER . $_REQUEST['sid'];
//echo $sql;
$result = mysql_query($sql) or die ("get request  failed" . mysql_error());
$count=0;
while($row = mysql_fetch_array($result)){
    
    if($count==0){
  echo "<tr><td>Thing Name</td><td>" . $row['thing_name'] . "</td><td>Service name</td><td>". $row['service_name'] ."</td></tr>";  
echo "<tr bgcolor=11ccff><td>Prop Name</td><td>Property Type</td><td>Created On</td><td></td><td></td></tr>";  
        
    
    }
$count++;
    
    echo "<tr><td>" . $row['prop_name'] . "</td><td>" . $row['type_name'] . "</td><td>" . $row['created_on'] . "</td><td><a href=\"delete_property.php?pid=" . $row['pid'] . "&sid=" .$_REQUEST['sid'] ."\">Delete Property</a></td><td><a href=view_mashup.php?pid=".$row['pid'].">View Mashup For This Property</a></td></tr>";
    
        
}//while

include master_gauge2.php. "?sid=". $_REQUEST['sid'];
echo "<a href=master_gauge2.php?sid=" .$_REQUEST['sid'] . ">View Gauges</a>" ;
?>

</table>