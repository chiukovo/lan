<!DOCTYPE html>
<html>
    <head>

        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/ekko-lightbox.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/line-awesome.min.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/owl.carousel.min.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/main.css" />

        <!-- javascript -->
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/owl.carousel.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/popper.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/ekko-lightbox.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/bootstrap.min.js"></script>
        <?php wp_head(); ?>
        <style>
          .wpuf-info {
            display: none;
          }
          .navigation .dropdown-item {
            color: #1C1C1C !important;
          }
        </style>
        <script>
        $(function(){
          $('.nav-open, .nav-main').click(function(e) {
            $('.nav-main').toggleClass('active');
          });
        });
        </script>
    </head>
    <body <?php body_class(); ?>>
      <div id="mainBody">
        <div id="header" class="clearfix">
            <div class="logo"><a href="<?php echo get_home_url('/'); ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/image/logo.png" alt="輕鬆取 EASY GET"></a></div>
            <div class="navigation">
                <button class="nav-open"><i class="la la-bars"></i></button>
                <nav class="nav-main ">
                  <a href="<?php echo get_home_url(); ?>/about">關於我們</a>
                  <a href="<?php echo get_home_url('about'); ?>/offer">所有好康優惠代碼</a>
                  <a href="<?php echo get_home_url('about'); ?>/download-offer">如何下載優惠代碼?</a>
                  <a href="<?php echo get_home_url('about'); ?>/recommend">推薦您喜歡的店家給我們</a>
                  <?php if ( ! is_user_logged_in()) {?>
                  <a href="<?php echo get_home_url('create'); ?>/create">店家註冊</a>
                  <a href="<?php echo get_home_url(); ?>/login">店家登入</a>
                  <?php } else { ?>
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="la la-user"></i> <b style="color: #fff41c;"><?php echo wp_get_current_user()->user_login; ?></b> 您已登入
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?php echo get_home_url(); ?>/文章新增/">文章發布</a>
                    <a class="dropdown-item" href="<?php echo get_home_url(); ?>/儀表盤/">文章編輯</a>
                    <a class="dropdown-item" href="<?php echo get_home_url(); ?>/create/">店家帳號資訊</a>
                    <a class="dropdown-item" href="<?php echo get_home_url(); ?>/登錄__trashed-2/?action=logout">登出</a>
                  </div>
                  <?php } ?>
                </nav>
            </div>
        </div>
        <?php if (is_home()) { ?>
        <div id="title">
          <div id="slider" class="owl-carousel">
              <img src="<?php bloginfo('template_directory'); ?>/assets/image/not-use/slider.png" alt="">
              <img src="<?php bloginfo('template_directory'); ?>/assets/image/not-use/slider.png" alt="">
              <img src="<?php bloginfo('template_directory'); ?>/assets/image/not-use/slider.png" alt="">
              <img src="<?php bloginfo('template_directory'); ?>/assets/image/not-use/slider.png" alt="">
              <img src="<?php bloginfo('template_directory'); ?>/assets/image/not-use/slider.png" alt="">
              <img src="<?php bloginfo('template_directory'); ?>/assets/image/not-use/slider.png" alt="">
              <img src="<?php bloginfo('template_directory'); ?>/assets/image/not-use/slider.png" alt="">
          </div>
            <script>
              $(document).ready(function() {
                $('#slider').owlCarousel({
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