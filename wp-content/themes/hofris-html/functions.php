<?php
/**
 * hofris functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package hofris
 */

if ( ! function_exists( 'hofris_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hofris_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on hofris, use a find and replace
	 * to change 'hofris' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'hofris', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'hofris' ),
		'footer' => esc_html__( 'Footer Menu', 'hofris' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'hofris_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // hofris_setup
add_action( 'after_setup_theme', 'hofris_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hofris_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hofris_content_width', 640 );
}
add_action( 'after_setup_theme', 'hofris_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hofris_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'hofris' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'hofris_widgets_init' );

require_once('inc/BFI_Thumb.php');


function the_breadcrumb() {
		echo '<div class="row">
    			<div class="col-lg-12">
        			<ol class="breadcrumb">';
	if (!is_home()) {
		echo '<li><a href="';
		echo get_option('home');
		echo '">';
		echo 'Home';
		echo "</a></li>";
		if (is_category() || is_single()) {
			echo '<li>';
			the_category(' </li><li> ');
			if (is_single()) {
				echo "</li><li>";
				the_title();
				echo '</li>';
			}
		} elseif (is_page()) {
			echo '<li>';
			echo the_title();
			echo '</li>';
		}
	}
	elseif (is_tag()) {single_tag_title();}
	elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
	elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
	elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
	elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
	elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
	elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
	echo '</ol>
    </div>
</div>';
}

/**
 * [category_pagination description]
 * @param  [type] $query [description]
 * @return [type]        [description]
 */
function category_pagination( $query ) {
    if ( $query->is_category() && $query->is_main_query() )
        $query->set( 'posts_per_page', 6 );
}
add_action( 'pre_get_posts', 'category_pagination' );

/*
	Mobile Navigation Function
 */
function mobile_second_nav() {
    global $post;
    $menu_name = 'Article'; // specify custom menu slug
    $menu = wp_get_nav_menu_object($menu_name);

    if ($menu) {
        $menu_items = wp_get_nav_menu_items($menu->term_id);

        $menu_list = "\n". '' ."\n";
        $menu_list .= '' ."\n";
        foreach ((array) $menu_items as $key => $menu_item) {
            $title = $menu_item->title;
            $url = $menu_item->url;

            //$menu_list .= "  ". '<a class="'.strtolower($menu_item->title).' ';
            // var_dump($menu_item->object_id);
            // var_dump($post->ID);

            if (is_single($menu_item->object_id) == $post->ID ) {
                // $menu_list .= $title.'"';
                //$menu_list .= 'active';
            }

            //$menu_list .= '><a href="'. $url .'">'. $title .'</a>' ."\n";
            $menu_list .= '
            <a href="'.$url.'">
                '.$title.'
            </a>
            '."\n";
            $menu_list .= ''."\n";
        }
        $menu_list .= '' ."\n";
        $menu_list .= '' ."\n";
    } else {
        $menu_list = '<!-- no list defined -->';
    }

    echo $menu_list;
}


function the_category_hook( $separator = '', $parents='', $post_id = false ) {
	echo get_the_category_list_hook( $separator, $parents, $post_id );
}

function get_the_category_list_hook( $separator = '', $parents='', $post_id = false ) {
	        global $wp_rewrite;
	        if ( ! is_object_in_taxonomy( get_post_type( $post_id ), 'category' ) ) {
               /** This filter is documented in wp-includes/category-template.php */
	                return apply_filters( 'the_category_hook', '', $separator, $parents );
	        }

	        $categories = get_the_category( $post_id );
	        if ( empty( $categories ) ) {
	                /** This filter is documented in wp-includes/category-template.php */
	                return apply_filters( 'the_category_hook', __( ' ' ), $separator, $parents );
	        }

       $rel = ( is_object( $wp_rewrite ) && $wp_rewrite->using_permalinks() ) ? 'rel="category tag"' : 'rel="category"';

	        $thelist = '';
	        if ( '' == $separator ) {
	                $thelist .= '<ul class="post-categories">';
	                foreach ( $categories as $category ) {
	                        $thelist .= "\n\t<li>";
	                        switch ( strtolower( $parents ) ) {
	                                case 'multiple':
	                                        if ( $category->parent )
                                               $thelist .= get_category_parents( $category->parent, true, $separator );
	                                        $thelist .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" ' . $rel . '>' . $category->name.'</a></li>';
	                                        break;
	                                case 'single':
	                                        $thelist .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '"  ' . $rel . '><h3>';
	                                        if ( $category->parent )
	                                                $thelist .= get_category_parents( $category->parent, false, $separator );
	                                        $thelist .= $category->name.'</h3></a></li>';
	                                        break;
	                                case '':
	                                default:
                                       $thelist .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" ' . $rel . '>' . $category->name.'</a></li>';
	                        }
	                }
	                $thelist .= '</ul>';
	        } else {
	                $i = 0;
	                foreach ( $categories as $category ) {
	                        if ( 0 < $i )
	                                $thelist .= $separator;
	                        switch ( strtolower( $parents ) ) {
                               case 'multiple':
	                                        if ( $category->parent )
	                                                $thelist .= get_category_parents( $category->parent, true, $separator );
	                                        $thelist .= '<li><a href="' . esc_url( get_category_link( $category->term_id ) ) . '" ' . $rel . '><h3>' . $category->name.'</h3></a></li>';
	                                        break;
	                                case 'single':
	                                        $thelist .= '<li><a href="' . esc_url( get_category_link( $category->term_id ) ) . '" ' . $rel . '><h3>';
	                                        if ( $category->parent )
                                                $thelist .= get_category_parents( $category->parent, false, $separator );
                                        $thelist .= "$category->name</h3></a></li>";
                                       break;
                                case '':
                                default:
                                        $thelist .= '<li><a href="' . esc_url( get_category_link( $category->term_id ) ) . '" ' . $rel . '><h3>' . $category->name.'</h3></a></li>';
                        }
                        ++$i;
                }
        }

	        /**
        * Filter the category or list of categories.
	         *
	         * @since 1.
	         *
	         * @param array  $thelist   List of categories for the current post.
	         * @param string $separator Separator used between the categories.
	         * @param string $parents   How to display the category parents. Accepts 'multiple',
	         *                          'single', or empty.
	         */
	        return apply_filters( 'the_category_hook', $thelist, $separator, $parents );
	}

//change sub menu class
class My_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
  }
}

