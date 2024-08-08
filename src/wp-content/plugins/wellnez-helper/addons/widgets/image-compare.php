<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Utils;
/**
 *
 * Image Compare Widget .
 *
 */
class Mixlax_Image_Compare extends Widget_Base {

	public function get_name() {
		return 'mixlaximagecompare';
	}

	public function get_title() {
		return __( 'Image Compare', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'image_section',
			[
				'label' => __( 'Image Compare', 'mixlax' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
		
        $this->add_control(
			'first_image',
			[
				'label' 	=> __( 'First Image', 'mixlax' ),
				'type' 		=> Controls_Manager::MEDIA,
				'dynamic' 	=> [
					'active' => true,
				],
				'default' => [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'second_image',
			[
				'label' 	=> __( 'Second Image', 'mixlax' ),
				'type' 		=> Controls_Manager::MEDIA,
				'dynamic' 	=> [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		
		echo '<div class="project-img twentytwenty">';
			if( ! empty( $settings['first_image']['url'] ) ){
				echo wellnez_img_tag( array(
					'url'	=> esc_url( $settings['first_image']['url'] )
				) );
			}
			if( ! empty( $settings['second_image']['url'] ) ){
				echo wellnez_img_tag( array(
					'url'	=> esc_url( $settings['second_image']['url'] )
				) );
			}
		echo '</div>';
	}

}