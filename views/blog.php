<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="./assets/images/breadcrumb.jpg">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 text-center">
            <div class="breadcrumb__text">
               <h2>Bài viết</h2>
               <div class="breadcrumb__option">
                  <a href="home/">Trang chủ</a>
                  <span>Bài viết</span>
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
                  <div style="max-height : 350px;min-height: 350px;" class="blog__item__pic position-relative overflow-hidden ">
                     <img class="position-absolute top-0 start-0 w-100 " src="./upload/images/blog/<?= $image ?>" alt="<?= $title ?>">
                  </div>
                  <div class="blog__item__text">
                     <ul>
                        <li><i class="fa fa-calendar-o"></i> <?= shortDate($create_date) ?></li>
                     </ul>
                     <h5><a href="blog/<?= stringProcessor($title); ?>-<?= $blog_id ?>"><?= $title ?></a></h5>
                     <p><?= $descriptions ?> </p>
                     <a href="blog/<?= stringProcessor($title); ?>-<?= $blog_id ?>" class="blog__btn">Xem tiếp<span class="arrow_right"></span></a>
                  </div>
               </div>
            </div>
         <?PHP } ?>
      </div>
   </div>
   </div>
</section>
<!-- Blog Section End -->