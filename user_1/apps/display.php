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
include '../../../connection.php';
error_reporting(0);
?>

<?php

$display =  "SELECT * FROM data";
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
                <td>".$result['id']."</td>
                <td>".$result['rname']."</td>
                <td>".$result['sender']."</td>
                <td>".$result['wdate']."</td>
                <td>".$result['work']."</td>
                <td>".$result['startfrom']."</td>
                <td>".$result['endto']."</td>
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