//stop redirect to wp-login if fail
add_action( 'wp_login_failed', 'pu_login_failed' ); // hook failed login

function pu_login_failed( $user ) {
    // check what page the login attempt is coming from
    $referrer = $_SERVER['HTTP_REFERER'];

    // check that were not on the default login page
    if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') && $user!=null ) {
        // make sure we don't already have a failed login attempt
        if ( !strstr($referrer, '?login=failed' )) {
            // Redirect to the login page and append a querystring of login failed
            wp_redirect( $referrer . '?login=failed');
        } else {
            wp_redirect( $referrer );
        }

        exit;
    }
}

add_action( 'authenticate', 'pu_blank_login');

function pu_blank_login( $user ){
    // check what page the login attempt is coming from
    $referrer = $_SERVER['HTTP_REFERER'];

    $error = false;

    if($_POST['log'] == '' || $_POST['pwd'] == '')
    {
        $error = true;
    }

    // check that were not on the default login page
    if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') && $error ) {

        // make sure we don't already have a failed login attempt
        if ( !strstr($referrer, '?login=failed') ) {
            // Redirect to the login page and append a querystring of login failed
            wp_redirect( $referrer . '?login=failed' );
        } else {
            wp_redirect( $referrer );
        }

    exit;

    }
}

// remove admin bar except administrator
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}
