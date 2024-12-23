<?php
session_start();
include '../connection.php';

// Fetch all riders
$sql = "SELECT * FROM rider";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <h2>राइडर्स की सूची</h2>

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
