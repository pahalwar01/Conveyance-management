<?php
    include '../../../connection.php';
    error_reporting(0);
?>

<?php
// सेशन शुरू करें
session_start();

$user = $_SESSION['rider_name'];

// यदि यूजर लॉगिन नहीं है, तो उसे लॉगिन पेज पर रिडायरेक्ट करें
if (!isset($_SESSION['rider_id'])) {
    header("Location: ../../logout.php");
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
    <meta name="viewport" content="width=100%, initial-scale=1.0">
    <title>Jobs</title>
    <link rel="stylesheet" href="css/works.css">
    <link rel="icon" type="image/x-icon" href="../../../../img/logo.png"> 
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
                <img src="../../../../img/logo.png" alt="logo" id="logo">
            </div>
            
            <h2><center style="height: 50px; text-align: center; color: red;"><span id="profile_name"><?php echo "<h4>Welcome " . $_SESSION['rider_name'] . "!</h4>"; ?></span></center></h2>
            
        </header>    
    </div>
    <!--header coding end-->

    <!--Navigation coding start-->
    <div class="row">
        <nav class="col-12">
            <ul>
                <li class="col-6"><a href="../../user_1.php"><i class="fas fa-arrow-left"></i> Back</a></li>
                <li class="col-6"><a href="#"><i class="fas fa-list"></i> Jobs View</a></li>
            </ul>
            
        </nav>
    </div>
    <!--Navigation coding end-->
    
    <!--section coding start-->
<section>
    <div class="col-12">
        <div class="marquee-bg">
            <marquee behavior="sliding" direction="left" scrollamount="5" class="marquee-text"><i>LIST VIEW OF YOUR TOTAL JOBS DONE IN THIS MONTH, HOPE YOU DONE THIS MONTH A GOOD WORK, SEE YOU IN NEXT MONTH, GOOD LUCK !</i></marquee>
        </div>

        <div>
            
            <?php

                $display =  "SELECT * FROM rides WHERE rider_name = '$user'";
                $rides = mysqli_query($conn, $display);

                $total = mysqli_num_rows($rides);

                // echo $total;

                if($total != 0)
                {
                    ?>

                    <h2 align="center"><mark>Displaying All Records</mark></h2>
                    <center>
                    <table border="1" cellspacing=".01" width="100%">
                        <tr>
                        <th width="5%">ID</th>
                        <th width="10%" style="display:none;">Rider Name</th>
                        <th width="10%">Sender Name</th>
                        <th width="10%">Date</th>
                        <th width="15%">Work Type</th>
                        <th width="15%">From</th>
                        <th width="15%">To</th>
                        <th width="10%">KM</th>
                        <th width="10%">Update</th>
                        </tr>
                    <?php
                    while ($result = mysqli_fetch_assoc($rides)) 
                    {
                        echo "<tr style='text-align: center;color: black;'>
                                <td>".$result['ride_id']."</td>
                                <td style='display: none;'>".$result['rider_name']."</td>
                                <td>".$result['sender_name']."</td>
                                <td>".$result['w_date']."</td>
                                <td>".$result['work_type']."</td>
                                <td>".$result['start_from']."</td>
                                <td>".$result['end_to']."</td>
                                <td>".$result['km']."</td>
                                <td style='background: black;'><a href='../update_design.php?update_id=$result[ride_id]'>Update</a></td>
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


        </div>
        
        <div id="#" style="display: none;">
        
                
        </div>
        
    </div>

    <a href="#"><i class="fas fa-plus-circle" id="addwork"></i></a>


    <div id="jobs_bg" class="animate__animated animate__fadeIn">
        <center>
        <div id="add_job" class="animate__animated animate__slideInDown">
            <h1>Add New Job</h1><br>
            <form id="add_work" action="../action.php" method="POST">
            <!-- <form id="add_work" name="submit-to-google-sheet" method="POST"> -->
                <input type="hidden" name="riderid" value="<?php echo $_SESSION['rider_id']; ?>">
                <p id="add">Your Name</p>
                <input type="text" name="rname" id="ridername" required="required" value="<?php echo $_SESSION['rider_name']; ?>"></input>
                <p id="add">Sender Name</p>
                <input type="text" name="sender" placeholder="Sender Name" id="s_name" required="required">
                <p id="add">Date</p>
                <Input type="date" name="wdate" placeholder="Date" id="date" required="required">
                <p id="add">Type Of Work</p>
                <input type="text" name="work" placeholder="Work Type" id="work_type" required="required">
                <p id="add">From:-</p>
                <input type="text" name="startfrom" placeholder="From" id="frm" required="required">
                <p id="add">To:-</p>
                <input type="text" name="endto" placeholder="To" id="to" required="required">
                <p id="add">Total K.M.</p>
                <input type="number" name="km" placeholder="Total K.M." id="total_km" required="required">
                <input type="submit"id="submit_btn" name="submit">
                <!-- <button id="submit_btn" name="submit">Submit</button> -->
                <button id="close_btn" name="close">Close</button><br>
                <span id="success"></span>
            </form>
        </div>
        </center>
    </div>
</section>
    <!--section coding end-->


    

<script src="js/works.js"></script>
<!-- <script type="module" src="js/addword.js"></script>      -->

</body>
</html>