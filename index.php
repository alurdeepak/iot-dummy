<html>

<head>
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
    <link href="stylo.css" rel="stylesheet" type="text/css">

     
    <style>
    .ui-menu { position: absolute; width: 100px; }
  </style>
    <script>
  $(function() {
    $( "#rerun" )
      .button()
      .click(function() {
        alert( "Running the last action" );
      })
      .next()
        .button({
          text: false,
          icons: {
            primary: "ui-icon-triangle-1-s"
          }
        })
        .click(function() {
          var menu = $( this ).parent().next().show().position({
            my: "left top",
            at: "left bottom",
            of: this
          });
          $( document ).one( "click", function() {
            menu.hide();
          });
          return false;
        })
        .parent()
          .buttonset()
          .next()
            .hide()
            .menu();
  });
  </script>
  
    </head>
    
    <body>
        <?php
session_start();
if(isset($_SESSION['msg'])){
echo $_SESSION['msg']. "<br><br>";
unset($_SESSION['msg']);	
}

?>
  
    <h2>Login</h2>
    <p> <div style="width:400px;height:30px;-webkit-border-radius: 20px 20px 0px 0px;-moz-border-radius: 20px 20px 0px 0px;border-radius: 20px 20px 0px 0px;background-color:#B3B5E3;">&nbsp;&nbsp;</div> </p><table>
        <form action="loginAction.php" method="post">
            <tr><td>Email</td><td><input type="text" name="email"></td></tr>
            <tr><td>Password</td><td><input type="password" name="pwd"></td></tr>
            <tr><td><div>
  <div>
    <button id="rerun">Choose Action...</button>
    
  </div>
  <ul>
    <li>Login</li>
    <li>Register</li>
    
  </ul>
</div></td><td></td></tr>
        </form>
        
        </table>
        <p> <div style="width:400px;height:30px;-webkit-border-radius: 0px 0px 20px 20px;-moz-border-radius: 0px 0px 20px 20px;border-radius: 0px 0px 20px 20px;background-color:#B3B5E3;">&nbsp;&nbsp;</div><table>
 </p>

       

 
    </body>
</html>