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
require("./models/account.php");
require("./models/order.php");
require("./models/category.php");
require("./models/product.php");
require("./models/cart.php");
require("./views/public/header.php");
require("./views/public/navbar.php");
require("./blog/index.php");
$cates = getAllShowCate();
$discProds = getDiscountProd();
$featuredProds = getFeaturedProd();
$items_limit = select_limit_blogs();
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
   case "ship":
      require("./ship/index.php");
      require("./views/ship.php");
      break;
   case "blog_detail":
      require("./views/blog-details.php");
      break;
   case "info":
      require("./views/userProfile.php");
      break;
   default:
      require("./views/home.php");
      break;
}
require("./views/public/footer.php");
