<?php
/**
 * africasafaritours functions and definitions
 *
 * @package Africa Safari Tours
 */

if ( ! function_exists( 'africasafaritours_setup' ) ) :

	function africasafaritours_setup() {

		load_theme_textdomain( 'africasafaritours', get_template_directory() . '/languages' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;

add_action( 'after_setup_theme', 'africasafaritours_setup' );

remove_action('wp_head', 'print_emoji_detection_script', 7);

remove_action('wp_print_styles', 'print_emoji_styles');

require_once ('custom-post-types.php');

require_once ('custom-taxonomies.php');

function africasafaritours_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'africasafaritours_content_width', 640 );
}
add_action( 'after_setup_theme', 'africasafaritours_content_width', 0 );

/** = Enqueue scripts and styles. Another just for the dev branch. = */ 
function africasafaritours_scripts() {
	wp_enqueue_style( 'africasafaritours-style', get_stylesheet_uri() );
	
	//wp_enqueue_style( 'africasafaritours-theme-style', get_template_directory_uri() . '/main.css', array() );
	
	wp_enqueue_script( 'africasafaritours-bootstrap-jquery', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', true );
	
//	wp_enqueue_script( 'africasafaritours-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', true );

wp_enqueue_script( 'africasafaritours-inview', get_template_directory_uri() . '/js/inview.min.js', true );

	wp_enqueue_script( 'africasafaritours-bootstrap-popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', true );
	
	wp_enqueue_script( 'africasafaritours-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'africasafaritours-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'africasafaritours-mixitup-filter', get_template_directory_uri() . '/js/mixitup.js', true ); 
	wp_enqueue_script( 'africasafaritours-mixitup-pagination', get_template_directory_uri() . '/js/mixitup-pagination.js', true ); 
}
add_action( 'wp_enqueue_scripts', 'africasafaritours_scripts' );

//** Add Owl Carousel Assets

function sl_owl_assets() {
	
	// load owl css
	wp_enqueue_style( 'sw-owl-css', get_template_directory_uri() . '/owl/owl.carousel.min.css' );
	wp_enqueue_style( 'sw-owl-theme-css', get_template_directory_uri() . '/owl/owl.theme.default.css' );	
	//load owl js
	wp_enqueue_script( 'sw-old-js', get_template_directory_uri() . '/owl/owl.carousel.min.js', array(), true );
}
add_action( 'wp_enqueue_scripts', 'sl_owl_assets' );

//** Add Core JS

function sl_core_js() {
	
	wp_enqueue_script( 'sl-core-js', get_template_directory_uri() . '/js/core.js', array(), true );
}
add_action( 'wp_enqueue_scripts', 'sl_core_js' );

//** Add Lightbox JS

function sl_lightbox_js() {
	
	wp_enqueue_script( 'sl-lightbox-js', get_template_directory_uri() . '/js/jquery.magnific-popup.js', array(), true );
}
add_action( 'wp_enqueue_scripts', 'sl_lightbox_js' );

function sl_custom_menu() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' ),
      'about-menu' => __( 'About Menu' )
    )
  );
}
add_action( 'init', 'sl_custom_menu' );

/* SILVERLESS DASHBOARD */

add_action('wp_dashboard_setup', 'sl_dashboard_widget');
  
function sl_dashboard_widget() {
global $wp_meta_boxes;
 
wp_add_dashboard_widget('custom_help_widget', 'Silverless Support', 'custom_dashboard_help');
}
function custom_dashboard_help() {
?>

<img src="https://silverless.co.uk/wp-content/themes/silverless/images/logo__silverless.svg" style="max-width:100%;
height:auto;"/>

<img src="https://silverless.co.uk/wp-content/uploads/2016/10/icon-screen-delete.svg" style=" display: inline-block; width: 60px; margin: 2em calc(50% - 30px) 1em;"/>

<p>For support or general enquiries please contact us directly at <a href="mailto:hello@silverless.co.uk">hello@silverless.co.uk</a> or call <a href="tel:+44 (0)1672 556532">01672 556532</a></p>
<p>We aim to respond within 60 minutes during hours (Mon to Fri 9am - 5pm)</p>

<?php
}

/* SILVERLESS STYLES */

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '
<style>
#menu-posts-camp .dashicons-admin-post:before {
	font-family: "dashicons";
	content: "\f102";
}

#toplevel_page_testimonials .dashicons-admin-generic:before {
	font-family: "dashicons";
	content: "\f101";
}

#toplevel_page_call-to-action .dashicons-admin-generic:before {
	font-family: "dashicons";
	content: "\f488";
}


.taxonomy-where tr.form-field.term-description-wrap,
body.taxonomy-where .form-field.term-description-wrap,
body.taxonomy-what .form-field.term-description-wrap,
body.taxonomy-when .form-field.term-description-wrap {
	display:none;
	}

#wpcontent, #wpfooter, #wpwrap {
  background: hsl(35, 11%, 78%);
}

#adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap, #wpadminbar {
  background-color: hsl(284, 15%, 20%);
}

#adminmenu .wp-has-current-submenu .wp-submenu, #adminmenu .wp-has-current-submenu .wp-submenu.sub-open, #adminmenu .wp-has-current-submenu.opensub .wp-submenu, #adminmenu a.wp-has-current-submenu:focus+.wp-submenu, .no-js li.wp-has-current-submenu:hover .wp-submenu {
  background-color: hsl(285, 25%, 17%);
}

#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu .wp-menu-arrow, #adminmenu .wp-menu-arrow div, #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .folded #adminmenu li.current.menu-top, .folded #adminmenu li.wp-has-current-submenu {
  background: hsl(286, 25%, 17%);
  color: hsl(23, 78%, 55%);
}

ul#adminmenu a.wp-has-current-submenu:after, ul#adminmenu>li.current>a.current:after {
  border-right-color: hsl(35, 11%, 78%);
  }

#adminmenu .wp-submenu a:focus, #adminmenu .wp-submenu a:hover, #adminmenu a:hover, #adminmenu li.menu-top>a:focus {
  color: hsl(18, 77%, 54%);
}

body.post-type-page div#postdivrich {
  display: none;
}

</style>';
}

/**
 * ACF Options Pages.
 */
 
 if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Site Settings',
		'menu_title'	=> 'Site Settings',
		'menu_slug' 	=> 'site-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	/*acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'site-general-settings',
	));*/

	acf_add_options_page(array(
		'page_title' 	=> 'Testimonials',
		'menu_title'	=> 'Testimonials',
		'menu_slug' 	=> 'testimonials',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Call To Action',
		'menu_title'	=> 'Call To Action',
		'menu_slug' 	=> 'call-to-action',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	
}
 
/**
 * Remove Default Menu Items.
 */
function remove_menus(){

  remove_menu_page( 'edit-comments.php' );          //Comments
  
}
add_action( 'admin_menu', 'remove_menus' );

/**
 * Allow SVG Upload.
 */
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');














