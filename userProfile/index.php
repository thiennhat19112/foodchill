<?php
require('../models/userprofile.php');
if (isset($_POST['password_cur'])) {
    $id = $_POST['id'];
    $password = $_POST['password_cur'];
    $val = getPassword($id);
    if (md5($password) == $val['password']) {
        echo "true";
    } else {
        echo "false";
    }

    
}

if (isset($_POST['password_new'])) {
    $id = $_POST['id'];
    $password_new = $_POST['password_new'];
    updatePassword($password_new, $id);
}
