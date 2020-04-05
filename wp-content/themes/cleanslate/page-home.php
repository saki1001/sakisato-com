<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package CleanSlate
 * @since CleanSlate 0.1
 */

get_header(); ?>

<section id="content" role="main">

  <?php
  while ( have_posts() ) : the_post();
    the_content();

    ?>
    <div class="slideshow_container">
      <div class="slideshow_content">
        <?php echo get_field('slideshow'); ?>
      </div>
    </div>
  <?php

  endwhile; // end of the loop.
  ?>

</section>

<?php get_footer(); ?>
