<?PHP 
   function getAllProd(){
      $sql = "SELECT * FROM `products`";
      return pdo_query($sql);
   }
   function getDiscountProd(){
      $sql = "SELECT * FROM `products` WHERE `discount` > 0";
      return pdo_query($sql);
   }
?>