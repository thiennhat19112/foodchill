   <!-- Hero Section Begin -->
   <section class="hero hero-normal">
         <div class="container">
            <div class="row">
               <div class="col-lg-3">
                  <div class="hero__categories">
                     <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Danh mục</span>
                     </div>
                     <ul>
                     <?PHP 
                        foreach($cates as $key => $value){
                     ?>
                        <li><a href="#"><?= $value['category_name']?></a></li>
                     <?PHP
                        }
                     ?>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-9">
                  <div class="hero__search">
                     <div class="hero__search__form">
                        <form action="#">
                           <div class="hero__search__categories">
                              Tất cả danh mục
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

   <!-- Breadcrumb Section Begin -->
      <section class="breadcrumb-section set-bg" data-setbg="../assets/img/breadcrumb.jpg">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 text-center">
                  <div class="breadcrumb__text">
                     <h2>FoodChill Shop</h2>
                     <div class="breadcrumb__option">
                        <a href="../home">Home</a>
                        <span>Shop</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   <!-- Breadcrumb Section End -->

   <!-- Product Section Begin -->
      <section class="product spad">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-5">
                  <div class="sidebar">
                     <div class="sidebar__item">
                        <h4>Danh mục</h4>
                        <ul>
                        <?PHP 
                           foreach($cates as $key => $value){
                        ?>
                           <li><a href="#"><?= $value['category_name']?></a></li>
                        <?PHP
                           }
                        ?>
                        </ul>
                     </div>
                     
                     <div class="sidebar__item">
                        <h4>Giá</h4>
                        <div class="price-range-wrap">
                           <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                              data-min="10" data-max="540">
                              <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                              <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                              <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                           </div>
                           <div class="range-slider">
                              <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="sidebar__item sidebar__item__color--option">
                        <h4>Màu sắc</h4>
                        <div class="sidebar__item__color sidebar__item__color--white">
                           <label for="white">
                              White
                              <input type="radio" id="white">
                           </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--gray">
                           <label for="gray">
                              Gray
                              <input type="radio" id="gray">
                           </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--red">
                           <label for="red">
                              Red
                              <input type="radio" id="red">
                           </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--black">
                           <label for="black">
                              Black
                              <input type="radio" id="black">
                           </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--blue">
                           <label for="blue">
                              Blue
                              <input type="radio" id="blue">
                           </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--green">
                           <label for="green">
                              Green
                              <input type="radio" id="green">
                           </label>
                        </div>
                     </div>
                     
                     <div class="sidebar__item">
                        <h4>Popular Size</h4>
                        <div class="sidebar__item__size">
                           <label for="large">
                              Large
                              <input type="radio" id="large">
                           </label>
                        </div>
                        <div class="sidebar__item__size">
                           <label for="medium">
                              Medium
                              <input type="radio" id="medium">
                           </label>
                        </div>
                        <div class="sidebar__item__size">
                           <label for="small">
                              Small
                              <input type="radio" id="small">
                           </label>
                        </div>
                        <div class="sidebar__item__size">
                           <label for="tiny">
                              Tiny
                              <input type="radio" id="tiny">
                           </label>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-9 col-md-7">
                  <div class="product__discount">
                     <div class="section-title product__discount__title">
                        <h2>Giảm giá</h2>
                     </div>
                     <div class="row">
                        <div class="product__discount__slider owl-carousel">
                           <?PHP 
                              foreach($discProds as $key => $value){
                           ?>
                           <div class="col-lg-4">
                              <div class="product__discount__item">
                                 <div class="product__discount__item__pic set-bg"
                                    data-setbg="<?= $value['image']?>">
                                    <div class="product__discount__percent">-<?= $value['discount']?>%</div>
                                    <ul class="product__item__pic__hover">
                                       <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                       <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                       <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                 </div>
                                 <div class="product__discount__item__text">
                                    <span>Dried Fruit</span>
                                    <h5><a href="../product/?prod_id=<?=$value['product_id']?>"><?= $value['product_name']?></a></h5>
                                    <div class="product__item__price">
                                       <?= number_format($value['price']-$value['discount']/100*$value['price'], 0, ',', '.')?> VND
                                          <span><?= number_format($value['price'], 0, ',', '.')?> VND</span>
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
                  <div class="filter__item">
                     <div class="row">
                           <div class="col-lg-4 col-md-5">
                              <div class="filter__sort">
                                 <span>Sắp xếp theo</span>
                                 <select>
                                    <option value="0">Mới nhất</option>
                                    <option value="1">Bán chạy</option>
                                    <option value="2">Giá thấp</option>
                                    <option value="3">Giá cao</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-4 col-md-4">
                              <div class="filter__found">
                                 <h6>Tìm thấy <span>16</span>sản phẩm</h6>
                              </div>
                           </div>
                           <div class="col-lg-4 col-md-3">
                              <div class="filter__option">
                                 <span class="icon_grid-2x2"></span>
                                 <span class="icon_ul"></span>
                              </div>
                           </div>
                     </div>
                  </div>
                  <div class="row">
                     <?PHP 
                        foreach($prods as $key => $value){
                     ?>
                     <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                           <div class="product__item__pic set-bg" data-setbg="<?= $value['image']?>">
                              <ul class="product__item__pic__hover">
                                 <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                 <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                 <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                              </ul>
                           </div>
                           <div class="product__item__text">
                              <h6><a href="../product/?prod_id=<?=$value['product_id']?>"><?= $value['product_name']?></a></h6>
                              <h5><?= number_format($value['price']-$value['discount']/100*$value['price'], 0, ',', '.')?> VND</h5>
                           </div>
                        </div>
                     </div>
                     <?PHP 
                        }
                     ?>
                  </div>
                  <div class="product__pagination">
                     <a href="#">1</a>
                     <a href="#">2</a>
                     <a href="#">3</a>
                     <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                  </div>
               </div>
            </div>
         </div>
      </section>
   <!-- Product Section End -->