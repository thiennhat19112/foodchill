<?PHP
   session_start();
   require_once('./pdo.php');
   require_once('./product.php');
   require_once('./cart.php');
   require_once('./comment.php');

   if (isset($_POST["action"])) {
      $sql = "SELECT * FROM products WHERE `status` = '1'";
      if (isset($_POST["category"])) {
         $category_filter = implode("','", $_POST["category"]);
         $sql .= " AND `category_id` IN('" . $category_filter . "')";
      }
      if (isset($_POST["min_price"], $_POST["max_price"]) && !empty($_POST["min_price"]) && !empty($_POST["max_price"])) {
         $sql .= " AND `price` BETWEEN " . $_POST["min_price"] . " AND " . $_POST["max_price"];
      }
      if (isset($_POST["sort"])) {
         $sql .= " ORDER BY " . $_POST["sort"];
      }
      $tProd = countProd($sql);

      $limit = 12;
      $start = 0;
      $pageNum = 1;
      if (isset($_POST["page"])){ 
         $pageNum = $_POST["page"];
         $start = ($pageNum - 1) * $limit;
      } 
      $sql .= " LIMIT " . $start . ", " . $limit;

      if($tProd%$limit == 0){
         $tPages = $tProd/$limit;
      }else{
         $tPages = floor($tProd/$limit) + 1;
      }
      
      $page_active = $_POST['page_active'];
      $prevPage = $page_active - 1;
      $nextPage = $page_active + 1;

      $sortPage = '';
      if($page_active != 1){
         $sortPage .= '<button value="'.$prevPage.'" ><i class="fa fa-long-arrow-left"></i></button>';
      }
      for($i=1; $i <= $tPages; $i++){
         if($i == $pageNum){
            $sortPage .= '<button class="active" value="'.$i.'">'.$i.'</button>';
         } else {
            $sortPage .= '<button value="'.$i.'">'.$i.'</button>';
         }
         $lastPage = $i;
      }
      if($page_active != $lastPage){
         $sortPage .= '<button value="'.$nextPage.'" ><i class="fa fa-long-arrow-right"></i></button>';
      }
      $sortPage .= '
         <script> 
            function filter_data() {
               var action = "fetch_data";
               var min_price = $("#hidden_minimum_price").val();
               var max_price = $("#hidden_maximum_price").val();
               var category = get_filter("category");
               var sort = get_sort();
               var page = $("#page_number").val();
               var page_active = $("#page_number_active").val();
               $.ajax({
                  url: "./models/ajax.php",
                  method: "POST",
                  data: { "action": action, "min_price": min_price, "max_price": max_price, "category": category, "sort": sort, "page": page, "page_active": page_active},
                  success: function(result) {
                     var jsonResult = $.parseJSON(result);
                     var data1 = jsonResult[0];
                     var data2 = jsonResult[1];
                     var data3 = jsonResult[3];
                     $("#foundedProd").html(data2);
                     $(".sort--prod").html(data1);
                     $(".set-bg").each(function () {
                           var bg = $(this).data("setbg");
                           $(this).css("background-image", "url(" + bg + ")");
                     });
      
                     $("#sort--page").html(data3);
                  }
               });
            }

            function get_filter(class_name) {
               var filter = [];
               $("." + class_name + ":checked").each(function () {
                  filter.push($(this).val());
               });
               return filter;
            }
            function get_sort() {
               return $("#sort_option option:selected").val();
            }

            $("#sort--page button").click(function () {
               $("#page_number").val($(this).val());
               $("#page_number_active").val($(this).val());
               filter_data();
               function myFunction() {
                  document.getElementById("aaaa").scrollIntoView({
                     behavior: "smooth"
                  });
               }
               myFunction();
               $("#page_number").val(1);
            });
         </script>
      '; // Script for Page

      $statement = pdo_get_connection()->prepare($sql);
      $statement->execute();
      $result = $statement->fetchAll();
      $total_row = $statement->rowCount();
      $output = '';
      
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
      echo json_encode(array($output, $tProd, $tPages, $sortPage));
   }  // Sort Products on Shop

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
   }  // Add to Favorite

   if (isset($_POST["addToCart"])) {
      $user_id = $_POST["user_id"];
      $prod_id = $_POST["addToCart"];
      $add_qty = $_POST["qty"];

      if (checkCart($user_id, $prod_id) == false) {
         insertCart($user_id, $prod_id, $add_qty);
      } else {
         $prod_qty = getQty($user_id, $prod_id) + $add_qty;
         if($prod_qty > getProdQty($prod_id)){
            $prod_qty = getProdQty($prod_id);
         }
         changeQty($prod_qty, $user_id, $prod_id);
      }
      echo countCart($user_id);
   }  // Add to Cart

   if (isset($_POST["changeQtyProd"])) {
      $user_id = $_POST["user_id"];
      $change_prod_id = $_POST["changeQtyProd"];
      $change_qty = $_POST["qty"];

      changeQty($change_qty, $user_id, $change_prod_id);  // Change new item Qty of Cart to database

      $productCart = showProductCart($user_id);
      $tong = 0;
      foreach ($productCart as $key => $value) {
         $prod_id = $value["product_id"];
         $prod_qty = $value["quantity"];
         $product = getProd($prod_id);
         $prod_price = $product["price"] * ((100 - $product['discount']) / 100);
         $thanhtien = $prod_price * $prod_qty;
         $tong += $thanhtien;
      }  // Tính lại tổng tiền
      
      $prodChange = getProd($change_prod_id);
         $priceChange = $prodChange["price"] * ((100 - $prodChange['discount']) / 100);
         $thanhtienProd = $priceChange * $change_qty;
      // Tính thành tiền sản phẩm được thay đổi

      echo json_encode(
         array(
            number_format($thanhtienProd, 0, ',', '.'), 
            number_format($tong, 0, ',', '.'), 
            number_format($tong, 0, ',', '.')
         )
      );
   }  // Change Quantity of Cart

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
      }  // Tính lại tổng tiền

      echo json_encode(
         array(
            $total_product, 
            number_format($tong, 0, ',', '.'), 
            number_format($tong, 0, ',', '.')
         )
      );
   }  // Delete product from Cart

   if (isset($_POST["new_cmt_prod"])) {
      $prod_id = $_POST['new_cmt_prod'];
      $user_id = $_POST['u_id'];
      $content = $_POST['content'];

      //Create Comment in database
      newCmt($user_id, $prod_id, $content);

      $date = date('Y-m-d H:i:s');

      //Sent To Ajax
      echo '
         <div class="cmt-item">
            <div class="cmt-i-img">
               <a href="javascript:void(0)">
                  <img src="assets/images/avt/default.jpg" class="cmt-avt-img">
               </a>
            </div>
            <div class="cmt-i-cont">
               <div class="cmt-i-info">
                  <a href="javascript:void(0)">
                     '.accCmt($user_id).'</a>&emsp;
                  <span class="shortDate">'.
                     shortDate($date).
                     '<span class="longDate">'.longDate($date).'</span>
                  </span>
               </div> 
               <span>'.$content.'</span>
            </div>
            <div class="cmt-i-more">
               <i class="fas fa-ellipsis-h"></i>
            </div>
         </div>
      ';
   }  // Add new comment