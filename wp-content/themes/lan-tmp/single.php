<!--include header-->
<?php get_header(); ?>
<div>
    <?php $pageData = getPostsDtails(get_the_ID());?>
    <img src="<?php echo $pageData['banner_img_url'][0] ?>" alt="<?php the_title();?>">
</div>
<div id="body">
	<div class="container">
		<?php while ( have_posts() ) : the_post();?>
			<!--���}-->
		    <div><?php the_title();?></div>
		    <!--������Q-->
		    <div><?php echo $pageData['store_name'][0] ?></div>
			<!--�Ԓ-->
			<div><?php echo $pageData['phone'][0] ?></div>
			<!--�ٷ��Wվ-->
			<div><?php echo $pageData['web'][0] ?></div>
			<!--FB-->
			<div><?php echo $pageData['fb'][0] ?></div>
			<!--ig-->
			<div><?php echo $pageData['ig'][0] ?></div>
			<!--line-->
			<div><?php echo $pageData['line'][0] ?></div>
			<!--email-->
			<div><?php echo $pageData['email'][0] ?></div>
			<!--���N�j��ʽ-->
			<div><?php echo $pageData['other_contact'][0] ?></div>
			<!--������M-->
			<div><?php echo $pageData['min'][0] ?></div>
			<!--��ҵ�ַ-->
			<div><?php echo $pageData['address'][0] ?></div>
			<!--�I�I����-->
			<div>
				<?php foreach($pageData['live_time'] as $date) { ?>
				<?php echo $date ?>
				<?php } ?>
			</div>
			<!--�I�I�r�g-->
			<div><?php echo $pageData['live_time_dt'][0] ?></div>
			<!--��λ����-->
			<div><?php echo $pageData['site_num'][0] ?></div>
			<!--��Һ�������-->
			<div><?php the_content();?></div>
			<!--���݃�����Ƭ-->
			<div><img src="<?php echo $pageData['sp_img_url'][0] ?>" alt="<?php the_title();?>"></div>
			<!--���݃���-->
			<div><?php echo $pageData['sp_content'][0] ?></div>
			<!--��Ƭ1-->
			<div><img src="<?php echo $pageData['img1_url'][0] ?>" alt="<?php the_title();?>"></div>
			<!--��Ƭ1 ����-->
			<div><?php echo $pageData['img1_content'][0] ?></div>
			<!--��Ƭ2-->
			<div><img src="<?php echo $pageData['img2_url'][0] ?>" alt="<?php the_title();?>"></div>
			<!--��Ƭ2 ����-->
			<div><?php echo $pageData['img2_content'][0] ?></div>
			<!--��Ƭ3-->
			<div><img src="<?php echo $pageData['img3_url'][0]; ?>" alt="<?php the_title();?>"></div>
			<!--��Ƭ3 ����-->
			<div><?php echo $pageData['img3_content'][0]; ?></div>
		<?php endwhile;?>
		<!--��һƪ-->
		<?php previous_post_link(); ?>
		<!--��һƪ-->
		<?php next_post_link(); ?>
	</div>
</div>
<?php get_footer(); ?>