<?php
     
    require "models/order.php";
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        if($act =="listOrder") {
           
            $items = load_all_order();
           
            require("order.php");
       
    }
}
?>