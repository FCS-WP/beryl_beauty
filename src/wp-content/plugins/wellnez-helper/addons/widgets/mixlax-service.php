<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Service Widget .
 *
 */
class Mixlax_Service extends Widget_Base{

	public function get_name() {
		return 'mixlaxservice';
	}

	public function get_title() {
		return __( 'Service', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'service_section',
			[
				'label' 	=> __( 'Service', 'mixlax' ),
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

		$this->add_control(
			'service_column',
			[
				'label' 		=> __( 'Service Column', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '3',
				'options'		=> [
					'12'  			=> __( 'Full Width', 'mixlax' ),
					'6' 			=> __( '2 Column', 'mixlax' ),
					'4' 			=> __( '3 Column', 'mixlax' ),
					'3' 			=> __( '4 Column', 'mixlax' ),
					'2' 			=> __( '6 Column', 'mixlax' ),
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
					],
					[
						'service_title' 		=> __( 'Hot Stone Massage', 'mixlax' ),
						'service_description' 	=> __( 'Experience a metamorphosis from tension to tranquility Massage, facials, salon', 'mixlax' ),
					],
					[
						'service_title' 		=> __( 'Facial & Therophy', 'mixlax' ),
						'service_description' 	=> __( 'Experience a metamorphosis from tension to tranquility Massage, facials, salon', 'mixlax' ),
					],
				],
				'title_field' 	=> '{{{ service_title }}}',
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
			'service_icon_bg_color',
			[
				'label' 		=> __( 'Service Icon Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service .service-icon .icon,{{WRAPPER}} .vs-service .service-icon' => 'background-color: {{VALUE}}',
				],
				'condition'		=> [ 'service_style' => [ 'one', 'three' ] ],
			]
        );

		$this->add_control(
			'service_box_background_color',
			[
				'label' 		=> __( 'Service Box Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service-layout2 .vs-service,{{WRAPPER}} .vs-service-layout3 .vs-service' => 'background-color: {{VALUE}}',
				],
				'condition'		=> [ 'service_style' =>  [ 'two', 'three' ]  ],
			]
        );

		$this->add_control(
			'service_box_background_hover_color',
			[
				'label' 		=> __( 'Service Box Background Hover Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service-layout2 .vs-service:hover,{{WRAPPER}} .vs-service-layout3 .vs-service:hover' => 'background-color: {{VALUE}}',
				],
				'condition'		=> [ 'service_style' =>  [ 'two', 'three' ]  ],
			]
        );


		$this->add_control(
			'service_icon_color',
			[
				'label' 		=> __( 'Service Icon Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service .service-icon' => 'color: {{VALUE}}',
				],
			]
        );

		$this->add_control(
			'service_icon_color_on_box_hover',
			[
				'label' 		=> __( 'Service Icon Color On Hover', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service-layout2 .vs-service:hover .service-icon' => 'color: {{VALUE}}',
				],
                'condition'		=> [ 'service_style' =>   'two'  ],
			]
        );

		$this->add_control(
			'service_title_color_on_box_hover',
			[
				'label' 		=> __( 'Service Title Color On Hover', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service-layout2 .vs-service:hover .service-title,{{WRAPPER}} .vs-service-layout3 .vs-service:hover .service-title' => 'color: {{VALUE}}',
				],
                'condition'		=> [ 'service_style' =>   [ 'two', 'three' ]  ],
			]
        );

		$this->add_control(
			'service_description_color_on_box_hover',
			[
				'label' 		=> __( 'Service Description Color On Hover', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service-layout2 .vs-service:hover .service-text,{{WRAPPER}} .vs-service-layout3 .vs-service:hover .service-text' => 'color: {{VALUE}}',
				],
                'condition'		=> [ 'service_style' =>   [ 'two', 'three' ]  ],
			]
        );


		$this->end_controls_section();

        $this->start_controls_section(
			'service_title_style_section',
			[
				'label' 	=> __( 'Service Title', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'service_title_color',
			[
				'label' 		=> __( 'Service Title Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service .service-content .service-title' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'service_title_hover_color',
			[
				'label' 		=> __( 'Service Title Hover Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service .service-content .service-title a:hover' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'service_title_typography',
				'label' 	=> __( 'Service Title Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .vs-service .service-content .service-title',
			]
        );

        $this->add_responsive_control(
			'service_title_margin',
			[
				'label' 		=> __( 'Service Title Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service .service-content .service-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'service_title_padding',
			[
				'label' 		=> __( 'Service Title Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service .service-content .service-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'service_client_feedback_style_section',
			[
				'label' 	=> __( 'Service Description', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'service_client_feedback_color',
			[
				'label' 	=> __( 'Service Description Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-service .service-content p' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'service_client_feedback_typography',
				'label' 	=> __( 'Service Description Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .vs-service .service-content p',
			]
        );

        $this->add_responsive_control(
			'service_client_feedback_margin',
			[
				'label' 		=> __( 'Service Description Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service .service-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'service_client_feedback_padding',
			[
				'label' 		=> __( 'Service Description Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-service .service-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();


	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		if( $settings['service_style'] == 'one' ){
			if( ! empty( $settings['slides'] ) ){
				echo '<div class="vs-service-wrapper vs-service-layout1">';
				  	echo '<div class="container">';
				  	    echo '<div class="row">';
							foreach( $settings['slides'] as $singleslide ) {
								echo '<div class="col-md-6 col-lg-4 col-xl-'.esc_attr( $settings['service_column'] ).'">';
									echo '<div class="vs-service service-style4">';
										echo '<div class="service-icon">';
											if( ! empty( $singleslide['service_image']['url'] ) ){
												echo wellnez_img_tag( array(
													'url'	=> esc_url( $singleslide['service_image']['url'] ),
												) );
											}
										echo '</div>';
										echo '<div class="service-content">';
											if( ! empty( $singleslide['service_title'] ) ){
												$target     = $singleslide['title_link']['is_external'] ? ' target="_blank"' : '';
												$nofollow   = $singleslide['title_link']['nofollow'] ? ' rel="nofollow"' : '';
												echo '<h3 class="service-title h4"><a '.wp_kses_post( $target.$nofollow ).' href="'.esc_url( $singleslide['title_link']['url'] ).'">'.esc_html( $singleslide['service_title'] ).'</a></h3>';
											}
											if( ! empty( $singleslide['service_description'] ) ){
												echo '<p>'.wp_kses_post( $singleslide['service_description'] ).'</p>';
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
            echo '<section class="vs-service-wrapper vs-service-layout2">';
                echo '<div class="container">';
                    echo '<div class="row gx-2px gy-gx justify-content-center">';
                        foreach( $settings['slides'] as $singleslide ) {
                            $target     = $singleslide['title_link']['is_external'] ? ' target="_blank"' : '';
                            $nofollow   = $singleslide['title_link']['nofollow'] ? ' rel="nofollow"' : '';
                            echo '<div class="col-md-6 col-lg-4 col-xl-'.esc_attr( $settings['service_column'] ).'">';
                                echo '<div class="vs-service service-style5">';
									echo '<div class="service-icon">';
										if( ! empty( $singleslide['service_image']['url'] ) ){
											echo wellnez_img_tag( array(
												'url'	=> esc_url( $singleslide['service_image']['url'] ),
											) );
										}
									echo '</div>';
                                    echo '<div class="service-content">';
                                        if( ! empty( $singleslide['service_title'] ) ){
                                            echo '<h3 class="service-title h4 mb-10"><a '.wp_kses_post( $target.$nofollow ).' href="'.esc_url( $singleslide['title_link']['url'] ).'">'.esc_html( $singleslide['service_title'] ).'</a></h3>';
                                        }
                                        if( ! empty( $singleslide['service_description'] ) ){
                                            echo '<p class="service-text">'.wp_kses_post( $singleslide['service_description'] ).'</p>';
                                        }
                                    echo '</div>';
                                    if( ! empty( $singleslide['title_link']['url'] ) ){
                                        echo '<a '.wp_kses_post( $target.$nofollow ).' href="'.esc_url( $singleslide['title_link']['url'] ).'" class="service-btn icon-btn"><i class="far fa-plus"></i></a>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</section>';
		}else{
            echo '<section class="vs-service-wrapper vs-service-layout3">';
                echo '<div class="container">';
                    echo '<div class="row gx-10 justify-content-center mb-20">';
                        foreach( $settings['slides'] as $singleslide ) {
                            $target     = $singleslide['title_link']['is_external'] ? ' target="_blank"' : '';
                            $nofollow   = $singleslide['title_link']['nofollow'] ? ' rel="nofollow"' : '';
                            echo '<div class="col-sm-6 col-lg-4 col-xl-'.esc_attr( $settings['service_column'] ).'">';
                                echo '<div class="vs-service">';
									echo '<div class="service-icon">';
										if( ! empty( $singleslide['service_image']['url'] ) ){
											echo wellnez_img_tag( array(
												'url'	=> esc_url( $singleslide['service_image']['url'] ),
											) );
										}
									echo '</div>';
                                    echo '<div class="service-content">';
                                        if( ! empty( $singleslide['service_title'] ) ){
                                            echo '<h3 class="service-title h5"><a '.wp_kses_post( $target.$nofollow ).' href="'.esc_url( $singleslide['title_link']['url'] ).'">'.esc_html( $singleslide['service_title'] ).'</a></h3>';
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
	}

}