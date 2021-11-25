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
    $img = $_POST['img'];
    unlink("../../".$img."");
}

if(isset($_POST['comment_id'])) {
    require("comments.php");
    require("pdo.php");
    $id =$_POST['comment_id'];
    delete_comment($id);
}

if (isset($_POST['blog-id'])) {
    require("blog.php");
    require("pdo.php");
    $id =$_POST['blog-id'];
    delete_blog($id);
    $img = $_POST['img'];
    unlink("../../upload/images/blog/".$img."");
}
