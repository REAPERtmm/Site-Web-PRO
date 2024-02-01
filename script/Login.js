document.getElementById("register-password-verified").onkeyup = function(){
    var password = document.getElementById("register-password");
    var confirm_password = document.getElementById("register-password-verified");
    
    if(password.value != confirm_password.value) {
        $('#error_msg').html('Les 2 mots de passes doivent correspondre.');
        document.getElementById('FormsentRegisterSubmit').disabled = true;
    } else {
        $('#error_msg').html(' ');
        document.getElementById('FormsentRegisterSubmit').disabled = false;
    }
}