<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hofris
 */

global $current_user, $wp_roles;

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

        <link rel="icon" type="image/jpg" href="<?php echo get_template_directory_uri(); ?>/favicon.jpg" />

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/media.css" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body <?php body_class(); ?>>
        <header>
            <div class="login-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-lg-offset-7">
                            <ul class="list-inline list-unstyled pull-right">
                                <?php
                                if (!is_user_logged_in()) :
                                 ?>
                                <li><a href="<?php echo home_url() ?>/login" id="logins">Login</a></li>
                                <li><a href="<?php echo home_url() ?>/daftar" id="registers">Register</a></li>
                                <?php else : ?>
                                <li><a href="<?php echo home_url() ?>/edit-profile/" title="">Selamat datang! <?php the_author_meta( 'first_name', $current_user->ID ); ?></a></li>
                                <li><a href="" title="">Logout</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <a href="<?php echo home_url(); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/hofris_logo.jpg" alt="Hofris" class="img-responsive"></a>
                    </div>
                    <div class="col-lg-9 col-xs-6">
                        <?php include "nav.php" ?>
                    </div>
                </div>
            </div>
        </header>
