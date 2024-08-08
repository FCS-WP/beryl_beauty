<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * Faq Widget .
 *
 */
class Wellnez_Gallery_Slider extends Widget_Base {

	public function get_name() {
		return 'wellnezgalleryslider';
	}

	public function get_title() {
		return __( 'Gallery Slider', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'gallery_slider_section',
			[
				'label'		 	=> __( 'Gallery Slider', 'wellnez' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

        $repeater = new Repeater();

		$repeater->add_control(
			'image',
			[
				'label' 		=> __( 'Image', 'wellnez' ),
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
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'TALK ABOUT SOMETHING', 'wellnez' )
			]
        );

        $repeater->add_control(
			'button_link',
			[
				'label' 		=> __( 'Link', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXT,
                'placeholder' 	=> __( 'https://your-link.com', 'wellnez' ),
			]
        );

		$this->add_control(
			'gallery_repeater',
			[
				'label' 		=> __( 'Gallery Images', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'image'        => Utils::get_placeholder_image_src(),
						'button_text'  => __( 'how to make your makeup last all day', 'wellnez' ),
						'button_link'  => __( '#', 'wellnez' ),
					],
					[
						'image'        => Utils::get_placeholder_image_src(),
						'button_text'  => __( 'how to make your makeup last all day', 'wellnez' ),
						'button_link'  => __( '#', 'wellnez' ),
					],
					[
						'image'        => Utils::get_placeholder_image_src(),
						'button_text'  => __( 'how to make your makeup last all day', 'wellnez' ),
						'button_link'  => __( '#', 'wellnez' ),
					],
				],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'gallery_style_section',
			[
				'label' => __( 'Gallery Style', 'wellnez' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' 		=> __( 'background Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .gallery-shape1' => 'background-color: {{VALUE}}!important',
				],
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' 		=> __( 'Button Text Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .circle-btn text' => 'fill: {{VALUE}}!important',
				],
			]
		);
		$this->add_control(
			'button_circle_bg',
			[
				'label' 		=> __( 'Button Circle Background', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .circle-btn.style2' => 'background-color: {{VALUE}}!important',
				],
			]
		);
		$this->add_control(
			'button_circle_icon_color',
			[
				'label' 		=> __( 'Button Circle Icon Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .circle-btn.style2 .btn-icon' => 'color: {{VALUE}}!important',
				],
			]
		);
		$this->add_control(
			'button_circle_icon_hover_color',
			[
				'label' 		=> __( 'Button Circle Icon Hover Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .circle-btn.style2 .btn-icon:hover' => 'color: {{VALUE}}!important',
				],
			]
		);
		$this->add_control(
			'button_circle_icon_hover_bg_color',
			[
				'label' 		=> __( 'Button Circle Icon Hover background Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .circle-btn.style2 .btn-icon:hover' => 'background-color: {{VALUE}}!important',
				],
			]
		);
		$this->add_control(
			'prev_next_color',
			[
				'label' 		=> __( 'Prev Next Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .arrows-style1 button' => 'color: {{VALUE}}!important',
				],
			]
		);
		$this->add_control(
			'prev_next_hover_color',
			[
				'label' 		=> __( 'Prev Next Hover Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .arrows-style1 button:hover' => 'color: {{VALUE}}!important',
				],
			]
		);

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		?>
		<svg viewBox="0 0 150 150" class="svg-hidden">
			<path id="gallery-slider-id" d="M 0,75 a 75,75 0 1,1 0,1 z"></path>
		</svg>

		<div class="position-relative space-extra-bottom">
			<div class="gallery-shape1"></div>
			<div class="container-fluid">
				<div class="row gallery-slider1 gallery-active">
					<?php foreach( $settings[ 'gallery_repeater' ] as $gallery ):  ?>
						<div class="col">
							<div class="gallery-style2">
								<?php if( !empty( $gallery['image']['url'] ) ): ?>
									<div class="gallery-img">
										<?php echo wellnez_img_tag( array(
											'url'	=> esc_url( $gallery[ 'image' ][ 'url' ] ),
											'alt'   => 'gallery',
										) );
										?>
									</div>
								<?php endif; ?>

								<?php if( !empty( $gallery['button_text'] )  ): ?>
									<div class="circle-btn style2">
										<a href="<?php echo esc_url( $gallery[ 'button_link' ] ); ?>" class="btn-icon"><i class="far fa-arrow-right"></i></a>
										<div class="btn-text">
											<svg viewBox="0 0 150 150">
											<text>
												<textPath href="#gallery-slider-id">
													<?php echo esc_html( $gallery[ 'button_text' ] ); ?>
												</textPath>
											</text>
											</svg>
										</div>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="arrows-style1">
					<button data-slick-prev=".gallery-slider1"><i class="arrow"></i>Prev</button>
					<button data-slick-next=".gallery-slider1"><i class="arrow"></i>Next</button>
				</div>
			</div>
		</div>
		<?php 
        
	}
}