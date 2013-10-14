<?php
/**
 * The general template for displaying content.
 *
 * @package CleanSlate
 * @since CleanSlate 0.1
 */
?>

<div class="post">
    <div class="description">
        <hgroup>
            <h2 class="title">
                <?php the_title(); ?>
            </h2>
        </hgroup>
        
        <div class="content">
            <?php the_content(); ?>
        </div>
    </div>
    
    <div class="media">
        <?php
            
        if (in_category('video') && get_field('video_embed') ) :
            // Embed Video
            the_field('video_embed');
        else :
            //Insert Images
            // Define args to get attachments
            $args = array(
                'post_parent' => $post->ID,
                'post_type' => 'attachment',
                'post_mime_type' => 'image',
                'orderby' => 'menu_order',
                'order' => 'ASC'
            );
            
            // Get image attachments
            $attachments = get_children( $args );
            
            $i = 0;
            
            // Inserting attachments into HTML
            foreach($attachments as $attachment_id => $attachment) :
                // medium images set to be max 500px tall
                $image = wp_get_attachment_image( $attachment_id, 'medium' );
            ?>
            <figure>
                <?php
                    // Insert image description
                    echo $image;
                ?>
                
                <?php
                    if( $attachment->post_content ) {
                ?>
                    <figcaption>
                        <?php
                            echo '<em>Figure ' . ($i+1) . ': </em>';
                            // Insert image description
                            echo '<p>' . $attachment->post_content . '</p>';
                        ?>
                    </figcaption>
                <?php
                    }
                ?>
            </figure>
        <?php
                $i++;
            endforeach;
        endif;
        ?>
    </div>
    
</div>