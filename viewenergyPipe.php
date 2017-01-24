
<html>




    
    <head>
<!--<meta http-equiv="refresh" content="10"> -->
   
        <table><tr><td><img src="https://blogs.technologiaworld.com/wp-content/uploads/2014/04/logo1.png"></td></tr></table><br>
       <center><h2>IoT POC Of Smart Meters</h2></center> 
        <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
    
    // Load the Visualization API and the piechart package.
   //  google.charts.load('current', {'packages':['corechart']});
       google.load('visualization', '1.1', {'packages':['corechart']});
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);
      
    function drawChart() {
      var jsonData = $.ajax({
          url: "energyPipeJSON.php?cid=<?php echo $_REQUEST['cid1'] ?>",
          dataType: "json",
          async: false
          }).responseText;
          
        var options = {
          title: 'Energy Consumption',
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
      <table><form action=viewenergyPipe.php method=get><tr><td>Please select Customer</td><td><select name=cid1><?php
       $dbhost = 'localhost';
$dbport='3306';
$dbuser = 'root';
$dbpass = 'toor';
$dbname = 'iot';
$sql="select id, first_name,last_name from dat_customers";

$conn = @mysql_connect($dbhost.":". $dbport, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysql_select_db($dbname);
$result = mysql_query($sql) or die ("select request  failed" . mysql_error());

$row_count=mysql_num_rows($result);

$count=0;
//echo $SQL_GET_PRJ_STATUS;
while($row = mysql_fetch_array($result)){
    echo "<option value=". $row['id']. ">"  . $row['first_name'] . " " . $row['last_name'] ."</option>";
    
}//while
    
    ?>
          </td><td><input type=submit></td></tr></form></table>
<div id="curve_chart" style="width: 900px; height: 500px"></div>
   
  </body>
</html>