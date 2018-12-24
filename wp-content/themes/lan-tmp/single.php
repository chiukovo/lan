<!--include header-->
<?php get_header(); ?>
<style>
.modal-content {
	text-align: center;
}
.end {
  color: #333333;
  font-family: "Roboto", sans-serif;
  text-align: center;
  margin: 10px;
  position: relative;
  font-weight: 300;
  font-size: 16px;
}
.coupon {
  color: #333333;
  font-family: "Roboto", sans-serif;
  text-align: center;
  position: relative;
  margin: 0 auto;
  font-size: 50px;
  border-radius: 5px;
  border: 3px dashed black;
  height: 120px;
  line-height: 120px;
  width: 70%;
  font-weight: 700;
}
.finish {
  cursor: pointer;
  border-radius: 20px;
  margin: auto;
  background: none;
  color: #333333;
  text-transform: uppercase;
  border: 1px solid #26a6c0;
  font-family: "Raleway", sans-serif;
  letter-spacing: 1px;
  width: 180px;
  height: 50px;
  transition: all 0.3s ease;
}
.finish:hover {
  background: #26a6c0;
  color: white;
  border: 1px solid #2294aa;
}
.modal-footer {
	text-align: center;
}
</style>
<div id="title">
    <?php $pageData = getPostsDtails(get_the_ID());?>
    <?php if ( $pageData['banner_img_url'][0] != '' ) {?>
    <img src="<?php echo $pageData['banner_img_url'][0] ?>" alt="<?php the_title();?>">
    <?php } else { ?>
    <img src="<?php bloginfo('template_directory'); ?>/assets/image/not-use/slider.png" alt="">
    <?php } ?>
