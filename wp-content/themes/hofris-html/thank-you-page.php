<?php
/**
 * Template Name: Thank you template
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

				<?php while ( have_posts() ) : the_post(); ?>
                <div class="row">
                    <div class="col-lg-12">
                    	<?php the_content(); ?>
                    </div>
                </div>

                <?php endwhile; // End of the loop. ?>


            </div>
        </article>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
