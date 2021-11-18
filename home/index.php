<?php
session_start();
require("../views/public/header.php");
require("../views/public/navbar.php");
require_once("../models/pdo.php");
require_once("../models/category.php");
require_once("../models/product.php");
$cates = getAllCate();
require("../views/home.php");
require("../views/public/footer.php");
