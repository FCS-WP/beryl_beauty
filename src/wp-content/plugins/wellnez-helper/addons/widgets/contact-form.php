<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
/**
 * 
 * Contact Form Widget .
 *
 */
class Mixlax_Contact_Form extends Widget_Base {

	public function get_name() {
		return 'mixlaxcontactform';
	}

	public function get_title() {
		return __( 'Contact Form', 'mixlax' );
	}


	public function get_icon() {
		return 'fa fa-code';
    }
    

	public function get_categories() {
		return [ 'mixlax' ];
	}

	
	protected function _register_controls() {

		$this->start_controls_section(
			'form_section',
			[
				'label' => __( 'Contact Form', 'mixlax' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
        
		$this->add_control(
			'form_style',
			[
				'label' 	=> __( 'Form Style', 'mixlax' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'one',
				'options' 	=> [
					'one'  		=> __( 'Style One', 'mixlax' ),
					'two' 		=> __( 'Style Two', 'mixlax' ),
					'three' 	=> __( 'Style Three', 'mixlax' ),
					'four' 		=> __( 'Style Four', 'mixlax' ),
				],
			]
		);
		$this->add_control(
			'enable_notice',
			[
				'label' 		=> __( 'Enable Notice Section?', 'mixlax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'mixlax' ),
				'label_off' 	=> __( 'Hide', 'mixlax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'     => [ 'form_style' => 'one' ],
			]
		);
		$this->add_control(
			'notice_title',
			[
				'label' 	=> __( 'Notice Title', 'mixlax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Title', 'mixlax' ),
				'condition' => [ 'form_style' => 'one' ],
			]
        );
        $this->add_control(
			'section_title',
			[
				'label' 	=> __( 'Title', 'mixlax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Title', 'mixlax' ),
				'condition' => [ 'form_style' => [ 'one','three' ] ],
			]
        );
        $this->add_control(
			'section_description',
			[
				'label' 	=> __( 'Section Description', 'mixlax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Write Description', 'mixlax' ),
				'condition' => [ 'form_style' => [ 'one','three' ] ],
			]
        );

        $this->add_control(
			'contact_form_shortcode',
			[
				'label' => __( 'Form Shortcode', 'mixlax' ),
                'type' => Controls_Manager::TEXTAREA,
			]
        );

        $this->end_controls_section();
		
		$this->start_controls_section(
			'general',
			[
				'label' 	=> __( 'General', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'shape_image_one',
			[
				'label' 	=> __( 'Background Shape Image', 'mixlax' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [ 'form_style' => [ 'one','two' ] ],
			]
		);
		$this->add_control(
			'shape_image_two',
			[
				'label' 	=> __( 'Background Shape Image', 'mixlax' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [ 'form_style' => [ 'one','two' ] ],
			]
		);
		$this->end_controls_section();
		
        $this->start_controls_section(
			'section_title_style',
			[
				'label' 		=> __( 'Section Title', 'mixlax' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
				'condition'     => [ 'form_style' => 'one' ],
			]
        );

        $this->add_control(
			'section_title_color',
			[
				'label' => __( 'Title Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title .title' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'section_title_typography',
				'label' => __( 'Title Typography', 'mixlax' ),
				'selector' => '{{WRAPPER}} .section-title .title',
			]
        );
        
        $this->add_responsive_control(
			'section_title_margin',
			[
				'label' => __( 'Title Margin', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .section-title .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        
        $this->add_responsive_control(
			'section_title_padding',
			[
				'label' => __( 'Title Padding', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .section-title .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'section_description_style',
			[
				'label' 		=> __( 'Section Description', 'mixlax' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
				'condition'     => [ 'form_style' => 'one' ],
			]
        );
		$this->add_control(
			'section_description_color',
			[
				'label' 		=> __( 'Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .section-title p' => 'color: {{VALUE}} !important;',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_description_typography',
				'label' 	=> __( 'Typography', 'mixlax' ),
				'selector'	=> '{{WRAPPER}} .section-title p',
			]
		);
        $this->add_responsive_control(
			'section_description_margin',
			[
				'label' 		=> __( 'Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .section-title p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        
        $this->add_responsive_control(
			'section_description_padding',
			[
				'label' 		=> __( 'Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .section-title p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

        $this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		if( $settings['form_style'] == 'one' ){
			echo '<!-- Contact Form -->';
			echo '<section class="contact-form-wrapper contact-form-layout2 secondary-bg2 pb-130">';
				if( $settings['enable_notice'] == 'yes' ){
					echo '<!-- Form Notice -->';
					echo '<div class="notice">';
						echo '<span class="notice-icon"><i class="fal fa-info-circle"></i></span>';
						if( ! empty( $settings['notice_title'] ) ){
							echo '<p class="notice-text">'.wp_kses_post( $settings['notice_title'] ).'</p>';
						}
					echo '</div>';
				}
				if( ! empty( $settings['shape_image_one']['url'] ) ){
					echo '<!-- Bg shape -->';
					echo '<div class="shape-bg shape1">';
						echo wellnez_img_tag( array(
							'url'	=> esc_url( $settings['shape_image_one']['url'] ),
						) );
					echo '</div>';
				}
				if( ! empty( $settings['shape_image_two']['url'] ) ){
					echo '<!-- Bg shape -->';
					echo '<div class="shape-bg shape2">';
						echo wellnez_img_tag( array(
							'url'	=> esc_url( $settings['shape_image_two']['url'] ),
						) );
					echo '</div>';
				}
				echo '<div class="container pt-130">';
					echo '<div class="row justify-content-center wow fadeInUp" data-wow-delay="0.4s">';
						echo '<div class="col-xl-6 col-lg-8 col-md-10 text-center">';
							echo '<!-- Section Title -->';
							echo '<div class="section-title">';
								if( ! empty( $settings['section_title'] ) ){
									echo '<h2 class="title">'.esc_html( $settings['section_title'] ).'</h2>';
								}
								if( ! empty( $settings['section_description'] ) ){
									echo '<p>'.wp_kses_post( $settings['section_description'] ).'</p>';
								}
							echo '</div>';
						echo '</div>';
						if( ! empty( $settings['contact_form_shortcode'] ) ){
							echo '<!-- form Area -->';
							echo '<div class="col-12">';
								echo '<div class="contact-form-area">';
									echo do_shortcode( $settings['contact_form_shortcode'] );
								echo '</div>';
							echo '</div>';
							echo '<!-- form Area end -->';
						}
					echo '</div><!-- .row END -->';
				echo '</div><!-- .container END -->';
			echo '</section>';
			echo '<!-- Contact Form end -->';
		}elseif( $settings['form_style'] == 'two' ){
			echo '<!-- Appointment Form Area -->';
			echo '<section class="appointment-form-wrapper appointment-form-layout1  pt-130 pb-130">';
				echo '<div class="container">';
					if( ! empty( $settings['contact_form_shortcode'] ) ){
						echo do_shortcode( $settings['contact_form_shortcode'] );
					}
				echo '</div><!-- .container END -->';
				if( ! empty( $settings['shape_image_one']['url'] ) ){
					echo '<!-- Bg shape -->';
					echo '<div class="shape-bg shape1">';
						echo wellnez_img_tag( array(
							'url'	=> esc_url( $settings['shape_image_one']['url'] ),
						) );
					echo '</div>';
				}
				if( ! empty( $settings['shape_image_two']['url'] ) ){
					echo '<!-- Bg shape -->';
					echo '<div class="shape-bg shape2">';
						echo wellnez_img_tag( array(
							'url'	=> esc_url( $settings['shape_image_two']['url'] ),
						) );
					echo '</div>';
				}
			echo '</section>';
			echo '<!-- Appointment Form Area end -->';
		}elseif( $settings['form_style'] == 'three' ){
			echo '<!-- Contact Form -->';
		    echo '<section class="contact-form-wrapper contact-form-layout4 background-image bg-cover " data-img="assets/img/bg-img/contact-form-bg-1.jpg">';
		        echo '<div class="container">';
		            echo '<div class="row flex-row-reverse">';
		                echo '<div class="col-lg-8 col-xl-6">';
							echo '<div class="contact-form">';
								if( ! empty( $settings['section_title'] ) ){
									echo '<h2 class="form-title text-white h3">'.esc_html( $settings['section_title'] ).'</h2>';
								}
								if( ! empty( $settings['section_description'] ) ){
									echo '<p class="form-subtitle text-white">'.wp_kses_post( $settings['section_description'] ).'</p>';
								}
								if( ! empty( $settings['contact_form_shortcode'] ) ){
									echo do_shortcode( $settings['contact_form_shortcode'] );
								}
		                	echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</section>';
		}else{
			echo '<!-- Contact Form -->';
		    echo '<section class="contact-form-wrapper contact-form-layout5">';
				echo '<div class="container">';
					echo '<div class="row">';
						echo '<div class="contact-form">';
							if( ! empty( $settings['contact_form_shortcode'] ) ){
								echo do_shortcode( $settings['contact_form_shortcode'] );
							}
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</section>';
			
		}
	}
}