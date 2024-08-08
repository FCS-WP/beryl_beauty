<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
/**
 *
 * Team Widget .
 *
 */
class Mixlax_Team_Member extends Widget_Base {

	public function get_name() {
		return 'mixlaxteammember';
	}

	public function get_title() {
		return __( 'Team Member', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'image_section',
			[
				'label'     => __( 'Team Member', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'team_style',
			[
				'label' 		=> __( 'Team Style', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options' 		=> [
					'one'  			=> __( 'Style One', 'mixlax' ),
					'two' 			=> __( 'Style Two', 'mixlax' ),
					'three' 		=> __( 'Style Three', 'mixlax' ),
					'four' 			=> __( 'Style Four', 'mixlax' ),
				],
			]
		);

		$this->add_control(
			'team_variation',
			[
				'label' 		=> __( 'Team Variation', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'slider',
				'options' 		=> [
					'slider'  		=> __( 'Slider', 'mixlax' ),
					'grid' 			=> __( 'Grid', 'mixlax' ),
				],
			]
		);

		$this->add_control(
			'team_grid',
			[
				'label' 		=> __( 'Team Grid', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '3',
				'options' 		=> [
					'6'  			=> __( '2 Column', 'mixlax' ),
					'4' 			=> __( '3 Column', 'mixlax' ),
					'3' 			=> __( '4 Column', 'mixlax' ),
					'2' 			=> __( '6 Column', 'mixlax' ),
				],
				'condition'		=> [ 'team_variation'	=> 'grid' ],
			]
		);

		$repeater = new Repeater();

        $repeater->add_control(
			'team_member_image',
			[
				'label'     => __( 'Team Member Image', 'mixlax' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater->add_control(
			'person_name',
            [
				'label'         => __( 'Person Name', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'John Steven' , 'mixlax' ),
				'label_block'   => true,
			]
		);
		$repeater->add_control(
			'person_details_url',
			[
				'label' 		=> __( 'Person Details Url', 'mixlax' ),
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
			'person_designation',
            [
				'label'         => __( 'Person Designation', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Founder' , 'mixlax' ),
				'label_block'   => true,
			]
		);
		$repeater->add_control(
			'social_icon_one',
			[
				'label' 		=> __( 'Social Icon One', 'mixlax' ),
				'type' 			=> Controls_Manager::ICONS,
				'default' 		=> [
					'value' 		=> 'fab fa-facebook-f',
					'library' 		=> 'solid',
				],
			]
		);
		$repeater->add_control(
			'social_icon_one_link',
			[
				'label' 		=> __( 'Social Icon Link One', 'mixlax' ),
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
			'social_icon_two',
			[
				'label' 		=> __( 'Social Icon Two', 'mixlax' ),
				'type' 			=> Controls_Manager::ICONS,
				'default' 		=> [
					'value' 		=> 'fab fa-facebook-f',
					'library' 		=> 'solid',
				],
			]
		);
		$repeater->add_control(
			'social_icon_two_link',
			[
				'label' 		=> __( 'Social Icon Link Two', 'mixlax' ),
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
			'social_icon_three',
			[
				'label' 		=> __( 'Social Icon Three', 'mixlax' ),
				'type' 			=> Controls_Manager::ICONS,
				'default' 		=> [
					'value' 		=> 'fab fa-facebook-f',
					'library' 		=> 'solid',
				],
			]
		);
		$repeater->add_control(
			'social_icon_three_link',
			[
				'label' 		=> __( 'Social Icon Link Three', 'mixlax' ),
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
			'social_icon_four',
			[
				'label' 		=> __( 'Social Icon Four', 'mixlax' ),
				'type' 			=> Controls_Manager::ICONS,
				'default' 		=> [
					'value' 		=> 'fab fa-facebook-f',
					'library' 		=> 'solid',
				],
			]
		);
		$repeater->add_control(
			'social_icon_four_link',
			[
				'label' 		=> __( 'Social Icon Link Four', 'mixlax' ),
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
		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Team Member', 'mixlax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'image' 	=> Utils::get_placeholder_image_src(),
					],
					[
						'image' 	=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{person_name}}',
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'slider_control_section',
			[
				'label' 		=> __( 'Slider Control', 'mixlax' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'slide_to_show',
			[
				'label' 		=> __( 'Slide To Show', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 			=> [
						'min' 			=> 0,
						'max' 			=> 10,
						'step'			=> 1,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 4,
				],
			]
		);
        $this->end_controls_section();

		$this->start_controls_section(
			'general',
			[
				'label' 	=> __( 'General', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'social_icon_color',
			[
				'label' 		=> __( 'Social Icon Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .social-links li a i' => 'color: {{VALUE}}',
                ]
			]
        );

		$this->add_control(
			'social_icon_hover_color',
			[
				'label' 		=> __( 'Social Icon Hover Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .social-links li a:hover i' => 'color: {{VALUE}}',
                ]
			]
        );

		$this->add_control(
			'social_icon_background_color',
			[
				'label' 		=> __( 'Social Icon Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .social-links li a' => 'background-color: {{VALUE}}',
                ],
				'condition'		=> [ 'team_style' => [ 'one', 'two' ] ]
			]
        );

		$this->add_control(
			'social_icon_hover_background_color',
			[
				'label' 		=> __( 'Social Icon Hover Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .social-links li a:hover' => 'background-color: {{VALUE}}',
                ],
				'condition'		=> [ 'team_style' => [ 'one', 'two' ] ]
			]
        );

		$this->add_control(
			'team_background_color',
			[
				'label' 		=> __( 'Team Box Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-team-layout3 .vs-team:before' => 'background-color: {{VALUE}}',
                ],
				'condition'		=> [ 'team_style' => 'three' ],
			]
        );

		$this->add_control(
			'team_box_hover_background_color',
			[
				'label' 		=> __( 'Team Box Hover Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-team-layout3 .vs-team:hover:before' => 'background-color: {{VALUE}}',
                ],
				'condition'		=> [ 'team_style' => 'three' ],
			]
        );

		$this->add_control(
			'team_box_hover_text_color',
			[
				'label' 		=> __( 'Team Box Hover Text Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-team-layout3 .vs-team:hover .social-links,{{WRAPPER}} .vs-team-layout3 .vs-team:hover .vs-team-name,{{WRAPPER}} .vs-team-layout3 .vs-team:hover .vs-team-degi' => 'color: {{VALUE}}',
                ],
				'condition'		=> [ 'team_style' => 'three' ],
			]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'team_member_style_option',
			[
				'label' 	=> __( 'Team Member Style', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'person_name_color',
			[
				'label' 		=> __( 'Person Name Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-team .vs-team-name' => 'color: {{VALUE}}',
                ]
			]
        );
		$this->add_control(
			'person_name_hover_color',
			[
				'label' 		=> __( 'Person Name Hover Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-team .vs-team-name a:hover' => 'color: {{VALUE}}',
                ]
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'person_name_typography',
				'label'         => __( 'Person Name Typography', 'mixlax' ),
                'selector'      => '{{WRAPPER}} .vs-team .vs-team-name',
			]
		);
        $this->add_responsive_control(
			'person_name_margin',
			[
				'label'         => __( 'Person Name Margin', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .vs-team .vs-team-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->add_responsive_control(
			'person_name_padding',
			[
				'label'         => __( 'Person Name Padding', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .vs-team .vs-team-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
				'separator'		=> 'after',
			]
		);
		$this->add_control(
			'person_designation_color',
			[
				'label' 		=> __( 'Person Designation Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-team .vs-team-degi' => 'color: {{VALUE}}',
                ]
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'person_designation_typography',
				'label'         => __( 'Person Designation Typography', 'mixlax' ),
                'selector'      => '{{WRAPPER}} .vs-team .vs-team-degi',
			]
		);
        $this->add_responsive_control(
			'person_designation_margin',
			[
				'label'         => __( 'Person Designation Margin', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .vs-team .vs-team-degi' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->add_responsive_control(
			'person_designation_padding',
			[
				'label'         => __( 'Person Designation Padding', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .vs-team .vs-team-degi' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);
		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( $settings['team_variation'] == 'slider' ){
			$this->add_render_attribute( 'wrapper', 'class', 'vs-carousel' );
			$this->add_render_attribute( 'wrapper', 'data-slide-to-show', $settings['slide_to_show']['size'] );
		}

		if( $settings['team_style'] == 'one' ){
			$this->add_render_attribute( 'wrapper', 'class', 'row gx-10' );
		}elseif( $settings['team_style'] == 'two' ){
			$this->add_render_attribute( 'wrapper', 'class', 'row' );
		}elseif( $settings['team_style'] == 'three' ){
			$this->add_render_attribute( 'wrapper', 'class', 'row ' );
		}

		if( $settings['team_style'] == 'one' ){
			if( ! empty( $settings['slides'] ) ){
				echo '<!-- Our Team -->';
				echo '<section class="vs-team-wrapper vs-team-layout1">';
				  	echo '<div class="container">';
				    	echo '<div '.$this->get_render_attribute_string('wrapper').'>';
				      		foreach( $settings['slides'] as $team_member ){
								$target_team 	= $team_member['person_details_url']['is_external'] ? ' target="_blank"' : '';
								$nofollow_team 	= $team_member['person_details_url']['nofollow'] ? ' rel="nofollow"' : '';
									if( $settings['team_variation'] == 'grid' ){
										echo '<div class="col-xl-'.esc_attr( $settings['team_grid'] ).' col-sm-6 col-lg-4">';
									}else{
										echo '<div class="col-xl-3">';
									}
				                    echo '<div class="vs-team">';
										if( ! empty( $team_member['team_member_image']['url'] ) ){
											echo '<div class="vs-team-img image-scale-hover">';
												if( ! empty( $team_member['person_details_url']['url'] ) ){
													echo '<a '.wp_kses_post( $target_team.$nofollow_team ).' href="'.esc_url( $team_member['person_details_url']['url'] ).'">';
												}
													echo wellnez_img_tag( array(
														'url'	=> esc_url( $team_member['team_member_image']['url'] ),
														'class'	=> 'w-100',
													) );
												if( ! empty( $team_member['person_details_url']['url'] ) ){
													echo '</a>';
												}
											echo '</div>';
										}
				                        echo '<div class="vs-team-content">';
				                            echo '<ul class="social-links links-hover-border">';
												if( !empty( $team_member['social_icon_one']['value'] ) ){
													$target_social_one 		= $team_member['social_icon_one_link']['is_external'] ? ' target="_blank"' : '';
													$nofollow_social_one 	= $team_member['social_icon_one_link']['nofollow'] ? ' rel="nofollow"' : '';
													echo '<li><a '.wp_kses_post( $target_social_one.$nofollow_social_one ).' href="'.esc_url( $team_member['social_icon_one_link']['url'] ).'"><i class="'.esc_attr( $team_member['social_icon_one']['value'] ).'"></i></a></li>';
												}
												if( !empty( $team_member['social_icon_two']['value'] ) ){
													$target_social_two 		= $team_member['social_icon_two_link']['is_external'] ? ' target="_blank"' : '';
													$nofollow_social_two 	= $team_member['social_icon_two_link']['nofollow'] ? ' rel="nofollow"' : '';
													echo '<li><a '.wp_kses_post( $target_social_two.$nofollow_social_two ).' href="'.esc_url( $team_member['social_icon_two_link']['url'] ).'"><i class="'.esc_attr( $team_member['social_icon_two']['value'] ).'"></i></a></li>';
												}
												if( !empty( $team_member['social_icon_three']['value'] ) ){
													$target_social_three 	= $team_member['social_icon_three_link']['is_external'] ? ' target="_blank"' : '';
													$nofollow_social_three 	= $team_member['social_icon_three_link']['nofollow'] ? ' rel="nofollow"' : '';
													echo '<li><a '.wp_kses_post( $target_social_three.$nofollow_social_three ).' href="'.esc_url( $team_member['social_icon_three_link']['url'] ).'"><i class="'.esc_attr( $team_member['social_icon_three']['value'] ).'"></i></a></li>';
												}
												if( !empty( $team_member['social_icon_four']['value'] ) ){
													$target_social_four 	= $team_member['social_icon_four_link']['is_external'] ? ' target="_blank"' : '';
													$nofollow_social_four 	= $team_member['social_icon_four_link']['nofollow'] ? ' rel="nofollow"' : '';
													echo '<li><a '.wp_kses_post( $target_social_four.$nofollow_social_four ).' href="'.esc_url( $team_member['social_icon_four_link']['url'] ).'"><i class="'.esc_attr( $team_member['social_icon_four']['value'] ).'"></i></a></li>';
												}
				                            echo '</ul>';
											if( ! empty( $team_member['person_designation'] ) ){
												echo '<span class="vs-team-degi">'.esc_html( $team_member['person_designation'] ).'</span>';
											}
											if( ! empty( $team_member['person_name'] ) ){
					                            echo '<h3 class="h5 vs-team-name mb-0">';
													if( ! empty( $team_member['person_details_url']['url'] ) ){
														echo '<a '.wp_kses_post( $target_team.$nofollow_team ).' href="'.esc_url( $team_member['person_details_url']['url'] ).'">';
													}
													echo esc_html( $team_member['person_name'] );
													if( ! empty( $team_member['person_details_url']['url'] ) ){
														echo '</a>';
													}
												echo '</h3>';
											}
				                        echo '</div>';
				                    echo '</div>';
				                echo '</div>';
							}
				    	echo '</div>';
				  	echo '</div>';
				echo '</section>';
				echo '<!-- Our Team end -->';
			}
		}elseif( $settings['team_style'] == 'two' ){
			if( ! empty( $settings['slides'] ) ){
				echo '<section class="vs-team-wrapper vs-team-layout2">';
			        echo '<div class="container">';
			            echo '<div '.$this->get_render_attribute_string( 'wrapper' ).'>';
							foreach( $settings['slides'] as $team_member ){
								$target_team 	= $team_member['person_details_url']['is_external'] ? ' target="_blank"' : '';
								$nofollow_team 	= $team_member['person_details_url']['nofollow'] ? ' rel="nofollow"' : '';
									if( $settings['team_variation'] == 'grid' ){
										echo '<div class="col-xl-'.esc_attr( $settings['team_grid'] ).' col-sm-6 col-lg-4">';
									}else{
										echo '<div class="col-xl-4">';
									}
				                    echo '<div class="vs-team">';
										if( ! empty( $team_member['team_member_image']['url'] ) ){
											echo '<div class="vs-team-img image-scale-hover">';
												if( ! empty( $team_member['person_details_url']['url'] ) ){
													echo '<a '.wp_kses_post( $target_team.$nofollow_team ).' href="'.esc_url( $team_member['person_details_url']['url'] ).'">';
												}
													echo wellnez_img_tag( array(
														'url'	=> esc_url( $team_member['team_member_image']['url'] ),
														'class'	=> 'w-100',
													) );
												if( ! empty( $team_member['person_details_url']['url'] ) ){
													echo '</a>';
												}
											echo '</div>';
										}
				                        echo '<div class="vs-team-content">';
				                            echo '<ul class="social-links links-hover-border">';
												if( !empty( $team_member['social_icon_one']['value'] ) ){
													$target_social_one 		= $team_member['social_icon_one_link']['is_external'] ? ' target="_blank"' : '';
													$nofollow_social_one 	= $team_member['social_icon_one_link']['nofollow'] ? ' rel="nofollow"' : '';
													echo '<li><a '.wp_kses_post( $target_social_one.$nofollow_social_one ).' href="'.esc_url( $team_member['social_icon_one_link']['url'] ).'"><i class="'.esc_attr( $team_member['social_icon_one']['value'] ).'"></i></a></li>';
												}
												if( !empty( $team_member['social_icon_two']['value'] ) ){
													$target_social_two 		= $team_member['social_icon_two_link']['is_external'] ? ' target="_blank"' : '';
													$nofollow_social_two 	= $team_member['social_icon_two_link']['nofollow'] ? ' rel="nofollow"' : '';
													echo '<li><a '.wp_kses_post( $target_social_two.$nofollow_social_two ).' href="'.esc_url( $team_member['social_icon_two_link']['url'] ).'"><i class="'.esc_attr( $team_member['social_icon_two']['value'] ).'"></i></a></li>';
												}
												if( !empty( $team_member['social_icon_three']['value'] ) ){
													$target_social_three 	= $team_member['social_icon_three_link']['is_external'] ? ' target="_blank"' : '';
													$nofollow_social_three 	= $team_member['social_icon_three_link']['nofollow'] ? ' rel="nofollow"' : '';
													echo '<li><a '.wp_kses_post( $target_social_three.$nofollow_social_three ).' href="'.esc_url( $team_member['social_icon_three_link']['url'] ).'"><i class="'.esc_attr( $team_member['social_icon_three']['value'] ).'"></i></a></li>';
												}
												if( !empty( $team_member['social_icon_four']['value'] ) ){
													$target_social_four 	= $team_member['social_icon_four_link']['is_external'] ? ' target="_blank"' : '';
													$nofollow_social_four 	= $team_member['social_icon_four_link']['nofollow'] ? ' rel="nofollow"' : '';
													echo '<li><a '.wp_kses_post( $target_social_four.$nofollow_social_four ).' href="'.esc_url( $team_member['social_icon_four_link']['url'] ).'"><i class="'.esc_attr( $team_member['social_icon_four']['value'] ).'"></i></a></li>';
												}
				                            echo '</ul>';
				                            echo '<span class="plus-icon"><i class="far fa-plus"></i></span>';
											if( ! empty( $team_member['person_designation'] ) ){
												echo '<span class="vs-team-degi">'.esc_html( $team_member['person_designation'] ).'</span>';
											}
											if( ! empty( $team_member['person_name'] ) ){
					                            echo '<h3 class="h4 vs-team-name mb-0">';
													if( ! empty( $team_member['person_details_url']['url'] ) ){
														echo '<a '.wp_kses_post( $target_team.$nofollow_team ).' href="'.esc_url( $team_member['person_details_url']['url'] ).'">';
													}
													echo esc_html( $team_member['person_name'] );
													if( ! empty( $team_member['person_details_url']['url'] ) ){
														echo '</a>';
													}
												echo '</h3>';
											}
				                        echo '</div>';
				                    echo '</div>';
				                echo '</div>';
							}
			            echo '</div>';
			        echo '</div>';
			    echo '</section>';
			}
		}elseif( $settings['team_style'] == 'three' ){
			if( ! empty( $settings['slides'] ) ){
				echo '<section class="vs-team-wrapper vs-team-layout3">';
			        echo '<div class="container">';
			            echo '<div '.$this->get_render_attribute_string('wrapper').'>';
							foreach( $settings['slides'] as $team_member ){
								if( $settings['team_variation'] == 'grid' ){
									echo '<div class="col-xl-'.esc_attr( $settings['team_grid'] ).' col-sm-6 col-lg-4">';
								}else{
									echo '<div class="col-lg-3">';
								}
				                    echo '<div class="vs-team team-style2">';
										if( ! empty( $team_member['team_member_image']['url'] ) ){
											$target_team 	= $team_member['person_details_url']['is_external'] ? ' target="_blank"' : '';
											$nofollow_team 	= $team_member['person_details_url']['nofollow'] ? ' rel="nofollow"' : '';
											echo '<div class="vs-team-img">';
												if( ! empty( $team_member['person_details_url']['url'] ) ){
													echo '<a '.wp_kses_post( $target_team.$nofollow_team ).' href="'.esc_url( $team_member['person_details_url']['url'] ).'">';
												}
													echo wellnez_img_tag( array(
														'url'	=> esc_url( $team_member['team_member_image']['url'] ),
														'class'	=> 'w-100',
													) );
												if( ! empty( $team_member['person_details_url']['url'] ) ){
													echo '</a>';
												}
											echo '</div>';
										}
				                        echo '<div class="vs-team-content">';
											if( ! empty( $team_member['person_name'] ) ){
												echo '<h3 class="h5 vs-team-name">';
													if( ! empty( $team_member['person_details_url']['url'] ) ){
														echo '<a '.wp_kses_post( $target_team.$nofollow_team ).' href="'.esc_url( $team_member['person_details_url']['url'] ).'">';
													}
													echo esc_html( $team_member['person_name'] );
													if( ! empty( $team_member['person_details_url']['url'] ) ){
														echo '</a>';
													}
												echo '</h3>';
											}
											if( ! empty( $team_member['person_designation'] ) ){
												echo '<span class="vs-team-degi">'.esc_html( $team_member['person_designation'] ).'</span>';
											}
				                            echo '<ul class="social-links">';
												if( !empty( $team_member['social_icon_one']['value'] ) ){
													$target_social_one 		= $team_member['social_icon_one_link']['is_external'] ? ' target="_blank"' : '';
													$nofollow_social_one 	= $team_member['social_icon_one_link']['nofollow'] ? ' rel="nofollow"' : '';
													echo '<li><a '.wp_kses_post( $target_social_one.$nofollow_social_one ).' href="'.esc_url( $team_member['social_icon_one_link']['url'] ).'"><i class="'.esc_attr( $team_member['social_icon_one']['value'] ).'"></i></a></li>';
												}
												if( !empty( $team_member['social_icon_two']['value'] ) ){
													$target_social_two 		= $team_member['social_icon_two_link']['is_external'] ? ' target="_blank"' : '';
													$nofollow_social_two 	= $team_member['social_icon_two_link']['nofollow'] ? ' rel="nofollow"' : '';
													echo '<li><a '.wp_kses_post( $target_social_two.$nofollow_social_two ).' href="'.esc_url( $team_member['social_icon_two_link']['url'] ).'"><i class="'.esc_attr( $team_member['social_icon_two']['value'] ).'"></i></a></li>';
												}
												if( !empty( $team_member['social_icon_three']['value'] ) ){
													$target_social_three 	= $team_member['social_icon_three_link']['is_external'] ? ' target="_blank"' : '';
													$nofollow_social_three 	= $team_member['social_icon_three_link']['nofollow'] ? ' rel="nofollow"' : '';
													echo '<li><a '.wp_kses_post( $target_social_three.$nofollow_social_three ).' href="'.esc_url( $team_member['social_icon_three_link']['url'] ).'"><i class="'.esc_attr( $team_member['social_icon_three']['value'] ).'"></i></a></li>';
												}
												if( !empty( $team_member['social_icon_four']['value'] ) ){
													$target_social_four 	= $team_member['social_icon_four_link']['is_external'] ? ' target="_blank"' : '';
													$nofollow_social_four 	= $team_member['social_icon_four_link']['nofollow'] ? ' rel="nofollow"' : '';
													echo '<li><a '.wp_kses_post( $target_social_four.$nofollow_social_four ).' href="'.esc_url( $team_member['social_icon_four_link']['url'] ).'"><i class="'.esc_attr( $team_member['social_icon_four']['value'] ).'"></i></a></li>';
												}
				                            echo '</ul>';
											if( ! empty( $team_member['person_details_url']['url'] ) ){
					                            echo '<a '.wp_kses_post( $target_team.$nofollow_team ).' href="'.esc_url( $team_member['person_details_url']['url'] ).'" class="vs-btn vs-style1">'.esc_html__( 'View Profile', 'mixlax' ).'</a>';
											}
				                        echo '</div>';
				                    echo '</div>';
				                echo '</div>';
							}
			            echo '</div>';
			        echo '</div>';
			    echo '</section>';
			}
		}elseif( $settings['team_style'] == 'four' ){
			if( ! empty( $settings['slides'] ) ){
				echo '<section class="vs-team-wrapper vs-team-layout4">';
			        echo '<div class="container">';
			            echo '<div '.$this->get_render_attribute_string('wrapper').'>';
							foreach( $settings['slides'] as $team_member ){
								if( $settings['team_variation'] == 'grid' ){
									echo '<div class="col-xl-'.esc_attr( $settings['team_grid'] ).' col-sm-6 col-lg-4">';
								}else{
									echo '<div class="col-lg-3">';
								}
									$target_team 	= $team_member['person_details_url']['is_external'] ? ' target="_blank"' : '';
									$nofollow_team 	= $team_member['person_details_url']['nofollow'] ? ' rel="nofollow"' : '';
									echo '<div class="team-style3">';
										echo '<div class="member-img">';
											if( ! empty( $team_member['person_details_url']['url'] ) ){
												echo '<a '.wp_kses_post( $target_team.$nofollow_team ).' href="'.esc_url( $team_member['person_details_url']['url'] ).'">';
											}
												echo wellnez_img_tag( array(
													'url'	=> esc_url( $team_member['team_member_image']['url'] ),
													'class'	=> 'w-100',
												) );
											if( ! empty( $team_member['person_details_url']['url'] ) ){
												echo '</a>';
											}
											echo '<div class="member-links">';
												echo '<ul>';
													if( !empty( $team_member['social_icon_one']['value'] ) ){
														$target_social_one 		= $team_member['social_icon_one_link']['is_external'] ? ' target="_blank"' : '';
														$nofollow_social_one 	= $team_member['social_icon_one_link']['nofollow'] ? ' rel="nofollow"' : '';
														echo '<li><a '.wp_kses_post( $target_social_one.$nofollow_social_one ).' href="'.esc_url( $team_member['social_icon_one_link']['url'] ).'"><i class="'.esc_attr( $team_member['social_icon_one']['value'] ).'"></i></a></li>';
													}
													if( !empty( $team_member['social_icon_two']['value'] ) ){
														$target_social_two 		= $team_member['social_icon_two_link']['is_external'] ? ' target="_blank"' : '';
														$nofollow_social_two 	= $team_member['social_icon_two_link']['nofollow'] ? ' rel="nofollow"' : '';
														echo '<li><a '.wp_kses_post( $target_social_two.$nofollow_social_two ).' href="'.esc_url( $team_member['social_icon_two_link']['url'] ).'"><i class="'.esc_attr( $team_member['social_icon_two']['value'] ).'"></i></a></li>';
													}
													if( !empty( $team_member['social_icon_three']['value'] ) ){
														$target_social_three 	= $team_member['social_icon_three_link']['is_external'] ? ' target="_blank"' : '';
														$nofollow_social_three 	= $team_member['social_icon_three_link']['nofollow'] ? ' rel="nofollow"' : '';
														echo '<li><a '.wp_kses_post( $target_social_three.$nofollow_social_three ).' href="'.esc_url( $team_member['social_icon_three_link']['url'] ).'"><i class="'.esc_attr( $team_member['social_icon_three']['value'] ).'"></i></a></li>';
													}
													if( !empty( $team_member['social_icon_four']['value'] ) ){
														$target_social_four 	= $team_member['social_icon_four_link']['is_external'] ? ' target="_blank"' : '';
														$nofollow_social_four 	= $team_member['social_icon_four_link']['nofollow'] ? ' rel="nofollow"' : '';
														echo '<li><a '.wp_kses_post( $target_social_four.$nofollow_social_four ).' href="'.esc_url( $team_member['social_icon_four_link']['url'] ).'"><i class="'.esc_attr( $team_member['social_icon_four']['value'] ).'"></i></a></li>';
													}
												echo '</ul>';
											echo '</div>';
										echo '</div>';
										echo '<div class="member-content">';
											if( ! empty( $team_member['person_designation'] ) ){
												echo '<span class="degi">'.esc_html( $team_member['person_designation'] ).'</span>';
											}
											if( ! empty( $team_member['person_name'] ) ){
												echo '<h3 class="member-name h5">';
													if( ! empty( $team_member['person_details_url']['url'] ) ){
														echo '<a class="text-inherit" '.wp_kses_post( $target_team.$nofollow_team ).' href="'.esc_url( $team_member['person_details_url']['url'] ).'">';
													}
													echo esc_html( $team_member['person_name'] );
													if( ! empty( $team_member['person_details_url']['url'] ) ){
														echo '</a>';
													}
												echo '</h3>';
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

}