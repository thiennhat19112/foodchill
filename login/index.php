<?php
    session_start();
    include_once("../models/pdo.php");
    include_once("../models/account.php");
    if (isset($_POST["btnLogin"])) {
        $email = $_POST["txtEmail"];
        $password = $_POST["txtPassword"];
        $sql_u = checkuser($email, $password);
        if ($sql_u != null) {
            if (!isset($_SESSION["username"])) {
                $_SESSION["u_id"] = $sql_u["user_id"];
                $_SESSION["username"] = $sql_u["user_name"];
                $_SESSION["email"] = $sql_u["email"];
                $_SESSION["phanquyen"] = $sql_u["permission"];
            }
            if ($_SESSION["phanquyen"] == 1) {
                header("location: ../admin/");
            } else {
                header("location: ../");
            }
        } else {
            $message = "Email hoặc mật khẩu không đúng!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
    require_once("./sign-in.php");
