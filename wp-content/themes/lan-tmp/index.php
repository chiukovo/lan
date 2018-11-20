<!--include header-->
<?php get_header(); ?>
index
<?php while ( have_posts() ) : the_post();?>
    <div><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
<?php endwhile;?>
<?php get_footer(); ?>