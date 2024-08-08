<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Icons_Manager;
/**
 * 
 * Icon Button Widget .
 *
 */
class Mixlax_Icon_Button extends Widget_Base {

	public function get_name() {
		return 'mixlaxiconbutton';
	}

	public function get_title() {
		return __( 'Icon Button', 'mixlax' );
	}


	public function get_icon() {
		return 'icon-Group-825';
    }
    

	public function get_categories() {
		return [ 'mixlax_header_elements' ];
	}

	
	protected function _register_controls() {

		$this->start_controls_section(
			'icon_button_section',
			[
				'label' => __( 'Icon Button', 'mixlax' ),
				'tab' => Controls_Manager::TAB_CONTENT,
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
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

        $this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'mixlax' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);

		$this->add_responsive_control(
			'logo_alignment',
			[
				'label' => __( 'Alignment', 'mixlax' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'mixlax' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'mixlax' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'mixlax' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .mixlax-button-icon-wrapper' => 'text-align: {{VALUE}} !important;',
				],
				'default'	=> 'left',
				'toggle' => true,
			]
		);

        $this->end_controls_section();
        
        $this->start_controls_section(
			'icon_style_section',
			[
				'label' => __( 'Icon Style', 'mixlax' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );
        
        $this->add_control(
			'fontsize',
			[
				'label' => __( 'Font Size', 'mixlax' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'step' => 1,
					],
                ],
                'selectors'  => [ 
                    '{{WRAPPER}} a'  => 'font-size: {{SIZE}}{{UNIT}};'
                ]
			]
        );

        $this->add_control(
			'width',
			[
				'label' => __( 'Width', 'mixlax' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'step' => 1,
					],
                ],
                'selectors'  => [ 
                    '{{WRAPPER}} a'  => 'width: {{SIZE}}{{UNIT}};'
                ]
			]
        );

        $this->add_control(
			'height',
			[
				'label' => __( 'Height', 'mixlax' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'step' => 1,
					],
                ],
                'selectors'  => [ 
                    '{{WRAPPER}} a'  => 'height: {{SIZE}}{{UNIT}};'
                ]
			]
        );

        $this->add_responsive_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );
        
        $this->add_responsive_control(
			'content_position',
			[
				'label' => __( 'Vertical Align', 'mixlax' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'Default', 'mixlax' ),
					'top' => __( 'Top', 'mixlax' ),
					'center' => __( 'Middle', 'mixlax' ),
					'bottom' => __( 'Bottom', 'mixlax' ),
					'space-between' => __( 'Space Between', 'mixlax' ),
					'space-around' => __( 'Space Around', 'mixlax' ),
					'space-evenly' => __( 'Space Evenly', 'mixlax' ),
				],
				'selectors_dictionary' => [
					'top' => 'flex-start',
					'bottom' => 'flex-end',
				],
				'selectors' => [
					'{{WRAPPER}} a' => 'align-items: {{VALUE}};',
				],
			]
		);

        $this->add_responsive_control(
			'horizontal_align',
			[
				'label' => __( 'Horizontal Align', 'mixlax' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'Default', 'mixlax' ),
					'flex-start' => __( 'Start', 'mixlax' ),
					'center' => __( 'Center', 'mixlax' ),
					'flex-end' => __( 'End', 'mixlax' ),
					'space-between' => __( 'Space Between', 'mixlax' ),
					'space-around' => __( 'Space Around', 'mixlax' ),
					'space-evenly' => __( 'Space Evenly', 'mixlax' ),
				],
				'selectors' => [
					'{{WRAPPER}} a' => 'justify-content: {{VALUE}}',
				],
			]
        );
        
        $this->add_responsive_control(
			'display_property',
			[
				'label' => __( 'Display', 'mixlax' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'Default', 'mixlax' ),
					'inline-block' => __( 'Inline Block', 'mixlax' ),
					'inline-flex' => __( 'Inline Flex', 'mixlax' ),
					'block' => __( 'Block', 'mixlax' ),
                ],
				'selectors' => [
					'{{WRAPPER}} a' => 'display: {{VALUE}};',
				],
			]
		);
        
        $this->add_control(
			'icon_style_color',
			[
				'label' => __( 'Icon Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} a' => 'color: {{VALUE}}',
                ]
			]
        );

        $this->add_control(
			'icon_bg_color',
			[
				'label' => __( 'Icon Background Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a' => 'background-color: {{VALUE}}',
                ]
			]
        );

        $this->add_responsive_control(
			'icon_style_margin',
			[
				'label' => __( 'Icon Margin', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
        
        $this->add_responsive_control(
			'icon_style_padding',
			[
				'label' => __( 'Icon Padding', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __( 'Icon Border', 'mixlax' ),
				'selector' => '{{WRAPPER}} a',
			]
        );
        
        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( !empty( $settings['button_link']['url'] ) ) {
            $this->add_render_attribute( 'button','href',esc_url( $settings['button_link']['url'] ));
        }

        if( !empty( $settings['button_link']['nofollow'] ) ) {
            $this->add_render_attribute( 'button','rel','nofollow');
        }

        if( !empty( $settings['button_link']['is_external'] ) ) {
            $this->add_render_attribute( 'button','target','_blank');
        }
       
		echo '<!-- Icon button -->';
		echo '<div class="mixlax-button-icon-wrapper">';
			echo '<a '.$this->get_render_attribute_string('button').'>';
				if( !empty( $settings['icon']['value'] ) ) {
					Icons_Manager::render_icon( $settings['icon'] );
				}
			echo '</a>';
		echo '</div>';
        echo '<!-- Icon button -->';
	}

}