<?php
/**
 * The main template file.
 *
 * @package CleanSlate
 * @since CleanSlate 0.1
 */
?>

<?php
    
    require_once('../../../../wp-load.php');
    
    if( isset($_GET['post_date'])) {
        
        $post_date = $_GET['post_date'];
        
        $current_year = mysql2date('Y', $post_date);
        $current_month = mysql2date('m', $post_date);
        $current_day = mysql2date('j', $post_date);
        
    } else {
        $current_year = date('Y', current_time('timestamp'));
        $current_month = date('m', current_time('timestamp'));
        $current_day = date('j', current_time('timestamp'));
    
    }
    
    $args = array(
        'cat'      => 2,
        'year'     => $current_year,
        'monthnum' => $current_month,
        'day' => $current_day,
        'posts_per_page' => '1',
        'order'    => 'DESC'
    );
    
    $the_query = new WP_Query( $args );
    ?>
    
    <?php
        while ( $the_query->have_posts() ) : $the_query->the_post();
            get_sidebar();
        endwhile;
        
        rewind_posts();
    ?>
    
    <div id="articles">
    
    <?php
        
        while ( $the_query->have_posts() ) : $the_query->the_post();
            get_template_part( 'content', get_post_format() );
        endwhile;
        
    ?>
    
    </div>
    
<?php wp_reset_query(); ?>