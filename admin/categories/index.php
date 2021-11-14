<?php
require("models/categories.php");
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    if ($act == "listCat") {
        $list_categories = loadall_categories();
        require("list.php");
    } else if ($act == "addCat") {
        insert_categories($category_name, $ordinal_numbers, $status);
        require("add.php");
    } else if ($act == "editCat") {
        $suadm = loadone_categories($_GET['$category_id']);
        require("edit.php");
    } else if ($act == "xoadmCat") {
        if (isset($_GET['category_id']) && ($_GET['category_id'] > 0)) { // Sai gia tri category_id
            // $categoryid = $_GET['$category_id']; Sai gia tri $GET
            $categoryid = $_GET['category_id'];
            delete_categories($categoryid);
        }
        $list_categories = loadall_categories();
        require("list.php");
    }
}
