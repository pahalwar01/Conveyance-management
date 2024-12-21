<?php

//Login code starts here

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM rider WHERE Email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rider = $result->fetch_assoc();
        if (password_verify($password, $rider['password'])) {
            $_SESSION['RiderID'] = $rider['RiderID']; // Session set karein
            $_SESSION['Name'] = $rider['Name'];
            echo "Login successful! Welcome " . $rider['Name'];
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No rider found with this email!";
    }
}
// Login code ends here


?>