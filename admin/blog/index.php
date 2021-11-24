<?php
    require('models/blog.php');
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        if($act =="listBlogs") {
            $items = load_all_blogs();
            require("list.php");
        }else if($act =="addBlog") {
            require("add.php");
        }else if($act =="editBlog") {
            $id = $_GET["id"];
            $item_products= load_one_blog($id);
            extract($item_products);
            require("edit.php");
        }
    }
?>