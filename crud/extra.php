// else if($treatment=="sonography")
    // {
    //     $q = "select in_time,time_to_lab from sono_cabin_entry_table where token_no = $token ";
    //     $query = mysqli_query($con,$q);

    //     while($res = mysqli_fetch_array($query))
    //     {
            
            
    //         echo $res['in_time']; 
    //         echo $res['time_to_lab']; 
             

    //     }

    // }
    // else if($treatment=='fracture' or $treatment=='fever' or $treatment=='others')
    // {
    //     $q = "select in_time,time_to_lab from sono_cabin_entry_table where token_no = $token ";
    //     $query = mysqli_query($con,$q);

    //     while($res = mysqli_fetch_array($query))
    //     {
            
            
    //         echo $res['in_time']; 
    //         echo $res['time_to_lab']; 
             

    //     }
        
    // }


















    <?php

if(isset($_POST["out"]))
{
    //getting current time on click
    $time_now=mktime(date('h')+5,date('i')+30,date('s'));
    $current_time = date(' H:i:s', $time_now);

    //converting time into decimal formats

    $current_time_now=strtotime($current_time);




    // converting calculated out time to decimal format

    $predict_out_time=strtotime($cal_outtime);

    if( $current_time_now > $predict_out_time )
    {
        //means he had took  extra time
        $diff= $current_time_now-$predict_out_time;

        $difference=date('H:i:s',$diff);

        //check diff is greater than 2min
        if(diff>1581379320)
        {

            //update query
            $q = "select treat_start_lab_xray,out_time_lab_xray,wait_time_lab_xray,billing_time from xray_cabin_entry_table where token_no> $token ";

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
               // echo $treat_start_lab_xray;

                //second value
                $secs2 = strtotime($difference)-strtotime('00:00:00');
                $out_time_lab_xray = date("H:i:s",strtotime($out_time)+$secs2);


                //third value
                $secs3 = strtotime($difference)-strtotime('00:00:00');
                $wait_time_lab_xray = date("H:i:s",strtotime($wait_time)+$secs3);

                    //fourth value
                $secs4 = strtotime($difference)-strtotime('00:00:00');
                $billing_time = date("H:i:s",strtotime($billing)+$secs4);

                

                $updatequery="UPDATE xray_cabin_entry_table SET treat_start_lab_xray = '$treat_start_lab_xray' ,out_time_lab_xray = '$out_time_lab_xray' , wait_time_lab_xray='$wait_time_lab_xray ', billing_time='$billing_time'  ";
                mysqli_query($con , $updatequery);
            



             }

        }



    
    }
}

?>
