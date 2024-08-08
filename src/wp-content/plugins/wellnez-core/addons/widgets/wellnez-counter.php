<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
/**
 *
 * Counter Widget .
 *
 */
class Wellnez_Counter extends Widget_Base {

	public function get_name() {
		return 'wellnezcounter';
	}

	public function get_title() {
		return __( 'Counter', 'wellnez' );
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
				'label' 	=> __( 'Counter', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		
		$this->add_control(
			'counter_style',
			[
				'label' 	=> __( 'Counter Style', 'wellnez' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'wellnez' ),
					'2' 		=> __( 'Style Two', 'wellnez' ),
				],
			]
		);

		$this->add_control(
			'image',
			[
				'label' 	=> __( 'Choose Image', 'wellnez' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
				'condition' => [ 'counter_style' => '1' ]
			]
		);
		
		$this->add_control(
			'counter_icon',
			[
				'label' 	=> __( 'Counter Icon Class', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default'   => __( 'far fa-headset', 'wellnez' ),
				'condition' => [ 'counter_style' => '2' ]
			]
		);
		
		$this->add_control(
			'counter_number',
			[
				'label' 	=> __( 'Counter Number', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default'   => __( '170+', 'wellnez' ),
			]
		);

		$this->add_control(
			'counter_text',
			[
				'label' 	=> __( 'Counter Text', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default'   => __( 'Workers', 'wellnez' ),
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'counter_number_style_section',
			[
				'label' => __( 'Counter Number Style', 'wellnez' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'counter_bg_color',
			[
				'label' 	=> __( 'Counter Bg Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-media__icon' => 'background-color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'counter_number_color',
			[
				'label' 	=> __( 'Counter Number Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-media__number,{{WRAPPER}} .counter-style2 .media-label' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'counter_number_typography',
				'label' 	=> __( 'Counter Number Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .counter-media__number,{{WRAPPER}} .counter-style2 .media-label',
			]
		);

        $this->add_control(
			'counter_text_color',
			[
				'label' 	=> __( 'Counter Number Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-media__title,{{WRAPPER}} .counter-style2 .media-link' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'counter_text_typography',
				'label' 	=> __( 'Counter Text Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .counter-media__title,{{WRAPPER}} .counter-style2 .media-link',
			]
		);

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( $settings['counter_style'] == '1' ){
			echo '<div class="counter-media">';
				if( ! empty( $settings['image']['url'] ) ){
		            echo '<div class="counter-media__icon">';
						echo wellnez_img_tag( array(
							'url'	=> esc_url( $settings['image']['url'] ),
						) );
					echo '</div>';
				}
	            echo '<div class="media-body">';
					if( ! empty( $settings['counter_number'] ) ){
		                echo '<span class="counter-media__number h1">'.esc_html( $settings['counter_number'] ).'</span>';
					}
					if( ! empty( $settings['counter_text'] ) ){
		                echo '<p class="counter-media__title">'.esc_html( $settings['counter_text'] ).'</p>';
					}
	            echo '</div>';
	        echo '</div>';
		}else{
			echo '<div class="counter-style2">';
				if( ! empty( $settings['counter_icon'] ) ){
					echo '<div class="media-icon"><i class="'.esc_html( $settings['counter_icon'] ).'"></i></div>';
				}
				echo '<div class="media-body">';
					if( ! empty( $settings['counter_number'] ) ){
						echo '<span class="media-label">'.esc_html( $settings['counter_number'] ).'</span>';
					}
					if( ! empty( $settings['counter_text'] ) ){
						echo '<p class="media-link">'.esc_html( $settings['counter_text'] ).'</p>';
					}
				echo '</div>';
			echo '</div>';
		}

	}

}