<?php
function countCart($u_id) {
    $sql = "SELECT COUNT(`product_id`) FROM `carts` WHERE `user_id`= ? ";
    return pdo_query_value($sql, $u_id);
}

function insertCart($u_id, $p_id, $qty) {
    $sql = "INSERT INTO `carts` (`user_id`, `product_id`, `quantity`) VALUES (?, ?, ?)";
    pdo_execute($sql, $u_id, $p_id, $qty);
}

function updateCartQty($qty, $u_id, $p_id) {
    $sql = "UPDATE `carts` SET `quantity` = `quantity` + ? WHERE `carts`.`user_id` = ? AND `carts`.`product_id` = ?";
    pdo_execute($sql, $qty, $u_id, $p_id);
}

function changeQty($qty, $u_id, $p_id) {
    $sql = "UPDATE `carts` SET `quantity` = ? WHERE `carts`.`user_id` = ? AND `carts`.`product_id` = ?";
    pdo_execute($sql, $qty, $u_id, $p_id);
}

function checkCart($u_id, $p_id) {
    $sql = "SELECT count(*) FROM `carts` WHERE `user_id` = ? and `product_id` = ?";
    return pdo_query_value($sql, $u_id, $p_id);
}

function countQty($u_id, $p_id) {
    $sql = "SELECT `quantity` FROM `carts` WHERE `user_id` = ? and `product_id` = ?";
    return pdo_query_value($sql, $u_id, $p_id);
}

function showProductCart($u_id) {
    $sql = "SELECT * FROM `carts` WHERE `user_id` = ?";
    return pdo_query($sql, $u_id);
}
