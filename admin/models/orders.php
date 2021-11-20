<?php 
    function select_all_orders(){
        $sql = "SELECT * FROM orders INNER JOIN users on orders.user_id = users.user_id;";
        return pdo_query($sql);
    }
?>