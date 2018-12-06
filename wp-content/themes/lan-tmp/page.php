<?php get_header(); ?>
<div id="body">
	<div class="container">
		<?php while ( have_posts() ) : the_post();?>
		    <div><?php the_content();?></div>
		<?php endwhile;?>
	</div>
</div>
<?php get_footer(); ?>