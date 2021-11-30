<?PHP 
   include_once 'pdo.php';

   function getAllCmt() {
      $sql = "SELECT * FROM comment";
      return pdo_query($sql);
   }

   function getCmt($id_cmt) {
      $sql = "SELECT * FROM comment where id = ?";
      return pdo_query($sql, $id_cmt);
   }
   function getCmtId($id_acc, $id_post, $cont){
      $sql = "SELECT id FROM comment where id_post = ? and id_acc = ? and content = ?";
      return pdo_query_one($sql, $id_post, $id_acc, $cont);
   }

   // function filterCmt($fil1) {
   //    $sql = "SELECT 'name' FROM category WHERE 'name' LIKE ?";
   //    $var_filter = "%$fil1%";
   //    return pdo_query($sql, $var_filter);
   // }

   function newCmt($u_id, $p_id, $cont){
      $sql = "INSERT INTO `comments` (`comment_id`, `user_id`, `product_id`, `comment_content`, `create_date`, `status`) 
         VALUES (NULL, ?, ?, ?, CURRENT_TIMESTAMP, '1')";
      return pdo_execute($sql, $u_id, $p_id, $cont);
   }
   
   function deleteCmt($u_id, $p_id){
      $sql = "DELETE FROM `comments` WHERE `comments`.`user_id` = ? AND `comments`.`product_id` = ?";
      return pdo_execute($sql, $u_id, $p_id);
   }

   function accCmt($u_id){
      $sql = "SELECT `user_name` FROM `users` where `user_id` = ?";
      $result = pdo_query_one($sql, $u_id);
      return $result['user_name'];
   }

   function numCmt($prod_id){
      $sql = "SELECT count('user_id') as total FROM `comments` WHERE `product_id` = ?";
      $result = pdo_query_one($sql, $prod_id);
      return $result['total'];
   }
?>