   <input type="hidden" name="" id="thisIsShop" value="1">
   <!-- Hero Section Begin -->
      <section class="hero hero-normal">
         <div class="container">
            <div class="row">
               <div class="col-lg-3">
                  
               </div>
               <div class="col-lg-9">
                  <div class="hero__search">
                     <div class="hero__search__form">
                        <form action="#">
                           <input id="searchInput" type="text" placeholder="Bạn cần gì?">
                           <button id="searchBtn" type="button" class="site-btn" disabled>Tìm kiếm</button>
                        </form>
                     </div>
                  </div>
                  <div id="searchOut"></div>
               </div>
            </div>
         </div>
      </section>
   <!-- Hero Section End -->

   <!-- Breadcrumb Section Begin -->
      <!-- <section class="breadcrumb-section set-bg" data-setbg="./assets/images/breadcrumb.jpg">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 text-center">
                  <div class="breadcrumb__text">
                     <h2>FoodChill Shop</h2>
                     <div class="breadcrumb__option">
                        <a href="home/">Home </a>
                        <span>Shop</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section> -->
   <!-- Breadcrumb Section End -->

   <!-- Product Section Begin -->
      <div class="container">
   <hr></div>
      <section class="product spad" id="aaaa">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-4">
                  <div class="sidebar">
                     <div class="sidebar__item">
                        <h4>Danh mục</h4>
                        <ul>
                           <?PHP
                           foreach ($cates as $key => $v) {
                           ?>
                              <div class="form-check">
                                 <label><input class="form-check-input common_selector category" type="checkbox" value="<?= $v['category_id'] ?>">
                                    <?= $v['category_name'] ?>
                                 </label>
                              </div>
                           <?PHP
                           }
                           ?>
                        </ul>
                     </div>

                     <div class="sidebar__item">
                        <?PHP
                        $maxPrice = round(pdo_query_one("SELECT MAX(price) AS maxP FROM products")['maxP'], -4);
                        ?>
                        <h4>Giá</h4>
                        <input type="hidden" name="" id="hidden_minimum_price" value="1000">
                        <input type="hidden" name="" id="hidden_maximum_price" value="<?= $maxPrice ?>">
                        <div class="price-range-wrap">
                           <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="1000" data-max="<?= $maxPrice ?>">
                              <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                              <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                              <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                           </div>
                           <div class="range-slider">
                              <span id="minimum_price">1000</span>₫ - <span id="maximum_price"><?= $maxPrice ?></span>₫
                           </div>
                        </div>
                     </div>

                     <!-- <div class="sidebar__item sidebar__item__color--option">
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
                        </div> -->
                  </div>
               </div>
               <div class="col-lg-9 col-md-8">
                  <div class="filter__item">
                     <div class="row">
                        <div class="col-lg-4 col-md-5">
                           <div class="filter__sort">
                              <span>Sắp xếp theo</span>
                              <select id="sort_option">
                                 <option class="common_selector sort" value="create_date DESC" selected>Mới nhất</option>
                                 <option class="common_selector sort" value="saled DESC">Bán chạy</option>
                                 <option class="common_selector sort" value="price">Giá thấp</option>
                                 <option class="common_selector sort" value="price DESC">Giá cao</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                           <div class="filter__found">
                              <h6>Tìm thấy <span id="foundedProd">?</span>sản phẩm</h6>
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
                  <?PHP
                  if (isset($_SESSION['u_id'])) {
                     echo '<input type="hidden" id="user_id" value="' . $_SESSION["u_id"] . '">';
                  } else {
                     echo '<input type="hidden" id="user_id" value="0">';
                  }
                  ?> <!-- Lấy user_id cho ajax -->

                  <input type="hidden" id="add_qty" value="1"> <!-- Số lượng mặc định khi thêm vào giỏ hàng -->
                  
                  <div class="row sort--prod">
                     <!-- Show các sản phẩm -->
                  </div>
                  <input type="hidden" id="page_number" value="1">
                  <input type="hidden" id="page_number_active" value="1">
                  <div class="product__pagination " id="sort--page">
                     <!-- Show Số trang -->
                  </div>
               </div>
            </div>
         </div>
      </section>
   <!-- Product Section End -->