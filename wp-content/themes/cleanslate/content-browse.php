<?php
/**
 * The template for the browse page.
 *
 * @package CleanSlate
 * @since CleanSlate 0.1
 */
?>
    
<div id="articles" class="browse-posts">
    <?php
        $i = 0;
        
        while ( have_posts() ) : the_post();
            
            if( $i % 3 == 0 ) :
                // test for every fourth item
                $class = 'first';
            elseif( $i & 1 ) :
                // test if odd with bitwise operator
                $class = 'odd';
            else :
                $class = '';
            endif;
    ?>
            <article class="thumb column <?php echo $class; ?>">
                <?php
                    get_template_part( 'content-thumb-square', get_post_format() );
                ?>
            </article>
    <?php
        $i++;
        endwhile;
    ?>
</div>