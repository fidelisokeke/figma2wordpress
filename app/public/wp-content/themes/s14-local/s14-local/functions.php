<?php
/**
 * s14.local functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package s14.local
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function s14_local_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on s14.local, use a find and replace
		* to change 's14-local' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 's14-local', get_template_directory() . '/languages' );

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
	// register_nav_menus( array(
		//'top_menu' => esc_html__( 'Top Bar Menu',    's14-local' ),
		//'primary'  => esc_html__( 'Primary Menu',     's14-local' ),
		//'header_buttons' => esc_html__( 'Header Buttons',   's14-local' ),
	//) );

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
 register_nav_menu('headerMenuLocation', 'Header Menu Location');
 register_nav_menu('headerButtons', 'Header Buttons');
 register_nav_menu('topbarButtons', 'Top Bar Buttons');
 /**
 * Prepend a search icon to the "Search" item in the Top Bar menu.
 *
 * @param string   $title     
 * @param WP_Post  $menu_item 
 * @param stdClass $args      
 * @param int      $depth     
 * @return string             
 */
function s14_local_topbar_search_icon( $title, $menu_item, $args, $depth ) {
    
    if ( 'topbarButtons' === $args->theme_location && stripos( $title, 'Search' ) !== false ) {
        // Prepend a Font Awesome search icon
        $title = '<i class="fas fa-search" aria-hidden="true"></i> ' . $title;
    }
    return $title;
}
add_filter( 'nav_menu_item_title', 's14_local_topbar_search_icon', 10, 4 );

 register_nav_menu('footer_sitemap', 'Footer Site Map Buttons');
 
 
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	//  WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			's14_local_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 's14_local_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

function s14_local_content_width() {
	$GLOBALS['content_width'] = apply_filters( 's14_local_content_width', 640 );
}
add_action( 'after_setup_theme', 's14_local_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function s14_local_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 's14-local' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 's14-local' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
			
		)
	);
}
add_action( 'widgets_init', 's14_local_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function s14_local_scripts() {
	wp_enqueue_style( 's14-local-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style(
		'header-style',                                            
		get_stylesheet_directory_uri() . '/assets/css/header.css', 
		array(),                                                   
		filemtime( get_stylesheet_directory() . '/assets/css/header.css' ) 
	  );
	  wp_enqueue_style(
		'body-style',                                            
		get_stylesheet_directory_uri() . '/assets/css/body.css', 
		array(),                                                   
		filemtime( get_stylesheet_directory() . '/assets/css/body.css' ) 
	  );
	  wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );

	  wp_enqueue_style(
		'footer-style',                                            
		get_stylesheet_directory_uri() . '/assets/css/footer.css', 
		array(),                                                   
		filemtime( get_stylesheet_directory() . '/assets/css/footer.css' ) 
	  );
	
	wp_style_add_data( 's14-local-style', 'rtl', 'replace' );

	wp_enqueue_script( 's14-local-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

function s14_local_footer_widgets() {
	
	register_sidebar( array(
	  'name'          => __( 'Footer “About”', 's14-local' ),
	  'id'            => 'footer-about',
	  'before_widget' => '<div class="footer-col footer-col--about widget %2$s" id="%1$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h4>',
	  'after_title'   => '</h4>',
	) );
	register_sidebar( array(
	  'name'          => __( 'Footer “Contact”', 's14-local' ),
	  'id'            => 'footer-contact',
	  'before_widget' => '<div class="footer-col footer-col--contact widget %2$s" id="%1$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h4>',
	  'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Social', 's14-local' ),
		'id'            => 'footer-social',
		'before_widget' => '<div class="footer-col footer-col--follow widget %2$s" id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	// Footer Bottom
	register_sidebar( array(
		'name'          => __( 'Footer Bottom', 's14-local' ),
		'id'            => 'footer-bottom',
		'before_widget' => '<div class="site-footer__bottom widget %2$s" id="%1$s"><div class="container footer-container">',
		'after_widget'  => '</div></div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	
  }
  
  add_action( 'widgets_init', 's14_local_footer_widgets' );
  
add_action( 'wp_enqueue_scripts', 's14_local_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

