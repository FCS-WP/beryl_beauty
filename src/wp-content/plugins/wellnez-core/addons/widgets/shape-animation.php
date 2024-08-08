<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
/**
 *
 * Image Widget .
 *
 */
class Wellnez_Animation_Image extends Widget_Base {

	public function get_name() {
		return 'wellnezanimationimage';
	}

	public function get_title() {
		return __( 'Animation Image', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'image_section',
			[
				'label'     => __( 'Animation Image', 'wellnez' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'image',
			[
				'label'     => __( 'Choose Image', 'wellnez' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
			'image_position',
			[
				'label'         => __( 'Image Position', 'wellnez' ),
				'type'          => Controls_Manager::SELECT,
				'default'       => 'shape1',
				'options'       => [
					'shape1'            => __( 'Position One', 'wellnez' ),
					'shape2'            => __( 'Position Two', 'wellnez' ),
				],
			]
		);

      $this->add_control(
			'animation_type',
			[
				'label'         => __( 'Animation Type', 'wellnez' ),
				'type'          => Controls_Manager::SELECT,
				'default'       => 'jump',
				'options'       => [
					'jump'            => __( 'Jump', 'wellnez' ),
					'jump-reverse-img'    => __( 'Top And Bottom', 'wellnez' ),
				],
			]
		);

		$this->add_control(
			'left_position',
			[
				'label' 		=> __( 'Left Position', 'wellnez' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px', '%' ],
				'range' 		=> [
					'px' => [
						'min' 	=> -1000,
						'max' 	=> 1000,
						'step' 	=> 5,
					],
					'%' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .shape1,{{WRAPPER}} .shape2' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'right_position',
			[
				'label' 		=> __( 'Right Position', 'wellnez' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px', '%' ],
				'range' 		=> [
					'px' => [
						'min' 	=> -1000,
						'max' 	=> 1000,
						'step' 	=> 5,
					],
					'%' => [
						'min' => -100,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .shape1,{{WRAPPER}} .shape2' => 'right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'top_position',
			[
				'label' 		=> __( 'Top Position', 'wellnez' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px', '%' ],
				'range' 		=> [
					'px' => [
						'min' 	=> -1000,
						'max' 	=> 1000,
						'step' 	=> 5,
					],
					'%' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .shape1,{{WRAPPER}} .shape2' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'bottom_position',
			[
				'label' 		=> __( 'Bottom Position', 'wellnez' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px', '%' ],
				'range' 		=> [
					'px' => [
						'min' 	=> -1000,
						'max' 	=> 1000,
						'step' 	=> 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .shape1,{{WRAPPER}} .shape2' => 'bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();


	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'wrapper', 'class', $settings['image_position'] );
        $this->add_render_attribute( 'wrapper', 'class', $settings['animation_type'] );
        $this->add_render_attribute( 'wrapper', 'class', 'shape-mockup d-none d-xl-inline-block' );

        if( ! empty( $settings['image']['url'] ) ) {
			// echo '<div class="">h</div>';
            echo '<div '.$this->get_render_attribute_string( 'wrapper' ).'>';
                echo wellnez_img_tag( array(
                    'url'   => esc_url( $settings['image']['url'] ),
                ) );
            echo '</div>';
        }
	}

}
