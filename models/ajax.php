<?PHP
session_start();
require_once('./pdo.php');
require_once('./product.php');
require_once('./cart.php');

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
   if (isset($_SESSION["u_id"])) {
      $user_id = $_SESSION["u_id"];
   } else {
      $user_id = 0;
   }
   if ($total_row > 0) {
      foreach ($result as $v) {
         $output .= '
            <div class="col-lg-4 col-md-6 col-sm-6">
            
               <div class="product__item">
                  <div class="product__item__pic set-bg" data-setbg="' . $v['image'] . '">
                     <ul class="product__item__pic__hover">
                        <li><button value="' . $v['product_id'] . '" class="favorite"><i class="fa fa-heart"></i></button></li>
                        <li><button value="' . $v['product_id'] . '" class="addToCart"><i class="fa fa-shopping-cart"></i></button></li>
                     </ul>
                  </div>
                  <div class="product__item__text">
                     <h6 class="text-truncate"><a href="shop/product/' . stringProcessor($v['product_name']) . '-' . $v['product_id'] . '">' . $v['product_name'] . '</a></h6>
                     <h5>' . number_format($v['price'] * ((100 - $v['discount']) / 100), 0, ',', '.') . ' VND</h5>
                  </div>
               </div>
         </div>
         ';
      }
   } else {
      $output = '<h3>Không tìm thấy sản phẩm phù hợp!</h3>';
   }
   $output .= '
      <script>
         $("button.favorite").click(function() {
            var prod_id = $(this).val();
            var u_id = $("#user_id").val();
            if(u_id == "0"){
               alert("Vui lòng đăng nhập để sử dụng chức năng này");
            }else{
               $.ajax({
                  url:"./models/ajax.php",
                  method:"POST",
                  data:{
                     "favorite": prod_id,
                     "user_id": u_id,
                  },
                  success:function(data){
                     $("#showUserLike").html(data);
                  }
               });
            }
         });
         $("button.addToCart").click(function() {
            var prod_id = $(this).val();
            var u_id = $("#user_id").val();
            var qty = $("#add_qty").val();
            console.log(qty);
            if (u_id == "0") {
                  alert("Vui lòng đăng nhập để sử dụng chức năng này");
            } else {
                  $.ajax({
                     url:"./models/ajax.php",
                     method:"POST",
                     data:{
                        "addToCart": prod_id,
                        "user_id": u_id,
                        "qty": qty,
                     },
                     success:function(data){
                        $("#showUserCart").html(data);
                     }
                  });
            }
         });
      </script>
   '; // Script for Favorite and Cart
   echo json_encode(array($output, $tProd));
}  //Sort products on Shop

if (isset($_POST["favorite"])) {
   $prod_id = $_POST["favorite"];
   $user_id = $_POST['user_id'];
   $sql = "SELECT * FROM `favorites` WHERE `product_id` = $prod_id AND`user_id` = $user_id";
   $check = pdo_query_one($sql);
   if ($check == false) {
      $sql2 = "INSERT INTO `favorites` (`product_id`, `user_id`) VALUES ('$prod_id', '$user_id')";
   } else {
      $sql2 = "DELETE FROM `favorites` WHERE `favorites`.`product_id` = $prod_id AND `favorites`.`user_id` = '$user_id'";
   }
   pdo_execute($sql2);
   echo countFavorite($user_id);
}  //Add to favorite

if (isset($_POST["addToCart"])) {
   $user_id = $_POST["user_id"];
   $prod_id = $_POST["addToCart"];
   $add_qty = 1;
   if(isset($POST["qty"])){
      $add_qty = $_POST["qty"];
   }

   if (checkCart($user_id, $prod_id) == false) {
      $prod_qty = 1;
      insertCart($user_id, $prod_id, $prod_qty);
   } else {
      $prod_qty = getQty($user_id, $prod_id);
      changeQty($prod_qty + $add_qty, $user_id, $prod_id);
   }
   echo countCart($user_id);
}

// Delete product from Cart
if (isset($_POST["product_cart_remove"]) && isset($_SESSION["u_id"])) {
   $user_id = $_SESSION["u_id"];
   $product_id  = filter_var($_POST["product_cart_remove"], FILTER_SANITIZE_STRING);
   deleteItemCart($user_id, $product_id);
   $total_product = countCart($user_id);

   $productCart = showProductCart($user_id);
   $tong = 0;
   foreach ($productCart as $key => $value) {
      $prod_id = $value["product_id"];
      $prod_qty = $value["quantity"];
      $product = getProd($prod_id);
      $prod_price = $product["price"] * ((100 - $product['discount']) / 100);
      $thanhtien = $prod_price * $prod_qty;
      $tong += $thanhtien;
   }  // Tính lại tiền

   echo json_encode(array($total_product, number_format($tong, 0, ',', '.'), number_format($tong, 0, ',', '.')));
}
