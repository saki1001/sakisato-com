<?php
/**
 * Displaying links to previous and next post in same category.
 *
 * @package CleanSlate
 * @since CleanSlate 0.1
 */
?>

<ul class="post-nav">
    <?php 
        // BEGIN Previous Post Link Conditional
        $prev_post = get_previous_post(true);
        
        if ($prev_post):
    ?>
            <li id="prev-post">
                <a id="prev-link" href="<?php echo $prev_post->guid; ?>" title="<?php echo $prev_post->post_title; ?>">&larr;</a>
            </li>
    <?php
        // END Previous Post Link Conditional
        endif;
    ?>
    <?php
        // BEGIN Next Post Link Conditional
        $next_post = get_next_post(true);
        
        if ($next_post):
    ?>
        <li id="next-post">
            <a id="next-link" href="<?php echo $next_post->guid; ?>" title="<?php echo $next_post->post_title; ?>">&rarr;</a>
        </li>
    <?php
        // END Next Post Link Conditional
        endif;
    ?>
</ul>