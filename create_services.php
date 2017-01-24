<?php

include 'header1.php';

?>
<head>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="http://jqueryui.com/resources/demos/style.css">
<script>
  $(function() {
    $( "#speed" ).selectmenu();
 
    $( "#files" ).selectmenu();
 
    $( "#number" )
      .selectmenu()
      .selectmenu( "menuWidget" )
        .addClass( "overflow" );
  });
  </script>
  <style>
    fieldset {
      border: 0;
    }
    label {
      display: block;
      margin: 30px 0 0 0;
    }
    select {
      width: 200px;
    }
    .overflow {
      height: 200px;
    }
  </style>
    </head>
<body>

<div class="demo">
 
    <table border=1 width=50%>
<form action="create_services_action.php" method=post>
 
  <fieldset>
      <tr><td> <label for="speed">Select your Thing</label></td>
   <td> <select name="speed" id="speed">
      <?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
include 'openDB.php';
include 'dquestions.php';
$sql=$GET_ALL_THINGS . $_SESSION['userdbid'];
$result = mysql_query($sql) or die ("get request  failed" . mysql_error());

while($row = mysql_fetch_array($result)){
 
    echo "<option value=\"" . $row['tid'] . "\">" . $row['thing_name'] . "</option>";
    
}

?>
        
      
    </select>  </fieldset>
 </td></tr>
        <tr><td>Service Name</td><td><input type=text name="sname" pattern='[A-Za-z\\s]*'></td></tr>
      <tr><td>Service Description</td><td><textarea name="sdesc"></textarea>
        </td></tr></td></tr>
        <tr><td></td><td><input type="checkbox" name="isenabled" checked value="1">isEnabled</td></tr>
      <tr><td> <label for="trasnport">Data Transport Mechanism</label></td>
   <td> <select name="transport" id="transport">
      <?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
include 'openDB.php';
include 'dquestions.php';
$sql=$GET_ALL_TRANSPORTS;
$result = mysql_query($sql) or die ("get request  failed" . mysql_error());

while($row = mysql_fetch_array($result)){
 
    echo "<option value=\"" . $row['id'] . "\">" . $row['transport_name'] . "</option>";
    
}

?>
        
      
    </select>  </fieldset>
 </td></tr>
    
        <tr><td></td><td><input type="submit" ></td></tr>
      
</form>
 
        </table>
</div>
</body>