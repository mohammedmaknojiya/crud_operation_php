<?php
/*For My LocalPC*/
$con=mysqli_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error());
mysqli_select_db ($con,'actual_predict');
?>
<?php
//getting user register time at time of registration
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
@$time = date(' H:i:s', $time_now);

$query = "insert into actual_and_predict(actual_out) values('$time')";
$query_run = mysqli_query($con,$query);


?>