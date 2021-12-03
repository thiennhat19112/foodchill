<?php
function select_all_orders()
{
    $sql = "SELECT * FROM orders INNER JOIN users on orders.user_id = users.user_id;";
    return pdo_query($sql);
}

function select_once_order_detail($id)
{
    $sql = "SELECT products.product_name,order_details.quantity,order_details.price,order_details.total_price FROM order_details INNER JOIN products on order_details.product_id = products.product_id WHERE order_id=?;";
    return pdo_query($sql, $id);
}
