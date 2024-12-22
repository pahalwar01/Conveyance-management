var add_item = document.getElementById("addwork");

add_item.onclick = function()
{
    var bg = document.getElementById("jobs_bg");
    bg.style.display = "block";
}

var close = document.getElementById("close_btn");
var add_job = document.getElementById("add_job");
close.onclick = function()
{
    window.location.replace("works.php");
}