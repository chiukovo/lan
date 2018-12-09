<!--include header-->
<?php get_header(); ?>
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
			<!--標題-->
		    <!-- <h1><?php the_title();?></h1> -->
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
					<div><img src="<?php echo $pageData['sp_img_url'][0] ?>" alt="<?php the_title();?>"></div>
					<!--優惠內容-->
					<div><?php echo $pageData['sp_content'][0] ?></div>
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
				<div><img src="<?php echo $pageData['img1_url'][0] ?>" alt="<?php the_title();?>"></div>
				<?php } ?>
				<!--照片1 敘述-->
				<div><?php echo $pageData['img1_content'][0] ?></div>
				<!--照片2-->
				<?php if ( ! empty($pageData['img2_url'][0])) {?>
				<div><img src="<?php echo $pageData['img2_url'][0] ?>" alt="<?php the_title();?>"></div>
				<?php } ?>
				<!--照片2 敘述-->
				<div><?php echo $pageData['img2_content'][0] ?></div>
				<!--照片3-->
				<?php if ( ! empty($pageData['img3_url'][0])) {?>
				<div><img src="<?php echo $pageData['img3_url'][0]; ?>" alt="<?php the_title();?>"></div>
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
<?php get_footer(); ?>