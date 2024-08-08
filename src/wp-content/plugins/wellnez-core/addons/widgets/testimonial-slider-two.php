<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Testimonial Slider Widget .
 *
 */
class Wellnez_Testimonial_Slider_Two extends Widget_Base{

	public function get_name() {
		return 'wellneztestimonialslidertwo';
	}

	public function get_title() {
		return __( 'Testimonial Slider Two', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'testimonial_slider_section',
			[
				'label' 	=> __( 'Testimonial Slider', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'shape_image',
			[
				'label' 		=> __( 'Shape Image', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$this->add_control(
			'shape_image_two',
			[
				'label' 		=> __( 'Shape Image Two', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$this->add_control(
			'shape_title', [
				'label' 		=> __( 'Shape Title', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Story' , 'wellnez' ),
				'label_block' 	=> true,
			]
        );
		
		$repeater = new Repeater();

		$repeater->add_control(
			'client_image',
			[
				'label' 		=> __( 'Client Image', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'quote_image',
			[
				'label' 		=> __( 'Quote Image', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'client_name', [
				'label' 		=> __( 'Client Name', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Marry Jain & Loma Deniel' , 'wellnez' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'client_feedback', [
				'label' 		=> __( 'Client Feedback', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ' , 'wellnez' ),
				'label_block' 	=> true,
			]
		);
        $repeater->add_control(
			'button_text', [
				'label' 		=> __( 'Button Text', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'See There Story' , 'wellnez' ),
				'label_block' 	=> true,
			]
		);
        $repeater->add_control(
			'button_url', [
				'label' 		=> __( 'Button URL?', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '#' , 'wellnez' ),
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Slides', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'client_name' 		=> __( 'Marry Jain & Loma Deniel', 'wellnez' ),
						'client_feedback' 	=> __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.', 'wellnez' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'client_name' 		=> __( 'Rose Marious & Jezzy Lamot', 'wellnez' ),
						'client_feedback' 	=> __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.', 'wellnez' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'client_name' 		=> __( 'Vivi Marian & Peter Parker', 'wellnez' ),
						'client_feedback' 	=> __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.', 'wellnez' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{{ client_name }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'testimonial_general',
			[
				'label' 	=> __( 'General', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'testimonial_box_bg_color',
			[
				'label' 		=> __( 'Testimonial Box Background Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testimonial-box' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'box_shadow',
				'label' 	=> __( 'Box Shadow', 'wellnez' ),
				'selector' 	=> '{{WRAPPER}} .testimonial-box',
			]
		);

		$this->add_control(
			'testimonial_arrow_color',
			[
				'label' 		=> __( 'Testimonial Arrow Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testimonial-box-img .slick-arrow' => 'color: {{VALUE}}!important',
				],
			]
		);
		$this->add_control(
			'testimonial_arrow_hover_color',
			[
				'label' 		=> __( 'Testimonial Arrow Hover Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testimonial-box-img .slick-arrow:hover' => 'color: {{VALUE}}!important',
				],
			]
		);
		$this->add_control(
			'testimonial_arrow_bg',
			[
				'label' 		=> __( 'Testimonial Arrow Background Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testimonial-box-img .slick-arrow' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'testimonial_arrow_hover_bg',
			[
				'label' 		=> __( 'Testimonial Arrow Hover Background Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testimonial-box-img .slick-arrow:hover' => 'background-color: {{VALUE}}!important',
				],
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
			'testimonial_slider_client_name_style_section',
			[
				'label' 	=> __( 'Client Name', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'testimonial_slider_client_name_color',
			[
				'label' 		=> __( 'Client Name Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testimonial-box .testi-title' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'testimonial_slider_client_name_typography',
				'label' 	=> __( 'Client Name Typography', 'wellnez' ),
				'selector' 	=> '{{WRAPPER}} .testimonial-box .testi-title',
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_name_margin',
			[
				'label' 		=> __( 'Client Name Margin', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testimonial-box .testi-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_name_padding',
			[
				'label' 		=> __( 'Client Name Padding', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testimonial-box .testi-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'testimonial_slider_client_feedback_style_section',
			[
				'label' 	=> __( 'Client Feedback', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'testimonial_slider_client_feedback_color',
			[
				'label' 	=> __( 'Client Feedback Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-box .testi-text' => 'color: {{VALUE}} !important',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'testimonial_slider_client_feedback_typography',
				'label' 	=> __( 'Client Feedback Typography', 'wellnez' ),
				'selector' 	=> '{{WRAPPER}} .testimonial-box .testi-text',
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_feedback_margin',
			[
				'label' 		=> __( 'Client Feedback Margin', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testimonial-box .testi-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_feedback_padding',
			[
				'label' 		=> __( 'Client Feedback Padding', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testimonial-box .testi-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();
	}
	
	protected function render() {

		$settings = $this->get_settings_for_display();

		if( ! empty( $settings['slides'] ) ){
			echo '<div class="position-relative">';
				if( ! empty( $settings['shape_image']['url'] ) ){
			        echo '<div class="testi-shape1 d-none d-xxl-block">';
						echo wellnez_img_tag( array(
							'url'	=> esc_url( $settings['shape_image']['url'] )
						) );
					echo '</div>';
				}
		        echo '<div class="vs-container">';
					echo '<section class="testimonial-wrapper position-relative">';
		                if( ! empty( $settings['shape_image_two']['url'] ) ){
							echo '<div class="testi-shape2 ani-moving-x d-none d-xxl-block">';
								echo wellnez_img_tag( array(
									'url'	=> esc_url( $settings['shape_image_two']['url'] )
								) );
							echo '</div>';
						}
		                if( ! empty( $settings['shape_title'] ) ){
							echo '<div class="testi-text-shape d-none d-xl-block">'.esc_html( $settings['shape_title'] ).'</div>';
						}
		                echo '<div class="container">';
		                    echo '<div class="row">';
		                        echo '<div class="col-xl-7 position-relative">';
		                            echo '<div class="testimonial-box-img">';
		                                echo '<div class="client-img vs-carousel" id="testi-slide1">';
		                                    foreach( $settings['slides'] as $singleslide ) {
												echo '<div>';
													if( ! empty( $singleslide['client_image']['url'] ) ){
														echo wellnez_img_tag( array(
															'url'	=> esc_url( $singleslide['client_image']['url'] ),
															'class' => 'w-100',
														) );
													}
			                                    echo '</div>';
											}
		                                echo '</div>';
		                            echo '</div>';
		                        echo '</div>';
		                        echo '<div class="col-xl-7 offset-xl-5">';
		                            echo '<div class="testimonial-box">';
		                                echo '<div class="content vs-carousel" id="testi-slide2">';
		                                     foreach( $settings['slides'] as $singleslide ) {
												echo '<div class="box-content">';
													if( ! empty( $singleslide['quote_image']['url'] ) ){
				                                        echo '<div class="quote-icon text-theme">';
															echo wellnez_img_tag( array(
																'url'	=> esc_url( $singleslide['quote_image']['url'] ),
															) );
														echo '</div>';
													}
													if( ! empty( $singleslide['client_name'] ) ){
				                                        echo '<h2 class="testi-title">'.esc_html( $singleslide['client_name'] ).'</h2>';
													}
													if( ! empty( $singleslide['client_feedback'] ) ){
				                                        echo '<p class="testi-text">'.esc_html( $singleslide['client_feedback'] ).'</p>';
													}
			                                        echo '<div class="clear"></div>';
													if( ! empty( $singleslide['button_text'] ) ){
				                                        echo '<a href="'.esc_url( $singleslide['button_url'] ).'" class="popup-video vs-btn style13"><i class="fas fa-play"></i>'.esc_html( $singleslide['button_text'] ).'</a>';
													}
			                                    echo '</div>';
											}
		                                echo '</div>';
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</section>';
				echo '</div>';
			echo '</div>';
		}
	}
}