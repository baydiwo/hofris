<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hofris
 */

?>
<footer>
    <div class="container">
        <div class="goingup">
            <a id="upup" class="upup"><img src="<?php echo get_template_directory_uri(); ?>/img/upup.jpg" height="93" width="91" alt=""></a>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xs-6 col-md-4 col-sm-4">
                <div class="sitemap">
                    <?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'main-menu' , 'menu_class' => '', 'items_wrap'      => '<ul class="list-unstyled footer-menu" id="%1$s" class="%2$s">%3$s</ul>', ) ); ?>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6 col-md-4 col-sm-4">
                <div class="connect">
                    connect with hofris <br>
                    <a href="https://www.facebook.com/Hofris-House-of-Ristra-114305491979060/" target="_blank"><i class="fa fa-facebook-square"></i></a>&nbsp;&nbsp;<a href="https://twitter.com/Hofris" target="_blank"><i class="fa fa-twitter-square"></i></a>&nbsp;&nbsp;<a href="https://instagram.com/hofris/" target="_blank"><i class="fa fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-12 col-md-4 col-sm-4">
                <div class="subscribe">
                    <?php echo do_shortcode('[contact-form-7 id="57" title="Subscribe"]'); ?>
                </div>
            </div>
            <div class="col-lg-12 col-xs-12">
                <div class="copyright">
                    <p>copyright 2015 &copy; hofris</p>
                </div>
            </div>
        </div>
    </div>
</footer>

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.nivo.slider.pack.js" type="text/javascript"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.colorbox-min.js" type="text/javascript"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.sidr.min.js" type="text/javascript"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>

        <div id="sidr">
            <?php wp_nav_menu( array('theme_location' => 'primary')); ?>
        </div>

        <?php wp_footer(); ?>
    </body>
</html>
