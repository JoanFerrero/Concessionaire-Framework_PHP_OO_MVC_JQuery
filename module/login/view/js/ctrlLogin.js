$(document).ready(function () {
    key_login();
    button_login();
});

function key_login(){
	$("#login__form").keypress(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code==13){
        	e.preventDefault();
            login();
        }
    });
}

function button_login(){
	$('#login').on('click', function(e) {
        e.preventDefault();
        login();
    }); 
}

function login(){
    if(validate_login() != 0){
        var data = $('#login_form').serialize();
        ajaxPromise('index.php?module=login&op=login', 
        'POST', 'JSON', data)    
        .then(function(result) {
            if(result=='error' || result=='notVerificate'){
                if(result=='error'){
                    $("#error_password").html('La contraseña no es correcta');
                } else {
                    $("#error_password").html('Cuenta no verificada');
                }
            } else {
                localStorage.setItem("token", result);
                var zone = localStorage.getItem('zone');
                if (zone == 'shop') {
                    setTimeout('window.location.href = "index.php?module=shop&op=view"; ',200);
                } else {
                    setTimeout('window.location.href = "index.php?module=home&op=view"; ',200);
                }
            }
        }).catch(function() {
            console.log("error");
            //window.location.href = 'index.php?module=exceptions&op=503&error=error_login'; 
        });
    }
}

function validate_login(){
    var error = false;

	if(document.getElementById('username').value.length === 0){
		document.getElementById('error_username').innerHTML = "Tienes que escribir el usuario";
		error = true;
	}else{
        document.getElementById('error_username').innerHTML = "";
    }
	
	if(document.getElementById('password').value.length === 0){
		document.getElementById('error_password').innerHTML = "Tienes que escribir la contraseña";
		error = true;
	}else{
        document.getElementById('error_password').innerHTML = "";
    }
	
    if(error == true){
        return 0;
    }
}