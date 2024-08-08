<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
/**
 *
 * Google Map Widget .
 *
 */
class Wellnez_Google_Map extends Widget_Base {

	public function get_name() {
		return 'wellnezgooglemap';
	}

	public function get_title() {
		return __( 'Google Map', 'wellnez' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'wellnez' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'map_address_section',
			[
				'label' => __( 'Addresss', 'wellnez' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'map_latitude',
			[
				'label' => __( 'Latitude', 'wellnez' ),
                'type' => Controls_Manager::TEXT,
                'default'   => '23.7909601'
			]
        );

        $this->add_control(
			'map_longitude',
			[
				'label' => __( 'longitude', 'wellnez' ),
                'type' => Controls_Manager::TEXT,
                'default'   => '90.3772613'
			]
        );

        $this->add_control(
			'map_zoom',
			[
				'label' => __( 'Zoom', 'wellnez' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'step' => 1,
						'max' => 20,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 10,
				],
			]
		);

        $this->add_control(
			'map_marker',
			[
				'label' => __( 'Marker', 'wellnez' ),
                'type' => Controls_Manager::MEDIA
			]
        );

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( !empty( $settings['map_latitude'] ) || !empty( $settings['map_longitude'] ) ) {
            if( !empty( $settings['map_marker']['url'] ) ) {
                $map_marker_url = $settings['map_marker']['url'];
            } else {
                $map_marker_url = '';
            }
            echo '<!-- Start Map -->';
			echo '<div class="contact-map-wrap">';
	            echo '<div id="google-map" class="map" data-marker="'.esc_url( $map_marker_url ).'" data-latitude="'.esc_attr( $settings['map_latitude'] ).'" data-longitude="'.esc_attr( $settings['map_longitude'] ).'" data-zoom="'.esc_attr($settings['map_zoom']['size']).'" data-trigger="map">';
	            echo '</div>';
	        echo '</div>';
            echo '<!-- End Map -->';
        }

	}

}