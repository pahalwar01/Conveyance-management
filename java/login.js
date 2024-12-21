var login_link = document.getElementById("login_link");
var signup_link = document.getElementById("signup_link");
var signup_box = document.getElementById("signup");
var login_box = document.getElementById("login");
    
login_link.onclick = function()
{
    signup_box.style.display = "none";
    login_box.style.display = "block";
}

signup_link.onclick = function()
{
    login_box.style.display = "none";
    signup_box.style.display = "block";
}