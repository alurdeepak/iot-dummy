
<html>
<?php
include 'header1.php';
?>
    <table border=0 width=100%><tr><td align=center>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
    
    // Load the Visualization API and the piechart package.
   //  google.charts.load('current', {'packages':['corechart']});
       google.load('visualization', '1.1', {'packages':['gauge']});
        
<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
   
   
    //$GET_PROPS_FOR_SER="SELECT t1.id as pid,t1.prop_name, t2.type_name,t3.service_name,t4.thing_name,t1.created_on FROM dat_properties t1, mas_data_types t2, dat_services t3, dat_things t4 WHERE t1.prop_type_fk=t2.id AND t1.service_id_fk=t3.id AND t3.thing_id_fk=t4.id and t3.id=";
    include 'openDB.php';
include 'dquestions.php';
//$ADD_SERVICE="insert into dat_services(thing_id_fk,service_name,description,isenabled,created_on) values(";

date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time());

//$GET_PROPS_FOR_SER="SELECT t1.prop_name, t2.type_name,t3.service_name,t4.thing_name FROM dat_properties t1, mas_data_types t2, dat_services t3, dat_things t4 WHERE t1.prop_type_fk=t2.id AND t1.service_id_fk=t3.id AND t3.thing_id_fk=t4.id and t3.id=";

 $sql=$GET_M2M_DATA . $_REQUEST['pid'] . " order by t1.uploaded_on desc limit 1";
//echo $sql;
$result = mysql_query($sql) or die ("get request  failed" . mysql_error());
$count1=0;
while($row = mysql_fetch_array($result)){
   if($count1!=0) echo "<script>";
    
        ?>
        function drawChart() {
     var data = google.visualization.arrayToDataTable([
         <?php
    
    echo "['Label', 'Value'],['" . $row['prop_name'] ."', " . $row['prop_value']."]]);";
    ?>      
        var options = {
         width: 400, height: 120,
          redFrom: 900, redTo: 1023,
          yellowFrom:500, yellowTo: 900,
          minorTicks: 5,
            max:<?php echo $row['max_value'] ?>,
            min:<?php echo $row['min_value'] ?>
        };
 
            <?php
   echo "var chart = new google.visualization.Gauge(document.getElementById('curve_chart" . $count1 . "'))";

    ?>
         
        chart.draw(data, options);
            setInterval(function() {
          
          chart.draw(data, options);
        }, 13000);
    }
<?php
    echo "google.setOnLoadCallback(drawChart);";
    echo "</script><div id=\"curve_chart" .$count1. "\" style=\"width: 150px; height: 120px\"></div></td></tr></table>";
    
    $count1++;
}//main while
?>
    
    <head>
<!--<meta http-equiv="refresh" content="10"> -->
   
        <table><tr><td></td></tr></table><br>
       <center><h2>Rula Mashup</h2></center> 
        <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
    
    // Load the Visualization API and the piechart package.
   //  google.charts.load('current', {'packages':['corechart']});
       google.load('visualization', '1.1', {'packages':['corechart']});
        google.load('visualization', '1.1', {'packages':['gauge']});
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);
      
    function drawChart() {
      var jsonData = $.ajax({
          url: "mashup1JSON.php?pid=<?php echo $_REQUEST['pid'] ?>",
          dataType: "json",
          async: false
          }).responseText;
          
        var options = {
          title: 'Mashup1 - Need to change title',
          curveType: 'function',
          legend: { position: 'bottom' },
            animation:{startup: true,duration: 1000,easing: 'inAndOut',}
        };
 var data = new google.visualization.DataTable(jsonData);
     var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
    }

    </script>
  </head>

  <body>
      <table border=0><tr><td>
<div id="curve_chart" style="width: 1500px; height: 500px"></div></td></tr></table>
   
  </body>
</html>