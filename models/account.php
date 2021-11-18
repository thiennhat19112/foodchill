<?php
function loadall_taikhoan() {
    $sql = "select * from users order by user_id desc;";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}
function insert_taikhoan($user_name, $email, $password) {
    $sql = "INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `join_date`, `permission`, `status`) VALUES (NULL, '$user_name', '$email', MD5('$password'), CURRENT_TIMESTAMP, '0', '1')";
    pdo_execute($sql);
}
function checkuser($user_name, $password) {
    $sql = "select * from users where user_name='" . $user_name . "' AND  password= MD5('$password');";
    $user = pdo_query_one($sql);
    return $user;
}
// function checkemail($email)
// {
//     $sql = "select * from taikhoan where email='" . $email . "'";
//     $sp = pdo_query_one($sql);
//     return $sp;
// }

// function checkuser1($user)
// {
//     $sql = "select * from taikhoan where user='" . $user . "'";
//     $sp = pdo_query_one($sql);
//     return $sp;
// }

// function update_taikhoan($id, $user, $pass, $email, $address, $tel)
// {
//     $sql = "update taikhoan set user='" . $user . "', pass=MD5('" . $pass . "'), email='" . $email . "',address='" . $address . "',tel='" . $tel . "' where id=" . $id;
//     pdo_execute($sql);
// }

// function delete_taikhoan($id)
// {
//     $sql = "delete from taikhoan where id=" . $id;
//     pdo_execute($sql);
// }
