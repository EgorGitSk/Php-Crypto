
var email = document.getElementById('email');
var password = document.getElementById('password');
var form = document.getElementById('signin-form');

form.addEventListener('submit', (e)=>{
    if(email.value=="" || password.value=="" ){
        e.preventDefault()
            alert('Fill your data')
    }
    

})


