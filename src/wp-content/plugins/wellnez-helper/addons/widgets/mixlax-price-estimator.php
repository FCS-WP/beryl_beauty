<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
/**
 * 
 * Contact Form Widget .
 *
 */
class Mixlax_Price_Estimator extends Widget_Base {

	public function get_name() {
		return 'mixlaxpriceestimator';
	}

	public function get_title() {
		return __( 'Price Estimator', 'mixlax' );
	}


	public function get_icon() {
		return 'fa fa-code';
    }
    

	public function get_categories() {
		return [ 'mixlax' ];
	}

	
	protected function _register_controls() {

		$this->start_controls_section(
			'estimator_form',
			[
				'label' 	=> __( 'Price Estimator Form', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        
		$this->add_control(
			'estimator_style',
			[
				'label' 		=> __( 'Price Estimator Style', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options' 		=> [
					'one'  			=> __( 'Style One', 'mixlax' ),
					'two' 			=> __( 'Style Two', 'mixlax' ),
					'three' 		=> __( 'Style Three', 'mixlax' ),
				],
			]
		);

        $this->add_control(
			'contact_form_shortcode',
			[
				'label' 	=> __( 'Form Shortcode', 'mixlax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
			]
        );

        $this->end_controls_section();
        
        $this->start_controls_section(
			'form_title_style',
			[
				'label' => __( 'Form Title', 'mixlax' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'form_title_color',
			[
				'label' => __( 'Title Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h4' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'form_title_typography',
				'label' => __( 'Title Typography', 'mixlax' ),
				'selector' => '{{WRAPPER}} h4',
			]
        );
        
        $this->add_control(
			'form_title_margin',
			[
				'label' => __( 'Title Margin', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        
        $this->add_control(
			'form_title_padding',
			[
				'label' => __( 'Title Padding', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'form_input',
			[
				'label' => __( 'Form Input', 'mixlax' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );
        
        $this->add_control(
			'form_input_margin',
			[
				'label' => __( 'Margin', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .contact-form input' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .contact-form textarea' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        
        $this->add_control(
			'form_input_padding',
			[
				'label' => __( 'Padding', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .contact-form input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .contact-form textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'after'
			]
		);
        
        $this->add_control(
			'form_input_color',
			[
				'label' => __( 'Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-form .theme-input-style' => 'color: {{VALUE}} !important;',
				],
			]
        );
        
        $this->add_control(
			'form_input_background_color',
			[
				'label' => __( 'Background Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-form .theme-input-style' => 'background-color: {{VALUE}} !important;',
				],
			]
        );
        
        $this->add_control(
			'form_input_border_color',
			[
				'label' => __( 'Border Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-form .theme-input-style' => 'border-color: {{VALUE}} !important;',
                ],
                'separator' => 'after'
			]
        );
        
        $this->add_control(
			'form_submit_btn_color',
			[
				'label' => __( 'Button Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-form .btn' => 'color: {{VALUE}} !important;',
                ]
			]
        );

        $this->add_control(
			'form_submit_btn_bg_color',
			[
				'label' => __( 'Button Background Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-form .btn' => 'background-color: {{VALUE}} !important;',
                ]
			]
        );
        
        $this->add_control(
			'form_submit_border_color',
			[
				'label' => __( 'Button Border Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-form .btn ' => 'border-color: {{VALUE}} !important;',
                ]
			]
		);
        
        $this->add_control(
			'form_submit_btn_hover_color',
			[
				'label' => __( 'Button Hover Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-form .btn:hover' => 'color: {{VALUE}} !important;',
                ]
			]
        );

        $this->add_control(
			'form_submit_btn_hover_bg_color',
			[
				'label' => __( 'Button Hover Background Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-form .btn:hover' => 'background-color: {{VALUE}} !important;',
                ]
			]
        );
        
        $this->add_control(
			'form_submit_hover_border_color',
			[
				'label' => __( 'Button Hover Border Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-form .btn:hover' => 'border-color: {{VALUE}} !important;',
                ]
			]
		);
        

        $this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();
        echo '<!-- Contact Form  -->';
        echo '<div class="contact-form-wrapper">';
            if( !empty( $settings['form_title'] ) )
            echo '<h4>'.wp_kses_post( $settings['form_title'] ).'</h4>';
            echo '<div class="contact-form">';
                echo do_shortcode( $settings['contact_form_shortcode'] );
            echo '</div>';
        echo '</div>';
        echo '<!-- End of Contact Form  -->';  
	}

}