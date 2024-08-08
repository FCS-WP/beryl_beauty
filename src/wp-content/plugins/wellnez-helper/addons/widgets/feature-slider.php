<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Feature Slider Widget .
 *
 */
class Mixlax_Feature_Slider extends Widget_Base{

	public function get_name() {
		return 'mixlaxfeatureslider';
	}

	public function get_title() {
		return __( 'Feature Slider', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'feature_slider_section',
			[
				'label' 	=> __( 'Feature Slider', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

        $repeater->add_control(
            'feature_image',
            [
                'label' 		=> __( 'Feature Image.', 'mixlax' ),
                'type' 			=> Controls_Manager::MEDIA,
                'default' 		=> [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
			'feature_icon', [
				'label' 		=> __( 'Feature Icon', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'far fa-check' , 'mixlax' ),
				'label_block' 	=> true,
			]
        );

		$repeater->add_control(
			'feature_category', [
				'label' 		=> __( 'Feature Category', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Strong' , 'mixlax' ),
				'label_block' 	=> true,
			]
        );

		$repeater->add_control(
			'feature_title', [
				'label' 		=> __( 'Feature Title', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Face Glowing' , 'mixlax' ),
				'label_block' 	=> true,
			]
        );

		$repeater->add_control(
			'feature_description', [
				'label' 		=> __( 'Feature Description', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'You can simply pick your favourite package therapy and buy it as a voucher.' , 'mixlax' ),
				'label_block' 	=> true,
			]
        );

        $repeater->add_control(
			'button_text', [
				'label' 		=> __( 'Button Text', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( ' Book Appointment' , 'mixlax' ),
				'label_block' 	=> true,
			]
        );

        $repeater->add_control(
			'button_link',
			[
				'label' 		=> __( 'Button Link', 'mixlax' ),
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
				'label' 		=> __( 'Slides', 'mixlax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'feature_title' 		=> __( 'Face Glowing', 'mixlax' ),
						'feature_description' 	=> __( 'You can simply pick your favourite package therapy and buy it as a voucher.', 'mixlax' ),
						'feature_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'feature_title' 		=> __( 'Your Treatment', 'mixlax' ),
						'feature_description' 	=> __( 'You can simply pick your favourite package therapy and buy it as a voucher.', 'mixlax' ),
						'feature_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'feature_title' 		=> __( 'Gift Packages', 'mixlax' ),
						'feature_description' 	=> __( 'You can simply pick your favourite package therapy and buy it as a voucher.', 'mixlax' ),
						'feature_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'feature_title' 		=> __( 'Offers & Deals', 'mixlax' ),
						'feature_description' 	=> __( 'You can simply pick your favourite package therapy and buy it as a voucher.', 'mixlax' ),
						'feature_image' 		=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{{ feature_title }}}',
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
			'slider_control',
			[
				'label' 	=> __( 'Slider Control', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'slide_to_show',
			[
				'label'         => __( 'Slider To Show?', 'mixlax' ),
				'type'          => Controls_Manager::SLIDER,
				'size_units'    => [ 'px' ],
				'range'         => [
					'px'           => [
						'min'             => 0,
						'max'             => 8,
						'step'            => 1,
					],
				],
				'default'       => [
					'unit'         => 'px',
					'size'         => 4,
				],
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'feature_general',
			[
				'label' 	=> __( 'General', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'feature_slider_active_bg_color',
			[
				'label' 		=> __( 'Feature Active Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-features-layout3 .slick-center .vs-feature' => 'background-color: {{VALUE}}',
				],
			]
        );

		$this->add_control(
			'feature_slider_feature_bg_color',
			[
				'label' 		=> __( 'Feature Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-features-layout3 .vs-feature' => 'background-color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'feature_active_button_color',
			[
				'label' 		=> __( 'Active Button Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-features-layout3 .slick-center .vs-feature .vs-btn' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'feature_active_button_bg_color',
			[
				'label' 		=> __( 'Active Button Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-features-layout3 .slick-center .vs-feature .vs-btn' => 'background-color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'feature_button_color',
			[
				'label' 		=> __( 'Feature Button Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-features-layout3 .vs-feature .vs-btn ' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'feature_button_bg_color',
			[
				'label' 		=> __( 'Feature Button Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-features-layout3 .vs-feature .vs-btn ' => 'background-color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'feature_button_hover_color',
			[
				'label' 		=> __( 'Feature Button Hover Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-features-layout3 .vs-feature:hover .vs-btn' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'feature_button_hover_bg_color',
			[
				'label' 		=> __( 'Feature Button Hover Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-features-layout3 .vs-feature:hover .vs-btn' => 'background-color: {{VALUE}}',
				],
			]
        );

		$this->end_controls_section();

        $this->start_controls_section(
			'feature_slider_feature_category_style_section',
			[
				'label' 	=> __( 'Feature Category', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'feature_slider_feature_category_color',
			[
				'label' 		=> __( 'Feature Category Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-feature .feature-content strong' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'feature_slider_feature_category_typography',
				'label' 	=> __( 'Feature Category Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .vs-feature .feature-content strong',
			]
        );

        $this->add_responsive_control(
			'feature_slider_feature_category_margin',
			[
				'label' 		=> __( 'Feature Category Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-feature .feature-content strong' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'feature_slider_feature_category_padding',
			[
				'label' 		=> __( 'Feature Category Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-feature .feature-content strong' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'feature_slider_feature_title_style_section',
			[
				'label' 	=> __( 'Feature Title', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'feature_slider_feature_title_color',
			[
				'label' 		=> __( 'Feature Title Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-feature .feature-content .feature-title' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'feature_slider_feature_title_typography',
				'label' 	=> __( 'Feature Title Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .vs-feature .feature-content .feature-title',
			]
        );

        $this->add_responsive_control(
			'feature_slider_feature_title_margin',
			[
				'label' 		=> __( 'Feature Title Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-feature .feature-content .feature-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'feature_slider_feature_title_padding',
			[
				'label' 		=> __( 'Feature Title Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-feature .feature-content .feature-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'feature_slider_desc_style_section',
			[
				'label' 	=> __( 'Feature Description', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'feature_slider_desc_color',
			[
				'label' 	=> __( 'Feature Description Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-feature .feature-content p.feature-text' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'feature_slider_desc_typography',
				'label' 	=> __( 'Feature Description Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .vs-feature .feature-content p.feature-text',
			]
        );

        $this->add_responsive_control(
			'feature_slider_desc_margin',
			[
				'label' 		=> __( 'Feature Description Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-feature .feature-content p.feature-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'feature_slider_desc_padding',
			[
				'label' 		=> __( 'Feature Description Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-feature .feature-content p.feature-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();


	}

	protected function render() {

		$settings = $this->get_settings_for_display();


        $this->add_render_attribute( 'wrapper', 'class', 'row vs-carousel' );
        $this->add_render_attribute( 'wrapper', 'data-slide-to-show', $settings['slide_to_show']['size'] );

        $this->add_render_attribute( 'wrapper', 'data-centermode', 'true' );
        $this->add_render_attribute( 'wrapper', 'data-centerpadding', '0px' );

        if( ! empty( $settings['slides'] ) ){
            echo '<section class="vs-features-wrapper vs-features-layout3">';
                echo '<div class="container">';
                    echo '<div '.$this->get_render_attribute_string( 'wrapper' ).'>';
                        foreach( $settings['slides'] as $singleslide ) {
                            echo '<div class="col-xl-4">';
                                echo '<div class="vs-feature bg-light-theme">';
                                    echo '<div class="feature-img">';
                                        if( ! empty( $singleslide['feature_image']['url'] ) ){
                                            echo wellnez_img_tag( array(
                                                'url'   => esc_url( $singleslide['feature_image']['url'] )
                                            ) );
                                        }
                                        if( ! empty( $singleslide['feature_icon'] ) ){
                                            echo '<i class="'.esc_attr( $singleslide['feature_icon'] ).'"></i>';
                                        }
                                    echo '</div>';
                                    echo '<div class="feature-content">';
                                        if( ! empty( $singleslide['feature_category'] ) ){
                                            echo '<strong>'.esc_html( $singleslide['feature_category'] ).'</strong>';
                                        }
                                        if( ! empty( $singleslide['feature_title'] ) ){
                                            echo '<h2 class="feature-title h3 mt-2 mb-2">'.esc_html( $singleslide['feature_title'] ).'</h2>';
                                        }
                                        if( ! empty( $singleslide['feature_description'] ) ){
                                            echo '<p class="feature-text mb-30">'.wp_kses_post( $singleslide['feature_description'] ).'</p>';
                                        }
                                        if( ! empty( $singleslide['button_text'] ) ){
                                            $target     = $singleslide['button_link']['is_external'] ? ' target="_blank"' : '';
                                            $nofollow   = $singleslide['button_link']['nofollow'] ? ' rel="nofollow"' : '';
                                            echo '<a '.wp_kses_post( $target.$nofollow ).' href="'.esc_url( $singleslide['button_link']['url'] ).'" class="vs-btn vs-style1 border-0"><i class="fal fa-calendar-alt"></i> '.esc_html( $singleslide['button_text'] ).'</a>';
                                        }
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }
	}

}