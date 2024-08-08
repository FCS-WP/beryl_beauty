<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * Insta Feed Widget .
 *
 */
class Mixlax_Instafeed extends Widget_Base {

	public function get_name() {
		return 'mixlaxinstafeed';
	}

	public function get_title() {
		return __( 'Instagram Slider', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'instafeed_section',
			[
				'label' => __( 'Instagram Slider', 'mixlax' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

		$repeater = new Repeater();

		$repeater->add_control(
			'image',
			[
				'label' 	=> __( 'Image', 'mixlax' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' => [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'image_link',
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
				'label' 		=> __( 'Images', 'mixlax' ),
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
				'label' => __( 'Slider Control', 'mixlax' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'slider_autoplay',
			[
				'label' => __( 'Autoplay', 'mixlax' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'mixlax' ),
				'label_off' => __( 'No', 'mixlax' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Style', 'mixlax' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'overlay_color',
			[
				'label' => __( 'Overlay Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gallery-layout1 .gallery-item:before' => 'background-color: {{VALUE}}',
                ],

			]
        );

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('wrapper','class','row gx-0 gallery-slider1-active wow fadeInUp');

		if( $settings['slider_autoplay'] == 'yes' ) {
			$this->add_render_attribute('wrapper','data-owl-autoplay','true');
		} else {
			$this->add_render_attribute('wrapper','data-owl-autoplay','false');
		}

		echo '<div class="gallery-area-wrapper  gallery-layout1">';
			echo '<div class="container-fluid px-0">';
                echo '<!-- Instafeed -->';
                echo '<div '.$this->get_render_attribute_string('wrapper').'>';
                    foreach( $settings['logos'] as $singlefeed ) {
						if( !empty( $singlefeed['image_link']['url'] ) ) {
						  	$url = $singlefeed['image_link']['url'];
					  	} else {
						  	$url = '';
					  	}

					  	if( !empty( $singlefeed['image_link']['nofollow'] ) ) {
						  	$nofollow = ' rel="nofollow"';
					  	} else {
						  $nofollow = '';
					  	}

					  	if( !empty( $singlefeed['image_link']['is_external'] ) ) {
						  $target = ' target="_blank"';
					  	} else {
						  $target = '';
					  	}
						echo '<div class="col-xl-3">';
							echo '<div class="gallery-item">';
		                        echo '<!-- Single Feed -->';
		                        echo '<a '.wp_kses_post( $nofollow.$target ).' href="'.esc_url( $url ).'" class="link"><i class="fab fa-instagram"></i>';
								echo '</a>';
								echo wellnez_img_tag( array(
									'url'	=> esc_url( $singlefeed['image']['url'] ),
								) );
		                        echo '<!-- End Single Feed -->';
							echo '</div>';
						echo '</div>';
                    }
                echo '</div>';
                echo '<!-- End Instrafeed -->';
			echo '</div>';
		echo '</div>';
	}

}