<?php 
    function select_all_comments(){
        $sql = "SELECT * FROM comments INNER JOIN users on comments.user_id = users.user_id;";
        return pdo_query($sql);
    }
   
?>