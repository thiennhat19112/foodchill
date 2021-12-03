<?PHP
function getAllShowProd() {
   $sql = "SELECT * FROM `products` WHERE `status` = 1";
   return pdo_query($sql);
}
function getProd($p_id) {
   $sql = "SELECT * FROM `products` WHERE `product_id`= ?";
   return pdo_query_one($sql, $p_id);
}

function updateProductQty($qty_change, $p_id) {
   $sql = "UPDATE `products` SET `quantity` = `quantity` + ? WHERE `products`.`product_id` = ?";
   return pdo_query_one($sql, $qty_change, $p_id);
}

function getDiscountProd() {
   $sql = "SELECT * FROM `products` WHERE `discount` > 0";
   return pdo_query($sql);
}
function getFeaturedProd() {
   $sql = "SELECT * FROM `products` ORDER BY `rating` DESC LIMIT 8";
   return pdo_query($sql);
}
function countProd($sql_sort) {
   $sql = str_replace('SELECT *', 'SELECT COUNT(product_id) as total', $sql_sort);
   return pdo_query_one($sql)['total'];
}
function getProdCate($cate_id) {
   $sql = "SELECT category_name FROM `categories` WHERE `category_id` = ?";
   return pdo_query_one($sql, $cate_id)['category_name'];
}
function getProdQty($prod_id) {
   $sql = "SELECT `quantity` FROM `products` WHERE `product_id` = ?";
   return pdo_query_one($sql, $prod_id)['quantity'];
}
function countFavorite($u_id) {
   $sql = "SELECT COUNT(product_id) as total FROM `favorites` WHERE `user_id` = ?";
   return pdo_query_one($sql, $u_id)['total'];
}
function checkFavorite($p_id, $u_id) {
   $sql = "SELECT * FROM `favorites` WHERE `product_id` = ? AND `user_id` = ?";
   $check = pdo_query_one($sql, $p_id, $u_id);
   if ($check == true) {
      echo " liked";
   } else {
      echo "";
   }
}
function searchProducts($filter) {
   $sql = "SELECT `product_id`,`product_name` FROM `products` WHERE `product_name` LIKE '%$filter%'";
   return pdo_query($sql);
}
function cmtProduct($prod) {
   $sql = "SELECT * FROM `comments` WHERE `product_id` = ?";
   $result = pdo_query($sql, $prod);

   if ($result) {
      foreach ($result as $row) {
         echo '
            <div class="cmt-item" id="cmt_' . $row['comment_id'] . '">
               <div class="cmt-i-img">
                  <a href="javascript:void(0)">
                     <img src="assets/images/avt/default.jpg" class="cmt-avt-img">
                  </a>
               </div>
               <div class="cmt-i-cont">
                  <div class="cmt-i-info">
                     <a href="javascript:void(0)">
                        ' . accCmt($row['user_id']) . '</a>&emsp;
                     <span class="shortDate">' .
            shortDate($row['create_date']) .
            '<span class="longDate">' . longDate($row['create_date']) . '</span>
                     </span>
                  </div>
                  <span>' . $row['comment_content'] . '</span>
               </div>';
         if (isset($_SESSION['u_id']) || isset($_SESSION['phanquyen'])) {
            if ($row['user_id'] == $_SESSION["u_id"] || $_SESSION["phanquyen"] == 1) {
               echo '
                        <div class="cmt-i-more btn-group">
                           <a type="button" class="dropCmtBtn" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static">
                              <i class="fas fa-ellipsis-h"></i>
                           </a>
                           <ul class="dropdown-menu dropdown-menu-end">
                              <li><a class="dropdown-item delCmtBtn" type="button" id="delCmtBtn_' . $row['comment_id'] . '">
                                 Xoá
                              </a></li>
                           </ul>
                        </div>
                     ';
            } else {
               echo '
                  <div class="cmt-i-more">
                     <a type="button"><i class="fas fa-ellipsis-h"></i></a>
                  </div>
               ';
            };
         }
         echo '
            </div>
         ';
      }
   }
}
function stringProcessor($str) {
   $str = strtolower($str);
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
   $str = str_replace(' ', '-', $str);
   return preg_replace('/[^A-Za-z0-9\-]/', '', $str);
}
