
<?php
 session_start();
   
    
   $dbhost = '10.1.4.12';
$dbport='3306';
$dbuser = 'motionadmin';
$dbpass = 'techno098';
$dbname = 'motiondet';
$str1="";    
 
date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time());
    
$conn = @mysql_connect($dbhost.":". $dbport, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysql_select_db($dbname);
    
    $sql="select det_moment,isEnabled from dat_motion_logs order by det_moment desc limit 10";
    //echo $sql;
$result = mysql_query($sql) or die ("insert request  failed" . mysql_error());

$row_count=mysql_num_rows($result);

$count=0;
//echo $SQL_GET_PRJ_STATUS;
while($row = mysql_fetch_array($result)){

if($count==0){
	$str1="{\"cols\": [{\"id\":\"\",\"label\":\"Detection Time\",\"pattern\":\"\",\"type\":\"string\"}],\"rows\": [{\"c\":[{\"v\":\"";
}
    
$count++;
if($count!=$row_count){
    $str1=$str1 . $row['det_moment'] . "\",\"f\":null}]},{\"c\":[{\"v\":\"";
    //echo "<tr><td>".$count."</td><td>".$row['det_moment']."</td></tr>";
}else{
    $str1=$str1 . $row['det_moment'] . "\",\"f\":null}]}";
}

}//while

if($count!=0){
echo $str1. "]}";
}

if($count==0){
echo "No entries found.";
}
 

?>