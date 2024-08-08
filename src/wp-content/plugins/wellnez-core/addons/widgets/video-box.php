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
class Wellnez_Video_Box extends Widget_Base {

	public function get_name() {
		return 'wellnezvideobox';
	}

	public function get_title() {
		return __( 'Video Box', 'wellnez' );
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
				'label' 	=> __( 'Video Box', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'video_box_style',
			[
				'label' 	=> __( 'Video Box Style', 'wellnez' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'wellnez' ),
					'2' 		=> __( 'Style Two', 'wellnez' ),
				],
			]
		);
        $this->add_control(
			'bg_image',
			[
				'label' 		=> __( 'Background Image', 'wellnez' ),
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
				'label' 		=> __( 'Shape Image Top', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'video_box_style' => '1',
				]
			]
		);

        $this->add_control(
			'image_shape_two',
			[
				'label' 		=> __( 'Shape Image Bottom', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'video_box_style' => '1',
				]
			]
		);
		$this->add_control(
			'video_title',
            [
				'label'         => __( 'Title', 'wellnez' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'Watch Our Story' , 'wellnez' ),
				'label_block'   => true,
				'condition' => [
					'video_box_style' => '1',
				]
			]
		);
		$this->add_control(
			'video_popup',
            [
				'label'         => __( 'Video Link', 'wellnez' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'https://www.youtube.com/watch?v=ybctdDsErNM' , 'wellnez' ),
				'label_block'   => true,
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
		
		$this->add_responsive_control(
			'card_margin',
			[
				'label' 		=> __( 'Video Box Margin', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .watch-btn .play-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->end_controls_section();

	}




	protected function render() {

        $settings = $this->get_settings_for_display();
		
		
		
		?>

		<?php if( '1'  == $settings['video_box_style'] ): ?>
			<div class="img-box4" data-overlay="theme" data-opacity="4">
				<?php if( !empty( $settings['bg_image']['url'] ) ): ?>
					<div class="img-1">
						<?php echo wellnez_img_tag( array(
							'url'	=> esc_url( $settings['bg_image']['url'] ),
							'class' => 'w-100',
							'alt'   => 'thumbnail'
						) );
						?>
					</div>
				<?php endif; ?>
				<?php if( !empty( $settings['image_shape']['url'] ) ): ?>
					<div class="img-2 jump d-none d-xl-block">
						<?php echo wellnez_img_tag( array(
							'url'	=> esc_url( $settings['image_shape']['url'] ),
							'alt'   => 'shape'
						) );
						?>
					</div>
				<?php endif; ?>
				<?php if( !empty( $settings['image_shape_two']['url'] ) ): ?>
					<div class="img-3 jump d-none d-xl-block">
						<?php echo wellnez_img_tag( array(
							'url'	=> esc_url( $settings['image_shape_two']['url'] ),
							'alt'   => 'shape'
						) );
						?>
					</div>
				<?php endif; ?>
				<?php if( !empty( $settings[ 'video_popup' ] ) ): ?>
					<a href="<?php echo esc_url( $settings[ 'video_popup' ] ) ?>" class="watch-btn style2 popup-video">
						<span class="play-btn"><i class="fas fa-play"></i></span>
						<?php if( !empty( $settings[ 'video_title' ] ) ) :?>
							<span class="btn-text">
								<?php !empty( $settings[ 'video_title' ] ); ?>
							</span>
						<?php endif; ?>
					</a>
				<?php endif; ?>
			</div>
		<?php elseif( '2'  == $settings['video_box_style'] ): ?>
			<div class="img-box8">
				<?php if( !empty( $settings['bg_image']['url'] ) ): ?>
					<div class="img-1">
						<?php echo wellnez_img_tag( array(
							'url'	=> esc_url( $settings['bg_image']['url'] ),
							'class' => 'w-100',
							'alt'   => 'thumbnail'
						) );
						?>
					</div>
				<?php endif; ?>

				<?php if( !empty( $settings[ 'video_popup' ] ) ): ?>
					<a href="<?php echo esc_url( $settings[ 'video_popup' ] ) ?>" class="play-btn style4 position-center">
						<i class="fas fa-play"></i>
					</a>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php 
	}

}