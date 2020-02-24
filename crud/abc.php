<?php
/*For My LocalPC*/
header("location: ./second.html");
$con=mysqli_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error());
mysqli_select_db ($con,'hospital_login_db');
?>


<?php
if(isset($_POST["thirty_min"]))
{

$extratime="00:30:00";

$q = "select treat_start_lab_xray,out_time_lab_xray,wait_time_lab_xray,billing_time from xray_cabin_entry_table where token_no>1  ";

 $query = mysqli_query($con,$q);
//  if($query)
//       {
//           echo '<script type="text/javascript">alert("User data inserted ")</script>';
         
          
//       }
//   else
//       {
//           echo '<p class="bg-danger msg-block">Registration Unsuccessful  </p>';
//         }

 while($row = mysqli_fetch_array($query))
 {
     $treat_start = $row["treat_start_lab_xray"];
     $out_time=$row["out_time_lab_xray"];
     $wait_time=$row["wait_time_lab_xray"];
     $billing=$row["billing_time"];

    // echo "data loaded";

    // first value
     $secs1 = strtotime($extratime)-strtotime('00:00:00');
     $treat_start_lab_xray = date("H:i:s",strtotime($treat_start)+$secs1);
     echo $treat_start_lab_xray;

     //second value
     $secs2 = strtotime($extratime)-strtotime('00:00:00');
     $out_time_lab_xray = date("H:i:s",strtotime($out_time)+$secs2);


     //third value
     $secs3 = strtotime($extratime)-strtotime('00:00:00');
     $wait_time_lab_xray = date("H:i:s",strtotime($wait_time)+$secs3);

        //fourth value
     $secs4 = strtotime($extratime)-strtotime('00:00:00');
     $billing_time = date("H:i:s",strtotime($billing)+$secs4);

     //echo "data added";
  

     $updatequery="UPDATE xray_cabin_entry_table SET treat_start_lab_xray = '$treat_start_lab_xray' ,out_time_lab_xray = '$out_time_lab_xray' , wait_time_lab_xray='$wait_time_lab_xray ', billing_time='$billing_time' where token_no>1 ";
     mysqli_query($con , $updatequery);
    //  if (mysqli_query($con , $updatequery)) {
    //     echo "Record updated successfully";
    // } else {
    //     echo "Error updating record: ";
    // }
      
    
}
}else if(isset($_POST['one_hour'])){
    $extratime="01:00:00";

    $q = "select treat_start_lab_xray,out_time_lab_xray,wait_time_lab_xray,billing_time from xray_cabin_entry_table where token_no>1  ";

    $query = mysqli_query($con,$q);
    //  if($query)
    //       {
    //           echo '<script type="text/javascript">alert("User data inserted ")</script>';
            
            
    //       }
    //   else
    //       {
    //           echo '<p class="bg-danger msg-block">Registration Unsuccessful  </p>';
    //         }

    while($row = mysqli_fetch_array($query))
    {
        $treat_start = $row["treat_start_lab_xray"];
        $out_time=$row["out_time_lab_xray"];
        $wait_time=$row["wait_time_lab_xray"];
        $billing=$row["billing_time"];

        // echo "data loaded";

        // first value
        $secs1 = strtotime($extratime)-strtotime('00:00:00');
        $treat_start_lab_xray = date("H:i:s",strtotime($treat_start)+$secs1);
        echo $treat_start_lab_xray;

        //second value
        $secs2 = strtotime($extratime)-strtotime('00:00:00');
        $out_time_lab_xray = date("H:i:s",strtotime($out_time)+$secs2);


        //third value
        $secs3 = strtotime($extratime)-strtotime('00:00:00');
        $wait_time_lab_xray = date("H:i:s",strtotime($wait_time)+$secs3);

            //fourth value
        $secs4 = strtotime($extratime)-strtotime('00:00:00');
        $billing_time = date("H:i:s",strtotime($billing)+$secs4);

        //echo "data added";
    

        $updatequery="UPDATE xray_cabin_entry_table SET treat_start_lab_xray = '$treat_start_lab_xray' ,out_time_lab_xray = '$out_time_lab_xray' , wait_time_lab_xray='$wait_time_lab_xray ', billing_time='$billing_time' where token_no>1 ";
        mysqli_query($con , $updatequery);
        //  if (mysqli_query($con , $updatequery)) {
        //     echo "Record updated successfully";
        // } else {
        //     echo "Error updating record: ";
        // }
        
        
    }
}else{
    header("location: ./second.html");
}

?>



