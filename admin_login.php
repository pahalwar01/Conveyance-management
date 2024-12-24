<?php
include 'connection.php';
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
    <link rel="stylesheet" href="css/adminstyle.css">
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
                <h1 style="text-align: center;">Admin Login</h1>
                <!-- <form id="login_frm" autocomplete="off" method="POST"> -->
                <form id="login_frm" autocomplete="off" method="POST">
                    <input type="text" name="email" placeholder="User Name" id="login_uname" required="required">
                    <small id="email_warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Your Email ID is not Registered</small>
                    <input type="password" name="password" placeholder="Password" id="login_pwd" required="required">
                    <small id="password_warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Wrong Password</small>
                    <button type="submit" id="login_btn">Login</button>
                </form><br><br>
                <a href="index.php"><center><span id="signup_link">User Panel</span></center></a>
                 <br><br>
            </div>
        </div>

    </div>
<!--Start External Javascript coding-->


<script>
    var login_link = document.getElementById("login_link");
    var signup_link = document.getElementById("signup_link");
    var signup_box = document.getElementById("signup");
    var login_box = document.getElementById("login");
        
    login_link.onclick = function()
    {
        signup_box.style.display = "none";
        login_box.style.display = "block";
    }

    signup_link.onclick = function()
    {
        login_box.style.display = "none";
        signup_box.style.display = "block";
    }
</script>

<!--End External Javascript coding-->
</body>
</html>