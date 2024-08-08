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
class Wellnez_Team_Member extends Widget_Base {

	public function get_name() {
		return 'wellnezteammember';
	}

	public function get_title() {
		return __( 'Team Member', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'image_section',
			[
				'label'     => __( 'Team Member', 'wellnez' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'team_version',
			[
				'label' 		=> __( 'Team Version', 'wellnez' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  			=> __( 'Version One', 'wellnez' ),
					'2' 			=> __( 'Version Two', 'wellnez' ),
					'3' 			=> __( 'Version Three', 'wellnez' ),
				],
			]
		);

		$this->add_control(
			'team_style',
			[
				'label' 		=> __( 'Team Style', 'wellnez' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  			=> __( 'Slider', 'wellnez' ),
					'2' 			=> __( 'Grid', 'wellnez' )
				],
			]
		);


		$this->add_responsive_control(
			'per_line',
				[
				'label'              => __( 'Columns per row', 'wellnez' ),
				'type'               => Controls_Manager::SELECT,
				'default'            => '3',
				'tablet_default'     => '6',
				'mobile_default'     => '12',
				'options'            => [
					'12' => 'Full Width',
					'6'  => '2 Column',
					'4'  => '3 Column',
					'3'  => '4 Column',
				],
				'frontend_available' => true,
				'condition'		=> [ 'team_style' => '2' ],
			]
		);


		$repeater = new Repeater();

        $repeater->add_control(
			'team_member_image',
			[
				'label'     => __( 'Team Member Image', 'wellnez' ),
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
				'label'         => __( 'Person Name', 'wellnez' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'John Steven' , 'wellnez' ),
				'label_block'   => true,
			]
		);
		$repeater->add_control(
			'person_details_url',
			[
				'label' 		=> __( 'Person Details Url', 'wellnez' ),
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
        $repeater->add_control(
			'person_designation',
            [
				'label'         => __( 'Person Designation', 'wellnez' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Founder' , 'wellnez' ),
				'label_block'   => true,
			]
		);


		$repeater->add_control(
			'0nly_use',
			[
				'label' => esc_html__( 'Only Use Style Two Version', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$repeater->add_control(
			'socail_on',
			[
				'label' 		=> __( 'Profile', 'wellnez' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'wellnez' ),
				'label_off' 	=> __( 'No', 'wellnez' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'no',
			]
		);

		

		$repeater->add_control(
			'p_one',
            [
				'label'         => __( 'Icon Name One', 'wellnez' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'condition'		=> [ 'socail_on' => 'yes' ],
			]
		);
		$repeater->add_control(
			'p_two',
            [
				'label'         => __( 'Two', 'wellnez' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'condition'		=> [ 'socail_on' => 'yes' ],
			]
		);
		$repeater->add_control(
			'p_theree',
            [
				'label'         => __( 'three', 'wellnez' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'condition'		=> [ 'socail_on' => 'yes' ],
			]
		);

		$repeater->add_control(
			'p_four',
            [
				'label'         => __( 'Four', 'wellnez' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'condition'		=> [ 'socail_on' => 'yes' ],
			]
		);

		$repeater->add_control(
			'socail_profile_url',
			[
				'label' => esc_html__( 'Profile Url', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
				'condition'		=> [ 'socail_on' => 'yes' ],
			]
		);

		$repeater->add_control(
			'url_one',
            [
				'label'         => __( 'Url One', 'wellnez' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'condition'		=> [ 'socail_on' => 'yes' ],
			]
		);
		$repeater->add_control(
			'url_two',
            [
				'label'         => __( 'Url Two', 'wellnez' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'condition'		=> [ 'socail_on' => 'yes' ],
			]
		);  
		$repeater->add_control(
			'url_three',
            [
				'label'         => __( 'Url Three', 'wellnez' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'condition'		=> [ 'socail_on' => 'yes' ], 
			]
		);
		$repeater->add_control(
			'url_four',
            [
				'label'         => __( 'Url Four', 'wellnez' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'condition'		=> [ 'socail_on' => 'yes' ],
			]
		);

		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Team Member', 'wellnez' ),
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
				'label' 		=> __( 'Slider Control', 'wellnez' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
				'condition'		=> [ 'team_style' => '1' ],
			]
        );

		$this->add_control(
			'slide_to_show',
			[
				'label' 		=> __( 'Slide To Show', 'wellnez' ),
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

		$this->add_control(
			'slider_arrows',
			[
				'label' 		=> __( 'Arrows', 'wellnez' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'wellnez' ),
				'label_off' 	=> __( 'No', 'wellnez' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
        $this->end_controls_section();

		
		$this->start_controls_section(
			'team_member_style_option',
			[
				'label' 	=> __( 'Team Member Style', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'person_name_color',
			[
				'label' 		=> __( 'Name Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .team-style1 .team-name, {{WRAPPER}} .team-style4 .team-name' => 'color: {{VALUE}}',
                ]
			]
        );
		$this->add_control(
			'person_name_color_hover',
			[
				'label' 		=> __( 'Name Color Hover', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}}  .team-style1 .team-name a:hover, {{WRAPPER}}  .team-style4 .team-name a:hover' => 'color: {{VALUE}}',
                ]
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'person_name_typography',
				'label'         => __( 'Name Typography', 'wellnez' ),
                'selector'      => '{{WRAPPER}} .team-style1 .team-name, {{WRAPPER}} .team-style4 .team-name',
			]
		);
        $this->add_responsive_control(
			'person_name_margin',
			[
				'label'         => __( 'Name Margin', 'wellnez' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .team-style1 .team-name, .team-style4 .team-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->add_responsive_control(
			'person_name_padding',
			[
				'label'         => __( 'Name Padding', 'wellnez' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .team-style1 .team-name, {{WRAPPER}} .team-style4 .team-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
				'separator'		=> 'after',
			]
		);
		$this->add_control(
			'person_designation_color',
			[
				'label' 		=> __( 'Designation Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .team-style1 .team-degi, {{WRAPPER}} .team-style4 .team-degi' => 'color: {{VALUE}}',
                ]
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'person_designation_typography',
				'label'         => __( 'Designation Typography', 'wellnez' ),
                'selector'      => '{{WRAPPER}} .team-style1 .team-degi, {{WRAPPER}} .team-style4 .team-degi',
			]
		);
        $this->add_responsive_control(
			'person_designation_margin',
			[
				'label'         => __( 'Designation Margin', 'wellnez' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .team-style1 .team-degi, {{WRAPPER}} .team-style4 .team-degi' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->add_responsive_control(
			'person_designation_padding',
			[
				'label'         => __( 'Designation Padding', 'wellnez' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .team-style1 .team-degi, {{WRAPPER}} .team-style1 .team-degi' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'team_member_profile_style',
			[
				'label' 	=> __( 'Profile', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				// 'condition'		=> [ 'socail_on' => 'yes' ],
			]
		);
		$this->add_control(
			'profile_color',
			[
				'label' 		=> __( 'Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}}  .team-style4 .team-social a' => 'color: {{VALUE}}',
                ]
			]
        );

		$this->add_control(
			'profile_color_hover',
			[
				'label' 		=> __( 'Hover Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}}  .team-style4 .team-social a:hover' => 'color: {{VALUE}}',
                ]
			]
        );

		$this->add_control(
			'profile_bg_color',
			[
				'label' 		=> __( 'Background Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}}  .team-style4 .team-social a' => 'background-color: {{VALUE}}',
                ]
			]
        );

		$this->add_control(
			'profile_bg_color_hover',
			[
				'label' 		=> __( 'Background Hover Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}}  .team-style4 .team-social a:hover' => 'background-color: {{VALUE}}',
                ]
			]
        );
		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( $settings['team_style'] == '1' ){
			$this->add_render_attribute( 'wrapper', 'class', 'row team-carousel' );
		}else{
			$this->add_render_attribute( 'wrapper', 'class', 'row' );
		}
		
		//gride class
		$grid_classes = [];
		$grid_classes[] = 'col-xl-' . $settings['per_line'];
		$grid_classes[] = 'col-md-' . $settings['per_line_tablet'];
		$grid_classes[] = 'col-sm-' . $settings['per_line_mobile'];
		$grid_classes = implode(' ', $grid_classes);
		$this->add_render_attribute( 'team_gride_classes', 'class', [$grid_classes] );
		

		if( $settings['slider_arrows'] == 'yes' ) {
			$this->add_render_attribute( 'wrapper', 'data-slick-arrows', 'true' );
		} else {
			$this->add_render_attribute( 'wrapper', 'data-slick-arrows', 'false' );
		}
		
		$this->add_render_attribute( 'wrapper', 'data-slick-autoplay', 'true' );
		
		if( !empty( $settings['slide_to_show'] ) ){
			$this->add_render_attribute( 'wrapper', 'data-slide-to-show', $settings['slide_to_show']['size'] );
		}
		
		
		if( ! empty( $settings['slides'] ) ){
			if( '1' == $settings[ 'team_version' ] ){
				echo '<section class="arrow-wrap">';
					echo '<div class="container-xxl">';
						echo '<div '.$this->get_render_attribute_string('wrapper').'>';
							foreach( $settings['slides'] as $team_member ){
								$target_team 	= $team_member['person_details_url']['is_external'] ? ' target="_blank"' : '';
								$nofollow_team 	= $team_member['person_details_url']['nofollow'] ? ' rel="nofollow"' : '';							
								echo '<div '.$this->get_render_attribute_string('team_gride_classes').'  >';
									echo '<div class="team-style1">';
										echo '<div class="team-img">';
											if( ! empty( $team_member['team_member_image']['url'] ) ){
												echo '<a '.wp_kses_post( $target_team.$nofollow_team ).' href="'.esc_url( $team_member['person_details_url']['url'] ).'">';
													echo wellnez_img_tag( array(
														'url'	=> esc_url( $team_member['team_member_image']['url'] ),
													) );
												echo '</a>';
											}
										echo '</div>';
										echo '<div class="team-content">';
											if( ! empty( $team_member['person_name'] ) ){
												echo '<h3 class="team-name h4"><a '.wp_kses_post( $target_team.$nofollow_team ).' href="'.esc_url( $team_member['person_details_url']['url'] ).'">'.esc_html( $team_member['person_name'] ).'</a></h3>';
											}
											if( ! empty( $team_member['person_designation'] ) ){
												echo '<p class="team-degi">'.esc_html( $team_member['person_designation'] ).'</p>';
											}
										echo '</div>';
									echo '</div>';
								echo '</div>';
							}
						echo '</div>';
					echo '</div>';
				echo '</section>';
			}elseif( '2' == $settings[ 'team_version' ]  ){
				echo '<div '.$this->get_render_attribute_string('wrapper').'>';
					foreach( $settings['slides'] as $team_member ){
						$target_team 	= $team_member['person_details_url']['is_external'] ? ' target="_blank"' : '';
						$nofollow_team 	= $team_member['person_details_url']['nofollow'] ? ' rel="nofollow"' : '';							
						echo '<div '.$this->get_render_attribute_string('team_gride_classes').'  >';
							echo '<div class="team-style4">';
								echo '<div class="team-img">';
									if( ! empty( $team_member['team_member_image']['url'] ) ){
										echo '<a '.wp_kses_post( $target_team.$nofollow_team ).' href="'.esc_url( $team_member['person_details_url']['url'] ).'">';
											echo wellnez_img_tag( array(
												'url'	=> esc_url( $team_member['team_member_image']['url'] ),
											) );
										echo '</a>';
									}
								echo '</div>';
								echo '<div class="team-content">';
									if( ! empty( $team_member['person_name'] ) ){
										echo '<h3 class="team-name h4"><a '.wp_kses_post( $target_team.$nofollow_team ).' href="'.esc_url( $team_member['person_details_url']['url'] ).'">'.esc_html( $team_member['person_name'] ).'</a></h3>';
									}
									if( ! empty( $team_member['person_designation'] ) ){
										echo '<p class="team-degi">'.esc_html( $team_member['person_designation'] ).'</p>';
									}

									if( 'yes' == $team_member[ 'socail_on' ] ){
										echo '<div class="team-social">';
										if( ! empty( $team_member['p_one'] ) ){
											echo '<a href="'.esc_attr( $team_member['url_one'] ).'" tabindex="-1">
												<i class="'.esc_attr( $team_member['p_one'] ).'"></i>
											</a>';
										}
										if( ! empty( $team_member['p_two'] ) ){
											echo '<a href="'.esc_attr( $team_member['url_two'] ).'" tabindex="-1">
												<i class="'.esc_attr( $team_member['p_two'] ).'"></i>
											</a>';
										}
										if( ! empty( $team_member['p_theree'] ) ){
											echo '<a href="'.esc_attr( $team_member['url_three'] ).'" tabindex="-1">
												<i class="'.esc_attr( $team_member['p_theree'] ).'"></i>
											</a>';
										}
										if( ! empty( $team_member['p_four'] ) ){
											echo '<a href="'.esc_attr( $team_member['url_four'] ).'" tabindex="-1">
												<i class="'.esc_attr( $team_member['p_four'] ).'"></i>
											</a>';
										}
										echo '</div>';
									}
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
				echo '</div>';
			}elseif( '3' == $settings[ 'team_version' ]  ){
				echo '<div '.$this->get_render_attribute_string('wrapper').'>';
					foreach( $settings['slides'] as $team_member ){
						$target_team 	= $team_member['person_details_url']['is_external'] ? ' target="_blank"' : '';
						$nofollow_team 	= $team_member['person_details_url']['nofollow'] ? ' rel="nofollow"' : '';							
						echo '<div '.$this->get_render_attribute_string('team_gride_classes').'  >';
							echo '<div class="team-style4">';
								echo '<div class="team-img">';
									if( ! empty( $team_member['team_member_image']['url'] ) ){
										echo '<a '.wp_kses_post( $target_team.$nofollow_team ).' href="'.esc_url( $team_member['person_details_url']['url'] ).'">';
											echo wellnez_img_tag( array(
												'url'	=> esc_url( $team_member['team_member_image']['url'] ),
											) );
										echo '</a>';
									}
									if( 'yes' == $team_member[ 'socail_on' ] ){
										echo '<div class="team-social">';
										if( ! empty( $team_member['p_one'] ) ){
											echo '<a href="'.esc_attr( $team_member['url_one'] ).'" tabindex="-1">
												<i class="'.esc_attr( $team_member['p_one'] ).'"></i>
											</a>';
										}
										if( ! empty( $team_member['p_two'] ) ){
											echo '<a href="'.esc_attr( $team_member['url_two'] ).'" tabindex="-1">
												<i class="'.esc_attr( $team_member['p_two'] ).'"></i>
											</a>';
										}
										if( ! empty( $team_member['p_theree'] ) ){
											echo '<a href="'.esc_attr( $team_member['url_three'] ).'" tabindex="-1">
												<i class="'.esc_attr( $team_member['p_theree'] ).'"></i>
											</a>';
										}
										if( ! empty( $team_member['p_four'] ) ){
											echo '<a href="'.esc_attr( $team_member['url_four'] ).'" tabindex="-1">
												<i class="'.esc_attr( $team_member['p_four'] ).'"></i>
											</a>';
										}
										echo '</div>';
									}
								echo '</div>';
								echo '<div class="team-content">';
									if( ! empty( $team_member['person_name'] ) ){
										echo '<h3 class="team-name h4"><a '.wp_kses_post( $target_team.$nofollow_team ).' href="'.esc_url( $team_member['person_details_url']['url'] ).'">'.esc_html( $team_member['person_name'] ).'</a></h3>';
									}
									if( ! empty( $team_member['person_designation'] ) ){
										echo '<p class="team-degi">'.esc_html( $team_member['person_designation'] ).'</p>';
									}
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
				echo '</div>';
			}
		}
	}
}