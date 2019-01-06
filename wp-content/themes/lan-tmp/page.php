<?php
	if (get_the_title() == '文章新增[L]' && count_user_posts(get_current_user_id()) != 0) {
		wp_redirect(get_home_url());
	}
?>
<?php get_header(); ?>
<div id="title">
    <img src="<?php bloginfo('template_directory'); ?>/assets/image/not-use/slider.png" alt="">
</div>
<div id="body">
	<div class="container">
		<?php while ( have_posts() ) : the_post();?>
		    <div><?php the_content();?></div>
		<?php endwhile;?>
	</div>
</div>
<?php get_footer(); ?>