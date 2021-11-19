<?php
    require "models/users.php";
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        if($act =="listUser") {
            $items = load_all_user();
            require("list.php");
        }else if($act =="addUser") {
            require("add.php");
        }else if($act =="editUser") {
            $id = $_GET['id'];
            $item = load_one_user($id);
            extract($item);
            require("edit.php");
        }
    }
?>