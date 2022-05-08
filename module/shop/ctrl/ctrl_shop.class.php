<?php
    class ctrl_shop {

        function view() {
            common::load_view('top_page_shop.html', VIEW_PATH_SHOP . 'shoppage.html');
        }

        function list_products() {
            echo json_encode(common::load_model('shop_model', 'get_list_products', [$_POST['items_page'], $_POST['total_prod']]));
        }

        function list_filters_products() {
            echo json_encode(common::load_model('shop_model', 'get_list_filters_products', [$_POST['items_page'], $_POST['total_prod'], $_POST['brand'], $_POST['kilometros'], 
                                                                                            $_POST['type'], $_POST['setting'], $_POST['category'], $_POST['order']]));
        }

        function list_filters_searchMenu() {
            echo json_encode(common::load_model('shop_model', 'get_list_searchMenu', [$_POST['items_page'], $_POST['total_prod'], $_POST['brand'], $_POST['kilometros'], 
                                                                                      $_POST['type'], $_POST['setting'], $_POST['category'], $_POST['order']]));
        }

        function pagination() {
            echo json_encode(common::load_model('shop_model', 'get_pagination'));
        }

        function pagination_filters() {
            echo json_encode(common::load_model('shop_model', 'get_pagination_filters', [$_POST['brand'], $_POST['kilometros'], $_POST['type'], 
                                                                                        $_POST['setting'], $_POST['category'], $_POST['order']]));
        }

        function details() {
            echo json_encode(common::load_model('shop_model', 'get_details', $_POST['id']));
        }

        function count_more_related() {
            echo json_encode(common::load_model('shop_model', 'get_count_more_related', [$_POST['id'], $_POST['category']]));
        }

        function more_related() {
            echo json_encode(common::load_model('shop_model', 'get_more_related', [$_POST['id'], $_POST['category'], $_POST['items'], $_POST['loaded']]));
        }

        function load_like() {
            echo json_encode(common::load_model('shop_model', 'get_load_like', $_GET['user']));
        }

        function click_like() {
            echo json_encode(common::load_model('shop_model', 'get_click_like', [$_GET['id'], $_GET['user']]));
        }

        function search_Menu() {
            echo json_encode($_POST['category_search']);
            //echo json_encode(common::load_model('shop_model', 'get_search_menu', [$_POST['items_page'],$_POST['total_prod'], $_POST['brand_search'],$_POST['category_search'], $_POST['autocom_search']]));
        }
    }
?>