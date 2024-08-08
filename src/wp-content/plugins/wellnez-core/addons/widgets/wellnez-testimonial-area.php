<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Background;
/**
 *
 * Testimonial Area Widget .
 *
 */
class Wellnez_Testimonial_Area extends Widget_Base{

	public function get_name() {
		return 'wellneztestimonialarea';
	}

	public function get_title() {
		return __( 'Testimonial Area', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'testimonial_slider_section',
			[
				'label' 	=> __( 'Testimonial Area', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);
        
        $this->add_control(
            'fade_bg_text', [
                'label' 		=> __( 'Fade Bg Text', 'wellnez' ),
                'type' 			=> Controls_Manager::TEXTAREA,
                'default' 		=> __( 'Clients' , 'wellnez' ),
                'label_block' 	=> true,
            ]
        );
        
        $this->add_control(
            'fade_bg_text_two', [
                'label' 		=> __( 'Fade Bg Text Two', 'wellnez' ),
                'type' 			=> Controls_Manager::TEXTAREA,
                'default' 		=> __( 'Feedback' , 'wellnez' ),
                'label_block' 	=> true,
            ]
        );
        
		$this->add_control(
			'subtitle', [
				'label' 		=> __( 'Section Subtitle', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Customer Testimonial' , 'wellnez' ),
				'label_block' 	=> true,
			]
        );
        
		$this->add_control(
			'title', [
				'label' 		=> __( 'Section Title', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'What People’s Say' , 'wellnez' ),
				'label_block' 	=> true,
			]
        );
        
		$this->add_control(
			'description', [
				'label' 		=> __( 'Section Description', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Section Description' , 'wellnez' ),
				'label_block' 	=> true,
			]
        );
        
		$this->add_control(
			'button_text', [
				'label' 		=> __( 'Button Text', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'View All Reviews' , 'wellnez' ),
				'label_block' 	=> true,
			]
        );
        
		$this->add_control(
			'button_url', [
				'label' 		=> __( 'Button Url', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '#' , 'wellnez' ),
				'label_block' 	=> true,
			]
        );
        
        $this->add_control(
			'brand_title', [
				'label' 		=> __( 'Brand Title', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Our Brands' , 'wellnez' ),
				'label_block' 	=> true,
			]
        );
        
        $brand_repeater = new Repeater();

		$brand_repeater->add_control(
			'brand_image',
			[
				'label' 		=> __( 'Brand Image', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
        
        $this->add_control(
			'brand_slides',
			[
				'label' 		=> __( 'Slides', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $brand_repeater->get_controls(),
				'default' 		=> [
					[
						'brand_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'brand_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'brand_image' 		=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> __( 'Brand Image', 'wellnez' ),
			]
        );
        
		$repeater = new Repeater();

		$repeater->add_control(
			'client_image',
			[
				'label' 		=> __( 'Client Image', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'client_name', [
				'label' 		=> __( 'Client Name', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Rubaida Kanom' , 'wellnez' ),
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'client_designation', [
				'label' 		=> __( 'Client Designation', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Chef Leader' , 'wellnez' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'client_feedback_title', [
				'label' 		=> __( 'Client Feedback Title', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'From its medieval origins to the digital era, learn everything about passage' , 'wellnez' ),
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Slides', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'client_name' 				=> __( 'William Benjamin', 'wellnez' ),
						'client_feedback_title' 	=> __( '“Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. “Its not Latin, though it looks like it, and it says”', 'wellnez' ),
						'client_image' 				=> Utils::get_placeholder_image_src(),
					],
					[
						'client_name' 				=> __( 'David Smith', 'wellnez' ),
						'client_feedback_title' 	=> __( '“Globally e-enable installed base potentialities for vertical growth strategies reintermediate”', 'wellnez' ),
						'client_image' 				=> Utils::get_placeholder_image_src(),
					],
					[
						'client_name' 				=> __( 'Adam Helen', 'wellnez' ),
						'client_feedback_title' 	=> __( '“From its medieval origins to the digital era, learn everything there is to know about the ubiquitous lorem ipsum passage”', 'wellnez' ),
						'client_image' 				=> Utils::get_placeholder_image_src(),
					],
					[
						'client_name' 				=> __( 'Soily Kamens', 'wellnez' ),
						'client_feedback_title' 	=> __( '“Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previ ewing layouts and visua', 'wellnez' ),
						'client_image' 				=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{{ client_name }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'testimonial_general',
			[
				'label' 	=> __( 'General', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        
        $this->add_control(
			'section_bg_image',
			[
				'label' 		=> __( 'Section Bg Image', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'author_box_bg_color',
			[
				'label' 		=> __( 'Author Box Background Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style3' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'testimonial_rating_color',
			[
				'label' 		=> __( 'Testimonial Star Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style3 .testi-rating i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
			'testimonial_slider_client_name_style_section',
			[
				'label' 	=> __( 'Client Name', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'testimonial_slider_client_name_color',
			[
				'label' 		=> __( 'Client Name Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style3 .testi-name' => 'color: {{VALUE}}!important',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'testimonial_slider_client_name_typography',
				'label' 	=> __( 'Client Name Typography', 'wellnez' ),
				'selector' 	=> '{{WRAPPER}} .testi-style3 .testi-name',
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_name_margin',
			[
				'label' 		=> __( 'Client Name Margin', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style3 .testi-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_name_padding',
			[
				'label' 		=> __( 'Client Name Padding', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style3 .testi-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'testimonial_slider_client_feedback_style_section',
			[
				'label' 	=> __( 'Client Feedback', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'testimonial_slider_client_feedback_color',
			[
				'label' 	=> __( 'Client Feedback Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testi-text' => 'color: {{VALUE}} !important',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'testimonial_slider_client_feedback_typography',
				'label' 	=> __( 'Client Feedback Typography', 'wellnez' ),
				'selector' 	=> '{{WRAPPER}} .testi-text',
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_feedback_margin',
			[
				'label' 		=> __( 'Client Feedback Margin', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_feedback_padding',
			[
				'label' 		=> __( 'Client Feedback Padding', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'testimonial_slider_designation_style_section',
			[
				'label' 	=> __( 'Designation', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'testimonial_slider_designation_color',
			[
				'label' 	=> __( 'Client Designation Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testi-style3 .testi-degi' => 'color: {{VALUE}}!important',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'testimonial_slider_designation_typography',
				'label' 	=> __( 'Client Designation Typography', 'wellnez' ),
				'selector' 	=> '{{WRAPPER}} .testi-style3 .testi-degi',
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_designation_margin',
			[
				'label' 		=> __( 'Client Designation Margin', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style3 .testi-degi' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_designation_padding',
			[
				'label' 		=> __( 'Client Designation Padding', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style3 .testi-degi' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();


	}

	protected function render() {

		$settings = $this->get_settings_for_display();

        echo '<section class="test-wrap1">';
            if( ! empty( $settings['section_bg_image']['url'] ) ){
                echo '<div class="testi-shape1" data-bg-src="'.esc_url( $settings['section_bg_image']['url'] ).'"></div>';
            }
            echo '<div class="testi-shape2"></div>';
            echo '<div class="container">';
                echo '<div class="row ">';
                    echo '<div class="col-xl-5 mb-30 text-center text-xl-start mb-50 mb-xl-0 wow fadeInUp" data-wow-delay="0.2s">';
                        echo '<div class="title-area mb-4 pb-4 position-relative">';
                            if( ! empty( $settings['fade_bg_text'] ) ){
                                echo '<span class="sec-big-text">'.esc_html( $settings['fade_bg_text'] ).'</span>';
                            }
                            if( ! empty( $settings['subtitle'] ) ){
                                echo '<span class="sec-subtitle2 mb-3 pb-1"><i class="fal fa-arrow-right"></i>'.esc_html( $settings['subtitle'] ).'</span>';
                            }
                            if( ! empty( $settings['title'] ) ){
                                echo '<h2 class="sec-title3 h1">'.esc_html( $settings['title'] ).'</h2>';
                            }
                            if( ! empty( $settings['description'] ) ){
                                echo '<p class="mb-4 pb-2">'.esc_html( $settings['description'] ).'</p>';
                            }
                            if( ! empty( $settings['button_text'] ) ){
                                echo '<a href="'.esc_url( $settings['button_url'] ).'" class="vs-btn style7">'.esc_html( $settings['button_text'] ).'<i class="fal fa-long-arrow-right"></i></a>';
                            }
                        echo '</div>';
                        if( ! empty( $settings['brand_title'] ) ){
                            echo '<h3 class="border-title h5">'.esc_html( $settings['brand_title'] ).'</h3>';
                        }
                        echo '<div class="border-title-border"></div>';
                        if( ! empty( $settings['brand_slides'] ) ){
                            echo '<div class="vs-carousel" id="brandslide1" data-slide-show="3" data-lg-slide-show="4" data-md-slide-show="3" data-sm-slide-show="2">';
                                foreach( $settings['brand_slides'] as $singleslide ){
                                    if( ! empty( $singleslide['brand_image']['url'] ) ){
                                        echo '<div class="vs-brand1">';
                                            echo wellnez_img_tag( array(
                                                'url'      => esc_url( $singleslide['brand_image']['url'] )
                                            ) );
                                        echo '</div>';
                                    }
                                }
                            echo '</div>';
                        }
                        echo '<div class="brand-slide-nav">';
                            echo '<button data-slick-prev="#brandslide1"><i class="fal fa-long-arrow-left"></i>'.esc_html__( 'Prev', 'wellnez' ).'</button>';
                            echo '<button data-slick-next="#brandslide1">'.esc_html__( 'Next', 'wellnez' ).'<i class="fal fa-long-arrow-right"></i></button>';
                        echo '</div>';
                    echo '</div>';
                    if( ! empty( $settings['slides'] ) ){
                        echo '<div class="col-xl-6 offset-xxl-1">';
                            echo '<div class="testi-inner1">';
                                echo '<div class="row align-items-end">';
                                    foreach( $settings['slides'] as $singleslide ){
                                        echo '<div class="col-md-6">';
                                            echo '<div class="testi-style3">';
                                                echo '<div class="testi-author">';
                                                    if( ! empty( $singleslide['client_image']['url'] ) ){
                                                        echo '<div class="author-img">';
                                                            echo wellnez_img_tag( array(
                                                                'url'      => esc_url( $singleslide['client_image']['url'] )
                                                            ) );
                                                        echo '</div>';
                                                    }
                                                    echo '<div class="media-body">';
                                                        if( ! empty( $singleslide['client_name'] ) ){
                                                            echo '<h3 class="testi-name">'.esc_html( $singleslide['client_name'] ).'</h3>';
                                                        }
                                                        if( ! empty( $singleslide['client_designation'] ) ){
                                                            echo '<div class="testi-degi">'.esc_html( $singleslide['client_designation'] ).'</div>';
                                                        }
                                                    echo '</div>';
                                                echo '</div>';
                                                if( ! empty( $singleslide['client_feedback_title'] ) ){
                                                    echo '<p class="testi-text">'.esc_html( $singleslide['client_feedback_title'] ).'</p>';
                                                }
                                                echo '<div class="testi-rating">'.esc_html__( 'Rating', 'wellnez' ).'<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>';
                                            echo '</div>';
                                        echo '</div>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                echo '</div>';
            echo '</div>';
            if( ! empty( $settings['fade_bg_text_two'] ) ){
                echo '<span class="sec-big-text2">'.esc_html( $settings['fade_bg_text_two'] ).'</span>';
            }
        echo '</section>';
	}
}