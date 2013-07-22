<?php
/**
 * The template for routing Category posts to their respective pages.
 *
 * @package CleanSlate
 * @since CleanSlate 0.1
 */
?>

<?php get_header(); ?>
    
    <section id="content" role="main">
        
        <?php
            
            if ( have_posts() ) :
                
                if ( is_category('blank') ) :
                    
                    // Sidebar
                    get_sidebar();
            ?>
                    <div id="articles">
                        <?php
                            while ( have_posts() ) : the_post();
                                get_template_part('content', get_post_format() );
                            endwhile;
                        ?>
                    </div>
            <?php
                else :
                    
                    // Sidebar
                    get_sidebar();
                    
                    get_template_part('content-browse', get_post_format() );
                    
                endif;
                
            else :
                // Content Not Found Template
                include('content-not-found.php');
                
            endif;
        ?>
        
        <div class="pagination">
            <div id="next-page"><?php next_posts_link('Next &rarr;','') ?></div>
        </div>
    </section>
    
<?php get_footer(); ?>