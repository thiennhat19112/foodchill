<div class="row justify-content-center text-justify ">
    <div class="col-lg-8 col-md-7 order-md-1 order-1">
        <div class="blog__details__text text-center">
            <h1 class="my-5"><?= $title ?></h1>
            <img src="./upload/images/blog/<?= $image ?>" alt="">
            <div class="blog__details__text content  text-justify">
                <?= $content ?>
            </div>
        </div>
        <div class="blog__details__content">
            <div class="row">
                <div class="col-lg-6">
                    <div class="blog__details__author">
                        <div class="blog__details__author__text">
                            <h5><?= $user_name ?></h5>
                            <span><?= shortDate($create_date) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Related Blog Section Begin -->
<section class="related-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related-blog-title">
                    <h2>Có lẻ bạn cũng thích</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($items_limit as $item) {
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
</section>
<!-- Related Blog Section End -->