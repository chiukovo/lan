<!--include header-->
<?php get_header(); ?>
<?php while ( have_posts() ) : the_post();?>
	page details
    <div><?php the_title();?></div>
    <div><?php the_content();?></div>
<?php endwhile;?>
<?php previous_post_link(); ?>    <?php next_post_link(); ?>
<?php
// Check if page is not homepage
if ( ! ( is_front_page() && ! is_home() ) ){
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

}
?>
<?php get_footer(); ?>