<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Feature Image Widget .
 *
 */
class Mixlax_Feature_Image extends Widget_Base {

	public function get_name() {
		return 'mixlaxfeatureimage';
	}

	public function get_title() {
		return __( 'Feature Image', 'mixlax' );
	}

    public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'feature_image_section',
			[
				'label' 	=> __( 'Feature Image', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'price_text',
			[
				'label'         => __( 'Price Box Text', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => '<span class="text">'.__( 'Start', 'mixlax' ).'</span><span class="price"><sup>$</sup>30</span><span class="sub">'.__( '/off', 'mixlax' ).'</span>',
			]
		);

        $this->add_control(
			'feature_title',
			[
				'label'         => __( 'Feature Title', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Hair Treatment', 'mixlax' ),
			]
		);

        $this->add_control(
			'feature_description',
			[
				'label'         => __( 'Feature Description', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.', 'mixlax' ),
			]
		);

        $this->add_control(
			'feature_image',
			[
				'label'     => __( 'Choose Feature Image', 'mixlax' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            'general_style_section',
            [
                'label' 	=> __( 'Feature Title Style', 'mixlax' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'price_box_text_color',
			[
				'label' 	=> __( 'Price Box Text Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-price-box1 .text,{{WRAPPER}} .vs-price-box1 .price,{{WRAPPER}} .vs-price-box1 .sub' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'price_box_background_color',
			[
				'label' 	=> __( 'Price Box Background Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-price-box1' => 'background-color: {{VALUE}}',
                ],
			]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'feature_title_style_section',
			[
				'label' 	=> __( 'Feature Title Style', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'feature_title_color',
			[
				'label' 	=> __( 'Feature Title Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-feature-content .feature-title' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'feature_title_typography',
				'label'     => __( 'Feature Title Typography', 'mixlax' ),
                'selector'  => '{{WRAPPER}} .vs-feature-content .feature-title',
			]
        );

        $this->add_responsive_control(
			'feature_title_margin',
			[
				'label' 		=> __( 'Feature Title Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-feature-content .feature-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'feature_title_padding',
			[
				'label' 		=> __( 'Feature Title Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-feature-content .feature-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'     => 'after',
			]
		);
        $this->add_control(
			'feature_description_color',
			[
				'label' 	=> __( 'Feature Description Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-feature-content .feature-text' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'feature_description_typography',
				'label'     => __( 'Feature Description Typography', 'mixlax' ),
                'selector'  => '{{WRAPPER}} .vs-feature-content .feature-text',
			]
        );

        $this->add_responsive_control(
			'feature_description_margin',
			[
				'label' 		=> __( 'Feature Description Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-feature-content .feature-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'feature_description_padding',
			[
				'label' 		=> __( 'Feature Description Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-feature-content .feature-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<div class="vs-features-wrapper vs-features-layout2">';
            echo '<div class="vs-feature">';
                if( ! empty( $settings['price_text'] ) ){
                    echo '<div class="vs-price-box1">';
                        echo wp_kses_post( $settings['price_text'] );
                    echo '</div>';
                }
                if( ! empty( $settings['feature_image']['url'] ) ){
                    echo '<div class="vs-feature-img">';
                        echo wellnez_img_tag( array(
                            'url'   => esc_url( $settings['feature_image']['url'] ),
                            'class' => 'w-100',
                        ) );
                    echo '</div>';
                }
                echo '<div class="vs-feature-content">';
                    if( ! empty( $settings['feature_title'] ) ){
                        echo '<h2 class="h4 feature-title mb-0">'.esc_html( $settings['feature_title'] ).'</h2>';
                    }
                    if( ! empty( $settings['feature_description'] ) ){
                        echo '<p class="feature-text">'.wp_kses_post( $settings['feature_description'] ).'</p>';
                    }
                echo '</div>';
            echo '</div>';
        echo '</div>';

	}

}