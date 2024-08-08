<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Testimonial Slider Widget .
 *
 */
class Mixlax_Testimonial_Slider extends Widget_Base{

	public function get_name() {
		return 'mixlaxtestimonialslider';
	}

	public function get_title() {
		return __( 'Testimonial Slider', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'testimonial_slider_section',
			[
				'label' 	=> __( 'Testimonial Slider', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'testimonial_style',
			[
				'label' 		=> __( 'Testimonial Style', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> __( 'Style One', 'mixlax' ),
					'two' 			=> __( 'Style Two', 'mixlax' ),
					'three' 		=> __( 'Style Three', 'mixlax' ),
					'four' 			=> __( 'Style Four', 'mixlax' ),
					'five' 			=> __( 'Style Five', 'mixlax' ),
				],
			]
		);

		$this->add_control(
			'separator_style',
			[
				'label' 		=> __( 'Separator Style', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options' 		=> [
					'one'  			=> __( 'One', 'mixlax' ),
					'two' 			=> __( 'Two', 'mixlax' ),
				],
			]
		);
		$this->add_control(
			'image',
			[
				'label' 		=> __( 'Choose Image', 'mixlax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'separator_style' => 'two' ]
			]
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'client_name', [
				'label' 		=> __( 'Client Name', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Rosalina D. William' , 'mixlax' ),
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'client_designation', [
				'label' 		=> __( 'Client Designation', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Customer' , 'mixlax' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'client_feedback_title', [
				'label' 		=> __( 'Client Feedback Title', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'The night was so exicted with full of satisfication with a good service and food.' , 'mixlax' ),
				'label_block' 	=> true,
			]
		);
        $repeater->add_control(
			'client_feedback_description', [
				'label' 		=> __( 'Client Feedback Description', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' , 'mixlax' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'client_image',
			[
				'label' 		=> __( 'Client Image', 'mixlax' ),
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
						'client_name' 		=> __( 'Rosalina D. William', 'mixlax' ),
						'client_feedback' 	=> __( 'Etiam convallis elementum sapien, a aliquam turpis aliquam vitae.', 'mixlax' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'client_name' 		=> __( 'Rosalina D. William', 'mixlax' ),
						'client_feedback' 	=> __( 'Etiam convallis elementum sapien, a aliquam turpis aliquam vitae.', 'mixlax' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'client_name' 		=> __( 'Rosalina D. William', 'mixlax' ),
						'client_feedback' 	=> __( 'Etiam convallis elementum sapien, a aliquam turpis aliquam vitae.', 'mixlax' ),
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
				'label' 	=> __( 'General', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'	=> [ 'testimonial_style!' => 'four' ],
			]
        );

		$this->add_control(
			'quote_icon_color',
			[
				'label' 		=> __( 'Quote Icon Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .quote-icon-style1,{{WRAPPER}} .vs-testimonial-layout3 .icon-quote' => 'color: {{VALUE}}',
				],
			]
        );

		$this->add_control(
			'quote_icon_ropund_bg_color',
			[
				'label' 		=> __( 'Quote Icon Round Shape Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .quote-icon-style1:before' => 'background-color: {{VALUE}}',
				],
				'condition'		=> [ 'testimonial_style' => [ 'one', 'two', 'three' ] ]
			]
        );

		$this->add_control(
			'quote_icon_bottom_bg_color',
			[
				'label' 		=> __( 'Quote Icon Bottom Shape Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .quote-icon-style1:after'  => 'background-color: {{VALUE}}',
				],
				'condition'		=> [ 'testimonial_style' => [ 'one', 'two', 'three' ] ],
			]
        );
		$this->add_control(
			'box_background_color',
			[
				'label' 		=> __( 'Box Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-testimonial-layout3 .vs-testimonial' => 'background-color: {{VALUE}}',
				],
				'condition'		=> [ 'testimonial_style' => 'five' ],
			]
		);
		$this->add_control(
			'star_color',
			[
				'label' 		=> __( 'Star Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-testimonial-layout3 .rating' => 'color: {{VALUE}}',
				],
				'condition'		=> [ 'testimonial_style' => 'five' ],
			]
		);
		$this->end_controls_section();

        $this->start_controls_section(
			'testimonial_slider_client_name_style_section',
			[
				'label' 	=> __( 'Client Name', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'testimonial_slider_client_name_color',
			[
				'label' 		=> __( 'Client Name Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .author-content .name,{{WRAPPER}} .author-name' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'testimonial_slider_client_name_typography',
				'label' 	=> __( 'Client Name Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .author-content .name,{{WRAPPER}} .author-name',
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_name_margin',
			[
				'label' 		=> __( 'Client Name Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .author-content .name,{{WRAPPER}} .author-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_name_padding',
			[
				'label' 		=> __( 'Client Name Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .author-content .name,{{WRAPPER}} .author-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'testimonial_slider_designation_style_section',
			[
				'label' 	=> __( 'Designation', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'testimonial_slider_designation_color',
			[
				'label' 	=> __( 'Client Designation Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .author-content .designation,{{WRAPPER}} .vs-testimonial-layout3 .degi,{{WRAPPER}} .testimonial-content .author-name .designation' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'testimonial_slider_designation_typography',
				'label' 	=> __( 'Client Designation Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .author-content .designation,{{WRAPPER}} .vs-testimonial-layout3 .degi,{{WRAPPER}} .testimonial-content .author-name .designation',
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_designation_margin',
			[
				'label' 		=> __( 'Client Designation Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .author-content .designation,{{WRAPPER}} .vs-testimonial-layout3 .degi,{{WRAPPER}} .testimonial-content .author-name .designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_designation_padding',
			[
				'label' 		=> __( 'Client Designation Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .author-content .designation,{{WRAPPER}} .vs-testimonial-layout3 .degi,{{WRAPPER}} .testimonial-content .author-name .designation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'testimonial_slider_client_feedback_style_section',
			[
				'label' 	=> __( 'Client Feedback Title', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'testimonial_slider_client_feedback_color',
			[
				'label' 	=> __( 'Client Feedback Title Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-content .title' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'testimonial_slider_client_feedback_typography',
				'label' 	=> __( 'Client Feedback Title Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .testimonial-content .title',
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_feedback_margin',
			[
				'label' 		=> __( 'Client Feedback Title Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testimonial-content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_feedback_padding',
			[
				'label' 		=> __( 'Client Feedback Title Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testimonial-content .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'testimonial_slider_client_feedback_description_style_section',
			[
				'label' 	=> __( 'Client Feedback Description', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'testimonial_slider_client_feedback_description_color',
			[
				'label' 	=> __( 'Client Feedback Description Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-content .description,{{WRAPPER}} .testi-text,{{WRAPPER}} .testimonial-content .description' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'testimonial_slider_client_feedback_description_typography',
				'label' 	=> __( 'Client Feedback Description Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .testimonial-content .description,{{WRAPPER}} .testi-text,{{WRAPPER}} .testimonial-content .description',
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_feedback_description_margin',
			[
				'label' 		=> __( 'Client Feedback Description Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testimonial-content .description,{{WRAPPER}} .testi-text,{{WRAPPER}} .testimonial-content .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_feedback_description_padding',
			[
				'label' 		=> __( 'Client Feedback Description Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testimonial-content .description,{{WRAPPER}} .testi-text,{{WRAPPER}} .testimonial-content .description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();




	}

	protected function render() {

		$settings = $this->get_settings_for_display();

	    $this->add_render_attribute( 'wrapper', 'class', 'row justify-content-center' );

		if( $settings['testimonial_style'] == 'two' ){
			$gap_class = "space-top space-md-bottom";
		}else{
			$gap_class = "";
		}

		if( $settings['testimonial_style'] == 'one' || $settings['testimonial_style'] == 'two' || $settings['testimonial_style'] == 'three' ){
			if( !empty( $settings['slides'] ) ){
				echo '<div class="vs-testimonial-wrapper vs-testimonial-layout1 '.esc_attr( $gap_class ).'">';
				  	echo '<div class="container">';
						echo '<div '.$this->get_render_attribute_string( 'wrapper' ).'>';
							echo '<div class="col-12 text-center z-index-common">';
								echo '<div class="quote-icon-style1 fa-4x testi-icon1"><i class="fal fa-quote-right"></i></div>';
							echo '</div>';
							echo '<div class="col-xl-10">';
								echo '<div class="testimonial-content-area testi-slide1 vs-carousel" id="testi-content" data-arrows="false" data-fade="true" data-asnavfor="#testi-author-name, #testi-author" data-slidetoshow="1" data-mdslidetoshow="1">';
									foreach( $settings['slides'] as $singleslide ) {
										echo '<div class="testimonial-content">';
											echo '<h2 class="title testi-title">'.wp_kses_post( $singleslide['client_feedback_title'] ).'</h2>';
											echo '<p class="description testi-text">'.wp_kses_post( $singleslide['client_feedback_description'] ).'</p>';
										echo '</div>';
									}
								echo '</div>';
							echo '</div>';
							if( $settings['testimonial_style'] == 'three' ){
								echo '<div class="col-xl-3">';
									echo '<div class="testimonial-author-style1 text-center" id="testi-author-name" data-fade="true" data-asnavfor="#testi-content, #testi-author" data-slidetoshow="1">';
										foreach( $settings['slides'] as $singleslide ) {
											echo '<div class="author-content">';
												if( ! empty( $singleslide['client_name'] ) ){
													echo '<h3 class="name h4 mb-0">'.esc_html( $singleslide['client_name'] ).'</h3>';
												}
												if( ! empty( $singleslide['client_designation'] ) ){
													echo '<span class="designation mb-0 text-bold">'.esc_html( $singleslide['client_designation'] ).'</span>';
												}
											echo '</div>';
										}
									echo '</div>';
								echo '</div>';
							}
							if( $settings['separator_style'] == 'one' ){
								echo '<div class="col-12">';
			                    	echo '<div class="testimonial-border-line testi-divider1">';
			                        	echo '<div class="border-css"></div>';
			                    	echo '</div>';
			                	echo '</div>';
							}else{
								if( ! empty( $settings['image']['url'] ) ){
									if( $settings['testimonial_style'] == 'three' ){
										$class = "mb-2";
									}else{
										$class = "";
									}
									echo '<div class="col-12">';
					                    echo '<div class="testimonial-border-line testi-img-divider1 text-center '.esc_attr( $class ).'">';
											echo wellnez_img_tag( array(
												'url'	=> esc_url( $settings['image']['url'] )
											) );
					                    echo '</div>';
					                echo '</div>';
								}
							}
							echo '<div class="col-xl-12">';
								echo '<div class="testimonial-avater-style1 testi-slide2" id="testi-author" data-asnavfor="#testi-author-name, #testi-content" data-slidetoshow="3" data-centermode="true" data-variablewidth="true">';
									foreach( $settings['slides'] as $singleslide ) {
										if( ! empty( $singleslide['client_image']['url'] ) ){
											echo '<div class="author-img">';
												echo '<div class="testi-avater">';
													echo wellnez_img_tag( array(
														'url'	=> esc_url( $singleslide['client_image']['url'] ),
														'class'	=> 'w-100',
													) );
												echo '</div>';
											echo '</div>';
										}
									}
								echo '</div>';
							echo '</div>';
							if( $settings['testimonial_style'] == 'one' || $settings['testimonial_style'] == 'two' ){
								echo '<div class="col-xl-3">';
									echo '<div class="testimonial-author-style1 testi-slide3" id="testi-author-name" data-fade="true" data-asnavfor="#testi-content, #testi-author" data-slidetoshow="1">';
										foreach( $settings['slides'] as $singleslide ) {
											echo '<div class="author-content">';
												if( ! empty( $singleslide['client_name'] ) ){
													echo '<h3 class="name h4 testi-name">'.esc_html( $singleslide['client_name'] ).'</h3>';
												}
												if( ! empty( $singleslide['client_designation'] ) ){
													echo '<span class="designation testi-degi">'.esc_html( $singleslide['client_designation'] ).'</span>';
												}
											echo '</div>';
										}
									echo '</div>';
								echo '</div>';
							}

						echo '</div><!-- .row END -->';
					echo '</div>';
					if( $settings['testimonial_style'] == 'two' ){
						echo '<div class="testimonial-avater-style2 d-none d-xl-block" id="testi-author-style2" data-asnavfor="#testi-author-name, #testi-content, #testi-author" data-slidetoshow="3" data-centermode="true" data-variablewidth="true">';
							foreach( $settings['slides'] as $singleslide ) {
								if( ! empty( $singleslide['client_image']['url'] ) ){
									echo '<div class="author-img">';
										echo wellnez_img_tag( array(
											'url'	=> esc_url( $singleslide['client_image']['url'] ),
											'class'	=> 'w-100',
										) );
									echo '</div>';
								}
							}
				        echo '</div>';
					}
				echo '</div>';
			}
		}elseif( $settings['testimonial_style'] == 'four' ){
			if( ! empty( $settings['slides'] ) ){
				echo '<div class="vs-testimonial-layout2 vs-carousel px-60 py-60" data-slidetoshow="1" data-arrows="false">';
					foreach( $settings['slides'] as $singleslide ) {
						echo '<div class="vs-testimonial d-md-flex">';
							if( ! empty( $singleslide['client_image']['url'] ) ){
								echo '<div class="author-img">';
									echo wellnez_img_tag( array(
										'url'	=> esc_url( $singleslide['client_image']['url'] ),
										'class'	=> 'w-100',
									) );
								echo '</div>';
							}
							echo '<div class="testimonial-content">';
								if( ! empty( $singleslide['client_feedback_description'] ) ){
									echo '<p class="h4 text-font1 mb-3 description">'.wp_kses_post( $singleslide['client_feedback_description'] ).'</p>';
								}
								echo '<h3 class="author-name mb-0">';
									if( ! empty( $singleslide['client_name'] ) ){
										echo esc_html( $singleslide['client_name'] ) ;
									}
									if( ! empty( $singleslide['client_designation'] ) ){
										echo ' <strong class="designation text-font1 text-sm">'. esc_html( $singleslide['client_designation'] ).'</strong>';
									}
								echo '</h3>';
							echo '</div>';
						echo '</div>';
					}
				echo '</div>';
			}
		}else{
			if( !empty( $settings['slides'] ) ){
				echo '<!-- Testomonial Section -->';
			  	echo '<div class="vs-testimonial-wrapper vs-testimonial-layout3">';
				  	echo '<div class="container z-index-common">';
				  		echo '<div class="row vs-carousel" data-slidetoshow="3" data-mdslidetoshow="2" data-arrows="false">';
							foreach( $settings['slides'] as $singleslide ) {
								echo '<div class="col-lg-4">';
				                    echo '<div class="vs-testimonial testi-style3">';
				                        echo '<span class="icon-quote"><i class="fas fa-quote-right"></i></span>';
																if( ! empty( $singleslide['client_image']['url'] ) ){
																	echo '<div class="author-img">';
																		echo wellnez_img_tag( array(
																			'url'	=> esc_url( $singleslide['client_image']['url'] ),
																		) );
																	echo '</div>';
																}
				                        echo '<div class="testimonial-content">';
				                            echo '<div class="rating">';
				                                echo '<i class="fas fa-star"></i>';
				                                echo '<i class="fas fa-star"></i>';
				                                echo '<i class="fas fa-star"></i>';
				                                echo '<i class="fas fa-star"></i>';
				                                echo '<i class="fas fa-star"></i>';
				                            echo '</div>';
																if( ! empty( $singleslide['client_feedback_description'] ) ){
																	echo '<p class="testi-text">'.wp_kses_post( $singleslide['client_feedback_description'] ).'</p>';
																}
																if( ! empty( $singleslide['client_name'] ) ){
																	echo '<h3 class="author-name h5">'.esc_html( $singleslide['client_name'] ).'</h3>' ;
																}
																if( ! empty( $singleslide['client_designation'] ) ){
																	echo '<span class="degi">'.esc_html( $singleslide['client_designation'] ).'</span>';
																}
				                        echo '</div>';
				                    echo '</div>';
				                echo '</div>';
							}
				  		echo '</div>';
				  	echo '</div>';
			  	echo '</div>';
			  	echo '<!-- Testomonial Section end -->';
			}
		}
	}

}