</div>
<div id="body">
	<div class="container details">
		<?php while ( have_posts() ) : the_post();?>
		    <!--店家名稱-->
		    <h2 class="store-name shadow-none p-3 bg-light rounded font-weight-bold"><?php the_title() ?></h2>
		    <div class="page-title p-3">店家資訊</div>
		    <div class="mb-3">
		    	<ul class="mt-3">
		    		<?php if ( ! empty($pageData['phone'][0])) {?>
		    		<li>
		    			<!--電話-->
	    				<div class="phone"><i class="la la-phone"></i> <?php echo $pageData['phone'][0] ?></div>
		    		</li>
		    		<?php } ?>
		    		<?php if ( ! empty($pageData['email'][0])) {?>
		    		<li>
		    			<!--email-->
	    				<div class="email"><?php echo $pageData['email'][0] ?></div>
		    		</li>
		    		<?php } ?>
		    		<?php if ( ! empty($pageData['other_contact'][0])) {?>
		    		<li>
		    			<!--其餘聯絡方式-->
		    			<div class="other-contact"><?php echo $pageData['other_contact'][0] ?></div>
		    		</li>
		    		<?php } ?>
		    		<?php if ( ! empty($pageData['address'][0])) {?>
		    		<li>
			    		<!--店家地址-->
						<div class="address"><?php echo $pageData['address'][0] ?></div>
		    		</li>
		    		<?php } ?>
		    	</ul>
		    </div>
			<div class="page-title p-3">營業時間</div>
			<div class="mb-3">
				<div class="m-3">
					<!--營業日期-->
					<div class="live-time">營業日：
						<?php foreach($pageData['live_time'] as $date) { ?>
						<?php echo $date ?>
						<?php } ?>
						<?php if ( ! empty($pageData['live_time_ex'][0])) { ?>
						備註：<?php echo $pageData['live_time_ex'][0] ?>
						<?php } ?>
					</div>
					<!--營業時間-->
					<div class="live-time-dt">營業時間：<?php echo $pageData['live_time_dt'][0] ?></div>
				</div>
			</div>

			<div class="page-title p-3">其他資訊</div>
			<div class="mb-3">
				<div class="m-3">
					<!--最低消費-->
					<div class="min">最低消費：<?php echo $pageData['min'][0] ?></div>
					<!--座位數量-->
					<div class="site-num">店內座位：<?php echo $pageData['site_num'][0] ?></div>
				</div>
			</div>
			<div class="page-title p-3">優惠內容</div>
			<div class="mb-3">
				<div class="m-3">
					<!--優惠內容照片-->
					<div style="margin-bottom: 30px">
						<a href="<?php echo $pageData['sp_img_url'][0] ?>" data-toggle="lightbox">
							<img src="<?php echo $pageData['sp_img_url'][0] ?>" alt="<?php the_title();?>">
						</a>
            <p class="red">★請利用下方連結到 輕鬆取 Easy Get ! 的 Facebook粉絲團按讚、或追蹤Instagram、或加我們的 LINE為好友(至少完成一項)，
            並填入基本資料按下送出後就能順利取得優惠代碼喔！</p>
					</div>
          <!--fb-->
          <div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = 'https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v3.2';
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
            <div class="fb-page"
              data-href="https://www.facebook.com/facebook"
              data-width="380"
              data-hide-cover="false"
              data-show-facepile="false"></div>
          </div>
          <!--fb end-->
          <!--ig-->
          <!--ig end-->
          <!--line-->
          <!--line end-->
          <a href="https://line"></a>
          <!-- Button trigger modal -->
          <button id="getCoupon" type="button" class="btn btn-danger btn-lg">立即取得優惠代碼</button>
				</div>
			</div>


			<div class="page-title p-3">店家介紹</div>
		    <div class="p-3">
				<!--官方網站-->
				<!-- <div class="web"><?php echo $pageData['web'][0] ?></div> -->
				<!--FB-->
				<!-- <div class="fb"><?php echo $pageData['fb'][0] ?></div> -->
				<!--ig-->
				<!-- <div class="ig"><?php echo $pageData['ig'][0] ?></div> -->
				<!--line-->
				<!-- <div class="line"><?php echo $pageData['line'][0] ?></div> -->
				<!--照片1-->
				<!--店家簡述內容-->
				<div class="store-content mb-3"><?php the_content();?></div>
				<?php if ( ! empty($pageData['img1_url'][0])) {?>
				<div>
					<a href="<?php echo $pageData['img1_url'][0] ?>" data-toggle="lightbox">
						<img src="<?php echo $pageData['img1_url'][0] ?>" alt="<?php the_title();?>">
					</a>
				</div>
				<?php } ?>
				<!--照片1 敘述-->
				<div><?php echo $pageData['img1_content'][0] ?></div>
				<!--照片2-->
				<?php if ( ! empty($pageData['img2_url'][0])) {?>
				<div>
					<a href="<?php echo $pageData['img2_url'][0] ?>" data-toggle="lightbox">
						<img src="<?php echo $pageData['img2_url'][0] ?>" alt="<?php the_title();?>">
					</a>
				</div>
				<?php } ?>
				<!--照片2 敘述-->
				<div><?php echo $pageData['img2_content'][0] ?></div>
				<!--照片3-->
				<?php if ( ! empty($pageData['img3_url'][0])) {?>
				<div>
					<a href="<?php echo $pageData['img3_url'][0] ?>" data-toggle="lightbox">
						<img src="<?php echo $pageData['img3_url'][0] ?>" alt="<?php the_title();?>">
					</a>
				</div>
				<?php } ?>
				<!--照片3 敘述-->
				<div><?php echo $pageData['img3_content'][0]; ?></div>
		    </div>
		<?php endwhile;?>
		<div class="arrow-wrap row m-3">
			<?php
			$prev_post = get_previous_post();
			if (!empty( $prev_post )): ?>
			 <a class="del-btn-prev btn col mr-1 p-3" href="<?php echo $prev_post->guid ?>">
				<< <?php echo $prev_post->post_title ?>
			</a>
			<?php endif ?>
			<?php
			$next = get_next_post();
			if (!empty( $next )): ?>
			 <a class="del-btn-next btn col mr-1 p-3" href="<?php echo $next->guid ?>">
				<?php echo $next->post_title ?> >>
			</a>
			<?php endif ?>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="coupon" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php the_title() ?> 專屬優惠券</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--優惠內容-->
        <div class="coupon">BURBUR7878</div>
        <div class="end"><?php echo $pageData['sp_content'][0] ?></div>
      </div>
      <div class="modal-footer">
        <button class="finish">下載折扣代碼</button>
      </div>
    </div>
  </div>
</div>
<script>
$(function() {
	$(document).on('click', '[data-toggle="lightbox"]', function(e) {
        e.preventDefault();
        $(this).ekkoLightbox();
    });

    $('#getCoupon').click(function() {
        Swal.mixin({
          input: 'text',
          confirmButtonText: '下一步 &rarr;',
          cancelButtonText: '關閉',
          showCancelButton: true,
          allowOutsideClick: false,
          progressSteps: ['1','2','3']
        }).queue([
          {
            title: '姓名',
            text: '請填入真實姓名'
          },
          {
            title: '手機號碼',
          },
          {
            title: 'E-MAIL',
            text: '優惠代碼將會寄到您的信箱 請正確填寫'
          },
        ]).then((result) => {
          if (result.value) {
            var check = true;
            var msg = '';
            result.value.forEach(function(target, key) {
              if ( key == 0 ) {
                msg = '姓名尚未填寫';
              } else if ( key == 1 ) {
                msg = '手機號碼尚未填寫';
              } else {
                msg = 'E-MAIL尚未填寫';
              }

              if ( target == '' ) {
                check = false;
              }
            });

            if ( ! check ) {
              Swal({
                type: 'error',
                title: '很抱歉!',
                text: msg,
                confirmButtonText: '關閉'
              })
            } else {
              Swal({
                type: 'success',
                title: '恭喜您!',
                text: '優惠代碼已發送到您的信箱! ^__^',
                confirmButtonText: '關閉'
              })
            }
          }
        })
    });
});
</script>
<?php get_footer(); ?>