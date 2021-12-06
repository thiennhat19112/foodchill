<?php
function insertOrder($user_id, $receiver, $phone, $address, $total_amount, $receiver_note) {
    $sql = "INSERT INTO `orders` (`order_id`, `user_id`, `receiver`, `phone`, `address`, `total_amount`, `order_date`, `shipping_date`, `receiver_note`, `admin_note`, `status`) VALUES (NULL, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, NULL, ?, NULL, '0');";
    pdo_execute($sql, $user_id, $receiver, $phone, $address, $total_amount, $receiver_note);
}

function getOrdersByUser($user_id) {
    $sql = "SELECT `order_id`, `receiver`, `phone`, `address`, `total_amount`, `order_date`, `shipping_date`, `receiver_note`, `status` FROM `orders` WHERE `user_id` = ? ORDER BY `order_id` DESC";
    return pdo_query($sql, $user_id);
}

function getDataToShowOrderDetail($order_id) {
    $sql = "SELECT `order_details`.*, `products`.`product_id`, `products`.`product_name`, `products`.`image` FROM `order_details` INNER JOIN `products` ON `order_details`.`product_id` = `products`.`product_id` WHERE `order_details`.`order_id` = ?";
    return pdo_query($sql, $order_id);
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

function cancelOrder($order_id) {
    $sql = "UPDATE `orders` SET `status` = '4' WHERE `orders`.`order_id` = ?";
    pdo_execute($sql, $order_id);
}
