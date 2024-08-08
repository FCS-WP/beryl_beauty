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
class Mixlax_Post_Details_Slider extends Widget_Base{

	public function get_name() {
		return 'carvispostdetailsslider';
	}

	public function get_title() {
		return __( 'Post Details Slider', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'post_details_slider_section',
			[
				'label' 	=> __( 'Post Details Slider', 'mixlax' ),
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
			'slider_nav',
			[
				'label' 		=> __( 'Navigation', 'mixlax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'mixlax' ),
				'label_off' 	=> __( 'No', 'mixlax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$this->add_control(
			'slider_loop',
			[
				'label' 		=> __( 'Loop', 'mixlax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'mixlax' ),
				'label_off' 	=> __( 'No', 'mixlax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

        $this->end_controls_section();
        
        $this->start_controls_section(
			'slider_nav_style_section',
			[
				'label' 	=> __( 'Navigation', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        
        $this->add_control(
			'slider_nav_color',
			[
				'label' 		=> __( 'Navigation Icon Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .slick-arrow i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'slider_nav_color_hover',
			[
				'label' 		=> __( 'Navigation Icon Color On Hover', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .slick-arrow:hover i' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'slider_nav_bg_color',
			[
				'label' 		=> __( 'Navigation Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .slick-arrow' => 'background-color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'slider_nav_bg_hover_color',
			[
				'label' 		=> __( 'Navigation Background Hover Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .slick-arrow:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'wrapper', 'class', 'blog-img-slider' );
        
        if( count($settings['slides'] ) > 1 ) {
            $this->add_render_attribute( 'wrapper','class', 'slick-carousel' );
        }

        if( $settings['slider_loop'] == 'yes' ) {
			$this->add_render_attribute( 'wrapper', 'data-slick-infinite', 'true' );
		} else {
			$this->add_render_attribute('wrapper','data-slick-infinite', 'false' );
		}

		if( $settings['slider_autoplay'] == 'yes' ) {
			$this->add_render_attribute( 'wrapper','data-slick-autoplay', 'true' );
		} else {
			$this->add_render_attribute( 'wrapper','data-slick-autoplay', 'false' );
		}

		if( $settings['slider_nav'] == 'yes' ) {
			$this->add_render_attribute( 'wrapper', 'data-slick-arrows', 'true' );
		} else {
			$this->add_render_attribute( 'wrapper', 'data-slick-arrows', 'false' );
        }
        

        echo '<!-- Post Details Slider -->';
        echo '<div '.$this->get_render_attribute_string('wrapper').'>';
            foreach( $settings['slides'] as $singleslide) {
                if( !empty( $singleslide['post_image']['url'] ) ) {
					echo wellnez_img_tag( array(
						'url'	=> esc_url( $singleslide['post_image']['url'] ),
					) );
                }
            }
        echo '</div>';
        echo '<!-- End Post Details Slider -->';
	}

}