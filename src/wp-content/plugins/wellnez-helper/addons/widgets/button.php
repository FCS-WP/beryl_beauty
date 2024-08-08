<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
/**
 *
 * Button Widget .
 *
 */
class Mixlax_Button extends Widget_Base {

	public function get_name() {
		return 'mixlaxbutton';
	}

	public function get_title() {
		return __( 'Button', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'button_section',
			[
				'label' => __( 'Button', 'mixlax' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'button_style',
			[
				'label' 	=> __( 'Button Style', 'mixlax' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'mixlax' ),
					'2' 		=> __( 'Style Two', 'mixlax' ),
				],
			]
		);

        $this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'mixlax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Button Text', 'mixlax' )
			]
        );

        $this->add_control(
			'button_link',
			[
				'label' 		=> __( 'Link', 'mixlax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'mixlax' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

		$this->add_control(
			'button_icon',
			[
				'label' 	=> __( 'Button Icon Class', 'mixlax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
			]
        );

		$this->add_control(
			'button_icon_position',
			[
				'label' 	=> __( 'Button Icon Position', 'mixlax' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Before Text', 'mixlax' ),
					'2' 		=> __( 'After Text', 'mixlax' ),
				],
			]
		);

        $this->add_responsive_control(
			'button_align',
			[
				'label' 	=> __( 'Alignment', 'mixlax' ),
				'type' 		=> Controls_Manager::CHOOSE,
				'options' 	=> [
					'left'   	=> [
						'title' 		=> __( 'Left', 'mixlax' ),
						'icon' 			=> 'fa fa-align-left',
					],
					'center' 	=> [
						'title' 		=> __( 'Center', 'mixlax' ),
						'icon' 			=> 'fa fa-align-center',
					],
					'right' 	=> [
						'title' 		=> __( 'Right', 'mixlax' ),
						'icon' 			=> 'fa fa-align-right',
					],
				],
				'default' 	=> 'left',
				'toggle' 	=> true,
				'selectors' => [
					'{{WRAPPER}} .btn-wrapper' => 'text-align: {{VALUE}}',
                ],
			]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Button Style', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'button_color',
			[
				'label' 	=> __( 'Button Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-wrapper a' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_hover_color',
			[
				'label' 	=> __( 'Button Hover Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-wrapper a:hover' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_color',
			[
				'label' 	=> __( 'Button Background Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-wrapper a' => 'background-color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_color_hover',
			[
				'label' 	=> __( 'Button Background Hover Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-btn .vs-btn-shape' => 'background-color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border',
				'label' 	=> __( 'Border', 'mixlax' ),
                'selector' 	=> '{{WRAPPER}} .btn-wrapper a',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => __( 'Button Typography', 'mixlax' ),
                'selector' => '{{WRAPPER}} .btn-wrapper a',
			]
        );

        $this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Button Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .btn-wrapper a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'button_padding',
			[
				'label' 		=> __( 'Button Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .btn-wrapper a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

		$this->add_control(
			'button_icon_color',
			[
				'label' 	=> __( 'Button Icon Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-btn .vs-btn-icon' => 'color: {{VALUE}}',
                ],
				'condition'	=> [ 'button_icon!' => '' ]
			]
        );

		$this->add_control(
			'button_icon_color_hover',
			[
				'label' 	=> __( 'Button Icon Color Hover', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-btn:hover .vs-btn-icon' => 'color: {{VALUE}}',
                ],
				'condition'	=> [ 'button_icon!' => '' ]
			]
        );

		$this->add_control(
			'button_icon_bg_color',
			[
				'label' 	=> __( 'Button Icon Background Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-btn.wave-style1 .vs-btn-icon' => 'background-color: {{VALUE}}',
                ],
				'condition'	=> [ 'button_icon!' => '' ]
			]
        );

		$this->add_control(
			'button_icon_bg_hover_color',
			[
				'label' 	=> __( 'Button Icon Background Hover Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-btn.wave-style1:hover .vs-btn-icon' => 'background-color: {{VALUE}}',
                ],
				'condition'	=> [ 'button_icon!' => '' ]
			]
        );

        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'wrapper', 'class', 'btn-wrapper');

				if( $settings['button_style'] == '1' ){
					$this->add_render_attribute( 'button', 'class', 'vs-btn style10' );
				}else{
					$this->add_render_attribute( 'button', 'class', 'vs-btn style11' );
				}

        if( ! empty( $settings['button_link']['url'] ) ) {
            $this->add_render_attribute( 'button', 'href', esc_url( $settings['button_link']['url'] ) );
        }

        if( !empty( $settings['button_link']['nofollow'] ) ) {
            $this->add_render_attribute( 'button','rel','nofollow');
        }

        if( !empty( $settings['button_link']['is_external'] ) ) {
            $this->add_render_attribute( 'button','target','_blank');
        }

        echo '<!-- Button -->';
        echo '<div '.$this->get_render_attribute_string('wrapper').'>';
					if( !empty( $settings['button_text'] ) ) {
						echo '<a '.$this->get_render_attribute_string('button').'>';
					if( ! empty( $settings['button_icon'] ) && $settings['button_icon_position'] == '1'  ){
						echo '<i class="'.esc_attr( $settings['button_icon'] ).'"></i>';
					}
					echo esc_html( $settings['button_text'] );
					if( ! empty( $settings['button_icon'] ) && $settings['button_icon_position'] == '2'  ){
						echo '<i class="'.esc_attr( $settings['button_icon'] ).'"></i>';
					}
				echo '</a>';
            }
        echo '</div>';
        echo '<!-- End Button -->';
	}

}