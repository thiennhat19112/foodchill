<?php
//hiện tất cả các sản phẩm
function load_all_products()
{
    $sql = "SELECT * FROM products order by product_id desc ";
    return pdo_query($sql);
}
//thêm sản phẩm
function insert_product($product_name, $quantity, $price, $weight, $description, $infomation, $image_data, $category_id, $discount, $saled, $view, $rating, $status)
{
    $sql = "INSERT INTO `products`
            (            `product_name`,
            `quantity`, 
            `price`, 
            `weight`,
            `description`,
            `infomation`,
            `image`,
            `create_date`,
            `category_id`,
            `discount`,
            `saled`,
            `view`,
            `rating`,
            `status`)
              VALUES 
              (?,?,?,?,?,?,?,CURRENT_TIMESTAMP,?,?,?,?,?,?)";
    pdo_execute($sql,$product_name, $quantity, $price, $weight, $description, $infomation, $image_data,  $category_id, $discount, $saled, $view, $rating, $status);
}
//sửa sản phẩm
function  update_product($product_name, $quantity, $price, $weight, $description, $infomation, $image_data,  $category_id, $discount, $status, $product_id){
    $sql = "UPDATE products SET 
    `product_name` = ?,
    `quantity` = ?, 
    `price` = ?, 
    `weight` = ?,
    `description` = ?,
    `infomation` = ?,
    `image` = ?,
    `category_id` = ?,
    `discount` = ?,
    `status` = ? 
    where `product_id` = ?";
    pdo_execute($sql, $product_name, $quantity, $price, $weight, $description, $infomation, $image_data,  $category_id, $discount, $status , $product_id);
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
    $sql = "SELECT `category_name`, `category_id` FROM `categories` ";
    return pdo_query($sql);
}

function stringProcessor($str) {
    $str = strtolower($str);
    $unicode = array(
       'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
       'd' => 'đ',
       'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
       'i' => 'í|ì|ỉ|ĩ|ị',
       'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
       'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
       'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
       'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
       'D' => 'Đ',
       'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
       'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
       'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
       'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
       'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );
    foreach ($unicode as $nonUnicode => $uni) {
       $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }
    $str = str_replace(' ', '-', $str);
    return preg_replace('/[^A-Za-z0-9\-]/', '', $str);
 }