<?php
/**
 * The search form.
 *
 * @package CleanSlate
 * @since CleanSlate 0.1
 */
?>

<?php
    // if( is_category() ) :
    //     // $category = get_the_category();
    //     $category = get_queried_object();
    //     $cat_parent = ( $category->category_parent ) ? $category->category_parent : $category->cat_ID;
    //     $action_url = get_category_link($cat_parent);
    // else :
    //     $action_url = get_bloginfo('home');
    //     if( is_search() ) :
    //         $action_url .= $_SERVER['REQUEST_URI'];
    //     endif;
    // endif;
    
    // Send to Browse category URL
    $action_url = get_category_link('2');
?>

<form role="search" method="get" id="searchform" action="<?php echo $action_url; ?>">
    <div><label class="screen-reader-text" for="s">Search for:</label>
        <input type="text" value="" name="s" id="s" placeholder="Search..." />
    </div>
</form>