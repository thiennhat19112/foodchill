<?php
session_start();
require("../models/pdo.php");
require("../views/public/header.php");
require("../views/public/navbar.php");
require("../models/product.php");
require("../views/cart.php");
require("../views/public/footer.php");
if (isset($_GET["idxoasp"])) {
    unset($_SESSION["cart"][$_GET["idxoasp"]]);
}
