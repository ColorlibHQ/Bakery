<?php 
/**
 * @Packge     : Bakery
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

// Block direct access
if( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

/***********************************
 * Register customizer panels
 ***********************************/

$panels = array(
    /**
     * Theme Options Panel
     */
    array(
        'id'   => 'bakery_options_panel',
        'args' => array(
            'priority'       => 0,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Theme Options', 'bakery' ),
        ),
    )
);


/***********************************
 * Register customizer sections
 ***********************************/


$sections = array(
    /**
     * General Section
     */
    array(
        'id'   => 'bakery_general_options_section',
        'args' => array(
            'title'    => esc_html__( 'General', 'bakery' ),
            'panel'    => 'bakery_options_panel',
            'priority' => 1,
        ),
    ),
    /**
     * Header Section
     */
    array(
        'id'   => 'bakery_headertop_options_section',
        'args' => array(
            'title'    => esc_html__( 'Header Top', 'bakery' ),
            'panel'    => 'bakery_options_panel',
            'priority' => 2,
        ),
    ),
    /**
     * Blog Section
     */
    array(
        'id'   => 'bakery_blog_options_section',
        'args' => array(
            'title'    => esc_html__( 'Blog', 'bakery' ),
            'panel'    => 'bakery_options_panel',
            'priority' => 3,
        ),
    ),

	/**
	 * Page Section
	 */
	array(
		'id'   => 'bakery_page_options_section',
		'args' => array(
			'title'    => esc_html__( 'page', 'bakery' ),
			'panel'    => 'bakery_options_panel',
			'priority' => 4,
		),
	),


	/**
     * 404 Page Section
     */
    array(
        'id'   => 'bakery_fof_options_section',
        'args' => array(
            'title'    => esc_html__( '404 Page', 'bakery' ),
            'panel'    => 'bakery_options_panel',
            'priority' => 6,
        ),
    ),
    /**
     * Footer Section
     */
    array(
        'id'   => 'bakery_footer_options_section',
        'args' => array(
            'title'    => esc_html__( 'Footer', 'bakery' ),
            'panel'    => 'bakery_options_panel',
            'priority' => 7,
        ),
    ),

);


/***********************************
 * Add customizer elements
 ***********************************/
$collection = array(
    'panel'   => $panels,
    'section' => $sections,
);

Epsilon_Customizer::add_multiple( $collection );
