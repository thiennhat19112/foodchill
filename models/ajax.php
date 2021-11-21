<?PHP
require_once('./pdo.php');
require_once('./product.php');

if (isset($_POST["action"])) {
   $sql = "SELECT * FROM products WHERE `status` = '1'";
   if (isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])) {
      $sql .= " AND price BETWEEN '" . $_POST["minimum_price"] . "' AND '" . $_POST["maximum_price"] . "'";
   }
   if (isset($_POST["category"])) {
      $category_filter = implode("','", $_POST["category"]);
      $sql .= " AND category_id IN('" . $category_filter . "')";
   }
   if (isset($_POST["ram"])) {
      $ram_filter = implode("','", $_POST["ram"]);
      $sql .= " AND product_ram IN('" . $ram_filter . "')";
   }
   if (isset($_POST["sort"])) {
      $sql .= " ORDER BY " . $_POST["sort"][0];
   }
   $tProd = countProd($sql);
   $statement = pdo_get_connection()->prepare($sql);
   $statement->execute();
   $result = $statement->fetchAll();
   $total_row = $statement->rowCount();
   $output = '';
   if ($total_row > 0) {
      foreach ($result as $row) {
         $product_name = $row['product_name'];
         $output .= '
            <div class="col-lg-4 col-md-6 col-sm-6">
               <div class="product__item">
                  <div class="product__item__pic set-bg" data-setbg="' . $row['image'] . '">
                     <ul class="product__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                        <li><a href="?act=shop&productid=' . $row['product_id'] . '"><i class="fa fa-shopping-cart"></i></a></li>
                     </ul>
                  </div>
                  <div class="product__item__text">
                     <h6><a href="shop/product/' . $row['product_id'] . '-' . stringProcessor($product_name) . '">' . $product_name . '</a></h6>
                     <h5>' . number_format($row['price'] * ((100 - $row['discount']) / 100), 0, ',', '.') . ' VND</h5>
                  </div>
               </div>
            </div>
            ';
      }
   } else {
      $output = '<h3>No Data Found</h3>';
   }
   echo json_encode(array($output, $tProd));
}
