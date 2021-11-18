<?php
session_start();
include_once("../models/pdo.php");
include_once("../models/account.php");
if (isset($_POST["btnLogin"])) {
    $username = $_POST["txtUsername"];
    $password = $_POST["txtPassword"];
    $sql_u = checkuser($username, $password);
    if ($sql_u != null) {
        if (!isset($_SESSION["username"])) {
            $_SESSION["username"] = $sql_u["user_name"];
            $_SESSION["phanquyen"] = $sql_u["permission"];
        }
        if ($_SESSION["phanquyen"] == 1) {
            header("location: ../admin/index.php");
        } else {
            header("location: index.php");
        }
    } else {
        $message = "Tên người dùng hoặc mật khẩu không đúng!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
require_once("./sign-in.php");
