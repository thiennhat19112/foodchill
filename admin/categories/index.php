<?php
    require("models/categories.php");
  
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        if($act =="listCat") {
            $list_categories = loadall_categories();
            require("list.php");
        }else if($act =="addCat") {
            insert_categories($category_name,$ordinal_numbers,$status);
            require("add.php");
        }else if($act =="editCat") {
            $suadm=loadone_categories($_GET['$category_id']);
            require("edit.php");
        }else if($act =="xoadmCat") {
            if(isset($_GET['id'])&&($_GET['id']>0)){
                delete_categories($_GET['$category_id']);
            }
            $list_categories=loadall_categories();
            require("list.php");
        }

    }
?>