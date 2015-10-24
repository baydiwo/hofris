<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
                        <!-- <a class="cat-title"><?php the_category(); ?></a> -->
                        <h1><?php the_title(); ?></h1>
                        <?php $image = get_field('image'); ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <aside>
                            <?php the_field('blockquotes') ?>
                        </aside>
                    </div>
                    <div class="col-lg-8">
                        <main>
                            <?php the_content(); ?>
                        </main>
                    </div>
                </div>
                <?php endwhile; // End of the loop. ?>


            </div>
        </article>

<?php get_footer(); ?>
