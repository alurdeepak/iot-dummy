<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
$uriInfo=$_SERVER["REQUEST_URI"];
$thing_Name=explode("/",$uriInfo);

//get the thing name
$thing_Name1=$thing_Name[1];
$service_Name1=$thing_Name[2];
//echo "path info " . $uriInfo. "<br>";
//echo "Thing info " . $thing_Name[1]. "<br>";
//echo "<br>Service info " . $thing_Name[2]. "<br>";

$query_str=explode("?",$uriInfo);
//echo "query info " . $query_str[1]. "<br>";

$query_params=explode("&",$query_str[1]);
//echo var_dump($query_params);
$params_only="";
$utoken="";
for($i=0; $i<=count($query_params);$i++){
    //echo "for str is " .$query_params[$i]. "<br>";
    $p1=explode("=",$query_params[$i]);
    
    //echo "Param is " . $p1[0] ." and value is " . $p1[1] . "<br>";
if($p1[0] == "OAuth"){
    $utoken=$p1[1];
}//if oauth
else{
    //add all parameters except Oauth
    $params_only=$params_only . "','" . $p1[0];
}//else
    
    
}//for
//echo "ooo";
//Step1 - check if thing name exists and is enabled for HTTP channel, if not ignore the http request

if($utoken!="" && $thing_Name1!="" &&  $service_Name1!=""){
include 'openDB.php';
include 'dquestions.php';
//$GET_THING_BY_NAME="select t1.id,t1.thing_name,t1.description from dat_things t1,mas_users t2 where t1.thing_name='";
$thing_sql=$GET_THING_BY_NAME . $thing_Name1 . "' and t2.utoken='". $utoken. "' and t3.service_name='" . $service_Name1 . "' and t3.transport_id_fk=1";
//echo $thing_sql;
$thing_result = mysql_query($thing_sql) or die ("get thing  failed" . mysql_error());
$row22 = mysql_fetch_array($thing_result);
if(mysql_num_rows($thing_result)>0){
    //this means thing, service and oauth exists with relation
echo "thing, service and token exists<br>";
    //now check if the incoming properties are related to service mentioned, if yes, then store it else DO NOthing and cleanup
    $id_nums = implode(", ", explode(",",$params_only));
    //echo "<br> colelcted params are " . substr($id_nums,1,-2);
    
    //$CHECK_PARAM_SER_RELATION="SELECT t1.id FROM dat_properties t1, dat_services t2 WHERE t1.service_id_fk=t2.id AND t1.prop_name IN(";
    $prop_sql=$CHECK_PARAM_SER_RELATION . substr($id_nums,2,-3) . ") and t2.id=" .$row22['sid'] ;
    
    
//echo $prop_sql;
$prop_result = mysql_query($prop_sql) or die ("get thing  failed" . mysql_error());
    $row = mysql_fetch_array($prop_result);
if(mysql_num_rows($prop_result)>0){
    
    //this means properties exist for the mentioned service and thing
    echo "<br>Prop exists";
    
    //now store the params value in DB
    storeParams($query_params,$row['sid']);
    
}//prop if
    else{
        echo "<br>Props DONOT match";
    }//else

}//thing exists
else{
    echo "thing and token DOESNOT exists";
}//else

}//if check to see if oauth, things and service exists

function storeParams($paramsArray, $serviceID){
    
    date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time());
    
    for($i=0; $i<=count($paramsArray);$i++){
   
    $p1=explode("=",$paramsArray[$i]);
    
    
if($p1[0] != "OAuth"){
    //echo "Paramaaa is " . $p1[0] ." and value is " . $p1[1] . "<br>";
    include 'openDB.php';
include 'dquestions.php';
    
    //first get the property ID and then store it
    //$GET_PROP_ID="SELECT t1.id FROM dat_properties t1 WHERE t1.prop_name='" . $p1[0] . "'";
    $thing_sql=$GET_PROP_ID. $p1[0] . "' and service_id_fk=" . $serviceID ;
//echo $thing_sql;
$thing_result = mysql_query($thing_sql) or die ("get thing  failed" . mysql_error());
$row = mysql_fetch_array($thing_result);
    //now that we have prop ID, store it in m2m table
    //$ADD_M2M_VALUES="insert into dat_m2m_data(prop_id_fk,prop_value,uploaded_on) values(";

  if(mysql_num_rows($thing_result)>0){  
$sql_m2m=$ADD_M2M_VALUES .$row['id'] .",'" .   $p1[1] . "','" .$today . "')" ;
//echo $sql_m2m;
$result = mysql_query($sql_m2m) or die ("insert request  failed" . mysql_error());    
  }//row count
    
}//if oauth

    
}//for
   
  
    
    
    
    
}//function
?>