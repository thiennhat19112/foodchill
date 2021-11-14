<?php
if (isset($_POST['category_id'])) {
    require("categories.php");
    require("pdo.php");
    $id =$_POST['category_id'];
    delete_category($id);
    echo 'success';
}
