<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\HEADING;
use \Elementor\Repeater;
/**
 *
 * Image Widget .
 *
 */
class Wellnez_About extends Widget_Base {

	public function get_name() {
		return 'wellnezabout';
	}

	public function get_title() {
		return __( 'About', 'wellnez' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'wellnez' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'image_section',
			[
				'label' 	=> __( 'Images', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'about_image',
			[
				'label' 		=> __( 'About Man Image', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
			'sahpe_one',
			[
				'label' 		=> __( 'Shape 01', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'sahpe_two',
			[
				'label' 		=> __( 'Shape 02', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'sahpe_three',
			[
				'label' 		=> __( 'Shape 03', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
        
		
        $this->end_controls_section();

		//Top Content
		$this->start_controls_section(
			'about_section_title',
			[
				'label' 	=> __( 'Content', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		
		$this->add_control(
			'feature_title',
			[
				'label'     => __( 'Feature Title', 'wellnez' ),
                'type'      => Controls_Manager::TEXTAREA,
				'default'   => __('FEATURE'),
				'label_block' => true,
			]
        );

		$this->add_control(
			'title',
			[
				'label'     => __( 'Title', 'wellnez' ),
                'type'      => Controls_Manager::TEXTAREA,
				'default'   => __('DISCOVER A NEW YOU'),
				'label_block' => true,
			]
        );

		$this->add_control(
			'sub_title',
			[
				'label'     => __( 'Sub Title', 'wellnez' ),
                'type'      => Controls_Manager::TEXTAREA,
				'default'   => __('EXPERIENCE WELLNEZ 25 YEARS'),
				'label_block' => true,
			]
        );

		$this->add_control(
			'list_content',
			[
				'label'     => __( 'List Content', 'wellnez' ),
                'type'      => Controls_Manager::TEXTAREA,
				'default'   => __('We think your skin should look and refshed matter your lifestyle Wellnez.'),
				'label_block' => true,
			]
        );

		$this->add_control(
			'about_text',
			[
				'label'     => __( 'About Content', 'wellnez' ),
                'type'      => Controls_Manager::TEXTAREA,
				'default'   => __('There are many variations of passages gaks of Lofrem the Ipsum availaasble, busat the majority have suffered alteration in some form sages gaks injected.'),
				'label_block' => true,
			]
        );

		$this->add_control(
			'button_text',
			[
				'label'     => __( 'Button Text', 'wellnez' ),
                'type'      => Controls_Manager::TEXT,
				'default'   => __('how to make your makeup last all day'),
				'label_block' => true,
			]
        );
        $this->add_control(
			'link',
			[
				'label' 		=> __( 'Link', 'wellnez' ),
				'type' 			=> Controls_Manager::URL,
                'placeholder' 	=> __( '#', 'wellnez' ),
                'show_external' => true,
				'default' 		=> [
					'url' 			=> '',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
        );
        $this->end_controls_section();
		
		$this->start_controls_section(
			'about_section_list',
			[
				'label' 	=> __( 'Feature List', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$repeater = new Repeater();

        $repeater->add_control(
			'list_label',
			[
				'label' 	=> __( 'Label', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXT,
			]
        );
        $repeater->add_control(
			'list_info',
			[
				'label' 	=> __( 'Info', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXT,
			]
        );
		$this->add_control(
			'feature_lists',
			[
				'label' 		=> __( 'Feature List', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'list_label'    => __( 'YEAR OF EXPERIENCE :', 'wellnez' ),
						'list_info'      => __( '15 Years Service', 'wellnez' ),
					],
					[
						'list_label'    => __( 'WE ALWAYS :', 'wellnez' ),
						'list_info'      => __( 'We think your skin should', 'wellnez' ),
					],
				],
				'title_field' 	=> '{{{ list_label }}}',
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'about_style',
			[
				'label' 	=> __( 'Feature List', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		// Style
		$this->add_control(
			'fetaure_style',
			[
				'label' => esc_html__( 'Feature Text', 'wellnez' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'etaure_color',
			[
				'label' 	=> __( 'Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .img-box2 .img-text' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'etaure_typo',
				'label' 	=> __( 'Title', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .img-box2 .img-text',
			]
		);
		// Style
		$this->add_control(
			'title_style',
			[
				'label' => esc_html__( 'Title', 'wellnez' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' 	=> __( 'Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-box1 .sec-title2, {{WRAPPER}} .text-theme' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typo',
				'label' 	=> __( 'Title', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .about-box1 .sec-title2, {{WRAPPER}} .text-theme',
			]
		);

		// Sub Title
		$this->add_control(
			'sub_title_style',
			[
				'label' => esc_html__( 'Sub Title', 'wellnez' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'sub_title_color',
			[
				'label' 	=> __( 'Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sec-subtitle' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'sub_title_typo',
				'label' 	=> __( 'Sub Title ', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .sec-subtitle',
			]
		);
		$this->end_controls_section();

	
		//Button  Style
		$this->start_controls_section(
			'package_button',
			[
				'label' 	=> __( 'Button', 'wellnez' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'button_color',
			[
				'label' 	=> __( 'Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .circle-btn .btn-text' => 'color: {{VALUE}}',
                ],
			]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typo',
				'label' 	=> __( 'Button Typo', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .circle-btn .btn-text',
			]
		);
		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		// This Button Use Content Top
		if( !empty( $settings['link']['url'] ) ) {
            $this->add_render_attribute('link','href',esc_url( $settings['link']['url'] ));
        }
        if( !empty( $settings['link']['nofollow'] ) ) {
            $this->add_render_attribute('link','rel', 'nofollow' );
        }
        if( !empty( $settings['link']['is_external'] ) ) {
            $this->add_render_attribute('link','target','_blank');
        }
		$this->add_render_attribute('link','class', 'btn-icon' );
		
		?>

			<section class="space-extra-bottom">
				<div class="shape-mockup d-none d-xxxl-block" data-top="-26%" data-left="-10%">
					<div class="curb-shape1"></div>
				</div>
				<?php if( $settings['sahpe_one']['url'] ): ?>
					<div class="shape-mockup jump d-none d-xxxl-block" data-top="-50%" data-right="0">
						<?php echo wellnez_img_tag( array(
							'url'	=> esc_url( $settings['sahpe_one']['url'] ),
							'alt'   => 'shape',
						) );
						?>
					</div>
				<?php endif; ?>

				<?php if( $settings['sahpe_two']['url'] ): ?>
					<div class="shape-mockup jump-reverse d-none d-xxxl-block" data-top="6%" data-right="13%">
						<?php echo wellnez_img_tag( array(
							'url'	=> esc_url( $settings['sahpe_two']['url'] ),
							'alt'   => 'shape',
						) );
						?>
					</div>
				<?php endif; ?>

				<div class="container"> 
					<div class="row gx-80 align-items-center">
						<div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
							<div class="img-box2">

								<?php if( $settings['about_image']['url'] ): ?>
									<div class="img-1">
										<?php echo wellnez_img_tag( array(
											'url'	=> esc_url( $settings['about_image']['url'] ),
											'alt'   => 'about',
										) );
										?>
									</div>
								<?php endif; ?>

								<?php if( $settings['sahpe_three']['url'] ): ?>
									<div class="img-2 jump">
										<?php echo wellnez_img_tag( array(
											'url'	=> esc_url( $settings['sahpe_three']['url'] ),
											'alt'   => 'shape',
										) );
										?>
									</div>
								<?php endif; ?> 
								
								<?php if( !empty($settings['feature_title'] ) ): ?>
									<div class="img-shape">
										<span class="img-text jump-reverse">
											<?php echo esc_html( $settings['feature_title'] ); ?>
										</span>
									</div>
								<?php endif; ?>
							</div>
						</div>

						<div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
							<div class="about-box1">
								<?php if( !empty($settings['title'] ) ): ?>
									<span class="sec-subtitle">
										<?php echo wp_kses_post( $settings['title'] ); ?>
									</span>
								<?php endif; ?>

								<?php if( !empty($settings['sub_title'] ) ): ?>
									<h2 class="sec-title2">
										<?php echo wp_kses_post( $settings['sub_title'] ); ?>
									</h2>
								<?php endif; ?>

								<div class="media-style1">

									<?php if( !empty($settings['button_text'] ) ): ?>
										<div class="circle-btn style3">

											<svg viewBox="0 0 150 150" class="svg-hidden">
												<path id="about-tbn" d="M 0,75 a 75,75 0 1,1 0,1 z"></path>
											</svg>
											<a <?php echo $this->get_render_attribute_string('link'); ?>>
												<i class="far fa-arrow-right"></i>
											</a>
											<div class="btn-text">
												<svg viewBox="0 0 150 150">
													<text>
														<textPath href="#about-tbn">
															<?php echo esc_html( $settings['button_text'] ); ?>
														</textPath>
													</text>
												</svg>
											</div>
										</div>
									<?php endif; ?>

									<?php if( !empty( $settings['list_content'] ) ): ?>
										<div class="media-body">
											<p class="media-text">
												<?php echo esc_html( $settings['list_content'] ); ?>
											</p>
										</div>
									<?php endif; ?>
								</div>
								<?php if( !empty( $settings['about_text'] ) ): ?>
									<P class="about-text">
										<?php echo esc_html( $settings['about_text'] ); ?>
									</P>
								<?php endif; ?>

								<?php if( !empty( $settings['feature_lists'] ) ): ?>
									<div class="table-style1">
										<?php foreach( $settings['feature_lists'] as $feature_list ): ?>
											<div class="tr">
												<div class="th">
													<?php echo esc_html( $feature_list['list_label'] ); ?>
												</div>
												<div class="td">
													<?php echo esc_html( $feature_list['list_info'] ); ?>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php
        
	}

}