<?php
include '../../connection.php';
?>

<html>
<head>
    <title>Rides By Month</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="../img/logo.png"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body
        {
            background: #D071f9;
        }
        table
        {
            background:white;
        }
    </style>
</head>

<!--header coding start-->
<div class="row">
        <header class="col-12">
            <div>
                <img src="../../img/logo.png" alt="logo" id="logo">
            </div>
            
            <h2><center style="height: 50px; text-align: center; color: red;"><span id="profile_name"><?php echo "<h4>Welcome " . $_SESSION['rider_name'] . "!</h4>"; ?></span></center></h2>
            
        </header>    
    </div>
    <!--header coding end-->

    <!--Navigation coding start-->
    <div class="row">
        <nav class="col-12">
            <ul>
                <li class="col-4"><a href="user_1.php"><i class="fas fa-home"></i> Home</a></li>
                <li class="col-4" id="jobview"><a href="apps/works/works.php"><i class="fas fa-list"></i> Jobs View</a></li>
                <li class="col-4" id="logout"><a href="#"><p id="logout_text"><i class="fa-solid fa-right-from-bracket"></i> <?php echo '<a href="logout.php">Logout</a>'; ?> </p></a></li>
            </ul>
            
        </nav>
    </div>
    <!--Navigation coding end-->

</html>


<?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['month']) && isset($_GET['year'])) {
        session_start();

        // राइडर की जानकारी सेशन से प्राप्त करें
        $rider_id = $_SESSION['rider_id'];

        // चुना गया महीना और साल
        $month = $_GET['month'];
        $year = $_GET['year'];

        // राइड्स डेटा प्राप्त करें
        $sql = "SELECT ride_id, sender_name, w_date, work_type, start_from, end_to, km 
                FROM rides 
                WHERE rider_id = ? AND MONTH(w_date) = ? AND YEAR(w_date) = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $rider_id, $month, $year);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<h3>राइड्स डेटा ($month-$year):</h3>";
            echo "<table border='1' cellpadding='10' cellspacing='0'>
                    <tr>
                        <th>राइड ID</th>
                        <th>भेजने वाले का नाम</th>
                        <th>वर्क डेट</th>
                        <th>काम का प्रकार</th>
                        <th>शुरुआती स्थान</th>
                        <th>अंतिम स्थान</th>
                        <th>किलोमीटर</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['ride_id']}</td>
                        <td>{$row['sender_name']}</td>
                        <td>{$row['w_date']}</td>
                        <td>{$row['work_type']}</td>
                        <td>{$row['start_from']}</td>
                        <td>{$row['end_to']}</td>
                        <td>{$row['km']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>इस महीने की कोई राइड नहीं है।</p>";
        }
    }
    ?>