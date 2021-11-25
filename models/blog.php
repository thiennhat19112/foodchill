<?php
    function select_all_blogs(){
        $sql = "SELECT * FROM blog ORDER BY blog_id DESC";
        return pdo_query($sql);
    }

    function select_once_blog($id) {
        $sql = "SELECT * FROM blog INNER JOIN users ON blog.user_id = users.user_id WHERE blog_id = ?";
        return pdo_query_one($sql,$id);
    }

    function select_limit_blogs(){
        $sql = "SELECT * FROM blog ORDER BY blog_id DESC LIMIT 4";
        return pdo_query($sql);
    }

?>