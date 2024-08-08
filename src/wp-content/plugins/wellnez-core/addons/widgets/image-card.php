<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Background;
/**
 *
 * Image Widget .
 *
 */
class Wellnez_Image_Card extends Widget_Base {

	public function get_name() {
		return 'wellnezimagecard';
	}

	public function get_title() {
		return __( 'Image Card', 'wellnez' );
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
				'label' 	=> __( 'Image', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'iamgbox_style',
			[
				'label' 	=> __( 'Service Style', 'wellnez' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'wellnez' ),
					'2' 		=> __( 'Style Two', 'wellnez' ),
					'3' 		=> __( 'Style Three', 'wellnez' ),
				],
			]
		);

        $this->add_control(
			'image',
			[
				'label' 		=> __( 'Image', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
			'image_shape',
			[
				'label' 		=> __( 'Shape Image', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
				'condition'    => [
					'iamgbox_style' => ['1', '3'],
				]
			]
		);

		

		$this->add_control(
			'card_title',
            [
				'label'         => __( 'Title', 'wellnez' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'ONSECTTTUR ADIPISCUNG' , 'wellnez' ),
				'label_block'   => true,
				'condition'    => [
					'iamgbox_style' => [ '1', '2' ],
				]
			]
		);

		$this->add_control(
			'prodcut_title',
            [
				'label'         => __( 'Product Name', 'wellnez' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'FACE VITAMIN' , 'wellnez' ),
				'label_block'   => true,
				'condition'    => [
					'iamgbox_style' => [ '2', '3' ],
				]
			]
		);

		$this->add_control(
			'card_price',
            [
				'label'         => __( 'Price', 'wellnez' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '$12.00' , 'wellnez' ),
				'label_block'   => true,
				'condition'    => [
					'iamgbox_style' => [ '2', '3' ],
				]
			]
		);

		$this->add_control(
			'single_page',
            [
				'label'         => __( 'Deatils Page Url', 'wellnez' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '#' , 'wellnez' ),
				'label_block'   => true,
				'condition'    => [
					'iamgbox_style' => [ '2', '3' ],
				]
			]
		);

        $this->add_responsive_control(
			'image_align',
			[
				'label' 		=> __( 'Alignment', 'wellnez' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'left' 	=> [
						'title' 		=> __( 'Left', 'wellnez' ),
						'icon' 			=> 'fa fa-align-left',
					],
					'center' 	=> [
						'title' 		=> __( 'Center', 'wellnez' ),
						'icon' 			=> 'fa fa-align-center',
					],
					'right' 	=> [
						'title' 		=> __( 'Right', 'wellnez' ),
						'icon' 			=> 'fa fa-align-right',
					],
				],
				'default' 	=> 'left',
				'toggle' 	=> true,
				'selectors' => [
					'{{WRAPPER}} .wellnez_img' => 'text-align: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'link',
			[
				'label' 		=> __( 'Link', 'wellnez' ),
				'type' 			=> Controls_Manager::URL,
                'placeholder' 	=> __( 'https://your-link.com', 'wellnez' ),
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
			'image_style_section',
			[
				'label' 	=> __( 'Image Style', 'wellnez' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_responsive_control(
			'width',
			[
				'label' 	=> __( 'Width', 'wellnez' ),
				'type' 		=> Controls_Manager::SLIDER,
				'default' 	=> [
					'unit' 		=> '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%', 'px', 'vw' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wellnez_img img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'space',
			[
				'label' 	=> __( 'Max Width', 'wellnez' ) . ' (%)',
				'type' 		=> Controls_Manager::SLIDER,
				'default' 	=> [
					'unit' 		=> '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wellnez_img img' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'separator_panel_style',
			[
				'type' 	=> Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'image_border',
				'selector' 	=> '{{WRAPPER}} .wellnez_img img',
			]
		);

		$this->add_responsive_control(
			'image_border_radius',
			[
				'label' 		=> __( 'Border Radius', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .wellnez_img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'image_box_shadow',
				'exclude' 	=> [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .wellnez_img img',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'card_style_section',
			[
				'label' => __( 'Service Box Number Style', 'wellnez' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' 		=> 'background',
				'label' 	=> __( 'Background', 'wellnez' ),
				'types' 	=> [ 'classic'],
				'selector' 	=> '{{WRAPPER}} .img-box3.style2 .img-product',
			]
		);

        $this->add_control(
			'card_title_color',
			[
				'label' 	=> __( 'Title Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .img-box3.style2 .text-shape text' => 'color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_control(
			'product_color',
			[
				'label' 	=> __( 'Product Title Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .img-box3 .product-title' => 'color: {{VALUE}}!important',
                ],
			]
        );
        $this->add_control(
			'product_color_hover',
			[
				'label' 	=> __( 'Hover Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .text-inherit:hover' => 'color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'card_title_typography',
				'label' 	=> __( 'Service Title Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .img-box3 .product-title',
			]
		);


		
		$this->end_controls_section();

	}




	protected function render() {

        $settings = $this->get_settings_for_display();

		?>
		<?php if( '1' == $settings[ 'iamgbox_style' ]  ): ?>
			<!-- <div class="col-lg-5"> -->
				<div class="img-box3">
					<div class="shape-line">
						<svg viewBox="0 0 442 357">
							<path class="shape-line" d="M220.6 3C339.98 3 437.1 100.12 437.1 219.5V351.99H440.1V219.5C440.1 160.87 417.27 105.75 375.81 64.29C334.35 22.83 279.23 0 220.6 0C161.97 0 106.85 22.83 65.39 64.29C28.67 101.01 6.57 148.46 2 199.56H5.02C15.12 89.5 107.94 3 220.6 3Z"></path>
							<path class="shape-dot" d="M7 198.5C7 200.433 5.433 202 3.5 202C1.567 202 0 200.433 0 198.5C0 196.567 1.567 195 3.5 195C5.433 195 7 196.567 7 198.5Z"></path>
							<path class="shape-dot" d="M442 353.5C442 355.433 440.433 357 438.5 357C436.567 357 435 355.433 435 353.5C435 351.567 436.567 350 438.5 350C440.433 350 442 351.567 442 353.5Z"></path>
						</svg>
					</div>
					<?php if( !empty( $settings[ 'card_title' ] )  ) : ?>
						<div class="text-shape">
							<svg viewBox="0 0 408 579">
								<path id="iamgebox-shape" d="M0 204C0 91.3339 91.3339 0 204 0V0C316.666 0 408 91.3339 408 204V316.879V375C408 487.666 316.666 579 204 579V579C91.3339 579 0 487.666 0 375V204Z">
								</path>
								<text>
									<textPath href="#iamgebox-shape" startOffset="810">
										<?php echo esc_html( $settings[ 'card_title' ] ); ?>
									</textPath>
								</text>
							</svg>
						</div>
					<?php endif; ?>

					<?php if( !empty( $settings['image']['url'] ) ): ?>
						<div class="img-1">
							<?php echo wellnez_img_tag( array(
								'url'	=> esc_url( $settings[ 'image' ][ 'url' ] ),
									'alt'   => 'about',
								) );
							?>
						</div>
							
						<div class="img-2 jump-img">
							<?php echo wellnez_img_tag( array(
								'url'	=> esc_url( $settings[ 'image_shape' ][ 'url' ] ),
								'alt'   => 'about',
							) );
							?>
						</div>
					<?php endif; ?>
				</div>
			<!-- </div> -->
			<?php elseif( '2' == $settings[ 'iamgbox_style' ]  ): ?>
				<div class="img-box3 style2">
					<div class="shape-line">
						<svg viewBox="0 0 442 357">
							<path class="shape-line" d="M220.6 3C339.98 3 437.1 100.12 437.1 219.5V351.99H440.1V219.5C440.1 160.87 417.27 105.75 375.81 64.29C334.35 22.83 279.23 0 220.6 0C161.97 0 106.85 22.83 65.39 64.29C28.67 101.01 6.57 148.46 2 199.56H5.02C15.12 89.5 107.94 3 220.6 3Z"></path>
							<path class="shape-dot" d="M7 198.5C7 200.433 5.433 202 3.5 202C1.567 202 0 200.433 0 198.5C0 196.567 1.567 195 3.5 195C5.433 195 7 196.567 7 198.5Z"></path>
							<path class="shape-dot" d="M442 353.5C442 355.433 440.433 357 438.5 357C436.567 357 435 355.433 435 353.5C435 351.567 436.567 350 438.5 350C440.433 350 442 351.567 442 353.5Z"></path>
						</svg>
					</div>

					<?php if( !empty( $settings[ 'card_title' ] ) ): ?>
						<div class="text-shape">
							<svg viewBox="0 0 408 579">
								<path id="iamgebox-shape2" d="M0 204C0 91.3339 91.3339 0 204 0V0C316.666 0 408 91.3339 408 204V316.879V375C408 487.666 316.666 579 204 579V579C91.3339 579 0 487.666 0 375V204Z">
								</path>
								<text>
									<textPath href="#iamgebox-shape2" startOffset="810">
										<?php echo esc_html( $settings[ 'card_title' ] ); ?>
									</textPath>
								</text>
							</svg>
						</div>
					<?php endif; ?>

					<?php if( !empty( $settings[ 'image' ][ 'url' ] ) ): ?>
						<div class="img-product">
							<a href="<?php echo esc_url( $settings[ 'single_page' ] ); ?>">
								<?php echo wellnez_img_tag( array(
									'url'	=> esc_url( $settings[ 'image' ][ 'url' ] ),
										'alt'   => 'about',
									) );
								?>
							</a>
							<?php if( $settings[ 'prodcut_title' ] ): ?>
								<p class="product-title">
									<a href="<?php echo esc_url( $settings[ 'single_page' ] ); ?>" class="text-inherit">
										<?php echo esc_html( $settings[ 'prodcut_title' ] ); ?>
									</a>
								</p>
							<?php endif; ?>

							<?php if( !empty( $settings[ 'card_price' ] ) ): ?>
								<p class="product-price">
									<?php echo esc_html( $settings[ 'card_price' ] ); ?>
								</p>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php elseif( '3' == $settings[ 'iamgbox_style' ]  ): ?>
				<div class="img-box3 style3">

					<?php if( !empty(  $settings[ 'image_shape' ][ 'url' ] ) ): ?>
						<div class="img-2 jump-img">
							<?php echo wellnez_img_tag( array(
								'url'	=> esc_url( $settings[ 'image_shape' ][ 'url' ] ),
								'alt'   => 'about',
							) );
							?>
						</div>
					<?php endif; ?>


					<?php if( !empty( $settings[ 'image' ][ 'url' ] ) ): ?>
						<div class="img-product">
							<a href="<?php echo esc_url( $settings[ 'single_page' ] ); ?>">
								<?php echo wellnez_img_tag( array(
									'url'	=> esc_url( $settings[ 'image' ][ 'url' ] ),
										'alt'   => 'about',
									) );
								?>
							</a>
							<?php if( $settings[ 'prodcut_title' ] ): ?>
								<p class="product-title">
									<a href="<?php echo esc_url( $settings[ 'single_page' ] ); ?>" class="text-inherit">
										<?php echo esc_html( $settings[ 'prodcut_title' ] ); ?>
									</a>
								</p>
							<?php endif; ?>

							<?php if( !empty( $settings[ 'card_price' ] ) ): ?>
								<p class="product-price">
									<?php echo esc_html( $settings[ 'card_price' ] ); ?>
								</p>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		<?php 



		

	}

}