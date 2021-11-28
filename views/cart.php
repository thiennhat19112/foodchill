<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="./assets/img/breadcrumb.jpg">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 text-center">
            <div class="breadcrumb__text">
               <h2>Shopping Cart</h2>
               <div class="breadcrumb__option">
                  <a href="home/">Home</a>
                  <span>Shopping Cart</span>
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
                  <thead>
                     <tr>
                        <th class="shoping__product">Sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?PHP
                     //Cart database
                        $tong = 0;
                        if (isset($_SESSION["u_id"])) {
                           $user_id = $_SESSION["u_id"];
                           $productCart = showProductCart($user_id);
                           foreach ($productCart as $key => $value) {
                              $prod_id = $value["product_id"];
                              $prod_qty = $value["quantity"];
                              $product = getProd($prod_id);
                              $prod_price = $product["price"] * ((100 - $product['discount']) / 100);
                              $thanhtien = $prod_price * $prod_qty;
                              $tong += $thanhtien;
                     ?>
                           <tr>
                              <td class="shoping__cart__item">
                                 <img src="<?= $product["image"] ?>" alt="" style="height: 7vw;">
                                 <h5 class="text-truncate"><a href="shop/product/<?= stringProcessor($product['product_name']) ?>-<?= $product['product_id'] ?>"><?= $product['product_name'] ?></a></h5>
                              </td>
                              <td class="shoping__cart__price">
                                 <?= number_format($prod_price, 0, ',', '.') ?>
                              </td>
                              <td class="shoping__cart__quantity">
                                 <div class="quantity">
                                    <div class="pro-qty cart-pro-qty">
                                       <input type="number" id="<?=$user_id?>_<?=$prod_id?>" class="input-prod-qty cart-inp-prod-qty" value="<?= $prod_qty; ?>" min="1" max="<?=$product['quantity']?>">
                                    </div>
                                 </div>
                              </td>
                              <td class="shoping__cart__total" id="itemPrice_<?=$user_id?>_<?=$prod_id?>">
                                 <?= number_format($thanhtien, 0, ',', '.'); ?>
                              </td>
                              <td class="shoping__cart__item__close">
                                 <button class="delete_item_cart" value="<?= $prod_id; ?>" style="outline: none; background:none; border:none;"><span class="icon_close"></span></button>
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
      <div class="row">
         <div class="col-lg-12">
            <div class="shoping__cart__btns">
               <a href="./shop" class="primary-btn cart-btn">Tiếp tục mua sắm</a>
               <a href="./cart" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                  Cập nhật giỏ hàng</a>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="shoping__continue">
               <div class="shoping__discount">
                  <h5>Mã giảm giá</h5>
                  <form action="#">
                     <input type="text" placeholder="Nhập mã giảm giá của bạn">
                     <button type="submit" class="site-btn">Áp dụng</button>
                  </form>
               </div>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="shoping__checkout">
               <h5>Thanh toán</h5>
               <ul>
                  <input type="hidden" id="hidden-tongtienhang" value="<?=$tong?>">
                  <input type="hidden" id="hidden-thanhtien" value="<?=$tong?>">
                  <li>Tổng tiền hàng <span id="cart-tongtienhang"><?= number_format($tong, 0, ',', '.') ?></span></li>
                  <li>Thành tiền <span id="cart-thanhtien"><?= number_format($tong, 0, ',', '.') ?></span></li>
               </ul>
               <a href="#" class="primary-btn">Thanh toán</a>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Shoping Cart Section End -->