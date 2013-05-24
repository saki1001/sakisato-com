<?php
/**
 * The main template file.
 *
 * @package CleanSlate
 * @since CleanSlate 0.1
 */
?>

<?php get_header(); ?>
        
    <section id="content" role="main">
        
        <?php
            if ( have_posts() ) :
                // Homepage slideshow
                do_action('slideshow_deploy', '22');
            
            else :
            // Content Not Found Template
            include('content-not-found.php');
            
            endif;
        ?>
    </section>
    
<?php get_footer(); ?>