<?php
/*For My LocalPC*/
$con=mysqli_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error());
mysqli_select_db ($con,'hospital_login_db');

?>




<!DOCTYPE html>
<html>
<head>
 <title></title>

 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
   <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

</head>
<body>
<form method="POST" action="./show.php" >
insert your token number:<input type="text" name="token" >
<br>
Treatment Type:<br>
            <input type="text" name="treatment" list="treat">
            <datalist id="treat">
                <option value="xray"></option>
                <option value="fracture"></option>
                <option value="others"></option>
                <option value="fever"></option>
                <option value="bloodcheck"></option>
                <option value="mri"></option>
                <option value="sonography"></option>
                <!--<option value="admit"></option> -->
            </datalist>
            <br>
            <input type="submit" value="submit" name="submit">
</form>




</body>
</html>



