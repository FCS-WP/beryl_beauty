<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Background;
/**
 *
 * FAQ Widget .
 *
 */
class Mixlax_Working_Process extends Widget_Base {

	public function get_name() {
		return 'mixlaxworkingprocess';
	}

	public function get_title() {
		return __( 'Working Process', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'working_process_section',
			[
				'label' 	=> __( 'Working Process Content', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'working_process_style',
			[
				'label' 		=> __( 'Working Process Style', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options' 		=> [
					'one'  			=> __( 'Style One', 'mixlax' ),
					'two' 			=> __( 'Style Two', 'mixlax' ),
					'three' 		=> __( 'Style Three', 'mixlax' ),
					'four' 			=> __( 'Style Four', 'mixlax' ),
					'five' 			=> __( 'Style Five', 'mixlax' ),
				],
			]
		);


        $repeater = new Repeater();

		$repeater->add_control(
			'working_process_head_text',
			[
				'label' 	=> __( 'Working Process Head Text', 'mixlax' ),
				'type' 		=> Controls_Manager::TEXTAREA,
			]
		);
		$repeater->add_control(
			'working_process_image',
			[
				'label' 		=> __( 'Choose Image', 'mixlax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'working_process_icon',
			[
				'label' 		=> __( 'Icon ( Works On Version 2 And 3 )', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
			]
		);
		$repeater->add_control(
			'working_process_image_shape',
			[
				'label' 		=> __( 'Image ( Works On Version 4 Only )', 'mixlax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'working_process_title',
			[
				'label' 	=> __( 'Title', 'mixlax' ),
				'type' 		=> Controls_Manager::TEXTAREA,
			]
		);
		$repeater->add_control(
			'working_process_title_url',
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
			'working_process_subtitle',
			[
				'label' 	=> __( 'Sub Title', 'mixlax' ),
				'type' 		=> Controls_Manager::TEXTAREA,
			]
		);

		$this->add_control(
			'working_process',
			[
				'label' 		=> __( 'Working Process', 'mixlax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'working_process_title' => __( 'Make An Appointment','mixlax' ),
					],
					[
						'working_process_title' => __( 'Select Your Services','mixlax' ),
					],
				],
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'working_process_section_style',
			[
				'label' 	=> __( 'General', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'working_process_head_bg_one',
			[
				'label' 		=> __( 'Working Process Head Backgorund', 'mixlax' ),
				'type' 			=> Controls_Manager::HEADING,
				'separator' 	=> 'after',
				'condition'		=> [ 'working_process_style' => 'one' ],
			]
		);
		$this->add_control(
			'working_process_head_background_one',
			[
				'label' 		=> __( 'Working Process Head Odd Backgorund', 'mixlax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
				'selectors' => [
                    '{{WRAPPER}} .work-process-layout1 .work-process .process-head:before' 		=> 'background-image: url({{URL}});',
                ],
				'condition'		=> [ 'working_process_style' => 'one' ],
			]
		);
		$this->add_control(
			'working_process_head_bg_two',
			[
				'label' 		=> __( 'Working Process Head Backgorund', 'mixlax' ),
				'type' 			=> Controls_Manager::HEADING,
				'separator' 	=> 'after',
				'condition'		=> [ 'working_process_style' => 'one' ],
			]
		);
		$this->add_control(
			'working_process_head_background_two',
			[
				'label' 		=> __( 'Working Process Head Even Backgorund', 'mixlax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
				'selectors' => [
                    '{{WRAPPER}} .work-process-layout1 .row > div:nth-child(even) .work-process .process-head:before' 		=> 'background-image: url({{URL}});',
                ],
				'condition'		=> [ 'working_process_style' => 'one' ],
			]
		);
		$this->add_control(
			'working_process_shape_image',
			[
				'label' 		=> __( 'Working Process Shape Image', 'mixlax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'working_process_style' => [ 'two','three' ] ],
			]
		);
		$this->add_control(
			'working_process_image_bg_one',
			[
				'label' 		=> __( 'Working Process Shape Image One', 'mixlax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
				'selectors' => [
                    '{{WRAPPER}} .work-process-layout2 .container .row > div:nth-child(1) .work-process:before' 		=> 'background-image: url({{URL}});',
                ],
				'condition'		=> [ 'working_process_style' => 'two' ],
			]
		);
		$this->add_control(
			'working_process_image_bg_two',
			[
				'label' 		=> __( 'Working Process Shape Image Two', 'mixlax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
				'selectors' => [
                    '{{WRAPPER}} .work-process-layout2 .container .row > div:nth-child(2) .work-process:before' 		=> 'background-image: url({{URL}});',
                ],
				'condition'		=> [ 'working_process_style' => 'two' ],
			]
		);
		$this->add_control(
			'working_process_image_bg_three',
			[
				'label' 		=> __( 'Working Process Shape Image Three', 'mixlax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
				'selectors' => [
                    '{{WRAPPER}} .work-process-layout2 .container .row > div:nth-child(3) .work-process:before' 		=> 'background-image: url({{URL}});',
                ],
				'condition'		=> [ 'working_process_style' => 'two' ],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' 	=> __( 'Section Style', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Title Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .work-process-layout1 .work-process .process-content .title,{{WRAPPER}} .work-process-layout2 .work-process .process-content .title,{{WRAPPER}} .work-process-layout3 .work-process .process-content .title,{{WRAPPER}} .work-process-layout5 .work-process .process-body .process-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'label' 		=> __( 'Title Typography', 'mixlax' ),
				'selector' 		=> '{{WRAPPER}} .work-process-layout1 .work-process .process-content .title,{{WRAPPER}} .work-process-layout2 .work-process .process-content .title,{{WRAPPER}} .work-process-layout3 .work-process .process-content .title,{{WRAPPER}} .work-process-layout5 .work-process .process-body .process-title',
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' 		=> __( 'Subtitle Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .work-process-layout1 .work-process .process-content .text,{{WRAPPER}} .work-process-layout2 .work-process .process-content .text,{{WRAPPER}} .work-process-layout3 .work-process .process-content .text,{{WRAPPER}} .work-process-layout5 .work-process .process-body .process-text' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'subtitle_typography',
				'label' 		=> __( 'Subtitle Typography', 'mixlax' ),
				'selector' 		=> '{{WRAPPER}} .work-process-layout1 .work-process .process-content .text,{{WRAPPER}} .work-process-layout2 .work-process .process-content .text,{{WRAPPER}} .work-process-layout3 .work-process .process-content .text,{{WRAPPER}} .work-process-layout5 .work-process .process-body .process-text',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( $settings['working_process_style'] == 'one' ){
			if( !empty( $settings['working_process'] ) ){
				echo '<div class="work-process-wrap work-process-layout1">';
					echo '<div class="container">';
						echo '<div class="row wow fadeInUp">';
							foreach( $settings['working_process'] as $working_process ){
								echo '<!-- Signle Work Process -->';
							        echo '<div class="col-sm-6 col-xl-3">';
							          	echo '<div class="work-process">';
											if( !empty( $working_process['working_process_head_text'] ) ){
								            	echo '<div class="process-head">';
								              		echo '<span class="icon ripple-wrap">';
								                		echo '<span class="text">'.esc_html( $working_process['working_process_head_text'] ).'</span>';
										                echo '<span class="ripple ripple-1"></span>';
										                echo '<span class="ripple ripple-2"></span>';
										                echo '<span class="ripple ripple-3"></span>';
								              		echo '</span>';
								            	echo '</div>';
											}
							            	echo '<div class="process-body">';
												if( !empty( $working_process['working_process_image']['url'] ) ){
									              	echo '<div class="process-img">';
														echo wellnez_img_tag( array(
															'url'	=> esc_url( $working_process['working_process_image']['url'] ),
														));
									              	echo '</div>';
												}
								              	echo '<div class="process-content">';
													if( !empty( $working_process['working_process_title'] ) ){
								                		echo '<h3 class="title">';
															if( !empty( $working_process['working_process_title_url']['url'] ) ){
																$target 	= $working_process['working_process_title_url']['is_external'] ? ' target="_blank"' : '';
																$nofollow 	= $working_process['working_process_title_url']['nofollow'] ? ' rel="nofollow"' : '';
																echo '<a '.wp_kses_post( $target.$nofollow ).' href="'.esc_url( $working_process['working_process_title_url']['url'] ).'">';
															}
															echo esc_html( $working_process['working_process_title'] );
															if( !empty( $working_process['working_process_title_url']['url'] ) ){
																echo '</a>';
															}
														echo '</h3>';
													}
													if( !empty( $working_process['working_process_subtitle'] ) ){
									                	echo '<p>'.wp_kses_post( $working_process['working_process_subtitle'] ).'</p>';
													}
								              	echo '</div>';
							            	echo '</div>';
						          		echo '</div>';
						        	echo '</div>';
						        echo '<!-- Signle Work Process -->';
							}
						echo '</div>';
					echo '</div>';
				echo '</div>';
			}
		}elseif( $settings['working_process_style'] == 'two' ){
			if( !empty( $settings['working_process'] ) ){
				echo '<!-- work process -->';
				echo '<section class="work-process-wrap work-process-layout2">';
					if( !empty( $settings['working_process_shape_image']['url'] ) ){
					  	echo '<!-- Bg Shape Image  -->';
					  	echo '<div class="shape-bg">';
					    	echo wellnez_img_tag( array(
								'url'		=> esc_url( $settings['working_process_shape_image']['url'] )
							) );
					  	echo '</div>';
					}
				  	echo '<div class="container">';
				    	echo '<div class="row wow fadeInUp" data-wow-delay="0.4s">';
							foreach( $settings['working_process'] as $working_process ){
					      		echo '<!-- Single Work Process -->';
					      		echo '<div class="col-sm-6 col-xl-4">';
					        		echo '<div class="work-process">';
										if( !empty( $working_process['working_process_icon'] ) ){
							          		echo '<!-- Icon -->';
								          	echo '<div class="icon">';
								            	echo '<span data-no="'.esc_attr( $working_process['working_process_head_text'] ).'"><i class="'.esc_attr( $working_process['working_process_icon'] ).'"></i></span>';
								          	echo '</div>';
										}
						          		echo '<!-- Process Content -->';
							          	echo '<div class="process-content">';
											if( !empty( $working_process['working_process_title'] ) ){
												echo '<h3 class="title">';
													if( !empty( $working_process['working_process_title_url']['url'] ) ){
														$target 	= $working_process['working_process_title_url']['is_external'] ? ' target="_blank"' : '';
														$nofollow 	= $working_process['working_process_title_url']['nofollow'] ? ' rel="nofollow"' : '';
														echo '<a '.wp_kses_post( $target.$nofollow ).' href="'.esc_url( $working_process['working_process_title_url']['url'] ).'">';
													}
													echo esc_html( $working_process['working_process_title'] );
													if( !empty( $working_process['working_process_title_url'] ) ){
														echo '</a>';
													}
												echo '</h3>';
											}
											if( !empty( $working_process['working_process_subtitle'] ) ){
												echo '<p>'.wp_kses_post( $working_process['working_process_subtitle'] ).'</p>';
											}
							          	echo '</div>';
					        		echo '</div>';
					      		echo '</div>';
							}
				    	echo '</div><!-- .row END -->';
				  	echo '</div><!-- .container END -->';
				echo '</section>';
				echo '<!-- work process end -->';
			}
		}elseif( $settings['working_process_style'] == 'three' ){
			if( !empty( $settings['working_process'] ) ){
				echo '<!-- work process -->';
				echo '<section class="work-process-wrap work-process-layout3">';
				  	echo '<div class="container">';
						if( !empty( $settings['working_process_shape_image']['url'] ) ){
						  	echo '<!-- Bg Shape Image  -->';
						  	echo '<div class="shape-bg">';
							  	echo wellnez_img_tag( array(
								  	'url'		=> esc_url( $settings['working_process_shape_image']['url'] )
							  	) );
						  	echo '</div>';
						 }
					    echo '<div class="row wow fadeInUp" data-wow-delay="0.4s">';
							foreach( $settings['working_process'] as $working_process ){
						      	echo '<!-- Single Work Process -->';
						      	echo '<div class="col-sm-6">';
						        	echo '<div class="work-process">';
										if( !empty( $working_process['working_process_icon'] ) ){
							          		echo '<!-- Icon -->';
							          		echo '<div class="icon">';
							            		echo '<span><i class="'.esc_attr( $working_process['working_process_icon'] ).'"></i></span>';
							          		echo '</div>';
										}
						          		echo '<!-- Process Content -->';
						          		echo '<div class="process-content">';
											if( !empty( $working_process['working_process_title'] ) ){
												echo '<h3 class="title">';
													if( !empty( $working_process['working_process_title_url']['url'] ) ){
														$target 	= $working_process['working_process_title_url']['is_external'] ? ' target="_blank"' : '';
														$nofollow 	= $working_process['working_process_title_url']['nofollow'] ? ' rel="nofollow"' : '';
														echo '<a '.wp_kses_post( $target.$nofollow ).' href="'.esc_url( $working_process['working_process_title_url']['url'] ).'">';
													}
													echo esc_html( $working_process['working_process_title'] );
													if( !empty( $working_process['working_process_title_url'] ) ){
														echo '</a>';
													}
												echo '</h3>';
											}
											if( !empty( $working_process['working_process_subtitle'] ) ){
												echo '<p>'.wp_kses_post( $working_process['working_process_subtitle'] ).'</p>';
											}
						          		echo '</div>';
						        	echo '</div>';
						      	echo '</div>';
							}
					    echo '</div><!-- .row END -->';
					echo '</div><!-- .container END -->';
				echo '</section>';
				echo '<!-- work process end -->';
			}
		}elseif( $settings['working_process_style'] == 'four' ){
			if( !empty( $settings['working_process'] ) ){
				echo '<!-- work process -->';
				echo '<section class="work-process-wrap work-process-layout4">';
				  	echo '<div class="container">';
				  		echo '<div class="process-area">';
							foreach( $settings['working_process'] as $working_process ){
						      	echo '<!-- Single Work Process -->';
						      	echo '<div class="work-process d-lg-inline-flex align-self-start">';
									if( !empty( $working_process['working_process_image_shape']['url'] ) ){
										echo '<div class="line-shape">';
											echo wellnez_img_tag( array(
												'url'	=> esc_url( $working_process['working_process_image_shape']['url'] )
											) );
					                    echo '</div>';
									}
									if( !empty( $working_process['working_process_head_text'] ) ){
										echo '<div class="process-head">';
											echo '<span class="process-icon ripple-wrap">';
												echo '<span class="icon-text">'.esc_html( $working_process['working_process_head_text'] ).'</span>';
												echo '<span class="ripple ripple-1"></span>';
												echo '<span class="ripple ripple-2"></span>';
												echo '<span class="ripple ripple-3"></span>';
											echo '</span>';
											if( !empty( $working_process['working_process_image']['url'] ) ){
												echo '<div class="process-img">';
													echo wellnez_img_tag( array(
														'url'	=> esc_url( $working_process['working_process_image']['url'] ),
														'class' => 'w-100',
													));
												echo '</div>';
											}
										echo '</div>';
									}
									echo '<div class="process-body align-self-center">';
										if( !empty( $working_process['working_process_title'] ) ){
											echo '<h3 class="process-title mb-10 h4">';
												if( !empty( $working_process['working_process_title_url']['url'] ) ){
													$target 	= $working_process['working_process_title_url']['is_external'] ? ' target="_blank"' : '';
													$nofollow 	= $working_process['working_process_title_url']['nofollow'] ? ' rel="nofollow"' : '';
													echo '<a '.wp_kses_post( $target.$nofollow ).' href="'.esc_url( $working_process['working_process_title_url']['url'] ).'">';
												}
												echo esc_html( $working_process['working_process_title'] );
												if( !empty( $working_process['working_process_title_url']['url'] ) ){
													echo '</a>';
												}
											echo '</h3>';
										}
										if( !empty( $working_process['working_process_subtitle'] ) ){
											echo '<p class="mb-0">'.wp_kses_post( $working_process['working_process_subtitle'] ).'</p>';
										}
									echo '</div>';
						      	echo '</div>';
							}
					    echo '</div><!-- .row END -->';
					echo '</div><!-- .container END -->';
				echo '</section>';
				echo '<!-- work process end -->';
			}
		}else{
			if( !empty( $settings['working_process'] ) ){
				echo '<!-- work process -->';
				echo '<section class="work-process-wrap work-process-layout5">';
				  	echo '<div class="container">';
				  		echo '<div class="row gx-xxl-0 mb-30">';
							foreach( $settings['working_process'] as $working_process ){
								echo '<div class="col-md-6">';
				                    echo '<div class="work-process">';
				                        echo '<div class="row gx-0 align-items-center">';
				                            echo '<div class="col-xl-6">';
												if( !empty( $working_process['working_process_image']['url'] ) ){
													echo '<div class="process-img">';
														echo wellnez_img_tag( array(
															'url'	=> esc_url( $working_process['working_process_image']['url'] ),
															'class' => 'w-100',
														));
													 echo '</div>';
												}
				                            echo '</div>';
				                            echo '<div class="col-xl-6">';
				                                echo '<div class="process-body">';
													if( !empty( $working_process['working_process_head_text'] ) ){
					                                    echo '<span class="process-number">'.esc_html( $working_process['working_process_head_text'] ).'</span>';
													}
													if( !empty( $working_process['working_process_title'] ) ){
					                                    echo '<h3 class="process-title h4 mb-2 text-white">';
															if( !empty( $working_process['working_process_title_url']['url'] ) ){
																$target 	= $working_process['working_process_title_url']['is_external'] ? ' target="_blank"' : '';
																$nofollow 	= $working_process['working_process_title_url']['nofollow'] ? ' rel="nofollow"' : '';
																echo '<a '.wp_kses_post( $target.$nofollow ).' href="'.esc_url( $working_process['working_process_title_url']['url'] ).'">';
															}
															echo esc_html( $working_process['working_process_title'] );
															if( !empty( $working_process['working_process_title_url']['url'] ) ){
																echo '</a>';
															}
														echo '</h3>';
													}
													if( !empty( $working_process['working_process_subtitle'] ) ){
					                                    echo '<p class="process-text text-white mb-0">'.wp_kses_post( $working_process['working_process_subtitle'] ).'</p>';
													}
				                                echo '</div>';
				                            echo '</div>';
				                        echo '</div>';
				                    echo '</div>';
				                echo '</div>';
							}
					    echo '</div><!-- .row END -->';
					echo '</div><!-- .container END -->';
				echo '</section>';
				echo '<!-- work process end -->';
			}
		}
	}

}