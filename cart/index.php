<?php
session_start();
require("../models/pdo.php");
require("../views/public/header.php");
require("../views/public/navbar.php");
if (isset($_GET["iddel"])) {
    unset($_SESSION["cart"][$_GET["iddel"]]);
}
require("../models/product.php");
require("../views/cart.php");
require("../views/public/footer.php");
