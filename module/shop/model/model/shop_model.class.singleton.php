<?php
    class shop_model {
        private $bll;
        static $_instance;

        function __construct() {
            $this -> bll = shop_bll::getInstance();
        }

        public static function getInstance() {
            if (!(self::$_instance instanceof self)) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        public function get_list_products($args) {
            return $this -> bll -> get_allCars_BLL($args);
        }

        public function get_list_filters_products($args) {
            return $this -> bll -> get_CarsFilters_BLL($args);
        }

        public function get_list_searchMenu($args) {
            return $this -> bll -> get_CarsSearchMenu_BLL($args);
        }

        public function get_details($args) {
            return $this -> bll -> get_details_BLL($args);
        }

        public function get_pagination() {
            return $this -> bll -> get_pagination_BLL();
        }

        public function get_pagination_filters($args) {
            return $this -> bll -> get_pagination_filters_BLL($args);
        }

        public function get_count_more_related($args){
            return $this -> bll -> get_count_more_related_BLL($args);
        }

        public function get_more_related($args){
            return $this -> bll -> get_more_related_BLL($args);
        }
        public function get_search_menu($args){
            return $this -> bll -> get_search_menu_BLL($args);
        }
    }
?>