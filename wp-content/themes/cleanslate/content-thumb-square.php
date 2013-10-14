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
        $thumb = get_thumbnail_custom($post->ID, 'thumbnail');
    ?>
    <a href="<?php the_permalink(); ?>" style="background: url('<?php echo $thumb; ?>') no-repeat 0 0;"></a>
        
</figure>