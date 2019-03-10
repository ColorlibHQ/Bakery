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
 * Before Wrapper
 *
 * @Preloader
 *
 */
add_action( 'bakery_preloader', 'bakery_site_preloader', 10 );

/**
 * Header
 *
 * @Header Menu
 * @Header Bottom
 * 
 */

add_action( 'bakery_header', 'bakery_header_cb', 10 );

/**
 * Hook for footer
 *
 */
add_action( 'bakery_footer', 'bakery_footer_area', 10 );
add_action( 'bakery_footer', 'bakery_back_to_top', 20 );

/**
 * Hook for Blog, single, page, search, archive pages wrapper.
 */
add_action( 'bakery_wrp_start', 'bakery_wrp_start_cb', 10 );
add_action( 'bakery_wrp_end', 'bakery_wrp_end_cb', 10 );

/**
 * Hook for Page wrapper.
 */
add_action( 'bakery_page_wrp_start', 'bakery_page_wrp_start_cb', 10 );
add_action( 'bakery_page_wrp_end', 'bakery_page_wrp_end_cb', 10 );

/**
 * Hook for Blog, single, search, archive pages column.
 */
add_action( 'bakery_blog_col_start', 'bakery_blog_col_start_cb', 10 );
add_action( 'bakery_blog_col_end', 'bakery_blog_col_end_cb', 10 );

/**
 * Hook for Page column.
 */
add_action( 'bakery_page_col_start', 'bakery_page_col_start_cb', 10 );
add_action( 'bakery_page_col_end', 'bakery_page_col_end_cb', 10 );

/**
 * Hook for blog posts thumbnail.
 */
add_action( 'bakery_blog_posts_thumb', 'bakery_blog_posts_thumb_cb', 10 );

/**
 * Hook for blog posts title.
 */
add_action( 'bakery_blog_posts_title', 'bakery_blog_posts_title_cb', 10 );

/**
 * Hook for blog posts meta.
 */
add_action( 'bakery_blog_posts_meta', 'bakery_blog_posts_meta_cb', 10 );

/**
 * Hook for blog posts bottom meta.
 */
add_action( 'bakery_blog_posts_bottom_meta', 'bakery_blog_posts_bottom_meta_cb', 10 );

/**
 * Hook for blog posts excerpt.
 */
add_action( 'bakery_blog_posts_excerpt', 'bakery_blog_posts_excerpt_cb', 10 );

/**
 * Hook for blog posts content.
 */
add_action( 'bakery_blog_posts_content', 'bakery_blog_posts_content_cb', 10 );

/**
 * Hook for blog sidebar.
 */
add_action( 'bakery_blog_sidebar', 'bakery_blog_sidebar_cb', 10 );

/**
 * Hook for page sidebar.
 */
add_action( 'bakery_page_sidebar', 'bakery_page_sidebar_cb', 10 );

/**
 * Hook for blog single post social share option.
 */
add_action( 'bakery_blog_posts_share', 'bakery_blog_posts_share_cb', 10 );

/**
 * Hook for blog single post meta category, tag, next - previous link and comments form.
 */
add_action( 'bakery_blog_single_meta', 'bakery_blog_single_meta_cb', 10 );

/**
 * Hook for blog single footer nav next - previous link and comments form.
 */
add_action( 'bakery_blog_single_footer_nav', 'bakery_blog_single_footer_nav_cb', 10 );

/**
 * Hook for page content.
 */
add_action( 'bakery_page_content', 'bakery_page_content_cb', 10 );


/**
 * Hook for 404 page.
 */
add_action( 'bakery_fof', 'bakery_fof_cb', 10 );
