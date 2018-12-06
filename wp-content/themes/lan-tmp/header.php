<!DOCTYPE html>
<html>
    <head>

        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/line-awesome.min.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/owl.carousel.min.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/main.css" />

        <!-- javascript -->
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/owl.carousel.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/popper.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/bootstrap.min.js"></script>
        <?php wp_head(); ?>
        <style>
          .js-slider .js-slider-arrow {
            z-index: 100
          }
        </style>
    </head>
    <body <?php body_class(); ?>>
      <div id="mainBody">
        <div class="container">
            <div id="header" class="clearfix">
                <div class="logo"><a href="/"><img src="<?php bloginfo('template_directory'); ?>/assets/image/logo.png" alt="輕鬆取 EASY GET"></a></div>
                <div class="navigation">
                    <button class="nav-open"><i class="la la-bars"></i></button>
                    <nav class="nav-main ">
                        <a href="#">所有好康優惠代碼</a>
                        <a href="#">如何下載優惠代碼?</a>
                        <a href="#">推薦您喜歡的店家給我們</a>
                        <a href="#">業者免費刊登資訊</a>
                        <a href="#">關於我們</a>
                        <button class="nav-close"><i class="la la-times"></i></button>
                    </nav>
                </div>
            </div>
            <?php if (is_home()) { ?>
            <div id="title">
                <div id="slider" class="js-slider">
                    <div class="js-slider-arrow">
                        <button class="slider-left"><i class="la la-arrow-left"></i></button>
                        <button class="slider-right"><i class="la la-arrow-right"></i></button>
                    </div>
                    <div id="banner" class="owl-carousel">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/image/not-use/slider.png" alt="">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/image/not-use/slider.png" alt="">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/image/not-use/slider.png" alt="">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/image/not-use/slider.png" alt="">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/image/not-use/slider.png" alt="">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/image/not-use/slider.png" alt="">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/image/not-use/slider.png" alt="">
                    </div>
                </div>
                <div id="infor" class="clearfix">
                    <div class="infor-qa">
                        <div id="info" class="qa-wrap owl-carousel">
                            <div>
                              <div class="infor-qa-title">How to keep up with the latest information</div>
                              <div class="infor-qa-span">如何追蹤店家最新資訊?</div>
                            </div>
                            <div>
                              <div class="infor-qa-title">How to keep up with the latest information</div>
                              <div class="infor-qa-span">如何追蹤店家最新資訊?</div>
                            </div>
                        </div>
                        <ul id='carousel-custom-dots' class="infor-qa-ctrl owl-dots">
                          <li class="active"></li>
                          <li></li>
                          <li></li>
                        </ul>
                    </div>
                    <div class="infor-more"><i class="la la-caret-down"></i></div>
                    <div class="infor-number">
                        <div class="infor-number-box infor-number-ticket">
                            <span>1,260,795</span>
                        </div>
                        <div class="infor-number-box infor-number-user">
                            <span>66,789</span>
                        </div>
                    </div>
                    <div class="infor-slogn">
                        <div class="button">JOIN US</div>
                        <div class="infor-slogn-title">即刻加入，立即享受最高折扣。</div>
                        <div class="infor-slogn-share">
                            <a href=""><img src="<?php bloginfo('template_directory'); ?>/assets/image/share-fb.png" alt=""></a>
                            <a href=""><img src="<?php bloginfo('template_directory'); ?>/assets/image/share-line.png" alt=""></a>
                            <a href=""><img src="<?php bloginfo('template_directory'); ?>/assets/image/share-ig.png" alt=""></a>
                        </div>
                    </div>
                </div>
                <script>
                  $(document).ready(function() {
                    $('#info').owlCarousel({
                      loop: true,
                      items: 1,
                      autoplay:true,
                      autoplayTimeout: 4000,
                      autoplayHoverPause: true,
                      dotsContainer: '#carousel-custom-dots'
                    })

                    $('.nav-open, .nav-close').click(function(event) {
                      $('.nav-main').toggleClass('active');
                    });

                    $('#banner').owlCarousel({
                      loop: true,
                      items: 1,
                      dots: false,
                      autoplay:true,
                      autoplayTimeout: 3000,
                      autoplayHoverPause: true,
                      animateOut: 'fadeOut',
                    })

                    $('#slider .slider-left').click(function(e) {
                        e.preventDefault();
                        $('#banner').trigger('prev.owl.carousel');
                    })
                    $('#slider .slider-right').click(function(e) {
                        e.preventDefault();
                        $('#banner').trigger('next.owl.carousel');
                    })
                  })
                </script>
            </div>
            <?php } ?>
        </div>