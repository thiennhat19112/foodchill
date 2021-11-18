<?php
session_start();
require("../views/public/header.php");
require("../views/public/navbar.php");
require_once("../models/pdo.php");
require_once("../models/category.php");
require_once("../models/product.php");
$cates = getAllCate();
$prods = getAllProd();
$discProds = getDiscountProd();
if (isset($_GET["act"]) && isset($_GET["idsp"])) {
   $idsp = $_GET["idsp"];
   if (isset($_SESSION["cart"][$idsp])) {
      $_SESSION["cart"][$idsp]["sl"] += 1;
   } else {
      $_SESSION["cart"][$idsp]["sl"] = 1;
   }
}
require("../views/shop.php");
require("../views/public/footer.php");
