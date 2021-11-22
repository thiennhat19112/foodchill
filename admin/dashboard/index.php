<?php
    
    require('models/orders.php');
    $items = select_all_orders() ;
    require('home.php');
