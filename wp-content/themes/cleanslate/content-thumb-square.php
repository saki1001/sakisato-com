<?php
/**
 * The template to display square thumbnails.
 *
 * @package CleanSlate
 * @since CleanSlate 0.1
 */
?>

<?php
    $postCategory = get_the_category($post->ID);
    // print_r($postCategory);
?>

<figcaption class="<?php echo $postCategory[0]->slug; ?>">
    <h4 class="post-title">
        <?php the_title(); ?>
    </h4>
</figcaption>

<figure class="post-thumb">
    
    <?php
        // BEGIN Get thumbnail
        $args = array(
            'post_parent' => $post->ID,
            'post_type' => 'attachment',
            'post_mime_type' => 'image',
            'orderby' => 'menu_order',
            'order' => 'ASC'
        );
        
        // Get image attachments
        $attachments = get_children( $args );
        
        // Featured Image
        $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID, 'thumbnail') );
        
        if ( $attachments ) :
            
            if ( has_post_thumbnail($post->ID) ) :
                // Use Featured Image URL
                $thumb = $featImg;
                $thumbUrl = $thumb[0];
            else :
                // Use only first value in array
                $attachment = array_shift( $attachments );
            
                // Get thumbnail URL
                $thumb = wp_get_attachment_image_src( $attachment->ID, 'thumbnail' );
                $thumbUrl = $thumb[0];
            endif;
        else :
        
            $thumbUrl = get_bloginfo('template_directory') . "/images/thumb-browse.jpg";
        
        endif;
        // END Get Thumbnail
    ?>
    
    <a href="<?php the_permalink(); ?>" style="background: url('<?php echo $thumbUrl; ?>') no-repeat 0 0;"></a>
        
</figure>