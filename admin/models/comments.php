<?php 
    function select_all_comments(){
        $sql = "SELECT comments.comment_content,users.user_name, products.product_name, comments.create_date FROM ((comments INNER JOIN products ON comments.product_id = products.product_id) INNER JOIN users ON comments.user_id = users.user_id)";
        return pdo_query($sql);
    }
    
?>