<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
/**
 *
 * Mixlax Tab Widget .
 *
 */
class Mixlax_Tab_Widget extends Widget_Base {

	public function get_name() {
		return 'mixlaxtab';
	}

	public function get_title() {
		return __( 'Mixlax Tab', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_title_section',
			[
				'label'		 	=> __( 'Mixlax Tab', 'mixlax' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'tab_title',
            [
                'label' 	=> __( 'Tab Title', 'mixlax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Relax', 'mixlax' )
            ]
        );

        $repeater->add_control(
            'tab_description',
            [
                'label' 	=> __( 'Tab Description', 'mixlax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'As part of a new partnership with Sensync, an immersive wellness company founded by Adam Gazzaley, Ph.D., and Alex Theory, Ph.D., The Vessel helps guests reset their brains with a host of customized.', 'mixlax' )
            ]
        );

		$this->add_control(
			'tabs',
			[
				'label' 		=> __( 'Mixlax Tab', 'mixlax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'tab_title' => __( 'Relax', 'mixlax' ),
					],
					[
						'tab_title' => __( 'Spa', 'mixlax' ),
					],
					[
						'tab_title' => __( 'Therapies', 'mixlax' ),
					],
				]
			]
		);

        $this->add_control(
			'section_title_align',
			[
				'label' 		=> __( 'Alignment', 'mixlax' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'text-left' 	=> [
						'title' 		=> __( 'Left', 'mixlax' ),
						'icon' 			=> 'fa fa-align-left',
					],
					'text-center' 	=> [
						'title' 		=> __( 'Center', 'mixlax' ),
						'icon' 			=> 'fa fa-align-center',
					],
					'text-right' 	=> [
						'title' 		=> __( 'Right', 'mixlax' ),
						'icon' 			=> 'fa fa-align-right',
					],
				],
				'default' 	=> 'text-left',
				'toggle' 	=> true,
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'section_title_style_section',
			[
				'label' 	=> __( 'Mixlax Tab Style', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'section_title_color',
			[
				'label' 		=> __( 'Title Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .tabs-style1 a' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'title_hover_color',
			[
				'label' 		=> __( 'Title Hover Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .tabs-style1 a:hover' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'active_title_color',
			[
				'label' 		=> __( 'Active Title Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .tabs-style1 a.active' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'title_bgcolor',
			[
				'label' 		=> __( 'Title Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .tabs-style1 a' => 'background-color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'title_bgcolor_hover',
			[
				'label' 		=> __( 'Title Background Color On Hover', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .tabs-style1 a:hover' => 'background-color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'active_title_bgcolor',
			[
				'label' 		=> __( 'Active Title Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .tabs-style1 a.active' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .tabs-style1.tab-has-arrow a:before' => 'border-top-color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'section_title_typography',
				'label' 		=> __( 'Title Typography', 'mixlax' ),
                'selector' 		=> '{{WRAPPER}} .tabs-style1 a',
			]
		);

        $this->add_responsive_control(
			'section_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tabs-style1 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'section_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tabs-style1 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'border',
				'label' 		=> __( 'Border', 'mixlax' ),
				'selector' 		=> '{{WRAPPER}} .tabs-style1 a',
                'separator' 	=> 'after'
			]
		);

		$this->add_control(
			'section_description_color',
			[
				'label' 		=> __( 'Description Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .tab-content>.tab-pane' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'section_description_typography',
				'label' 		=> __( 'Description Typography', 'mixlax' ),
                'selector' 		=> '{{WRAPPER}} .tab-content>.tab-pane',
			]
        );

        $this->add_responsive_control(
			'section_description_margin',
			[
				'label' 		=> __( 'Description Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tab-content>.tab-pane' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( ! empty( $settings['tabs'] ) ){
            $x = 1;
            echo '<div class="service-tab-wrap">';
                echo '<ul class="nav tabs-style1 tab-has-arrow" id="serviceTab" role="tablist">';
                    foreach( $settings['tabs'] as $tab_title ){
                        if( $x == '1' ){
                            $active_class   = "active";
                            $area_selected  = "true";
                        }else{
                            $active_class   = "";
                            $area_selected  = "false";
                        }
                        echo '<li>';
                            echo '<a class="'.esc_attr( $active_class ).'" id="tabdata-'.esc_attr( $x ).'" data-toggle="tab" href="#relax'.esc_attr( $x ).'" role="tab" aria-controls="relax'.esc_attr( $x ).'" aria-selected="'.esc_attr( $area_selected ).'">'.esc_html( $tab_title['tab_title'] ).'</a>';
                        echo '</li>';
                        $x++;
                    }
                echo '</ul>';
                echo '<div class="tab-content pt-4" id="serviceTabContent">';
                $x = 1;
                    foreach( $settings['tabs'] as $tab_title ){
                        if( $x == '1' ){
                            $active_class   = "active";
                            $area_selected  = "true";
                        }else{
                            $active_class   = "";
                            $area_selected  = "false";
                        }
                        echo '<div class="tab-pane fade show '.esc_attr( $active_class ).'" id="relax'.esc_attr( $x ).'" role="tabpanel" aria-labelledby="tabdata-'.esc_attr( $x ).'">'.wp_kses_post( $tab_title['tab_description'] ).'</div>';
                        $x++;
                    }
                echo '</div>';
            echo '</div>';
        }
	}

}