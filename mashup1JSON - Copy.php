
<?php
 session_start();
   error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
  //session_start();
include 'openDB.php';
include 'dquestions.php';

$str1="";    
 
date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time());

    
//    $GET_M2M_DATA="SELECT t2.prop_name, t1.prop_value,t1.uploaded_on FROM dat_m2m_data t1, dat_properties t2, dat_services t3 WHERE t1.prop_id_fk=t2.id AND t2.service_id_fk=t3.id AND t3.id=";


    $sql=$GET_M2M_DATA . $_REQUEST['sid'] ;

    //echo $sql;
$result = mysql_query($sql) or die ("select request  failed" . mysql_error());

$row_count=mysql_num_rows($result);

$count=0;
//echo $SQL_GET_PRJ_STATUS;
while($row = mysql_fetch_array($result)){

if($count==0){
//	$str1="{\"cols\": [{\"id\":\"\",\"label\":\"Date\",\"pattern\":\"\",\"type\":\"string\"},{\"id\":\"\",\"label\":\"Power\",\"pattern\":\"\",\"type\":\"number\"}],\"rows\": [{\"c\":[{\"v\":\"";
$str1=createRowString();
    //echo $str1;
}//if
   $count++; 

if($count!=$row_count){
    $str1=$str1 ."{\"c\":[{\"v\":\"". $row['uploaded_on'] . "\",\"f\":null},{\"v\":\"" . $row['prop_value']. "\",\"f\":null},{\"v\":\"". $row['prop_value']. "\",\"f\":null}]},";
    //echo "<tr><td>".$count."</td><td>".$row['det_moment']."</td></tr>";
}

    if($count==$row_count){
$str1=$str1 ."{\"c\":[{\"v\":\"". $row['uploaded_on'] . "\",\"f\":null},{\"v\":\"" . $row['prop_value']. "\",\"f\":null},{\"v\":\"" . $row['prop_value']. "\",\"f\":null}]}";
    }else{
$str1=$str1 ."{\"c\":[{\"v\":\"". $row['uploaded_on'] . "\",\"f\":null},{\"v\":\"" . $row['prop_value']. "\",\"f\":null},{\"v\":\"" . $row['prop_value']. "\",\"f\":null}]},";
        
}

}//while

if($count!=0){
//the final returned string
    echo $str1. "]}";
}

if($count==0){
echo "No entries found.";
}
 

//this function creates the json string for google charts - props only
function createRowString(){
    
   $str1=""; 
    //$GET_PROPS_FOR_SER="SELECT t1.id as pid,t1.prop_name, t2.type_name,t3.service_name,t4.thing_name,t1.created_on FROM dat_properties t1, mas_data_types t2, dat_services t3, dat_things t4 WHERE t1.prop_type_fk=t2.id AND t1.service_id_fk=t3.id AND t3.thing_id_fk=t4.id and t3.id=";
    include 'openDB.php';
include 'dquestions.php';
//$ADD_SERVICE="insert into dat_services(thing_id_fk,service_name,description,isenabled,created_on) values(";

date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time());

//$GET_PROPS_FOR_SER="SELECT t1.prop_name, t2.type_name,t3.service_name,t4.thing_name FROM dat_properties t1, mas_data_types t2, dat_services t3, dat_things t4 WHERE t1.prop_type_fk=t2.id AND t1.service_id_fk=t3.id AND t3.thing_id_fk=t4.id and t3.id=";

$sql=$GET_PROPS_FOR_SER . $_REQUEST['sid'];
//echo $sql;
$result = mysql_query($sql) or die ("get request  failed" . mysql_error());
$count1=0;
while($row = mysql_fetch_array($result)){
    
    if($count1==0){
  	$str1="{\"cols\": [{\"id\":\"" . $count1 ."\",\"label\":\"Date\",\"pattern\":\"\",\"type\":\"string\"}";
    //echo "inside coint1";
    }
$count1++;    
      	$str1=$str1. ",{\"id\":\"" . $count1. "\",\"label\":\"" . $row['prop_name'] . "\",\"pattern\":\"\",\"type\":\"number\"}";  
    

    
   // echo "<tr><td>" . $row['prop_name'] . "</td><td>" . $row['type_name'] . "</td><td>" . $row['created_on'] . "</td><td><a href=\"delete_property.php?pid=" . $row['pid'] . "&sid=" .$_REQUEST['sid'] ."\">Delete Property</a></td></tr>";
    
        
}//while
    //
  return $str1 . "],\"rows\": [";  
  // echo "Function out " . $str1 ."<br>"; 
}//function

?>