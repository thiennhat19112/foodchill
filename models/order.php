<?php
function insertOrder($user_id, $receiver, $phone, $address, $total_amount, $receiver_note) {
    $sql = "INSERT INTO `orders` (`order_id`, `user_id`, `receiver`, `phone`, `address`, `total_amount`, `order_date`, `shipping_date`, `receiver_note`, `admin_note`, `status`) VALUES (NULL, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, NULL, ?, NULL, '1');";
    pdo_execute($sql, $user_id, $receiver, $phone, $address, $total_amount, $receiver_note);
}

function insertOrderDetail($order_id, $product_id, $quantity, $price, $total_price) {
    $sql = "INSERT INTO `order_details` (`order_detail_id`, `order_id`, `product_id`, `quantity`, `price`, `total_price`) VALUES (NULL, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $order_id, $product_id, $quantity, $price, $total_price);
}

function getLastOrderID($user_id) {
    $sql = "SELECT `order_id` FROM `orders` WHERE `user_id` = ? ORDER BY `order_id` DESC LIMIT 1";
    return pdo_query_value($sql, $user_id);
}

function getDataToInsertOrderDetail($user_id) {
    $sql = "SELECT `carts`.`product_id`, `carts`.`quantity`, `products`.`price` FROM `carts` INNER JOIN `products` ON `carts`.`product_id` = `products`.`product_id` WHERE `carts`.`user_id` = ?";
    return pdo_query($sql, $user_id);
}
