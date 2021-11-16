<?php
if (isset($_POST['category_id'])) {
    require("categories.php");
    require("pdo.php");
    $id =$_POST['category_id'];
    delete_category($id);
    echo 'success';
}

if (isset($_POST['user_id'])) {
    require("users.php");
    require("pdo.php");
    $id =$_POST['user_id'];
    delete_user($id);
    echo 'success';
}
