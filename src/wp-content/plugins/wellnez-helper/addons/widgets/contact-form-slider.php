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
class Mixlax_Contact_Form_Slider extends Widget_Base{

	public function get_name() {
		return 'mixlaxcontactformslider';
	}

	public function get_title() {
		return __( 'Contact Form Slider', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'contact_form_slider_section',
			[
				'label' 	=> __( 'Contact Form Slider', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'section_title',
			[
				'label' 		=> __( 'Section Title', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
			]
		);
		
		$this->add_control(
			'section_subtitle',
			[
				'label' 		=> __( 'Section Sub Title', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
			]
		);
		
		$this->add_control(
			'contact_form',
			[
				'label' 		=> __( 'Contact Form Shortcode', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
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
			'image',
			[
				'label' 	=> __( 'Slider Bg Image', 'mixlax' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => Utils::get_placeholder_image_src(),
				],
				'selectors' => [
					'{{WRAPPER}} .contact-form-layout1 .contact-form-slider:before' => 'background-image: url({{URL}})',
				],
			]
		);
        $this->end_controls_section();
		
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'wrapper', 'class', 'contact-form-slider contactForm-slide-active' );

		if( $settings['slider_autoplay'] == 'yes' ) {
			$this->add_render_attribute( 'wrapper','data-slick-autoplay', 'true' );
		} else {
			$this->add_render_attribute( 'wrapper','data-slick-autoplay', 'false' );
		}
		
		echo '<!-- Contact Form -->';
		echo '<section class="contact-form-wrapper contact-form-layout1  ">';
			echo '<div class="container">';
				echo '<div class="row justify-content-center wow fadeInUp" data-wow-delay="0.4s">';
					echo '<!-- form Area -->';
					echo '<div class="col-lg-10 col-xl-6">';
						echo '<div class="contact-form-area pt-130 pb-130">';
							echo '<!-- Form Title -->';
							echo '<div class="section-title text-center text-xl-left">';
								if( ! empty( $settings['section_title'] ) ){
									echo '<h2 class="title">'.esc_html( $settings['section_title'] ).'</h2>';
								}
								if( ! empty( $settings['section_subtitle'] ) ){
									echo '<p>'.wp_kses_post( $settings['section_subtitle'] ).'</p>';
								}
							echo '</div>';
							if( !empty( $settings['contact_form'] ) ){
								echo '<!-- Contact Form -->';
									echo do_shortcode( $settings['contact_form'] );
								echo '<!-- Contact Form end -->';
							}
						echo '</div>';
					echo '</div>';
					echo '<!-- form Area end -->';
	
	
					echo '<!-- Contact Form Slider -->';
					echo '<div class="col-md-6">';
						echo '<div '.$this->get_render_attribute_string('wrapper').'>';
							if( !empty( $settings['slides'] ) ){
								foreach( $settings['slides'] as $singleslide) {
									if( !empty( $singleslide['post_image']['url'] ) ) {
										echo '<!-- Single Slide -->';
										echo '<div class="single-slide">';
											echo wellnez_img_tag( array(
												'url'	=> esc_url( $singleslide['post_image']['url'] ),
											) );
										echo '</div>';
									}
								}
							}
						echo '</div>';
					echo '</div>';
					echo '<!-- Contact Form Slider end -->';
				echo '</div><!-- .row END -->';
			echo '</div><!-- .container END -->';
		echo '</section>';
		echo '<!-- Contact Form end -->';
		
	}

}