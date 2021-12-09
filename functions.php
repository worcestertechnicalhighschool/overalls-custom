<?php
/**
 * Overalls custom functions
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * 
 */


function overalls_setup() {
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

    register_nav_menus(
        array( 
            'menu-1' => 'Primary',
            'menu-2' => 'Secondary Menu',
        )
    );

    /*
    * Switch default core markup for search form, comment form, and comments
    * to output valid HTML5.
    */
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

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

}
add_action( 'after_setup_theme', 'overalls_setup' );

//add post-formats to post_type 'my_custom_post_type'
add_post_type_support( 'my_custom_post_type', 'post-formats' );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function job_board_custom_widgets_init() {
    register_sidebar(
        array(
            'name'          => 'Body Widgets',
            'id'            => 'sidebar-2',
            'description'   => 'Add widgets here.',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
	register_sidebar(
		array(
			'name'          => 'Footer Widgets',
			'id'            => 'sidebar-1',
			'description'   => 'Add widgets here.',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'job_board_custom_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function job_board_custom_scripts() {
	wp_enqueue_style( 
        'overalls-custom-style', 
        get_stylesheet_uri(), 
        array() 
    );

	wp_style_add_data( 'overalls-custom-style', 'rtl', 'replace' );

}
add_action( 'wp_enqueue_scripts', 'job_board_custom_scripts' );

// Add SVG Support
function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function fix_svg() {
	echo '<style type="text/css">
		  .attachment-266x266, .thumbnail img {
			   width: 100% !important;
			   height: auto !important;
		  }
		  </style>';
}
add_action( 'admin_head', 'fix_svg' );



// add_post_type_support( 'page', 'post-formats' );
?>
