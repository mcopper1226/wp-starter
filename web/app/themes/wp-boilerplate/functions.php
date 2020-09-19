<?php

define('WPB_THEME_VERSION', '0.1');

// and make sure we're not leaking on stage/prod
if (!defined('WPB_CONFIG_SET')) {
  ini_set('display_errors', 0);
  define('WP_DEBUG_DISPLAY', false);
  define('SCRIPT_DEBUG', false);
  define('WP_DEBUG', false);
}

require_once('lib/clean.php');

// If we're running a development version this will be set, otherwise it's not
if (!defined('IS_DEV')) {
  define('IS_DEV', false);
}

// Add support for Post Formats meta box
add_theme_support( 'post-formats', array( 'status', 'gallery', 'video', 'audio' ) );

add_action('wp_enqueue_scripts', function() {
  wp_enqueue_script( 'typekit', '//use.typekit.net/vfs7vov.js', array(), '1.0.0' );
  // in development styles are injected via development build of main.js
  if (!IS_DEV) {
    wp_enqueue_style('styles', get_stylesheet_uri(), array(), WPB_THEME_VERSION);
  }
  wp_enqueue_script('scripts', get_theme_file_uri('/js/main.js'), array(), WPB_THEME_VERSION);
});

add_action( 'wp_head', 'wpb_typekit_inline' );

function wpb_typekit_inline() {
	if ( wp_script_is( 'typekit', 'enqueued' ) ) {
		echo '<script type="text/javascript">try{Typekit.load();}catch(e){}</script>';
	}
}

//Disable gutenberg
add_filter('use_block_editor_for_post', '__return_false', 10);

//IMG Dir Constant
if( !defined('THEME_IMG_PATH') ) {
  define( 'THEME_IMG_PATH', get_theme_file_uri('assets') );
}

add_theme_support( 'post-thumbnails' );
add_image_size( 'blur-thumb', 100 );

// Add pages to menu under Appearance > Menus
add_action('init', function() {
  register_nav_menus(
    array(
      'menu' => 'Menu',
    )
  );
});

// Allow SVG uploads
add_filter('upload_mimes', function($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
});


/**
 * Display Modules
 *
 */
function wpb_modules( $post_id = false ) {

	if( ! function_exists( 'get_field' ) )
		return;

	$post_id = $post_id ? intval( $post_id ) : get_the_ID();
	$modules = get_field( 'blocks', $post_id );
	if( empty( $modules ) )
		return;

	foreach( $modules as $i => $module )
		wpb_module( $module, $i );
}

/**
 * Display Module
 *
 */
function wpb_module( $module = array(), $i = false ) {
	if( empty( $module['acf_fc_layout'] ) )
		return;


	switch( $module['acf_fc_layout'] ) {

		//case wpb_module_disable( $module ):
			//break;

		case 'image_cards':
      set_query_var( 'module', $module );
      get_template_part('blocks/block--image-content-cards'); 
			
      break;
  
      
    case 'open_content_cta':
      set_query_var( 'module', $module );
      get_template_part('blocks/block--open-content-cta'); 
			
			break;
    
    case 'open_content':
      set_query_var( 'module', $module );
      get_template_part('blocks/block--open-content'); 
			
      break;

	}
}



/**
 * Has Module
 *
 */
function wpb_has_module( $module_to_find = '', $post_id = false ) {
	if( ! function_exists( 'get_field' ) )
		return;

	$post_id = $post_id ? intval( $post_id ) : get_the_ID();
	$modules = get_field( 'wpb_modules', $post_id );
	$has_module = false;

	foreach( $modules as $module ) {
		if( $module_to_find == $module['acf_fc_layout'] )
			$has_module = true;
	}

	return $has_module;
}