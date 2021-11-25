<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="./assets/img/breadcrumb.jpg">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 text-center">
            <div class="breadcrumb__text">
               <h2>Blog</h2>
               <div class="breadcrumb__option">
                  <a href="?act=home">Home</a>
                  <span>Blog</span>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog spad">
   <div class="container">
      <div class="row">
         <?php foreach ($items as $item) {
               extract($item);
         ?>
         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="blog__item">
               <div class="blog__item__pic">
                  <img src="./upload/images/blog/<?=$image?>" alt="<?=$title?>">
               </div>
               <div class="blog__item__text">
                  <ul>
                     <li><i class="fa fa-calendar-o"></i><?=$create_date?></li>
                  </ul>
                  <h5><a href="#"><?=$title?></a></h5>
                  <p><?=$descriptions?> </p>
                  <a href="?act=blog-details&id=<?=$blog_id?>" class="blog__btn">Xem tiếp<span class="arrow_right"></span></a>
               </div>
            </div>
         </div>
         <?PHP } ?>
      </div>
   </div>
   </div>
</section>
<!-- Blog Section End -->