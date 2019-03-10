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
class Bakery_Menu_Item extends Widget_Base {

	public function get_name() {
		return 'bakery-menu-item';
	}

	public function get_title() {
		return __( 'Menu Item', 'bakery' );
	}

	public function get_icon() {
		return 'eicon-featured-image';
	}

	public function get_categories() {
		return [ 'bakery-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Section Heading ------------------------------
        $this->start_controls_section(
            'menu-item-sec',
            [
                'label' => __( 'Menu Item Section Heading', 'bakery' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => __( 'Title', 'bakery' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => __('Category of available items', 'bakery')

            ]
        );
        $this->add_control(
            'sect_subtitle', [
                'label' => __( 'Sub Title', 'bakery' ),
                'type'  => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => __('They are grilling celebrities in their own right.', 'bakery')

            ]
        );

        $this->end_controls_section(); // End section top content
        
		// ----------------------------------------   Services content ------------------------------
		$this->start_controls_section(
			'menuitem_block',
			[
				'label' => __( 'Menu Items', 'bakery' ),
			]
		);
		$this->add_control(
            'item_content', [
                'label' => __( 'Item', 'bakery' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Title', 'bakery' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Pizza'
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
                        'default'   => __('inappropriate behavior is often laughed off as “boys will be.', 'bakery')
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

		$this->start_controls_section(
			'full-menu-item-btn',
			[
				'label' => __( 'Full Menu Item Button', 'bakery' ),
			]
		);
		$this->add_control(
			'all_item_btn_lable', [
				'label' => __( 'View Full Menu Button Label', 'bakery' ),
				'type'  => Controls_Manager::TEXT,
				'label_block' => true,
				'default'   => __('View Full Menu', 'bakery')

			]
		);
		$this->add_control(
			'all_item_btn_url', [
				'label' => __( 'View Full Menu Button URL', 'bakery' ),
				'type'  => Controls_Manager::URL,
				'show_external' => false,
			]
		);

		$this->end_controls_section(); // End section top content

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
                'default'   => '#222',
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
            'style_menu_item', [
                'label' => __( 'Style Menu Item Content', 'bakery' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_menu_item', [
                'label' => __( 'Title Color', 'bakery' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-cat-item h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_itemhovertitle', [
                'label' => __( 'Title Hover Color', 'bakery' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-cat-item:hover h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_itemdescription', [
                'label' => __( 'Description Color', 'bakery' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-cat-item p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

		//------------------------------ Style button ------------------------------
		$this->start_controls_section(
			'style_btn', [
				'label' => __( 'Style Button', 'bakery' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'color_btnlabel', [
				'label'     => __( 'Button Label Color', 'bakery' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#fff',
				'selectors' => [
					'{{WRAPPER}} .item-category-area .primary-btn' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'color_btnhoverlabel', [
				'label'     => __( 'Button Hover Label Color', 'bakery' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#d1ab7f',
				'selectors' => [
					'{{WRAPPER}} .item-category-area .primary-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'color_btnborder', [
				'label'     => __( 'Button Border Color', 'bakery' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .item-category-area .primary-btn' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'color_btnhovborder', [
				'label'     => __( 'Button Hover Border Color', 'bakery' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#d1ab7f',
				'selectors' => [
					'{{WRAPPER}} .item-category-area .primary-btn:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'color_btnbg', [
				'label'       => __( 'Button Background Color', 'bakery' ),
				'type'        => Controls_Manager::COLOR,
				'default'     => '#d1ab7f',
				'selectors'   => [
					'{{WRAPPER}} .item-category-area .primary-btn' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'color_btnhovbg', [
				'label'     => __( 'Button Hover Background Color', 'bakery' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => 'rgba(255,255,255,0)',
				'selectors' => [
					'{{WRAPPER}} .item-category-area .primary-btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();

    ?>

        <section class="item-category-area section-gap">
            <div class="container">
	            <?php
	            // Section Heading
	            bakery_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
	            ?>
                <div class="row">
                    <?php
                    if( ! empty( $settings['item_content'] ) ):
                        foreach( $settings['item_content'] as $val ):

                            // Menu Item Picture
                            $bgUrl = '';
                            if( ! empty( $val['img']['url'] ) ) {
                                $bgUrl = $val['img']['url'];
                            }

                            ?>
                            <div class="col-lg-3 col-md-6">
                                <div class="single-cat-item">
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
                                    <a href="<?php echo esc_url( $val['url']['url'] ) ?>">
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
                                        ?>
                                    </a>
                                    <?php
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

                    if( ! empty( $settings['all_item_btn_lable'] ) && ! empty( $settings['all_item_btn_url']['url'] ) ) {
                        echo '<a class="primary-btn mx-auto mt-80" href="'. $settings['all_item_btn_url']['url'] .'">'. esc_html( $settings['all_item_btn_lable'] ) .'</a>';
                    }
                    ?>
                </div>
            </div>
        </section>

    <?php

    }

}
