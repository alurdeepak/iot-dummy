
<?php
 session_start();
   
    
   $dbhost = 'localhost';
$dbport='3306';
$dbuser = 'root';
$dbpass = 'toor';
$dbname = 'iot';
$str1="";    
 
date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time());
    
$conn = @mysql_connect($dbhost.":". $dbport, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysql_select_db($dbname);
    
//    $sql="SELECT t1.id, t1.device_id, t1.updated_date, t1.record_date, t1.power_consumed,t1.voltage_measured,t1.current_measured, t2.first_name, t2.last_name, t2.address,t2.pincode,t2.contact_num,t2.city,t2.lat,t2.long FROM dat_energy_monitor t1, dat_customers t2 WHERE t1.customer_id_fk=t2.id AND t1.customer_id_fk=1";

    $sql="SELECT t1.record_date, sum(t1.power_consumed) as total FROM dat_energy_monitor t1, dat_customers t2 WHERE t1.customer_id_fk=t2.id AND t1.customer_id_fk=" . $_REQUEST['cid'] . " group by DATE(t1.record_date) ORDER BY t1.record_date DESC";

    //echo $sql;
$result = mysql_query($sql) or die ("select request  failed" . mysql_error());

$row_count=mysql_num_rows($result);

$count=0;
//echo $SQL_GET_PRJ_STATUS;
while($row = mysql_fetch_array($result)){

if($count==0){
	$str1="{\"cols\": [{\"id\":\"\",\"label\":\"Date\",\"pattern\":\"\",\"type\":\"string\"},{\"id\":\"\",\"label\":\"Power\",\"pattern\":\"\",\"type\":\"number\"}],\"rows\": [{\"c\":[{\"v\":\"";

}//if
    
$count++;
if($count!=$row_count){
    $str1=$str1 . $row['record_date'] . "\",\"f\":null},{\"v\":\"" . $row['total']. "\",\"f\":null}]},{\"c\":[{\"v\":\"";
    //echo "<tr><td>".$count."</td><td>".$row['det_moment']."</td></tr>";
}else{
    $str1=$str1 . $row['record_date'] . "\",\"f\":null},{\"v\":\"" . $row['total']. "\",\"f\":null}]}";
}

}//while

if($count!=0){
echo $str1. "]}";
}

if($count==0){
echo "No entries found.";
}
 

?>