<?php
    class ctrl_login {
        function view_login() {
            common::load_view('top_page_login.html', VIEW_PATH_LOGIN . 'login.html');
        }

        function view_register() {
            common::load_view('top_page_login.html', VIEW_PATH_LOGIN . 'register.html');
        }

        function view_recover(){
            common::load_view('top_page_login.html', VIEW_PATH_LOGIN . 'recover.html');
        }

        function view_recover_password(){
            common::load_view('top_page_login.html', VIEW_PATH_LOGIN . 'recover_password.html');
        }
    
        function login() {
            echo json_encode(common::load_model('login_model', 'get_login', [$_POST['username'], $_POST['password']]));
        }

        function login_SL() {
            echo json_encode(common::load_model('login_model', 'get_login_SL', $_POST['email']));
        }

        function social_login() {
            echo json_encode(common::load_model('login_model', 'get_social_login', [$_POST['username'], $_POST['email'], $_POST['user_id']]));
        }
    
        function register() {
            echo json_encode(common::load_model('login_model', 'get_register', [$_POST['username'], $_POST['email'], $_POST['password']]));
        }

        function verify_email() {
            echo json_encode(common::load_model('login_model', 'get_verify_email', $_GET['token']));
            common::load_view('top_page_login.html', VIEW_PATH_LOGIN . 'login.html');
        }

        function send_recover_email() {
            echo json_encode(common::load_model('login_model', 'get_recover_email', $_POST['email']));
        }

        function new_password() {
            echo json_encode(common::load_model('login_model', 'get_new_password', [$_POST['password'], $_GET['email']]));
        }  
    
        function logout() {
            echo json_encode(common::load_model('login_model', 'get_logout'));
        } 

        function data_user() {
            echo json_encode(common::load_model('login_model', 'get_data_user', $_POST['token']));
        }

        function controluser() {
            echo json_encode(common::load_model('login_model','get_controluser', $_POST['token']));
        }

        function actividad() {
            echo json_encode(common::load_model('login_model','get_actividad'));
        }

        function refresh_token() {
            echo json_encode(common::load_model('login_model','get_refresh_token', $_POST['token']));
        }
    }
    
?>