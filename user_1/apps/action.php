<?php
include '../../connection.php';
?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "SELECT * FROM rider WHERE (rider_id = ? OR email = ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $riderid = "SELECT rider_id FROM rider WHERE rider_name = '$user'"; ;

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // पासवर्ड वेरिफाई करें
        if (password_verify($password, $user['password'])) {
            // सेशन में यूजर की जानकारी सेव करें
            $_SESSION['rider_id'] = $user['rider_id'];
            $_SESSION['rider_name'] = $user['rider_name'];

            // रिडायरेक्ट करें
            header("Location: user_1/user_1.php");
            exit();
        } else {
            echo "गलत पासवर्ड।";
        }
    } else {
        echo "यूजर आईडी या ईमेल सही नहीं है।";
    }
}
?>


<?php
// सेशन शुरू करें
session_start();

$user = $_SESSION['rider_name'];

// यदि यूजर लॉगिन नहीं है, तो उसे लॉगिन पेज पर रिडायरेक्ट करें
if (!isset($_SESSION['rider_id'])) {
    header("Location: logout.php");
    exit();
}

// डैशबोर्ड कंटेंट
// echo "<h1>स्वागत है, " . $_SESSION['rider_name'] . "!</h1>";
// echo "<p>यह आपका डैशबोर्ड है।</p>";
// echo '<a href="logout.php">लॉगआउट</a>';
?>


<?php


if(isset($_POST['submit']))
{

    $rider_id    =$_POST['riderid'];
    $rname      =$_POST['rname'];
    $sname      =$_POST['sender'];
    $date       =$_POST['wdate'];
    $work       =$_POST['work'];
    $from       =$_POST['startfrom'];
    $to         =$_POST['endto'];
    $km         =$_POST['km'];


    if($rname=="$user"){
        $query="INSERT INTO rides values ('$ride_id','$rider_id','$rname','$sname','$date','$work','$from','$to','$km')";
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
}


?>