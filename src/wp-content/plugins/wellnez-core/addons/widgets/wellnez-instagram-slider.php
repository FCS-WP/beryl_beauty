<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * Instagram Slider Widget .
 *
 */
class Wellnez_Instagram_Slider extends Widget_Base {

	public function get_name() {
		return 'wellnezinstagramslider';
	}

	public function get_title() {
		return __( 'Instagram Slider', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'instagram_slider_section',
			[
				'label'     => __( 'Instagram Slider', 'wellnez' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$repeater = new Repeater();

		$repeater->add_control(
			'instagram_slider_image',
			[
				'label' 	=> __( 'Instagram Image', 'wellnez' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' => [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$repeater->add_control(
			'image_link',
			[
				'label' 		=> __( 'Image Link', 'wellnez' ),
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

		$repeater->add_control(
			'image_text',
			[
				'label' 		=> __( 'Image Link', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 	    => __( 'Wellnez', 'wellnez' ),
			]
		);
		


		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Instagram Slider', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'instagram_slider_image' => Utils::get_placeholder_image_src(),
					],
					[
						'instagram_slider_image' => Utils::get_placeholder_image_src(),
					],
					[
						'instagram_slider_image' => Utils::get_placeholder_image_src(),
					],
					[
						'instagram_slider_image' => Utils::get_placeholder_image_src(),
					],
					[
						'instagram_slider_image' => Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> __( 'Instagram Slider', 'wellnez' ),
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
			'desktop_items',
			[
				'label' 		=> __( 'Items To Show', 'wellnez' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ '%' ],
				'range' 		=> [
					'%' 	=> [
						'min' 		=> 0,
						'step' 		=> 1,
						'max' 		=> 10,
					],
				],
				'default' 		=> [
					'unit' 			=> '%',
					'size' 			=> 5,
				],
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
			'general_style',
			[
				'label' 	=> __( 'General', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'hover_shape_color',
			[
				'label' 		=> __( 'Hover Shape Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .gallery-box:before' => 'background-color: {{VALUE}}',
                ]
			]
        );
		$this->add_control(
			'hover_icon_color',
			[
				'label' 		=> __( 'Hover Icon Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .gallery-box i' => 'color: {{VALUE}}',
                ]
			]
        );
		
		$this->end_controls_section();
		
	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		
		$this->add_render_attribute( 'wrapper', 'class', 'row instagram-align-style1' );

        $this->add_render_attribute( 'wrapper', 'data-slide-to-show', $settings['desktop_items']['size'] );

		if( $settings['slider_autoplay'] == 'yes' ) {
			$this->add_render_attribute( 'wrapper', 'data-slick-autoplay', 'true' );
		} else {
			$this->add_render_attribute( 'wrapper', 'data-slick-autoplay', 'false' );
		}
		
		echo '<section class="instagram-gallery">';
	        echo '<div class="container-fluid">';
	            echo '<div '.$this->get_render_attribute_string('wrapper').'>';
					if( ! empty( $settings['slides'] ) ){
						foreach( $settings['slides'] as $singlegallery ){
							if( ! empty( $singlegallery['instagram_slider_image']['url'] ) ){
								echo '<div class="col-xl-3">';
		                            echo '<div class="instagram-box image-scale-hover">';
										echo wellnez_img_tag( array(
											'url'	=> esc_url( $singlegallery['instagram_slider_image']['url'] ),
											'class' => 'w-100',
										) );
										echo '<a href="'.esc_url( $singlegallery['image_link']['url'] ).'" class="insta-btn"><i class="fab fa-instagram"></i>'.esc_html( $singlegallery['image_text'] ).'</a>';
		                            echo '</div>';
		                        echo '</div>';
							}
						}
					}
	            echo '</div>';
	        echo '</div>';
	    echo '</section>';
	}
}