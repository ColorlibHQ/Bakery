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
class Bakery_Team_Member extends Widget_Base {

	public function get_name() {
		return 'bakery-team-member';
	}

	public function get_title() {
		return __( 'Team Member', 'bakery' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'bakery-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Team Section Top content ------------------------------
        $this->start_controls_section(
            'team_sectcontent',
            [
                'label' => __( 'Team Section Top', 'bakery' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => __( 'Title', 'bakery' ),
                'type' => Controls_Manager::TEXT,
                'label_block'   => true

            ]
        );
        $this->add_control(
            'sect_subtitle', [
                'label' => __( 'Sub Title', 'bakery' ),
                'type' => Controls_Manager::TEXTAREA,

            ]
        );

        $this->end_controls_section(); // End section top content
		// ----------------------------------------  Team Member content ------------------------------
		$this->start_controls_section(
			'team_memcontent',
			[
				'label' => __( 'Team Member', 'bakery' ),
			]
		);
		$this->add_control(
            'teamslider', [
                'label' => __( 'Create Team Member', 'bakery' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name' => 'label',
                        'label' => __( 'Name', 'bakery' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Name'
                    ],
                    [
                        'name' => 'desig',
                        'label' => __( 'Designation', 'bakery' ),
                        'type' => Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'img',
                        'label' => __( 'Photo', 'bakery' ),
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'facebook',
                        'label' => __( 'Facebook URL', 'bakery' ),
                        'type' => Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'twitter',
                        'label' => __( 'Twitter URL', 'bakery' ),
                        'type' => Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'linkedin',
                        'label' => __( 'Linkedin URL', 'bakery' ),
                        'type' => Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'dribbble',
                        'label' => __( 'Dribbble URL', 'bakery' ),
                        'type' => Controls_Manager::TEXT,
                    ],

                ],
            ]
		);

		$this->end_controls_section(); // End Team Member content



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


		//------------------------------ Style Team Member Content ------------------------------
		$this->start_controls_section(
			'style_teaminfo', [
				'label' => __( 'Style Team Member Info', 'bakery' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
            'team_imghov',
            [
                'label' => __( 'Member Image Hover Color', 'bakery' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'memberimghoverbg',
                'label' => __( 'Background', 'bakery' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .team-area .thumb div',
            ]
        );
        //
        $this->add_control(
            'team_nameopt',
            [
                'label' => __( 'Name Style', 'bakery' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_name', [
                'label' => __( 'Name Color', 'bakery' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-team h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_name',
                'selector' => '{{WRAPPER}} .single-team h4',
            ]
        );
        //
        $this->add_control(
            'team_desigopt',
            [
                'label' => __( 'Designation Style', 'bakery' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_desigopt', [
                'label' => __( 'Designation Color', 'bakery' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-team p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_desigopt',
                'selector' => '{{WRAPPER}} .single-team p',
            ]
        );


	}

	protected function render() {

    $settings = $this->get_settings();
     ?>
        <section class="team-area section-gap" id="team">
            <div class="container">
                <?php
                // Section Heading
                bakery_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
                ?>

                <div class="row justify-content-center d-flex align-items-center">
                    <?php 
                    if( is_array( $settings['teamslider'] ) && count( $settings['teamslider'] ) > 0 ){
                        foreach( $settings['teamslider'] as $team ){
                            $facebook = ! empty( $team['facebook'] ) ? $team['facebook'] : '';
                            $twitter  = ! empty( $team['twitter'] ) ? $team['twitter'] : '';
                            $linkedin = ! empty( $team['linkedin'] ) ? $team['linkedin'] : '';
                            $dribbble  = ! empty( $team['dribbble'] ) ? $team['dribbble'] : '';
                            
                            ?>
                            <div class="col-lg-3 col-md-6 single-team">
                                <div class="thumb">
                                <?php 
                                    // Member Iamge
                                    if( ! empty( $team['img']['url'] ) ) {

                                        echo bakery_img_tag(
                                            array(
                                                'url'   => esc_url( $team['img']['url'] ),
                                                'class' => 'img-fluid'
                                            )
                                        );

                                    }
                                    ?>
                                    <div class="align-items-center justify-content-center d-flex">
                                        <?php 
                                        if( $facebook ){
                                            echo '<a href="'.esc_url( $facebook ).'"><i class="fa fa-facebook"></i></a>';
                                        }
                                        if( $twitter ){
                                            echo '<a href="'. esc_url( $twitter ) .'"><i class="fa fa-twitter"></i></a>';
                                        }
                                        if( $linkedin ){
                                            echo '<a href="'. esc_url( $linkedin ) .'"><i class="fa fa-linkedin"></i></a>';
                                        }
                                        if( $dribbble ){
                                            echo '<a href="'. esc_url( $dribbble ) .'"><i class="fa fa-dribbble"></i></a>';
                                        }
                                        
                                        ?>
                                    </div>
                                </div>
                                <div class="meta-text mt-30 text-center">
                                    <?php
                                    // Member Name
                                    if( !empty( $team['label'] ) ){
                                        echo bakery_heading_tag(
                                            array(
                                                'tag'  => 'h4',
                                                'text' => esc_html( $team['label'] )
                                            )
                                        );
                                    }
                                    // Designation
                                    if( !empty( $team['desig'] ) ){
                                        echo bakery_paragraph_tag(
                                            array(
                                                'text' => esc_html( $team['desig'] )
                                            )
                                        );
                                    }
                                    ?>									    	
                                </div>
                            </div>
                            <?php
                        
                        } 
                    }
                    ?>
                </div>
            </div>
        </section>

    <?php

    }
	
}
