<?php

$servername = "localhost";
$username = "myconvey_conveyance";
$password = "yDJLMnXugcteF8WWv2NU";
$dbname = "myconvey_conveyance";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn)
{
    // echo "Connection OK";
}
else
{
    echo "Connection Failed:" . mysqli_connect_error();
}

?>