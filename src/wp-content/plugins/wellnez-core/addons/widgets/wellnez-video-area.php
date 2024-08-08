<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * Video Area Widget .
 *
 */
class Wellnez_Video_Area extends Widget_Base {

	public function get_name() {
		return 'wellnezvideoarea';
	}

	public function get_title() {
		return __( 'Video Area', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'video_area_section',
			[
				'label'     => __( 'Video Area', 'wellnez' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );
		
		$this->add_control(
			'video_area_style',
			[
				'label' 	=> __( 'Video Area Style', 'wellnez' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> __( 'Style One', 'wellnez' ),
					'2' 	=> __( 'Style Two', 'wellnez' ),
					'3' 	=> __( 'Style Three', 'wellnez' ),
				],
			]
		);
		
		$this->add_control(
			'section_subtitle',
            [
				'label'         => __( 'Section Subtitle', 'wellnez' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'INTRO VIDEO' , 'wellnez' ),
				'label_block'   => true,
				'condition'		=> [ 'video_area_style' => '1' ]
			]
		);
		$this->add_control(
			'section_title',
            [
				'label'         => __( 'Section Title', 'wellnez' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Live With Full Precious' , 'wellnez' ),
				'label_block'   => true,
				'condition'		=> [ 'video_area_style' => '1' ]
			]
		);
		
		$this->add_control(
			'shape_image_one',
			[
				'label'     => __( 'Shape Image One', 'wellnez' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'video_area_style' => '1' ]
			]
		);
		
		$this->add_control(
			'shape_image_two',
			[
				'label'     => __( 'Shape Image Two', 'wellnez' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'video_area_style' => '1' ]
			]
		);
		
		$this->add_control(
			'video_bg_image',
			[
				'label'     => __( 'Video Area Image', 'wellnez' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$this->add_control(
			'video_url',
			[
				'label' 		=> __( 'Video Url', 'wellnez' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'wellnez' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);

		$repeater = new Repeater();

        $repeater->add_control(
			'counter_number',
            [
				'label'         => __( 'Counter Number', 'wellnez' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '1990' , 'wellnez' ),
				'label_block'   => true,
			]
		);
        $repeater->add_control(
			'counter_text',
            [
				'label'         => __( 'Counter Text', 'wellnez' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'CUP OF COFFEE' , 'wellnez' ),
				'label_block'   => true,
			]
		);

		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Counter Area', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'counter_number' 	=> __( '1990', 'wellnez' ),
						'counter_text' 		=> __( 'Cup Of Coffee', 'wellnez' ),
					],
					[
						'counter_number' 	=> __( '2398', 'wellnez' ),
						'counter_text' 		=> __( 'Weeding program', 'wellnez' ),
					],
					[
						'counter_number' 	=> __( '500+', 'wellnez' ),
						'counter_text' 		=> __( 'projects done', 'wellnez' ),
					],
					[
						'counter_number' 	=> __( '9081', 'wellnez' ),
						'counter_text' 		=> __( 'active members', 'wellnez' ),
					],
				],
				'title_field' 	=> '{{counter_number}}',
				'condition'		=> [ 'video_area_style' => '1' ]
			]
		);

        $this->end_controls_section();


		$this->start_controls_section(
			'video_area_style_option',
			[
				'label' 	=> __( 'General', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'	=> [ 'video_area_style' => '1' ],
			]
		);
		
		$this->add_control(
			'section_background',
			[
				'label' 		=> __( 'Section Background', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .video-bg-shape' => 'background-color: {{VALUE}}',
                ]
			]
        );
		
		$this->add_control(
			'section_subttile_color',
			[
				'label' 		=> __( 'Subtitle Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .sub-title' => 'color: {{VALUE}}',
                ]
			]
        );
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'subtitle_typography',
				'label'         => __( 'Subtitle Typography', 'wellnez' ),
                'selector'      => '{{WRAPPER}} .sub-title',
			]
		);
        $this->add_responsive_control(
			'subtitle_margin',
			[
				'label'         => __( 'Subtitle Margin', 'wellnez' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->add_responsive_control(
			'subtitle_padding',
			[
				'label'         => __( 'Subtitle Padding', 'wellnez' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .vs-member-box .member-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
				'separator'		=> 'after',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Title Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .sec-title' => 'color: {{VALUE}}',
                ]
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'title_typography',
				'label'         => __( 'Title Typography', 'wellnez' ),
                'selector'      => '{{WRAPPER}} .sec-title',
			]
		);
        $this->add_responsive_control(
			'title_margin',
			[
				'label'         => __( 'Title Margin', 'wellnez' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .sec-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->add_responsive_control(
			'title_padding',
			[
				'label'         => __( 'Title Padding', 'wellnez' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .sec-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
				'separator'		=> 'after',
			]
		);
		
		$this->add_control(
			'counter_number_color',
			[
				'label' 		=> __( 'Counter Number Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .counter-media .sec-title' => 'color: {{VALUE}}!important',
                ]
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'counter_number_typography',
				'label'         => __( 'Counter Number Typography', 'wellnez' ),
                'selector'      => '{{WRAPPER}} .counter-media .sec-title',
			]
		);
		
		$this->add_control(
			'counter_text_color',
			[
				'label' 		=> __( 'Counter Text Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .counter-media .counter-text' => 'color: {{VALUE}}',
                ],
				'separator'		=> 'before',
			]
        );
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'counter_text_typography',
				'label'         => __( 'Counter Text Typography', 'wellnez' ),
                'selector'      => '{{WRAPPER}} .counter-media .counter-text',
			]
		);
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'video_icon_style',
			[
				'label' 	=> __( 'Video Style', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'icon_color',
			[
				'label' 		=> __( 'Icon Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .play-btn > i' => 'color: {{VALUE}}',
                ]
			]
        );
		$this->add_control(
			'icon_border_color',
			[
				'label' 		=> __( 'Icon Border Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .play-btn > i' => 'border-color: {{VALUE}}',
                ]
			]
        );
		$this->add_control(
			'icon_border_ripple_color',
			[
				'label' 		=> __( 'Border Ripple Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .play-btn:after,{{WRAPPER}} .play-btn:before' => 'border-color: {{VALUE}}',
                ]
			]
        );
		
		$this->add_control(
			'hover_bg_color',
			[
				'label' 		=> __( 'Hover Background Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .play-btn:hover i' => 'background-color: {{VALUE}}',
                ]
			]
        );
		
		$this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		
		if( $settings['video_area_style'] == '1' ){
			echo '<section class="video-wrapper position-relative space">';
		        echo '<div class="video-bg-shape"></div>';
				if( ! empty( $settings['shape_image_one']['url'] ) ){
			        echo '<div class="video-shape1 ani-moving-y d-none d-xxl-block">';
						echo wellnez_img_tag( array(
							'url'	=> esc_url( $settings['shape_image_one']['url'] ),
						) );
					echo '</div>';
				}
				if( ! empty( $settings['shape_image_two']['url'] ) ){
			        echo '<div class="video-shape2 ani-moving-x d-none d-xxl-block">';
						echo wellnez_img_tag( array(
							'url'	=> esc_url( $settings['shape_image_two']['url'] ),
						) );
					echo '</div>';
				}
		        
		        echo '<div class="container z-index-common">';
		            echo '<div class="title-area text-center">';
						if( ! empty( $settings['section_subtitle'] ) ){
		                	echo '<span class="sub-title">'.esc_html( $settings['section_subtitle'] ).'</span>';
						}
						if( ! empty( $settings['section_title'] ) ){
			                echo '<h2 class="sec-title">'.esc_html( $settings['section_title'] ).'</h2>';
						}
		            echo '</div>';
		            echo '<div class="video-box-inner bg-white">';
						if( ! empty( $settings['video_bg_image']['url'] ) ){
			                echo '<div class="video-box position-relative">';
								echo wellnez_img_tag( array(
									'url'	=> esc_url( $settings['video_bg_image']['url'] )
								) );
								if( ! empty( $settings['video_url']['url'] ) ){
				                    echo '<a href="'.esc_url( $settings['video_url']['url'] ).'" class="popup-video play-btn position-center"><i class="fas fa-play"></i></a>';
								}
			                echo '</div>';
						}
						if( ! empty( $settings['slides'] ) ){
			                echo '<div class="counter-inner1">';
			                    echo '<!-- Counter Area -->';
			                    echo '<div class="row justify-content-around text-center text-lg-start">';
			                        foreach( $settings['slides'] as $singleslide ){
										echo '<div class="col-sm-6 col-lg-auto">';
				                            echo '<div class="counter-media">';
												if( ! empty( $singleslide['counter_number'] ) ){
					                                echo '<h2 class="sec-title text-theme">'.esc_html( $singleslide['counter_number'] ).'</h2>';
												}
												if( ! empty( $singleslide['counter_text'] ) ){
					                                echo '<p class="counter-text">'.esc_html( $singleslide['counter_text'] ).'</p>';
												}
				                            echo '</div>';
				                        echo '</div>';
									}
			                    echo '</div>';
			                echo '</div>';
						}
		            echo '</div>';
		        echo '</div>';
		    echo '</section>';
		}elseif( $settings['video_area_style'] == '2' ){
			if( ! empty( $settings['video_bg_image']['url'] ) ){
				echo '<div class="video-box">';
					echo wellnez_img_tag( array(
						'url'	=> esc_url( $settings['video_bg_image']['url'] ),
						'class' => 'w-100',
					) );
					if( ! empty( $settings['video_url']['url'] ) ){
						echo '<a href="'.esc_url( $settings['video_url']['url'] ).'" class="popup-video play-btn position-center"><i class="fas fa-play"></i></a>';
					}
				echo '</div>';
			}
		}else{
			if( ! empty( $settings['video_bg_image']['url'] ) ){
				echo '<div class="service-video position-relative">';
					echo wellnez_img_tag( array(
						'url'	=> esc_url( $settings['video_bg_image']['url'] ),
						'class' => 'w-100',
					) );
					if( ! empty( $settings['video_url']['url'] ) ){
						echo '<a href="'.esc_url( $settings['video_url']['url'] ).'" class="popup-video play-btn position-center"><i class="fas fa-play"></i></a>';
					}
				echo '</div>';
			}
		}
	}
}