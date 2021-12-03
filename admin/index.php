<?php
session_start();
if (isset($_SESSION["username"])) {
    if ($_SESSION["phanquyen"] != '1') {
        header("location: ../");
    }
} else {
    header("location: ../login/");
}

if (isset($_GET['v'])) {
    $v = $_GET['v'];
    if ($v == "logout") {
        session_destroy();
        header("location: ../");
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
    } else if ($v == "user") {
        require("users/index.php");
    } else if ($v == "comment") {
        require("comment/index.php");
    } else if ($v == "blogs"){
        require("blog/index.php");
    }
} else {
    require("dashboard/index.php");
}
require("site/footer.php");
