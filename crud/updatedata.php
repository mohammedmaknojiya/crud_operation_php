<?php
/*For My LocalPC*/
$con=mysqli_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error());
mysqli_select_db ($con,'hospital_login_db');
session_start();
?>



<?php

if(isset($_POST["out"]))
{
    //getting current time on click
    $time_now=mktime(date('H')+5,date('i')+30,date('s'));
    $current_time = date(' H:i:s', $time_now);



    /////////token number /////////////
    $token1=$_SESSION["token"];
    $treatment1=$_SESSION["treatment"];

    //converting time into decimal formats

    $current_time_now=strtotime($current_time);

    //calculate out time fetch query

    // $q = "select treat_start_lab_xray,out_time_lab_xray from xray_cabin_entry_table where token_no=1";
    //     $query = mysqli_query($con,$q);

    //     while($res = mysqli_fetch_array($query))
    //     {
            
            
    //         $cal_intime=$res['treat_start_lab_xray']; 
    //         $cal_outtime= $res['out_time_lab_xray']; 
             

    //     }



    // converting calculated out time to decimal format

    $cal_out_time=$_SESSION["cal_out_time"];

    $predict_out_time=strtotime($cal_out_time);

    if( $current_time > $cal_out_time )
    {
        //means he had took  extra time
        // $diff= $current_time_now-$predict_out_time;
        // echo $diff;
        // $difference=date('H:i:s',$diff);
        // echo $difference;
        $secs8 = strtotime($cal_out_time)-strtotime("00:00:00");
        $difference= date("H:i:s",strtotime($current_time)-$secs8);
        //echo $difference;
        $diff=strtotime($difference);

        //check diff is greater than 2min
        
       ////////////////////////////first treatment start /////////////////////////////
            //update query

            if($treatment1=="xray")
            {
            $q = "select treat_start_lab_xray,out_time_lab_xray,wait_time_lab_xray,billing_time from xray_cabin_entry_table where token_no> $token1";

            $query = mysqli_query($con,$q);



            while($row = mysqli_fetch_array($query))
            {
                $treat_start = $row["treat_start_lab_xray"];
                $out_time=$row["out_time_lab_xray"];
                $wait_time=$row["wait_time_lab_xray"];
                $billing=$row["billing_time"];

                

                // first value
                $secs1 = strtotime($difference)-strtotime('00:00:00');
                $treat_start_lab_xray = date("H:i:s",strtotime($treat_start)+$secs1);
               //echo $treat_start_lab_xray;

                //second value
                $secs2 = strtotime($difference)-strtotime('00:00:00');
                $out_time_lab_xray = date("H:i:s",strtotime($out_time)+$secs2);


                //third value
                $secs3 = strtotime($difference)-strtotime('00:00:00');
                $wait_time_lab_xray = date("H:i:s",strtotime($wait_time)+$secs3);

                    //fourth value
                $secs4 = strtotime($difference)-strtotime('00:00:00');
                $billing_time = date("H:i:s",strtotime($billing)+$secs4);

                
                // if($diff>1581465720)
                if($difference>"00:02:00")
                {
                   // $updatequery="UPDATE xray_cabin_entry_table SET token_no=token_no+1 where token_no>$token1 ";
                $updatequery="UPDATE xray_cabin_entry_table SET treat_start_lab_xray = '$treat_start_lab_xray' ,out_time_lab_xray = '$out_time_lab_xray' , wait_time_lab_xray='$wait_time_lab_xray ', billing_time='$billing_time' where token_no>$token1 ";
                mysqli_query($con , $updatequery);
            
                }

             }
            }

            ///////////////////first treatment ends /////////////////////////////////////



            ////////////////////////////second treatment start /////////////////////////////
            //update query

            else if($treatment1=="mri")
            {
            $q = "select treat_start_lab_mri,out_time_lab_mri,wait_time_lab_mri,billing_time from mri_cabin_entry_table where token_no> $token1";

            $query = mysqli_query($con,$q);



            while($row = mysqli_fetch_array($query))
            {
                $treat_start = $row["treat_start_lab_mri"];
                $out_time=$row["out_time_lab_mri"];
                $wait_time=$row["wait_time_lab_mri"];
                $billing=$row["billing_time"];

                

                // first value
                $secs1 = strtotime($difference)-strtotime('00:00:00');
                $treat_start_lab_mri = date("H:i:s",strtotime($treat_start)+$secs1);
               //echo $treat_start_lab_xray;

                //second value
                $secs2 = strtotime($difference)-strtotime('00:00:00');
                $out_time_lab_mri = date("H:i:s",strtotime($out_time)+$secs2);


                //third value
                $secs3 = strtotime($difference)-strtotime('00:00:00');
                $wait_time_lab_mri = date("H:i:s",strtotime($wait_time)+$secs3);

                    //fourth value
                $secs4 = strtotime($difference)-strtotime('00:00:00');
                $billing_time = date("H:i:s",strtotime($billing)+$secs4);

                
                if($diff>1581465720)
                {
                   // $updatequery="UPDATE xray_cabin_entry_table SET token_no=token_no+1 where token_no>$token1 ";
                $updatequery="UPDATE mri_cabin_entry_table SET treat_start_lab_mri = '$treat_start_lab_mri' ,out_time_lab_mri = '$out_time_lab_mri' , wait_time_lab_mri='$wait_time_lab_mri ', billing_time='$billing_time' where token_no>$token1 ";
                mysqli_query($con , $updatequery);
            
                }

             }
            }

            ///////////////////second treatment ends /////////////////////////////////////


            ////////////////////////////third treatment start /////////////////////////////
            //update query

            else if($treatment1=="sonography")
            {
            $q = "select treat_start_lab_sono,out_time_lab_sono,wait_time_lab_sono,billing_time from sono_cabin_entry_table where token_no> $token1";

            $query = mysqli_query($con,$q);



            while($row = mysqli_fetch_array($query))
            {
                $treat_start = $row["treat_start_lab_sono"];
                $out_time=$row["out_time_lab_sono"];
                $wait_time=$row["wait_time_lab_sono"];
                $billing=$row["billing_time"];

                

                // first value
                $secs1 = strtotime($difference)-strtotime('00:00:00');
                $treat_start_lab_sono = date("H:i:s",strtotime($treat_start)+$secs1);
               //echo $treat_start_lab_xray;

                //second value
                $secs2 = strtotime($difference)-strtotime('00:00:00');
                $out_time_lab_sono = date("H:i:s",strtotime($out_time)+$secs2);


                //third value
                $secs3 = strtotime($difference)-strtotime('00:00:00');
                $wait_time_lab_sono = date("H:i:s",strtotime($wait_time)+$secs3);

                    //fourth value
                $secs4 = strtotime($difference)-strtotime('00:00:00');
                $billing_time = date("H:i:s",strtotime($billing)+$secs4);

                
                if($diff>1581465720)
                {
                   // $updatequery="UPDATE xray_cabin_entry_table SET token_no=token_no+1 where token_no>$token1 ";
                $updatequery="UPDATE sono_cabin_entry_table SET treat_start_lab_sono = '$treat_start_lab_sono' ,out_time_lab_sono = '$out_time_lab_sono' , wait_time_lab_sono='$wait_time_lab_sono ', billing_time='$billing_time' where token_no>$token1 ";
                mysqli_query($con , $updatequery);
            
                }

             }
            }

            ///////////////////third treatment ends /////////////////////////////////////
            ////////////////////////////fourth treatment start /////////////////////////////
            //update query

            else if($treatment1=="bloodcheck")
            {
            $q = "select treat_start_lab_blood,out_time_lab_blood,wait_time_lab_blood,billing_time from blood_cabin_entry_table where token_no> $token1";

            $query = mysqli_query($con,$q);



            while($row = mysqli_fetch_array($query))
            {
                $treat_start = $row["treat_start_lab_blood"];
                $out_time=$row["out_time_lab_blood"];
                $wait_time=$row["wait_time_lab_blood"];
                $billing=$row["billing_time"];

                

                // first value
                $secs1 = strtotime($difference)-strtotime('00:00:00');
                $treat_start_lab_blood = date("H:i:s",strtotime($treat_start)+$secs1);
               //echo $treat_start_lab_xray;

                //second value
                $secs2 = strtotime($difference)-strtotime('00:00:00');
                $out_time_lab_blood = date("H:i:s",strtotime($out_time)+$secs2);


                //third value
                $secs3 = strtotime($difference)-strtotime('00:00:00');
                $wait_time_lab_blood = date("H:i:s",strtotime($wait_time)+$secs3);

                    //fourth value
                $secs4 = strtotime($difference)-strtotime('00:00:00');
                $billing_time = date("H:i:s",strtotime($billing)+$secs4);

                
                if($diff>1581465720)
                {
                   // $updatequery="UPDATE xray_cabin_entry_table SET token_no=token_no+1 where token_no>$token1 ";
                $updatequery="UPDATE blood_cabin_entry_table SET treat_start_lab_blood = '$treat_start_lab_blood' ,out_time_lab_blood = '$out_time_lab_blood' , wait_time_lab_blood='$wait_time_lab_blood ', billing_time='$billing_time' where token_no>$token1 ";
                mysqli_query($con , $updatequery);
            
                }

             }
            }

            ///////////////////fourth treatment ends /////////////////////////////////////

    
    }
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
            <h1 class="text-warning text-center" > Data Updated </h1>
        <br>
             </div>
       <a href="all.php"> <button class="btn-primary btn" > Back_To_Detail_Page </button></a>

 </div>



</body>
</html>