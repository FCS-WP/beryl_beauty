<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Background;
/**
 *
 * Testimonial Slider Widget .
 *
 */
class Wellnez_Testimonial_Slider extends Widget_Base{

	public function get_name() {
		return 'wellneztestimonialslider';
	}

	public function get_title() {
		return __( 'Testimonial Slider', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'testimonial_slider_section',
			[
				'label' 	=> __( 'Testimonial Slider', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'testimonial_style',
			[
				'label' 		=> __( 'Testimonial Style', 'wellnez' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  			=> __( 'Style One', 'wellnez' ),
					'2' 			=> __( 'Style Two', 'wellnez' ),
				],
			]
		);

		$this->add_control(
			'quate_icon',
			[
				'label' 		=> __( 'Quate Icon', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'testimonial_style' => '2',
				]
			]
		);

		$this->add_control(
			'bg_image',
			[
				'label' 		=> __( 'Background', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'testimonial_style' => '1',
				]
			]
		);

		$this->add_control(
			'subtitle', [
				'label' 		=> __( 'Section Subtitle', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Happy Customer Quotes' , 'wellnez' ),
				'label_block' 	=> true,
				'condition' => [
					'testimonial_style' => '1',
				]
			]
        );
		$this->add_control(
			'title', [
				'label' 		=> __( 'Section Title', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Our Top Reviews' , 'wellnez' ),
				'label_block' 	=> true,
				'condition' => [
					'testimonial_style' => '1',
				]
			]
        );

		$repeater = new Repeater();

		$repeater->add_control(
			'rating',
			[
				'label' 		=> __( 'Rating', 'wellnez' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'wellnez' ),
				'label_off' 	=> __( 'No', 'wellnez' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

        $repeater->add_control(
			'client_feedback', [
				'label' 		=> __( 'Client Feedback', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Contrary to popular belief, Lorem Ipsum is not simply random text over 2000 years old. Richard McClintock' , 'wellnez' ),
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'client_image',
			[
				'label' 		=> __( 'Client Image', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'client_name', [
				'label' 		=> __( 'Client Name', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Alax Markun' , 'wellnez' ),
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'client_designation', [
				'label' 		=> __( 'Client Designation', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'CEO Google' , 'wellnez' ),
				'label_block' 	=> true,
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
						'client_name' 		=> __( 'Alax Markun', 'wellnez' ),
						'client_feedback' 	=> __( 'Contrary to popular belief, Lorem Ipsum is not simply random text over 2000 years old. Richard McClintock', 'wellnez' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'client_name' 		=> __( 'Vivi Marian', 'wellnez' ),
						'client_feedback' 	=> __( 'Contrary to popular belief, Lorem Ipsum is not simply random text over 2000 years old. Richard McClintock', 'wellnez' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{{ client_name }}}',
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
					'size' 		=> 1,
				],
			]
		);
		$this->add_control(
			'slider_arrows',
			[
				'label' 		=> __( 'Arrows', 'wellnez' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'wellnez' ),
				'label_off' 	=> __( 'No', 'wellnez' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'testimonial_general',
			[
				'label' 	=> __( 'General', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		
		$this->add_control(
			'testimonial_rating_color',
			[
				'label' 		=> __( ' Star Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style1 .testi-rating, {{WRAPPER}} .testi-style2 .arrow-shape' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'bg_color',
			[
				'label' 		=> __( ' Box Background', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style1, {{WRAPPER}} .testi-style2' => 'background-color: {{VALUE}}',
				],
			]
		);


		$this->add_responsive_control(
			'box_margin',
			[
				'label' 		=> __( 'Margin', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style1, {{WRAPPER}} .testi-style2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		
		$this->add_responsive_control(
			'box_padding',
			[
				'label' 		=> __( 'Padding', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style1, {{WRAPPER}} .testi-style2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();

        $this->start_controls_section(
			'testimonial_slider_client_name_style_section',
			[
				'label' 	=> __( 'Client Name', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'testimonial_slider_client_name_color',
			[
				'label' 		=> __( 'Client Name Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style1 .testi-name' => 'color: {{VALUE}}!important',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'testimonial_slider_client_name_typography',
				'label' 	=> __( 'Client Name Typography', 'wellnez' ),
				'selector' 	=> '{{WRAPPER}} .testi-style1 .testi-name',
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_name_margin',
			[
				'label' 		=> __( 'Client Name Margin', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style1 .testi-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_name_padding',
			[
				'label' 		=> __( 'Client Name Padding', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style1 .testi-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'testimonial_slider_client_feedback_style_section',
			[
				'label' 	=> __( 'Client Feedback', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'testimonial_slider_client_feedback_color',
			[
				'label' 	=> __( 'Client Feedback Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testi-style1 .testi-text' => 'color: {{VALUE}} !important',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'testimonial_slider_client_feedback_typography',
				'label' 	=> __( 'Feedback Typography', 'wellnez' ),
				'selector' 	=> '{{WRAPPER}} .testi-style1 .testi-text',
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_feedback_margin',
			[
				'label' 		=> __( 'Feedback Margin', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style1 .testi-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_feedback_padding',
			[
				'label' 		=> __( 'Feedback Padding', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style1 .testi-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'testimonial_slider_designation_style_section',
			[
				'label' 	=> __( 'Designation', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'testimonial_slider_designation_color',
			[
				'label' 	=> __( 'Client Designation Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testi-style1 .testi-degi' => 'color: {{VALUE}}!important',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'testimonial_slider_designation_typography',
				'label' 	=> __( 'Client Designation Typography', 'wellnez' ),
				'selector' 	=> '{{WRAPPER}} .testi-style1 .testi-degi',
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_designation_margin',
			[
				'label' 		=> __( 'Client Designation Margin', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style1 .testi-degi' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_designation_padding',
			[
				'label' 		=> __( 'Client Designation Padding', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style1 .testi-degi' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();


	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		if('1' == $settings[ 'testimonial_style' ] ){
			$this->add_render_attribute( 'wrapper', 'id', 'testislide1' );
			$this->add_render_attribute( 'wrapper', 'class', 'testimonial-carousel' );
		}else{
			$this->add_render_attribute( 'wrapper', 'class', 'testimonial-carousel2' );
		}
	
		$this->add_render_attribute( 'wrapper', 'data-slide-to-show', $settings['slide_to_show']['size'] );

		?>
		<?php if( '1' == $settings[ 'testimonial_style' ] ): ?>
			<div class="testi-style1" data-bg-src="<?php echo esc_url($settings[ 'bg_image' ][ 'url' ] ); ?>">
				<?php if ( !empty( $settings[ 'subtitle' ] ) ): ?>
					<h2 class="inner-title">
						<?php echo esc_html( $settings[ 'subtitle' ]  ); ?>
					</h2>
				<?php endif; ?>

				<?php if( !empty( $settings[ 'title' ] ) ): ?>
					<p class="inner-subtitle">
						<?php echo esc_html($settings[ 'title' ]) ?>
					</p>
				<?php endif; ?>

				<div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
					<?php foreach( $settings[ 'slides' ] as $slide ): ?>
						<div>
							<div class="testi-body">
								<?php if( 'yes' == $slide[ 'rating' ] ):  ?>
									<div class="testi-rating">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
									</div>
								<?php endif; ?>
								<?php if( !empty( $slide[ 'client_feedback' ] ) ): ?>
									<p class="testi-text">
										<?php echo esc_html($slide[ 'client_feedback' ]) ?>
									</p>
								<?php endif; ?>

								<div class="testi-author">

									<?php if( !empty( $slide['client_image']['url'] ) ): ?>
										<div class="testi-avater">
											<?php echo wellnez_img_tag( array(
												'url'	=> esc_url( $slide[ 'client_image' ][ 'url' ] ),
												'alt'   => 'avater',
											) );
											?>
										</div>
									<?php endif; ?>
									<div class="media-body">
										<?php if( !empty( $slide[ 'client_name' ] ) ): ?>
											<h4 class="testi-name"><?php echo esc_html($slide[ 'client_name' ]) ?></h4>
										<?php endif; ?>
										<?php if( !empty( $slide[ 'client_designation' ] ) ): ?>
											<p class="testi-degi"><?php echo esc_html($slide[ 'client_designation' ]) ?></p>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="slide-btns">
					<button data-slick-prev="#testislide1"><i class="far fa-angle-left"></i></button>
					<button data-slick-prev="#testislide1"><i class="far fa-angle-right"></i></button>
				</div>
			</div>

			<?php elseif( '2' == $settings[ 'testimonial_style' ] ):  ?>
				<div class="testi-style2">
					<?php if( !empty( $settings[ 'quate_icon' ][ 'url' ] ) ): ?>
						<span class="vs-icon">
							<?php echo wellnez_img_tag( array(
								'url'	=> esc_url( $settings[ 'quate_icon' ][ 'url' ] ),
								'alt'   => 'icon',
							) );
							?>
						</span>
					<?php endif; ?>
					<div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
						<?php foreach( $settings[ 'slides' ] as $slide ): ?>
							<div>
								<?php if( !empty( $slide[ 'client_feedback' ] ) ): ?>
									<p class="testi-text">
										<?php echo esc_html($slide[ 'client_feedback' ]) ?>
									</p>
								<?php endif; ?>
								<?php if( 'yes' == $slide[ 'rating' ] ):  ?>
									<div class="arrow-shape">
										<i class="arrow"></i>
										<i class="arrow"></i>
										<i class="arrow"></i>
										<i class="arrow"></i>
									</div>
								<?php endif; ?>
								<?php if( !empty( $slide[ 'client_name' ] ) ): ?>
									<h3 class="testi-name h5"><?php echo esc_html($slide[ 'client_name' ]) ?></h3>
								<?php endif; ?>
								<?php if( !empty( $slide[ 'client_designation' ] ) ): ?>
									<span class="testi-degi"><?php echo esc_html($slide[ 'client_designation' ]) ?></span>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php  endif ?>
		<?php 
	}
}


