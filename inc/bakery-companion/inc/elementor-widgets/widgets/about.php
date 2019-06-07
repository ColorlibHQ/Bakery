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
class Bakery_About extends Widget_Base {

	public function get_name() {
		return 'bakery-about';
	}

	public function get_title() {
		return __( 'About', 'bakery' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'bakery-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  About content ------------------------------
		$this->start_controls_section(
			'about_select_style',
			[
				'label' => __( 'Select Section Style', 'bakery' ),
			]
		);

		$this->add_control(
			'sec_style',
			[
				'label'         => esc_html__( 'Section Style', 'bakery' ),
				'type'          => Controls_Manager::SELECT,
				'label_block'   => true,
				'options'       => [
				    'style1'    => __('Image Style', 'bakery'),
				    'style2'    => __('Video Style', 'bakery')
                ],
				'default'       => 'style1'
			]
		);
		$this->end_controls_section(); // End about content


		$this->start_controls_section(
			'about_content',
			[
				'label' => __( 'About Us', 'bakery' ),
			]
		);
        $this->add_control(
            'title',
            [
                'label'         => esc_html__( 'Title', 'bakery' ),
                'description'   => esc_html__('Use <br> tag for line break', 'bakery'),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'Who we are <br> to Serve the nation', 'bakery' )
            ]
        );
		$this->add_control(
			'sub-title',
			[
				'label'         => esc_html__( 'Sub-title', 'bakery' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'default'       => __( 'Brand new app to blow your mind', 'bakery' )
			]
		);
        $this->add_control(
            'description',
            [
                'label'         => esc_html__( 'Description', 'bakery' ),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( 'inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.', 'bakery' )
            ]
        );

		$this->add_control(
			'btn-lable',
			[
				'label'         => esc_html__( 'Button Label', 'bakery' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'default'       => __( 'Get Started Now', 'bakery' )
			]
		);
		$this->add_control(
			'btn-url',
			[
				'label'         => esc_html__( 'Button URL', 'bakery' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'default'       => esc_url( 'http://your-link.com', 'bakery' )
			]
		);
		$this->add_control(
			'feature_image',
			[
				'label'         => esc_html__( 'Section Feature Iamge', 'bakery' ),
				'type'          => Controls_Manager::MEDIA,
                'condition'    => [
                     'sec_style' => 'style1'
                ]
			]
		);



		$this->end_controls_section(); // End about content

		$this->start_controls_section(
			'about_video_sec',
			[
				'label' => __( 'Video Settings', 'bakery' ),
                'condition' => [
	                'sec_style' => 'style2'
                ]
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'feature_video_bg',
				'label' => __( 'Video Poster Image', 'bakery' ),
				'types' => [ 'classic' ],
				'selector' => '{{WRAPPER}} .about-video-right',

			]
		);
		$this->add_control(
			'video_url',
			[
				'label'         => esc_html__( 'Video URL', 'bakery' ),
				'description'   => esc_html__('Paste or type YouTube video url', 'bakery'),
				'type'          => Controls_Manager::URL,
				'show_external' => false
			]
		);

		$this->add_control(
			'sec_icon',
			[
				'label'         => esc_html__( 'Section Style', 'bakery' ),
				'type'          => Controls_Manager::SELECT,
				'label_block'   => true,
				'options'       => [
					'img_icon'    => __('Image Icon', 'bakery'),
					'font_icon'   => __('Font Icon', 'bakery')
				],
				'default'       => 'img_icon'
			]
		);
		$this->add_control(
			'image_icon', [
				'label'     => __( 'Image Icon', 'bakery' ),
				'type'      => Controls_Manager::MEDIA,
				'condition' => [
					'sec_icon' => 'img_icon'
				]
			]
		);
		$this->add_control(
			'fontawesome_icon', [
				'label'     => __( 'Font Icon', 'bakery' ),
				'type'      => Controls_Manager::ICON,
				'condition' => [
					'sec_icon' => 'font_icon'
				]
			]
		);


        $this->end_controls_section(); // End about content


        //------------------------------ Style Content ------------------------------

        $this->start_controls_section(
            'stylecolor', [
                'label' => __( 'Style Color', 'bakery' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_title', [
                'label'     => __( 'Title Color', 'bakery' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .home-about-area h1'   => 'color: {{VALUE}};',
                    '{{WRAPPER}} .about-video-left h1'   => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_sub_title', [
                'label'     => __( 'Sub-Title Color', 'bakery' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#d1ab7f',
                'selectors' => [
                    '{{WRAPPER}} .home-about-area h6'   => 'color: {{VALUE}};',
                    '{{WRAPPER}} .about-video-left h6'   => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'description_color', [
                'label'     => __( 'Description Color', 'bakery' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .home-about-area p'   => 'color: {{VALUE}};',
                    '{{WRAPPER}} .about-video-left p'   => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .home-about-area .primary-btn.squire' => 'color: {{VALUE}};',
					'{{WRAPPER}} .about-video-left .primary-btn.squire' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'color_btnhoverlabel', [
				'label'     => __( 'Button Hover Label Color', 'bakery' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#d1ab7f',
				'selectors' => [
					'{{WRAPPER}} .home-about-area .primary-btn.squire:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .about-video-left .primary-btn.squire:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'color_btnborder', [
				'label'     => __( 'Button Border Color', 'bakery' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .home-about-area .primary-btn.squire' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .about-video-left .primary-btn.squire' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'color_btnhovborder', [
				'label'     => __( 'Button Hover Border Color', 'bakery' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#d1ab7f',
				'selectors' => [
					'{{WRAPPER}} .home-about-area .primary-btn.squire:hover' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .about-video-left .primary-btn.squire:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'color_btnbg', [
				'label'       => __( 'Button Background Color', 'bakery' ),
				'type'        => Controls_Manager::COLOR,
				'default'     => '',
				'selectors'   => [
					'{{WRAPPER}} .home-about-area .primary-btn.squire' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .about-video-left .primary-btn.squire' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'color_btnhovbg', [
				'label'     => __( 'Button Hover Background Color', 'bakery' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => 'rgba(255,255,255,0)',
				'selectors' => [
					'{{WRAPPER}} .home-about-area .primary-btn.squire:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .about-video-left .primary-btn.squire:hover' => 'background-color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    $img_id = $settings['feature_image']['id'];
    $video_url = !empty( $settings['video_url']['url'] ) ? $settings['video_url']['url'] : '';
    $feature_image = wp_get_attachment_image(absint($img_id), 'bakery_600x360', '', array('class' => 'about-img'));

        if( $settings['sec_style'] == 'style2' ){ ?>
            <section class="about-video-area section-gap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 about-video-left">
	                        <?php
	                        // Sub Title
	                        echo bakery_heading_tag(
		                        array(
			                        'tag'   => 'h6',
			                        'text'  => $settings['sub-title'],
			                        'class' => esc_attr( 'text-uppercase' )
		                        )
	                        );

	                        // Title
	                        echo bakery_heading_tag(
		                        array(
			                        'tag'   => 'h1',
			                        'text'  => $settings['title']
		                        )
	                        );

	                        //Description
	                        echo bakery_get_textareahtml_output( $settings['description'] );

	                        // Button
	                        if( ! empty( $settings['btn-lable'] ) && ! empty( $settings['btn-url'] ) ){
		                        echo '<a class="primary-btn" href="'. esc_url( $settings['btn-url'] ) .'"> '. esc_html($settings['btn-lable']) .' </a>';
	                        }
	                        ?>
                        </div>
                        <div class="col-lg-6 about-video-right justify-content-center align-items-center d-flex">
                            <a class="play-btn" href="<?php echo esc_url( $video_url ); ?>">

                                <?php
                                if( $settings['sec_icon'] == 'font_icon' ){ ?>
                                    <i class="fa <?php echo esc_html($settings['fontawesome_icon']); ?>"></i>
                                    <?php
                                }else{
	                                // Image Icon
	                                $bgUrl = '';
	                                if( ! empty( $settings['image_icon']['url'] ) ) {
		                                $bgUrl = $settings['image_icon']['url'];
	                                }
	                                echo bakery_img_tag(
		                                array(
			                                'url'   => esc_url( $bgUrl ),
			                                'class'   => 'img-fluid mx-auto'
		                                )
	                                );
                                }

                                ?>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }else{ ?>
            <section class="home-about-area section-gap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
					        <?php
					        // Sub Title
					        echo bakery_heading_tag(
						        array(
							        'tag'   => 'h6',
							        'text'  => $settings['sub-title'],
							        'class' => esc_attr( 'text-uppercase' )
						        )
					        );

					        // Title
					        echo bakery_heading_tag(
						        array(
							        'tag'   => 'h1',
							        'text'  => $settings['title']
						        )
					        );

					        //Description
					        echo bakery_get_textareahtml_output( $settings['description'] );

					        // Button
					        if( ! empty( $settings['btn-lable'] ) && ! empty( $settings['btn-url'] ) ){
						        echo '<a class="primary-btn squire mx-auto mt-20" href="'. esc_url( $settings['btn-url'] ) .'"> '. esc_html($settings['btn-lable']) .' </a>';
					        }
					        ?>


                        </div>
                    </div>
                </div>
		        <?php
		        if( !empty( $img_id ) ){
			        echo wp_kses_post( $feature_image );
		        }
		        ?>
            </section>
            <?php
        }

    }

}
