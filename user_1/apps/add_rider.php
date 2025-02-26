<?php
include '../../connection/connection.php';
?>

<?php
include '../../codes/signup.php';
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
// echo "<h1>स्वागत है, " . $_SESSION['admin_name'] . "!</h1>";
// echo "<p>यह आपका डैशबोर्ड है।</p>";
// echo '<a href="logout.php">लॉगआउट</a>';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="icon" type="image/x-icon" href="img/logo.png"> 
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
                <img src="../../../img/logo.png" alt="logo" id="logo">
            </div>
            
            <h2><center style="height: 50px; text-align: center; color: red;"><span id="profile_name"><?php echo "<h4>Welcome " . $_SESSION['admin_name'] . "!</h4>"; ?></span></center></h2>
            
        </header>    
    </div>
    <!--header coding end-->

    <!--Navigation coding start-->
    <div class="row">
        <nav class="col-12">
            <ul>
                <li class="col-12"><a href="../admin_dashboard.php"><i class="fas fa-arrow-left"></i> Back</a></li>
            </ul>        
        </nav>
    </div>
    <!--Navigation coding end-->

    <div id="admin-container">
        <div id="loginpage">
            <div id="signup" class="animate__animated animate__flipInY">
                <h1 style="text-align: center;">User Sign up</h1>
                <form id="signup_frm" method="POST" autocomplete="off">
                    <input type="text" name="name" required="required" placeholder="Name" id="username">
                    <input type="email" name="email" required="required" placeholder="Email" id="email">
                    <small id="email_notice"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Email ID already exist</small>
                    <input type="number" name="phone" required="required" placeholder="Phone no." id="phone">
                    <input type="password" name="password" required="required" placeholder="Password" id="password">
                    <button type="submit" id="signup_btn">Sign up</button>
                </form>
            </div>
    
        </div>

    </div>
</body>
</html>