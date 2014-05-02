<?php
get_header();

?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>

    <?php get_template_part('content', 'page'); ?>

<?php endwhile; endif; ?>
<?php dynamic_sidebar('leftsidebar'); ?>

<?php get_footer(); ?>