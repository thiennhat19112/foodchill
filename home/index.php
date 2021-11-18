<?php
session_start();
if (isset($_GET['act'])) {
    $act = $_GET['act'];
} else {
    $act = 'home';
}
switch ($act) {
    case "sp":
        include_once("./view/home.php");
        break;
    case 'listsp':
        if (isset($_POST['listok']) && ($_POST['listok'])) {
            $kyw = $_POST['kyw'];
            $iddm = $_POST['iddm'];
            echo $kyw;
            echo $iddm;
        } else {
            $kyw = '';
            $iddm = 0;
        }
        // $dsdm = loadall_danhmuc();
        // $spnew = loadall_sanpham($kyw, $iddm);
        // include_once("./view/home.php");
        break;
    case "cart":
        header("location: ./view/cart/cart.php");
        break;
    case "hd":
        header("location: ./view/hoadon/hoadon.php");
        break;
    case "cthd":
        header("location: ./view/hdct/hdct.php");
        break;
    case 'login':
        header("location: ./view/taikhoan/login.php");
        break;
    case 'signup':
        header("location: ./view/taikhoan/signup.php");
        break;
    case 'taikhoan':
        header("location: ./view/taikhoan/update.php");
        break;
    case 'logout':
        session_destroy();
        header("location:./");
        break;
    default:
        // header("location: ../home");
        break;
}

require("../views/public/header.php");
require("../views/public/navbar.php");
require_once("../models/pdo.php");
require_once("../models/category.php");
require_once("../models/product.php");
$cates = getAllCate();
require("../views/home.php");
require("../views/public/footer.php");
