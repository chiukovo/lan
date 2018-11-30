<!--include header-->
<?php get_header(); ?>
<div id="slider" class="js-slider">
    <div class="container">
        <div class="js-slider-arrow">
            <button class="slider-left"><i class="la la-arrow-left"></i></button>
            <button class="slider-right"><i class="la la-arrow-right"></i></button>
        </div>
        <img src="<?php bloginfo('template_directory'); ?>/assets/image/not-use/slider.png" alt="">
    </div>
</div>
<div id="infor">
    <div class="container">
        <div class="infor-one">
            <div class="infor-one-title">How to keep up with the latest information</div>
            <div class="infor-one-span">如何追蹤店家最新資訊?</div>
        </div>
        <div class="infor-more"></div>
        <div class="infor-number">
            <div class="infor-number-ticket">
                <span>1,260,795</span>
            </div>
            <div class="infor-number-user">
                <span>66,789</span>
            </div>
        </div>
        <div class="infor-slogn">
            <div class="button">JOIN US</div>
            <div class="infor-slogn-title">即刻加入，立即享受最高折扣。</div>
            <div class="infor-slogn-share">
                <a href="">facebook</a>
                <a href="">link@</a>
                <a href="">instagram</a>
            </div>
        </div>
    </div>
</div>
<div id="ticket">
    <div class="ticket-wrap containers">
        <div class="ticket-search">
            <button class="btn-search">自訂搜尋店家條件</button>
        </div>
        <div class="container">
            <div class="row">
                <?php while ( have_posts() ) : the_post();?>
                <div class="col-12 col-sm-6 col-md-4 element">
                    <a href="<?php the_permalink();?>"></a>
                    <div class="element-body">
                        <div class="element-img">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/image/not-use/1.png" alt="<?php the_title();?>">
                        </div>
                        <div class="element-span">粥品</div>
                        <div class="element-title"><?php the_title();?></div>
                        <div class="element-star"><i class="la la-star"></i>4.2(120)</div>
                    </div>
                </div>
                <?php endwhile;?>
            </div>
        </div>
    </div>
</div>
<div id="map"></div>
<?php get_footer(); ?>