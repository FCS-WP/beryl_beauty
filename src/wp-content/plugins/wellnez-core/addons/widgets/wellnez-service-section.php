<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Background;
use \Elementor\repeater;
/**
 *
 * Service Section Widget .
 *
 */
class Wellnez_Service_Section extends Widget_Base {

	public function get_name() {
		return 'wellnezservicesection';
	}

	public function get_title() {
		return __( 'Service Section', 'wellnez' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'wellnez' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'counter_section',
			[
				'label' 	=> __( 'Service Section', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'service_middle_image',
			[
				'label' 	=> esc_html__( 'Middle Image', 'wellnez' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'service_sahpe',
			[
				'label' 	=> esc_html__( 'Shape Image', 'wellnez' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'left_section',
			[
				'label' 	=> __( 'Service Section Left', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		$repeater = new Repeater();

		$repeater->add_control(
			'icon',
			[
				'label' 	=> esc_html__( 'Service Image', 'wellnez' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'title',
			[
				'label' 	=> __( 'Service Title', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'   => __( 'Development Services', 'wellnez' ),
			]
		);

		$repeater->add_control(
			'description',
			[
				'label' 	=> __( 'Service Description', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default'   => __( 'Completely implement via highly efficient process improvements. engage high value before progressive data.', 'wellnez' ),
			]
		);
		$repeater->add_control(
			'url',
			[
				'label' 	=> __( 'Service Url', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'   => __( '#', 'wellnez' ),
			]
		);

		$this->add_control(
			'service_repeater',
			[
				'label' 		=> __( 'Service List', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'icon'        => Utils::get_placeholder_image_src(),
						'title'  => __( 'Discover New', 'wellnez' ),
						'description'  => __( 'There are many variations of passages gaks the majority.', 'wellnez' ),
						'url'  => __( '#', 'wellnez' ),
					],
					[
						'icon'        => Utils::get_placeholder_image_src(),
						'title'  => __( 'Eye & Shadow', 'wellnez' ),
						'description'  => __( 'There are many variations of passages gaks the majority.', 'wellnez' ),
						'url'  => __( '#', 'wellnez' ),
					],
					[
						'icon'        => Utils::get_placeholder_image_src(),
						'title'  => __( 'Relaxation Room', 'wellnez' ),
						'description'  => __( 'There are many variations of passages gaks the majority.', 'wellnez' ),
						'url'  => __( '#', 'wellnez' ),
					],
				],
			]
		);
        $this->end_controls_section();

		// Service two
		$this->start_controls_section(
			'right_section',
			[
				'label' 	=> __( 'Service Section Right', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		$repeater = new Repeater();

		$repeater->add_control(
			'icon_two',
			[
				'label' 	=> esc_html__( 'Service Image', 'wellnez' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'title_two',
			[
				'label' 	=> __( 'Service Title', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'   => __( 'Development Services', 'wellnez' ),
			]
		);

		$repeater->add_control(
			'description_two',
			[
				'label' 	=> __( 'Service Description', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default'   => __( 'Completely implement via highly efficient process improvements. engage high value before progressive data.', 'wellnez' ),
			]
		);
		$repeater->add_control(
			'url_two',
			[
				'label' 	=> __( 'Service Url', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'   => __( '#', 'wellnez' ),
			]
		);

		$this->add_control(
			'service_repeater_two',
			[
				'label' 		=> __( 'Service List', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'icon_two'        => Utils::get_placeholder_image_src(),
						'title_two'  => __( 'Thermal Bath', 'wellnez' ),
						'description'  => __( 'There are many variations of passages gaks the majority.', 'wellnez' ),
						'url_two'  => __( '#', 'wellnez' ),
					],
					[
						'icon_two'        => Utils::get_placeholder_image_src(),
						'title_two'  => __( 'Stone Massage', 'wellnez' ),
						'description'  => __( 'There are many variations of passages gaks the majority.', 'wellnez' ),
						'url_two'  => __( '#', 'wellnez' ),
					],
					[
						'icon_two'        => Utils::get_placeholder_image_src(),
						'title_two'  => __( 'Parlar & Beauty', 'wellnez' ),
						'description'  => __( 'There are many variations of passages gaks the majority.', 'wellnez' ),
						'url_two'  => __( '#', 'wellnez' ),
					],
				],
			]
		);
        $this->end_controls_section();



        $this->start_controls_section(
			'service_style_section',
			[
				'label' => __( 'Style', 'wellnez' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'service_title_color',
			[
				'label' 	=> __( 'Service Title Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-style1 .service-title' => 'color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'service_title_typography',
				'label' 	=> __( 'Service Title Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .service-style1 .service-title',
			]
		);

        $this->add_control(
			'service_desc_color',
			[
				'label' 	=> __( 'Service Desc Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-style1 .service-text' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'service_text_typography',
				'label' 	=> __( 'Service Section Text Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .service-style1 .service-text',
			]
		);


		$this->add_responsive_control(
			'service_section_box',
			[
				'label' 		=> __( 'Box Padding', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-style1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		?>
		<div class="service-inner1">
			<?php if( !empty( $settings['service_sahpe']['url'] ) ): ?>
				<div class="shape-mockup jump d-none d-xxl-block" data-top="-25%" data-right="-8%">
					<?php echo wellnez_img_tag( array(
						'url'	=> esc_url( $settings[ 'service_sahpe' ][ 'url' ] ),
						'alt'   => 'shape',
					) );
					?>
				</div>
			<?php endif; ?>
			<div class="container-xl">
				<div class="row justify-content-between align-items-center">
					<?php if( !empty( $settings['service_repeater'] ) ): ?>
						<div class="col-md-6 col-lg-5 col-xxl-auto">
							<?php foreach( $settings['service_repeater'] as $service ):  ?>
								<div class="service-style1 reverse">
									<?php if( !empty( $service['icon']['url'] ) ): ?>
										<div class="vs-icon">
											<?php echo wellnez_img_tag( array(
												'url'	=> esc_url( $service[ 'icon' ][ 'url' ] ),
												'alt'   => 'icon',
											) );
											?>
										</div>
									<?php endif; ?>

									<div class="service-content">
										<?php if( !empty( $service[ 'title' ] ) ): ?>
											<h3 class="service-title">
												<a href="<?php echo esc_url($service['url'] ) ?>" class="text-inherit">
													<?php echo esc_html($service[ 'title' ] ); ?>
												</a>
											</h3>
										<?php endif; ?>
										<?php if( !empty( $service[ 'description' ] ) ): ?>
											<p class="service-text">
												<?php echo esc_html( $service['description'] ); ?>
											</p>
										<?php endif; ?>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
					<?php if( !empty( $settings['service_middle_image']['url'] ) ): ?>
						<div class="col col-xxl-auto text-center d-none d-lg-block">
							<?php echo wellnez_img_tag( array(
								'url'	=> esc_url( $settings[ 'service_middle_image' ][ 'url' ] ),
								'alt'   => 'shape',
								'class' => 'mt-n4',
							) );
							?>
						</div>
					<?php endif; ?>
					<?php if( !empty( $settings['service_repeater_two'] ) ): ?>
						<div class="col-md-6 col-lg-5 col-xxl-auto">
							<?php foreach( $settings['service_repeater_two'] as $servicetwo ):  ?>
								<div class="service-style1">
									<?php if( !empty( $servicetwo['icon_two']['url'] ) ): ?>
										<div class="vs-icon">
											<?php echo wellnez_img_tag( array(
												'url'	=> esc_url( $servicetwo[ 'icon_two' ][ 'url' ] ),
												'alt'   => 'icon',
											) );
											?>
										</div>
									<?php endif; ?>
									<div class="service-content">
										<?php if( !empty( $servicetwo[ 'title_two' ] ) ): ?>
											<h3 class="service-title">
												<a href="<?php echo esc_url($servicetwo['url_two'] ) ?>" class="text-inherit">
													<?php echo esc_html($servicetwo[ 'title_two' ] ); ?>
												</a>
											</h3>
										<?php endif; ?>
										<?php if( !empty( $servicetwo[ 'description_two' ] ) ): ?>
											<p class="service-text">
												<?php echo esc_html( $servicetwo['description_two'] ); ?>
											</p>
										<?php endif; ?>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php 


		
	}
}