   <?PHP
      if(isset($_SESSION['u_id'])){
         echo '<input type="hidden" id="user_id" value="'.$_SESSION["u_id"].'">';
      } else {
         echo '<input type="hidden" id="user_id" value="0">';
      }
   ?> 
   <!-- Lấy user_id cho ajax -->

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

   <!-- Product Details Section Begin -->
      <section class="product-details spad">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-6">
                  <div class="product__details__pic">
                     <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="<?= $prod['image'] ?>" alt="">
                     </div>
                     <!-- <div class="product__details__pic__slider owl-carousel">
                        <img data-imgbigurl="./assets/images/product/details/product-details-2.jpg" src="./assets/images/product/details/thumb-1.jpg" alt="">
                        <img data-imgbigurl="./assets/images/product/details/product-details-3.jpg" src="./assets/images/product/details/thumb-2.jpg" alt="">
                        <img data-imgbigurl="./assets/images/product/details/product-details-5.jpg" src="./assets/images/product/details/thumb-3.jpg" alt="">
                        <img data-imgbigurl="./assets/images/product/details/product-details-4.jpg" src="./assets/images/product/details/thumb-4.jpg" alt="">
                     </div> -->
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
                     <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid non, repellendus saepe illo et modi distinctio ducimus nemo aspernatur quo iure dolorum dolor? Repudiandae est magnam illum et numquam. Perferendis!</p>
                     <?PHP 
                        if($prod['quantity']==0){
                           echo '
                              <button class="primary-btn dis" disable>Hết hàng</button>
                           ';
                        } else {
                           echo '
                              <div class="product__details__quantity">
                                 <div class="quantity">
                                    <div class="pro-qty">
                                       <input type="number" id="add_qty" class="input-prod-qty" value="1" min="1" max="'.$prod['quantity'].'">
                                    </div>
                                 </div>
                              </div>
                              <button value="'.$prod['product_id'].'" class="addToCart primary-btn"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
                           ';
                        }
                     ?>
                     <button id="like_<?=$prod['product_id']?>" value="<?= $prod['product_id'] ?>" class="favorite heart-icon 
                        <?PHP 
                           if(isset($_SESSION['u_id'])) {
                              checkFavorite($v['product_id'], $_SESSION['u_id']);
                           }
                        ?>
                     "><span class="icon_heart_alt"></span></button>
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
                           <?PHP 
                              $total_cmts = numCmt($prod['product_id']);
                           ?>
                           <a class="nav-link" data-toggle="tab" href="#product-reviews" role="tab" aria-selected="false">Bình luận (<span id="cmts_<?=$prod['product_id']?>" class="numCmts"><?= $total_cmts;?></span>)</a>
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
                              <div class="cmt cmt-hide" id="cmtOf_<?=$prod['product_id']?>">
                                    <?= cmtProduct($prod['product_id']);?>
                                 <!-- Show New Comment ajax -->
                                    <div id="newCmt_<?=$prod['product_id']?>">

                                    </div>
                                 </div>
                              <?PHP 
                                 if(isset($_SESSION['u_id'])) {
                              ?>
                                 <div class="send-cmt">
                                    <form onSubmit="return false;" name="cmt_<?=$prod['product_id']?>">
                                       <div class="">
                                          <input type="text" minlength="1" maxlength="200"
                                             name="newCmtOfProd_<?=$prod['product_id']?>" id="newCmtOf_<?=$prod['product_id']?>" 
                                             class="inpNewCmt" placeholder="Viết bình luận..." required>
                                          <button class="cmtBtn" type="button" name="" id="cmt_<?=$prod['product_id']?>" disabled>
                                             <i class="fas fa-rocket"></i>
                                          </button>
                                       </div>
                                    </form>
                                 </div>
                                 
                              <?PHP
                                 } else {
                                    echo '<h4 style="text-align: center; font-weight: bold; color: coral">Vui lòng đăng nhập để bình luận!<h4>';
                                 }
                              ?>
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
               <?PHP
                  $sql = "SELECT * FROM `products` WHERE category_id = '$prod[category_id]' AND product_id != '$prod[product_id]' ORDER BY RAND() LIMIT 4";
                  $relatedProds = pdo_query($sql);
                  foreach ($relatedProds as $key => $v) {
               ?>
                  <div class="col-lg-3 col-md-4 col-sm-6">
                     <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="<?=$v['image']?>">
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
                        <div class="product__item__text">
                           <h6 class="text-truncate"><a href="shop/product/<?=stringProcessor($v['product_name']) . '-' . $v['product_id'] ?>"><?=$v['product_name']?></a></h6>
                           <h5><?= number_format($v['price'] * ((100 - $v['discount']) / 100), 0, ',', '.')?> VND</h5>
                        </div>
                     </div>
                  </div>
               <?PHP
                  }
               ?>
            </div>
         </div>
      </section>
   <!-- Related Product Section End -->