<?PHP
      if (isset($_SESSION['u_id'])) {
         echo '<input type="hidden" id="user_id" value="' . $_SESSION["u_id"] . '">';
      } else {
         echo '<input type="hidden" id="user_id" value="0">';
      }
   ?>
   <!-- Lấy user_id cho ajax -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="./assets/images/breadcrumb.jpg">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 text-center">
            <div class="breadcrumb__text">
               <h2>Yêu thích</h2>
               <div class="breadcrumb__option">
                  <a href="home/">Trang chủ</a>
                  <span>Yêu thích</span>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="shoping__cart__table">
               <table class="cart-table">
                  <tbody>
                     <?PHP
                     //Cart database
                     $tong = 0;
                     if (isset($_SESSION["u_id"])) {
                        $user_id = $_SESSION["u_id"];
                        $user = getUserById($user_id);
                        $likedProds = getFavorite($user_id);
                        foreach ($likedProds as $key => $value) {
                           $prod_id = $value["product_id"];
                           $product = getProd($prod_id);
                     ?>
                           <tr>
                              <td class="shoping__cart__item">
                                 <img src="<?= $product["image"] ?>" alt="" style="height: 7vw;">
                                 <h5 class="text-truncate"><a href="shop/product/<?= stringProcessor($product['product_name']) ?>-<?= $product['product_id'] ?>"><?= $product['product_name'] ?></a></h5>
                              </td>
                              <td class="shoping__cart__price favorite addToCart">
                                 <input type="hidden" id="add_qty" value="1"> <!-- Số lượng mặc định khi thêm vào giỏ hàng -->
                                 <?PHP 
                                    if($product['quantity']==0){
                                       echo '
                                          <button class="primary-btn dis" disable>Hết hàng</button>
                                       ';
                                    } else {
                                       echo '
                                          <button value="'.$product['product_id'].'" class="addToCart primary-btn"><i class="fa fa-shopping-cart"></i></button>
                                       ';
                                    }
                                 ?>
                              </td>
                              <td class="shoping__cart__total favorite">
                                 <button value="<?=$product['product_id'] ?>" class="favorite 
                                    <?PHP 
                                       if(isset($_SESSION['u_id'])) {
                                          checkFavorite($product['product_id'], $_SESSION['u_id']);
                                       }
                                    ?>
                                 "><span class="icon_heart_alt"></span></button>
                              </td>
                           </tr>
                     <?php
                        }
                     }
                     ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Shoping Cart Section End -->