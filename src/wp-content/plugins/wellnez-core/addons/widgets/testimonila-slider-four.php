<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Testimonial Slider Widget .
 *
 */
class Wellnez_Testimonial_Slider_Four extends Widget_Base{

	public function get_name() {
		return 'testifour';
	}

	public function get_title() {
		return __( 'Testimonial Slider Four', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'testimonial_slider_section',
			[
				'label' 	=> __( 'Testimonial Slider', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'shape_left',
			[
				'label' 		=> __( 'Shape Left', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'shape_right',
			[
				'label' 		=> __( 'Shape Right', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'testi_title', [
				'label' 		=> __( 'Title', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Story' , 'wellnez' ),
				'label_block' 	=> true,
			]
        );

		$this->add_control(
			'testi_sub_title', [
				'label' 		=> __( 'Sub Title', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Story' , 'wellnez' ),
				'label_block' 	=> true,
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
				'default' 		=> __( 'Marry Jain & Loma Deniel' , 'wellnez' ),
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'testi_degi', [
				'label' 		=> __( 'Degination', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Marry Jain & Loma Deniel' , 'wellnez' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'client_feedback', [
				'label' 		=> __( 'Client Feedback', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ' , 'wellnez' ),
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
						'client_name' 		=> __( 'Marry Jain & Loma Deniel', 'wellnez' ),
						'client_feedback' 	=> __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.', 'wellnez' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'client_name' 		=> __( 'Rose Marious & Jezzy Lamot', 'wellnez' ),
						'client_feedback' 	=> __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.', 'wellnez' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'client_name' 		=> __( 'Vivi Marian & Peter Parker', 'wellnez' ),
						'client_feedback' 	=> __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.', 'wellnez' ),
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
					'size' 		=> 3,
				],
			]
		);
        $this->end_controls_section();

		$this->start_controls_section(
			'testimonial_section_title',
			[
				'label' 	=> __( 'Title / Sub Title', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .sec-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Typography', 'wellnez' ),
				'selector' 	=> '{{WRAPPER}} .sec-title',
			]
        );

        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Margin', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .sec-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->add_control(
			'title_subtitle_section',
			[
				'label' => esc_html__( 'Sub Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'title_sub_color',
			[
				'label' 		=> __( 'Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .sec-subtitle' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_sub_typography',
				'label' 	=> __( 'Typography', 'wellnez' ),
				'selector' 	=> '{{WRAPPER}} .sec-subtitle',
			]
        );

        $this->add_responsive_control(
			'title_sub_margin',
			[
				'label' 		=> __( 'Margin', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .sec-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
			'testimonial_box_bg_color',
			[
				'label' 		=> __( 'Box Background Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style4:before' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'box_shadow',
				'label' 	=> __( 'Box Shadow', 'wellnez' ),
				'selector' 	=> '{{WRAPPER}} .testi-style4:before',
			]
		);

		$this->add_control(
			'testimonial_rating_color',
			[
				'label' 		=> __( 'Rating Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testi-rating' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'testimonial_arrow_bg',
			[
				'label' 		=> __( 'Dots Background Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style4 .slick-dots button' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'testimonial_arrow_hover_bg',
			[
				'label' 		=> __( 'Dots Hover Background Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style4 .slick-dots button:hover, {{WRAPPER}} .testi-style4 .slick-dots .slick-active button' => 'background-color: {{VALUE}}!important',
				],
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
					'{{WRAPPER}} .testi-name' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'testimonial_slider_client_name_typography',
				'label' 	=> __( 'Client Name Typography', 'wellnez' ),
				'selector' 	=> '{{WRAPPER}} .testi-name',
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_name_margin',
			[
				'label' 		=> __( 'Client Name Margin', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .testi-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

		// digination
		$this->start_controls_section(
			'testimonial_slider_digi_style_section',
			[
				'label' 	=> __( 'Degination', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'testimonial_slider_digi_color',
			[
				'label' 	=> __( 'Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testi-degi' => 'color: {{VALUE}} !important',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'testimonial_slider_digi_typography',
				'label' 	=> __( 'Typography', 'wellnez' ),
				'selector' 	=> '{{WRAPPER}} .testi-degi',
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_digi_margin',
			[
				'label' 		=> __( 'Margin', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-degi' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
				'label' 	=> __( 'Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testi-text' => 'color: {{VALUE}} !important',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'testimonial_slider_client_feedback_typography',
				'label' 	=> __( 'Typography', 'wellnez' ),
				'selector' 	=> '{{WRAPPER}} .testi-text',
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_feedback_margin',
			[
				'label' 		=> __( 'Margin', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();
	}
	
	protected function render() {

	$settings = $this->get_settings_for_display();


	$this->add_render_attribute( 'wrapper', 'data-slide-to-show', $settings['slide_to_show']['size'] );
	?>
		<?php if( ! empty( $settings['slides'] ) ): ?>
			
			<div class="container">
				<div class="row justify-content-between align-items-end">
					<div class="col-md-auto text-center text-md-start">
						<div class="title-area">
							<span class="sec-subtitle"><?php echo esc_html( $settings['testi_sub_title']  ); ?></span>
							<h2 class="sec-title"><?php echo esc_html( $settings['testi_title'] ); ?></h2>
						</div>
					</div>
					<div class="col-auto d-none d-md-block">
						<div class="sec-btns">
							<button data-slick-prev=".test-slide007" class="icon-btn style3"><i class="fal fa-long-arrow-left"></i></button>
							<button data-slick-next=".test-slide007" class="icon-btn style3"><i class="fal fa-long-arrow-right"></i></button>
						</div>
					</div>
				</div>
			</div>
			<!-- data-slide-show="2" data-md-slide-show="2" data-center-mode="true" data-center-padding="300px" -->
				
			<div class="container-fluid">
				<div class="row test-slide007">
					<?php foreach( $settings['slides'] as $slides ): ?>
						<div class="col-lg-4">
							<div class="testi-style5">
								<div class="testi-content">
									<?php if( 'yes' == $slides[ 'rating' ] ):  ?>
										<div class="testi-rating">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
										</div>
									<?php endif; ?>

									<?php if( !empty( $slides[ 'client_feedback' ] ) ): ?>
										<p class="testi-text">
											<?php echo esc_html($slides[ 'client_feedback' ] ); ?>
										</p>
									<?php endif; ?>

									<div class="testi-author">
										<?php if( !empty( $slides[ 'client_image' ][ 'url' ] ) ): ?>
											<div class="testi-avater">
												<?php echo wellnez_img_tag( array(
													'url'	=> esc_url( $slides[ 'client_image' ][ 'url' ] ),
													'alt'   => 'Testimonial Author',
												) );?>
											</div>
										<?php endif; ?>
										<div class="media-body">
											<?php if( !empty( $slides[ 'client_name' ] ) ): ?>
												<h3 class="testi-name"><?php echo esc_html($slides[ 'client_name' ] ); ?></h3>
											<?php endif; ?>

											<?php if( !empty( $slides[ 'testi_degi' ] ) ): ?>
												<span class="testi-degi"><?php echo esc_html($slides[ 'testi_degi' ] ); ?></span>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
        	</div>
		<?php endif; ?>
	<?php
	}
}
?>