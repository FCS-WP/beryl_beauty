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
 * Pricing Table Widget .
 *
 */
class Mixlax_Pricing_Table extends Widget_Base {

	public function get_name() {
		return 'mixlaxpricingtable';
	}

	public function get_title() {
		return __( 'Pricing Table', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'pricingtable',
			[
				'label'     => __( 'Pricing Table', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$repeater = new Repeater();

		$repeater->add_control(
			'image',
			[
				'label' 		=> __( 'Choose Image', 'mixlax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
			]
		);

        $repeater->add_control(
			'pricing_plan_name',
            [
				'label'         => __( 'Pricing Plan Name', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Personalized Massage' , 'mixlax' ),
				'label_block'   => true,
			]
		);

        $repeater->add_control(
			'pricing_plan_desc',
            [
				'label'         => __( 'Plan Description', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '60 min <span class="inner-label">$100</span> / 90 min <span class="inner-label">$145</span>' , 'mixlax' ),
				'label_block'   => true,
			]
		);

		$repeater->add_control(
			'image_and_text_link',
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

		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Pricing Table', 'mixlax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'pricing_plan_name' 	=> __( 'Personalized Massage', 'mixlax' ),
						'image' 				=> Utils::get_placeholder_image_src(),
					],
					[
						'pricing_plan_name' 	=> __( 'Couples Massage', 'mixlax' ),
						'image' 				=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{pricing_plan_name}}',
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
			'pricing_box_background',
			[
				'label' 		=> __( 'Pricing Box Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .price-inner3' => 'background-color: {{VALUE}}',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'box_shadow',
				'label' 	=> __( 'Box Shadow', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .price-inner3',
			]
		);

		$this->add_responsive_control(
			'plan_box_border_radius',
			[
				'label'         => __( 'Plan Box Border Radius', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .price-inner3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'plan_box_padding',
			[
				'label'         => __( 'Plan Box Padding', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .price-inner3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'pricing_table_style_option',
			[
				'label' 	=> __( 'Pricing Table Style', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'plan_name_color',
			[
				'label' 		=> __( 'Plan Name Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-price-list .price-title' => 'color: {{VALUE}}',
                ]
			]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'plan_name_typography',
				'label'         => __( 'Plan Name Typography', 'mixlax' ),
                'selector'      => '{{WRAPPER}} .vs-price-list .price-title',
			]
		);

        $this->add_responsive_control(
			'plan_name_margin',
			[
				'label'         => __( 'Plan Name Margin', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .vs-price-list .price-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'plan_name_padding',
			[
				'label'         => __( 'Plan Name Padding', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .vs-price-list .price-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
				'separator'		=> 'after',
			]
		);

		$this->add_control(
			'plan_description_color',
			[
				'label' 		=> __( 'Plan Description Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-price-list .media-body p' => 'color: {{VALUE}}',
                ]
			]
        );

		$this->add_control(
			'plan_description_inner_color',
			[
				'label' 		=> __( 'Plan Description Inner Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-price-list .media-body p .inner-label' => 'color: {{VALUE}}',
                ]
			]
        );

		$this->add_control(
			'plan_description_innerbg_color',
			[
				'label' 		=> __( 'Plan Description Inner Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-price-list .media-body p .inner-label' => 'background-color: {{VALUE}}',
                ]
			]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'plan_description_typography',
				'label'         => __( 'Plan Description Typography', 'mixlax' ),
                'selector'      => '{{WRAPPER}} .vs-price-list .media-body p',
			]
		);

        $this->add_responsive_control(
			'plan_description_margin',
			[
				'label'         => __( 'Plan Description Margin', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .vs-price-list .media-body p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'plan_description_padding',
			[
				'label'         => __( 'Plan Description Padding', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .vs-price-list .media-body p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();


		if( ! empty( $settings['slides'] ) ){
			echo '<!-- Our Team -->';
		    	echo '<div class="price-inner3">';
		      		foreach( $settings['slides'] as $pricing_plan ){
						$target 	= $pricing_plan['image_and_text_link']['is_external'] ? ' target="_blank"' : '';
						$nofollow 	= $pricing_plan['image_and_text_link']['nofollow'] ? ' rel="nofollow"' : '';

						echo '<div class="vs-price-list media package-style2">';
							if( ! empty( $pricing_plan['image']['url'] ) ){
                            	echo '<div class="media-img package-img">';
                                	echo '<a '.wp_kses_post( $target.$nofollow ).' href="'.esc_url( $pricing_plan['image_and_text_link']['url'] ).'">';
										echo wellnez_img_tag( array(
											'url'	=> esc_url( $pricing_plan['image']['url'] )
										) );
									echo '</a>';
                            	echo '</div>';
							}
                            echo '<div class="media-body package-body">';
								if( ! empty( $pricing_plan['pricing_plan_name'] ) ){
                                	echo '<h3 class="price-title package-title"><a class="text-inherit" '.wp_kses_post( $target.$nofollow ).' href="'.esc_url( $pricing_plan['image_and_text_link']['url'] ).'">'.esc_html( $pricing_plan['pricing_plan_name'] ).'</a></h3>';
								}
								if( ! empty( $pricing_plan['pricing_plan_desc'] ) ){
									echo '<p class="package-text mb-0">'.wp_kses_post( $pricing_plan['pricing_plan_desc'] ).'</p>';
								}
                            echo '</div>';
                        echo '</div>';
					}
		    	echo '</div>';
			echo '<!-- Our Team end -->';
		}
	}

}