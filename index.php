<?php
/**
 * Created by CodeCrew.
 * Developer: Nenad Paic
 * Date: 4/30/14
 * Time: 7:05 PM
 */


?>

<?php get_header(); ?>
<?php //get_template_part(); ?>
<?php the_post_thumbnail('featured') ?>

<?php if(have_posts()) : while(have_posts()): the_post();

?>
    <h2><?php the_title(); ?></h2>
    <p><?php the_author(); ?></p>
    <p><?php the_time(); ?></p>
    <p><?php the_date(); ?></p>
    <p><?php the_content(); ?></p>
    <?php
endwhile;
else:?>
<p>Nema postova</p>
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>


