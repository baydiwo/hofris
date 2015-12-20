<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hofris
 */

if ( is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="col-md-4 col-sm-12 col-lg-4">
    <div class="box-sidebar">
        <div class="row">


        <?php
        // WP_Query arguments
        $args = array (
            'post_type'              => 'sidebar',
            'post_status'            => array('publish','future'),
            'pagination'             => false,
            'posts_per_page'         => '3',
            'order'                  => 'ASC',
        );

        // The Query
        $sidebar = new WP_Query( $args );

        // The Loop
        if ( $sidebar->have_posts() ) {
            while ( $sidebar->have_posts() ) {
                $sidebar->the_post(); ?>
    <div class="col-sm-6 col-lg-12 col-xs-6 col-md-12">
        <div class="boxes">
            <a href="<?php the_field("link") ?>">
                <?php
                    $image = get_field('image');
                    $imageUrl = $image['url'];
                    $content = get_the_content();
                    if ( $content == null) {
                        $params = array( 'width' => 360, 'height' => 462, 'crop' => true ); ?>
                    <img src="<?php echo bfi_thumb( "$imageUrl", $params ); ?>" alt="" class="img-responsive">
                    <?php } else {
                    $params = array( 'width' => 396, 'height' => 365, 'crop' => true );
                    ?>
                <div class="graph">
                    <img src="<?php echo bfi_thumb( "$imageUrl", $params ); ?>" alt="" class="img-responsive">
                </div>
                <?php } ?>
            </a>
            <?php if ( $content != null) { ?>
            <div class="details">
                <a href="<?php the_field("link") ?>">
                    <h2><?php echo wp_trim_words( get_the_title(), 7, '' ); ?></h2>
                    <!-- <p><?php echo wp_trim_words( get_the_content(), 10, '' ); ?></p> -->
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
            <?php }
        } else {
            // no posts found
        }

        // Restore original Post Data
        wp_reset_postdata();
         ?>
            <div class="col-sm-6 col-lg-12 col-xs-6 col-md-12">
                <div class="boxes">
                    <?php echo do_shortcode("[custom-facebook-feed type=events pastevents=true]" ); ?>
                    <?php //dynamic_sidebar( 'sidebar-1' ); ?>
                    <!-- <a class="twitter-timeline" href="https://twitter.com/baydiwo" data-widget-id="657695176471654400">Tweets by @baydiwo</a> -->
        <!--<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script> -->


                    <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/img-sosmed.jpg" alt="" class="img-responsive"> -->
                </div>
            </div>
        </div>
    </div>
</div>



