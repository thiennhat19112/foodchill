<?php
function select_all_comments()
{
    $sql = "SELECT * FROM ((comments INNER JOIN products ON comments.product_id = products.product_id) INNER JOIN users ON comments.user_id = users.user_id) order by comment_id desc";
    return pdo_query($sql);
}

//xóa sản phẩm
function delete_comment($id)
{
    $sql = "DELETE FROM `comments` WHERE `comments`.`comment_id` = ?";
    pdo_execute($sql, $id);
}
