<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * Client Logo Widget .
 *
 */
class Mixlax_Client_Logo extends Widget_Base {

	public function get_name() {
		return 'mixlaxclientlogo';
	}

	public function get_title() {
		return __( 'Client Logo', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'client_logo_section',
			[
				'label' 	=> __( 'Client Logo', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $repeater = new Repeater();

		$repeater->add_control(
			'client_logo',
			[
				'label' 	=> __( 'Client Logo', 'mixlax' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' => [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'logo_link',
			[
				'label' 		=> __( 'Link', 'mixlax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'mixlax' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);


		$this->add_control(
			'logos',
			[
				'label' 		=> __( 'Client Logos', 'mixlax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'client_logo' => Utils::get_placeholder_image_src(),
					],
					[
						'client_logo' => Utils::get_placeholder_image_src(),
					],
					[
						'client_logo' => Utils::get_placeholder_image_src(),
					],
					[
						'client_logo' => Utils::get_placeholder_image_src(),
					],
					[
						'client_logo' => Utils::get_placeholder_image_src(),
					],
				]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'slider_control_section',
			[
				'label' 		=> __( 'Slider Control', 'mixlax' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'desktop_items',
			[
				'label' 		=> __( 'Items To Show', 'mixlax' ),
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
				'label' 		=> __( 'Autoplay', 'mixlax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'mixlax' ),
				'label_off' 	=> __( 'No', 'mixlax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'wrapper', 'class', 'row vs-carousel text-center' );

        $this->add_render_attribute( 'wrapper', 'data-slide-to-show', $settings['desktop_items']['size'] );

		if( $settings['slider_autoplay'] == 'yes' ) {
			$this->add_render_attribute( 'wrapper', 'data-slick-autoplay', 'true' );
		} else {
			$this->add_render_attribute( 'wrapper', 'data-slick-autoplay', 'false' );
		}


		echo '<!-- Brand Area -->';
		echo '<div class="vs-brand-wrapper vs-brand-layout1">';
		  	echo '<div class="container-fluid">';
		    	echo '<div '.$this->get_render_attribute_string('wrapper').'>';
					foreach( $settings['logos'] as $singlelogo ) {
					  	if( ! empty( $singlelogo['logo_link']['url'] ) ) {
						  	$url = $singlelogo['logo_link']['url'];
					  	} else {
						  	$url = '';
					  	}

					  	if( ! empty( $singlelogo['logo_link']['nofollow'] ) ) {
						  	$nofollow = ' rel="nofollow"';
					  	} else {
						  $nofollow = '';
					  	}

					  	if( !empty( $singlelogo['logo_link']['is_external'] ) ) {
						  $target = ' target="_blank"';
					  	} else {
						  $target = '';
					  	}
					  	echo '<div class="col-xl-3">';
							echo '<!-- Single Partner -->';
								echo '<a href="'.esc_url( $url ).'" '.wp_kses_post( $nofollow.$target ).'>';
									echo '<img src="'.esc_url( $singlelogo['client_logo']['url'] ).'" alt="'.esc_attr( wellnez_image_alt( $singlelogo['client_logo']['url']) ).'">';
								echo '</a>';
							echo '<!-- End Single Partner -->';
				      	echo '</div>';
					}

		    	echo '</div><!-- .row END -->';
		  	echo '</div><!-- .container END -->';
		echo '</div>';
		echo '<!-- Brand Area end -->';
	}

}