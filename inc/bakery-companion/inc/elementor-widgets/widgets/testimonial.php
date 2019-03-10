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
 * Bakery elementor section widget.
 *
 * @since 1.0
 */
class Bakery_Testimonial extends Widget_Base {

	public function get_name() {
		return 'bakery-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'bakery' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'bakery-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // Testimonial Heading
		$this->start_controls_section(
			'testimonial_heading',
			[
				'label' => __( 'Testimonial Section Heading', 'bakery' ),
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


		// ----------------------------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'customersreview_content',
			[
				'label' => __( 'Customers Review', 'bakery' ),
			]
		);

		$this->add_control(
            'review_slider', [
                'label' => __( 'Create Review', 'bakery' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Name', 'bakery' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Name'
                    ],
	                [
		                'name' => 'reviewstar',
		                'label' => __('Star Review', 'bakery'),
		                'type' => Controls_Manager::CHOOSE,
		                'options' => [
			                '1' => [
				                'title' => __('1', 'bakery'),
				                'icon' => 'fa fa-star',
			                ],
			                '2' => [
				                'title' => __('2', 'bakery'),
				                'icon' => 'fa fa-star',
			                ],
			                '3' => [
				                'title' => __('3', 'bakery'),
				                'icon' => 'fa fa-star',
			                ],
			                '4' => [
				                'title' => __('4', 'bakery'),
				                'icon' => 'fa fa-star',
			                ],
			                '5' => [
				                'title' => __('5', 'bakery'),
				                'icon' => 'fa fa-star',
			                ],
		                ],
	                ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'bakery' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'default'   => __('Accessories Here you can find the best computeraccessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory', 'bakery')
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Image', 'bakery' ),
                        'type'  => Controls_Manager::MEDIA,
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End exibition content

        /**
         * Style Tab
         *
         */
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
				'default'   => '#fff',
				'selectors' => [
					'{{WRAPPER}} .title h1' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'color_sectsubtitle', [
				'label'     => __( 'Section Sub Title Color', 'bakery' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#fff',
				'selectors' => [
					'{{WRAPPER}} .title p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

        // Testimonial Item style
		$this->start_controls_section(
			'style_item', [
				'label' => __( 'Style Item', 'bakery' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'testimonial_title_color', [
				'label'     => __( 'Testimonial Title Color', 'bakery' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#fff',
				'selectors' => [
					'{{WRAPPER}} .single-review h4' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'testimonial_desc_color', [
				'label'     => __( 'Testimonial Description Color', 'bakery' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#fff',
				'selectors' => [
					'{{WRAPPER}} .single-review p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

        /*------------------------------ Background Style ------------------------------*/
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
                'selector' => '{{WRAPPER}} .review-area',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
    $this->load_widget_script();

    ?>

        <section class="review-area section-gap relative">
            <div class="overlay overlay-bg"></div>
            <div class="container">
	            <?php
	            // Section Heading
	            bakery_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
	            ?>
                <div class="row">
                    <div class="active-review-carusel">
                        <?php
                        if ( is_array( $settings['review_slider'] ) && count( $settings['review_slider'] ) > 0 ):
                            foreach ( $settings['review_slider'] as $review ): ?>
                                <div class="single-review item">
                                    <?php
                                    if ( ! empty( $review['img']['url'] ) ) {
                                        echo bakery_img_tag(
                                            array(
                                                'url'   => esc_url( $review['img']['url'] )
                                            )
                                        );
                                    }
                                    ?>
                                    <div class="title justify-content-start d-flex">
	                                    <?php
	                                    // Name =======
	                                    if ( ! empty( $review['label'] ) ) {
		                                    echo bakery_heading_tag(
			                                    array(
				                                    'tag'  => 'h4',
				                                    'text' => esc_html( $review['label'] ),
			                                    )
		                                    );
	                                    }
                                        // Star Review ==================
                                        $star = $review['reviewstar'];
                                        if (!empty( $star )) {
                                            echo '<div class="star">';
                                            for ($i = 1; $i <= 5; $i++) {

                                                if ($star >= $i) {
                                                    echo '<span class="fa fa-star checked"></span>';
                                                } else {
                                                    echo '<span class="fa fa-star"></span>';
                                                }
                                            }
                                            echo '</div>';
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    // Description
                                    if ( ! empty( $review['desc'] ) ) {
	                                    echo bakery_get_textareahtml_output( $review['desc'] );
                                    }
                                    ?>
                                </div>
                            <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </section>

    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){

            $('.active-review-carusel').owlCarousel({
                items:2,
                margin: 30,
                dots: true,
                autoplayHoverPause: true,
                smartSpeed:650,
                autoplay:true,
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    }
                }
            });

        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
