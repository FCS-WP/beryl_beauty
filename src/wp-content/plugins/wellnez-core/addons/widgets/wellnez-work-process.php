<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
/**
 *
 * Team Widget .
 *
 */
class Wellnez_Work_Process extends Widget_Base {

	public function get_name() {
		return 'wellnezworkprocess';
	}

	public function get_title() {
		return __( 'Work Process', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'process_section',
			[
				'label'     => __( 'Work Process', 'wellnez' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'work_process_style',
			[
				'label' 		=> __( 'Work Process Style', 'wellnez' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  			=> __( 'Style One', 'wellnez' ),
					'2' 			=> __( 'Style Two', 'wellnez' )
				],
			]
		);

		$repeater = new Repeater();

        $repeater->add_control(
			'icon_image',
			[
				'label'     => __( 'Icon Image', 'wellnez' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater->add_control(
			'work_process_image',
			[
				'label'     => __( 'Work Process Image', 'wellnez' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater->add_control(
			'process_number',
            [
				'label'         => __( 'Process Number', 'wellnez' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '01' , 'wellnez' ),
				'label_block'   => true,
			]
		);
        $repeater->add_control(
			'work_title',
            [
				'label'         => __( 'Work Title', 'wellnez' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Medicine Help' , 'wellnez' ),
				'label_block'   => true,
			]
		);
        $repeater->add_control(
			'work_description',
            [
				'label'         => __( 'Work Description', 'wellnez' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Extensible for web iterate process before meta services impact with olisticly enable client.' , 'wellnez' ),
				'label_block'   => true,
			]
		);

		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Work Process', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'icon_image' 	=> Utils::get_placeholder_image_src(),
					],
					[
						'icon_image' 	=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{work_title}}',
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'work_process_style_option',
			[
				'label' 	=> __( 'Work Process Style', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'box_bg_color',
			[
				'label' 		=> __( 'Box Bg Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .process-style1 .process-icon' => 'background-color: {{VALUE}}',
                ]
			]
        );

		$this->add_control(
			'work_process_title_color',
			[
				'label' 		=> __( 'Title Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .process-style1 .process-title' => 'color: {{VALUE}}',
                ]
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'work_process_typography',
				'label'         => __( 'Title Typography', 'wellnez' ),
                'selector'      => '{{WRAPPER}} .process-style1 .process-title',
			]
		);
        $this->add_responsive_control(
			'work_process_margin',
			[
				'label'         => __( 'Title Margin', 'wellnez' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .process-style1 .process-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->add_responsive_control(
			'work_process_padding',
			[
				'label'         => __( 'Title Padding', 'wellnez' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .process-style1 .process-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
				'separator'		=> 'after',
			]
		);
		$this->add_control(
			'description_color',
			[
				'label' 		=> __( 'Description Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .process-text' => 'color: {{VALUE}}',
                ]
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'description_typography',
				'label'         => __( 'Description Typography', 'wellnez' ),
                'selector'      => '{{WRAPPER}} .process-text',
			]
		);
        $this->add_responsive_control(
			'description_margin',
			[
				'label'         => __( 'Description Margin', 'wellnez' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .process-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->add_responsive_control(
			'description_padding',
			[
				'label'         => __( 'Description Padding', 'wellnez' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .process-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);
		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( $settings['work_process_style'] == '1' ){
			$column = 'col-sm-6 col-lg-3 process-style1';
			$row 	= '';
		}else{
			$column = 'col-md-4 col-xl-auto process-style2';
			$row 	= 'justify-content-between';
		}

		if( ! empty( $settings['slides'] ) ){
			echo '<section class="vs-process-wrapper">';
		        echo '<div class="container">';
					echo '<div class="row '.$row .'">';
						foreach( $settings['slides'] as $work_process ){
                            echo '<div class="'.$column.'">';
                                if( ! empty( $work_process['icon_image']['url'] ) ){
                                    echo '<div class="process-arrow">';
                                        echo wellnez_img_tag( array(
                                            'url'   => esc_url( $work_process['icon_image']['url'] ),
                                        ) );
                                    echo '</div>';
                                }
                                echo '<div class="process-icon">';
                                    if( ! empty( $work_process['work_process_image']['url'] ) ){
                                        echo wellnez_img_tag( array(
                                            'url'   => esc_url( $work_process['work_process_image']['url'] ),
                                        ) );
                                    }
                                    if( ! empty( $work_process['process_number'] ) ){
                                        echo '<span class="process-number">'.esc_html( $work_process['process_number'] ).'</span>';
                                    }
                                echo '</div>';
                                if( ! empty( $work_process['work_title'] ) ){
                                    echo '<h3 class="process-title h5">'.esc_html( $work_process['work_title'] ).'</h3>';
                                }
                                if( ! empty( $work_process['work_description'] ) ){
                                    echo '<p class="process-text">'.esc_html( $work_process['work_description'] ).'</p>';
                                }
                            echo '</div>';
						}
		            echo '</div>';
		        echo '</div>';
			echo '</section>';
		}
	}
}