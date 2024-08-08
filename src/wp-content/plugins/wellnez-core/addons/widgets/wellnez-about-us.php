<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
/**
 *
 * About Us Widget .
 *
 */
class Wellnez_About_Us_Widget extends Widget_Base {

	public function get_name() {
		return 'wellnezaboutus';
	}

	public function get_title() {
		return __( 'About Us', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'about_us_section',
			[
				'label'		 	=> __( 'About Us', 'wellnez' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );
        
        $this->add_control(
			'background_image',
			[
				'label' 		=> __( 'Background Image', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
        
        $this->add_control(
			'left_side_image',
			[
				'label' 		=> __( 'Left Side Image', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
        
        $this->add_control(
			'section_title',
			[
				'label' 	=> __( 'Section Title', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'One Of The Best Business Consulting Agency...', 'wellnez' )
			]
        );

        $this->add_control(
			'section_subtitle',
			[
				'label' 	=> __( 'Section Subtitle', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Best Company of the year Awarded', 'wellnez' )
			]
        );

		$this->add_control(
			'section_description',
			[
				'label' 	=> __( 'Section Description', 'wellnez' ),
                'type' 		=> Controls_Manager::WYSIWYG,
                'default'  	=> __( 'Section Description', 'wellnez' )
			]
        );
        
        $this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Button Text', 'wellnez' )
			]
        );
        
        $this->add_control(
			'button_link',
			[
				'label' 		=> __( 'Link', 'wellnez' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'wellnez' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
        
        $this->end_controls_section();

        $this->start_controls_section(
			'about_us_style_section',
			[
				'label' => __( 'About Us Style', 'wellnez' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'section_title_color',
			[
				'label' 	=> __( 'Section Title Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sec-title4' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'section_title!'    => ''
                ]
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_title_typography',
				'label' 	=> __( 'Section Title Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .sec-title4',
                'condition' => [
                    'section_title!'    => ''
                ]
			]
		);

        $this->add_responsive_control(
			'section_title_margin',
			[
				'label' 		=> __( 'Section Title Margin', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .sec-title4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'section_title!'    => ''
                ]
			]
        );

        $this->add_responsive_control(
			'section_title_padding',
			[
				'label' 		=> __( 'Section Title Padding', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .sec-title4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' 	=> [
                    'section_title!'    => ''
                ]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border',
				'label' 	=> __( 'Border', 'wellnez' ),
				'selector' 	=> '{{WRAPPER}} .sec-title4',
				'condition' => [
                    'section_title!'    => ''
                ],
                'separator' => 'after'
			]
		);

		$this->add_control(
			'section_subtitle_color',
			[
				'label' 		=> __( 'Section Subtitle Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .sec-subtitle2' => 'color: {{VALUE}}',
                ],
                'condition' 	=> [
                    'section_subtitle!'    => ''
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_subtitle_typography',
				'label' 	=> __( 'Section Subtitle Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .sec-subtitle2',
                'condition' => [
                    'section_subtitle!'    => ''
                ],
			]
        );

        $this->add_responsive_control(
			'section_subtitle_margin',
			[
				'label' 		=> __( 'Section Subtitle Margin', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .sec-subtitle2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'section_subtitle!'    => ''
                ],
			]
        );
		
        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
        
        $this->add_render_attribute( 'button','class', 'vs-btn style7');

        if( ! empty( $settings['button_link']['url'] ) ) {
            $this->add_render_attribute( 'button', 'href', esc_url( $settings['button_link']['url'] ) );
        }

        if( ! empty( $settings['button_link']['nofollow'] ) ) {
            $this->add_render_attribute( 'button', 'rel', 'nofollow' );
        }

        if( ! empty( $settings['button_link']['is_external'] ) ) {
            $this->add_render_attribute( 'button', 'target', '_blank' );
        }
        
        echo '<section class="about-wrap2 position-relative space-top">';
            if( ! empty( $settings['background_image']['url'] ) ){
                echo '<div class="about-shape2" data-bg-src="'.esc_url( $settings['background_image']['url'] ).'"></div>';
            }
            echo '<div class="container container-style2">';
                echo '<div class="row align-items-center">';
                    if( ! empty( $settings['left_side_image']['url'] ) ){
                        echo '<div class="col-lg-6 col-xxl-auto mb-40 mb-lg-0">';
                            echo wellnez_img_tag( array(
                                'url'   => esc_url( $settings['left_side_image']['url'] )
                            ) );
                        echo '</div>';
                    }
                    echo '<div class="col-lg-6 col-xxl-auto">';
                        echo '<div class="about-box3">';
                            if( ! empty( $settings['section_subtitle'] ) ){
                                echo '<span class="sec-subtitle2"><i class="fal fa-arrow-right"></i>'.esc_html(  $settings['section_subtitle'] ).'</span>';
                            }
                            if( ! empty( $settings['section_title'] ) ){
                                echo '<h2 class="sec-title4">'.esc_html(  $settings['section_title'] ).'</h2>';
                            }
                            if( ! empty( $settings['section_description'] ) ){
                                echo '<div class="list-style4">';
                                    echo wp_kses_post( $settings['section_description'] );
                                echo '</div>';
                            }
                            if( ! empty( $settings['button_text'] ) ) {
                                echo '<a '.$this->get_render_attribute_string('button').'>';
                					echo esc_html( $settings['button_text'] );
                					echo '<i class="fal fa-long-arrow-right"></i>';
                				echo '</a>';
                            }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</section>';
	}
}