<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
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
            
            <h2><center style="height: 50px; text-align: center; color: red;"><span id="profile_name"></span></center></h2>
            
        </header>    
    </div>
    <!--header coding end-->

    <!--Navigation coding start-->
    <div class="row">
        <nav class="col-12">
            <ul>
                <li class="col-4"><a href="user_1.php"><i class="fas fa-home"></i> Home</a></li>
                <li class="col-4" id="jobview"><a href="apps/works/works.php"><i class="fas fa-list"></i> Jobs View</a></li>
                <li class="col-4" id="logout"><a href="#"><p id="logout_text"><i class="fa-solid fa-right-from-bracket"></i> Logout </p></a></li>
            </ul>
            
        </nav>
    </div>
    <!--Navigation coding end-->

    <section>

        <div class="row">
            <center>
                <div id="rider">
                    <h2 align ="center" style="height: 50px; text-align: center; color: red;">Your Ride Details <span id="riderdetails"></span></h2>
                    <br>
                    <h4>View Section</h4><br>
                    <!-- users view panel -->
                    <div id="dharampal_details" style="display: none;">
                        <iframe src="https://docs.google.com/spreadsheets/d/e/2PACX-1vR7woZy9d8HSFhhdTebakHbzs27ZeYZmEpvr85jmyx_d2xb0ddWFGgn8G3-DwZxKHbeRa8nCvCgiGOp/pubhtml?gid=686236904&amp;single=true&amp;widget=true&amp;headers=false" style="width: 230px; height: 200px;"></iframe>
                    </div>
                    <div id="karan_details" style="display: none;">
                        <iframe src="https://docs.google.com/spreadsheets/d/e/2PACX-1vR7woZy9d8HSFhhdTebakHbzs27ZeYZmEpvr85jmyx_d2xb0ddWFGgn8G3-DwZxKHbeRa8nCvCgiGOp/pubhtml?gid=1269359666&amp;single=true&amp;widget=true&amp;headers=false" style="width: 230px; height: 200px;"></iframe>
                    </div>
                    <div id="lalit_details" style="display: none;">
                        <iframe src="https://docs.google.com/spreadsheets/d/e/2PACX-1vR7woZy9d8HSFhhdTebakHbzs27ZeYZmEpvr85jmyx_d2xb0ddWFGgn8G3-DwZxKHbeRa8nCvCgiGOp/pubhtml?gid=1767430356&amp;single=true&amp;widget=true&amp;headers=false" style="width: 230px; height: 200px;"></iframe>
                    </div>
