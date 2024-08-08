<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Feature Widget .
 *
 */
class Mixlax_Feature extends Widget_Base{

	public function get_name() {
		return 'mixlaxfeature';
	}

	public function get_title() {
		return __( 'Feature', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'feature_section',
			[
				'label' 	=> __( 'Feature', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'feature_style',
			[
				'label' 		=> __( 'Feature Style', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> __( 'Style One', 'mixlax' ),
					'two' 			=> __( 'Style Two', 'mixlax' ),
					'three' 		=> __( 'Style Three', 'mixlax' ),
				],
			]
		);

        $this->add_control(
			'feature_separate_image',
			[
				'label'     => __( 'Feature Separate Image', 'mixlax' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'     => [ 'feature_style' => [ 'one', 'two' ] ],
			]
		);

        $this->add_control(
			'section_title', [
				'label' 		=> __( 'Section Title', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Our Specality' , 'mixlax' ),
				'label_block' 	=> true,
                'condition'     => [ 'feature_style' => 'two' ],
			]
        );

        $this->add_control(
			'section_description', [
				'label' 		=> __( 'Section Description', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Access to our fitness centre and pool is free to all our hotel guests. For non-guests membership packages are available.' , 'mixlax' ),
				'label_block' 	=> true,
                'condition'     => [ 'feature_style' => 'two' ],
			]
        );

		$repeater_left = new Repeater();

		$repeater_left->add_control(
			'feature_image_left',
			[
				'label' 		=> __( 'Left Image', 'mixlax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater_left->add_control(
			'feature_title_left', [
				'label' 		=> __( 'Feature Title', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Matt Effects' , 'mixlax' ),
				'label_block' 	=> true,
			]
        );

		$repeater_left->add_control(
			'feature_description_left', [
				'label' 		=> __( 'Feature Description', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'A range of different massage techniques reflexology' , 'mixlax' ),
				'label_block' 	=> true,
			]
        );

		$this->add_control(
			'slides_left',
			[
				'label' 		=> __( 'Feature Left', 'mixlax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater_left->get_controls(),
				'default' 		=> [
					[
						'feature_title_left' 		=> __( 'Matt Effects', 'mixlax' ),
						'feature_description_left' 	=> __( 'A range of different massage techniques reflexology', 'mixlax' ),
					],
					[
						'feature_title_left' 		=> __( 'Sauna Ready', 'mixlax' ),
						'feature_description_left' 	=> __( 'A range of different massage techniques reflexology', 'mixlax' ),
					],
					[
						'feature_title_left' 		=> __( 'Natural Mask', 'mixlax' ),
						'feature_description_left' 	=> __( 'A range of different massage techniques reflexology', 'mixlax' ),
					],
				],
				'title_field' 	=> '{{{ feature_title_left }}}',
			]
		);


		$repeater_right = new Repeater();

		$repeater_right->add_control(
			'feature_image_right',
			[
				'label' 		=> __( 'Right Image', 'mixlax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater_right->add_control(
			'feature_title_right', [
				'label' 		=> __( 'Feature Title', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Matt Effects' , 'mixlax' ),
				'label_block' 	=> true,
			]
        );

		$repeater_right->add_control(
			'feature_description_right', [
				'label' 		=> __( 'Feature Description', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'A range of different massage techniques reflexology' , 'mixlax' ),
				'label_block' 	=> true,
			]
        );

		$this->add_control(
			'slides_right',
			[
				'label' 		=> __( 'Feature Right', 'mixlax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater_right->get_controls(),
				'default' 		=> [
					[
						'feature_title_right' 		      => __( 'Matt Effects', 'mixlax' ),
						'feature_description_right' 	  => __( 'A range of different massage techniques reflexology', 'mixlax' ),
					],
					[
						'feature_title_right' 		      => __( 'Sauna Ready', 'mixlax' ),
						'feature_description_right' 	  => __( 'A range of different massage techniques reflexology', 'mixlax' ),
					],
					[
						'feature_title_right' 		      => __( 'Natural Mask', 'mixlax' ),
						'feature_description_right' 	  => __( 'A range of different massage techniques reflexology', 'mixlax' ),
					],
				],
				'title_field' 	=> '{{{ feature_title_right }}}',
				'condition'     => [ 'feature_style' => [ 'one', 'two' ] ],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'feature_general',
			[
				'label' 	=> __( 'General', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'feature_icon_color',
			[
				'label' 		=> __( 'Feature Icon Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-features-layout1 .icon-btn' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'feature_icon_background_color',
			[
				'label' 		=> __( 'Feature Icon Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-features-layout1 .icon-btn' => 'background-color: {{VALUE}}',
				],
			]
        );

		$this->add_control(
			'section_title_color',
			[
				'label' 		=> __( 'Section Title Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .section-title .sec-title-style1' => 'color: {{VALUE}}',
				],
				'condition'		=> [ 'feature_style' =>  'two'  ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_title_typography',
				'label' 	=> __( 'Section Title Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .section-title .sec-title-style1',
                'condition' => [ 'feature_style' =>  'two'  ],
			]
        );

		$this->add_control(
			'section_description_color',
			[
				'label' 		=> __( 'Section Title Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .section-title .sec-text-style1' => 'color: {{VALUE}}',
				],
				'condition'		=> [ 'feature_style' =>  'two'  ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		       => 'section_description_typography',
				'label' 	       => __( 'Section Title Typography', 'mixlax' ),
				'selector' 	       => '{{WRAPPER}} .section-title .sec-text-style1',
                'condition'		   => [ 'feature_style' =>  'two'  ],
			]
        );


		$this->end_controls_section();

        $this->start_controls_section(
			'feature_title_style_section',
			[
				'label' 	=> __( 'Feature Title', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'feature_title_color',
			[
				'label' 		=> __( 'Feature Title Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-feature .feature-title' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'feature_title_typography',
				'label' 	=> __( 'Feature Title Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .vs-feature .feature-title',
			]
        );

        $this->add_responsive_control(
			'feature_title_margin',
			[
				'label' 		=> __( 'Feature Title Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-feature .feature-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'feature_title_padding',
			[
				'label' 		=> __( 'Feature Title Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-feature .feature-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'feature_description_style_section',
			[
				'label' 	=> __( 'Feature Description', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'feature_description_color',
			[
				'label' 	=> __( 'Feature Description Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-feature .feature-text' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'feature_description_typography',
				'label' 	=> __( 'Feature Description Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .vs-feature .feature-text',
			]
        );

        $this->add_responsive_control(
			'feature_description_margin',
			[
				'label' 		=> __( 'Feature Description Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-feature .feature-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'feature_description_padding',
			[
				'label' 		=> __( 'Feature Description Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-feature .feature-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();


	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		if( $settings['feature_style'] == 'one' ){
			if( ! empty( $settings['slides_left'] || $settings['slides_right'] ) ){
                echo '<section class="vs-features-wrapper vs-features-layout1">';
                    echo '<div class="container">';
                        echo '<div class="inner-wrapper px-4 px-lg-0 space-md position-relative ">';
                            echo '<div class="shape2 bg-solid-theme"></div>';
                            if( ! empty( $settings['feature_separate_image']['url'] ) ){
                                echo '<div class="shape1 position-absolute d-none d-xl-inline-block">';
                                    echo wellnez_img_tag( array(
                                        'url'   => esc_url( $settings['feature_separate_image']['url'] ),
                                    ) );
                                echo '</div>';
                            }
                            echo '<div class="row justify-content-center justify-content-xl-between">';
                                echo '<div class="col-sm-6 col-lg-5 col-xl-4 mb-20 mb-md-0">';
                                    foreach( $settings['slides_left'] as $features_left  ){
                                        echo '<div class="vs-feature media">';
											if( ! empty( $features_left['feature_image_left']['url'] ) ){
												echo '<div class="media-icon">';
													echo '<span class="icon-btn text-theme bg-white">';
														echo wellnez_img_tag( array(
															'url'	=> esc_url( $features_left['feature_image_left']['url'] )
														) );
													echo '</span>';
												echo '</div>';
											}
                                            echo '<div class="media-body">';
                                                if( ! empty( $features_left['feature_title_left'] ) ){
                                                    echo '<h3 class="feature-title h5 mb-10">'.esc_html( $features_left['feature_title_left'] ).'</h3>';
                                                }
                                                if( ! empty( $features_left['feature_description_left'] ) ){
                                                    echo '<p class="feature-text">'.wp_kses_post( $features_left['feature_description_left'] ).'</p>';
                                                }
                                            echo '</div>';
                                        echo '</div>';
                                    }
                                echo '</div>';
                                echo '<div class="col-sm-6 col-lg-5 col-xl-4">';

                                foreach( $settings['slides_right'] as $features_right  ){
                                    echo '<div class="vs-feature media">';
										if( ! empty( $features_right['feature_image_right']['url'] ) ){
											echo '<div class="media-icon">';
												echo '<span class="icon-btn text-theme bg-white">';
													echo wellnez_img_tag( array(
														'url'	=> esc_url( $features_right['feature_image_right']['url'] )
													) );
												echo '</span>';
											echo '</div>';
										}
                                        echo '<div class="media-body">';
                                            if( ! empty( $features_right['feature_title_right'] ) ){
                                                echo '<h3 class="feature-title h5 mb-10">'.esc_html( $features_right['feature_title_right'] ).'</h3>';
                                            }
                                            if( ! empty( $features_right['feature_description_right'] ) ){
                                                echo '<p class="feature-text">'.wp_kses_post( $features_right['feature_description_right'] ).'</p>';
                                            }
                                        echo '</div>';
                                    echo '</div>';
                                }

                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</section>';
			}
		}elseif( $settings['feature_style'] == 'two' ){
            if( ! empty( $settings['slides_left'] || $settings['slides_right'] ) ){
                echo '<section class="vs-features-wrapper vs-features-layout1 overflow-hidden position-relative space">';
                    if( ! empty( $settings['feature_separate_image']['url'] ) ){
                        echo '<div class="shape3 position-absolute d-none d-lg-block">';
                            echo wellnez_img_tag( array(
                                'url'   => esc_url( $settings['feature_separate_image']['url'] ),
                            ) );
                        echo '</div>';
                    }
                    echo '<div class="shape4 position-absolute d-none d-lg-block"></div>';
                    echo '<div class="shape5 position-absolute d-none d-lg-block"></div>';
                    echo '<div class="container">';
                        echo '<div class="row justify-content-center text-center">';
                            echo '<div class="col-md-11 col-lg-8 col-xl-6">';
                                echo '<div class="section-title z-index-common">';
                                    if( ! empty( $settings['section_title'] ) ){
                                        echo '<h2 class="sec-title-style1">'.esc_html( $settings['section_title'] ).'</h2>';
                                    }
                                    if( ! empty( $settings['section_description'] ) ){
                                        echo '<p class="sec-text-style1">'.wp_kses_post( $settings['section_description'] ).'</p>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="inner-wrapper pt-lg-3 pt-xl-5 mt-xl-2">';
                            echo '<div class="row justify-content-between">';
                                echo '<div class="col-sm-6 col-lg-4">';
                                    foreach( $settings['slides_left'] as $features_left  ){
                                        echo '<div class="vs-feature media">';
											if( ! empty( $features_left['feature_image_left']['url'] ) ){
												echo '<div class="media-icon">';
													echo '<span class="icon-btn text-theme bg-white">';
														echo wellnez_img_tag( array(
															'url'	=> esc_url( $features_left['feature_image_left']['url'] )
														) );
													echo '</span>';
												echo '</div>';
											}
                                            echo '<div class="media-body">';
                                                if( ! empty( $features_left['feature_title_left'] ) ){
                                                    echo '<h3 class="feature-title h4 mb-10">'.esc_html( $features_left['feature_title_left'] ).'</h3>';
                                                }
                                                if( ! empty( $features_left['feature_description_left'] ) ){
                                                    echo '<p class="feature-text">'.wp_kses_post( $features_left['feature_description_left'] ).'</p>';
                                                }
                                            echo '</div>';
                                        echo '</div>';
                                    }
                                echo '</div>';
                                echo '<div class="col-sm-6 col-lg-4">';
                                    foreach( $settings['slides_right'] as $features_right  ){
                                        echo '<div class="vs-feature media">';
											if( ! empty( $features_right['feature_image_right']['url'] ) ){
												echo '<div class="media-icon">';
													echo '<span class="icon-btn text-theme bg-white">';
														echo wellnez_img_tag( array(
															'url'	=> esc_url( $features_right['feature_image_right']['url'] )
														) );
													echo '</span>';
												echo '</div>';
											}
                                            echo '<div class="media-body">';
                                                if( ! empty( $features_right['feature_title_right'] ) ){
                                                    echo '<h3 class="feature-title h4 mb-10">'.esc_html( $features_right['feature_title_right'] ).'</h3>';
                                                }
                                                if( ! empty( $features_right['feature_description_right'] ) ){
                                                    echo '<p class="feature-text">'.wp_kses_post( $features_right['feature_description_right'] ).'</p>';
                                                }
                                            echo '</div>';
                                        echo '</div>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</section>';
            }
        }else{
			if( ! empty( $settings['slides_left'] ) ){
				echo '<section class="vs-features-wrapper vs-features-layout1">';
			        echo '<div class="container">';
			            echo '<div class="inner-wrapper px-4 px-lg-2 position-relative">';
			                echo '<div class="row justify-content-center has-default-view">';
								foreach( $settings['slides_left'] as $features_left  ){
									echo '<div class="col-sm-6 col-lg-4">';
										echo '<div class="vs-feature media">';
											if( ! empty( $features_left['feature_image_left']['url'] ) ){
												echo '<div class="media-icon">';
													echo '<span class="icon-btn text-theme bg-white">';
														echo wellnez_img_tag( array(
															'url'	=> esc_url( $features_left['feature_image_left']['url'] )
														) );
													echo '</span>';
												echo '</div>';
											}
											echo '<div class="media-body">';
												if( ! empty( $features_left['feature_title_left'] ) ){
													echo '<h3 class="feature-title h4 mb-10">'.esc_html( $features_left['feature_title_left'] ).'</h3>';
												}
												if( ! empty( $features_left['feature_description_left'] ) ){
													echo '<p class="feature-text">'.wp_kses_post( $features_left['feature_description_left'] ).'</p>';
												}
											echo '</div>';
										echo '</div>';
									echo '</div>';
								}

			                echo '</div>';
			            echo '</div>';
			        echo '</div>';
			    echo '</section>';
			}
		}
	}

}