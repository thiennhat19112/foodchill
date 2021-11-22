<?php
// thêm 
function insert_user($user_name, $email, $password,$permission,$status)
{
    $sql = "INSERT INTO  users(user_name,email, password,permission,status) 
        VALUES(?,?,MD5(?),?,?)";
    pdo_execute($sql,$user_name, $email, $password,$permission,$status);
}
// sửa
function update_user($user_name, $email, $password,$permission,$status,$user_id)
{
    $sql = "UPDATE users SET user_name=?,email=?,password=MD5(?),permission=?,status=? 
    where user_id= ?";
    pdo_execute($sql,$user_name, $email, $password,$permission,$status,$user_id);
}
// hiện tất cả các
function load_all_user()
{
    $sql = "SELECT * FROM users order by user_id desc";
    return pdo_query($sql);
}
//xóa 
function delete_user($id)
{
    $sql = "DELETE FROM `users` WHERE `users`.`user_id` = ?";
    pdo_execute($sql, $id);
}
//xem 1 sản phẩm
function load_one_user($id)
{
    $sql = "SELECT * FROM users WHERE user_id=?";
    return pdo_query_one($sql, $id);
}


?>