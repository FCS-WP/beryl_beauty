<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
/**
 * 
 * Project Slider Widget .
 *
 */
class Mixlax_Project_Slider extends Widget_Base{

	public function get_name() {
		return 'mixlaxprojectslider';
	}

	public function get_title() {
		return __( 'Project Slider', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}
	
	public function get_script_depends() {
		return [ 'counter-up' ];
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'project_slider_section',
			[
				'label' 	=> __( 'Project Slider', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'slider_style',
			[
				'label' 		=> __( 'Slider Style', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options' 		=> [
					'one'  			=> __( 'Style One', 'mixlax' ),
					'two' 			=> __( 'Style Two', 'mixlax' ),
				],
			]
		);
		
		$this->add_control(
			'section_title',
			[
				'label' 	=> __( 'Section Title', 'mixlax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Title', 'mixlax' )
			]
        );
		$this->add_control(
			'section_subtitle',
			[
				'label' 	=> __( 'Section Subtitle', 'mixlax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Subtitle', 'mixlax' )
			]
        );
		$this->add_control(
			'button_text',
			[
				'label' => __( 'Button Text', 'mixlax' ),
                'type' => Controls_Manager::TEXTAREA,
                'default'  => __( 'Button Text', 'mixlax' )
			]
        );

        $this->add_control(
			'button_link',
			[
				'label' => __( 'Link', 'mixlax' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'mixlax' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				],
			]
		);
		$this->add_control(
			'thumb_logo',
			[
				'label' 		=> __( 'Thumb Logo', 'mixlax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'slider_style' => 'one' ]
			]
        );
		$this->add_control(
			'experience_count',
			[
				'label' 	=> __( 'Experience Number', 'mixlax' ),
				'type' 		=> Controls_Manager::NUMBER,
				'step' 		=> 5,
				'default' 	=> 250,
				'condition'	=> [ 'slider_style' => 'two' ]
			]
		);
		$this->add_control(
			'experience_suffix',
			[
				'label' 	=> __( 'Experience Suffix', 'mixlax' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default' 	=> __( 'K', 'mixlax' ),
				'condition'	=> [ 'slider_style' => 'two' ],
			]
		);
		$this->add_control(
			'experience_desc',
			[
				'label' 	=> __( 'Experience Description', 'mixlax' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default' 	=> __( 'Happy Clients', 'mixlax' ),
				'condition'	=> [ 'slider_style' => 'two' ],
			]
		);
		
		$counter_repeater = new Repeater();
		
		$counter_repeater->add_control(
			'counter_number',
			[
				'label' 	=> __( 'Counter Number', 'mixlax' ),
				'type' 		=> Controls_Manager::NUMBER,
				'step' 		=> 5,
				'default' 	=> 250,
			]
		);
		$counter_repeater->add_control(
			'counter_text',
			[
				'label' 	=> __( 'Counter Text', 'mixlax' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default' 	=> __( 'Projects', 'mixlax' ),
			]
		);
		$this->add_control(
			'counter_slides',
			[
				'label' 		=> __( 'Counter Slides', 'mixlax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $counter_repeater->get_controls(),
				'default' 		=> [
					[
						'counter_number' => __( '585', 'mixlax' ),
					],
					[
						'counter_number' => __( '369', 'mixlax' ),
					],
				],
				'title_field' => '{{{counter_number}}}',
				'condition'	=> [ 'slider_style' => 'two' ]
			]
		);
		
		$repeater = new Repeater();

		$repeater->add_control(
			'post_image',
			[
				'label' 		=> __( 'Slider Image', 'mixlax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
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
						'post_image' => Utils::get_placeholder_image_src(),
					],
					[
						'post_image' => Utils::get_placeholder_image_src(),
					],
				],
				'title_field' => 'Add Slider',
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'slider_control_section',
			[
				'label' 	=> __( 'Slider Control', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        
		$this->add_control(
			'slider_autoplay',
			[
				'label' 		=> __( 'Autoplay', 'mixlax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'mixlax' ),
				'label_off' 	=> __( 'No', 'mixlax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$this->add_control(
			'slider_nav',
			[
				'label' 		=> __( 'Navigation', 'mixlax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'mixlax' ),
				'label_off' 	=> __( 'No', 'mixlax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$this->add_control(
			'slider_loop',
			[
				'label' 		=> __( 'Loop', 'mixlax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'mixlax' ),
				'label_off' 	=> __( 'No', 'mixlax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

        $this->end_controls_section();
		
		$this->start_controls_section(
			'general_style_section',
			[
				'label' => __( 'General', 'mixlax' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );
		
		$this->add_control(
			'slider_shape_image',
			[
				'label' 		=> __( 'Slider Shape Image', 'mixlax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
        );
		
		$this->add_control(
			'title_color',
			[
				'label' 	=> __( 'Title Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .latest-project-wrapper .section-title h2.title' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'label' 		=> __( 'Title Typography', 'mixlax' ),
                'selector' 		=> '{{WRAPPER}} .latest-project-wrapper .section-title h2.title',
			]
        );
		$this->add_control(
			'subtitle_color',
			[
				'label' 	=> __( 'Sub Title Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .latest-project-wrapper .section-title .text' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'subtitle_typography',
				'label' 		=> __( 'Sub Title Typography', 'mixlax' ),
                'selector' 		=> '{{WRAPPER}} .latest-project-wrapper .section-title .text',
			]
        );
		$this->end_controls_section();
		
		$this->start_controls_section(
			'button_style_section',
			[
				'label' => __( 'Button Style', 'mixlax' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'button_color',
			[
				'label' => __( 'Button Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .primary-btn' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_color',
			[
				'label' => __( 'Button Background Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .primary-btn' => 'background-color: {{VALUE}}',
                ],
			]
        );
        $this->add_control(
			'button_bg_color_hover',
			[
				'label' => __( 'Button Background Hover Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .primary-btn .btn-bg' => 'background-color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __( 'Border', 'mixlax' ),
                'selector' => '{{WRAPPER}} .primary-btn',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => __( 'Button Typography', 'mixlax' ),
                'selector' => '{{WRAPPER}} .primary-btn',
			]
        );

        $this->add_responsive_control(
			'button_margin',
			[
				'label' => __( 'Button Margin', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .primary-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'button_padding',
			[
				'label' => __( 'Button Padding', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .primary-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
        $this->end_controls_section();
		$this->start_controls_section(
			'slider_nav_style_section',
			[
				'label' 	=> __( 'Navigation', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        
        $this->add_control(
			'slider_nav_color',
			[
				'label' 		=> __( 'Navigation Icon Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .slick-arrow i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'slider_nav_color_hover',
			[
				'label' 		=> __( 'Navigation Icon Color On Hover', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .slick-arrow:hover i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'slider_nav_bg_color',
			[
				'label' 		=> __( 'Navigation Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .slick-arrow' => 'background-color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'slider_nav_bg_hover_color',
			[
				'label' 		=> __( 'Navigation Background Hover Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .slick-arrow:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'wrapper', 'class', 'latProject-slider-active' );
		
		if( $settings['slider_style'] == 'two' ){
			$this->add_render_attribute( 'wrapper', 'class', 'skill-banner-slide' );
		}
		
        if( $settings['slider_loop'] == 'yes' ) {
			$this->add_render_attribute( 'wrapper', 'data-slick-infinite', 'true' );
		} else {
			$this->add_render_attribute('wrapper','data-slick-infinite', 'false' );
		}

		if( $settings['slider_autoplay'] == 'yes' ) {
			$this->add_render_attribute( 'wrapper','data-slick-autoplay', 'true' );
		} else {
			$this->add_render_attribute( 'wrapper','data-slick-autoplay', 'false' );
		}

		if( $settings['slider_nav'] == 'yes' ) {
			$this->add_render_attribute( 'wrapper', 'data-slick-arrows', 'true' );
		} else {
			$this->add_render_attribute( 'wrapper', 'data-slick-arrows', 'false' );
        }
        
		$this->add_render_attribute( 'button','class','primary-btn hover-white');

        if( !empty( $settings['button_link']['url'] ) ) {
            $this->add_render_attribute( 'button','href',esc_url( $settings['button_link']['url'] ));
        }

        if( !empty( $settings['button_link']['nofollow'] ) ) {
            $this->add_render_attribute( 'button','rel','nofollow');
        }

        if( !empty( $settings['button_link']['is_external'] ) ) {
            $this->add_render_attribute( 'button','target','_blank');
        }
		
		if( $settings['slider_style'] == 'one' ){
		
			echo '<div class="latest-project-wrapper pt-120 pb-120">';
				echo '<div class="container">';
					echo '<div class="row wow fadeIn" data-wow-delay="0.4s">';
						echo '<!-- Section Title -->';
			        		echo '<div class="col-xl-5">';
			          			echo '<div class="section-title">';
									if( !empty( $settings['section_title'] ) ){ 
							            echo '<h2 class="title">'.wp_kses_post( $settings['section_title'] ).'</h2>';
									}
									if( !empty( $settings['section_subtitle'] ) ){ 
							            echo '<p class="text">'.wp_kses_post( $settings['section_subtitle'] ).'</p>';
									}
									if( !empty( $settings['button_text'] ) ) {
						                echo '<a '.$this->get_render_attribute_string('button').'>';
											echo esc_html( $settings['button_text'] );
										echo '</a>';
						            }
			          			echo '</div>';
			        		echo '</div>';
			        	echo '<!-- Section Title end -->';
						
						echo '<div class="project-slider-area">';
							if( !empty( $settings['thumb_logo']['url'] ) ){
							  	echo '<!-- Thumb Logo -->';
						  		echo '<div class="thumb-logo">';
									echo wellnez_img_tag( array(
										'url'	=> esc_url( $settings['thumb_logo']['url'] )
									) );
						  		echo '</div>';
							}
				        	echo '<!-- Project Slider -->';
						        echo '<div '.$this->get_render_attribute_string('wrapper').'>';
						            foreach( $settings['slides'] as $singleslide) {
						                if( !empty( $singleslide['post_image']['url'] ) ) {
											echo wellnez_img_tag( array(
												'url'	=> esc_url( $singleslide['post_image']['url'] ),
											) );
						                }
						            }
						        echo '</div>';
					        echo '<!-- End Project Slider -->';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		}else{
			echo '<!-- SKill Area -->';
		    echo '<section class="vs-skill-wrapper vs-skill-layout1">';
		        echo '<div class="container-fluid px-0">';
		            echo '<div class="row gx-0">';
		                echo '<div class="col-xl-6 align-self-center text-center text-xl-left ">';
		                    echo '<div class="vs-skill-content py-3 py-sm-5 py-xl-0">';
								if( !empty( $settings['section_title'] ) ){ 
									echo '<h2 class="skill-title">'.wp_kses_post( $settings['section_title'] ).'</h2>';
								}
								if( !empty( $settings['section_subtitle'] ) ){ 
									echo '<p class="skill-text">'.wp_kses_post( $settings['section_subtitle'] ).'</p>';
								}
								if( !empty( $settings['button_text'] ) ) {
									echo '<a '.$this->get_render_attribute_string('button').'>';
										echo esc_html( $settings['button_text'] );
									echo '</a>';
								}
		                    echo '</div>';
		                echo '</div>';
		                echo '<div class="col-xl-6">';
		                    echo '<div class="skill-banner-area">';
		                        echo '<div class="vs-experiance-box1  text-white">';
		                            echo '<span class="shape-bg"></span>';
		                            echo '<div class="box-content primary-bg2">';
										if( ! empty( $settings['experience_count'] ||  $settings['experience_suffix'] ) ){
											echo '<p class="experiance-count mb-2"><span class="counter">'.esc_html( $settings['experience_count'] ).'</span>'.esc_html( $settings['experience_suffix'] ).'</p>';
										}
		                                if( ! empty( $settings['experience_desc'] ) ){
			                                echo '<p class="experiance-title mb-0">'.esc_html( $settings['experience_desc'] ).'</p>';
										}
		                            echo '</div>';
		                        echo '</div>';
		
								if( ! empty( $settings['counter_slides'] ) ) {
			                        echo '<div class="vs-skill-counter  skill-counter-layout1">';
			                            echo '<div class="row">';
											foreach( $settings['counter_slides'] as $countersingleslide ) {
				                                echo '<div class="col-4">';
				                                    echo '<div class="counter-box d-block">';
														if( ! empty( $countersingleslide['counter_number'] ) ){
				                                        	echo '<span class="counter">'.esc_html( $countersingleslide['counter_number'] ).'</span>';
														}
														if( ! empty( $countersingleslide['counter_text'] ) ){
					                                        echo '<p class="mb-0 counter-text">'.esc_html( $countersingleslide['counter_text'] ).'</p>';
														}
				                                    echo '</div>';
				                                echo '</div>';
											}
			                            echo '</div>';
			                        echo '</div>';
								}
		                        echo '<div class="overlay-shape background-image" data-img="'.esc_url( $settings['slider_shape_image']['url'] ).'"></div>';
		
								echo '<!-- Project Slider -->';
							        echo '<div '.$this->get_render_attribute_string('wrapper').'>';
							            foreach( $settings['slides'] as $singleslide) {
							                if( !empty( $singleslide['post_image']['url'] ) ) {
												echo wellnez_img_tag( array(
													'url'	=> esc_url( $singleslide['post_image']['url'] ),
												) );
							                }
							            }
							        echo '</div>';
						        echo '<!-- End Project Slider -->';
		
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</section>';
		    echo '<!-- SKill Area end -->';
		}
	}

}