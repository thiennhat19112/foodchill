<?php
    require('models/comments.php');
    $items = select_all_comments();
    require('comment.php');
?>