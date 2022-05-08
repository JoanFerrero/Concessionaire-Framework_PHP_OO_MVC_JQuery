<?php
    class shop_dao {
        static $_instance;

        private function __construct() {
        }

        public static function getInstance() {
            if(!(self::$_instance instanceof self)){
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        function allcars($db,$items_page, $total_prod) {
            $sql = "SELECT c.id, c.province, c.fecha, c.price, b.brand_name, m.model_name, t.type_name, ca.category_name, c.img_car, c.kilometres, c.lat, c.lon
                        FROM cars c
                        INNER JOIN brand b
                        ON b.id_brand=c.id_brand
                        INNER JOIN model m
                        ON m.id_model=c.id_model
                        INNER JOIN type t
                        ON t.id_type=c.id_type
                        INNER JOIN categories ca
                        ON ca.id_category=c.id_category
                        ORDER BY c.count DESC LIMIT " . $total_prod . "," . $items_page;
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

        function onecar($db, $id) {
            $sql = "SELECT c.id, b.brand_name, m.model_name, c.price, c.province, c.town, c.puertas, c.lat, c.lon, c.fecha, ca.category_name
                        FROM cars c
                        INNER JOIN brand b
                        ON b.id_brand=c.id_brand
                        INNER JOIN model m
                        ON m.id_model=c.id_model
                        INNER JOIN type t
                        ON t.id_type=c.id_type
                        INNER JOIN categories ca
                        ON ca.id_category=c.id_category
                        where c.id='$id'" ;
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

        function img_car($db, $id) {
            $sql = "SELECT * FROM img i
                    WHERE id_img ='$id'";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

        function all_cars_filters($db, $items_page, $total_prod, $brand, $kilometros, $type, $setting, $category, $order){
            $WHERE = self::sql_query_filters($brand, $kilometros, $type, $setting, $category, $order);
            $sql = "SELECT c.id, c.province, c.fecha, c.price, b.brand_name, m.model_name, t.type_name, ca.category_name, c.img_car, c.kilometres, c.lat, c.lon
                        FROM cars c
                        INNER JOIN brand b
                        ON b.id_brand=c.id_brand
                        INNER JOIN model m
                        ON m.id_model=c.id_model
                        INNER JOIN type t
                        ON t.id_type=c.id_type
                        INNER JOIN categories ca
                        ON ca.id_category=c.id_category " . $WHERE . " LIMIT " . $total_prod . "," . $items_page ;
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

        function sql_query_filters($brand, $kilometros, $type, $setting, $category, $order){

            $num = 0;
            $WHERE= "";

            if($category != '"ALL"') {

                $WHERE = $WHERE . "WHERE c.id_category =" . $category;
                $num = 1;
                
            }

            if($brand != '"ALL"'){
                if($num == 0) {
                    $WHERE = $WHERE . "WHERE c.id_brand=" . $brand;
                    $num = 1;
                }else{
                    $WHERE = $WHERE . " AND c.id_brand=" . $brand ;
                }
            }
            if($kilometros != '"ALL"'){
                if($num == 0) {
                    $WHERE = $WHERE . "WHERE c.kilometres >= " . $kilometros;
                    $num = 1;
                }else{
                    $WHERE = $WHERE . " AND c.kilometres >= " . $kilometros ;
                }
            }
            if($type != '"ALL"'){
                if($num == 0) {
                    $WHERE = $WHERE . "WHERE c.id_type =" . $type;
                    $num = 1;
                }else{
                    $WHERE = $WHERE . " AND c.id_type =" . $type ;
                }
            }
            if($setting != '"ALL"'){
                if($num == 0) {
                    $WHERE = $WHERE . "WHERE c.id_setting =" . $setting;
                    $num = 1;
                }else{
                    $WHERE = $WHERE . " AND c.id_setting =" . $setting ;
                }
            }

            if($order != '"ALL"'){
                if($order == '"1"') {
                    $WHERE = $WHERE . " ORDER BY c.price DESC";
                } else if($order == '"2"') {
                    $WHERE = $WHERE . " ORDER BY c.kilometres DESC";
                }
            }

            return $WHERE;
        }

        function sql_query_search($brand_search, $category_search, $autocom_search){
            $num = 0;
            $WHERE= "";

            if($brand_search != '""'){
                if($num == 0) {
                    $WHERE = $WHERE . "WHERE c.id_brand=" . $brand_search;
                    $num = 1;
                }else{
                    $WHERE = $WHERE . " AND c.id_brand=" . $brand_search;
                }
            }

            if($category_search != '""'){
                if($num == 0) {
                    $WHERE = $WHERE . "WHERE ca.category_name=" . $category_search;
                    $num = 1;
                }else{
                    $WHERE = $WHERE . " AND ca.category_name=" . $category_search ;
                }
            }

            if($autocom_search != '""'){
                if($num == 0) {
                    $WHERE = $WHERE . "WHERE c.town=" . $autocom_search;
                    $num = 1;
                }else{
                    $WHERE = $WHERE . " AND c.town=" . $autocom_search ;
                }
            }

            return $WHERE;
        }

        function select_pagination($db){
            $sql = "SELECT COUNT(*) AS n_cars FROM cars";

            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

        function select_search_menu($db,$brand, $kilometros, $type, $setting, $category, $order){
            $WHERE = self::sql_query_filters($brand, $kilometros, $type, $setting, $category, $order);
            $sql = "SELECT COUNT(*) AS n_cars
                    FROM cars c
                    INNER JOIN brand b
                    ON b.id_brand=c.id_brand
                    INNER JOIN model m
                    ON m.id_model=c.id_model
                    INNER JOIN type t
                    ON t.id_type=c.id_type
                    INNER JOIN categories ca
                    ON ca.id_category=c.id_category " . $WHERE;
            $stmt = $db->ejecutar($sql);
            return $sql;
        }

        function select_count_more_related($db,$id,$category){
            $sql = "SELECT COUNT(*) AS n_cars
                FROM cars c
                INNER JOIN brand b
                ON b.id_brand=c.id_brand
                INNER JOIN model m
                ON m.id_model=c.id_model
                INNER JOIN type t
                ON t.id_type=c.id_type
                INNER JOIN categories ca
                ON ca.id_category=c.id_category WHERE ca.category_name= '" . $category . "' AND c.id <>" . $id;

            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

        function select_more_related($db,$id,$category, $items, $loaded){
            $sql = "SELECT c.id, c.province, c.fecha, c.price, b.brand_name, m.model_name, t.type_name, ca.category_name, c.img_car, c.kilometres, c.lat, c.lon
                FROM cars c
                INNER JOIN brand b
                ON b.id_brand=c.id_brand
                INNER JOIN model m
                ON m.id_model=c.id_model
                INNER JOIN type t
                ON t.id_type=c.id_type
                INNER JOIN categories ca
                ON ca.id_category=c.id_category WHERE ca.category_name='". str_replace(' ', '', $category) . "' AND c.id <>" . $id . ' LIMIT ' . $loaded .','. $items;
                
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

        function select_load_likes($db,$user){
            $sql = "SELECT l.id_vehiculo FROM likes l INNER JOIN users u WHERE u.username='$user'";

        }

        function select_likes($db,$id,$user){
            $sql = "SELECT l.id_vehiculo, u.username, u.id_user FROM likes l INNER JOIN users u ON u.id_user=l.id_usuario WHERE u.username='$user' AND l.id_vehiculo=$id";

        }

        function insert_likes($db,$id,$user){
            $sql = "INSERT INTO likes (id_vehiculo, id_usuario) VALUES ($id,$user)";

        }

        function delete_likes($db,$id,$user){
            $sql = "DELETE FROM likes WHERE id_usuario=$user AND id_vehiculo=$id";

        }
    }