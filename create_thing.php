
<div id="a1" style="position: relative;left:10px">
<?php


include 'user_index.php';


?>
    </div>
<div id="a2" style="position: relative;left:400px;top:10px"><table>
<form action="create_thing_action.php" method="post">
<tr><td>Thing Profile</td></tr>
    <tr><td>Thing Name</td><td><input type="text" name="tname" pattern='[A-Za-z\\s]*'></td></tr>
    <tr><td>Thing Description</td><td>
        <textarea name="tdesc"></textarea>
        </td></tr>
    <tr><td></td><td><input type="checkbox" name="isenabled" checked value="1">isEnabled</td></tr>
    <tr><td></td><td><input type="submit" ></td></tr>
</form>    
</table>
    </div>
    