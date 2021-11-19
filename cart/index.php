<?php
if (isset($_GET["iddel"])) {
    unset($_SESSION["cart"][$_GET["iddel"]]);
}
