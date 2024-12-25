<?php
include '../connection.php';

// Fetch all riders
$sql = "SELECT * FROM rider";
$result = $conn->query($sql);
?>



<?php
session_start();

$user = $_SESSION['admin_name'];

// यदि यूजर लॉगिन नहीं है, तो उसे लॉगिन पेज पर रिडायरेक्ट करें
if (!isset($_SESSION['admin_id'])) {
    header("Location: logout.php");
    exit();
}

// डैशबोर्ड कंटेंट
// echo "<h1>स्वागत है, " . $_SESSION['admin_name'] . "!</h1>";
// echo "<p>यह आपका डैशबोर्ड है।</p>";
// echo '<a href="logout.php">लॉगआउट</a>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="../../img/logo.png"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
</head>
<body>
    <!--header coding start-->
    <div class="row">
        <header class="col-12">
            <div>
                <img src="../../img/logo.png" alt="logo" id="logo">
            </div>
            
            <h2><center style="height: 50px; text-align: center; color: red;"><span id="profile_name"><?php echo "<h4>Welcome " . $_SESSION['admin_name'] . "!</h4>"; ?></span></center></h2>
            
        </header>    
    </div>
    <!--header coding end-->

    <!--Navigation coding start-->
    <div class="row">
        <nav class="col-12">
            <ul>
                <li class="col-4"><a href="admin_dashboard.php"><i class="fas fa-home"></i> Home</a></li>
                <li class="col-4" id="jobview"><a href="#"><i class="fas fa-list"></i> Jobs View</a></li>
                <li class="col-4" id="logout"><a href="#"><p id="logout_text"><i class="fa-solid fa-right-from-bracket"></i> <?php echo '<a href="logout.php">Logout</a>'; ?> </p></a></li>
            </ul>        
        </nav>
    </div>
    <!--Navigation coding end-->


    <h1>Admin Dashboard</h1>
    <h2>List of Riders</h2>

    <!-- Add Rider Button -->
    <a href="add_rider.php">नया राइडर जोड़ें</a>
    <br><br>

    <!-- Riders Table -->
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>राइडर ID</th>
            <th>नाम</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['rider_id']; ?></td>
                <td><?php echo $row['rider_name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td>
                    <a href="edit_rider.php?rider_id=<?php echo $row['rider_id']; ?>">Edit</a> | 
                    <a href="delete_rider.php?rider_id=<?php echo $row['rider_id']; ?>" onclick="return confirm('क्या आप वाकई इसे हटाना चाहते हैं?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <h2>राइड्स प्रबंधन</h2>
    <a href="view_rides.php">सभी राइड्स देखें</a>

</body>
</html>
