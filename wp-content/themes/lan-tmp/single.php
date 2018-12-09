<!--include header-->
<?php get_header(); ?>
<div>
    <?php $pageData = getPostsDtails(get_the_ID());?>
    <img src="<?php echo $pageData['banner_img_url'][0] ?>" alt="<?php the_title();?>">
</div>
<div id="body">
	<div class="container">
		<?php while ( have_posts() ) : the_post();?>
			<!--˜Ëî}-->
		    <div><?php the_title();?></div>
		    <!--µê¼ÒÃû·Q-->
		    <div><?php echo $pageData['store_name'][0] ?></div>
			<!--ëŠÔ’-->
			<div><?php echo $pageData['phone'][0] ?></div>
			<!--¹Ù·½¾WÕ¾-->
			<div><?php echo $pageData['web'][0] ?></div>
			<!--FB-->
			<div><?php echo $pageData['fb'][0] ?></div>
			<!--ig-->
			<div><?php echo $pageData['ig'][0] ?></div>
			<!--line-->
			<div><?php echo $pageData['line'][0] ?></div>
			<!--email-->
			<div><?php echo $pageData['email'][0] ?></div>
			<!--ÆäðNÂ“½j·½Ê½-->
			<div><?php echo $pageData['other_contact'][0] ?></div>
			<!--×îµÍÏûÙM-->
			<div><?php echo $pageData['min'][0] ?></div>
			<!--µê¼ÒµØÖ·-->
			<div><?php echo $pageData['address'][0] ?></div>
			<!-- I˜IÈÕÆÚ-->
			<div>
				<?php foreach($pageData['live_time'] as $date) { ?>
				<?php echo $date ?>
				<?php } ?>
			</div>
			<!-- I˜I•rég-->
			<div><?php echo $pageData['live_time_dt'][0] ?></div>
			<!--×ùÎ»”µÁ¿-->
			<div><?php echo $pageData['site_num'][0] ?></div>
			<!--µê¼Òº†ÊöƒÈÈÝ-->
			<div><?php the_content();?></div>
			<!--ƒž»ÝƒÈÈÝÕÕÆ¬-->
			<div><img src="<?php echo $pageData['sp_img_url'][0] ?>" alt="<?php the_title();?>"></div>
			<!--ƒž»ÝƒÈÈÝ-->
			<div><?php echo $pageData['sp_content'][0] ?></div>
			<!--ÕÕÆ¬1-->
			<div><img src="<?php echo $pageData['img1_url'][0] ?>" alt="<?php the_title();?>"></div>
			<!--ÕÕÆ¬1 ”¢Êö-->
			<div><?php echo $pageData['img1_content'][0] ?></div>
			<!--ÕÕÆ¬2-->
			<div><img src="<?php echo $pageData['img2_url'][0] ?>" alt="<?php the_title();?>"></div>
			<!--ÕÕÆ¬2 ”¢Êö-->
			<div><?php echo $pageData['img2_content'][0] ?></div>
			<!--ÕÕÆ¬3-->
			<div><img src="<?php echo $pageData['img3_url'][0]; ?>" alt="<?php the_title();?>"></div>
			<!--ÕÕÆ¬3 ”¢Êö-->
			<div><?php echo $pageData['img3_content'][0]; ?></div>
		<?php endwhile;?>
		<!--ÉÏÒ»Æª-->
		<?php previous_post_link(); ?>
		<!--ÏÂÒ»Æª-->
		<?php next_post_link(); ?>
	</div>
</div>
<?php get_footer(); ?>