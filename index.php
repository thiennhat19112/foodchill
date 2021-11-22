<?php
session_start();
if (isset($_GET['act'])) {
   $act = $_GET['act'];
} else {
   $act = 'home';
}
switch ($act) {
   case 'logout':
      session_destroy();
      header("location:./");
      break;
}
require("./models/pdo.php");
require("./models/category.php");
require("./models/product.php");
require("./views/public/header.php");
require("./views/public/navbar.php");
$cates = getAllShowCate();
$discProds = getDiscountProd();
$featuredProds = getFeaturedProd();
switch ($act) {
   case "home":
      require("./views/home.php");
      break;
   case "shop":
      require("./shop/index.php");
      require("./views/shop.php");
      break;
   case "cart":
      require("./cart/index.php");
      require("./views/cart.php");
      break;
   case "blog":
      require("./views/blog.php");
      break;
   case "contact":
      require("./views/contact.php");
      break;
   case "prod_detail":
      require("./product/index.php");
      require("./views/product.php");
      break;
      // case 'listsp':
      //     if (isset($_POST['listok']) && ($_POST['listok'])) {
      //         $kyw = $_POST['kyw'];
      //         $iddm = $_POST['iddm'];
      //         echo $kyw;
      //         echo $iddm;
      //     } else {
      //         $kyw = '';
      //         $iddm = 0;
      //     }
      //     $dsdm = loadall_danhmuc();
      //     $spnew = loadall_sanpham($kyw, $iddm);
      //     include_once("./view/home.php");
      //     break;
      // case "cart":
      //     header("location: ./view/cart/cart.php");
      //     break;
      // case "hd":
      //     header("location: ./view/hoadon/hoadon.php");
      //     break;
      // case "cthd":
      //     header("location: ./view/hdct/hdct.php");
      //     break;
      // case 'taikhoan':
      //     header("location: ./view/taikhoan/update.php");
      //     break;
   default:
      require("./views/home.php");
      break;
}
require("./views/public/footer.php");
