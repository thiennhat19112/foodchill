<?php
//hiện tất cả các sản phẩm
function load_all_products()
{
    $sql = "SELECT * FROM products order by product_id desc ";
    return pdo_query($sql);
}
//thêm sản phẩm
function insert_product($product_name, $quantity, $price, $weight, $descriptions, $image_data, $category_id, $discount, $saled, $view, $rating, $status)
{
    $sql = "INSERT INTO `products`
            (`product_name`,
            `quantity`, 
            `price`, 
            `weight`,
            `descriptions`,
            `image`,
            `create_date`,
            `category_id`,
            `discount`,
            `saled`,
            `view`,
            `rating`,
            `status`)
              VALUES 
              (?,?,?,?,?,?,CURRENT_TIMESTAMP,?,?,?,?,?,?)";
    pdo_execute($sql,$product_name, $quantity, $price, $weight, $descriptions, $image_data,  $category_id, $discount, $saled, $view, $rating, $status);
}
//sửa danh mục
function  update_product($product_name, $quantity, $price, $weight, $descriptions, $image_data,  $category_id, $discount, $status, $product_id){
    $sql = "UPDATE products SET 
    product_name= ?,
    quantity= ?, 
    price= ?, 
    weight= ?,
    descriptions= ?,
    image= ?,
    category_id= ?,
    discount= ?,
    status=? 
    where product_id= ?";
    pdo_execute($sql, $product_name, $quantity, $price, $weight, $descriptions, $image_data,  $category_id, $discount, $status , $product_id);
}
//xóa sản phẩm
function delete_product($id)
{
    $sql = "DELETE FROM `products` WHERE `products`.`product_id` = ?";
    pdo_execute($sql, $id);
}
//xem 1 sản phẩm
function load_one_product($id)
{
    $sql = "SELECT * FROM products WHERE product_id=?";
    return pdo_query_one($sql, $id);
}

//danh mục
//Liệt kê tất cả tên danh mục và id danh mục
function load_all_name_categories()
{
    $sql = "SELECT category_name,category_id FROM categories ";
    return pdo_query($sql);
}
