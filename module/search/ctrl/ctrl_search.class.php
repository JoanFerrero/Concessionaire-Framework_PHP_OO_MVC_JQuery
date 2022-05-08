<?php
    class ctrl_search {
        
        function categoria() {
            echo json_encode(common::load_model('search_model', 'get_categoria'));
        }

        function brand() {
            if(empty($_POST['categoria'])){
                echo json_encode(common::load_model('search_model', 'get_brand'));
            } else {
                echo json_encode(common::load_model('search_model', 'get_brand_categoria', $_POST['categoria']));
            }
        }
        
        function autocomplete() {
            if (!empty($_POST['drop_category']) && empty($_POST['drop_brands'])){
                echo json_encode(common::load_model('search_model', 'get_auto_category', [$_POST['complet'], $_POST['drop_category']]));
            }else if(!empty($_POST['drop_category']) && !empty($_POST['drop_brands'])){
                echo json_encode(common::load_model('search_model', 'get_auto_category_brand', [$_POST['complet'], $_POST['drop_category'], $_POST['drop_brands']]));
            }else{
                echo json_encode(common::load_model('search_model', 'get_auto', $_POST['complet']));
            }
        }
    }
?>
