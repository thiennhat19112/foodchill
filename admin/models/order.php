<?php
function load_all_order()
{
    $sql = "SELECT * FROM orders INNER JOIN users ON orders.user_id = users.user_id";
    return pdo_query($sql);
   
}
//xóa 
function delete_order($id)
{
    $sql = "DELETE FROM `orders` WHERE `orders`.`order_id` = ?";
    pdo_execute($sql, $id);
}









?>