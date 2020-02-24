<?php
/*For My LocalPC*/
$con=mysqli_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error());
mysqli_select_db ($con,'actual_predict');
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

 <div class="container">
 <div class="col-lg-12">
 <br><br>
 <h1 class="text-warning text-center" > Display Table Data </h1>
 <br>
 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 
 <tr class="bg-dark text-white text-center">
 
 <th> Id </th>
 <th> Username </th>
 <th> Cal_In_Time </th>
 <th> Cal_Out_Time </th>
 <th> Actual_In_Time </th>
 <th> Actual_Out_Time</th>

 </tr >

 <?php





 $q = "select id,name,predict_in,predict_out from actual_and_predict ";

 $query = mysqli_query($con,$q);

 while($res = mysqli_fetch_array($query)){
 ?>
 <tr class="text-center">
 <td> <?php echo $res['id'];  ?> </td>
 <td> <?php echo $res['name'];  ?> </td>
 <td> <?php echo $res['predict_in'];  ?> </td>
 <td> <?php echo $res['predict_out'];  ?> </td>
 
 </tr>

 <?php 
 }
  ?>


<?php
//////////////////////////actual_in and actual_out button code ///////////////// 

if (isset($_POST['click']))

{

  $time_now=mktime(date('h')+5,date('i')+30,date('s'));
  @$time = date(' H:i:s', $time_now);

   $query = "UPDATE actual_and_predict SET actual_in=$time WHERE id=1";
		$query_run = mysqli_query($con,$query);

}

if(isset($_POST['click1']))
{
  $time_now=mktime(date('h')+5,date('i')+30,date('s'));
  @$time = date(' H:i:s', $time_now);

  $query = "UPDATE actual_and_predict SET actual_out=$time WHERE id=1";
		$query_run = mysqli_query($con,$query);



}



////////////////////////////end ///////////////////////////////////


?>
 
 </table>  

 </div>
 </div>

 <script type="text/javascript">
 
 $(document).ready(function(){
 $('#tabledata').DataTable();
 }) 
 
 </script>

</body>
</html>