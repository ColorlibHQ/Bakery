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
 * General Section Fields
 ***********************************/


// Theme Main Color Picker
Epsilon_Customizer::add_field(
    'bakery_themecolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Theme Main Color.', 'bakery' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bakery_general_options_section',
        'default'     => '#d1ab7f',
    )
);

// Google map api key field
$url = 'https://developers.google.com/maps/documentation/geocoding/get-api-key';

Epsilon_Customizer::add_field(
    'bakery_map_apikey',
    array(
        'type'              => 'text',
        'label'             => esc_html__( 'Google map api key', 'bakery' ),
        'description'       => sprintf( __( 'Set google map api key. To get api key %s click here %s.', 'bakery' ), '<a target="_blank" href="'.esc_url( $url  ).'">', '</a>' ),
        'section'           => 'bakery_general_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
        
    )
);

/***********************************
 * Header Section Fields
 ***********************************/

// Header top Phone number
Epsilon_Customizer::add_field(
	'bakery-header-top-phone',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Phone Number', 'bakery' ),
		'section'     => 'bakery_headertop_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => '+953 012 3654 896',
	)
);
// Header top email
Epsilon_Customizer::add_field(
	'bakery-header-top-email',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Email Address', 'bakery' ),
		'section'     => 'bakery_headertop_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => 'support@colorlib.com',
	)
);

// Header Nav Bar Background Color Picker
Epsilon_Customizer::add_field(
    'bakery_header_navbar_bgColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav-bar Background Color', 'bakery' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bakery_headertop_options_section',
        'default'     => '#fff',
    )
);
// Header Sticky  Nav Bar Background Color Picker
Epsilon_Customizer::add_field(
    'bakery_header_navbarsticky_bgColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Sticky Nav Bar Background Color', 'bakery' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bakery_headertop_options_section',
        'default'     => '',
    )
);
// Header Nav Bar Menu Color Picker
Epsilon_Customizer::add_field(
    'bakery_header_navbar_menuColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav Bar Menu Color', 'bakery' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bakery_headertop_options_section',
        'default'     => '#000',
    )
);
// Header Nav Bar Menu Hover Color Picker
Epsilon_Customizer::add_field(
    'bakery_header_navbar_menuHovColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav Bar Menu Hover Color', 'bakery' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bakery_headertop_options_section',
        'default'     => '',
    )
);
// Header sticky nav bar menu color picker
Epsilon_Customizer::add_field(
    'bakery_header_sticky_navbar_menuColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Sticky Header Nav Bar Menu Color', 'bakery' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bakery_headertop_options_section',
        'default'     => '#000',
    )
);
// Header sticky nav bar menu hover color picker
Epsilon_Customizer::add_field(
    'bakery_header_sticky_navbar_menuHovColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Sticky Header Nav Bar Menu Hover Color', 'bakery' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bakery_headertop_options_section',
        'default'     => '',
    )
);
// Page Header Background Color Picker
Epsilon_Customizer::add_field(
    'bakery_headerbgcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Background Color', 'bakery' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => 'rgba(4,9,30,0.85)',
    )
);
// Page Header text Color Picker
Epsilon_Customizer::add_field(
    'bakery_headertextcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Text Color', 'bakery' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#fff',
    )
);
// Header overlay switch field
Epsilon_Customizer::add_field(
    'bakery-headeroverlay-toggle-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Toggle header overlay', 'bakery' ),
        'section'     => 'colors',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
// Header overlay color
Epsilon_Customizer::add_field(
    'bakery_headeroverlaycolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Overlay Color', 'bakery' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => 'rgba(0,0,0,0.5)',
    )
);

/***********************************
 * Blog Section Fields
 ***********************************/
// Featured Post
Epsilon_Customizer::add_field(
	'bakery-featured-post-toggle',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Featured post Show/Hide', 'bakery' ),
		'section'     => 'bakery_blog_options_section',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
Epsilon_Customizer::add_field(
	'bakery_featured_post',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Featured Post ID', 'bakery' ),
		'section'     => 'bakery_blog_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => '',
	)
);

// Category show
Epsilon_Customizer::add_field(
	'bakery-category-show',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Featured Category Show/Hide', 'bakery' ),
		'section'     => 'bakery_blog_options_section',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
// Category Number
Epsilon_Customizer::add_field(
	'bakery_cat_number',
	array(
		'type'        => 'epsilon-slider',
		'label'       => esc_html__( 'Featured Category Number', 'bakery' ),
		'description' => esc_html__( 'Set how many featured categories you want to show in blog page top.', 'bakery' ),
		'section'     => 'bakery_blog_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => '3',
	)
);

// Post excerpt length field
Epsilon_Customizer::add_field(
    'bakery_post_excerpt',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Post Excerpt', 'bakery' ),
        'description' => esc_html__( 'Set post excerpt length.', 'bakery' ),
        'section'     => 'bakery_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '30',
    )
);
// Blog sidebar layout field
Epsilon_Customizer::add_field(
    'bakery-blog-sidebar-settings',
    array(
        'type'     => 'epsilon-layouts',
        'label'    => esc_html__( 'Blog Layout', 'bakery' ),
        'section'  => 'bakery_blog_options_section',
        'description' => esc_html__( 'Select the option to set blog page sidebar position.', 'bakery' ),
        'layouts'  => array(
            '1' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
            '2' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleright.jpg',
            '3' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleleft.jpg',
        ),
        'default'  => array(
            'columnsCount' => 2,
            'columns'      => array(
                1 => array(
                    'index' => 1,
                ),
                2 => array(
                    'index' => 2,
                ),
                3 => array(
                    'index' => 3,
                ),
            ),
        ),
        'min_span' => 4,
        'fixed'    => true
    )
);
if( defined( 'BAKERY_COMPANION_VERSION' ) ) {
// Header social switch field
Epsilon_Customizer::add_field(
    'bakery-blog-social-share-toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Social Share Show/Hide', 'bakery' ),
        'section'     => 'bakery_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

// Header social switch field
Epsilon_Customizer::add_field(
    'bakery-blog-like-toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Like Button Show/Hide', 'bakery' ),
        'section'     => 'bakery_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
}



