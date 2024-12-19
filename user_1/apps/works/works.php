<?php
    include '../../../connection.php';
    error_reporting(0);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs</title>
    <link rel="stylesheet" href="css/works.css">
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
        
    
        <div id="dharampal" style="display: none;">
            <iframe src="https://docs.google.com/spreadsheets/d/e/2PACX-1vR7woZy9d8HSFhhdTebakHbzs27ZeYZmEpvr85jmyx_d2xb0ddWFGgn8G3-DwZxKHbeRa8nCvCgiGOp/pubhtml?gid=1952733198&amp;single=true&amp;widget=true&amp;headers=false" style="width: 100%; height: 720px;"></iframe>
        </div>

        <div id="karan" style="display: none;">
            <iframe src="https://docs.google.com/spreadsheets/d/e/2PACX-1vR7woZy9d8HSFhhdTebakHbzs27ZeYZmEpvr85jmyx_d2xb0ddWFGgn8G3-DwZxKHbeRa8nCvCgiGOp/pubhtml?gid=380888060&amp;single=true&amp;widget=true&amp;headers=false" style="width: 100%; height: 720px;"></iframe>
        </div>
        <div id="lalit" style="display: none;">
            <iframe src="https://docs.google.com/spreadsheets/d/e/2PACX-1vR7woZy9d8HSFhhdTebakHbzs27ZeYZmEpvr85jmyx_d2xb0ddWFGgn8G3-DwZxKHbeRa8nCvCgiGOp/pubhtml?gid=549043537&amp;single=true&amp;widget=true&amp;headers=false" style="width: 100%; height: 720px;"></iframe>
        </div>

        <div id="mirchitasks" style="display: none;">
        
            
            
        </div>
        
    </div>

    <a href="#"><i class="fas fa-plus-circle" id="addwork"></i></a>


    <div id="jobs_bg" class="animate__animated animate__fadeIn">
        <center>
        <div id="add_job" class="animate__animated animate__slideInDown">
            <h1>Add New Job</h1><br>
            <form id="add_work" action="../action.php" method="POST">
            <!-- <form id="add_work" name="submit-to-google-sheet" method="POST"> -->
                <p id="add">Your Name</p>
                <input type="text" name="rname" placeholder="Type Your Name" id="ridername" required="required"></input>
                <p id="add">Sender Name</p>
                <input type="text" name="sender" placeholder="Sender Name" id="s_name" required="required">
                <p id="add">Date</p>
                <Input type="date" name="wdate" placeholder="Date" id="date" required="required">
                <p id="add">Type Of Work</p>
                <input type="text" name="work" placeholder="Work Type" id="work_type" required="required">
                <p id="add">From:-</p>
                <input type="text" name="startfrom" placeholder="From" id="frm" required="required">
                <p id="add">To:-</p>
                <input type="text" name="endto" placeholder="To" id="to" required="required">
                <p id="add">Total K.M.</p>
                <input type="number" name="km" placeholder="Total K.M." id="total_km" required="required">
                <input type="submit"id="submit_btn" name="submit">
                <!-- <button id="submit_btn" name="submit">Submit</button> -->
                <button id="close_btn" name="close">Close</button><br>
                <span id="success"></span>
            </form>
        </div>
        </center>
    </div>

    <!--section coding end-->





<script type="module">

    import { initializeApp } from "https://www.gstatic.com/firebasejs/10.0.0/firebase-app.js";
    
    
    import { getAuth, GoogleAuthProvider, signInWithPopup, signOut, onAuthStateChanged } from "https://www.gstatic.com/firebasejs/10.0.0/firebase-auth.js";
    
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
    apiKey: "AIzaSyDXIbUIbKYmKVPUtfrzCPAxLb2t4r_Jlww",
    authDomain: "account-f83b4.firebaseapp.com",
    databaseURL: "https://account-f83b4-default-rtdb.firebaseio.com",
    projectId: "account-f83b4",
    storageBucket: "account-f83b4.appspot.com",
    messagingSenderId: "374695878902",
    appId: "1:374695878902:web:72ea054fbd780f98650cd7",
    measurementId: "G-D0XY2VX61J"
    };
    
    
    
    const app = initializeApp(firebaseConfig);
    const auth = getAuth();
    const provider = new GoogleAuthProvider()
    
    const signInButton = document.getElementById("signInButton");
    const signOutButton = document.getElementById("logout");
    const message = document.getElementById("message");
    const userName = document.getElementById("profile_name");
    const rider_name = document.getElementById("ridername");
    const userEmail = document.getElementById("userEmail");
    const dharampal = document.getElementById("dharampal");
    const karan = document.getElementById("karan");
    const lalit = document.getElementById("lalit");
    const mirchitasks = document.getElementById("mirchitasks");

    
    
    // signOutButton.style.display = "none";
    // message.style.display = "none";
    
    const userSignIn = async() => {
        signInWithPopup(auth, provider)
        .then((result) => {
            const user = result.user
            console.log(user);
        }).catch((error) => {
            const errorCode = error.code;
            const errorMessage = error.message
        })
    }
    
    const userSignOut = async() => {
        signOut(auth).then(() => {
            alert("You have signed out successfully!");
            location.href = "../../../../login.php";
            sessionStorage.clear();
        }).catch((error) => {})
    }
    
    onAuthStateChanged(auth, (user) => {
        if(user) {
        // signOutButton.style.display = "block";
        // message.style.display = "block";
        userName.innerHTML = user.displayName;
        if(userName.innerHTML == "Dharam Pal"){
            dharampal.style.display = "block";
            rider_name.value = user.displayName;
        }
        else{
            if(userName.innerHTML == "karan kumar"){
                karan.style.display = "block";
                rider_name.value = user.displayName;
            }
            else{
                if(userName.innerHTML == "Lalit kumar"){
                lalit.style.display = "block";
                rider_name.value = user.displayName;
                }
                else{
                    if(userName.innerHTML == "Mirchi Tasks"){
                    mirchitasks.style.display = "block";
                    rider_name.value = user.displayName;
                    }
                }
            }
        }
        
        
        userEmail.innerHTML = user.email;

        // location.href = "users/user_1/user_1.html";
        // location.href = "../../index.html";
        } 
        else {
        // location.href = "../../../../login.php";
        signOutButton.style.display = "none";
        message.style.display = "none";
        }
    })



    signOutButton.addEventListener('click', userSignOut);
    

    var close = document.getElementById("close_btn");
    var add_job = document.getElementById("add_job");
    close.onclick = function()
    {
        window.location.replace("works.php");
    }



</script>
    

<script src="js/works.js"></script>
<script type="module" src="js/addword.js"></script>     

</body>
</html>