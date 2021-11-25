<?php
    require('models/blog.php');
    $items = select_all_blogs();

    //lấy id bài viết
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $item = select_once_blog($id);
        extract($item);
    }

    $items_limit = select_limit_blogs();
    
?>