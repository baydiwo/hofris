<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Hofris
 */

get_header(); ?>

		<article class="content">
            <div class="container">
                <?php the_breadcrumb(); ?>

                <div class="row">
                	<div class="col-lg-12">
                		<section class="error-404 not-found">
							<header class="page-header">
								<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'hofris' ); ?></h1>
							</header><!-- .page-header -->

							<div class="page-content">
								<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'hofris' ); ?></p>

								<?php
									get_search_form();

									the_widget( 'WP_Widget_Recent_Posts' );

									// Only show the widget if site has multiple categories.
									// if ( hofris_categorized_blog() ) :
								?>

								<div class="widget widget_categories">
									<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'hofris' ); ?></h2>
									<ul>
									<?php
										wp_list_categories( array(
											'orderby'    => 'count',
											'order'      => 'DESC',
											'show_count' => 1,
											'title_li'   => '',
											'number'     => 10,
										) );
									?>
									</ul>
								</div><!-- .widget -->

								<?php
									// endif;

									/* translators: %1$s: smiley */
									$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'hofris' ), convert_smilies( ':)' ) ) . '</p>';

								?>

							</div><!-- .page-content -->
						</section><!-- .error-404 -->
                	</div>
                </div>

            </div>
        </article>

<?php get_footer(); ?>
