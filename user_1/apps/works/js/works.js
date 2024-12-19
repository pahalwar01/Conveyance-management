var add_item = document.getElementById("addwork");

add_item.onclick = function()
{
    var bg = document.getElementById("jobs_bg");
    bg.style.display = "block";
    var user_email = sessionStorage.getItem("user");
    var json_data = localStorage.getItem(user_email);
    var obj_data = JSON.parse(json_data);
    var rider = document.getElementById("r_name");
    rider.value = atob(obj_data.username);
    
}

var close = document.getElementById("close_btn");
var add_job = document.getElementById("add_job");
close.onclick = function()
{
    window.location.replace("works.php");
}