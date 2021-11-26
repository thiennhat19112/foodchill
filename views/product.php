   <!-- Hero Section Begin -->
      <section class="hero hero-normal">
         <div class="container">
            <div class="row">
               <div class="col-lg-3">
                  <div class="hero__categories">
                     <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                     </div>
                     <ul>
                        <li><a href="#">Fresh Meat</a></li>
                        <li><a href="#">Vegetables</a></li>
                        <li><a href="#">Fruit & Nut Gifts</a></li>
                        <li><a href="#">Fresh Berries</a></li>
                        <li><a href="#">Ocean Foods</a></li>
                        <li><a href="#">Butter & Eggs</a></li>
                        <li><a href="#">Fastfood</a></li>
                        <li><a href="#">Fresh Onion</a></li>
                        <li><a href="#">Papayaya & Crisps</a></li>
                        <li><a href="#">Oatmeal</a></li>
                        <li><a href="#">Fresh Bananas</a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-9">
                  <div class="hero__search">
                     <div class="hero__search__form">
                        <form action="#">
                           <div class="hero__search__categories">
                              All Categories
                              <span class="arrow_carrot-down"></span>
                           </div>
                           <input type="text" placeholder="What do yo u need?">
                           <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                     </div>
                     <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                           <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                           <h5>+65 11.188.888</h5>
                           <span>support 24/7 time</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   <!-- Hero Section End -->

   <!-- Product Details Section Begin -->
   <section class="product-details spad">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-md-6">
               <div class="product__details__pic">
                  <div class="product__details__pic__item">
                     <img class="product__details__pic__item--large" src="<?= $prod['image'] ?>" alt="">
                  </div>
                  <div class="product__details__pic__slider owl-carousel">
                     <img data-imgbigurl="./assets/img/product/details/product-details-2.jpg" src="./assets/img/product/details/thumb-1.jpg" alt="">
                     <img data-imgbigurl="./assets/img/product/details/product-details-3.jpg" src="./assets/img/product/details/thumb-2.jpg" alt="">
                     <img data-imgbigurl="./assets/img/product/details/product-details-5.jpg" src="./assets/img/product/details/thumb-3.jpg" alt="">
                     <img data-imgbigurl="./assets/img/product/details/product-details-4.jpg" src="./assets/img/product/details/thumb-4.jpg" alt="">
                  </div>
               </div>
            </div>
            <div class="col-lg-6 col-md-6">
               <div class="product__details__text">
                  <h3><?= $prod['product_name'] ?></h3>
                  <div class="product__details__rating">
                     <i class="fa fa-star"></i>
                     <i class="fa fa-star"></i>
                     <i class="fa fa-star"></i>
                     <i class="fa fa-star"></i>
                     <i class="fa fa-star-half-o"></i>
                     <span>(18 reviews)</span>
                  </div>
                  <div class="product__details__price">
                     <?= number_format($prod['price'] * ((100 - $prod['discount']) / 100), 0, ',', '.') ?> VND
                  </div>
                  <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam
                     vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet
                     quam vehicula elementum sed sit amet dui. Proin eget tortor risus.</p>
                  <div class="product__details__quantity">
                     <div class="quantity">
                        <div class="pro-qty">
                           <input type="text" value="1">
                        </div>
                     </div>
                  </div>
                  <a href="#" class="primary-btn">Thêm vào giỏ hàng</a>
                  <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                  <ul>
                     <li><b>Đã bán</b> <span><samp><?= $prod['saled'] ?></samp> Sản phẩm</span></li>
                     <li><b>Còn lại</b> <span><samp><?= $prod['quantity'] ?></samp> Sản phẩm</span></li>
                     <li><b>Cân nặng</b> <span><?= $prod['weight'] ?> kg</span></li>
                     <li><b>Giao hàng</b> <span>01 day shipping. <samp>No Free Shipping</samp></span></li>
                     <li><b>Chia sẻ</b>
                        <div class="share">
                           <a href="#"><i class="fa fa-facebook"></i></a>
                           <a href="#"><i class="fa fa-twitter"></i></a>
                           <a href="#"><i class="fa fa-instagram"></i></a>
                           <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="col-lg-12">
               <div class="product__details__tab">
                  <ul class="nav nav-tabs" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#product-description" role="tab" aria-selected="true">Mô tả</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#product-infomation" role="tab" aria-selected="false">Thông tin</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#product-reviews" role="tab" aria-selected="false">Đánh giá <span>(1)</span></a>
                     </li>
                  </ul>
                  <div class="tab-content">
                     <div class="tab-pane active" id="product-description" role="tabpanel">
                        <div class="product__details__tab__desc">
                           <?=$prod['description']?>
                        </div>
                     </div>
                     <div class="tab-pane" id="product-infomation" role="tabpanel">
                        <div class="product__details__tab__desc">
                           <?=$prod['infomation']?>
                        </div>
                     </div>
                     <div class="tab-pane" id="product-reviews" role="tabpanel">
                        <div class="product__details__tab__desc">
                           <p>Hiển thị đánh giá</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Product Details Section End -->

   <!-- Related Product Section Begin -->
   <section class="related-product">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="section-title related__product__title">
                  <h2>Sản phẩm liên quan</h2>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
               <div class="product__item">
                  <div class="product__item__pic set-bg" data-setbg="./assets/img/product/product-1.jpg">
                     <ul class="product__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                     </ul>
                  </div>
                  <div class="product__item__text">
                     <h6><a href="#">Crab Pool Security</a></h6>
                     <h5>$30.00</h5>
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
               <div class="product__item">
                  <div class="product__item__pic set-bg" data-setbg="./assets/img/product/product-2.jpg">
                     <ul class="product__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                     </ul>
                  </div>
                  <div class="product__item__text">
                     <h6><a href="#">Crab Pool Security</a></h6>
                     <h5>$30.00</h5>
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
               <div class="product__item">
                  <div class="product__item__pic set-bg" data-setbg="./assets/img/product/product-3.jpg">
                     <ul class="product__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                     </ul>
                  </div>
                  <div class="product__item__text">
                     <h6><a href="#">Crab Pool Security</a></h6>
                     <h5>$30.00</h5>
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
               <div class="product__item">
                  <div class="product__item__pic set-bg" data-setbg="./assets/img/product/product-7.jpg">
                     <ul class="product__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                     </ul>
                  </div>
                  <div class="product__item__text">
                     <h6><a href="#">Crab Pool Security</a></h6>
                     <h5>$30.00</h5>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Related Product Section End -->