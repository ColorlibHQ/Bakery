<?php 
/**
 * @Packge     : Bakery Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

if( ! defined( 'WPINC' ) ) {
    die;
}

// Sidebar widgets include
require_once BAKERY_COMPANION_SW_DIR_PATH . 'newsletter-widget.php';
require_once BAKERY_COMPANION_SW_DIR_PATH . 'recent-post-thumb.php';
require_once BAKERY_COMPANION_SW_DIR_PATH . 'author-widget.php';
require_once BAKERY_COMPANION_SW_DIR_PATH . 'social-links.php';


// Include Files
require_once BAKERY_COMPANION_INC_DIR_PATH . 'functions.php';
require_once BAKERY_COMPANION_INC_DIR_PATH . 'social-share.php';
require_once BAKERY_COMPANION_INC_DIR_PATH . 'post-like.php';
require_once BAKERY_COMPANION_INC_DIR_PATH . 'bakery-meta/bakery-meta-config.php';
require_once BAKERY_COMPANION_EW_DIR_PATH  . 'elementor-widget.php';

// Demo import include
require_once BAKERY_COMPANION_DEMO_DIR_PATH . 'demo-import.php';
