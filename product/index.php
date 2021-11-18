<?php
require_once("../models/pdo.php");
require_once("../models/category.php");
require_once("../models/product.php");
require("../views/public/header.php");
require("../views/public/navbar.php");
$prod = getProd($_GET["prod_id"]);
require_once("../views/product.php");
require("../views/public/footer.php");
