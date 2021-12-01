<?php 
    require('../models/pdo.php');
    function getPassword($id){
        $sql = "SELECT password FROM users WHERE user_id = ?";
        return pdo_query_one($sql,$id);
    }

    function updatePassword($password,$id){
        $sql = "UPDATE users SET password = MD5(?) WHERE user_id = ?";
        pdo_execute($sql, $password, $id);
    }