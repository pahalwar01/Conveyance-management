<?php
session_start();
session_unset(); // Session variables ko clear karein
session_destroy(); // Session ko destroy karein

header("Location: ../index.php"); // Login page par redirect karein
exit;
?>

