<?php
include '../connection/connection.php';

// Fetch all riders
$sql = "SELECT * FROM rider";
$result = $conn->query($sql);
?>


<?php
session_start();

$user = $_SESSION['admin_name'];

// यदि यूजर लॉगिन नहीं है, तो उसे लॉगिन पेज पर रिडायरेक्ट करें
if (!isset($_SESSION['admin_id'])) {
    header("Location: logout.php");
    exit();
}

// डैशबोर्ड कंटेंट
// echo "<h1>स्वागत है, " . $_SESSION['admin_name'] . "!</h1>";
// echo "<p>यह आपका डैशबोर्ड है।</p>";
// echo '<a href="logout.php">लॉगआउट</a>';
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Rides</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin_dashboard.css">
    <link rel="icon" type="image/x-icon" href="../img/logo.png"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

    <!--header coding start-->
    <div class="row">
        <header class="col-12">
            <div>
                <img src="../../img/logo.png" alt="logo" id="logo">
            </div>
            
            <h2><center style="height: 50px; text-align: center; color: red;"><span id="profile_name"><?php echo "<h4>Welcome " . $_SESSION['admin_name'] . "!</h4>"; ?></span></center></h2>
            
        </header>    
    </div>
    <!--header coding end-->

    <!--Navigation coding start-->
    <div class="row">
        <nav class="col-12">
            <ul>
                <li class="col-3"><a href="admin_dashboard.php"><i class="fas fa-home"></i> Home</a></li>
                <li class="col-3" id="jobview"><a href="admin_jobview.php"><i class="fa-solid fa-print"></i> Print</a></li>
                <li class="col-3" id="jobview"><a href="apps/admin_delete_rides.php"><i class="fa-solid fa-trash"></i> Delete</a></li>
                <li class="col-3" id="logout"><a href="#"><p id="logout_text"><i class="fa-solid fa-right-from-bracket"></i> <?php echo '<a href="logout.php">Logout</a>'; ?> </p></a></li>
            </ul>       
        </nav>
    </div>
    <!--Navigation coding end-->


<div class="row">
            <center>
                <div id="rider">
                    <h2 align ="center" style="height: 50px; text-align: center; color: red;">Your Ride Details <span id="riderdetails"></span></h2>
                    <br>
                    <!-- users view panel -->

                    <div>
                        <h2>View Monthly Rider Data</h2><br>
                            <form action="apps/admin_rides_by_month.php" method="GET">
                                <label for="rider_id">Rider ID:</label>
                                <input type="text" name="rider_id" id="rider_id"><br><br>
                                <label for="month">Month:</label>
                                <select id="month" name="month" required>
                                    <option value="">Select Month</option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                <br><br>
                                <label for="year">Year:</label>
                                <input type="number" id="year" name="year" min="2024" max="2030" required>
                                <br><br>
                                <button type="submit" style="font-family: 'Ubuntu', sans-serif; 
                                                        font-size: 20px; 
                                                        padding: 5px 10px; 
                                                        margin-top: 15px; 
                                                        color: white; 
                                                        background-color: purple; 
                                                        margin-bottom: 10px;">Show Rides</button>
                            </form>
                            <hr>
                    </div>

                </div>

            </center>
            <br><br><br>
        </div>
</body>
</html>

<?php
include '../connection/connection.php';
error_reporting(0);
?>

<?php

$display =  "SELECT * FROM rides ORDER BY ride_id DESC";
$rides = mysqli_query($conn, $display);

$total = mysqli_num_rows($rides);

// echo $total;

if($total != 0)
{
    ?>

    <h2 align="center"><mark>Displaying All Records</mark></h2>
    <center>
    <table border="1" cellspacing="5" width="100%">
        <tr class="col-12">
        <th>ID</th>
        <th>Rider Name</th>
        <th>Sender Name</th>
        <th>Date</th>
        <th>Work Type</th>
        <th>From</th>
        <th>To</th>
        <th>Total KM</th>
        <th>Operations</th>
        </tr>
    
    <?php
    while ($result = mysqli_fetch_assoc($rides)) 
    {
        echo "<tr>
                <td>".$result['ride_id']."</td>
                <td>".$result['rider_name']."</td>
                <td>".$result['sender_name']."</td>
                <td>".$result['w_date']."</td>
                <td>".$result['work_type']."</td>
                <td>".$result['start_from']."</td>
                <td>".$result['end_to']."</td>
                <td>".$result['km']."</td>

                <td style='background-color:black';><a href='apps/admin_update_design.php?update_id=$result[ride_id]'>Update</a></td>
            </tr>
            ";
    }
        }
        else
        {
            echo "No records found";
        }

        ?>
    </table>
    </center>