var login_btn = document.getElementById("login_link");
var signup_btn = document.getElementById("signup_link");
var signup_box = document.getElementById("signup");
var login_box = document.getElementById("login");
    
login_btn.onclick = function()
{
    signup_box.style.display = "none";
    login_box.style.display = "block";
}

signup_btn.onclick = function()
{
    login_box.style.display = "none";
    signup_box.style.display = "block";
}

// Time updater

// Signup coding start

var signup_frm = document.getElementById("signup_frm");

signup_frm.onsubmit = function()
{
    var user = btoa(document.getElementById("username").value);
    var email = btoa(document.getElementById("email").value);
    var phone = btoa(document.getElementById("phone").value);
    var pass = btoa(document.getElementById("password").value);

    var user_object_data = {username:user,email:email,phone:phone,password:pass};
    var user_text_data = JSON.stringify(user_object_data);

    if (user != "" && email != "" && phone != "" && pass !="")
        {
            localStorage.setItem(email,user_text_data);
            var signup_btn = document.getElementById("signup_btn");
            signup_btn.style.background = "#14b129";
            signup_btn.innerHTML = "<i class='fa fa-check' aria-hidden='true'></i> Sign up Successful !😊";
            setTimeout(function() {
                signup_btn.style.background = "linear-gradient(to right, #E100FF, #7F00FF)";
                signup_btn.innerHTML = "Sign up";
                signup_frm.reset();
            }, 3000);
            return false
        }

}
//signup coding end


// email validation coding start
var email_input = document.getElementById("email");
email_input.onchange = function()
{
    var email = btoa(document.getElementById("email").value);
    var warning = document.getElementById("email_notice");
    var signup_btn = document.getElementById("signup_btn");
 
    if (localStorage.getItem(email) != null)
        {
            warning.style.display = "block";
            email_input.style.borderBottomColor = "red";
            signup_btn.disabled = true;
            signup_btn.style.background = "#ccc";

            email_input.onclick = function()
            {
                email_input.value = "";
                email_input.style.borderBottomColor = "#ccc";
                warning.style.display = "none";
                signup_btn.disabled = false;
                signup_btn.style.background = "linear-gradient(to right, #E100FF, #7F00FF)";

            }

        }

}

// email validation coding end



// login coding start

var login_frm = document.getElementById("login_frm");

login_frm.onsubmit = function()
{
    var email =document.getElementById("login_uname");
    var password = document.getElementById("login_pwd");
    var email_war = document.getElementById("email_warning");
    var pass_war = document.getElementById("password_warning");

    if(localStorage.getItem(btoa(email.value)) == null)
        {
            email_war.style.display = "block";
            email.style.borderBottomColor = "red";

            email.onclick = function()
            {
                email.value = "";
                email_war.style.display = "none";
                email.style.borderBottomColor = "#ccc";
            }
        }
        else
        {
            var text_data = localStorage.getItem(btoa(email.value));
            var object_data = JSON.parse(text_data);
            var correct_email = object_data.email;
            var correct_password = object_data.password;

            if(btoa(email.value) == correct_email)
                {
                    if(btoa(password.value) == correct_password)
                        {
                            sessionStorage.setItem("user",btoa(email.value));
                            location.replace("users/user_1/user_1.html");
                        }
                        else
                        {
                            pass_war.style.display = "block";
                            password.style.borderBottomColor = "red";

                            password.onclick = function()
                            {
                                password.value = "";
                                pass_war.style.display = "none";
                                password.style.borderBottomColor = "#ccc";
                            }
                        }
                }
        }
        return false;
}

// login coding end


