var signuppage = document.getElementById('signup_link');
var loginpage = document.getElementById('signup_btn');
var signup = document.getElementById('signup');
var login = document.getElementById('login');

signuppage.click = function() {
  login.style.display = 'none';
  signup.style.display = 'block';   
};
