<?php
/**
 * The template for displaying all single video posts.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hofris
 */

get_header(); ?>

    <article class="content">
            <div class="container">
                <?php the_breadcrumb(); ?>

                <div class="row">
                    <div class="col-lg-12">
                        <h1>Video</h1>
                    </div>
                    <div class="col-lg-12">
                        <div class="row video-page">

                <?php
                // WP_Query arguments
                $args = array (
                    'post_type'              => 'video-post',
                    'post_status'            => array( 'publish' ),
                );

                // The Query
                $query = new WP_Query( $args );

                // The Loop
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        // do something ?>


                            <div class="col-md-3 col-xs-6">
                                <div class="video">
                                    <a class='youtube' href="http://www.youtube.com/embed/<?php the_field("video_id"); ?>?rel=0&amp;wmode=transparent"><img src="http://img.youtube.com/vi/<?php the_field("video_id"); ?>/mqdefault.jpg" alt="" class="img-responsive" rel="youtube"></a>
                                    <h3><?php the_title(); ?></h3>
                                </div>
                            </div>


                    <?php }
                } else {
                    // no posts found
                }

                // Restore original Post Data
                wp_reset_postdata();
                ?>

                        </div>
                    </div>
                </div>

            </div>
        </article>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
