<?php
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        if($act =="listCat") {
            require("list.php");
        }else if($act =="addCat") {
            require("add.php");
        }else if($act =="editCat") {
            require("edit.php");
        }
    }
?>