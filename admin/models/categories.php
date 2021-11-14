<?php
function insert_categories($category_name, $ordinal_numbers, $status)
{
    $sql = "INSERT INTO  categories(category_name, ordinal_numbers,status) VALUES('$category_name' ,'$ordinal_numbers','$status')";
    pdo_execute($sql);
}

function update_categories($category_id, $category_name, $ordinal_numbers, $status)
{
    $sql = "UPDATE categories SET category_name='" . $category_name . "',ordinal_numbers='" . $ordinal_numbers . "',status='" . $status . "' where category_id=" . $category_id;
    pdo_execute($sql);
}

function delete_categories($category_id)
{
    // $sql = "DELETE * FROM categories WHERE category_id=" . $category_id; SQL sai cu phap
    $sql = "DELETE FROM `categories` WHERE `category_id` =  $category_id";
    pdo_execute($sql);
}

function loadall_categories()
{
    $sql = "SELECT * FROM categories order by category_id desc";
    $category = pdo_query($sql);
    return $category;
}

function loadone_categories($category_id)
{
    $sql = "SELECT * FROM categories where category_id=" . $category_id;
    $dm = pdo_query_one($sql);
    return $dm;
}
