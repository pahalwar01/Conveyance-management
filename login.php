<?php
include 'connection.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div id="container">
        <div id="loginpage">
            <div id="login" class="animate__animated animate__flipInY">
                <h1 style="text-align: center;">Login</h1>
                <form id="login_frm" autocomplete="off">
                    <input type="text" placeholder="User Name" id="login_uname" required="required">
                    <small id="email_warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Your Email ID is not Registered</small>
                    <input type="password" placeholder="Password" id="login_pwd" required="required">
                    <small id="password_warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Wrong Password</small>
                    <button type="submit" id="login_btn">Login</button>
                </form>
                <!-- <p>Don't have an account? <span id="signup_link">Sign Up</span><br><br></p> -->
            </div>
            <!-- <div id="signup" class="animate__animated animate__flipInY">
                <h1 style="text-align: center;">Sign up</h1>
                <form id="signup_frm" autocomplete="off">
                    <input type="text" required="required" placeholder="Name" id="username">
                    <input type="email" required="required" placeholder="Email" id="email">
                    <small id="email_notice"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Email ID already exist</small>
                    <input type="number" required="required" placeholder="Phone no." id="phone">
                    <input type="password" required="required" placeholder="Password" id="password">
                    <button type="submit" id="signup_btn">Sign up</button>
                </form>
                <p>Already have an account? <span id="login_link">Login</span><br><br></p>
            </div> -->
    
        </div>

    </div>
<!--Start External Javascript coding-->
    
<script src="java/login.js"></script>

<!--End External Javascript coding-->
</body>
</html>