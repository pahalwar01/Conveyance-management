<?php

//Signup code starts here

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password

    $sql = "INSERT INTO admin (admin_name, admin_email, admin_phone, admin_password) VALUES ('$name', '$email', '$phone', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

//Signup code ends here

?>