<!-- for testing-->
                    <div id="rohit_details">
                        
                        <?php
                        include '../../connection.php';
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

                    </div>

                </div>
                    <!-- admin view panel -->
                    <div class="row" id="admin" style="display: none;">
                        <center>
                            <h2 align ="center" style="height: 50px; text-align: center; color: red;">Riders Details Section</h2>
                                    <br>
                                    <div id="dharampal_details">
                                        <iframe src="https://docs.google.com/spreadsheets/d/e/2PACX-1vR7woZy9d8HSFhhdTebakHbzs27ZeYZmEpvr85jmyx_d2xb0ddWFGgn8G3-DwZxKHbeRa8nCvCgiGOp/pubhtml?gid=686236904&amp;single=true&amp;widget=true&amp;headers=false" style="width: 230px; height: 200px;"></iframe>
                                        <br>
                                        <button style="height: 30px; width: 80px; color: red; background-color: yellow;" id="djobprint"><i class="fa-solid fa-print" style="color: red;"></i> Print</button>
                                    </div><br><br>
                                    <div id="karan_details">
                                        <iframe src="https://docs.google.com/spreadsheets/d/e/2PACX-1vR7woZy9d8HSFhhdTebakHbzs27ZeYZmEpvr85jmyx_d2xb0ddWFGgn8G3-DwZxKHbeRa8nCvCgiGOp/pubhtml?gid=1269359666&amp;single=true&amp;widget=true&amp;headers=false" style="width: 230px; height: 200px;"></iframe>
                                        <br>
                                        <button style="height: 30px; width: 80px; color: red; background-color: yellow;" id="kjobprint"><i class="fa-solid fa-print" style="color: red;"></i> Print</button>
                                    </div><br><br>
                                    <div id="lalit_details">
                                        <iframe src="https://docs.google.com/spreadsheets/d/e/2PACX-1vR7woZy9d8HSFhhdTebakHbzs27ZeYZmEpvr85jmyx_d2xb0ddWFGgn8G3-DwZxKHbeRa8nCvCgiGOp/pubhtml?gid=1767430356&amp;single=true&amp;widget=true&amp;headers=false" style="width: 230px; height: 200px;"></iframe>
                                        <br>
                                        <button style="height: 30px; width: 80px; color: red; background-color: yellow;" id="ljobprint"><i class="fa-solid fa-print" style="color: red;"></i> Print</button>
                                    </div>
                                <br><br>
                                <hr style="color: red;border-style: dashed; border-width: 2px;"><hr>
                                <br>
                        </center>
                        <br><br><br>
                    </div>
                    
                    <div class="main">
            
                    </div>
                        
            </center>
            <br><br><br>
        </div>
        
    </section>


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
    const userEmail = document.getElementById("userEmail");
    const riderdetails = document.getElementById("riderdetails");
    const dharampal = document.getElementById("dharampal_details");
    const karan = document.getElementById("karan_details");
    const lalit = document.getElementById("lalit_details");
    const rohit = document.getElementById("rohit_details");
    const admin = document.getElementById("admin");
    const rider = document.getElementById("rider");
    const jobview = document.getElementById("jobview");
    const logout = document.getElementById("logout");
    
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
          location.href = "../../index.php";
          sessionStorage.clear();
      }).catch((error) => {})
    }
  
    onAuthStateChanged(auth, (user) => {
      if(user) {
        signOutButton.style.display = "block";
        // message.style.display = "block";
        riderdetails.innerHTML = user.displayName;
        userName.innerHTML = user.displayName;
        if(userName.innerHTML == "Dharam Pal"){
                dharampal.style.display = "block";
            }
            else{
                if(userName.innerHTML == "karan kumar"){
                    karan.style.display = "block";
                }
                else{
                    if(userName.innerHTML == "Lalit Kumar"){
                    lalit.style.display = "block";
                    }
                    else{
                        if(userName.innerHTML == "Rohit kumar"){
                            admin.style.display = "block";
                            // location.href=("../admin/admin.html")
                            rider.style.display="none";
                            jobview.style.display="none";
                            logout.style.float="right";
                        }
                        else{
                            if(userName.innerHTML == "Mirchi Tasks"){
                                rohit.style.display = "block";
                            }
                        }
                    }
                }
            }


        userEmail.innerHTML = user.email;
      }
      else {
        location.href = "../../index.php";
        signOutButton.style.display = "none";
        message.style.display = "none";
      }
    })



    




    signOutButton.addEventListener('click', userSignOut);
  

  </script>

<script src="js/java.js"></script>
<script>
    var kprint = document.getElementById("kjobprint")
    var lprint = document.getElementById("ljobprint")
    var dprint = document.getElementById("djobprint")
    kprint.onclick=function()
    {
        window.location.href = "https://docs.google.com/spreadsheets/d/e/2PACX-1vR7woZy9d8HSFhhdTebakHbzs27ZeYZmEpvr85jmyx_d2xb0ddWFGgn8G3-DwZxKHbeRa8nCvCgiGOp/pub?gid=441368016&single=true&output=pdf";
    }
    lprint.onclick=function()
    {
        window.location.href = "https://docs.google.com/spreadsheets/d/e/2PACX-1vR7woZy9d8HSFhhdTebakHbzs27ZeYZmEpvr85jmyx_d2xb0ddWFGgn8G3-DwZxKHbeRa8nCvCgiGOp/pub?gid=1803733186&single=true&output=pdf";
    }
    dprint.onclick=function()
    {
        window.location.href = "https://docs.google.com/spreadsheets/d/e/2PACX-1vR7woZy9d8HSFhhdTebakHbzs27ZeYZmEpvr85jmyx_d2xb0ddWFGgn8G3-DwZxKHbeRa8nCvCgiGOp/pub?gid=377967874&single=true&output=pdf";
    }
</script>
<!-- <script src="../../java/googlesignin.js"></script> -->
</body>
</html>