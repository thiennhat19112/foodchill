<?php
function select_all_orders()
{
    $sql = "SELECT users.user_name,receiver,address,phone,total_amount,order_date,shipping_date,receiver_note,admin_note, orders.status,order_id
    FROM orders INNER JOIN users on orders.user_id = users.user_id order by orders.order_id desc;";
    return pdo_query($sql);
}

function select_once_order_detail($id)
{
    $sql = "SELECT products.product_name,order_details.quantity,order_details.price,order_details.total_price FROM order_details INNER JOIN products on order_details.product_id = products.product_id WHERE order_id=?;";
    return pdo_query($sql, $id);
}

function update_admin_note($admin_note, $id)
{
    $sql = "UPDATE orders SET admin_note=? WHERE order_id=?";
    pdo_execute($sql,$admin_note, $id);
}
