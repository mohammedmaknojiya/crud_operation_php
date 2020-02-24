<?php
/*For My LocalPC*/
$con=mysqli_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error());
mysqli_select_db ($con,'hospital_login_db');
session_start();
?>

<?php
if (isset($_POST["submit"]))
{
    $token=$_POST['token'];
    $treatment=$_POST['treatment'];
    $_SESSION["treatment"]=$treatment;
    $_SESSION["token"]=$token;
///first treatment
    if ($treatment=="xray")
    {
        $q = "select treat_start_lab_xray,out_time_lab_xray from xray_cabin_entry_table where token_no=$token ";
        $query = mysqli_query($con,$q);

        while($res = mysqli_fetch_array($query))
        {
            
            
            $cal_intime=$res['treat_start_lab_xray']; 
            $cal_outtime= $res['out_time_lab_xray']; 
            $_SESSION["cal_out_time"]= $cal_outtime;

        }
    }
    /////first treatment ends
///////second treatment
    else if ($treatment=="mri")
    {
        $q = "select treat_start_lab_mri,out_time_lab_mri from mri_cabin_entry_table where token_no=$token ";
        $query = mysqli_query($con,$q);

        while($res = mysqli_fetch_array($query))
        {
            
            
            $cal_intime=$res['treat_start_lab_mri']; 
            $cal_outtime= $res['out_time_lab_mri']; 
            $_SESSION["cal_out_time"]= $cal_outtime;

        }
    }
////second treatment ends 
///////third treatment
else if ($treatment=="sonography")
{
    $q = "select treat_start_lab_sono,out_time_lab_sono from sono_cabin_entry_table where token_no=$token ";
    $query = mysqli_query($con,$q);

    while($res = mysqli_fetch_array($query))
    {
        
        
        $cal_intime=$res['treat_start_lab_sono']; 
        $cal_outtime= $res['out_time_lab_sono']; 
        $_SESSION["cal_out_time"]= $cal_outtime;

    }
}
////third treatment ends 
///////fourth treatment
else if ($treatment=="blood")
{
    $q = "select treat_start_lab_blood,out_time_lab_blood from blood_cabin_entry_table where token_no=$token ";
    $query = mysqli_query($con,$q);

    while($res = mysqli_fetch_array($query))
    {
        
        
        $cal_intime=$res['treat_start_lab_blood']; 
        $cal_outtime= $res['out_time_lab_blood']; 
        $_SESSION["cal_out_time"]= $cal_outtime;

    }
}
////fourth treatment ends 





}
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
            <h1 class="text-warning text-center" > Display User Data </h1>
        <br>
            <table  id="tabledata" class=" table table-striped table-hover table-bordered">
            
                    <tr class="bg-dark text-white text-center">
                    
                    <th> Id </th>
                    <th> Treatment </th>
                    <th> Cal_In_Time </th>
                    <th> Cal_Out_Time </th>
                    <th> Actual_In_Time </th>
                    <th> Actual_Out_Time</th>

                    </tr >

                    <tr class="text-center">
                    <td> <?php echo $token  ?> </td>
                    <td> <?php echo $treatment  ?> </td>
                    <td> <?php echo $cal_intime  ?> </td>
                    <td> <?php echo $cal_outtime  ?> </td>
                    <td> <button class="btn-danger btn" name="in"> Actual_In  </button> </td>
                    <form method="post" action="updatedata.php">
                    <td> <button class="btn-primary btn" name="out"> Actual_Out </button> </td>
                    </form>
                    </tr>
            </table>
        </div>
       <a href="all.php"> <button class="btn-primary btn" > Back_To_Entry_Page </button></a>

 </div>



</body>
</html>