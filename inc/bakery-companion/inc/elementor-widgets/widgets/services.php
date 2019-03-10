<?php
namespace Bakeryelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Bakery elementor Team Member section widget.
 *
 * @since 1.0
 */
class Bakery_Services extends Widget_Base {

	public function get_name() {
		return 'bakery-services';
	}

	public function get_title() {
		return __( 'Services', 'bakery' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'bakery-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  training Section Heading ------------------------------
        $this->start_controls_section(
            'services_heading',
            [
                'label' => __( 'Services Section Heading', 'bakery' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => __( 'Title', 'bakery' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true

            ]
        );
        $this->add_control(
            'sect_subtitle', [
                'label' => __( 'Sub Title', 'bakery' ),
                'type'  => Controls_Manager::TEXTAREA,
                'label_block' => true

            ]
        );

        $this->end_controls_section(); // End section top content
        
		// ----------------------------------------   Services content ------------------------------
		$this->start_controls_section(
			'services_block',
			[
				'label' => __( 'Services', 'bakery' ),
			]
		);
		$this->add_control(
            'services_content', [
                'label' => __( 'Create Training', 'bakery' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Title', 'bakery' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Name'
                    ],
                    [
                        'name'  => 'url',
                        'label' => __( 'Title Url', 'bakery' ),
                        'type'  => Controls_Manager::URL,
                        'show_external' => false,
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'bakery' ),
                        'type'  => Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Photo', 'bakery' ),
                        'type'  => Controls_Manager::MEDIA,
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End Services content


        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style Section Heading', 'bakery' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Section Title Color', 'bakery' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .title h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_sectsubtitle', [
                'label'     => __( 'Section Sub Title Color', 'bakery' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //------------------------------ Style services Box ------------------------------
        $this->start_controls_section(
            'style_trainingbox', [
                'label' => __( 'Style Services Content', 'bakery' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_servicestitle', [
                'label' => __( 'Title Color', 'bakery' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_serviceshovertitle', [
                'label' => __( 'Title Hover Color', 'bakery' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service:hover h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_servicesdescription', [
                'label' => __( 'Description Color', 'bakery' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'bakery' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'bakery' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'bakery' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .service-area',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();

    ?>


    <section class="service-area section-gap">
        <div class="container">
            <?php
            // Section Heading
            bakery_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
            ?>

            <div class="row">
                <?php 
                if( ! empty( $settings['services_content'] ) ):
                    foreach( $settings['services_content'] as $val ):

                    // Member Picture
                    $bgUrl = '';
                    if( ! empty( $val['img']['url'] ) ) {
                        $bgUrl = $val['img']['url'];
                    }

                ?>
                <div class="col-lg-3 col-md-6">
                    <div class="single-service">
                        <div class="thumb">
                            <?php
                            // Image
                            echo bakery_img_tag(
	                            array(
		                            'url'   => esc_url( $bgUrl ),
		                            'class'   => 'img-fluid'
	                            )
                            );
                            ?>
                        </div>
                        <?php 

                        // Title
	                    if( ! empty( $val['label'] ) ) {
		                    echo bakery_heading_tag(
			                    array(
				                    'tag'  => 'h4',
				                    'text' => esc_html( $val['label'] )
			                    )
		                    );
	                    }
                        // Description
                        if( ! empty( $val['desc'] ) ) {
                            echo bakery_paragraph_tag(
                                array(
                                    'text'  => esc_html( $val['desc'] ),
                                )
                            );
                        }
                        ?>
                    </div>
                </div>
                <?php 
                    endforeach;
                endif;
                ?>
            </div>
        </div>  
    </section>

    <?php

    }

}
