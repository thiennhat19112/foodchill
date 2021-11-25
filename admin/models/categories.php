<?php
//hiện tất cả các danh mục
function load_all_categories()
{
    $sql = "SELECT * FROM `categories` ORDER BY `category_id` DESC";
    return pdo_query($sql);
}
//thêm danh mục
function insert_categories($category_name, $ordinal_number, $status)
{
    $sql = "INSERT INTO `categories` (`category_name`, `ordinal_number`, `status`) 
        VALUES(?, ?, ?)";
    pdo_execute($sql, $category_name, $ordinal_number, $status);
}
//sửa danh mục
function update_category($category_name, $ordinal_number, $status, $category_id)
{
    $sql = "UPDATE `categories` SET 
            `category_name` = ?, 
            `ordinal_number`= ?, 
            `status` = ? 
        WHERE `category_id` = ?";
    pdo_execute($sql, $category_name, $ordinal_number, $status, $category_id);
}
//xóa danh mục
function delete_category($id)
{
    $sql = "DELETE FROM `categories` WHERE `categories`.`category_id` = ?";
    pdo_execute($sql, $id);
}
//xem 1 sản phẩm
function load_one_category($id)
{
    $sql = "SELECT * FROM `categories` WHERE `category_id` = ?";
    return pdo_query_one($sql, $id);
}
