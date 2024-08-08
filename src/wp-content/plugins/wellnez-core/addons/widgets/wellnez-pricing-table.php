<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Repeater;
use \Elementor\Utils;
/**
 *
 * Pricing Table Widget .
 *
 */
class Wellnez_Pricing_Table extends Widget_Base {

	public function get_name() {
		return 'wellnezpricingtable';
	}

	public function get_title() {
		return __( 'Pricing Table', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'pricing_table_section',
			[
				'label' 	=> __( 'Pricing Table', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );


		

		$repeater = new Repeater();

		$repeater->add_control(
			'package_shape',
			[
				'label' 		=> __( 'Package Shape', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater->add_control(
			'package',
			[
				'label' 	=> __( 'Pricing Plan Name', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Basic', 'wellnez' )
			]
        );

        $repeater->add_control(
			'price',
			[
				'label' 	=> __( 'Item Price', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( '27.99', 'wellnez' ),
			]
        );
        $repeater->add_control(
			'currency',
			[
				'label' 	=> __( 'Currency', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( '$', 'wellnez' ),
			]
        );
        $repeater->add_control(
			'package_duration',
			[
				'label' 	=> __( 'Item Price Time', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( '/monthly', 'wellnez' ),
			]
        );

        $repeater->add_control(
			'package_list',
			[
				'label'         => __( 'Description', 'wellnez' ),
				'type'          => Controls_Manager::WYSIWYG,
				'default'       => __( 'Default description', 'wellnez' ),
				'placeholder'   => __( 'Type your description here', 'wellnez' ),
			]
		);

        $repeater->add_control(
			'package_btn',
			[
				'label' 	=> __( 'Button Text', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Get Started', 'wellnez' )
			]
        );
        $repeater->add_control(
			'link',
			[
				'label' 		=> __( 'Link', 'wellnez' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'wellnez' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Slides', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'price' 			=> __( '$27.99', 'wellnez' ),
						'package' 	=> __( 'Basic Plan', 'wellnez' ),
					],
					[
						'price' 			=> __( '$37.99', 'wellnez' ),
						'package' 	=> __( 'Silver Plan', 'wellnez' ),
					],
					[
						'price' 			=> __( '$47.99', 'wellnez' ),
						'package' 	=> __( 'Gold Plan', 'wellnez' ),
					],
					[
						'price' 			=> __( '$97.99', 'wellnez' ),
						'package' 	=> __( 'VIP Plan', 'wellnez' ),
					],
				],
				'title_field' 	=> '{{{ package }}}',
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'slider_control_section',
			[
				'label' 		=> __( 'Slider Control', 'wellnez' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'slide_to_show',
			[
				'label' 		=> __( 'Slide To Show', 'wellnez' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 			=> [
						'min' 			=> 0,
						'max' 			=> 10,
						'step'			=> 1,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 3,
				],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'pricing_table_style_section',
			[
				'label' 	=> __( 'Pricing Table Style', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'project_bg_image',
			[
				'label' 	=> esc_html__( 'Project Bg Image', 'wellnez' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
			'pricing_table_color',
			[
				'label' 		=> __( 'Pricing Title Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .price-style1 .price-package' => 'color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'pricing_table_typography',
				'label' 	=> __( 'Pricing Title Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .price-style1 .price-package',
			]
        );

        $this->add_responsive_control(
			'pricing_table_margin',
			[
				'label' 		=> __( 'Pricing Title Margin', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .price-style1 .price-package' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'pricing_table_padding',
			[
				'label' 		=> __( 'Pricing Title Padding', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .price-style1 .price-package' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
				'separator'		=> 'after',
			]
		);

		$this->add_control(
			'plan_price_color',
			[
				'label' 		=> __( 'Plan Price Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .price-style1 .price-amount' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'plan_price_typography',
				'label' 	=> __( 'Plan Price Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .price-style1 .price-amount',
			]
        );

		$this->add_control(
			'plan_list_color',
			[
				'label' 		=> __( 'Plan List Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .price-style1 .price-features ul' => 'color: {{VALUE}}',
                ],
				'separator'		=> 'before',
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'plan_list_typography',
				'label' 	=> __( 'Plan List Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .price-style1 .price-features ul',
			]
        );

		$this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Button Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn' => 'color: {{VALUE}}',
                ],
				'separator'		=> 'before',
			]
        );

        $this->add_control(
			'button_color_hover',
			[
				'label' 		=> __( 'Button Color Hover', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn:hover' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_color',
			[
				'label' 		=> __( 'Button Background Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn' => 'background-color: {{VALUE}}',
                ],
			]
        );
        $this->add_control(
			'button_bg_color_hover',
			[
				'label' 		=> __( 'Button Background Hover Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn::before,{{WRAPPER}} .vs-btn::after' => 'background-color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border',
				'label' 	=> __( 'Border', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .vs-btn',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography',
				'label' 	=> __( 'Button Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .vs-btn',
			]
        );

        $this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Button Margin', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'button_padding',
			[
				'label' 		=> __( 'Button Padding', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->add_responsive_control(
			'button_border_radius',
			[
				'label' 		=> __( 'Button Border Radius', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'box_shadow',
				'label' 	=> __( 'Box Shadow', 'wellnez' ),
				'selector' 	=> '{{WRAPPER}} .vs-btn',
			]
		);

        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'wrapper', 'class', 'row pricing-carousel' );
		$this->add_render_attribute( 'wrapper', 'data-slick-arrows', 'false' );
		$this->add_render_attribute( 'wrapper', 'data-slick-autoplay', 'false' );
		$this->add_render_attribute( 'wrapper', 'data-slide-to-show', $settings['slide_to_show']['size'] );

		?>	
		<?php if( !empty( $settings[ 'slides' ] ) ): ?>
			<div <?php echo $this->get_render_attribute_string('wrapper') ; ?>>
				<?php foreach( $settings[ 'slides' ] as $slide): ?>
					<div class="col-lg-4">
						<div class="package-style1">
							<div class="package-top">
								<div class="package-left">
									<?php if(!empty($slide['price'])): ?>
										<p class="package-price">
											<?php echo esc_html($slide['price']); ?><span class="currency"><?php echo esc_html($slide['currency']); ?>
											</span>
										</p>
									<?php endif; ?>
									<?php if($slide['package_duration']): ?>
										<p class="package-duration">
											<?php echo esc_html( $slide['package_duration'] ); ?>
										</p>
									<?php ?>
								</div>
								<?php if(!empty($slide['package'])): ?>
									<h3 class="package-name">
										<?php echo esc_html($slide['package']); ?>
									</h3>
								<?php endif; ?>
							</div>

							<?php if($slide['package_shape']['url']): ?>
								<div class="package-shape">
									<?php echo wellnez_img_tag( array(
										'url'	=> esc_url( $slide['package_shape']['url'] ),
										'alt'   => 'shape',
									) );
									?>
								</div>
							<?php endif; ?>

							<div class="package-list">
								<ul class="list-unstyled">
									<?php  echo wp_kses_post( $slide['package_list'] ); ?>
								</ul>
							</div>

							<?php if(!empty($slide['package_btn'])); ?>
								<div class="package-btn">
									<a class="vs-btn style3" href="<?php echo esc_url( $slide[ 'link' ][ 'url' ] ); ?>">
										<?php echo esc_html($slide['package_btn']); ?>
									</a>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		<?php 

	}
}