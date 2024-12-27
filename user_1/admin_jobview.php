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
<body>
    
<div class="row">
            <center>
                <div id="rider">
                    <h2 align ="center" style="height: 50px; text-align: center; color: red;">Your Ride Details <span id="riderdetails"></span></h2>
                    <br>
                    <!-- users view panel -->

                    <div>
                        <h2>View Monthly Rider Data</h2><br>
                            <form action="apps/rides_by_month.php" method="GET">
                                <label for="month">Month:</label>
                                <select id="month" name="month" required>
                                    <option value="">Select Month</option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                <br><br>
                                <label for="year">Year:</label>
                                <input type="number" id="year" name="year" min="2025" max="2030" required>
                                <br><br>
                                <button type="submit" style="font-family: 'Ubuntu', sans-serif; 
                                                        font-size: 20px; 
                                                        padding: 5px 10px; 
                                                        margin-top: 15px; 
                                                        color: white; 
                                                        background-color: purple; 
                                                        margin-bottom: 10px;">Show Rides</button>
                            </form>
                            <hr>
                    </div>

                </div>

            </center>
            <br><br><br>
        </div>
     
</body>
</html>

<?php
include '../connection/connection.php';
error_reporting(0);
?>

<?php

$display =  "SELECT * FROM admin Where admin_name = '$user'";
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