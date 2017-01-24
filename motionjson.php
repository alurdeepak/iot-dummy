
<html>




    
    <head>
<meta http-equiv="refresh" content="10">
        <style>
.loginform{  
    padding:10px;  
    border:1px solid pink;  
    border-radius:10px;  
    width:650px;
    margin-top:10px;
    color: #0000ff; 
  font-size: 12 em; 
  font-family: sans-serif; 
}  
        </style>
        <table><tr><td><img src="https://blogs.technologiaworld.com/wp-content/uploads/2014/04/logo1.png"></td></tr></table><br>
       <center><h2>IoT POC Of Motion Sensors</h2></center> 
        <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
    
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1.1', {'packages':['table']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);
      
    function drawChart() {
      var jsonData = $.ajax({
          url: "viewDetectionsjson.php",
          dataType: "json",
          async: false
          }).responseText;
          
      // Create our data table out of JSON data loaded from server.
      var table = new google.visualization.Table(document.getElementById('table_div'));
  var data = new google.visualization.DataTable(jsonData);
     table.draw(data, {showRowNumber: true, width: '50%', height: '50%'});
    }

    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="table_div"></div><br>
      <div class="loginform">  
          This data is received remotly from a motion sensor. The data from the sensor is routed by Arduino to a remote application server which stores the date and time of motion detection.
      </div><br>
      <img src="motionsensor.jpg" width=600 height=500>
  </body>
</html>