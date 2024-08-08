<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Icons_Manager;
use \Elementor\Repeater;
/**
 * 
 * Contact Number Widget .
 *
 */
class Mixlax_Header_Contact extends Widget_Base {

	public function get_name() {
		return 'mixlaxheadercontact';
	}

	public function get_title() {
		return __( 'Header Contact', 'mixlax' );
	}


	public function get_icon() {
		return 'icon-Group-825';
    }
    

	public function get_categories() {
		return [ 'mixlax_header_elements' ];
	}

	
	protected function _register_controls() {

		$this->start_controls_section(
			'header_contact_section',
			[
				'label' => __( 'Header Contact', 'mixlax' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'header_contact_type',
			[
				'label' => __( 'Contact Type', 'mixlax' ),
                'type' => Controls_Manager::SELECT,
				'options' => [
					'1' => __('Phone Number','mixlax'),
					'2' => __('Email Address','mixlax'),
				],
				'default' => '1',
			]
        );
        
        $this->add_control(
			'before_header_contact_info',
			[
				'label' => __( 'Before Contact Info', 'mixlax' ),
                'type' => Controls_Manager::SELECT,
				'options' => [
					'1' => __('Icon','mixlax'),
					'2' => __('Text','mixlax'),
				],
				'default' => '1',
			]
        );

        $this->add_control(
			'before_header_contact_icon',
			[
				'label' => __( 'Icon', 'mixlax' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
				'condition'	=> ['before_header_contact_info'	=> '1']
			]
        );

        $this->add_control(
			'before_header_contact_text',
			[
				'label' => __( 'Text', 'mixlax' ),
                'type' => Controls_Manager::TEXTAREA,
				'default'  => __( 'Text', 'mixlax' ),
				'condition'	=> ['before_header_contact_info'	=> '2']
			]
		);
		
		$repeater = new Repeater();

		$repeater->add_control(
			'contact_item', [
				'label' => __( 'Item', 'mixlax' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '02 478 658 8965' , 'mixlax' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'lists',
			[
				'label' => __( 'Infos', 'mixlax' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'contact_item' => __( '02 478 658 8965', 'mixlax' ),
					],
					[
						'contact_item' => __( '02 478 658 8965', 'mixlax' ),
					],
				],
				'title_field' => '{{{ contact_item }}}',
			]
		);

		$this->add_responsive_control(
			'alignment',
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
					'{{WRAPPER}} .contact-no' => 'text-align: {{VALUE}} !important;',
				],
				'default'	=> 'left',
				'toggle' => true,
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'header_contact_wrapper_style',
			[
				'label' => __( 'Wrapper', 'mixlax' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_responsive_control(
			'header_contact_wrapper_margin',
			[
				'label' => __( 'Wrapper Margin', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .contact-no' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
        
        $this->add_responsive_control(
			'header_contact_wrapper_padding',
			[
				'label' => __( 'Wrapper Padding', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .contact-no' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

        $this->end_controls_section();
		
		$this->start_controls_section(
			'before_header_contact_icon_style',
			[
				'label' => __( 'Before Contact Icon', 'mixlax' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition'	=> ['before_header_contact_info'	=> '1']
			]
		);
        
        $this->add_control(
			'before_header_contact_icon_color',
			[
				'label' => __( 'Before Contact Icon Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} i' => 'color: {{VALUE}}',
                ]
			]
        );

        $this->add_responsive_control(
			'before_header_contact_icon_margin',
			[
				'label' => __( 'Before Contact Icon Margin', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
        
        $this->add_responsive_control(
			'before_header_contact_icon_padding',
			[
				'label' => __( 'Before Contact Icon Padding', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'before_header_contact_text_style',
			[
				'label' => __( 'Before Contact Text', 'mixlax' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition'	=> ['before_header_contact_info'	=> '2']
			]
		);
        
        $this->add_control(
			'before_header_contact_text_color',
			[
				'label' => __( 'Before Contact Text Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} strong' => 'color: {{VALUE}}',
                ]
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'before_header_contact_text_typography',
				'label' => __( 'Before Contact Text Typography', 'mixlax' ),
                'selector' => '{{WRAPPER}} strong',
			]
		);

        $this->add_responsive_control(
			'before_header_contact_text_margin',
			[
				'label' => __( 'Before Contact Text Margin', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} strong' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
        
        $this->add_responsive_control(
			'before_header_contact_text_padding',
			[
				'label' => __( 'Before Contact Text Padding', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} strong' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'header_contact_info_style',
			[
				'label' => __( 'Contact Info', 'mixlax' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'header_contact_info_color',
			[
				'label' => __( 'Contact Info Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a' => 'color: {{VALUE}}',
                ]
			]
        );
        
        $this->add_control(
			'header_contact_info_hover_color',
			[
				'label' => __( 'Contact Info Hover Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a:hover' => 'color: {{VALUE}}',
                ]
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'header_contact_info_typography',
				'label' => __( 'Contact Info Typography', 'mixlax' ),
                'selector' => '{{WRAPPER}} a',
			]
		);

        $this->add_responsive_control(
			'header_contact_info_margin',
			[
				'label' => __( 'Contact Info Margin', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
        
        $this->add_responsive_control(
			'header_contact_info_padding',
			[
				'label' => __( 'Contact Text Padding', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} strong' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('wrapper','class','section-title');

		echo '<div class="contact-no">';
			if( $settings['before_header_contact_info'] == '1' ) {
				Icons_Manager::render_icon( $settings['before_header_contact_icon'] );
			} else {
				if( !empty( $settings['before_header_contact_text'] ) ) {
					echo '<strong>'.esc_html( $settings['before_header_contact_text'] ).'</strong>';
				}
			}
			
			foreach( $settings['lists'] as $singleitem ) {
				if( $settings['header_contact_type'] == '1' ) {
					if( !empty( $singleitem['contact_item'] ) ) {
						$replace    = array(' ','-',' - ');
						$with       = array('','','');
						$mobileurl  = str_replace( $replace, $with, $singleitem['contact_item'] );
						echo '<a href="callto:'.esc_attr( $mobileurl ).'">'.esc_html( $singleitem['contact_item'] ).'</a>';
					}
				} else {
					if( !empty( $singleitem['contact_item'] ) ) {
						$email      = is_email( $singleitem['contact_item'] );
						$replace    = array(' ','-',' - ');
						$with       = array('','','');

						$emailurl   = str_replace( $replace, $with, $email );
						echo '<a href="mailto:'.esc_attr( $emailurl ).'">'.esc_html( $singleitem['contact_item'] ).'</a>';
					}
				}
			}
		
        echo '</div>';
	}

}