

// Submit to google sheet 
var submit_btn = document.getElementById("submit_btn");
var close_btn = document.getElementById("close_btn");
const scriptURL = 'https://script.google.com/macros/s/AKfycbydkPC0-s6ky0GdcqPwfEPpBAUFgXQ6pzq6_6tPhSL48xBr5ifD3ASgz6B58y-HoItO1A/exec'
const form = document.forms['submit-to-google-sheet']
const success = document.getElementById("success");
var redirect_page = document.getElementById("jobs_bg");
    form.addEventListener('submit', e => {
    e.preventDefault()
    fetch(scriptURL, { method: 'POST', body: new FormData(form)})
    .then(response => {
        success.innerHTML="Data Successfully Submited";
        
        setTimeout(function()
        {
            success.innerHTML="";
        },100)
        form.reset();
        window.location.replace("works.php");
        redirect_page.style.display = "none";
        function autoRefresh() {
            window.location = window.location.href;
            }
                setInterval('autoRefresh()', 100);
        
            })
    .catch(error => console.error('Error!', error.message))
    })
    submit_btn.onclick = function(){
        submit_btn.style.display="none";
        close_btn.style.display="none";
    }


    

// submit to google sheet end


