<?php
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        if($act =="listProd") {
            require("list.php");
        }else if($act =="addProd") {
            require("add.php");
        }else if($act =="editProd") {
            require("edit.php");
        }
    }
?>