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
class Wellnez_Hero_Two extends Widget_Base {

	public function get_name() {
		return 'wellnezherotwo';
	}

	public function get_title() {
		return __( 'Hero Home Two', 'wellnez' );
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
			'hero_background',
			[
				'label' 		=> __( 'Background Shape', 'wellnez' ),
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
			'slider_content',
			[
				'label' 	=> __( 'Slider Content', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$repeater = new Repeater();

        $repeater->add_control(
			'man_iamge',
			[
				'label'     => __( 'Man Image', 'wellnez' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater->add_control(
			'hero_shape',
			[
				'label'     => __( 'Shape', 'wellnez' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater->add_control(
			'sub_title',
            [
				'label'         => __( 'Sub Title', 'wellnez' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'skincare inspires' , 'wellnez' ),
				'label_block'   => true,
			]
		);

        $repeater->add_control(
			'title',
            [
				'label'         => __( 'Title', 'wellnez' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Skin Refresh' , 'wellnez' ),
				'label_block'   => true,
			]
		);
        $repeater->add_control(
			'button_text',
            [
				'label'         => __( 'Button Text', 'wellnez' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Appointment' , 'wellnez' ),
				'label_block'   => true,
			]
		);
		$repeater->add_control(
			'link',
			[
				'label' 		=> __( 'Button Url', 'wellnez' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'wellnez' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);
		$this->add_control(
			'herotwo_slides',
			[
				'label' 		=> __( 'Sliders', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'image' 	  => Utils::get_placeholder_image_src(),
						'hero_shape' 	  => Utils::get_placeholder_image_src(),
						'sub_title'   => __( 'skincare inspires', 'wellnez' ),
						'title'       => __( 'Skin Refresh', 'wellnez' ),
						'button_text' => __( 'Appointment', 'wellnez' ),
						'link'        => __('#', 'wellnez')
					],
					[
						'image' 	  => Utils::get_placeholder_image_src(),
						'hero_shape' 	  => Utils::get_placeholder_image_src(),
						'sub_title'   => __( 'skincare inspires', 'wellnez' ),
						'title'       => __( 'Skin Refresh', 'wellnez' ),
						'button_text' => __( 'Appointment', 'wellnez' ),
						'link'        => __('#', 'wellnez')
					],
					[
						'image' 	  => Utils::get_placeholder_image_src(),
						'hero_shape' 	  => Utils::get_placeholder_image_src(),
						'sub_title'   => __( 'skincare inspires', 'wellnez' ),
						'title'       => __( 'Skin Refresh', 'wellnez' ),
						'button_text' => __( 'Appointment', 'wellnez' ),
						'link'        => __('#', 'wellnez')
					],
				],
				'title_field' 	=> '{{title}}',
			]
		);

        $this->end_controls_section();


		//Button  Style
		$this->start_controls_section(
			'slider_settings',
			[
				'label' 	=> __( 'Slider Settings', 'wellnez' ),
                'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'slider_autoplay',
			[
				'label' 		=> __( 'Autoplay', 'wellnez' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'wellnez' ),
				'label_off' 	=> __( 'No', 'wellnez' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'title_style',
			[
				'label' 	=> __( 'Title', 'wellnez' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'title_color',
			[
				'label' 	=> __( 'Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-layout1 .hero-title' => 'color: {{VALUE}}',
                ],
			]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typo',
				'label' 	=> __( 'Title Typo', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .hero-layout1 .hero-title',
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'subtitle_style',
			[
				'label' 	=> __( 'Title', 'wellnez' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'subtitle_color',
			[
				'label' 	=> __( 'Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-layout1 .hero-subtitle' => 'color: {{VALUE}}',
                ],
			]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'sub_typo',
				'label' 	=> __( 'Button Typo', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .hero-layout1 .hero-subtitle',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'button_style',
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
					'{{WRAPPER}} .vs-btn.style3' => 'color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'button_bg_color',
			[
				'label' 	=> __( 'Background Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-btn.style3:after' => 'background-color: {{VALUE}}',
                ],
			]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typo',
				'label' 	=> __( 'Button Typo', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .vs-btn.style3',
			]
		);

		$this->add_control(
			'button_hover',
			[
				'label' => esc_html__( 'Button Hover', 'wellnez' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'button_color_active',
			[
				'label' 	=> __( 'Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-btn.style3:hover' => 'color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'button_bg_color_active',
			[
				'label' 	=> __( 'Background Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-btn.style3:hover' => 'background-color: {{VALUE}}',
                ],
			]
        );
		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'wrapper', 'class', 'herotwo-carousel' );

		if( $settings['slider_autoplay'] == 'yes' ) {
			$this->add_render_attribute( 'wrapper', 'data-slick-autoplay', 'true' );
		} else {
			$this->add_render_attribute( 'wrapper', 'data-slick-autoplay', 'false' );
		}

		?>

			<section class="hero-layout1">

				<?php if( !empty( $settings[ 'sahpe_one' ] [ 'url' ] ) ): ?>
					<div class="hero-shape-1 jump-reverse" data-top="14%" data-right="42%">
						<?php echo wellnez_img_tag( array(
								'url'	=> esc_url( $settings['sahpe_one']['url'] ),
								'alt'   => 'hero',
							) );
						?>
					</div>
				<?php endif; ?>

				<?php if( !empty( $settings[ 'sahpe_two' ] [ 'url' ] ) ): ?>
					<div class="hero-shape-2 rotate-img" data-top="13%" data-right="10%">
						<?php echo wellnez_img_tag( array(
								'url'	=> esc_url( $settings['sahpe_two']['url'] ),
								'alt'   => 'hero',
							) );
						?>
					</div>
				<?php endif; ?>

				<?php if( !empty( $settings[ 'sahpe_three' ] [ 'url' ] )  ): ?>
					<div class="hero-shape-3 jump-img" data-bottom="29%" data-right="0%">
						<?php echo wellnez_img_tag( array(
								'url'	=> esc_url( $settings['sahpe_three']['url'] ),
								'alt'   => 'hero',
							) );
						?>
					</div>
				<?php endif; ?>
				
				<?php if( !empty( $settings[ 'herotwo_slides' ] ) ): ?>
					<div class="hero-mask" data-mask-src="<?php echo esc_url( $settings['hero_background']['url'] ); ?>">
						<div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
							<?php foreach( $settings[ 'herotwo_slides' ] as $slides):  ?>
								<div>
									<div class="hero-inner">
										<?php if( !empty( $slides[ 'man_iamge' ][ 'url' ] ) ): ?>
											<div class="hero-img">
												<?php echo wellnez_img_tag( array(
														'url'	=> esc_url( $slides['man_iamge']['url'] ),
														'alt'   => 'hero',
													) );
												?>
												<div class="hero-ripple"><i class="ripple"></i><i class="ripple"></i></div>
											</div>
										<?php endif; ?>

										<div class="hero-content">
											<?php if( !empty( $slides[ 'hero_shape' ][ 'url' ] ) ): ?>
												<div class="hero-flower">
													<?php echo wellnez_img_tag( array(
															'url'	=> esc_url( $slides['hero_shape']['url'] ),
															'class' => 'jump',
															'alt'   => 'hero',
														) );
													?>
												</div>
											<?php endif; ?>
											<?php if( !empty( $slides[ 'sub_title' ] ) ) :  ?>
												<span class="hero-subtitle">
													<?php echo esc_html($slides[ 'sub_title' ] ); ?>
												</span>
											<?php endif; ?>

											<?php if( !empty( $slides[ 'title' ] ) ) :  ?>
												<h1 class="hero-title">
													<?php echo esc_html($slides[ 'title' ] ); ?>
												</h1>
											<?php endif; ?>

											<?php
												$target = $slides['link']['is_external'] ? ' target="_blank"' : '';
												$nofollow = $slides['link']['nofollow'] ? ' rel="nofollow"' : '';

											?>
											<?php if( !empty( $slides[ 'button_text' ] ) ) :  ?>
												<a href="<?php echo esc_url($slides['link']['url']); ?>"  <?php echo esc_attr( $nofollow.$target ) ?> class="vs-btn style3">
													<?php echo esc_html($slides[ 'button_text' ] ); ?>
												</a>
											<?php endif; ?>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
			</section>
		<?php
        
	}

}