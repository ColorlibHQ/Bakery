<?php 
/**
 * @Packge 	   : Bakery
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
// Block direct access
if( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


/**
 *
 * Define constant
 *
 */
 
// Base URI
if( ! defined( 'BAKERY_DIR_URI' ) ) {
	define( 'BAKERY_DIR_URI', get_template_directory_uri().'/' );
}

// assets URI
if( ! defined( 'BAKERY_DIR_ASSETS_URI' ) ) {
	define( 'BAKERY_DIR_ASSETS_URI', BAKERY_DIR_URI.'assets/' );
}

// Css File URI
if( ! defined( 'BAKERY_DIR_CSS_URI' ) ) {
	define( 'BAKERY_DIR_CSS_URI', BAKERY_DIR_ASSETS_URI .'css/' );
}

// Js File URI
if( ! defined( 'BAKERY_DIR_JS_URI' ) ) {
	define( 'BAKERY_DIR_JS_URI', BAKERY_DIR_ASSETS_URI .'js/' );
}

// Base Directory
if( ! defined( 'BAKERY_DIR_PATH' ) ) {
	define( 'BAKERY_DIR_PATH', get_parent_theme_file_path().'/' );
}

//Inc Folder Directory
if( ! defined( 'BAKERY_DIR_PATH_INC' ) ) {
	define( 'BAKERY_DIR_PATH_INC', BAKERY_DIR_PATH.'inc/' );
}

//Bakery libraries Folder Directory
if( ! defined( 'BAKERY_DIR_PATH_LIBS' ) ) {
	define( 'BAKERY_DIR_PATH_LIBS', BAKERY_DIR_PATH_INC.'libraries/' );
}

//Classes Folder Directory
if( ! defined( 'BAKERY_DIR_PATH_CLASSES' ) ) {
	define( 'BAKERY_DIR_PATH_CLASSES', BAKERY_DIR_PATH_INC.'classes/' );
}

//Hooks Folder Directory
if( ! defined( 'BAKERY_DIR_PATH_HOOKS' ) ) {
	define( 'BAKERY_DIR_PATH_HOOKS', BAKERY_DIR_PATH_INC.'hooks/' );
}

//Widgets Folder Directory
if( ! defined( 'BAKERY_DIR_PATH_WIDGET' ) ) {
	define( 'BAKERY_DIR_PATH_WIDGET', BAKERY_DIR_PATH_INC.'widgets/' );
}




// Admin Enqueue script
function bakery_admin_script(){
    wp_enqueue_style( 'bakery-admin', get_template_directory_uri().'/assets/css/bakery_admin.css', false, '1.0.0' );
    wp_enqueue_script( 'bakery_admin', get_template_directory_uri().'/assets/js/bakery_admin.js', false, '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'bakery_admin_script' );



/**
 * Include File
 *
 */

require_once( BAKERY_DIR_PATH_INC . 'bakery-companion/bakery-companion.php' );
require_once( BAKERY_DIR_PATH_INC . 'breadcrumbs.php' );
require_once( BAKERY_DIR_PATH_INC . 'category-meta.php' );
require_once( BAKERY_DIR_PATH_INC . 'widgets-reg.php' );
require_once( BAKERY_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
require_once( BAKERY_DIR_PATH_INC . 'bakery-functions.php' );
require_once( BAKERY_DIR_PATH_INC . 'commoncss.php' );
require_once( BAKERY_DIR_PATH_INC . 'support-functions.php' );
require_once( BAKERY_DIR_PATH_INC . 'wp-html-helper.php' );
require_once( BAKERY_DIR_PATH_INC . 'customizer/customizer.php' );
require_once( BAKERY_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
require_once( BAKERY_DIR_PATH_CLASSES . 'Class-Config.php' );
require_once( BAKERY_DIR_PATH_HOOKS . 'hooks.php' );
require_once( BAKERY_DIR_PATH_HOOKS . 'hooks-functions.php' );
require_once( BAKERY_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
require_once( BAKERY_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );


/**
 * Instantiate Bakery object
 *
 * Inside this object:
 * Enqueue scripts, Google font, Theme support features, Epsilon Dashboard .
 *
 */

$obj = new Bakery();
