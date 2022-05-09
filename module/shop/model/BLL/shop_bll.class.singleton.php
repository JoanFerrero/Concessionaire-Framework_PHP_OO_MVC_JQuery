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
			$WHERE = $this -> dao -> sql_query_filters($args[2], $args[3], $args[4], $args[5], $args[6], $args[7]);
			return $this -> dao -> all_cars_filters($this->db,$args[0], $args[1], $WHERE);
		}

		public function get_details_BLL($args) {
			return [$this -> dao -> onecar($this->db, $args), $this -> dao -> img_car($this->db, $args)];
		}

		public function get_pagination_BLL() {
			return $this -> dao -> select_pagination($this->db);
		}

		public function get_pagination_filters_BLL($args) {
			$WHERE = $this -> dao -> sql_query_filters($args[0], $args[1], $args[2], $args[3], $args[4], $args[5]);
			return $this -> dao -> count_cars_filters($this->db, $WHERE);
		}

		public function get_count_more_related_BLL($args){
			return $this -> dao -> select_count_more_related($this->db, $args[0], $args[1]);
		}

		public function get_more_related_BLL($args){
			return $this -> dao -> select_more_related($this->db, $args[0], $args[1], $args[2], $args[3]);
		}

		public function get_search_menu_BLL($args){
			$WHERE = $this -> dao -> sql_query_search($args[2], $args[3], $args[4]);
			return $this -> dao -> all_cars_filters($this->db, $args[0], $args[1], $WHERE);
		}

		public function get_count_search_menu_BLL($args){
			$WHERE = $this -> dao -> sql_query_search($args[0], $args[1], $args[2]);
			return $this -> dao -> select_search_menu($this->db, $WHERE);
		}

		public function get_load_like_BLL($args) {
			$jwt = jwt_process::decode($args);

			return $this -> dao -> select_load_likes($this->db,$jwt['username']);
		}

		public function get_click_like_BLL($args) {
			$jwt = jwt_process::decode($args[1]);

			if ($this -> dao -> select_likes($this->db, $args[0], $jwt['username'])) {
				return $this -> dao -> delete_likes($this->db, $args[0], $jwt['id']);
			}
			return $this -> dao -> insert_likes($this->db, $args[0], $jwt['id']);
		}
	}
?>