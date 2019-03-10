<?php
/**
 * @Packge     : Bakery Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

if( !defined( 'WPINC' ) ){
    die;
}

/*************************
    Define Constant
*************************/

// Define version constant
if( ! defined( 'BAKERY_COMPANION_VERSION' ) ) {
    define( 'BAKERY_COMPANION_VERSION', '1.0' );
}

// Define dir path constant
if( ! defined( 'BAKERY_COMPANION_DIR_PATH' ) ) {
    define( 'BAKERY_COMPANION_DIR_PATH', get_parent_theme_file_path(). '/inc/bakery-companion/' );
}

// Define inc dir path constant
if( ! defined( 'BAKERY_COMPANION_INC_DIR_PATH' ) ) {
    define( 'BAKERY_COMPANION_INC_DIR_PATH', BAKERY_COMPANION_DIR_PATH . 'inc/' );
}

// Define sidebar widgets dir path constant
if( ! defined( 'BAKERY_COMPANION_SW_DIR_PATH' ) ) {
    define( 'BAKERY_COMPANION_SW_DIR_PATH', BAKERY_COMPANION_INC_DIR_PATH . 'sidebar-widgets/' );
}

// Define elementor widgets dir path constant
if( ! defined( 'BAKERY_COMPANION_EW_DIR_PATH' ) ) {
    define( 'BAKERY_COMPANION_EW_DIR_PATH', BAKERY_COMPANION_INC_DIR_PATH . 'elementor-widgets/' );
}

// Define demo data dir path constant
if( ! defined( 'BAKERY_COMPANION_DEMO_DIR_PATH' ) ) {
    define( 'BAKERY_COMPANION_DEMO_DIR_PATH', BAKERY_COMPANION_INC_DIR_PATH . 'demo-data/' );
}

// Define elementor-widgets dir url constant
if( ! defined( 'BAKERY_COMPANION_META_DIR_PATH' ) ) {
    define( 'BAKERY_COMPANION_META_DIR_PATH', BAKERY_COMPANION_INC_DIR_PATH . 'bakery-meta/' );
}

// Define plugin dir url constant
if( ! defined( 'BAKERY_THEME_DIR_URL' ) ) {
    define( 'BAKERY_THEME_DIR_URL', get_template_directory_uri() );
}

// Define inc dir url constant
if( ! defined( 'BAKERY_COMPANION_DIR_URL' ) ) {
    define( 'BAKERY_COMPANION_DIR_URL', BAKERY_THEME_DIR_URL . '/inc/bakery-companion/' );
}

// Define inc dir url constant
if( ! defined( 'BAKERY_COMPANION_INC_DIR_URL' ) ) {
    define( 'BAKERY_COMPANION_INC_DIR_URL', BAKERY_COMPANION_DIR_URL . '/inc/' );
}

// Define elementor-widgets dir url constant
if( ! defined( 'BAKERY_COMPANION_EW_DIR_URL' ) ) {
    define( 'BAKERY_COMPANION_EW_DIR_URL', BAKERY_COMPANION_INC_DIR_URL . 'elementor-widgets/' );
}
// Define elementor-widgets dir url constant
if( ! defined( 'BAKERY_COMPANION_DEMO_DIR_URL' ) ) {
    define( 'BAKERY_COMPANION_DEMO_DIR_URL', BAKERY_COMPANION_INC_DIR_URL . 'demo-data/' );
}

// Define elementor-widgets dir url constant
if( ! defined( 'BAKERY_COMPANION_META_DIR_URL' ) ) {
    define( 'BAKERY_COMPANION_META_DIR_URL', BAKERY_COMPANION_INC_DIR_URL . 'bakery-meta/' );
}



$current_theme = wp_get_theme();

$is_parent = $current_theme->parent();

if( ( 'Bakery' ==  $current_theme->get( 'Name' ) ) || ( $is_parent && 'Bakery' == $is_parent->get( 'Name' ) ) ) {
    require_once BAKERY_COMPANION_DIR_PATH . 'bakery-init.php';
} else {

    add_action( 'admin_notices', 'bakery_companion_admin_notice', 99 );
    function bakery_companion_admin_notice() {
        $url = 'https://wordpress.org/themes/bakery/';
    ?>
        <div class="notice-warning notice">
            <p><?php printf( __( 'In order to use the <strong>Bakery Companion</strong> plugin you have to also install the %1$sBakery Theme%2$s', 'bakery' ), '<a href="' . esc_url( $url ) . '" target="_blank">', '</a>' ); ?></p>
        </div>
        <?php
    }
}
