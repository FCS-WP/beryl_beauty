<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
/**
 *
 * Pricing Tab Widget
 *
 */
class Mixlax_Pricing_Tab extends Widget_Base {

	public function get_name() {
		return 'mixlaxpricingtab';
	}

	public function get_title() {
		return __( 'Pricing Tab', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'pricingtab',
			[
				'label'     => __( 'Pricing Tab', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$repeater = new Repeater();

        $repeater->add_control(
            'plan_tab_text',
            [
                'label'         => __( 'Pricing Plan Tab Text', 'mixlax' ),
                'type'          => Controls_Manager::TEXTAREA,
                'default'       => __( 'Basic Plan' , 'mixlax' ),
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
			'pricing_plan_price',
            [
				'label'         => __( 'Pricing Plan Price', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '<sub>$</sub><span>99</span><sub>.00</sub>' , 'mixlax' ),
				'label_block'   => true,
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
			'pricing_plan_duration',
            [
				'label'         => __( 'Plan Duration', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Per Month' , 'mixlax' ),
				'label_block'   => true,
			]
		);

        $repeater->add_control(
			'feature_list',
			[
				'label'         => __( 'Feature List', 'mixlax' ),
				'type'          => Controls_Manager::WYSIWYG,
			]
		);

        $repeater->add_control(
			'pricing_plan_button_text',
            [
				'label'         => __( 'Button Text', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Make Appointment' , 'mixlax' ),
				'label_block'   => true,
			]
		);

		$repeater->add_control(
			'button_link',
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
				'label' 		=> __( 'Pricing Tab', 'mixlax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'pricing_plan_name' 	=> __( 'Basic Plan', 'mixlax' ),
						'pricing_plan_duration' => __( 'Per Month', 'mixlax' ),
					],
					[
						'pricing_plan_name' 	=> __( 'Family Plan', 'mixlax' ),
						'pricing_plan_duration' => __( 'Per Month', 'mixlax' ),
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
					'{{WRAPPER}} .vs-pricing-layout2 .vs-price-box' => 'background-color: {{VALUE}}',
				]
			]
		);

		$this->add_control(
			'pricing_box_background_hover',
			[
				'label' 		=> __( 'Pricing Box Background Color Hover', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-pricing-layout2 .vs-price-box:hover' => 'background-color: {{VALUE}}',
				]
			]
		);

        $this->add_control(
			'tab_text_color',
			[
				'label' 		=> __( 'Tab Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .tabs-style1 a' => 'color: {{VALUE}}',
				]
			]
		);

        $this->add_control(
			'tab_background_color',
			[
				'label' 		=> __( 'Tab Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .tabs-style1 a' => 'background-color: {{VALUE}}',
				]
			]
		);

        $this->add_control(
			'active_tab_color',
			[
				'label' 		=> __( 'Active Tab Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .tabs-style1 a.active' => 'color: {{VALUE}}',
				]
			]
		);

        $this->add_control(
			'active_tab_background',
			[
				'label' 		=> __( 'Active Tab Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .tabs-style1 a.active' => 'background-color: {{VALUE}}',
				]
			]
		);

        $this->add_control(
			'tab_hover_color',
			[
				'label' 		=> __( 'Tab Hover Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .tabs-style1 a:hover' => 'color: {{VALUE}}',
				]
			]
		);

        $this->add_control(
			'tab_hover_background_color',
			[
				'label' 		=> __( 'Tab Hover Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .tabs-style1 a:hover' => 'background-color: {{VALUE}}',
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'pricing_table_style_option',
			[
				'label' 	=> __( 'Pricing Tab Style', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'plan_price_color',
			[
				'label' 		=> __( 'Plan Price Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-pricing-layout2 .vs-price' => 'color: {{VALUE}}',
                ]
			]
        );

		$this->add_control(
			'plan_name_color',
			[
				'label' 		=> __( 'Plan Name Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-price-box .package-name' => 'color: {{VALUE}}',
                ]
			]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'plan_name_typography',
				'label'         => __( 'Plan Name Typography', 'mixlax' ),
                'selector'      => '{{WRAPPER}} .vs-price-box .package-name',
			]
		);

        $this->add_responsive_control(
			'plan_name_margin',
			[
				'label'         => __( 'Plan Name Margin', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .vs-price-box .package-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .vs-price-box .package-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
				'separator'		=> 'after',
			]
		);
        $this->add_control(
            'plan_duration_color',
            [
                'label' 		=> __( 'Plan Duration Color', 'mixlax' ),
                'type' 			=> Controls_Manager::COLOR,
                'selectors' 	=> [
                    '{{WRAPPER}} .vs-price-box .package-time' => 'color: {{VALUE}}',
                ],

            ]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'plan_duration_typography',
				'label'         => __( 'Plan Duration Typography', 'mixlax' ),
                'selector'      => '{{WRAPPER}} .vs-price-box .package-time',
                'separator'		=> 'after',
			]
		);
		$this->add_control(
			'plan_feature_color',
			[
				'label' 		=> __( 'Plan Feature Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-pricing-layout2 .vs-price-list li' => 'color: {{VALUE}}',
                ]
			]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'plan_feature_typography',
				'label'         => __( 'Plan Feature Typography', 'mixlax' ),
                'selector'      => '{{WRAPPER}} .vs-pricing-layout2 .vs-price-list li',
			]
		);

        $this->add_responsive_control(
			'plan_feature_margin',
			[
				'label'         => __( 'Plan Feature Margin', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .vs-pricing-layout2 .vs-price-list li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'plan_feature_padding',
			[
				'label'         => __( 'Plan Feature Padding', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .vs-pricing-layout2 .vs-price-list li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( ! empty( $settings['slides'] ) ){
            echo '<section class="vs-pricing-wrapper">';
                echo '<ul class="nav tabs-style1 justify-content-center" role="tablist">';
                    $x = 1;
                    foreach( $settings['slides'] as $pricing_plan ){
                        if( $x == '1' ){
                            $active     = 'active';
                            $selected   = 'true';
                        }else{
                            $active     = '';
                            $selected   = 'false';
                        }
                        echo '<li>';
                            echo '<a class="nav-link '.esc_attr( $active ).'" id="tabplan'.esc_attr( $x ).'" data-bs-toggle="tab" href="#basicPlan'.esc_attr( $x ).'" role="tab" aria-controls="basicPlan'.esc_attr( $x ).'" aria-selected="'.esc_attr( $selected ).'">'.esc_html( $pricing_plan['plan_tab_text'] ).'</a>';
                        echo '</li>';
                        $x++;
                    }
                echo '</ul>';
                echo '<div class="tab-content vs-pricing-layout2" id="myTabContent">';
                    $x = 1;
                    foreach( $settings['slides'] as $pricing_plan ){
                        if( $x == '1' ){
                            $active     = 'active';
                        }else{
                            $active     = '';
                        }
                        echo '<div class="tab-pane fade show '.esc_attr( $active ).'" id="basicPlan'.esc_attr( $x ).'" role="tabpanel" aria-labelledby="tabplan'.esc_attr( $x ).'">';
                            echo '<div class="vs-price-box" data-overlay="theme">';
                                echo '<div class="vs-price-head border-light-theme d-flex justify-content-between align-items-end">';
                                    if( ! empty( $pricing_plan['pricing_plan_price'] ) ){
                                        echo '<div class="vs-price">';
                                            echo wp_kses_post( $pricing_plan['pricing_plan_price'] );
                                        echo '</div>';
                                    }
                                    echo '<div class="vs-price-package text-right">';
                                        if( ! empty( $pricing_plan['pricing_plan_name'] ) ){
                                            echo '<h3 class="package-name mb-0">'.esc_html( $pricing_plan['pricing_plan_name'] ).'</h3>';
                                        }
                                        if( ! empty( $pricing_plan['pricing_plan_duration'] ) ){
                                            echo '<span class="package-time">'.esc_html( $pricing_plan['pricing_plan_duration'] ).'</span>';
                                        }
                                    echo '</div>';
                                echo '</div>';
                                echo '<div class="vs-price-body text-center">';
                                    if( ! empty( $pricing_plan['feature_list'] ) ){
                                        echo wp_kses_post( $pricing_plan['feature_list'] );
                                    }
                                    if( ! empty( $pricing_plan['pricing_plan_button_text'] ) ){
                                        $target 	= $pricing_plan['button_link']['is_external'] ? ' target="_blank"' : '';
                						$nofollow 	= $pricing_plan['button_link']['nofollow'] ? ' rel="nofollow"' : '';
                                        echo '<a href="'.esc_url( $pricing_plan['button_link']['url'] ).'" class="vs-btn style10">'.esc_html( $pricing_plan['pricing_plan_button_text'] ).'<i class="far fa-arrow-right"></i></a>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                        $x++;
                    }
                echo '</div>';
            echo '</section>';
        }
	}

}