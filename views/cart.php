<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="../assets/img/breadcrumb.jpg">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 text-center">
            <div class="breadcrumb__text">
               <h2>Shopping Cart</h2>
               <div class="breadcrumb__option">
                  <a href="?act=home">Home</a>
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
               <table>
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
                     <?php
                     $tong = 0;
                     if (isset($_SESSION["cart"])) {
                        foreach ($_SESSION["cart"] as $key => $value) {
                           $product = getProd($key);
                           extract($product);
                           $thanhtien = ($product["price"] * $value["sl"]);
                           $tong += $thanhtien;
                           $giasp = number_format($product["price"]);
                     ?>
                           <tr>
                              <td class="shoping__cart__item">
                                 <img src="<?= $image; ?>" alt="" style="height: 7vw;">
                                 <h5><?= $product["product_name"] ?></h5>
                              </td>
                              <td class="shoping__cart__price">
                                 <?= $giasp; ?>
                              </td>
                              <td class="shoping__cart__quantity">
                                 <div class="quantity">
                                    <div class="pro-qty">
                                       <input type="text" value="<?= $value["sl"]; ?>">
                                    </div>
                                 </div>
                              </td>
                              <td class="shoping__cart__total">
                                 <?= number_format($thanhtien); ?>
                              </td>
                              <td class="shoping__cart__item__close">
                                 <a href="?act=cart&iddel=<?= $product_id; ?>"><span class="icon_close"></span></a>
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
               <a href="../shop" class="primary-btn cart-btn">Tiếp tục mua sắm</a>
               <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                  Upadate Cart</a>
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
                  <li>Tổng tiền hàng <span><?= number_format($tong) ?></span></li>
                  <li>Thành tiền <span><?= number_format($tong) ?></span></li>
               </ul>
               <a href="#" class="primary-btn">Thanh toán</a>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Shoping Cart Section End -->