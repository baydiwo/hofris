<?php
/**
 * Template Name: Form template
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

global $user_login;

if ( !is_user_logged_in() ) {
    echo '
<div class="over-wrap">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="panel panel-default warning">
                    <div class="panel-body">
                        <h2>Silahkan daftar untuk mengakses halaman ini</h2> <br>
                        <h4><a href="'.home_url().'/daftar/" title="Daftar">Daftar</a> atau <a href="'.home_url().'/login" title="Login">Login</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    ';
}

get_header(); ?>
	<article class="content">
            <div class="container">
                <?php the_breadcrumb(); ?>

				<?php while ( have_posts() ) : the_post(); ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <h1 align="center"><?php the_title(); ?></h1>
                    </div>
                    <div class="col-lg-12">
                    	<div class="row register-page">
                    		<div class="col-md-6 col-md-offset-3">
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
