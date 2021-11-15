<?PHP 
   function getAllProd(){
      $sql = "SELECT * FROM `products`";
      return pdo_query($sql);
   }
   function getProd($p_id){
      $sql = "SELECT * FROM `products` WHERE `product_id`= ?";
      return pdo_query($sql, $p_id);
   }
   function getDiscountProd(){
      $sql = "SELECT * FROM `products` WHERE `discount` > 0";
      return pdo_query($sql);
   }
?>