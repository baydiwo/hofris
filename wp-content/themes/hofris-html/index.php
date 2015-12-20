<?php if (substr_count($_SERVER[‘HTTP_ACCEPT_ENCODING’], ‘gzip’)) ob_start(“ob_gzhandler”); else ob_start(); ?>
<?php
/**
 * Template Name: Homepage
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hofris
 */

get_header(); ?>

        <article>
            <div class="container">
                <div class="row">
                    <!-- left side -->
                    <div class="col-md-8">
                        <?php include "slider.php"; ?>
                        <div class="home-boxes">
                            <div class="row">
                                <?php
                                // WP_Query arguments
$args = array (
    'post_type'              => array( 'post' ),
    'post_status'            => array( 'publish' ),
    'posts_per_page'         => '6',
    'order'                  => 'DESC',
    'orderby'                => 'date',
);

// The Query
$querybox = new WP_Query( $args );

// The Loop
if ( $querybox->have_posts() ) {
    while ( $querybox->have_posts() ) {
        $querybox->the_post(); ?>
                                <div class="col-md-6 col-sm-6 col-xs-6">
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
                                                <!-- <p><?php echo wp_trim_words( get_the_content(), 10, '' ); ?></p> -->
                                            </a>
                                        </div>
                                    </div>
                                </div>
    <?php }
} else {
    // no posts found
}

// Restore original Post Data
wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                    <!-- right side -->
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </article>

<?php get_footer(); ?>
