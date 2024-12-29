<?php
include 'connection/connection.php';
?>

<?php
include 'codes/signin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="img/logo.png"> 
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
                <h1 style="text-align: center;">User Login</h1>
                <form id="login_frm" autocomplete="off" method="POST">
                    <input type="text" name="email" placeholder="User Email" id="login_uname" required="required">
                    <small id="email_warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Your Email ID is not Registered</small>
                    <input type="password" name="password" placeholder="Password" id="login_pwd" required="required">
                    <small id="password_warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Wrong Password</small>
                    <button type="submit" id="login_btn">Login</button>
                </form><br>
                <p>Don't have an account? <span id="signup_link"><a href="user_signup.php">Sign Up</a></span><br><br></p>
                <a href="admin_login.php"><center><span id="#">Admin Panel</span></center></a>
            </div>
        </div>

    </div>
</body>
</html>