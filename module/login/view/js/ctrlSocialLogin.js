function button_log_google() {
    $('#log_google').on('click', function(e) {
        var authService = firebase.auth();
        var provider = new firebase.auth.GoogleAuthProvider();
        provider.addScope('email');
        authService.signInWithPopup(provider)
            .then(function(data) {
                login_social(data);
            })
    });
}

function button_log_github() {
    $('#log_github').on('click', function(e) {
        var authService = firebase.auth();
        var provider = new firebase.auth.GithubAuthProvider();
        authService.signInWithPopup(provider)
            .then(function(data) {
                login_social(data);
            }).catch(function() {
                console.log('error');
            });
    });
}
function button_login_google(){
    $('#login_google').on('click', function(e) {
        var authService = firebase.auth();
        var provider = new firebase.auth.GoogleAuthProvider();
        authService.signInWithPopup(provider)
            .then(function(data) {
                login_SL(data);
            }).catch(function() {
                console.log('error');
            });
    });
}

function login_SL(user_data) {
    const email = user_data.user.email
    ajaxPromise('index.php?module=login&op=login_SL', 
    'POST', 'JSON', {email:email})
    .then(function(data) {
        if (data == 'error') {
            //toastr["warning]"("Ese email ya esta registrado.");
        } else {
            localStorage.setItem("token", data);
            var zone = localStorage.getItem('zone');
            if (zone == 'shop') {
                setTimeout('window.location.href = "index.php?module=shop&op=view"; ',1000);
            } else {
                setTimeout('window.location.href = "index.php?module=home&op=view"; ',1000);
            }
        }
    })
}

function login_social(user_data) {
    const username = user_data.user.displayName;
    const email = user_data.user.email
    const user_id = user_data.user.uid
    ajaxPromise('index.php?module=login&op=social_login', 
    'POST', 'JSON', { 'username': username, 'email': email, 'user_id': user_id, })
    .then(function(data) {
        if (data == 'error') {
            toastr["warning"]("Ese email ya esta registrado.");
        } else {
            localStorage.setItem("token", data);
            var zone = localStorage.getItem('zone');
            if (zone == 'shop') {
                setTimeout('window.location.href = "index.php?module=shop&op=view"; ',1000);
            } else {
                setTimeout('window.location.href = "index.php?module=home&op=view"; ',1000);
            }
        }
    })
}

$(document).ready(function() {
    button_log_google();
    button_log_github();
    button_login_google();

    var config = {
        apiKey: "AIzaSyDUHGv52hvi-Jv4tmmn2if1FsBqYmCuFlo",
        authDomain: "testproject-bae1b.firebaseapp.com",
        projectId: "testproject-bae1b",
        storageBucket: "",
        messagingSenderId: "G-0370B3YPK5"
    };

    firebase.initializeApp(config);
});