<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Newsletter Widget .
 *
 */
class Mixlax_Footer_Copyright extends Widget_Base {

	public function get_name() {
		return 'mixlaxfootercopyright';
	}

	public function get_title() {
		return __( 'Footer Copyright', 'mixlax' );
	}


	public function get_icon() {
		return 'fa fa-code';
    }


	public function get_categories() {
		return [ 'mixlax_footer_elements' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'social_icon',
			[
				'label'     => __( 'Social Icon', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'logo',
			[
				'label'     => __( 'Logo', 'mixlax' ),
                'type'      => Controls_Manager::MEDIA,
			]
        );
		$this->add_control(
			'logo_link',
			[
				'label'     => __( 'Logo Link', 'mixlax' ),
                'type'      => Controls_Manager::TEXTAREA,
			]
        );
        $this->add_control(
			'copyright_text',
			[
				'label'     => __( 'Copyright Text', 'mixlax' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __( 'All Right Reserved', 'mixlax' ),
			]
        );

        $repeater = new Repeater();

        $repeater->add_control(
			'social_icon',
			[
				'label'     => __( 'Social Icon', 'mixlax' ),
				'type'      => Controls_Manager::ICONS,
				'default'   => [
					'value'          => 'fab fa-facebook',
					'library'        => 'solid',
				],
			]
		);
        $repeater->add_control(
			'icon_link',
			[
				'label'         => __( 'Social Icon Link', 'mixlax' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'https://your-link.com', 'mixlax' ),
				'show_external' => true,
				'default'       => [
					'url'          => '',
					'is_external'  => true,
					'nofollow'     => true,
				],
			]
		);
        $this->add_control(
			'social_icon_repeat',
			[
				'label'     => __( 'Repeater List', 'mixlax' ),
				'type'      => Controls_Manager::REPEATER,
				'fields'    => $repeater->get_controls(),
				'default'   => [
					[
						'social_icon' 	=> [
							'value' 	=> 'fab fa-facebook',
							'library' 	=> 'fa-brands',
						],
					],
					[
						'social_icon' 	=> [
							'value' 	=> 'fab fa-twitter',
							'library' 	=> 'fa-brands',
						],
					],
				],
				'title_field' => 'Social Icon',
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'copyright_style_section',
			[
				'label'     => __( 'Copyright Options', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
			'copyright_color',
			[
				'label'     => __( 'Copyright Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-layout3 .copyright-area .copyright .text' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_control(
			'copyright_anchor_color',
			[
				'label'     => __( 'Copyright Anchor Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-layout3 .copyright-area .copyright .text a' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'copyright_typography',
				'label'     => __( 'Copyright Typography', 'mixlax' ),
                'selector'  => '{{WRAPPER}} .footer-layout3 .copyright-area .copyright .text a',
			]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'social_icon_style_section',
			[
				'label'     => __( 'Social Icon Options', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
			'social_icon_bg_color',
			[
				'label'     => __( 'Social Icon Background Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-layout3 .copyright-area .social-links ul li a' => 'background-color: {{VALUE}}',
                ],
			]
        );
        $this->add_control(
			'social_icon_color',
			[
				'label'     => __( 'Social Icon Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-layout3 .copyright-area .social-links ul li a' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_control(
			'icon_width',
			[
				'label' 		=> __( 'Width', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px', '%' ],
				'range' 		=> [
					'px' 	=> [
						'min' 	=> 0,
						'max' 	=> 1000,
						'step' 	=> 1,
					],
					'%' 	=> [
						'min' 	=> 0,
						'max' 	=> 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .footer-layout3 .copyright-area .social-links ul li a' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'icon_height',
			[
				'label' 		=> __( 'Height', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px', '%' ],
				'range' 		=> [
					'px' 	=> [
						'min' 	=> 0,
						'max' 	=> 1000,
						'step' 	=> 1,
					],
					'%' 	=> [
						'min' 	=> 0,
						'max' 	=> 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .footer-layout3 .copyright-area .social-links ul li a' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'social_icon_margin',
			[
				'label'         => __( 'Social Icon Margin', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .footer-layout3 .copyright-area .social-links ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_control(
			'social_icon_padding',
			[
				'label'         => __( 'Social Icon Padding', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .footer-layout3 .copyright-area .social-links ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'social_border',
				'label' 		=> __( 'Border', 'mixlax' ),
				'selector' 		=> '{{WRAPPER}} .footer-layout3 .copyright-area .social-links ul li a',
			]
		);
        $this->add_control(
			'social_icon_border_radius',
			[
				'label'         => __( 'Social Icon Border Radius', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .footer-layout3 .copyright-area .social-links ul li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 			=> 'social_box_shadow',
				'label' 		=> __( 'Box Shadow', 'mixlax' ),
				'selector' 		=> '{{WRAPPER}} .footer-layout3 .copyright-area .social-links ul li a',
			]
		);
        $this->end_controls_section();

		$this->start_controls_section(
			'social_icon_hover_style_section',
			[
				'label'     => __( 'Social Icon Hover Options', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
			'social_icon_hover_bg_color',
			[
				'label'     => __( 'Social Icon Background Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .social-icons a:hover,{{WRAPPER}} .socials a:hover' => 'background-color: {{VALUE}}',
                ],
			]
        );
        $this->add_control(
			'social_icon_hover_color',
			[
				'label'     => __( 'Social Icon Hover Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .social-icons a:hover,{{WRAPPER}} .socials a:hover' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'social_border_hover',
				'label' 		=> __( 'Border', 'mixlax' ),
				'selector' 		=> '{{WRAPPER}} .social-icons a:hover,{{WRAPPER}} .socials a:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 			=> 'social_box_shadow_hover',
				'label' 		=> __( 'Box Shadow', 'mixlax' ),
				'selector' 		=> '{{WRAPPER}} .social-icons a:hover,{{WRAPPER}} .socials a:hover',
			]
		);
		$this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		echo '<div class="footer-area footer-layout3  ">';
			echo '<!-- Copyright Area -->';
			echo '<div class="copyright-area">';
				echo '<div class="container">';
					echo '<div class="inner-wrapper">';
						echo '<div class="row align-items-center">';
							echo '<!-- Logo -->';
							echo '<div class="col-md-2 col-lg-2">';
								if( !empty( $settings['logo']['url'] ) ){
									echo '<div class="copyright-logo d-none d-md-block">';
										echo '<a href="'.esc_url( $settings['logo_link'] ).'">';
											echo wellnez_img_tag( array(
												'url'	=> esc_url( $settings['logo']['url'] )
											) );
										echo '</a>';
									echo '</div>';
								}
							echo '</div>';
							echo '<!-- Copyright -->';
							echo '<div class="col-md-10 col-lg-7 text-center text-md-right text-lg-center">';
								if( !empty( $settings['copyright_text'] ) ){
									echo '<div class="copyright">';
										echo '<p class="text">'.wp_kses_post( $settings['copyright_text'] ).'</p>';
									echo '</div>';
								}
							echo '</div>';
							echo '<!-- Social Links -->';
							echo '<div class="col-lg-3 text-right">';
								echo '<div class="social-links d-none d-lg-block">';
									echo '<ul>';
										if( !empty( $settings['social_icon_repeat'] ) ){
											foreach ( $settings['social_icon_repeat']  as $social_icon ) {
												$target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
												$nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';
												echo '<li><a href="'.esc_url( $social_icon['icon_link']['url'] ).'" '.wp_kses_post( $target.$nofollow ).'><i class="'.esc_attr( $social_icon['social_icon']['value'] ).'"></i></a></li>';
											}
										}
									echo '</ul>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
			echo '<!-- Copyright Area end -->';
		echo '</div>';
	}
}