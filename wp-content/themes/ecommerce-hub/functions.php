<?php
/**
 * Ecommerce Hub functions and definitions
 * @package Ecommerce Hub
 */

/* Breadcrumb Begin */
function ecommerce_hub_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url( home_url() );
		echo '">';
			bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			the_category(',');
			if (is_single()) {
				echo "<span> ";
					the_title();
				echo "</span> ";
			}
		} elseif (is_page()) {
			the_title();
		}
	}
}

/* Theme Setup */
if ( ! function_exists( 'ecommerce_hub_setup' ) ) :

function ecommerce_hub_setup() {

	$GLOBALS['content_width'] = apply_filters( 'ecommerce_hub_content_width', 640 );
	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('ecommerce-hub-homepage-thumb',240,145,true);
	
    register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ecommerce-hub' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', ecommerce_hub_font_url() ) );

}
endif;
add_action( 'after_setup_theme', 'ecommerce_hub_setup' );

/* Theme Widgets Setup */
function ecommerce_hub_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'ecommerce-hub' ),
		'description'   => __( 'Appears on blog page sidebar', 'ecommerce-hub' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'ecommerce-hub' ),
		'description'   => __( 'Appears on page sidebar', 'ecommerce-hub' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'ecommerce-hub' ),
		'description'   => __( 'Appears on page sidebar', 'ecommerce-hub' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'ecommerce-hub' ),
		'description'   => __( 'Appears on footer', 'ecommerce-hub' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'ecommerce-hub' ),
		'description'   => __( 'Appears on footer', 'ecommerce-hub' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'ecommerce-hub' ),
		'description'   => __( 'Appears on footer', 'ecommerce-hub' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'ecommerce-hub' ),
		'description'   => __( 'Appears on footer', 'ecommerce-hub' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'ecommerce_hub_widgets_init' );

/* Theme Font URL */
function ecommerce_hub_font_url() {
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Josefin Sans:100,100i,300,300i,400,400i,600,600i,700,700i';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

/*radio button sanitization*/
 function ecommerce_hub_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Excerpt Limit Begin */
function ecommerce_hub_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'ecommerce_hub_loop_columns');
	if (!function_exists('ecommerce_hub_loop_columns')) {
	function ecommerce_hub_loop_columns() {
		return 3; // 3 products per row
	}
}

/* Theme enqueue scripts */
function ecommerce_hub_scripts() {
	wp_enqueue_style( 'ecommerce-hub-font', ecommerce_hub_font_url(), array() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'ecommerce-hub-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'ecommerce-hub-style', 'rtl', 'replace' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/fontawesome-all.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri().'/css/animate.css' );
	wp_enqueue_script( 'ecommerce-hub-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_style('ecommerce-hub-ie', get_template_directory_uri().'/css/ie.css', array('ecommerce-hub-basic-style'));
	wp_style_add_data( 'ecommerce-hub-ie', 'conditional', 'IE' );
}
add_action( 'wp_enqueue_scripts', 'ecommerce_hub_scripts' );

/* Theme Credit link */
define('ECOMMERCE_HUB_SITE_URL','https://www.themesglance.com/themes/free-wordpress-ecommerce-theme/','ecommerce-hub');

function ecommerce_hub_credit_link() {
    echo "<a href=".esc_url(ECOMMERCE_HUB_SITE_URL)." target='_blank'>".esc_html__('Ecommerce WordPress Theme','ecommerce-hub')."</a>";
}

function ecommerce_hub_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';