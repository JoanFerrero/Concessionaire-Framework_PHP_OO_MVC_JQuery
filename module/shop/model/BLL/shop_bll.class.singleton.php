<?php
	class shop_bll {
		private $dao;
		private $db;
		static $_instance;

		function __construct() {
			$this -> dao = shop_dao::getInstance();
			$this->db = db::getInstance();
		}

		public static function getInstance() {
			if (!(self::$_instance instanceof self)) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		public function get_allCars_BLL($args){
			return $this -> dao -> allcars($this->db,$args[0], $args[1]);
		}

		public function get_CarsFilters_BLL($args) {
			return $this -> dao -> all_cars_filters($this->db,$args[0], $args[1], $args[2], $args[3], $args[4], $args[5], $args[6], $args[7]);
		}

		public function get_CarsSearchMenu_BLL($args) {
			//return $this -> dao ->
		}

		public function get_details_BLL($args) {
			return [$this -> dao -> onecar($this->db, $args), $this -> dao -> img_car($this->db, $args)];
		}

		public function get_pagination_BLL() {
			return $this -> dao -> select_pagination($this->db);
		}

		public function get_pagination_filters_BLL($args) {
			return $this -> dao -> select_pagination_filters($this->db, $args[0], $args[1], $args[2], $args[3], $args[4], $args[5]);
		}

		public function get_count_more_related_BLL($args){
			return $this -> dao -> select_count_more_related($this->db, $args[0], $args[1]);
		}

		public function get_more_related_BLL($args){
			return $this -> dao -> select_more_related($this->db, $args[0], $args[1], $args[2], $args[3]);
		}

		public function get_search_menu_BLL($args){
			return $this -> dao -> select_search_menu($this->db, $args[0], $args[1], $args[2], $args[3], $args[4]);
		}
	}
?>