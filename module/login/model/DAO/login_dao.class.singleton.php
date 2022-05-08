<?php
    class login_dao {
        static $_instance;

        private function __construct() {
        }

        public static function getInstance() {
            if(!(self::$_instance instanceof self)){
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        function count_register_email($db, $email){
			$sql = "SELECT COUNT(u.email_user) FROM users u WHERE u.email_user='". $email ."'";

            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
		}

        function insert_user($db, $username, $email, $hashed_pass, $avatar, $token){
            $sql ="INSERT INTO users (username, password_user, email_user, type_user, avatar_user, token_email,activate)
            VALUES ('$username','$hashed_pass','$email','client','$avatar', '$token', 0)";
            
            return $db->ejecutar($sql);
        }

        function select_user($db, $username){
            $sql = "SELECT u.id_user, u.username, u.password_user, u.email_user, u.type_user, u.avatar_user, u.token_email, u.activate 
            FROM users u WHERE u.username='$username'";

            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

        function select_verify_email($db, $token_email) {
            $sql = "SELECT token_email FROM users WHERE token_email='$token_email'";

            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

        function update_verify_email($db, $token_email) {
            $sql = "UPDATE users SET activate = 1, token_email='' WHERE token_email='$token_email'";
            
            return $db->ejecutar($sql);
        }
    }