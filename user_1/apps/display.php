<html>
<head>
    <title>Display</title>
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
</html>

<?php
include '../../connection/connection.php';
error_reporting(0);
?>

<?php

$display =  "SELECT * FROM rides Where rider_name = '$user'";
$rides = mysqli_query($conn, $display);

$total = mysqli_num_rows($rides);

// echo $total;

if($total != 0)
{
    ?>

    <h2 align="center"><mark>Displaying All Records</mark></h2>
    <center>
    <table border="1" cellspacing="5" width="100%">
        <tr>
        <th width="5%">ID</th>
        <th width="10%">Rider Name</th>
        <th width="10%">Sender Name</th>
        <th width="10%">Date</th>
        <th width="15%">Work Type</th>
        <th width="20%">From</th>
        <th width="15%">To</th>
        <th width="10%">Total KM</th>
        <th width="15%">Operations</th>
        </tr>
    
    <?php
    while ($result = mysqli_fetch_assoc($rides)) 
    {
        echo "<tr>
                <td>".$result['ride_id']."</td>
                <td>".$result['rider_name']."</td>
                <td>".$result['sender_name']."</td>
                <td>".$result['w_date']."</td>
                <td>".$result['work_type']."</td>
                <td>".$result['start_from']."</td>
                <td>".$result['end_to']."</td>
                <td>".$result['km']."</td>

                <td><a href='update_design.php?update_id=$result[id]'>Update</a></td>
            </tr>
            ";
    }
        }
        else
        {
            echo "No records found";
        }

        ?>
    </table>
    </center>