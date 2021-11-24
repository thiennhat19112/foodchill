<?php
function select_all_orders()
{
    $sql = "SELECT * FROM orders  ORDER BY order_id DESC LIMIT 10";
    return pdo_query($sql);
}

if (isset($_POST['id'])) {
    require("pdo.php");
    $id = $_POST['id'];
    $sql = "UPDATE orders SET  shipping_date=CURRENT_TIMESTAMP , status= 1  WHERE order_id = $id";
    pdo_execute($sql);
}
