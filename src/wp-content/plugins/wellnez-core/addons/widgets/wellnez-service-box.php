<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Background;
/**
 *
 * Service Box Widget .
 *
 */
class Wellnez_Service_Box extends Widget_Base {

	public function get_name() {
		return 'wellnezservicebox';
	}

	public function get_title() {
		return __( 'Service Box', 'wellnez' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'wellnez' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'counter_section',
			[
				'label' 	=> __( 'Service Box', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'service_style',
			[
				'label' 	=> __( 'Service Style', 'wellnez' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'wellnez' ),
					'2' 		=> __( 'Style Two', 'wellnez' ),
					'3' 		=> __( 'Style Three', 'wellnez' ),
					'4' 		=> __( 'Style Four', 'wellnez' ),
				],
			]
		);

		$this->add_control(
			'service_image',
			[
				'label' 	=> esc_html__( 'Service Image', 'wellnez' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'service_bg_image',
			[
				'label' 	=> esc_html__( 'Service Bg Image', 'wellnez' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'	=> [ 'service_style' => ['2','3','4'] ]
			]
		);

		$this->add_control(
			'service_numbering',
			[
				'label' 	=> __( 'Service Number', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default'   => __( '01', 'wellnez' ),
				'condition'	=> [ 'service_style' => '2' ]
			]
		);

		$this->add_control(
			'service_title',
			[
				'label' 	=> __( 'Service Title', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default'   => __( 'Development Services', 'wellnez' ),
			]
		);

		$this->add_control(
			'service_url',
			[
				'label' 	=> __( 'Service Url', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default'   => __( '#', 'wellnez' ),
			]
		);

		$this->add_control(
			'service_description',
			[
				'label' 	=> __( 'Service Description', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default'   => __( 'Completely implement via highly efficient process improvements. engage high value before progressive data.', 'wellnez' ),
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default'   => __( 'Read More', 'wellnez' ),
			]
		);

		$this->add_responsive_control(
			'service_align',
			[
				'label' 		=> __( 'Service Alignment', 'wellnez' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'left' 			=> [
						'title' 		=> __( 'Left', 'wellnez' ),
						'icon' 			=> 'eicon-text-align-left',
					],
					'center' 		=> [
						'title' 		=> __( 'Center', 'wellnez' ),
						'icon' 			=> 'eicon-text-align-center',
					],
						'right' 	=> [
						'title' 		=> __( 'Right', 'wellnez' ),
						'icon' 			=> 'eicon-text-align-right',
					],
				],
				'default' 		=> 'left',
				'toggle' 		=> true,
				'selectors' 	=> [
					'{{WRAPPER}} .service-align-wrapper' => 'text-align: {{VALUE}}',
                ],
			]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'service_style_section',
			[
				'label' => __( 'Service Box Number Style', 'wellnez' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' 		=> 'background',
				'label' 	=> __( 'Background', 'wellnez' ),
				'types' 	=> [ 'classic', 'gradient', 'video' ],
				'selector' 	=> '{{WRAPPER}} .feature-style1,{{WRAPPER}} .service-style2 .service-content,{{WRAPPER}} .service-style1',
			]
		);

        $this->add_control(
			'service_title_color',
			[
				'label' 	=> __( 'Service Title Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature-style1 .feature-title a,{{WRAPPER}} .service-style2 .service-title a,{{WRAPPER}} .service-style1 .service-title a' => 'color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'service_title_typography',
				'label' 	=> __( 'Service Title Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .feature-style1 .feature-title a,{{WRAPPER}} .service-style2 .service-title a,{{WRAPPER}} .service-style1 .service-title a',
			]
		);

        $this->add_control(
			'service_desc_color',
			[
				'label' 	=> __( 'Service Desc Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature-style1 .feature-text,{{WRAPPER}} .service-style2 .service-text,{{WRAPPER}} .service-style1 .service-text' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'service_text_typography',
				'label' 	=> __( 'Service Box Text Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .feature-style1 .feature-text,{{WRAPPER}} .service-style2 .service-text,{{WRAPPER}} .service-style1 .service-text',
			]
		);

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( $settings['service_style'] == '1' ){
			echo '<div class="feature-style1 service-align-wrapper">';
				if( ! empty( $settings['service_image']['url'] ) ){
					echo '<div class="feature-icon">';
						echo wellnez_img_tag( array(
							'url'	=> esc_url( $settings['service_image']['url'] )
						) );
					echo '</div>';
				}
				if( ! empty( $settings['service_title'] ) ){
					echo '<h3 class="feature-title h5">';
						echo '<a class="text-inherit" href="'.esc_url( $settings['service_url'] ).'">'.esc_html( $settings['service_title'] ).'</a>';
					echo '</h3>';
				}
				if( ! empty( $settings['service_description'] ) ){
					echo '<p class="feature-text">'.esc_html( $settings['service_description'] ).'</p>';
				}
				if( ! empty( $settings['button_text'] ) ){
					echo '<a href="'.esc_url( $settings['service_url'] ).'" class="vs-btn style3">'.esc_html( $settings['button_text'] ).'<i class="far fa-long-arrow-right"></i></a>';
				}
			echo '</div>';
		}elseif( $settings['service_style'] == '2' ){
			echo '<div class="service-style2 service-align-wrapper">';
				echo '<div class="service-img">';
					if( ! empty( $settings['service_numbering'] ) ){
						echo '<span class="service-number">'.esc_html( $settings['service_numbering'] ).'</span>';
					}
					if( ! empty( $settings['service_image']['url'] ) ){
						echo wellnez_img_tag( array(
							'url'	=> esc_url( $settings['service_image']['url'] )
						) );
					}
				echo '</div>';
				echo '<div class="service-content">';
					echo '<div class="service-shape" data-bg-src="'.esc_url( $settings['service_bg_image']['url'] ).'"></div>';
					if( ! empty( $settings['service_title'] ) ){
						echo '<h3 class="service-title h5"><a href="'.esc_url( $settings['service_url'] ).'">'.esc_html( $settings['service_title'] ).'</a></h3>';
					}
					if( ! empty( $settings['service_description'] ) ){
						echo '<p class="service-text">'.esc_html( $settings['service_description'] ).'</p>';
					}
					if( ! empty( $settings['button_text'] ) ){
						echo '<a href="'.esc_url( $settings['service_url'] ).'" class="link-btn">'.esc_html( $settings['button_text'] ).'<i class="far fa-arrow-right"></i></a>';
					}
				echo '</div>';
			echo '</div>';
		}else{
			if( $settings['service_style'] == '3' ){
				$class = 'layout2';
			}else{
				$class = '';
			}
			echo '<div class="service-style1 service-align-wrapper '.esc_attr( $class ).'">';
				echo '<div class="service-bg" data-bg-src="'.esc_url( $settings['service_bg_image']['url'] ).'"></div>';
				if( ! empty( $settings['service_image']['url'] ) ){
					echo '<div class="service-icon">';
						echo wellnez_img_tag( array(
							'url'	=> esc_url( $settings['service_image']['url'] )
						) );
					echo '</div>';
				}
				if( ! empty( $settings['service_title'] ) ){
					echo '<h3 class="service-title h5">';
						echo '<a href="'.esc_url( $settings['service_url'] ).'">'.esc_html( $settings['service_title'] ).'</a>';
					echo '</h3>';
				}
				if( ! empty( $settings['service_description'] ) ){
					echo '<p class="service-text">'.esc_html( $settings['service_description'] ).'</p>';
				}
				if( ! empty( $settings['button_text'] ) ){
					echo '<a href="'.esc_url( $settings['service_url'] ).'" class="vs-btn style3">'.esc_html( $settings['button_text'] ).'<i class="far fa-long-arrow-right"></i></a>';
				}
			echo '</div>';
		}
	}
}