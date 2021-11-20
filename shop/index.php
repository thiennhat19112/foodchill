<?php
$cates = getAllShowCate();
$discProds = getDiscountProd();
$prods = getAllShowProd();
if (isset($_GET["act"]) && isset($_GET["productid"])) {
   $productid = $_GET["productid"];
   if (isset($_SESSION["cart"][$productid])) {
      $_SESSION["cart"][$productid]["sl"] += 1;
   } else {
      $_SESSION["cart"][$productid]["sl"] = 1;
   }
}
