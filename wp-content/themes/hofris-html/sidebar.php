<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hofris
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="col-md-4">
    <div class="box-sidebar">
        <?php
        // WP_Query arguments
        $args = array (
            'post_type'              => 'sidebar',
            'post_status'            => array('publish','future'),
            'pagination'             => false,
            'posts_per_page'         => '3',
        );

        // The Query
        $sidebar = new WP_Query( $args );

        // The Loop
        if ( $sidebar->have_posts() ) {
            while ( $sidebar->have_posts() ) {
                $sidebar->the_post(); ?>

        <div class="boxes">
            <a href="<?php the_permalink(); ?>">
                <div class="graph">
                    <?php
                    $params = array( 'width' => 396, 'height' => 365, 'crop' => true );
                    $image = get_field('image');
                    $imageUrl = $image['url'];
                    ?>
                    <img src="<?php echo bfi_thumb( "$imageUrl", $params ); ?>" alt="" class="img-responsive">
                </div>
            </a>
            <div class="details">
                <ul class="list-unstyled list-inline"><?php the_category_hook(' '); ?></ul>
                <a href="<?php the_permalink(); ?>">
                    <h2><?php echo wp_trim_words( get_the_title(), 7, '' ); ?></h2>
                    <p><?php echo wp_trim_words( get_the_content(), 10, '' ); ?></p>
                </a>
            </div>
        </div>

            <?php }
        } else {
            // no posts found
        }

        // Restore original Post Data
        wp_reset_postdata();
         ?>

        <div class="boxes">
            <?php //dynamic_sidebar( 'sidebar-1' ); ?>
            <a class="twitter-timeline" href="https://twitter.com/baydiwo" data-widget-id="657695176471654400">Tweets by @baydiwo</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


            <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/img-sosmed.jpg" alt="" class="img-responsive"> -->
        </div>
    </div>
</div>