/***********************************
 * Page Section Fields
 ***********************************/

// Blog sidebar layout field
Epsilon_Customizer::add_field(
	'bakery-page-sidebar-settings',
	array(
		'type'     => 'epsilon-layouts',
		'label'    => esc_html__( 'page Layout', 'bakery' ),
		'section'  => 'bakery_page_options_section',
		'description' => esc_html__( 'Select the option to set page sidebar position.', 'bakery' ),
		'layouts'  => array(
			'1' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
			'2' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleright.jpg',
			'3' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleleft.jpg',
		),
		'default'  => array(
			'columnsCount' => 1,
			'columns'      => array(
				1 => array(
					'index' => 1,
				),
				2 => array(
					'index' => 2,
				),
				3 => array(
					'index' => 3,
				)
			),
		),
		'min_span' => 4,
		'fixed'    => true
	)
);



/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'bakery_fof_text_one',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'bakery' ),
        'section'           => 'bakery_fof_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Ooops 404 Error !'
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'bakery_fof_text_two',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'bakery' ),
        'section'           => 'bakery_fof_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Either something went wrong or the page dosen\'t exist anymore.'
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'bakery_fof_textonecolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'bakery' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bakery_fof_options_section',
        'default'     => '#404551', 
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'bakery_fof_texttwocolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'bakery' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bakery_fof_options_section',
        'default'     => '#abadbe',
    )
);
// 404 background color field
Epsilon_Customizer::add_field(
    'bakery_fof_bgcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Page Background Color', 'bakery' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bakery_fof_options_section',
        'default'     => '#fff',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'bakery-widget-toggle-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'bakery' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'bakery' ),
        'section'     => 'bakery_footer_options_section',
        'default'     => false,
    )
);

// Footer copy right text add settings

// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'bakery' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );

Epsilon_Customizer::add_field(
    'bakery-copyright-text-settings',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'bakery' ),
        'section'     => 'bakery_footer_options_section',
        'default'     => wp_kses_post( $copyText ),
    )
);
// Footer widget background color field
Epsilon_Customizer::add_field(
    'bakery_footer_bgimg_settings',
    array(
        'type'        => 'epsilon-image',
        'label'       => esc_html__( 'Footer Widget Background Image', 'bakery' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bakery_footer_options_section',
    )
);
// Footer widget background color field
Epsilon_Customizer::add_field(
    'bakery_footer_widget_bgColor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Background Color', 'bakery' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bakery_footer_options_section',
        'default'     => '#04091e',
    )
);
// Footer widget text color field
Epsilon_Customizer::add_field(
    'bakery_footer_widget_color_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Text Color', 'bakery' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bakery_footer_options_section',
        'default'     => '#fff',
    )
);
// Footer widget title color field
Epsilon_Customizer::add_field(
    'bakery_footer_widgettitlecolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widgets Title Color', 'bakery' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bakery_footer_options_section',
        'default'     => '#fff',
    )
);
// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'bakery_footer_widget_anchorcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Anchor Color', 'bakery' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bakery_footer_options_section',
        'default'     => '#fff',
    )
);
// Footer widget anchor hover Color
Epsilon_Customizer::add_field(
    'bakery_footer_widget_anchorhovcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Anchor Hover Color', 'bakery' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bakery_footer_options_section',
        'default'     => '#d1ab7f',
    )
);

// Footer bottom bg Color
Epsilon_Customizer::add_field(
    'bakery_footer_bottom_bgcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Background Color', 'bakery' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bakery_footer_options_section',
        'default'     => '#04091e',
    )
);
// Footer bottom text Color
Epsilon_Customizer::add_field(
    'bakery_footer_bottom_textcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Text Color', 'bakery' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bakery_footer_options_section',
        'default'     => '#fff',
    )
);
// Footer bottom text Color
Epsilon_Customizer::add_field(
    'bakery_footer_bottom_anchorcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Anchor Color', 'bakery' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bakery_footer_options_section',
        'default'     => '#d1ab7f',
    )
);
// Footer bottom text Color
Epsilon_Customizer::add_field(
    'bakery_footer_bottom_anchorhovercolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Anchor Hover Color', 'bakery' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'bakery_footer_options_section',
        'default'     => '#d1ab7f',
    )
);
