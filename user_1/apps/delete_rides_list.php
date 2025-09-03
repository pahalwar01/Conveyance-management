<?php
include '../../connection/connection.php';
// Fetch all riders
$sql = "SELECT * FROM rider";
$result = $conn->query($sql);
?>


<?php
session_start();

$user = $_SESSION['admin_name'];

// यदि यूजर लॉगिन नहीं है, तो उसे लॉगिन पेज पर रिडायरेक्ट करें
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../logout.php");
    exit();
}

// डैशबोर्ड कंटेंट
// echo "<h1>स्वागत है, " . $_SESSION['rider_name'] . "!</h1>";
// echo "<p>यह आपका डैशबोर्ड है।</p>";
// echo '<a href="logout.php">लॉगआउट</a>';
?>

<html>
<head>
    <title>For Delete Rides List By Month</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/x-icon" href="../../img/logo.png"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<div id="displayfornonprint">
    <!--header coding start-->
<div class="row">
        <header class="col-12">
            <div>
                <img src="../../img/logo.png" alt="logo" id="logo">
            </div>
            
            <h2><center style="height: 50px; text-align: center; color: red;"><span id="profile_name"><?php echo $_SESSION['admin_name'] . "!</h4>"; ?></span></center></h2>
            
        </header>    
    </div>
    <!--header coding end-->

    <!--Navigation coding start-->
    <div class="row">
        <nav class="col-12">
            <ul>
                <li class="col-12"><a href="admin_delete_rides.php"><i class="fas fa-arrow-left"></i> Back</a></li>
            </ul>
            
        </nav>
    </div>
    <!--Navigation coding end-->


</div>

<div id="displayforprint">
<section>
<style>
        table
        {
            background:rgb(115, 238, 167);
        }
    </style>


<?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['rider_id']) && isset($_GET['month']) && isset($_GET['year'])) {
        // session_start();

        // राइडर की जानकारी सेशन से प्राप्त करें
        // $rider_id = $_SESSION['rider_id'];

        

        // चुना गया महीना और साल
        $rider_id = $_GET['rider_id'];
        $month = $_GET['month'];
        $year = $_GET['year'];

        // राइड्स डेटा प्राप्त करें
        $sql = "SELECT ride_id, rider_id, rider_name, sender_name, w_date, work_type, start_from, end_to, km 
                FROM rides 
                WHERE rider_id = ? AND MONTH(w_date) = ? AND YEAR(w_date) = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $rider_id, $month, $year);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<table border='1' cellpadding='10' cellspacing='2' width='100%'>
                    <tr>
                        <th width='5%'>Ride ID</th>
                        <th width='11%'>Rider Name</th>
                        <th width='15%'>Sender Name</th>
                        <th width='10%'>Work Date</th>
                        <th width='18%'>Work Type</th>
                        <th width='18%'>Start From</th>
                        <th width='18%'>End To</th>
                        <th width='5%'>KM.</th>
                        <th width='5%'>Delete</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['ride_id']}</td>
                        <td>{$row['rider_name']}</td>
                        <td>{$row['sender_name']}</td>
                        <td>{$row['w_date']}</td>
                        <td>{$row['work_type']}</td>
                        <td>{$row['start_from']}</td>
                        <td>{$row['end_to']}</td>
                        <td>{$row['km']}</td>
                        <td style='background-color:black';><a href='delete.php?ride_id=$row[ride_id]'>Delete</a></td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>इस महीने की कोई राइड नहीं है।</p>";
        }
    }
    ?>
</div>


</section>
</html>