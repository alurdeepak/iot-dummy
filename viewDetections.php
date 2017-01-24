<head>
<meta http-equiv="refresh" content="10">
</head>
<table><tr><td><img src="https://blogs.technologiaworld.com/wp-content/uploads/2014/04/logo1.png"></td></tr></table>
<?php
 session_start();
   
    
    $dbhost = '10.1.4.12';
$dbport='3306';
$dbuser = 'motionadmin';
$dbpass = 'techno098';
$dbname = 'motiondet';
    
 
date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time());
    
$conn = @mysql_connect($dbhost.":". $dbport, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysql_select_db($dbname);
    
    $sql="select det_moment,isEnabled from dat_motion_logs order by det_moment desc limit 10";
    //echo $sql;
$result = mysql_query($sql) or die ("insert request  failed" . mysql_error());

$count=0;
//echo $SQL_GET_PRJ_STATUS;
while($row = mysql_fetch_array($result)){
if($count==0){
	echo "<center><h3>An IoT Proof Of Concept.</h3></center><br>";
    echo "<h3>Latest Motion Detections</h3><br>";
echo "<table border=1 width=50%><tr><td>Index</td><td>Detection Date Time</td></tr>";
}
$count++;
    if($count ==1){
echo "<tr bgcolor=3cc33><td>".$count."</td><td>".$row['det_moment']."</td></tr>";
    }else{
        echo "<tr><td>".$count."</td><td>".$row['det_moment']."</td></tr>";
    }

}

if($count!=0){
echo "</table>";
}

if($count==0){
echo "No entries found.";
}
 

?>