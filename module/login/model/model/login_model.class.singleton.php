<?php
class login_model {
    private $bll;
    static $_instance;
    
    function __construct() {
        $this -> bll = login_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function get_register($args) {
        $result1 = $this -> bll -> get_register_email_BLL($args);
        if($result1==0){
            $result =  $this -> bll -> get_register_BLL($args);
            return $this -> bll -> get_email_BLL($result, $args);
        } else {
            return 'error';
        }
    }

    public function get_login($args) {
        return $this -> bll -> get_login_BLL($args);
    }

    public function get_data_user($args) {
        return $this -> bll -> get_data_user_BLL($args);
    }

    public function get_logout() {
        return $this -> bll -> get_logout_BLL();
    }

    public function get_controluser($args) {
        return $this -> bll -> get_controluser_BLL($args);
    }

    public function get_actividad() {
        return $this -> bll -> get_actividad_BLL();
    }

    public function get_refresh_token($args) {
        return $this -> bll -> get_refresh_token_BLL($args);
    }

    public function get_verify_email($args) {
        $verify = $this -> bll -> get_verify_email_BLL($args);
        if (!empty($verify)) {
            return;
        }
    }
}
