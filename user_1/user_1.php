<?php
    include '../connection/connection.php';
    error_reporting(0);
?>

<?php
    include '../codes/signin.php';
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





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="../../img/logo.png"> 
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
            
            <h2><center style="height: 50px; text-align: center; color: red;"><span id="profile_name"><?php echo "<h4>Welcome " . $_SESSION['rider_name'] . "!</h4>"; ?></span></center></h2>
            
        </header>    
    </div>
    <!--header coding end-->

    <!--Navigation coding start-->
    <div class="row">
        <nav class="col-12">
            <ul>
                <li class="col-4"><a href="user_1.php"><i class="fas fa-home"></i> Home</a></li>
                <li class="col-4" id="jobview"><a href="apps/works/works.php"><i class="fas fa-list"></i> Jobs View</a></li>
                <li class="col-4" id="logout"><a href="#"><p id="logout_text"><i class="fa-solid fa-right-from-bracket"></i> <?php echo '<a href="logout.php">Logout</a>'; ?> </p></a></li>
            </ul>
            
        </nav>
    </div>
    <!--Navigation coding end-->

    <section>

        <div class="row">
            <center>
                <div id="rider">
                    <!-- users view panel -->

                    <div style="float: left;">
                        <h5>Download <img src="../img/android.png" alt="Android" style="width: 20px; height: 20px;"></h5>
                    </div><br><br><br><br><br>
                        <h2>View monthly rides data</h2><br>
                            <form action="apps/rides_by_month.php" method="GET">
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
                                <br>
                                <label for="year">Year:</label>
                                <!-- <select id="month" name="month" required>
                                    <option value="">Select Year</option>
                                    <option value="01">2025</option>
                                    <option value="02">2025</option>
                                    <option value="03">2026</option>
                                </select> -->
                                <input type="number" id="year" name="year" min="2024" max="2030" required>
                                <br>
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
        
    </section>


<script src="js/java.js"></script>
</body>
</html>