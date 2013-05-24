<?php
/**
 * The template for the Browse category.
 *
 * @package CleanSlate
 * @since CleanSlate 0.1
 */
?>

<?php get_header(); ?>
        
    <section id="content" role="main">
    
    <?php
        // Routing to Browse category
        if ( in_category('browse') ) :
           $browseContent = true;
        else :
            $browseContent = false;
        endif;
        
        if ( have_posts() ) :
            
            if ( $browseContent === true ) :
                // Browse Template
                include('content-filters.php');
                include('content-browse.php');
            else :
                include('content.php');
            endif;
                
        else :
            // Content Not Found Template
            include('content-not-found.php');
            
        endif;
    ?>
    
    </section>
    
<?php get_footer(); ?>