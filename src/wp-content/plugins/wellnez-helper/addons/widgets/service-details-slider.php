<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 * 
 * Post Details Slider Widget .
 *
 */
class Mixlax_Service_Details_Slider extends Widget_Base{

	public function get_name() {
		return 'mixlaxservicedetailsslider';
	}

	public function get_title() {
		return __( 'Service Details Slider', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'service_details_slider_section',
			[
				'label' 	=> __( 'Service Details Slider', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);


		$repeater = new Repeater();

		$repeater->add_control(
			'post_image',
			[
				'label' 		=> __( 'Slider Image', 'mixlax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
        );

		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Slides', 'mixlax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'post_image' => Utils::get_placeholder_image_src(),
					],
					[
						'post_image' => Utils::get_placeholder_image_src(),
					],
				],
				'title_field' => 'Add Slider',
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'slider_control_section',
			[
				'label' 	=> __( 'Slider Control', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        
		$this->add_control(
			'slider_autoplay',
			[
				'label' 		=> __( 'Autoplay', 'mixlax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'mixlax' ),
				'label_off' 	=> __( 'No', 'mixlax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
		
		$this->add_control(
			'slide-to-show',
			[
				'label' 		=> __( 'Slide To Show', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
			]
		);
        $this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'wrapper', 'class', 'service-thumb-image service-img-slide-nav' );

		$this->add_render_attribute( 'wrapper', 'data-slide-to-show', $settings['slide-to-show']['size'] );

		if( $settings['slider_autoplay'] == 'yes' ) {
			$this->add_render_attribute( 'wrapper','data-slick-autoplay', 'true' );
		} else {
			$this->add_render_attribute( 'wrapper','data-slick-autoplay', 'false' );
		}
        
		echo '<!-- Service Image -->';
	    echo '<div class="service-img service-img-slide">';
			foreach( $settings['slides'] as $singleslide) {
				if( !empty( $singleslide['post_image']['url'] ) ) {
					echo wellnez_img_tag( array(
						'url'	=> esc_url( $singleslide['post_image']['url'] ),
					) );
				}
			}
	    echo '</div>';
	    echo '<!-- Service Thumb Image -->';
		echo '<div '.$this->get_render_attribute_string('wrapper').'>';
			foreach( $settings['slides'] as $singleslide) {
				if( !empty( $singleslide['post_image']['url'] ) ) {
					echo wellnez_img_tag( array(
						'url'	=> esc_url( $singleslide['post_image']['url'] ),
					) );
				}
			}
	    echo '</div>';
	}

}