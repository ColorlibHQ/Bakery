<?php
namespace Bakeryelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


/**
 *
 * Bakery elementor about page section widget.
 *
 * @since 1.0
 */
class Bakery_Contact extends Widget_Base {

    public function get_name() {
        return 'bakery-contact';
    }

    public function get_title() {
        return __( 'Contact', 'bakery' );
    }

    public function get_icon() {
        return 'eicon-mail';
    }

    public function get_categories() {
        return [ 'bakery-elements' ];
    }

    protected function _register_controls() {

        $repeater = new \Elementor\Repeater();

        // -------------------------------- Map ------------------------------
        $this->start_controls_section(
            'contact_map',
            [
                'label' => __( 'Map Settings', 'bakery' ),
            ]
        );
        $this->add_control(
            'map_switch',
            [
                'label' => __( 'Show Map', 'bakery' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'bakery' ),
                'label_off' => __( 'Hide', 'bakery' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );
        $this->add_control(
            'map_address',
            [
                'label'         => esc_html__( 'Address', 'bakery' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Rabindra Sorobor Dhanmondi Lake Rd', 'bakery' ),
                'description'   => esc_html__( 'Before use map widget make sure you are set google map api key from customizer -> theme options -> general -> google map api key', 'bakery' )
            ]
        );
        $this->add_control(
            'map_lat',
            [
                'label'       => esc_html__( 'Latitude', 'bakery' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( '23.745227', 'bakery' )
            ]
        );
        $this->add_control(
            'map_lng',
            [
                'label'       => esc_html__( 'Longitude', 'bakery' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( '90.377155', 'bakery' )
            ]
        );

        $this->end_controls_section(); // End Contact Section Heading

        // ----------------------------------------  Contact Info  ------------------------------
        $this->start_controls_section(
            'contact_info',
            [
                'label' => __( 'Contact Info', 'bakery' ),
            ]
        );

        $this->add_control(
            'info', [
                'label'         => __( 'Create Contact Info', 'bakery' ),
                'type'          => Controls_Manager::REPEATER,
                'title_field'   => '{{{ label }}}',
                'fields'  => [
                    [
                        'name'        => 'label',
                        'label'       => __( 'Contact Info', 'bakery' ),
                        'label_block' => true,
                        'type'        => Controls_Manager::TEXT,
                        'default'     => esc_html__( 'Dhaka, Bangladesh', 'bakery' )
                    ],
                    [
                        'name'    => 'desc',
                        'label'   => __( 'Contact Descriptions', 'bakery' ),
                        'type'    => Controls_Manager::WYSIWYG,
                        'default' => esc_html__( 'Write something...', 'bakery' )
                    ],
                    [
                        'name'  => 'icon',
                        'label' => __( 'Icon', 'bakery' ),
                        'type'  => Controls_Manager::ICON,
                    ]

                ],
            ]
        );

        $this->end_controls_section(); // End Contact Info

        // ----------------------------------------  Contact Form  ------------------------------
        
        $this->start_controls_section(
            'contact_form',
            [
                'label' => __( 'Contact Form', 'bakery' ),
            ]
        );
        $this->add_control(
            'contact_formshortcode',
            [
                'label'     => esc_html__( 'Form Shortcode', 'bakery' ),
                'type'      => Controls_Manager::TEXT,
                'label_block' => true
            ]
        );
        $this->end_controls_section(); // End Contact Form


        /**
         * Style Tab
         * ------------------------------ Style ------------------------------
         *
         */
        $this->start_controls_section(
            'style_content_color', [
                'label' => __( 'Style Content Color', 'bakery' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color_title', [
                'label'     => __( 'Address Title Color', 'bakery' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .contact-details h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_desc', [
                'label'     => __( 'Address Description Color', 'bakery' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .contact-details p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_icon', [
                'label'     => __( 'Icon Color', 'bakery' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#d1ab7f',
                'selectors' => [
                    '{{WRAPPER}} .single-contact-address .icon .fa' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_fbtntextcolor', [
                'label'     => __( 'Form Button Label color', 'bakery' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .contact-page-area .form-area .primary-btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovlc', [
                'label'     => __( 'Form Button Hover Label color', 'bakery' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#d1ab7f',
                'selectors' => [
                    '{{WRAPPER}} .contact-page-area .form-area .primary-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


    }

    protected function render() {

    $settings = $this->get_settings();

    // Enqueue scripts
    wp_enqueue_script('maps-googleapis');
    wp_enqueue_script('bakery-map-custom');
    
    //
    $address = ( !empty( $settings['map_address'] ) ) ? $settings['map_address'] : '';
    $lat     = ( !empty( $settings['map_lat'] ) ) ? $settings['map_lat'] : '';
    $lng     = ( !empty( $settings['map_lng'] ) ) ? $settings['map_lng'] : '';

    $mapdata = array( 'address' => $address, 'lat' => $lat, 'lng' => $lng );

    ?>
    <section class="contact-page-area section-gap">
        <div class="container">
            <div class="row">
                <?php 
                if( !empty( $settings['map_switch'] ) ):
                ?>
                <div class="map-wrap" style="width:100%; height: 445px;" data-map="<?php echo esc_attr( json_encode( $mapdata ) ); ?>" id="map"></div>
                <?php 
                endif;
                ?>

                <div class="col-lg-4 d-flex flex-column address-wrap">
                    <?php 
                    if( is_array( $settings[ 'info' ] ) && count( $settings[ 'info' ] ) > 0 ):
                        foreach( $settings[ 'info' ] as $info ):
                    ?>
                        <div class="single-contact-address d-flex flex-row">
                            
                            <?php 
                            if( ! empty( $info['icon'] ) ) {
                                echo '<div class="icon">';
                                    echo '<span class="'.esc_attr( $info['icon'] ).'"></span>';
                                echo '</div>';
                            }
                            ?>
                            <div class="contact-details">
                                <?php 
                                if( ! empty( $info['label'] ) ) {
                                    echo bakery_heading_tag(
                                        array(
                                            'tag'  => 'h5',
                                            'text' => esc_html( $info['label'] )
                                        )
                                    );
                                }
                                //
                                if( ! empty( $info['desc'] ) ) {
                                    echo bakery_get_textareahtml_output( $info['desc'] );
                                }
                                ?>
                            </div>
                        </div>
                    <?php 
                        endforeach;
                    endif;
                    ?>
                </div>

                <div class="col-lg-8">
                    <?php 
                    if( !empty( $settings['contact_formshortcode'] ) ){
                        echo do_shortcode( $settings['contact_formshortcode'] );
                    }
                    ?>
                </div>
            </div>
        </div>  
    </section>
    <?php

        }
    
}
