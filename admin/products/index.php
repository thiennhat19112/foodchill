<?php
    require('models/products.php');
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        if($act =="listProd") {
            $items = load_all_products();
            require("list.php");
        }else if($act =="addProd") {
            $items = load_all_name_categories();
            require("add.php");
        }else if($act =="editProd") {
            $id = $_GET["id"];
            $item_products= load_one_product($id);
            extract($item_products);
            $items_categories = load_all_name_categories();
            require("edit.php");
        }
    }
?>