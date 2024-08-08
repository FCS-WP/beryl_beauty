<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
/**
 *
 * Counter Up Widget .
 *
 */
class Mixlax_Counterup extends Widget_Base {

	public function get_name() {
		return 'mixlaxcounterup';
	}

	public function get_title() {
		return __( 'Counter Up', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

	public function get_script_depends() {
		return [ 'counter-up' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'counter_section',
			[
				'label' 	=> __( 'Content', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'counter_style',
			[
				'label' 	=> __( 'Counter Style', 'mixlax' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' => [
					'1'  		=> __( 'Style One', 'mixlax' ),
					'2' 		=> __( 'Style Two', 'mixlax' ),
				],
			]
		);

		$this->add_control(
			'counter_icon',
			[
				'label'     => __( 'Counter Icon', 'mixlax' ),
				'type'      => Controls_Manager::TEXTAREA,
				'default' 	=> 'fal fa-users',
				'condition'	=> [ 'counter_style' => '1' ],
			]
		);

		$this->add_control(
			'counter_number',
			[
				'label'     => __( 'Counter Number', 'mixlax' ),
				'type'      => Controls_Manager::TEXTAREA,
				'default' 	=> __( '25', 'mixlax' ),
				'condition'	=> [ 'counter_style' => '1' ],
			]
		);

		$this->add_control(
			'counter_text',
			[
				'label'     => __( 'Counter Text', 'mixlax' ),
				'type'      => Controls_Manager::TEXTAREA,
				'default' 	=> __( 'Years Of Experience', 'mixlax' ),
				'condition'	=> [ 'counter_style' => '1' ],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'counter_number',
			[
				'label'     => __( 'Counter Number', 'mixlax' ),
				'type'      => Controls_Manager::TEXTAREA,
				'default' 	=> __( '25', 'mixlax' ),
			]
		);

		$repeater->add_control(
			'counter_number_suffix',
			[
				'label'     => __( 'Counter Number Suffix', 'mixlax' ),
				'type'      => Controls_Manager::TEXTAREA,
				'default' 	=> __( 'k', 'mixlax' ),
			]
		);

		$repeater->add_control(
			'counter_text',
			[
				'label'     => __( 'Counter Text', 'mixlax' ),
				'type'      => Controls_Manager::TEXTAREA,
				'default' 	=> __( 'Years Of Experience', 'mixlax' ),
			]
		);

		$this->add_control(
			'counter_item',
			[
				'label' 		=> __( 'Counter Item', 'mixlax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'counter_number' 	=> __( '25', 'mixlax' ),
						'counter_text' 		=> __( 'Yr Experience', 'mixlax' ),
					],
					[
						'counter_number' 	=> __( '1', 'mixlax' ),
						'counter_text' 		=> __( 'Active Clients', 'mixlax' ),
					],
					[
						'counter_number' 	=> __( '25', 'mixlax' ),
						'counter_text' 		=> __( 'Cup Coffee', 'mixlax' ),
					],
					[
						'counter_number' 	=> __( '10', 'mixlax' ),
						'counter_text' 		=> __( 'Item Uses', 'mixlax' ),
					],
					[
						'counter_number' 	=> __( '50', 'mixlax' ),
						'counter_text' 		=> __( 'Core Service', 'mixlax' ),
					],
				],
				'title_field' 	=> '{{{ counter_text }}}',
				'condition'		=> [ 'counter_style' => '2' ],
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'counterup_style_section',
			[
				'label' 	=> __( 'Counter Up Style', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'counterup_bg_color',
			[
				'label' 	=> __( 'Background Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .media-style5' => 'background-color: {{VALUE}}',
				],
				'condition'	=> [ 'counter_style' => '1' ],
			]
		);

		$this->add_control(
			'counterup_icon_color',
			[
				'label' 	=> __( 'Icon Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .media-style5 .media-icon' => 'color: {{VALUE}}',
				],
				'condition'	=> [ 'counter_style' => '1' ],
			]
		);

		$this->add_control(
			'counterup_color',
			[
				'label' 		=> __( 'Counter Up Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .media-style5 .counter,{{WRAPPER}} .counter-box2 .counter' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'counterup_typhography',
				'label' 		=> __( 'Counter Up Typography', 'mixlax' ),
				'selector' 		=> '{{WRAPPER}} .media-style5 .counter,{{WRAPPER}} .counter-box2 .counter',
			]
		);

		$this->add_control(
			'counterup_text_color',
			[
				'label' 		=> __( 'Counter Up Text Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .media-style5 .counter-text,{{WRAPPER}} .counter-box2 .counter-text' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'counterup_text_typhography',
				'label' 		=> __( 'Counter Up Text Typography', 'mixlax' ),
				'selector' 		=> '{{WRAPPER}} .media-style5 .counter-text{{WRAPPER}} .counter-box2 .counter-text',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( $settings['counter_style'] == '1' ){
			echo '<div class="media-style5">';
				if( ! empty( $settings['counter_icon'] ) ){
	                echo '<span class="media-icon"><i class="'.esc_attr( $settings['counter_icon'] ).'"></i></span>';
				}
				if( ! empty( $settings['counter_number'] ) ){
	                echo '<span class="counter media-number">'.esc_html( $settings['counter_number'] ).'</span>';
				}
				if( !empty( $settings['counter_text'] ) ){
	                echo '<p class="counter-text media-text">'.wp_kses_post( $settings['counter_text'] ).'</p>';
				}
            echo '</div>';
		}else{
			if( ! empty( $settings['counter_item'] ) ){
				echo '<section class="vs-cta-wrapper vs-cta-layout1">';
					echo '<div class="container">';
						echo '<div class="counter-area d-lg-flex justify-content-lg-between">';
							foreach( $settings['counter_item'] as $counter ){
				                echo '<div class="counter-box2">';
				                    echo '<div class="conter-content">';
										if( ! empty( $counter['counter_number'] ) ){
				                        	echo '<p class="counter-number mb-0 text-font2"><span class="counter">'.esc_html( $counter['counter_number'] ).'</span>';
											if( ! empty( $counter['counter_number_suffix'] ) ){
												echo esc_html( $counter['counter_number_suffix'] );
											}
											echo '</p>';
										}
										if( ! empty( $counter['counter_text'] ) ){
											echo '<p class="counter-text mb-0">'.esc_html( $counter['counter_text'] ).'</p>';
										}
				                    echo '</div>';
				                echo '</div>';
							}
			            echo '</div>';
			        echo '</div>';
			    echo '</section>';
			}
		}


	}

}