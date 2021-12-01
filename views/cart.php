<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="./assets/images/breadcrumb.jpg">
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
                        $user = getUserById($user_id);
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
                                    <div class="pro-qty">
                                       <input type="number" id="<?= $user_id ?>_<?= $prod_id ?>" class="input-prod-qty" value="<?= $prod_qty; ?>" min="1" max="<?= $product['quantity'] ?>">
                                    </div>
                                 </div>
                              </td>
                              <td class="shoping__cart__total" id="itemPrice_<?= $user_id ?>_<?= $prod_id ?>">
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
                  <input type="hidden" id="hidden-tongtienhang" value="<?= $tong ?>">
                  <input type="hidden" id="hidden-thanhtien" value="<?= $tong ?>">
                  <li>Tổng tiền hàng <span id="cart-tongtienhang"><?= number_format($tong, 0, ',', '.') ?></span></li>
                  <li>Thành tiền <span id="cart-thanhtien"><?= number_format($tong, 0, ',', '.') ?></span></li>
               </ul>
               <a class="primary-btn btn-payment">Thanh toán</a>
            </div>
         </div>
      </div>
   </div>
</section>
<section>
   <div class="modal">
      <form id="form-wrapper" onsubmit="return false">
         <div id="form-left-wrapper">
            <span class="close close-modal">&times;</span>
            <div id="form-tab-menu">
               <div class="tab-menu-item current shipping-tab">Xác nhận đơn hàng</div>
            </div>
            <!-- Body of the Form -->
            <div id="form-body">
               <div id="shipping-body">
                  <div id="contact-details">
                     <div class='form-input input-equal'>
                        <label>Tên người nhận</label><br />
                        <input type='text' name='receiver-name' placeholder='Tên người nhận...' id='name-input' class='name-input' value="<?= $usernameDisplay ?>" />
                     </div>
                     <div class='form-input input-equal'>
                        <label>Số điện thoại</label><br />
                        <input type='text' name='phone' placeholder='Số điện thoại...' id='phone-input' class='phone-input' />
                     </div>
                  </div>
                  <div class='hr'></div>
                  <div id="Address-details">
                     <div class='form-input input-larg' style="margin-bottom: 20px;">
                        <label>Số nhà, tên đường</label><br />
                        <input type='text' name='address' placeholder='Số nhà, tên đường...' id='address-input' class='address-input' />
                     </div>
                     <!-- Line Break -->
                     <div class='form-input input-small'>
                        <label>Tỉnh (thành phố)</label><br />
                        <select name="province" id="province-select">
                           <option selected value="0" hidden disabled>Chọn tỉnh, thành phố...</option>
                        </select>
                     </div>
                     <div class='form-input input-small'>
                        <label>Quận (huyện)</label><br />
                        <select name="destrict" id="destrict-select" disabled>
                           <option selected value="0" hidden disabled>Chọn quận, huyện...</option>
                        </select>
                     </div>
                     <div class='form-input input-small'>
                        <label>Phường (xã)</label><br />
                        <select name="ward" id="ward-select" disabled>
                           <option selected value="0" hidden disabled>Chọn phường, xã...</option>
                        </select>
                     </div>
                     <div class='hr'></div>
                     <div class='form-input input-larg'>
                        <label>Ghi chú đơn hàng</label><br />
                        <input type='text' name='note-user' placeholder='Để lại lời nhắn của bạn...' id='note-user' class='note-input' />
                     </div>
                  </div>
                  <div id="form-submit">
                     <input type='hidden' value="<?= $user_id ?>" name="user_id" id="user_id" />
                     <input type='submit' value="Xác nhận" />
                  </div>
               </div>
            </div>
         </div>
         <!-- Shopping Cart Menu -->
         <div id="form-cart-menu">

            <div class="shopping-cart-head">
               <h6>Giỏ hàng của bạn</h6>
            </div>
            <table id="shopping-cart-menu">
               <?php
               $tong = 0;
               foreach ($productCart as $key => $value) {
                  $prod_id = $value["product_id"];
                  $prod_qty = $value["quantity"];
                  $product = getProd($prod_id);
                  $prod_price = $product["price"] * ((100 - $product['discount']) / 100);
                  $thanhtien = $prod_price * $prod_qty;
                  $tong += $thanhtien;
               ?>
                  <tr class='shopping-cart-item'>
                     <td class='cart-title'><?= $product['product_name'] . ' (SL: ' . $prod_qty . ')' ?></td>
                     <td class='cart-price'><?= number_format($prod_price * $prod_qty) ?></td>
                  </tr>
               <?php
               }
               ?>
               <tr class='shopping-cart-total'>
                  <td class='cart-total'>Tổng cộng</td>
                  <td class='cart-price-total'><?= number_format($tong) ?></td>
                  <input type="hidden" name="total-amount" id="total-amount" value="<?= $tong ?>">
               </tr>
            </table>
         </div>
      </form>
   </div>
   <script>
      $(document).ready(function() {
         let body = document.querySelector("body");
         let modal = $('.modal');
         let btn_payment = $('.btn-payment');
         let btn_close = $('.close-modal');

         btn_payment.click(function() {
            modal.fadeIn("slow").show();
            body.style.overflow = "hidden";
            $.ajax({
               type: "GET",
               dataType: "json",
               url: "https://provinces.open-api.vn/api/p/",
               success: function(data) {
                  $.each(data, function(key, value) {
                     $('#province-select').append(`<option value="${value.code}">${value.name}</option>`);
                  });
               }
            });
         });

         $("#province-select").change(function() {
            $("#destrict-select").empty();
            $("#ward-select").empty();
            id_province = $("#province-select").val();
            $.ajax({
               type: "GET",
               dataType: "json",
               url: "https://provinces.open-api.vn/api/d/",
               success: function(data) {
                  $.each(data, function(key, value) {
                     if (value.province_code == id_province) {
                        $('#destrict-select').append(`<option value="${value.code}">${value.name}</option>`);
                     }
                  });
                  $("#destrict-select").prop('disabled', false);
               }
            });
         });

         $("#destrict-select").change(function() {
            $("#ward-select").empty();
            id_destrict = $("#destrict-select").val();
            $.ajax({
               type: "GET",
               dataType: "json",
               url: "https://provinces.open-api.vn/api/w/",
               success: function(data) {
                  $.each(data, function(key, value) {
                     if (value.district_code == id_destrict) {
                        $('#ward-select').append(`<option value="${value.code}">${value.name}</option>`);
                     }
                  });
                  $("#ward-select").prop('disabled', false);
               }
            });
         });

         btn_close.click(function() {
            modal.fadeOut("slow").hide();
            body.style.overflow = "auto";
         });

         $(window).on('click', function(e) {
            if ($(e.target).is('.modal')) {
               modal.fadeOut("slow").hide();
               body.style.overflow = "auto";
            }
         });

         $("#form-wrapper").submit(function(e) {
            let user_id = $("#user_id").val();
            let receiver = $("#name-input").val();
            let phone = $("#phone-input").val();
            let address = $("#address-input").val() + ', ' + $("#ward-select option:selected").text() + ', ' + $("#destrict-select option:selected").text() + ', ' + $("#province-select option:selected").text();
            let total_amount = $("#total-amount").val();
            let receiver_note = $("#note-user").val();
            $.ajax({
               url: "./models/ajax.php",
               type: "POST",
               dataType: "json",
               data: {
                  "user_id": user_id,
                  "receiver": receiver,
                  "phone": phone,
                  "address": address,
                  "receiver_note": receiver_note,
                  "total_amount": total_amount,
               },
            }).done(function(data) {
               // console.log(data);
               location.reload();
            })
            e.preventDefault();
         });
      });
   </script>
</section>
<!-- Shoping Cart Section End -->