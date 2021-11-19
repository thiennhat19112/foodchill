<?php
if (isset($_POST['category_id'])) {
    require("categories.php");
    require("pdo.php");
    $id =$_POST['category_id'];
    delete_category($id);
}

if (isset($_POST['user_id'])) {
    require("users.php");
    require("pdo.php");
    $id =$_POST['user_id'];
    delete_user($id);
}

if (isset($_POST['product_id'])) {
    require("products.php");
    require("pdo.php");
    $id =$_POST['product_id'];
    delete_product($id);
}
