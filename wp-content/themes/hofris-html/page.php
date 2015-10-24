<?php
/**
 * The template for displaying all pages.
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
                        <h1><?php the_title(); ?></h1>
                    </div>
                    <div class="col-lg-12">
                    	<div class="row register-page">
                    		<div class="col-md-6">
                    			<?php the_content(); ?>
                    		</div>
                    	</div>
                    </div>
                </div>

                <?php endwhile; // End of the loop. ?>


            </div>
        </article>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
