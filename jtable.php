<html>
<?php
include 'header1.php';
?>

<head>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>

    
    
    
    <script>
$(document).ready(function() {
    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "viewmythings.php"
    } );
} );
        
        </script>
    
    </head>
    
    <body>
    <table id="example" class="display" cellspacing="0" width="50%">
        <thead>
            <tr>
                <th>Thing Name</th>
                <th>Thing Description</th>
                <th>is Enabled</th>
                <th>Creation Date</th>
                
                
            </tr>
        </thead>
      
        <tfoot>
            <tr>
                <th>Thing Name</th>
                <th>Thing Description</th>
                 <th>is Enabled</th>
                <th>Creation Date</th>
               
                
            </tr>
        </tfoot>
    </table>
    
    </body>
    
    </html>