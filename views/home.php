   <?PHP
      if (isset($_SESSION['u_id'])) {
         echo '<input type="hidden" id="user_id" value="' . $_SESSION["u_id"] . '">';
      } else {
         echo '<input type="hidden" id="user_id" value="0">';
      }
   ?>
   <!-- Lấy user_id cho ajax -->

   <!-- Hero Section Begin -->
   <section class="hero">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="hero__item set-bg" data-setbg="./assets/images/hero/banner.jpg">
                  <div class="hero__text">
                     <span>TRÁI CÂY ĐÔNG LẠNH</span>
                     <h2>Trái cây <br />100% tươi ngon</h2>
                     <p>Được đông lạnh ngay lúc hái.</p>
                     <a href="shop/" class="primary-btn">MUA NGAY</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Hero Section End -->

   <input type="hidden" id="add_qty" value="1"> <!-- Số lượng mặc định khi thêm vào giỏ hàng -->

   <!-- Discount Product Section Begin -->
      <section class="categories">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="section-title">
                     <h2>Giảm giá</h2>
                  </div>
                  <div class="categories__slider owl-carousel">
                     <?PHP
                     foreach ($discProds as $key => $v) {
                     ?>
                        <div class="col-lg-3">
                           <div class="product__discount__item">
                              <div class="product__discount__item__pic categories__item set-bg" data-setbg="<?= $v['image'] ?>">
                                 <div class="product__discount__percent">-<?= $v['discount'] ?>%</div>
                                 <ul class="product__item__pic__hover">
                                    <li><button value="<?= $v['product_id'] ?>" class="favorite 
                                       <?PHP 
                                          if(isset($_SESSION['u_id'])) {
                                             checkFavorite($v['product_id'], $_SESSION['u_id']);
                                          }
                                       ?>
                                    "><i class="fa fa-heart"></i></button></li>
                                    <li>
                                       <?PHP 
                                          if($v['quantity'] == 0) {
                                             echo '
                                                <button class="outOfStock"><i class="fa fa-shopping-cart"></i></button>
                                             ';
                                          } else {
                                             echo '
                                                <button value="'.$v['product_id'].'" class="addToCart"><i class="fa fa-shopping-cart"></i></button>
                                             ';
                                          }
                                       ?>
                                    </li>
                                 </ul>
                              </div>
                              <div class="product__discount__item__text">
                                 <span><?= getProdCate($v['category_id']) ?></span>
                                 <h5 class="text-truncate"><a href="shop/product/<?= stringProcessor($v['product_name']) ?>-<?= $v['product_id'] ?>"><?= $v['product_name'] ?></a></h5>
                                 <div class="product__item__price">
                                    <?= number_format($v['price'] * ((100 - $v['discount']) / 100), 0, ',', '.') ?> VND
                                    <span><?= number_format($v['price'], 0, ',', '.') ?> VND</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     <?PHP
                     }
                     ?>
                  </div>
               </div>
            </div>
         </div>
      </section>
   <!-- Discount Product Section End -->

   <!-- Featured Section Begin -->
      <section class="featured spad">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="section-title">
                     <h2>Sản phẩm nổi bật</h2>
                  </div>
                  <div class="featured__controls">
                     <ul>
                        <li class="active" data-filter="*">Tất cả</li>
                        <?PHP
                        foreach ($cates as $key => $v) {
                        ?>
                           <li data-filter=".<?= stringProcessor(getProdCate($v['category_id'])) ?>"><?= $v['category_name'] ?></li>
                        <?PHP
                        }
                        ?>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="row featured__filter">
               <?PHP
               foreach ($featuredProds as $key => $v) {
               ?>
                  <div class="col-lg-3 col-md-4 col-sm-6 mix <?= stringProcessor(getProdCate($v['category_id'])) ?>">
                     <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?= $v['image'] ?>">
                           <ul class="featured__item__pic__hover">
                              <li><button value="<?= $v['product_id'] ?>" class="favorite 
                                 <?PHP 
                                    if(isset($_SESSION['u_id'])) {
                                       echo "haha";
                                       checkFavorite($v['product_id'], $_SESSION['u_id']);
                                    }
                                 ?>
                              "><i class="fa fa-heart"></i></button></li>
                              <li>
                                 <?PHP 
                                    if($v['quantity'] == 0) {
                                       echo '
                                          <button class="outOfStock"><i class="fa fa-shopping-cart"></i></button>
                                       ';
                                    } else {
                                       echo '
                                          <button value="'.$v['product_id'].'" class="addToCart"><i class="fa fa-shopping-cart"></i></button>
                                       ';
                                    }
                                 ?>
                              </li>
                           </ul>
                        </div>
                        <div class="featured__item__text">
                           <h6 class="text-truncate"><a href="shop/product/<?= stringProcessor($v['product_name']) ?>-<?= $v['product_id'] ?>"><?= $v['product_name'] ?></a></h6>
                           <h5><?= number_format($v['price'] * ((100 - $v['discount']) / 100), 0, ',', '.') ?> VND</h5>
                        </div>
                     </div>
                  </div>
               <?PHP
               }
               ?>
            </div>
         </div>
      </section>
   <!-- Featured Section End -->

   <!-- Banner Begin -->
      <div class="banner">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="banner__pic">
                     <img src="./assets/images/banner/banner-1.jpg" alt="">
                  </div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="banner__pic">
                     <img src="./assets/images/banner/banner-2.jpg" alt="">
                  </div>
               </div>
            </div>
         </div>
      </div>
   <!-- Banner End -->

   <!-- Blog Section Begin -->
      <section class="from-blog spad">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="section-title from-blog__title">
                     <h2>Một chút Blog</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <?php foreach ($items_limit as $item) {
                  extract($item);
               ?>
                  <div class="col-lg-3 col-md-4 col-sm-6">
                     <div class="blog__item">
                        <div style="max-height : 150px;min-height: 150px;" class="blog__item__pic position-relative overflow-hidden ">
                           <img class="position-absolute top-0 start-0 w-100 " src="./upload/images/blog/<?= $image ?>" alt="<?= $title ?>">
                        </div>
                        <div class="blog__item__text">
                           <ul>
                              <li><i class="fa fa-calendar-o"></i> <?= shortDate($create_date) ?></li>
                           </ul>
                           <h5><a href="blog/<?= stringProcessor($title); ?>-<?= $blog_id ?>"><?= $title ?></a></h5>
                           <p style="max-height : 100px;" class="overflow-hidden"><?= $descriptions ?> </p>
                           <a href="blog/<?= stringProcessor($title); ?>-<?= $blog_id ?>" class="blog__btn">Xem tiếp<span class="arrow_right"></span></a>
                        </div>
                     </div>
                  </div>
               <?PHP } ?>
            </div>
      </section>
   <!-- Blog Section End -->