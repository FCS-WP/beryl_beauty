<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
/**
 * 
 * FAQ Widget .
 *
 */
class Mixlax_Video extends Widget_Base {

	public function get_name() {
		return 'mixlaxvideo';
	}

	public function get_title() {
		return __( 'Video', 'mixlax' );
	}


	public function get_icon() {
		return 'fa fa-code';
    }
    

	public function get_categories() {
		return [ 'mixlax' ];
	}

	
	protected function _register_controls() {

		$this->start_controls_section(
			'video_section',
			[
				'label' 	=> __( 'Video', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		
		$this->add_control(
			'video_style',
			[
				'label' 		=> __( 'Video Style', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options' 		=> [
					'one'  			=> __( 'Style One', 'mixlax' ),
					'd-flex' 		=> __( 'Style Two', 'mixlax' ),
					'three' 		=> __( 'Style Three', 'mixlax' ),
				],
			]
		);
		
		$this->add_control(
			'image',
			[
				'label' 		=> __( 'Set Video Background Image', 'mixlax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'video_url',
			[
				'label' 		=> __( 'Video Url', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
			]
		);
		
		$this->add_control(
			'video_button_text',
			[
				'label' 		=> __( 'Video Button Text', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'condition'		=> [ 'video_style!' => 'three' ]
			]
		);
		
		$this->add_control(
			'video_title',
			[
				'label' 		=> __( 'Video Title', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'condition'		=> [ 'video_style' => 'three' ]
			]
		);
		
        $this->end_controls_section();
		
		$this->start_controls_section(
			'video_button_style',
			[
				'label' 	=> __( 'Button Style', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'width',
			[
				'label' 		=> __( 'Icon Width', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' 	=> 0,
						'max' 	=> 1000,
						'step' 	=> 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .video-btn' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'height',
			[
				'label' 		=> __( 'Icon Height', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' 	=> 0,
						'max' 	=> 1000,
						'step' 	=> 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .video-btn' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'line_height',
			[
				'label' 		=> __( 'Icon Line Height', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' 	=> 0,
						'max' 	=> 1000,
						'step' 	=> 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .video-btn' => 'line-height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'font-size',
			[
				'label' 		=> __( 'Icon Font Size', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' 	=> 0,
						'max' 	=> 1000,
						'step' 	=> 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .video-btn' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Button Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-video-box .box-btn a.text' => 'color: {{VALUE}}!important',
				],
			]
		);
		$this->add_control(
			'button_hover_color',
			[
				'label' 		=> __( 'Button Hover Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-video-box .box-btn a.text:hover' => 'color: {{VALUE}}!important',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'button_typography',
				'label' 		=> __( 'Button Typography', 'mixlax' ),
				'selector' 		=> '{{WRAPPER}} .service-video-box .box-btn a.text',
			]
		);
		$this->add_control(
			'margin',
			[
				'label' 		=> __( 'Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units'	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-video-box .box-btn a.text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'padding',
			[
				'label' 		=> __( 'Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units'	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-video-box .box-btn a.text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_max_width',
			[
				'label' 		=> __( 'Button Max Width', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' 	=> 0,
						'max' 	=> 1000,
						'step' 	=> 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 200,
				],
				'selectors' => [
					'{{WRAPPER}} .service-video-box .box-btn a.text' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		
		if( $settings['video_style'] == 'one' || $settings['video_style'] == 'd-flex' ){
			echo '<div class="service-video-box">';
				if( !empty( $settings['image']['url'] ) ){
					echo wellnez_img_tag( array(
						'url'	=> esc_url( $settings['image']['url'] ),
					) );
				}
				echo '<div class="box-btn align-items-center '.esc_attr( $settings['video_style'] ).'">';
		  			if( !empty( $settings['video_url'] ) ){
						echo '<!-- Video Button -->';
				         	echo '<a data-fancybox href="'.esc_url( $settings['video_url'] ).'" class="video-btn">';
					            echo '<span class="btn-text"><i class="fal fa-play"></i></span>';
					            echo '<span class="ripple ripple-1"></span>';
					            echo '<span class="ripple ripple-2"></span>';
					            echo '<span class="ripple ripple-3"></span>';
				          	echo '</a>';
					  	echo '<!-- End Video Button -->';
						echo '<a data-fancybox href="'.esc_url( $settings['video_url'] ).'" class="text">'.esc_html( $settings['video_button_text'] ).'</a>';
					}
				echo '</div>';
			echo '</div>';
		}else{
			echo '<div class="about-img-box6">';
				if( ! empty( $settings['video_title'] ) ){
		            echo '<h2 class="image-title h1">'.wp_kses_post( $settings['video_title'] ).'</h2>';
				}
				echo '<a data-fancybox href="'.esc_url( $settings['video_url'] ).'" class="video-btn ripple-wrap">';
				   echo '<span class="btn-text"><i class="fal fa-play"></i></span>';
				   echo '<span class="ripple ripple-1"></span>';
				   echo '<span class="ripple ripple-2"></span>';
				   echo '<span class="ripple ripple-3"></span>';
			    echo '</a>';
			    if( !empty( $settings['image']['url'] ) ){
				   echo wellnez_img_tag( array(
					   'url'	=> esc_url( $settings['image']['url'] ),
					   'class'	=> 'w-100',
				   ) );
			    }
	        echo '</div>';
		}
	}

}