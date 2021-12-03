<?php
$prod = getProd($_GET["prod_id"]);
updateView($_GET["prod_id"]);
   require_once './models/comment.php';
