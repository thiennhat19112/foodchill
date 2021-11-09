<?php
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        if($act =="listUser") {
            require("list.php");
        }else if($act =="addUser") {
            require("add.php");
        }else if($act =="editUser") {
            require("edit.php");
        }
    }
?>