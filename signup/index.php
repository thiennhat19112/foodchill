<?php
include_once("../models/pdo.php");
include_once("../models/account.php");
if (isset($_POST["btnSignup"])) {
    $email = $_POST["email"];
    $user_name = $_POST["username"];
    $password = $_POST["password"];
    $vldpasswd = $_POST["2checkpass"];
    if ($vldpasswd == $password) {
        insert_taikhoan($user_name, $email, $password);
        $message = "Đăng ký thành công!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("Location: ../login");
    } else {
        $message = "Đăng ký thất bại!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
require_once("./sign-up.php");
