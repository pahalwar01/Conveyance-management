<?php
include '../../connection.php';
$id = $_GET['update_id'];

$display =  "SELECT * FROM rides where ride_id='$id'";
$rides = mysqli_query($conn, $display);

$total = mysqli_num_rows($rides);
$result = mysqli_fetch_assoc($rides);
?>

<?php
if(isset($_POST['update']))
{
    $rname  =$_POST['rname'];
    $sname  =$_POST['sender'];
    $date   =$_POST['wdate'];
    $work   =$_POST['work'];
    $from   =$_POST['startfrom'];
    $to     =$_POST['endto'];
    $km     =$_POST['km'];

    // $update = "UPDATE data set ('$rname','$sname','$date','$work','$from','$to','$km') where id='$id'";
    // $update = "UPDATE data set rname='$rname',sender='$sname',date='$date',work='$work',from='$from',to='$to',km='$km' where id='$id'";
    $query = "UPDATE rides set rider_name='$rname',sender_name='$sname',w_date='$date',work_type='$work',start_from='$from',end_to='$to',km='$km' WHERE ride_id='$id'";

    $send=mysqli_query($conn,$query);

    if($send)
    {
        echo "Data Updated Successfully";
        header("Location: works/works.php");
    }
    else{
        echo "Failed";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs</title>
    <link rel="stylesheet" href="works/css/works.css">
    <link rel="icon" type="image/x-icon" href="../../../../img/logo.png"> 
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
                <img src="../../../../img/logo.png" alt="logo" id="logo">
            </div>
            
            <h2><center style="height: 50px; text-align: center; color: red;"><span id="profile_name"></span></center></h2>
            
        </header>    
    </div>
    <!--header coding end-->

    <!--Navigation coding start-->
    <div class="row">
        <nav class="col-12">
            <ul>
                <li class="col-6"><a href="../../user_1.php"><i class="fas fa-arrow-left"></i> Back</a></li>
                <li class="col-6"><a href="#"><i class="fas fa-list"></i> Jobs View</a></li>
            </ul>
            
        </nav>
    </div>
    <!--Navigation coding end-->
    
    <!--section coding start-->

    <div class="col-12">
        <div class="marquee-bg">
            <marquee behavior="sliding" direction="left" scrollamount="5" class="marquee-text"><i>LIST VIEW OF YOUR TOTAL JOBS DONE IN THIS MONTH, HOPE YOU DONE THIS MONTH A GOOD WORK, SEE YOU IN NEXT MONTH, GOOD LUCK !</i></marquee>
        </div>
        
    </div>

    <a href="#"><i class="fas fa-plus-circle" id="addwork"></i></a>


    <div id="jobs_bg" class="animate__animated animate__fadeIn" style='display:block'>
        <center>
        <div id="add_job" class="animate__animated animate__slideInDown">
            <h1>Update Your Job</h1><br>
            <form id="add_work" action="#" method="POST">
            <!-- <form id="add_work" name="submit-to-google-sheet" method="POST"> -->
                <p id="add">Your Name</p>
                <input type="text" name="rname" value="<?php echo $result['rider_name']; ?>" placeholder="Type Your Name" id="ridername" required="required"></input>
                <p id="add">Sender Name</p>
                <input type="text" name="sender" value="<?php echo $result['sender_name']; ?>" placeholder="Sender Name" id="s_name" required="required">
                <p id="add">Date</p>
                <Input type="date" name="wdate" value="<?php echo $result['w_date']; ?>" placeholder="Date" id="date" required="required">
                <p id="add">Type Of Work</p>
                <input type="text" name="work" value="<?php echo $result['work_type']; ?>" placeholder="Work Type" id="work_type" required="required">
                <p id="add">From:-</p>
                <input type="text" name="startfrom" value="<?php echo $result['start_from']; ?>" placeholder="From" id="frm" required="required">
                <p id="add">To:-</p>
                <input type="text" name="endto" value="<?php echo $result['end_to']; ?>" placeholder="To" id="to" required="required">
                <p id="add">Total K.M.</p>
                <input type="number" name="km" value="<?php echo $result['km']; ?>" placeholder="Total K.M." id="total_km" required="required">
                <input type="submit"id="submit_btn" name="update" value="Update">
                <span id="success"></span>
            </form>
        </div>
        </center>
    </div>

    <!--section coding end-->

    

<!-- <script src="works/js/works.js"></script>
<script type="module" src="works/js/addword.js"></script>      -->

</body>
</html>
