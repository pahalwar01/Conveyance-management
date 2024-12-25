<?php


// // सेशन शुरू करें
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email']; // यूजर आईडी या ईमेल
    $password = $_POST['password'];     // पासवर्ड

    // SQL क्वेरी
    $sql = "SELECT * FROM admin WHERE (admin_id = ? OR admin_email = ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // पासवर्ड वेरिफाई करें
        if (password_verify($password, $user['admin_password'])) {
            // सेशन में यूजर की जानकारी सेव करें
            $_SESSION['admin_id'] = $user['admin_id'];
            $_SESSION['admin_name'] = $user['admin_name'];

            // रिडायरेक्ट करें
            header("Location: user_1/admin_dashboard.php");
            exit();
        } else {
            echo "गलत पासवर्ड।";
        }
    } else {
        echo "यूजर आईडी या ईमेल सही नहीं है।";
    }
}
?>