<?PHP
function getAllShowProd(){
   $sql = "SELECT * FROM `products` WHERE `status` = 1";
   return pdo_query($sql);
}
function getProd($p_id) {
   $sql = "SELECT * FROM `products` WHERE `product_id`= ?";
   return pdo_query_one($sql, $p_id);
}
function getDiscountProd() {
   $sql = "SELECT * FROM `products` WHERE `discount` > 0";
   return pdo_query($sql);
}
function getFeaturedProd(){
   $sql = "SELECT * FROM `products` ORDER BY `rating` DESC LIMIT 8";
   return pdo_query($sql);
}
function countProd($sql_sort){
   $sql = str_replace('SELECT *', 'SELECT COUNT(product_id) as total', $sql_sort);
   return pdo_query_one($sql)['total'];
}
function getProdCate($cate_id){
   $sql = "SELECT category_name FROM `categories` WHERE `category_id` = ?";
   return pdo_query_one($sql, $cate_id)['category_name'];
}
function stringProcessor($str) {
   $unicode = array(
      'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
      'd' => 'đ',
      'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
      'i' => 'í|ì|ỉ|ĩ|ị',
      'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
      'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
      'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
      'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
      'D' => 'Đ',
      'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
      'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
      'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
      'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
      'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
   );
   foreach ($unicode as $nonUnicode => $uni) {
      $str = preg_replace("/($uni)/i", $nonUnicode, $str);
   }
   $str = strtolower(str_replace(' ', '-', $str));
   return $str;
}
