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

/* Get user info. */

//get_currentuserinfo(); //deprecated since 3.1

/* Load the registration file. */
//require_once( ABSPATH . WPINC . '/registration.php' ); //deprecated since 3.1
$error = array();
/* If profile was saved, update profile. */
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {

    /* Update user password. */
    if ( !empty($_POST['password'] ) && !empty( $_POST['password2'] ) ) {
        if ( $_POST['password'] == $_POST['password2'] )
            wp_update_user( array( 'ID' => $current_user->ID, 'user_pass' => esc_attr( $_POST['password'] ) ) );
        else
            $error[] = __('The passwords you entered do not match.  Your password was not updated.', 'profile');
    }

    /* Update user information. */
    if ( !empty( $_POST['url'] ) )
        wp_update_user( array( 'ID' => $current_user->ID, 'user_url' => esc_url( $_POST['url'] ) ) );
    if ( !empty( $_POST['email'] ) ){
        if (!is_email(esc_attr( $_POST['email'] )))
            $error[] = __('The Email you entered is not valid.  please try again.', 'profile');
        elseif(email_exists(esc_attr( $_POST['email'] )) != $current_user->id )
            $error[] = __('This email is already used by another user.  try a different one.', 'profile');
        else{
            wp_update_user( array ('ID' => $current_user->ID, 'user_email' => esc_attr( $_POST['email'] )));
        }
    }

    if ( !empty( $_POST['first_name'] ) )
        update_user_meta( $current_user->ID, 'first_name', esc_attr( $_POST['first_name'] ) );
    if ( !empty( $_POST['username'] ) )
        update_user_meta( $current_user->ID, 'username', esc_attr( $_POST['username'] ) );
    if ( !empty( $_POST['jenis_kelamin'] ) )
        update_user_meta( $current_user->ID, 'jenis_kelamin', esc_attr( $_POST['jenis_kelamin'] ) );
    if ( !empty( $_POST['no_handphone'] ) )
        update_user_meta($current_user->ID, 'no_handphone', esc_attr( $_POST['no_handphone'] ) );
    if ( !empty( $_POST['no_telp_rumah'] ) )
        update_user_meta( $current_user->ID, 'no_telp_rumah', esc_attr( $_POST['no_telp_rumah'] ) );
    if ( !empty( $_POST['email'] ) )
        update_user_meta( $current_user->ID, 'email', esc_attr( $_POST['email'] ) );
    if ( !empty( $_POST['tanggal_lahir'] ) )
        update_user_meta( $current_user->ID, 'tanggal_lahir', esc_attr( $_POST['tanggal_lahir'] ) );
    if ( !empty( $_POST['alamat_rumah'] ) )
        update_user_meta( $current_user->ID, 'alamat_rumah', esc_attr( $_POST['alamat_rumah'] ) );
    if ( !empty( $_POST['kota'] ) )
        update_user_meta( $current_user->ID, 'kota', esc_attr( $_POST['kota'] ) );


    /* Redirect so the page will show updated info.*/
  /*I am not Author of this Code- i dont know why but it worked for me after changing below line to if ( count($error) == 0 ){ */
    if ( count($error) == 0 ) {
        //action hook for plugins and extra fields saving
        do_action('edit_user_profile_update', $current_user->ID);
        wp_redirect( get_permalink() );
        exit;
    }
}

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
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>">
        <div class="entry-content entry">
            <?php the_content(); ?>
            <?php if ( !is_user_logged_in() ) : ?>
                    <p class="warning">
                        <?php _e('You must be logged in to edit your profile.', 'profile'); ?>
                    </p><!-- .warning -->
            <?php else : ?>
                <?php if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>
                <form method="post" id="adduser" action="<?php the_permalink(); ?>">

                    <div class="form-group">
                        <label for="first_name" class="control-label"><?php _e('Nama', 'profile'); ?></label>
                        <input type="text" class="form-control" id="first_name" placeholder="Nama" name="first_name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>">
                    </div>

                    <div class="form-group">
                        <label for="email" class="control-label"><?php _e('E-mail', 'profile'); ?></label>
                        <input type="text" class="form-control" id="email" placeholder="email" name="email" value="<?php the_author_meta( 'email', $current_user->ID ); ?>">
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir" class="control-label"><?php _e('Tanggal Lahir', 'profile'); ?></label>
                        <input type="text" class="form-control" id="tanggal_lahir" placeholder="Nama" name="tanggal_lahir" value="<?php the_author_meta( 'tanggal_lahir', $current_user->ID ); ?>">
                    </div>

                    <div class="form-group">
                        <label for="Jenis_Kelamin" class="control-label"><?php _e('Jenis Kelamin', 'profile'); ?></label>
                        <input type="text" class="form-control" id="Jenis_Kelamin" placeholder="Nama" name="jenis_kelamin" value="<?php the_author_meta( 'jenis_kelamin', $current_user->ID ); ?>">
                    </div>

                    <div class="form-group">
                        <label for="no_handphone" class="control-label"><?php _e('No Handphone', 'profile'); ?></label>
                        <input type="text" class="form-control" id="no_handphone" placeholder="no_handphone" name="no_handphone" value="<?php the_author_meta( 'no_handphone', $current_user->ID ); ?>">
                    </div>

                    <div class="form-group">
                        <label for="no_telp_rumah" class="control-label"><?php _e('No Telp Rumah', 'profile'); ?></label>
                        <input type="text" class="form-control" id="no_telp_rumah" placeholder="no_telp_rumah" name="no_telp_rumah" value="<?php the_author_meta( 'no_telp_rumah', $current_user->ID ); ?>">
                    </div>

                    <div class="form-group">
                        <label for="username" class="control-label"><?php _e('Username', 'profile'); ?></label>
                        <input type="text" class="form-control" id="username" placeholder="username" name="username" value="<?php the_author_meta( 'username', $current_user->ID ); ?>">
                    </div>

                    <div class="form-group">
                        <label for="password" class="control-label"><?php _e('Password', 'profile'); ?></label>
                        <input type="text" class="form-control" id="password" placeholder="password" name="password" value="<?php the_author_meta( 'password', $current_user->ID ); ?>">
                    </div>

                    <div class="form-group">
                        <label for="password" class="control-label"><?php _e('Repeat Password *', 'profile'); ?></label>
                        <input type="password" class="form-control" id="password" placeholder="password" name="password2" value="<?php the_author_meta( 'password', $current_user->ID ); ?>">
                    </div>

                    <div class="form-group">
                        <label for="alamat_rumah" class="control-label"><?php _e('Alamat Rumah', 'profile'); ?></label>
                        <input type="text" class="form-control" id="alamat_rumah" placeholder="alamat_rumah" name="alamat_rumah" value="<?php the_author_meta( 'alamat_rumah', $current_user->ID ); ?>">
                    </div>

                    <div class="form-group">
                        <label for="kota" class="control-label"><?php _e('Kota', 'profile'); ?></label>
                        <input type="text" class="form-control" id="kota" placeholder="kota" name="kota" value="<?php the_author_meta( 'kota', $current_user->ID ); ?>">
                    </div>

                    <?php
                        //action hook for plugin and extra fields
                        do_action('edit_user_profile',$current_user);
                    ?>
                    <p class="form-submit">
                        <?php echo $referer; ?>
                        <input name="updateuser" type="submit" id="updateuser" class="submit button" value="<?php _e('Update', 'profile'); ?>" />
                        <?php wp_nonce_field( 'update-user' ) ?>
                        <input name="action" type="hidden" id="action" value="update-user" />
                    </p><!-- .form-submit -->
                </form><!-- #adduser -->
            <?php endif; ?>
        </div><!-- .entry-content -->
    </div><!-- .hentry .post -->
    <?php endwhile; ?>
<?php else: ?>
    <p class="no-data">
        <?php _e('Sorry, no page matched your criteria.', 'profile'); ?>
    </p><!-- .no-data -->
<?php endif; ?>
                    		</div>
                    	</div>
                    </div>
                </div>


            </div>
        </article>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
