<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package CleanSlate
 * @since CleanSlate 0.1
 */
?>
        <div id="sidebar">
            <h5>Browse</h5>
            <ul class="tag-list">
            <?php
                
                $args = array(
                    'categories'=>'4'
                );
                
                $tags = get_category_tags($args);
                
                $count = 0;
                foreach ($tags as $tag) {
                    
                    $tag_link = $tag_link = get_tag_link( $tag->tag_id );
            ?>
                    <li>
                        <a href="<?php echo $tag_link; ?>" title="<?php echo $tag->tag_name; ?> Tag"><?php echo $tag->tag_name; ?></a>
                    </li>
            <?php
                    
                    $count++;
                }
            ?>
            </ul>
        </div><!-- #sidebar -->