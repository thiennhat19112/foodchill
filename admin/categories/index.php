<?php
    require("models/categories.php"); 
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        if($act =="listCat") {
            $items = load_all_categories();
            require("list.php");
        }else if($act =="addCat") {
            require("add.php"); 
        }else if($act == "editCat") {
            $id = $_GET['id'];
            $item = load_one_category($id);
            extract($item);
            require("edit.php");
        }

    }
?>