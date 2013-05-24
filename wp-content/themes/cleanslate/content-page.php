<?php
/**
 * The general template used for displaying page content in page.php.
 *
 * @package CleanSlate
 * @since CleanSlate 0.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <div id="text" class="text-container <?php echo $noImageClass; ?>">
        <?php the_content(); ?>
    </div>
    
        <figure>
            <img src="<?php echo get_thumbnail_custom($post->ID); ?>" width="350" height="" alt="About me" />
        </figure>
        <figcaption>
            <?php
                // Insert image description
                echo $attachment->post_content;
            ?>
        </figcaption>
    
</article>