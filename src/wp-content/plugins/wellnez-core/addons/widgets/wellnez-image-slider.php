<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * Image Widget .
 *
 */
class Wellnez_Image_Slider extends Widget_Base {

	public function get_name() {
		return 'imageslider';
	}

	public function get_title() {
		return __( 'Image Slider', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'image_slider_section',
			[
				'label' 	=> __( 'Image Slider', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'image_style',
			[
				'label' 	=> __( 'Image Style', 'wellnez' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'wellnez' ),
					'2' 		=> __( 'Style Two', 'wellnez' ),
				],
			]
		);

        $repeater = new Repeater();

		$repeater->add_control(
			'image',
			[
				'label' 	=> __( 'Image', 'wellnez' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' => [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'image_link',
			[
				'label' 		=> __( 'Link', 'wellnez' ),
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
			'image_slider',
			[
				'label' 		=> __( 'Image Sliders', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'image' => Utils::get_placeholder_image_src(),
					],
					[
						'image' => Utils::get_placeholder_image_src(),
					],
					[
						'image' => Utils::get_placeholder_image_src(),
					],
					[
						'image' => Utils::get_placeholder_image_src(),
					],
					[
						'image' => Utils::get_placeholder_image_src(),
					],
				]
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
					'size' 			=> 1,
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

	}

	protected function render() {

        $settings = $this->get_settings_for_display();



        $this->add_render_attribute( 'wrapper', 'data-slide-to-show', $settings['desktop_items']['size'] );

		if( $settings['image_style'] == '2' ){
			$this->add_render_attribute( 'wrapper', 'class', 'row vs-carousel' );
			$this->add_render_attribute( 'wrapper', 'data-lg-slidetoshow', '4' );
			$this->add_render_attribute( 'wrapper', 'data-md-slidetoshow', '3' );
			$this->add_render_attribute( 'wrapper', 'data-sm-slidetoshow', '2' );
			$this->add_render_attribute( 'wrapper', 'data-fade', 'false' );
		}else{
			$this->add_render_attribute( 'wrapper', 'class', 'thumb-slider vs-carousel' );
			$this->add_render_attribute( 'wrapper', 'data-lg-slidetoshow', '1' );
			$this->add_render_attribute( 'wrapper', 'data-md-slidetoshow', '1' );
			$this->add_render_attribute( 'wrapper', 'data-sm-slidetoshow', '1' );
			$this->add_render_attribute( 'wrapper', 'data-fade', 'true' );
		}

		if( $settings['slider_autoplay'] == 'yes' ) {
			$this->add_render_attribute( 'wrapper', 'data-slick-autoplay', 'true' );
		} else {
			$this->add_render_attribute( 'wrapper', 'data-slick-autoplay', 'false' );
		}

		if( $settings['image_style'] == '1' ){
	        echo '<div '.$this->get_render_attribute_string('wrapper').'>';
				foreach( $settings['image_slider'] as $singleimage ) {
					$target = $singleimage['image_link']['is_external'] ? ' target="_blank"' : '';
					$nofollow = $singleimage['image_link']['nofollow'] ? ' rel="nofollow"' : '';
					echo '<div class="thumb mega-hover">';
	                    echo '<a '.wp_kses_post( $nofollow.$target ).' href="'.esc_url( $singleimage['image_link']['url'] ).'">';
	                        echo '<img class="w-100" src="'.esc_url( $singleimage['image']['url'] ).'" alt="'.esc_attr( wellnez_image_alt( $singleimage['image']['url']) ).'">';
	                    echo '</a>';
	                echo '</div>';
				}
	        echo '</div>';
		}else{
			echo '<div class="vs-gallery-wrapper">';
	            echo '<div class="container">';
	               echo '<div '.$this->get_render_attribute_string('wrapper').'>';
					    foreach( $settings['image_slider'] as $singleimage ) {
						    $target = $singleimage['image_link']['is_external'] ? ' target="_blank"' : '';
						    $nofollow = $singleimage['image_link']['nofollow'] ? ' rel="nofollow"' : '';
							echo '<div class="col-xl-3">';
							    echo '<div class="vs-gallery vs-gallery-grid i image-scale-hover">';
								echo '<img class="w-100" src="'.esc_url( $singleimage['image']['url'] ).'" alt="'.esc_attr( wellnez_image_alt( $singleimage['image']['url']) ).'">';
								    echo '<a class="gallery-btn" '.wp_kses_post( $nofollow.$target ).' href="'.esc_url( $singleimage['image_link']['url'] ).'">';
									    echo '<i class="fab fa-instagram"></i>';
								    echo '</a>';
							    echo '</div>';
							echo '</div>';
					    }
	                echo '</div>';
	            echo '</div>';
	        echo '</div>';
		}

	}

}