<div id="main-nav">
    <?php    /**
        * Displays a navigation menu
        * @param array $args Arguments
        */
        $args = array(
            'theme_location' => 'primary',
            'menu' => '',
            'container' => 'nav',
            'container_class' => '',
            'container_id' => 'primary-nav',
            'menu_class' => 'list-unstyled list-inline',
            'menu_id' => '',
            'echo' => true,
            'fallback_cb' => 'wp_page_menu',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
            'depth' => 0,
            'walker' => ''
        );

        wp_nav_menu( $args ); ?>
</div>
<div id="mobile-header" class="pull-right">
    <a id="mobile-menu" class="pull-right" ><i class="fa fa-bars"></i></a>
</div>
