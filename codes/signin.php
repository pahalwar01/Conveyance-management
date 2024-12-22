<?php

//Login code starts here

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     $sql = "SELECT * FROM rider WHERE Email = '$email'";
//     $result = $conn->query($sql);

//     if ($result->num_rows > 0) {
//         $rider = $result->fetch_assoc();
//         if (password_verify($password, $rider['password'])) {
//             $_SESSION['RiderID'] = $rider['RiderID']; // Session set karein
//             $_SESSION['Name'] = $rider['Name'];
//             echo "Login successful! Welcome " . $rider['Name'];
//             header("Location: ../user_1/user_1.php");
//         } else {
//             echo "Invalid password!";
//         }
//     } else {
//         echo "No rider found with this email!";
//     }
// }
// Login code ends here

?>

<?php


// सेशन शुरू करें
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email']; // यूजर आईडी या ईमेल
    $password = $_POST['password'];     // पासवर्ड

    // SQL क्वेरी
    $sql = "SELECT * FROM rider WHERE (rider_id = ? OR email = ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // पासवर्ड वेरिफाई करें
        if (password_verify($password, $user['password'])) {
            // सेशन में यूजर की जानकारी सेव करें
            $_SESSION['rider_id'] = $user['rider_id'];
            $_SESSION['rider_name'] = $user['rider_name'];

            // रिडायरेक्ट करें
            header("Location: user_1/user_1.php");
            exit();
        } else {
            echo "गलत पासवर्ड।";
        }
    } else {
        echo "यूजर आईडी या ईमेल सही नहीं है।";
    }
}
?>
