<?PHP 
   function getAllCate(){
      $sql = "SELECT * FROM `categories`";
      return pdo_query($sql);
   }
   function getCate($ct_id){
      $sql = "SELECT `category_name` FROM `categories` WHERE `category_id` = ?";
      $result = pdo_query_one($sql, $ct_id);
      return $result['name'];
   }
   function newCate($ct_name){
      $sql = "INSERT INTO `categories` (`category_id`, `category_name`, `ordinal_number`, `status`) 
         VALUES (NULL, ?, '', '')";
      return pdo_execute($sql, $ct_name);
   }
   function deleteCate($ct_id){
      $sql = "DELETE FROM `categories` WHERE `category_id` = ?";
      return pdo_execute($sql, $ct_id);
   }
?>