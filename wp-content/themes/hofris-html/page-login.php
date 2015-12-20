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

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <h1 align="center"><?php the_title(); ?></h1>
                    </div>
                    <div class="col-lg-12">
                    	<div class="row register-page">
                    		<div class="col-md-6 col-md-offset-3">
                    			<?php
                                global $user_login;
                                $args = array(
                                 'echo'           => true,
                                 'redirect' => site_url( 'edit-profile' ),
                                 'form_id'        => 'loginform',
                                 'label_username' => __( 'Username' ),
                                 'label_password' => __( 'Password' ),
                                 'label_remember' => __( 'Remember Me' ),
                                 'label_log_in'   => __( 'Log In' ),
                                 'id_username'    => 'user_login',
                                 'id_password'    => 'user_pass',
                                 'id_remember'    => 'rememberme',
                                 'id_submit'      => 'wp-submit',
                                 'remember'       => true,
                                 'value_username' => NULL,
                                 'value_remember' => true
                                 );

                                if(isset($_GET['login']) && $_GET['login'] == 'failed') { ?>
                                    <div class="alert alert-danger" role="alert">Username dan Password anda salah!</div>

                                <?php }
                                if (is_user_logged_in()) {
                                    echo '<div class="aa_logout"> Hello, <div class="aa_logout_user">', $user_login, '. You are already logged in.</div><a id="wp-submit" href="', wp_logout_url(), '" title="Logout">Logout</a></div>';
                                } else {
                                    wp_login_form($args);
                                } ?>
                    		</div>
                    	</div>
                    </div>
                </div>


            </div>
        </article>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
