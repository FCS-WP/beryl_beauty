<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Service Slider Widget .
 *
 */
class Mixlax_Service_Slider extends Widget_Base{

	public function get_name() {
		return 'mixlaxserviceslider';
	}

	public function get_title() {
		return __( 'Service Slider', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'service_slider_section',
			[
				'label' 	=> __( 'Service Slider', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'service_style',
			[
				'label' 		=> __( 'Service Style', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> __( 'Style One', 'mixlax' ),
					'two' 			=> __( 'Style Two', 'mixlax' ),
					'three' 		=> __( 'Style Three', 'mixlax' ),
				],
			]
		);

		$repeater = new Repeater();

        $repeater->add_control(
            'service_image',
            [
                'label' 		=> __( 'Service Image', 'mixlax' ),
                'type' 			=> Controls_Manager::MEDIA,
                'default' 		=> [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
		
        $repeater->add_control(
            'service_image_two',
            [
                'label' 		=> __( 'Service Image. ( Works On Style two )', 'mixlax' ),
                'type' 			=> Controls_Manager::MEDIA,
                'default' 		=> [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

		$repeater->add_control(
			'service_title', [
				'label' 		=> __( 'Service Title', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Sports Massage' , 'mixlax' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'title_link',
			[
				'label' 		=> __( 'Link', 'mixlax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'mixlax' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);
		$repeater->add_control(
			'service_description', [
				'label' 		=> __( 'Service Description', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Experience a metamorphosis from tension to tranquility Massage, facials, salon' , 'mixlax' ),
				'label_block' 	=> true,
			]
        );

		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Slides', 'mixlax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'service_title' 		=> __( 'Sports Massage', 'mixlax' ),
						'service_description' 	=> __( 'Experience a metamorphosis from tension to tranquility Massage, facials, salon', 'mixlax' ),
						'service_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'service_title' 		=> __( 'Hot Stone Massage', 'mixlax' ),
						'service_description' 	=> __( 'Experience a metamorphosis from tension to tranquility Massage, facials, salon', 'mixlax' ),
						'service_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'service_title' 		=> __( 'Facial & Therophy', 'mixlax' ),
						'service_description' 	=> __( 'Experience a metamorphosis from tension to tranquility Massage, facials, salon', 'mixlax' ),
						'service_image' 		=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{{ service_title }}}',
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
			'slider_control',
			[
				'label' 	=> __( 'Slider Control', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'slide_to_show',
			[
				'label'         => __( 'Slider To Show?', 'mixlax' ),
				'type'          => Controls_Manager::SLIDER,
				'size_units'    => [ 'px' ],
				'range'         => [
					'px'           => [
						'min'             => 0,
						'max'             => 8,
						'step'            => 1,
					],
				],
				'default'       => [
					'unit'         => 'px',
					'size'         => 4,
				],
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'service_general',
			[
				'label' 	=> __( 'General', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'service_slider_service_icon_bg_color',
			[
				'label' 		=> __( 'Service Icon Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service .service-icon .icon' => 'background-color: {{VALUE}}',
				],
				'condition'		=> [ 'service_style' => 'one' ],
			]
        );

		$this->add_control(
			'service_slider_active_bg_color',
			[
				'label' 		=> __( 'Service Active Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service-layout5 .slick-center .vs-service' => 'background-color: {{VALUE}}',
				],
				'condition'		=> [ 'service_style' => 'two' ],
			]
        );

		$this->add_control(
			'service_slider_service_bg_color',
			[
				'label' 		=> __( 'Service Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service-layout5 .vs-service' => 'background-color: {{VALUE}}',
				],
				'condition'		=> [ 'service_style' => 'two' ],
			]
        );

		$this->add_control(
			'service_slider_service_icon_color',
			[
				'label' 		=> __( 'Service Icon Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service .service-icon .icon,{{WRAPPER}} .vs-service .service-icon .icon-two,{{WRAPPER}} .vs-service .service-icon' => 'color: {{VALUE}}',
				],
				'condition'		=> [ 'service_style' => [ 'one', 'three' ] ],
			]
        );

		$this->add_control(
			'service_border_color',
			[
				'label' 		=> __( 'Service Border Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-layout4 .vs-service' => 'border:1px solid {{VALUE}}',
				],
				'condition'		=> [ 'service_style' => 'three' ],
			]
        );


		$this->end_controls_section();

        $this->start_controls_section(
			'service_slider_service_title_style_section',
			[
				'label' 	=> __( 'Service Title', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'service_slider_service_title_color',
			[
				'label' 		=> __( 'Service Title Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service .service-content .service-title,{{WRAPPER}} .vs-service .service-title a' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'service_slider_service_title_hover_color',
			[
				'label' 		=> __( 'Service Title Hover Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service .service-content .service-title a:hover,{{WRAPPER}} .vs-service .service-title a:hover' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'service_slider_service_title_typography',
				'label' 	=> __( 'Service Title Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .vs-service .service-content .service-title,{{WRAPPER}} .vs-service .service-title',
			]
        );

        $this->add_responsive_control(
			'service_slider_service_title_margin',
			[
				'label' 		=> __( 'Service Title Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service .service-content .service-title,{{WRAPPER}} .vs-service .service-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'service_slider_service_title_padding',
			[
				'label' 		=> __( 'Service Title Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service .service-content .service-title,{{WRAPPER}} .vs-service .service-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'service_slider_client_feedback_style_section',
			[
				'label' 	=> __( 'Service Description', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'service_slider_client_feedback_color',
			[
				'label' 	=> __( 'Service Description Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-service .service-content p,{{WRAPPER}} .vs-service .service-text' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'service_slider_client_feedback_typography',
				'label' 	=> __( 'Service Description Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .vs-service .service-content p,{{WRAPPER}} .vs-service .service-text',
			]
        );

        $this->add_responsive_control(
			'service_slider_client_feedback_margin',
			[
				'label' 		=> __( 'Service Description Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service .service-content p,{{WRAPPER}} .vs-service .service-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'service_slider_client_feedback_padding',
			[
				'label' 		=> __( 'Service Description Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service .service-content p,{{WRAPPER}} .vs-service .service-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();


	}

	protected function render() {

		$settings = $this->get_settings_for_display();


        $this->add_render_attribute( 'wrapper', 'class', 'row vs-carousel' );
        $this->add_render_attribute( 'wrapper', 'data-slide-to-show', $settings['slide_to_show']['size'] );

        if( $settings['service_style'] == 'two' ){
            $this->add_render_attribute( 'wrapper', 'data-centermode', 'true' );
            $this->add_render_attribute( 'wrapper', 'data-centerpadding', '0px' );
        }

		if( $settings['service_style'] == 'one' ){
			if( ! empty( $settings['slides'] ) ){
				echo '<div class="vs-service-wrapper vs-service-layout1">';
				  	echo '<div class="container">';
						echo '<div '.$this->get_render_attribute_string( 'wrapper' ).'>';
							foreach( $settings['slides'] as $singleslide ) {
								echo '<div class="col-lg-3">';
									echo '<div class="vs-service service-style4">';
										echo '<div class="service-icon">';
											if( ! empty( $singleslide['service_image']['url'] ) ){
												echo wellnez_img_tag( array(
													'url'   => esc_url( $singleslide['service_image']['url'] )
												) );
											}
										echo '</div>';
										echo '<div class="service-content">';
											if( ! empty( $singleslide['service_title'] ) ){
												$target     = $singleslide['title_link']['is_external'] ? ' target="_blank"' : '';
												$nofollow   = $singleslide['title_link']['nofollow'] ? ' rel="nofollow"' : '';
												echo '<h3 class="service-title h4"><a class="text-inherit" '.wp_kses_post( $target.$nofollow ).' href="'.esc_url( $singleslide['title_link']['url'] ).'">'.esc_html( $singleslide['service_title'] ).'</a></h3>';
											}
											if( ! empty( $singleslide['service_description'] ) ){
												echo '<p class="service-text">'.wp_kses_post( $singleslide['service_description'] ).'</p>';
											}
										echo '</div>';
									echo '</div>';
								echo '</div>';
							}
						echo '</div>';
					echo '</div>';
				echo '</div>';
			}
		}elseif( $settings['service_style'] == 'two' ){
			if( ! empty( $settings['slides'] ) ){
	            echo '<section class="vs-service-wrapper vs-service-layout5">';
	                echo '<div class="container">';
	                    echo '<div '.$this->get_render_attribute_string( 'wrapper' ).'>';
	                        foreach( $settings['slides'] as $singleslide ) {
	                            echo '<div class="col-lg-4">';
	                                echo '<div class="vs-service service-style3">';
	                                    echo '<div class="service-img">';
											if( ! empty( $singleslide['service_image']['url'] ) ){
												echo wellnez_img_tag( array(
													'url'   => esc_url( $singleslide['service_image']['url'] )
												) );
											}
											if( ! empty( $singleslide['service_image_two']['url'] ) ){
												echo '<span class="service-icon">';
												    echo wellnez_img_tag( array(
													   'url'   => esc_url( $singleslide['service_image_two']['url'] )
												    ) );
												echo '</span>';
										    }
	                                    echo '</div>';
	                                    echo '<div class="service-content">';
	                                        if( ! empty( $singleslide['service_title'] ) ){
	                                            $target     = $singleslide['title_link']['is_external'] ? ' target="_blank"' : '';
	                                            $nofollow   = $singleslide['title_link']['nofollow'] ? ' rel="nofollow"' : '';
	                                            echo '<h3 class="service-title h4 mb-10"><a class="text-inherit" '.wp_kses_post( $target.$nofollow ).' href="'.esc_url( $singleslide['title_link']['url'] ).'">'.esc_html( $singleslide['service_title'] ).'</a></h3>';
	                                        }
	                                        if( ! empty( $singleslide['service_description'] ) ){
	                                            echo '<p class="service-text">'.wp_kses_post( $singleslide['service_description'] ).'</p>';
	                                        }
	                                    echo '</div>';
	                                echo '</div>';
	                            echo '</div>';
	                        }
	                    echo '</div>';
	                echo '</div>';
	            echo '</section>';
			}
		}else{
			if( ! empty( $settings['slides'] ) ){
	            echo '<section class="vs-service-wrapper service-layout4 has-white-icon">';
	                echo '<div class="container">';
	                    echo '<div '.$this->get_render_attribute_string( 'wrapper' ).'>';
	                        foreach( $settings['slides'] as $singleslide ) {
								echo '<div class="col-xl-4">';
									echo '<div class="vs-service service-style6">';
										echo '<div class="service-icon">';																		
											if( ! empty( $singleslide['service_image']['url'] ) ){
												echo wellnez_img_tag( array(
													'url'   => esc_url( $singleslide['service_image']['url'] )
												) );
											}
										echo '</div>';										
										if( ! empty( $singleslide['service_title'] ) ){
											$target     = $singleslide['title_link']['is_external'] ? ' target="_blank"' : '';
											$nofollow   = $singleslide['title_link']['nofollow'] ? ' rel="nofollow"' : '';
											echo '<h3 class="h4 service-title"><a '.wp_kses_post( $target.$nofollow ).' href="'.esc_url( $singleslide['title_link']['url'] ).'">'.esc_html( $singleslide['service_title'] ).'</a></h3>';
										}
										if( ! empty( $singleslide['service_description'] ) ){
											echo '<p class="service-text">'.wp_kses_post( $singleslide['service_description'] ).'</p>';
										}
                                    echo '</div>';
                                echo '</div>';
	                        }
	                    echo '</div>';
	                echo '</div>';
	            echo '</section>';
			}
		}
	}

}