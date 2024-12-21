<?php

//Login code starts here

if(isset($_POST['email']) && isset($_POST['password']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM rider WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if($row)
    {
        echo "Login Success";
    }
    else
    {
        echo "Login Failed";
    }
}
else
{
    echo "Invalid Request";
}

// Login code ends here


?>