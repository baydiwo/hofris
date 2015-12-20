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

    $dy = $_POST['tanggal_lahir'.'-dy'];
    $mo = $_POST['tanggal_lahir'.'-mo'];
    $yr = $_POST['tanggal_lahir'.'-yr'];
    $dateinput = implode('-', array($yr,$mo,$dy));
    update_user_meta($current_user->ID,'tanggal_lahir',$dateinput);

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
    if ( !empty( $_POST['last_name'] ) )
        update_user_meta( $current_user->ID, 'last_name', esc_attr( $_POST['last_name'] ) );
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
    // if ( !empty( $_POST['tanggal_lahir'] ) )
        // update_user_meta( $current_user->ID, 'tanggal_lahir', esc_attr( $_POST['tanggal_lahir'] ) );

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
                    	<div class="row register-page edit-profile-page">
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
                        <label for="username" class="control-label"><?php _e('Username', 'profile'); ?></label>
                        <input type="text" class="form-control" id="username" placeholder="username" name="username" value="<?php the_author_meta( 'username', $current_user->ID ); ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="first_name" class="control-label"><?php _e('Nama Awal', 'profile'); ?></label>
                        <input type="text" class="form-control" id="first_name" placeholder="Nama" name="first_name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>">
                    </div>

                    <div class="form-group">
                        <label for="last_name" class="control-label"><?php _e('Nama Akhir', 'profile'); ?></label>
                        <input type="text" class="form-control" id="last_name" placeholder="Nama" name="last_name" value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>">
                    </div>

                    <div class="form-group">
                        <label for="email" class="control-label"><?php _e('E-mail', 'profile'); ?></label>
                        <input type="text" class="form-control" id="email" placeholder="email" name="email" value="<?php the_author_meta( 'email', $current_user->ID ); ?>">
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir" class="control-label"><?php _e('Tanggal Lahir', 'profile'); ?></label>
                        <?php
                        // $saved_date = get_the_author_meta( 'tanggal_lahir', $current_user->ID );
                        // list($syear , $smonth , $sdate) = explode("-",$saved_date);
                        // echo $syear;
                        // echo $smonth;
                        // echo $sdate;

                        $list = get_the_author_meta( 'tanggal_lahir', $current_user->ID );;
                        if(!empty($list)) {
                            $list = explode('-',$list);
                            if ( isset($list[1]) ) { $lmo = $list[1]; } else { $lmo = ''; };
                            if ( isset($list[2]) ) { $ldy = $list[2]; } else { $ldy = ''; };
                            if ( isset($list[0]) ) { $lyr = $list[0]; } else { $lyr = ''; };

                        }
                        $years = $options_array;
                        if ( !is_array($years) || empty($years) || empty($years[0]) ) {
                            $years = array( (date('Y') - 50), date('Y') );
                        } ?>

                        <div class="simplr-clr"></div>
                        <div class="option-field date <?php echo apply_filters('tanggal_lahir'.'_error_class',''); ?>">
                        <select name="<?php echo 'tanggal_lahir'. '-mo'; ?>" id="<?php echo 'tanggal_lahir'. '-mo'; ?>" class="<?php echo @$class; ?>">
                            <option value=""><?php _e('Select Month...','simplr-registration-form'); ?></option>
                            <?php if ( !isset($lmo) ) { $lmo = ''; } ?>
                            <option value="01" <?php if($lmo == '01') {echo 'selected'; } ?>><?php _e('Jan','simplr-registration-form'); ?></option>
                            <option value="02" <?php if($lmo == '02') {echo 'selected'; } ?>><?php _e('Feb','simplr-registration-form'); ?></option>
                            <option value="03" <?php if($lmo == '03') {echo 'selected'; } ?>><?php _e('Mar','simplr-registration-form'); ?></option>
                            <option value="04" <?php if($lmo == '04') {echo 'selected'; } ?>><?php _e('Apr','simplr-registration-form'); ?></option>
                            <option value="05" <?php if($lmo == '05') {echo 'selected'; } ?>><?php _e('May','simplr-registration-form'); ?></option>
                            <option value="06" <?php if($lmo == '06') {echo 'selected'; } ?>><?php _e('Jun','simplr-registration-form'); ?></option>
                            <option value="07" <?php if($lmo == '07') {echo 'selected'; } ?>><?php _e('Jul','simplr-registration-form'); ?></option>
                            <option value="08" <?php if($lmo == '08') {echo 'selected'; } ?>><?php _e('Aug','simplr-registration-form'); ?></option>
                            <option value="09" <?php if($lmo == '09') {echo 'selected'; } ?>><?php _e('Sep','simplr-registration-form'); ?></option>
                            <option value="10" <?php if($lmo == '10') {echo 'selected'; } ?>><?php _e('Oct','simplr-registration-form'); ?></option>
                            <option value="11" <?php if($lmo == '11') {echo 'selected'; } ?>><?php _e('Nov','simplr-registration-form'); ?></option>
                            <option value="12" <?php if($lmo == '12') {echo 'selected'; } ?>><?php _e('Dec','simplr-registration-form'); ?></option>
                        </select>
                        <select name="<?php echo 'tanggal_lahir' . '-dy'; ?>" id="<?php echo 'tanggal_lahir'. '-dy'; ?>" class="<?php echo @$class; ?>">
                        <option value=""><?php _e('Select Day...','simplr-registration-form'); ?></option>
                        <?php $i = 1;
                        if ( !isset($ldy) ) { $ldy = ''; }
                        while($i <= 31) {
                            if($i == "$ldy") { $selected = 'selected'; } else { $selected = '';}
                            if($i < 10) {
                                $y = sprintf('%02d',$i);
                                echo '<option value="' .$y .'" ' .$selected .'>'.$y.'</option>';
                            } else {
                                echo '<option value="'.$i .'" ' .$selected .'>' .$i .'</option>';
                            }
                            $i++;
                        } ?>
                        </select>
                        <select name="<?php echo 'tanggal_lahir' . '-yr'; ?>" id="<?php echo 'tanggal_lahir'. '-yr'; ?>" class="<?php echo @$class; ?>">
                        <option value=""><?php _e('Select Year...','simplr-registration-form'); ?></option>
                        <?php $i = $years[0];
                        if ( !isset($lyr) ) { $lyr = ''; }
                        while($i >= $years[0] && $i <= $years[1]) {
                            if($i == "$lyr") { $selected = 'selected'; } else { $selected = '';}
                            echo '<option value="'.$i .'" ' .$selected .'>' .$i .'</option>'; $i++;
                        } ?>
                        </select>
                        </div>
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
                        <label for="password" class="control-label"><?php _e('Password', 'profile'); ?></label>
                        <input type="password" class="form-control" id="password" placeholder="password" name="password" value="<?php the_author_meta( 'password', $current_user->ID ); ?>">
                    </div>

                    <div class="form-group">
                        <label for="password2" class="control-label"><?php _e('Repeat Password *', 'profile'); ?></label>
                        <input type="password" class="form-control" id="password2" placeholder="re-type password" name="password2" value="<?php the_author_meta( 'password', $current_user->ID ); ?>">
                    </div>

                    <div class="form-group">
                        <label for="alamat_rumah" class="control-label"><?php _e('Alamat Rumah', 'profile'); ?></label>
                        <input type="text" class="form-control" id="alamat_rumah" placeholder="alamat_rumah" name="alamat_rumah" value="<?php the_author_meta( 'alamat_rumah', $current_user->ID ); ?>">
                    </div>

                    <div class="form-group">
                        <label for="kota" class="control-label"><?php _e('Kota', 'profile'); ?></label>
                        <!-- <input type="text" class="form-control" id="kota" placeholder="kota" name="kota" value="<?php the_author_meta( 'kota', $current_user->ID ); ?>"> -->
                        <select name="kota" id="kota" class="form-control">
                            <option value="<?php the_author_meta( 'kota', $current_user->ID ); ?>" selected><?php the_author_meta( 'kota', $current_user->ID ); ?></option>
                            <option value="Nanggroe Aceh Darussalam / NAD (Daerah Istimewa) Ibu Kota Banda Aceh ">Nanggroe Aceh Darussalam / NAD (Daerah Istimewa) Ibu Kota Banda Aceh </option>
                            <option value=" Sumatera Utara / Sumut (Medan) "> Sumatera Utara / Sumut (Medan) </option>
                            <option value=" Sumatera Barat / Sumbar (Padang) "> Sumatera Barat / Sumbar (Padang) </option>
                            <option value=" Bengkulu (Bengkulu) "> Bengkulu (Bengkulu) </option>
                            <option value=" Riau (Pekan Baru) "> Riau (Pekan Baru) </option>
                            <option value=" Kepulauan Riau / Kepri (Tanjung Pinang) "> Kepulauan Riau / Kepri (Tanjung Pinang) </option>
                            <option value=" Jambi (Jambi) "> Jambi (Jambi) </option>
                            <option value=" Sumatera Selatan / Sumsel (Palembang) "> Sumatera Selatan / Sumsel (Palembang) </option>
                            <option value=" Lampung (Bandar Lampung) "> Lampung (Bandar Lampung) </option>
                            <option value=" Kepulauan Bangka Belitung / Babel (Pangkal )Pinang "> Kepulauan Bangka Belitung / Babel (Pangkal )Pinang </option>
                            <option value=" DKI Jakarta / Daerah Khusus Ibu Kota Jakarta (Jakarta) "> DKI Jakarta / Daerah Khusus Ibu Kota Jakarta (Jakarta) </option>
                            <option value=" Jawa Barat / Jabar (Bandung) "> Jawa Barat / Jabar (Bandung) </option>
                            <option value=" Banten (Serang) "> Banten (Serang) </option>
                            <option value=" Jawa Tengah / Jateng (Semarang) "> Jawa Tengah / Jateng (Semarang) </option>
                            <option value=" DI Yogyakarta / Daerah Istimewa Yogyakarta (Yogyakarta) "> DI Yogyakarta / Daerah Istimewa Yogyakarta (Yogyakarta) </option>
                            <option value=" Jawa Timur / Jatim (Surabaya) "> Jawa Timur / Jatim (Surabaya) </option>
                            <option value=" Kalimantan Barat / Kalbar (Pontianak) "> Kalimantan Barat / Kalbar (Pontianak) </option>
                            <option value=" Kalimantan Tengah / Kalteng (Palangkaraya) "> Kalimantan Tengah / Kalteng (Palangkaraya) </option>
                            <option value=" Kalimantan Selatan / Kalsel (Banjarmasin) "> Kalimantan Selatan / Kalsel (Banjarmasin) </option>
                            <option value=" Kalimantan Timur / Kaltim (Samarinda) "> Kalimantan Timur / Kaltim (Samarinda) </option>
                            <option value=" Bali (Denpasar) "> Bali (Denpasar) </option>
                            <option value=" Nusa Tenggara Barat (Mataram) "> Nusa Tenggara Barat (Mataram) </option>
                            <option value=" Nusa Tenggara Timur (Kupang) "> Nusa Tenggara Timur (Kupang) </option>
                            <option value=" Sulawesi Barat / Sulbar (Mamuju) "> Sulawesi Barat / Sulbar (Mamuju) </option>
                            <option value=" Sulawesi Utara / Sulut (Manado) "> Sulawesi Utara / Sulut (Manado) </option>
                            <option value=" Sulawesi Tengah / Sulteng (Palu) "> Sulawesi Tengah / Sulteng (Palu) </option>
                            <option value=" Sulawesi Selatan / Sulsel (Makasar) "> Sulawesi Selatan / Sulsel (Makasar) </option>
                            <option value=" Sulawesi Tenggara / Sultra (Kendari) "> Sulawesi Tenggara / Sultra (Kendari) </option>
                            <option value=" Gorontalo (Gorontalo) "> Gorontalo (Gorontalo) </option>
                            <option value=" Maluku (Ambon) "> Maluku (Ambon) </option>
                            <option value=" Maluku Utara (Ternate) "> Maluku Utara (Ternate) </option>
                            <option value=" Papua Barat (Sorong) "> Papua Barat (Sorong) </option>
                            <option value=" Papua / Daerah Khusus (Jayapura) "> Papua / Daerah Khusus (Jayapura) </option>
                            <option value=" Papua Barat / Daerah Khusus (Manokwari) "> Papua Barat / Daerah Khusus (Manokwari) </option>
                            <option value=" Kepulauan Riau "> Kepulauan Riau </option>
                            <option value=" Kepulauan Bangka Belitung "> Kepulauan Bangka Belitung </option>
                            <option value=" Banten "> Banten </option>
                            <option value=" Gorontalo "> Gorontalo </option>
                            <option value=" Maluku Utara "> Maluku Utara </option>
                            <option value=" Papua Barat"> Papua Barat</option>
                        </select>
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
