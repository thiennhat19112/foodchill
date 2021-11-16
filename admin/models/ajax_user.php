<?php
if (isset($_POST['user_id'])) {
    require("users.php");
    require("pdo.php");
    $id =$_POST['user_id'];
    delete_user($id);
    echo 'success';
}