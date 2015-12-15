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
            <div class="col-lg-4 col-xs-6">
                <div class="sitemap">
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'main-menu' , 'menu_class' => ' ', 'items_wrap'      => '<ul class="list-unstyled" id="%1$s" class="%2$s">%3$s</ul>', ) ); ?>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <div class="connect">
                    connect with hofris <br>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/shares.jpg" height="40" width="94" alt="">
                </div>
            </div>
            <div class="col-lg-4 col-xs-12">
                <div class="subscribe">
                    join our hofris email newsletter <br>
                    <!-- <div class="input-group">
                        <input type="text" class="form-control" aria-label="...">
                        <div class="input-group-btn">
                            <input type="submit" class="btn subscribe">
                        </div>
                    </div> -->
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
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- Bootstrap JavaScript -->
        <!-- <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script> -->
        <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.nivo.slider.pack.js" type="text/javascript"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>

        <?php wp_footer(); ?>
    </body>
</html>
