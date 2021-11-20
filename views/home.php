   <!-- Hero Section Begin -->
      <section class="hero">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  
                  <div class="hero__item set-bg" data-setbg="./assets/images/hero/banner.jpg">
                     <div class="hero__text">
                        <span>FRUIT FRESH</span>
                        <h2>Vegetable <br />100% Organic</h2>
                        <p>Free Pickup and Delivery Available</p>
                        <a href="?act=shop" class="primary-btn">SHOP NOW</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   <!-- Hero Section End -->
    
   <!-- Categories Section Begin -->
      <section class="categories">
         <div class="container">
            <div class="row">
               <div class="categories__slider owl-carousel">
                  <?PHP 
                     foreach($cates as $key => $value){
                  ?>
                  <div class="col-lg-3">
                     <div class="categories__item set-bg" data-setbg="./assets/img/categories/cat-1.jpg">
                        <h5><a href="#"><?=$value['category_name']?></a></h5>
                     </div>
                  </div>
                  <?PHP 
                     } 
                  ?>
               </div>
            </div>
         </div>
      </section>
   <!-- Categories Section End -->

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
                        <li data-filter=".oranges">Oranges</li>
                        <li data-filter=".fresh-meat">Fresh Meat</li>
                        <li data-filter=".vegetables">Vegetables</li>
                        <li data-filter=".fastfood">Fastfood</li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="row featured__filter">
               <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                  <div class="featured__item">
                     <div class="featured__item__pic set-bg" data-setbg="./assets/img/featured/feature-1.jpg">
                        <ul class="featured__item__pic__hover">
                           <li><a href="#"><i class="fa fa-heart"></i></a></li>
                           <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                           <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                     </div>
                     <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fastfood">
                  <div class="featured__item">
                     <div class="featured__item__pic set-bg" data-setbg="./assets/img/featured/feature-2.jpg">
                        <ul class="featured__item__pic__hover">
                           <li><a href="#"><i class="fa fa-heart"></i></a></li>
                           <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                           <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                     </div>
                     <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fresh-meat">
                  <div class="featured__item">
                     <div class="featured__item__pic set-bg" data-setbg="./assets/img/featured/feature-3.jpg">
                        <ul class="featured__item__pic__hover">
                           <li><a href="#"><i class="fa fa-heart"></i></a></li>
                           <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                           <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                     </div>
                     <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood oranges">
                  <div class="featured__item">
                     <div class="featured__item__pic set-bg" data-setbg="./assets/img/featured/feature-4.jpg">
                        <ul class="featured__item__pic__hover">
                           <li><a href="#"><i class="fa fa-heart"></i></a></li>
                           <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                           <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>    
                     </div>
                     <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                  <div class="featured__item">
                     <div class="featured__item__pic set-bg" data-setbg="./assets/img/featured/feature-5.jpg">
                        <ul class="featured__item__pic__hover">
                           <li><a href="#"><i class="fa fa-heart"></i></a></li>
                           <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                           <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                     </div>
                     <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fastfood">
                  <div class="featured__item">
                     <div class="featured__item__pic set-bg" data-setbg="./assets/img/featured/feature-6.jpg">
                        <ul class="featured__item__pic__hover">
                           <li><a href="#"><i class="fa fa-heart"></i></a></li>
                           <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                           <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                     </div>
                     <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                  <div class="featured__item">
                     <div class="featured__item__pic set-bg" data-setbg="./assets/img/featured/feature-7.jpg">
                        <ul class="featured__item__pic__hover">
                           <li><a href="#"><i class="fa fa-heart"></i></a></li>
                           <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                           <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                     </div>
                     <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood vegetables">
                  <div class="featured__item">
                     <div class="featured__item__pic set-bg" data-setbg="./assets/img/featured/feature-8.jpg">
                        <ul class="featured__item__pic__hover">
                           <li><a href="#"><i class="fa fa-heart"></i></a></li>
                           <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                           <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                     </div>
                     <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                     </div>
                  </div>
               </div>
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
                     <img src="./assets/img/banner/banner-1.jpg" alt="">
                  </div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="banner__pic">
                     <img src="./assets/img/banner/banner-2.jpg" alt="">
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
               <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="blog__item">
                     <div class="blog__item__pic">
                           <img src="./assets/img/blog/blog-1.jpg" alt="">
                     </div>
                     <div class="blog__item__text">
                        <ul>
                           <li><i class="fa fa-calendar-o"></i> May 4, 2019</li>
                           <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">Cooking tips make cooking simple</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="blog__item">
                     <div class="blog__item__pic">
                        <img src="./assets/img/blog/blog-2.jpg" alt="">
                     </div>
                     <div class="blog__item__text">
                        <ul>
                           <li><i class="fa fa-calendar-o"></i> May 4, 2019</li>
                           <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="blog__item">
                     <div class="blog__item__pic">
                        <img src="./assets/img/blog/blog-3.jpg" alt="">
                     </div>
                     <div class="blog__item__text">
                        <ul>
                           <li><i class="fa fa-calendar-o"></i> May 4, 2019</li>
                           <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">Visit the clean farm in the US</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   <!-- Blog Section End -->