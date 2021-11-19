<?php
function load_all_order()
{
    $sql = "SELECT *
    FROM order
    INNER JOIN users
    ON order.user_id = users.user_id";
    return pdo_query($sql);
}
//xóa 
function delete_order($id)
{
    $sql = "DELETE FROM `order` WHERE `order`.`order_id` = ?";
    pdo_execute($sql, $id);
}









?>