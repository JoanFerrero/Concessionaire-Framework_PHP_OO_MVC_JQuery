<?php
    class search_model {
        private $bll;
        static $_instance;
        
        function __construct() {
            $this -> bll = search_bll::getInstance();
        }

        public static function getInstance() {
            if (!(self::$_instance instanceof self)) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        public function get_categoria() {
            return $this -> bll -> get_categoria_BLL();
        }

        public function get_brand() {
            return $this -> bll -> get_brand_BLL();
        }

        public function get_brand_categoria($args){
            return $this -> bll -> get_brand_categoria_BLL($args);
        }

        public function get_auto($args) {
            return $this -> bll -> get_auto_BLL($args);
        }

        public function get_auto_category($args) {
            return $this -> bll -> get_auto_category_BLL($args);
        }

        public function  get_auto_category_brand($args) {
            return $this -> bll -> get_auto_category_brand_BLL($args);
        }
    }