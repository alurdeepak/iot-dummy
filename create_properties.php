<?php
include 'header1.php';
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));

if(isset($_REQUEST['sid'])){
    //service is known, so show only property name and types
    
    //$GET_DATA_TYPES="select id,type_name from mas_data_types";
    ?>

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
<div class="demo">
 
    <table border=1 width=50%>
<form action="create_props_action.php">
 <input type=hidden name="sid" value="<?php echo $_REQUEST['sid']?>">
    <tr><td>Service Name</td><td><?php
    include 'openDB.php';
include 'dquestions.php';
    $sql=$GET_SERVICES_FOR_THING . $_REQUEST['sid'];
$result = mysql_query($sql) or die ("get request  failed" . mysql_error());
$count=0;
$row = mysql_fetch_array($result);
    echo $row['service_name'];
    ?></td></tr>
  <fieldset>
      <tr><td> <label for="speed">Select Property DataType</label></td>
   <td> <select name="speed" id="speed">
      <?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
include 'openDB.php';
include 'dquestions.php';
    //$GET_DATA_TYPES="select id,type_name from mas_data_types";
$sql=$GET_DATA_TYPES;
$result = mysql_query($sql) or die ("get request  failed" . mysql_error());

while($row = mysql_fetch_array($result)){
 
    echo "<option value=\"" . $row['id'] . "\">" . $row['type_name'] . "</option>";
    
}

?>
        
      
    </select>  </fieldset>
 </td></tr>
        <tr><td>Property Name</td><td><input type=text name="pname" pattern='[A-Za-z\\s]*'></td></tr>
     <tr><td>Range -  Mimimum Value</td><td><input type=text name="minvalue" value></td></tr>
        <tr><td>Range -  Maximum Value</td><td><input type=text name="maxvalue"></td></tr>
     
        <tr><td></td><td><input type="submit" ></td></tr>
      
</form>
 
        </table>
</div>

<?php
    //echo "<form> <table>";
    //echo "<tr><td>" . $row[''];
}//isset

?>