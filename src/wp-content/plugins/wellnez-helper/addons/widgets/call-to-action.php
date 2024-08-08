<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
/**
 * 
 * CTA Widget .
 *
 */
class Mixlax_Call_To_Action extends Widget_Base {

	public function get_name() {
		return 'mixlaxcalltoaction';
	}

	public function get_title() {
		return __( 'Call to Action', 'mixlax' );
	}


	public function get_icon() {
		return 'icon-Group-825';
    }
    

	public function get_categories() {
		return [ 'mixlax' ];
	}

	
	protected function _register_controls() {

		$this->start_controls_section(
			'cta_title_section',
			[
				'label' => __( 'CTA Title', 'mixlax' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
        
        $this->add_control(
			'cta_title',
			[
				'label' => __( 'CTA Title', 'mixlax' ),
                'type' => Controls_Manager::TEXTAREA,
                'default'  => __( 'CTA Title', 'mixlax' )
			]
        );
        

        $this->add_control(
			'cta_subtitle',
			[
				'label' => __( 'CTA Subtitle', 'mixlax' ),
                'type' => Controls_Manager::TEXTAREA,
                'default'  => __( 'CTA Subtitle', 'mixlax' )
			]
        );

        $this->add_control(
			'cta_short_desc',
			[
				'label' => __( 'CTA Short Description', 'mixlax' ),
                'type' => Controls_Manager::TEXTAREA,
                'default'  => __( 'CTA Short Description', 'mixlax' ),
                'seperator' => 'after'
            ]
        );

        $this->add_control(
			'btn_style',
			[
				'label' => __( 'Button Style', 'mixlax' ),
                'type' => Controls_Manager::SELECT,
                'options'   => [
                    '1'    => __('Style One','mixlax'),
                    '2'    => __('Style Two','mixlax'),
                ],
                'default'  => '1',
			]
        );

        $this->add_control(
			'btn_text',
			[
				'label' => __( 'Button Text', 'mixlax' ),
                'type' => Controls_Manager::TEXTAREA,
                'default'  => __( 'Button Text', 'mixlax' )
			]
        );

        $this->add_control(
			'btn_link',
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
			'cta_align',
			[
				'label' => __( 'Alignment', 'mixlax' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'text-left' => [
						'title' => __( 'Left', 'mixlax' ),
						'icon' => 'fa fa-align-left',
					],
					'text-center' => [
						'title' => __( 'Center', 'mixlax' ),
						'icon' => 'fa fa-align-center',
					],
					'text-right' => [
						'title' => __( 'Right', 'mixlax' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'text-left',
				'toggle' => true,
			]
		);

        $this->end_controls_section();
        
        $this->start_controls_section(
			'cta_title_style_section',
			[
				'label' => __( 'CTA Title', 'mixlax' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );
        
        $this->add_control(
			'cta_title_color',
			[
				'label' => __( 'CTA Title Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cta-title' => 'color: {{VALUE}}',
                ]
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'cta_title_typography',
				'label' => __( 'CTA Title Typography', 'mixlax' ),
                'selector' => '{{WRAPPER}} .cta-title',
			]
        );

        $this->add_control(
			'cta_title_margin',
			[
				'label' => __( 'CTA Title Margin', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cta-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
        
        $this->add_control(
			'cta_title_padding',
			[
				'label' => __( 'CTA Title Padding', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cta-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section(
			'cta_subtitle_style_section',
			[
				'label' => __( 'CTA Subtitle', 'mixlax' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [ 'cta_subtitle!'    => '' ]
			]
        );

		$this->add_control(
			'cta_subtitle_color',
			[
				'label' => __( 'CTA Subtitle Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cta-content span' => 'color: {{VALUE}}',
                ]
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'cta_subtitle_typography',
				'label' => __( 'CTA Subtitle Typography', 'mixlax' ),
                'selector' => '{{WRAPPER}} .cta-content span',
			]
        );
        
        $this->add_control(
			'cta_subtitle_margin',
			[
				'label' => __( 'CTA Subtitle Margin', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cta-content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
        
        $this->add_control(
			'cta_subtitle_padding',
			[
				'label' => __( 'CTA Subtitle Padding', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cta-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section(
			'cta_desc_style_section',
			[
				'label' => __( 'CTA Description', 'mixlax' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );
        
        $this->add_control(
			'cta_desc_color',
			[
				'label' => __( 'CTA Description Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cta-content p' => 'color: {{VALUE}}',
                ]
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'cta_desc_typography',
				'label' => __( 'CTA Description Typography', 'mixlax' ),
                'selector' => '{{WRAPPER}} .cta-content p'
			]
        );
        
        $this->add_control(
			'cta_desc_margin',
			[
				'label' => __( 'CTA Description Margin', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cta-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
        
        $this->add_control(
			'cta_desc_padding',
			[
				'label' => __( 'CTA Description Padding', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cta-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
    
        $this->end_controls_section();

        $this->start_controls_section(
			'cta_btn_style_section',
			[
				'label' => __( 'CTA Button', 'mixlax' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );
        
        $this->add_control(
			'cta_btn_color',
			[
				'label' => __( 'CTA Button Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cta-content .btn_underline' => 'color: {{VALUE}}',
					'{{WRAPPER}} .cta-content .btn_underline:before' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .cta-content .btn_underline:after' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .cta-content .btn' => 'color: {{VALUE}}',
                ]
			]
        );

        $this->add_control(
			'cta_btn_bg_color',
			[
				'label' => __( 'CTA Button Background Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cta-content .btn' => 'background-color: {{VALUE}}',
                ],
                'condition' => [ 'btn_style'    => '2' ]
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'cta_btn_typography',
				'label' => __( 'CTA Button Typography', 'mixlax' ),
                'selector' => '{{WRAPPER}} .cta-content a'
			]
        );
        
        $this->add_control(
			'cta_btn_margin',
			[
				'label' => __( 'CTA Button Margin', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cta-content a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
        
        $this->add_control(
			'cta_btn_padding',
			[
				'label' => __( 'CTA Button Padding', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cta-content a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
    
        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        
        if( $settings['btn_style'] == '1' ) {
            $this->add_render_attribute('btn','class','btn_underline');
        } else{
            $this->add_render_attribute('btn','class','btn rounded');
        }

        if( !empty( $settings['btn_link']['url'] ) ) {
            $this->add_render_attribute('btn','href',esc_url( $settings['btn_link']['url'] ));
        }

        if( !empty( $settings['btn_link']['nofollow'] ) ) {
            $this->add_render_attribute('btn','rel', 'nofollow' );
        }

        if( !empty( $settings['btn_link']['is_external'] ) ) {
            $this->add_render_attribute('btn','target','_blank');
        }

        $this->add_render_attribute('wrapper','class','cta-content');
        $this->add_render_attribute('wrapper','class',esc_attr($settings['cta_align']));


        echo '<!-- CTA Content -->';
        echo '<div '.$this->get_render_attribute_string('wrapper').' >';
            
            if( !empty( $settings['cta_subtitle'] ) ) {
                echo '<span>'.esc_html( $settings['cta_subtitle'] ).'</span>';
            }

            if( !empty( $settings['cta_title'] ) ) {
                echo '<h2 class="cta-title">'.esc_html( $settings['cta_title'] ).'</h2>';
            }

            if( !empty( $settings['cta_short_desc'] ) ) {
                echo '<p>'.esc_html( $settings['cta_short_desc'] ).'</p>';
            }

            if( !empty( $settings['btn_text'] ) ) {
                echo '<a '.$this->get_render_attribute_string('btn').' >'.esc_html( $settings['btn_text'] ).'</a>';
            }
        echo '</div>';
        echo '<!-- End CTA Content -->';
	}

}