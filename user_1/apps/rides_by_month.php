<?php
include '../../connection.php';
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

<html>
<head>
    <title>Rides By Month</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/x-icon" href="../img/logo.png"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<!--header coding start-->
<div class="row">
        <header class="col-12">
            <div>
                <img src="../../img/logo.png" alt="logo" id="logo">
            </div>
            
            <h2><center style="height: 50px; text-align: center; color: red;"><span id="profile_name"><?php echo "<h4>Welcome " . $_SESSION['rider_name'] . "!</h4>"; ?></span></center></h2>
            
        </header>    
    </div>
    <!--header coding end-->

    <!--Navigation coding start-->
    <div class="row">
        <nav class="col-12">
            <ul>
                <li class="col-12"><a href="../user_1.php"><i class="fas fa-arrow-left"></i> Back</a></li>
            </ul>
            
        </nav>
    </div>
    <!--Navigation coding end-->

<section>
<style>
        table
        {
            background:rgb(115, 238, 167);
        }
    </style>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['month']) && isset($_GET['year'])) {
        // session_start();

        // राइडर की जानकारी सेशन से प्राप्त करें
        $rider_id = $_SESSION['rider_id'];

        // चुना गया महीना और साल
        $month = $_GET['month'];
        $year = $_GET['year'];

        // राइड्स डेटा प्राप्त करें
        $sql = "SELECT ride_id, sender_name, w_date, work_type, start_from, end_to, km 
                FROM rides 
                WHERE rider_id = ? AND MONTH(w_date) = ? AND YEAR(w_date) = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $rider_id, $month, $year);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<h3>Your Rides DATA For ($month-$year):</h3>";
            echo "<table border='1' cellpadding='10' cellspacing='0'>
                    <tr>
                        <th>Ride ID</th>
                        <th>Sender Name</th>
                        <th>Work Date</th>
                        <th>Work Type</th>
                        <th>Start From</th>
                        <th>End To</th>
                        <th>KM.</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['ride_id']}</td>
                        <td>{$row['sender_name']}</td>
                        <td>{$row['w_date']}</td>
                        <td>{$row['work_type']}</td>
                        <td>{$row['start_from']}</td>
                        <td>{$row['end_to']}</td>
                        <td>{$row['km']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>इस महीने की कोई राइड नहीं है।</p>";
        }
    }
    ?>

</section>
</html>