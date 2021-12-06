<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
   <div class="humberger__menu__logo">
      <a href="#"><img src="./assets/images/logo.png" alt=""></a>
   </div>
   <div class="humberger__menu__widget">
      <?php
      if (!isset($_SESSION["username"])) {
      ?>
         <div class="header__top__right__auth" style="margin-right: 20px;">
            <!-- <a href="login/"><i class="fa fa-user"></i> Đăng nhập</a> -->
            <a href="login/"><i></i> Đăng nhập</a>
         </div>
         <div class="header__top__right__auth">
            <!-- <a href="signup/"><i class="fa fa-user"></i> Đăng ký</a> -->
            <a href="signup/"><i></i> Đăng ký</a>
         </div>
      <?php
      } else {
         $usernameDisplay = $_SESSION["username"];
      ?>
         <div class="header__top__right__language">
            <div><?= $usernameDisplay ?></div>
            <span class="arrow_carrot-down"></span>
            <ul style="width:120px;">
               <?php if ($_SESSION["phanquyen"] == 1) {
                  echo '<li><a href="admin/">Admin</a></li>';
               } ?>
               <li><a href="#">Tài khoản</a></li>
               <li><a href="#">Đổi mật khẩu</a></li>
               <li><a href="#">Đơn hàng</a></li>
               <li><a href="?act=logout">Đăng xuất</a></li>
               <?php if ($_SESSION["phanquyen"] == 2) {
                  echo '<li><a href="ship/">Giao hàng</a></li>';
               } ?>
            </ul>
         </div>
      <?php
      }
      ?>
   </div>
   <nav class="humberger__menu__nav mobile-menu">
      <ul>
         <li class="active"><a href="home/">Trang chủ/a></li>
         <li><a href="shop/">Sản phẩm</a></li>
         <li><a href="blog/">Bài viết</a></li>
         <li><a href="contact/">Liên hệ</a></li>
      </ul>
   </nav>
   <div id="mobile-menu-wrap"></div>
   <div class="header__top__right__social">
      <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
      <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
      <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
      <a href="#" target="_blank"><i class="fa fa-pinterest-p"></i></a>
   </div>
   <div class="humberger__menu__contact">
      <ul>
         <li><i class="fa fa-envelope"></i> contact@foodchill.tk</li>
         <li>Miễn phí vận chuyển cho tất cả đơn hàng</li>
      </ul>
   </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
   <div class="header__top">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-md-6">
               <div class="header__top__left">
                  <ul>
                     <li><i class="fa fa-envelope"></i> contact@foodchill.tk</li>
                     <li>Miễn phí vận chuyển cho tất cả đơn hàng</li>
                  </ul>
               </div>
            </div>
            <div class="col-lg-6 col-md-6">
               <div class="header__top__right">
                  <div class="header__top__right__social">
                     <a href="https://github.com/thiennhat19112/foodchill" target="_blank"><i class="fab fa-github"></i></a>
                     <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                     <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                     <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                  </div>
                  <?php
                  if (!isset($_SESSION["username"])) {
                  ?>
                     <div class="header__top__right__auth" style="margin-right: 20px;">
                        <!-- <a href="login/"><i class="fa fa-user"></i> Đăng nhập</a> -->
                        <a href="login/"><i></i> Đăng nhập</a>
                     </div>
                     <div class="header__top__right__auth">
                        <!-- <a href="signup/"><i class="fa fa-user"></i> Đăng ký</a> -->
                        <a href="signup/"><i></i> Đăng ký</a>
                     </div>
                  <?php
                  } else {
                     $usernameDisplay = $_SESSION["username"];
                  ?>
                     <div class="header__top__right__language">
                        <div><?= $usernameDisplay ?></div>
                        <span class="arrow_carrot-down"></span>
                        <ul style="width:120px;">
                           <?php if ($_SESSION["phanquyen"] == 1) {
                              echo '<li><a href="admin/">Admin</a></li>';
                           } ?>
                           <li><a href="?act=info">Thông tin</a></li>
                           <li><a href="#" onclick="return false" id="load-order">Đơn hàng</a></li>
                           <li><a href="?act=logout">Đăng xuất</a></li>
                           <?php if ($_SESSION["phanquyen"] == 2) {
                              echo '<li><a href="ship/">Giao hàng</a></li>';
                           } ?>
                        </ul>
                     </div>
                  <?php
                  }
                  ?>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="row">
         <div class="col-lg-3">
            <div class="header__logo">
               <a href="home/"><img src="./assets/images/logo.png" alt=""></a>
            </div>
         </div>
         <div class="col-lg-6">
            <nav class="header__menu">
               <ul>
                  <!-- <li class="active"><a href="home/">Home</a></li> -->
                  <li class="<?php echo $act == "home" ? 'active' : '' ?>"><a href="home/">Trang chủ</a></li>
                  <li class="<?php echo $act == "shop" || $act == "prod_detail" ? 'active' : '' ?>"><a href="shop/">Sản phẩm</a></li>
                  <!-- <li><a href="#">Pages</a>
                        <ul class="header__menu__dropdown">
                           <li><a href="./shop-details.html">Shop Details</a></li>
                           <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                           <li><a href="./checkout.html">Check Out</a></li>
                           <li><a href="./blog-details.html">Blog Details</a></li>
                        </ul>
                     </li> -->
                  <li class="<?php echo $act == "blog" || $act == "blog_detail" ? 'active' : '' ?>"><a href="blog/">Tin tức</a></li>
                  <li class="<?php echo $act == "contact" ? 'active' : '' ?>"><a href="contact/">Liên hệ</a></li>
               </ul>
            </nav>
         </div>
         <div class="col-lg-3">
            <div class="header__cart">
               <ul>
                  <li>
                     <a href="favorite/">
                        <i class="fa fa-heart"></i>
                        <?php
                        if (isset($_SESSION['u_id'])) {
                           echo '
                                 <span id="showUserLike">' . countFavorite($_SESSION['u_id']) . '</span>
                              ';
                        }
                        ?>
                     </a>
                  </li>
                  <li>
                     <a href="cart/">
                        <i class="fa fa-shopping-bag"></i>
                        <?php
                        if (isset($_SESSION['u_id'])) {
                           echo '
                                 <span class="cart-item" id="showUserCart">' . countCart($_SESSION['u_id']) . '</span>
                              ';
                        }
                        ?>
                     </a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <div class="humberger__open">
         <i class="fa fa-bars"></i>
      </div>
   </div>
</header>
<!-- Header Section End -->

<!-- Page Preloder Begin -->
<div id="preloader">
   <div class="loader"></div>
</div>
<!-- Page Preloder End -->