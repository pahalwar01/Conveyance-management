<?php
include '../../../connection.php';
?>


<?php

if(isset($_POST['submit']))
{
    $rname  =$_POST['rname'];
    $sname  =$_POST['sender'];
    $date   =$_POST['wdate'];
    $work   =$_POST['work'];
    $from   =$_POST['startfrom'];
    $to     =$_POST['endto'];
    $km     =$_POST['km'];

    //DHARAMPAL DATA SEPRATE

    if($rname=="Dharam Pal"){
        $query="INSERT INTO dharampal values ('$id','$rname','$sname','$date','$work','$from','$to','$km')";
    $send=mysqli_query($conn,$query);

    if($send)
    {
        echo "Data inserted into database";
        header("Location: works/works.php");
    }
    else{
        echo "Failed";
    }
    }

    //KARAN DATA SEPRATE
    // if($rname=="#"){
    //     $query="INSERT INTO dharampal values ('$id','$rname','$sname','$date','$work','$from','$to','$km')";
    // $send=mysqli_query($conn,$query);

    // if($send)
    // {
    //     echo "Data inserted into database";
    //     header("Location: works/works.php");
    // }
    // else{
    //     echo "Failed";
    // }
    // }



    // //LALIT DATA SEPRATE
    // if($rname=="#"){
    //     $query="INSERT INTO dharampal values ('$id','$rname','$sname','$date','$work','$from','$to','$km')";
    // $send=mysqli_query($conn,$query);

    // if($send)
    // {
    //     echo "Data inserted into database";
    //     header("Location: works/works.php");
    // }
    // else{
    //     echo "Failed";
    // }
    // }

    //..//..//..//..//..//..//..//..//..//..//..//..//..//..//..//..//..//..//..//..//..//..//..//..//..//..//..//..//..//..

    $query="INSERT INTO data values ('$id','$rname','$sname','$date','$work','$from','$to','$km')";
    $send=mysqli_query($conn,$query);

    if($send)
    {
        echo "Data inserted into database";
        header("Location: works/works.php");
    }
    else{
        echo "Failed";
    }
}


?>