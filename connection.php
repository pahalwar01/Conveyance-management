<?php

$servername = "http://127.0.0.1/";
$username = "root";
$password = "";
$dbname = "mirchirider";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn)
{
    echo "Connection OK";
}
else
{
    echo "Connection Failed:" . mysqli_connect_error();
}

?>