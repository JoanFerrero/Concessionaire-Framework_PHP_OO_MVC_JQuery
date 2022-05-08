$(document).ready(function () {
    button_recover();
    key_recover();
});

function button_recover(){
    $('#recover').on('click', function(e) {
        e.preventDefault();
        recover();
    }); 
    $('#recover_password').on('click', function(e) {
        e.preventDefault();
        recover_password();
    }); 
}

function key_recover(){
	$("#recover__form").keypress(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code==13){
        	e.preventDefault();
            recover();
        }
    });
    $("#recover_password").keypress(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code==13){
        	e.preventDefault();
            recover_password();
        }
    });
}


function recover_password() {
    if(validate_recover_password() != 0){
        var data = $('#recover_password_form').serialize();

        var queryString = window.location.search;
        var urlParams = new URLSearchParams(queryString);
        var email = urlParams.get('email');

        ajaxPromise('index.php?module=login&op=new_password&email='+email, 
        'POST', 'JSON', data)    
        .then(function(result) {
            console.log(result);
            if(result == "error"){		
                $("#error_email").html('Email no registrado');
            } else {
                toastr["warning"]("Email enviado.");
            }
        }).catch(function() {
           //window.location.href = 'index.php?module=exceptions&op=503&error=error_register'; 
        });    
    }
}

function recover(){
    if(validate_recover() != 0){
        var data = $('#recover_form').serialize();
        ajaxPromise('index.php?module=login&op=send_recover_email', 
        'POST', 'JSON', data)    
        .then(function(result) {
            console.log(result);
            if(result == "error"){		
                $("#error_email").html('Email no registrado');
            } else {
                toastr["warning"]("Email enviado.");
            }
        }).catch(function() {
           //window.location.href = 'index.php?module=exceptions&op=503&error=error_register'; 
        });
    }
}

function validate_recover(){
    var mail_exp = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    var error = false;

    if(document.getElementById('email').value.length === 0){
		document.getElementById('error_email').innerHTML = "Tienes que escribir un correo";
		error = true;
	}else{
        if(!mail_exp.test(document.getElementById('email').value)){
            document.getElementById('error_email').innerHTML = "El formato del mail es invalido"; 
            error = true;
        }else{
            document.getElementById('error_email').innerHTML = "";
        }
    }
	
    if(error == true){
        return 0;
    }

}

function validate_recover_password(){
    var error = false;

	if(document.getElementById('password').value.length === 0){
		document.getElementById('error_password').innerHTML = "Tienes que escribir la contraseña";
		error = true;
	}else{
        if(document.getElementById('password').value.length < 8){
            document.getElementById('error_password').innerHTML = "La password tiene que tener 8 caracteres como minimo";
            error = true;
        }else{
            document.getElementById('error_password').innerHTML = "";
        }
    }
	
    if(error == true){
        return 0;
    }

}