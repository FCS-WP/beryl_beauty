<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\HEADING;
/**
 *
 * Image Widget .
 *
 */
class Wellnez_Hero_One extends Widget_Base {

	public function get_name() {
		return 'wellnezimage';
	}

	public function get_title() {
		return __( 'Hero Home One', 'wellnez' );
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
			'hero_image',
			[
				'label' 		=> __( 'Hero Man Image', 'wellnez' ),
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
        $this->add_control(
			'sahpe_four',
			[
				'label' 		=> __( 'Shape 04', 'wellnez' ),
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
			'sahpe_five',
			[
				'label' 		=> __( 'Shape 05', 'wellnez' ),
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
			'hero_section_title',
			[
				'label' 	=> __( 'Top Content', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		
		$this->add_control(
			'title',
			[
				'label'     => __( 'Title', 'wellnez' ),
                'type'      => Controls_Manager::TEXT,
				'default'   => __('SPECIALTY SPA'),
				'label_block' => true,
			]
        );

		$this->add_control(
			'sub_title',
			[
				'label'     => __( 'Sub Title', 'wellnez' ),
                'type'      => Controls_Manager::TEXT,
				'default'   => __('_SKINCARE INSPIRES'),
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

		//Prcing Card

		$this->start_controls_section(
			'pricing_card_one',
			[
				'label' 	=> __( 'Card One', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'price',
			[
				'label'     => __( 'Price', 'wellnez' ),
                'type'      => Controls_Manager::TEXT,
				'default'   => __('12'),
				'label_block' => true,
			]
        );
		$this->add_control(
			'currency',
			[
				'label'     => __( 'Currency', 'wellnez' ),
                'type'      => Controls_Manager::TEXT,
				'default'   => __('$'),
				'label_block' => true,
			]
        );
		$this->add_control(
			'package',
			[
				'label'     => __( 'Package Name', 'wellnez' ),
                'type'      => Controls_Manager::TEXT,
				'default'   => __('Mega Plan'),
				'label_block' => true,
			]
        );
		$this->add_control(
			'package_duration',
			[
				'label'     => __( 'Package Duration', 'wellnez' ),
                'type'      => Controls_Manager::TEXT,
				'default'   => __('Bridal & 3 Person'),
				'label_block' => true,
			]
        );
		$this->add_control(
			'package_btn',
			[
				'label'     => __( 'Button Text', 'wellnez' ),
                'type'      => Controls_Manager::TEXT,
				'default'   => __('Wedding Package'),
				'label_block' => true,
			]
        );
        $this->add_control(
			'package_url',
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

		$this->add_control(
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
		$this->add_control(
			'package_img',
			[
				'label' 		=> __( 'Package Img', 'wellnez' ),
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


		//Prcing Card
		$this->start_controls_section(
			'pricing_card_two',
			[
				'label' 	=> __( 'Card Two', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'price_two',
			[
				'label'     => __( 'Price', 'wellnez' ),
                'type'      => Controls_Manager::TEXT,
				'default'   => __('12'),
				'label_block' => true,
			]
        );
		$this->add_control(
			'currency_two',
			[
				'label'     => __( 'Currency', 'wellnez' ),
                'type'      => Controls_Manager::TEXT,
				'default'   => __('$'),
				'label_block' => true,
			]
        );
		$this->add_control(
			'package_two',
			[
				'label'     => __( 'Package Name', 'wellnez' ),
                'type'      => Controls_Manager::TEXT,
				'default'   => __('Mega Plan'),
				'label_block' => true,
			]
        );
		$this->add_control(
			'package_duration_two',
			[
				'label'     => __( 'Package Duration', 'wellnez' ),
                'type'      => Controls_Manager::TEXT,
				'default'   => __('Bridal & 3 Person'),
				'label_block' => true,
			]
        );
		$this->add_control(
			'package_btn_two',
			[
				'label'     => __( 'Button Text', 'wellnez' ),
                'type'      => Controls_Manager::TEXT,
				'default'   => __('Wedding Package'),
				'label_block' => true,
			]
        );
        $this->add_control(
			'package_url_two',
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

		$this->add_control(
			'package_shape_two',
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
		$this->add_control(
			'package_img_two',
			[
				'label' 		=> __( 'Package Img', 'wellnez' ),
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

		// Style
		$this->start_controls_section(
			'top_contnt',
			[
				'label' 	=> __( 'Top Content', 'wellnez' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'content_btn_color',
			[
				'label' 	=> __( 'Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .circle-btn.style2, {{WRAPPER}} .circle-btn.style2 .btn-icon' => 'color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'content_btn_color_border',
			[
				'label' 	=> __( 'Border Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .circle-btn.style2 .btn-icon' => 'border-color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'content_btn_bg_color',
			[
				'label' 	=> __( 'Background Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .circle-btn.style2' => 'background-color: {{VALUE}}',
                ],
			]
        );

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
					'{{WRAPPER}} .media-style3 .media-label' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typo',
				'label' 	=> __( 'Title', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .media-style3 .media-label',
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
					'{{WRAPPER}} .media-style3 .media-title' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'sub_title_typo',
				'label' 	=> __( 'Sub Title ', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .media-style3 .media-title',
			]
		);
		$this->end_controls_section();

		// Pricing Box
		$this->start_controls_section(
			'card_style',
			[
				'label' 	=> __( 'Price', 'wellnez' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'price_heading',
			[
				'label' => esc_html__( 'Price', 'wellnez' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'price_color',
			[
				'label' 	=> __( 'Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .package-style1.layout2.active .package-price' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'price_typo',
				'label' 	=> __( 'Price Typo', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .package-style1.layout2.active .package-price',
			]
		);
		$this->add_control(
			'price_currency',
			[
				'label' => esc_html__( 'Currency', 'wellnez' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->end_controls_section();

		//Packge Style
		$this->start_controls_section(
			'card_title',
			[
				'label' 	=> __( 'Package Name', 'wellnez' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'pacgage_color',
			[
				'label' 	=> __( 'Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .package-name' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'pacgage_typo',
				'label' 	=> __( 'Price Typo', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .package-name',
			]
		);
		$this->end_controls_section();


		//Package Duration Style
		$this->start_controls_section(
			'package_duration_style',
			[
				'label' 	=> __( 'Package Duration', 'wellnez' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'price_currency_heading',
			[
				'label' => esc_html__( 'Currency', 'wellnez' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'duration_color',
			[
				'label' 	=> __( 'Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .package-style1 .package-duration' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'duration_typo',
				'label' 	=> __( 'Duration Typo', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .package-style1 .package-duration',
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
					'{{WRAPPER}} .package-style1.layout2 .vs-btn' => 'color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'button_bg_color',
			[
				'label' 	=> __( 'Background Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .package-style1.layout2 .vs-btn' => 'background-color: {{VALUE}}',
                ],
			]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typo',
				'label' 	=> __( 'Button Typo', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .package-style1.layout2 .vs-btn',
			]
		);

		$this->add_control(
			'button_active',
			[
				'label' => esc_html__( 'Button Active', 'wellnez' ),
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
					'{{WRAPPER}} .package-style1.layout2.active .vs-btn' => 'color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'button_bg_color_active',
			[
				'label' 	=> __( 'Background Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .package-style1.layout2.active .vs-btn' => 'background-color: {{VALUE}}',
                ],
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

		// This Button Crad One
		if( !empty( $settings['package_url']['url'] ) ) {
            $this->add_render_attribute('plink','href',esc_url( $settings['package_url']['url'] ));
        }
        if( !empty( $settings['package_url']['nofollow'] ) ) {
            $this->add_render_attribute('plink','rel', 'nofollow' );
        }
        if( !empty( $settings['package_url']['is_external'] ) ) {
            $this->add_render_attribute('plink','target','_blank');
        }
		$this->add_render_attribute('plink','class', 'vs-btn style5' );


		// This Button Crad Two
		if( !empty( $settings['package_url_two']['url'] ) ) {
            $this->add_render_attribute('plink_two','href',esc_url( $settings['package_url_two']['url'] ));
        }
        if( !empty( $settings['package_url_two']['nofollow'] ) ) {
            $this->add_render_attribute('plink_two','rel', 'nofollow' );
        }
        if( !empty( $settings['package_url_two']['is_external'] ) ) {
            $this->add_render_attribute('plink_two','target','_blank');
        }
		$this->add_render_attribute('plink_two','class', 'vs-btn style5' );
		
		?>
		<svg viewBox="0 0 150 150" class="svg-hidden">
			<path id="textPath" d="M 0,75 a 75,75 0 1,1 0,1 z"></path>
		</svg>
		<section class="hero-layout2">
			<?php if( !empty( $settings['sahpe_one']['url'] ) ): ?>
				<div class="hero-shape-1 jump" data-bottom="12%" data-left="4%">
				<?php echo wellnez_img_tag( array(
						'url'	=> esc_url( $settings['sahpe_one']['url'] )
					) );
					?>
				</div>
			<?php endif; ?>
			<?php if( !empty( $settings['sahpe_two']['url'] ) ): ?>
				<div class="hero-shape-2 jump-reverse" data-right="43%" data-top="9%">
					<?php echo wellnez_img_tag( array(
						'url'	=> esc_url( $settings['sahpe_two']['url'] )
						) );
					?>
				</div>
			<?php endif; ?>
			<?php if( !empty( $settings['sahpe_three']['url'] ) ): ?>
				<div class="hero-shape-3 jump" data-right="2%" data-top="17%">
					<?php echo wellnez_img_tag( array(
						'url'	=> esc_url( $settings['sahpe_three']['url'] )
						) );
					?>
				</div>
			<?php endif; ?>
			<?php if( !empty( $settings['sahpe_four']['url'] ) ): ?>
				<div class="hero-shape-4 rotate-reverse-img" data-top="37%" data-left="46%">
					<?php echo wellnez_img_tag( array(
						'url'	=> esc_url( $settings['sahpe_four']['url'] )
						) );
					?>
				</div>
			<?php endif; ?>
		<div class="hero-shape-5"></div>
			<div class="hero-inner">
				<div class="hero-content">
					<?php if( !empty( $settings['sahpe_five']['url'] ) ): ?>
						<div class="hero-flower ">
							<?php echo wellnez_img_tag( array(
								'url'	=> esc_url( $settings['sahpe_five']['url'] ),
								'class' => 'jump'
							) );
							?>
						</div>
					<?php endif; ?>
					<div class="media-style3">
						<?php if( !empty( $settings['button_text'] ) ): ?>
							<div class="circle-btn style2">
								<a <?php echo $this->get_render_attribute_string('link'); ?>><i class="far fa-arrow-right"></i></a>
								<div class="btn-text">
									<svg viewBox="0 0 150 150">
										<text>
											<textPath href="#textPath"><?php echo esc_html($settings['button_text']) ?></textPath>
										</text>
									</svg>
								</div>
							</div>
						<?php endif; ?>
						<div class="media-body">
							<?php if( !empty($settings['sub_title'] ) ): ?>
								<span class="media-label">
									<?php echo esc_html($settings['sub_title']); ?>
								</span>
							<?php endif; ?>

							<?php if( !empty($settings['title'] ) ): ?>
								<p class="media-title">
									<?php echo esc_html($settings['title']); ?>
								</p>
							<?php endif; ?>
						</div>
					</div>
					<div class="row gx-50">
						<!-- Card One -->
						<div class="col-md-6 col-xxl-auto">
							<div class="package-style1 layout2 active">
								<div class="package-top">
									<div class="package-left">
										<?php if( !empty( $settings['price'] ) ): ?>
											<p class="package-price">
												<?php echo esc_html($settings['price']); ?><span class="currency"><?php echo esc_html($settings['currency']); ?>
												</span>
											</p>
										<?php endif; ?>
										<?php if( !empty( $settings['package_duration'] ) ): ?>
											<p class="package-duration">
												<?php echo esc_html( $settings['package_duration'] ); ?>
											</p>
										<?php ?>
									</div>
									<?php if( !empty( $settings['package'] ) ): ?>
										<h3 class="package-name">
											<?php echo esc_html($settings['package'] ); ?>
										</h3>
									<?php endif; ?>
								</div>
								
								<?php if( !empty( $settings['package_shape']['url'] ) ): ?>
									<div class="package-shape">
										<?php echo wellnez_img_tag( array(
											'url'	=> esc_url( $settings['package_shape']['url'] ),
										) );
										?>
									</div>
								<?php endif; ?>

								<?php if( !empty( $settings['package_img']['url'] ) ): ?>
									<div class="package-img">
										<?php echo wellnez_img_tag( array(
											'url'	=> esc_url( $settings['package_img']['url'] ),
										) );
										?>
										<i class="package-dot rotate"></i>
									</div>
								<?php endif; ?>

								<?php if( !empty( $settings['package_btn'] ) ); ?>
									<div class="package-btn">
										<a <?php echo $this->get_render_attribute_string('plink'); ?>>
											<?php echo esc_html($settings['package_btn']); ?>
										</a>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<!-- End Card Two  -->

						<div class="col-md-6 col-xxl-auto">
							<div class="package-style1 layout2">
								<div class="package-top">
									<div class="package-left">
										<?php if( !empty( $settings['price_two'] ) ): ?>
											<p class="package-price">
												<?php echo esc_html($settings['price_two']); ?><span class="currency"><?php echo esc_html($settings['currency_two']); ?></span>
											</p>
										<?php endif; ?>
										<?php if( !empty( $settings['package_duration_two'] ) ): ?>
											<p class="package-duration">
												<?php echo esc_html( $settings['package_duration_two'] ); ?>
											</p>
										<?php ?>
									</div>
									<?php if( !empty($settings['package_two']) ): ?>
										<h3 class="package-name">
											<?php echo esc_html($settings['package_two']); ?>
										</h3>
									<?php endif; ?>
								</div>
								<?php if( !empty( $settings['package_shape_two']['url'] ) ): ?>
									<div class="package-shape">
										<?php echo wellnez_img_tag( array(
											'url'	=> esc_url( $settings['package_shape_two']['url'] ),
										) );
										?>
									</div>
								<?php endif; ?>
								<?php if( !empty( $settings['package_img_two']['url'] ) ): ?>
									<div class="package-img">
										<?php echo wellnez_img_tag( array(
											'url'	=> esc_url( $settings['package_img_two']['url'] ),
										) );
										?>
										<i class="package-dot rotate"></i>
									</div>
								<?php endif; ?>
								<?php if(!empty($settings['package_btn_two'])); ?>
									<div class="package-btn">
										<a <?php echo $this->get_render_attribute_string('plink_two'); ?>>
											<?php echo esc_html($settings['package_btn_two']); ?>
										</a>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<!-- End Card One  -->
					</div>
				</div>

				<?php if( !empty( $settings['hero_image']['url'] ) ): ?>
					<div class="hero-img">
						<?php echo wellnez_img_tag( array(
							'url'	=> esc_url( $settings['hero_image']['url'] )
							) );
						?>
						<div class="hero-ripple"><i class="ripple"></i><i class="ripple"></i></div>
					</div>
				<?php endif; ?>
			</div>
		</section>
		<?php
        
	}

}