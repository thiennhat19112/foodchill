<?php
session_start();
if (isset($_SESSION["username"])) {
    if ($_SESSION["phanquyen"] != '1') {
        header("location: ../");
    }
} else {
    header("location: ../login");
}

if (isset($_GET['v'])) {
    $v = $_GET['v'];
    if ($v == "logout") {
        session_destroy();
        header("location: ../home");
    }
}
require("models/pdo.php");
require("site/head.php");
require("site/sidebar.php");
require("site/header.php");
if (isset($_GET['v'])) {
    $v = $_GET['v'];
    if ($v == "categories") {
        require("categories/index.php");
    } else if ($v == "product") {
        require("products/index.php");
    } else if ($v == "order") {
        require("order/order.php");
    } else if ($v == "user") {
        require("users/index.php");
    } else if ($v == "comment") {
        require("comment/comment.php");
    } else if ($v == "order_detail") {
        require("order_details/order_details.php");
    }
} else {
    require("dashboard/home.php");
}
require("site/footer.php");
