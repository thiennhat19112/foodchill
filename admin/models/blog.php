<?php
//hiện tất cả các danh mục
function load_all_blogs()
{
    $sql = "SELECT * FROM blog order by blog_id desc";
    return pdo_query($sql);
}
//thêm danh mục
function insert_blog($title, $image, $descriptions,$user_id,$content ,$status)
{
    $sql = "INSERT INTO `blog`( `title`, `image`, `descriptions`, `create_date`, `user_id`, `content`, `status`) 
    VALUES
     (?,?,?,CURRENT_TIMESTAMP,?,?,?)";
    pdo_execute($sql, $title, $image, $descriptions,$user_id,$content ,$status);
}
//sửa bài viết
function update_blog($title, $image, $descriptions,$user_id,$content ,$status,$blog_id)
{
    $sql = "UPDATE `blog` SET 
    `title`=?,
    `image`=?,
    `descriptions`= ?,
    `user_id`= ?,
    `content`= ?,
    `status`= ? WHERE blog_id = ?";
    pdo_execute($sql, $title, $image, $descriptions,$user_id,$content ,$status,$blog_id);
}
//xóa bài viết
function delete_blog($id)
{
    $sql = "DELETE FROM `blog` WHERE `blog`.`blog_id` = ?";
    pdo_execute($sql, $id);
}
//xem 1 bài viết
function load_one_blog($id)
{
    $sql = "SELECT * FROM blog WHERE blog_id=?";
    return pdo_query_one($sql, $id);
}
