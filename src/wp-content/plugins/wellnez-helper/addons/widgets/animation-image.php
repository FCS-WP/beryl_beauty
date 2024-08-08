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
class Mixlax_Animation_Image extends Widget_Base {

	public function get_name() {
		return 'mixlaxanimationimage';
	}

	public function get_title() {
		return __( 'Animation Image', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'image_section',
			[
				'label'     => __( 'Animation Image', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'image',
			[
				'label'     => __( 'Choose Image', 'mixlax' ),
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
				'label'         => __( 'Image Position', 'mixlax' ),
				'type'          => Controls_Manager::SELECT,
				'default'       => 'shape1',
				'options'       => [
					'shape1'            => __( 'Position One', 'mixlax' ),
					'shape2'            => __( 'Position Two', 'mixlax' ),
				],
			]
		);

        $this->add_control(
			'animation_type',
			[
				'label'         => __( 'Animation Type', 'mixlax' ),
				'type'          => Controls_Manager::SELECT,
				'default'       => 'ani-moving-x',
				'options'       => [
					'ani-moving-x'            => __( 'Left And Right', 'mixlax' ),
					'ani-moving-y'            => __( 'Top And Bottom', 'mixlax' ),
				],
			]
		);

		$this->add_control(
			'left_position',
			[
				'label' 		=> __( 'Left Position', 'mixlax' ),
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
					'{{WRAPPER}} .shape1,{{WRAPPER}} .shape2' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'bottom_position',
			[
				'label' 		=> __( 'Bottom Position', 'mixlax' ),
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
        $this->add_render_attribute( 'wrapper', 'class', 'position-absolute d-none d-xl-inline-block' );

        if( ! empty( $settings['image']['url'] ) ) {
            echo '<div '.$this->get_render_attribute_string( 'wrapper' ).'>';
                echo wellnez_img_tag( array(
                    'url'   => esc_url( $settings['image']['url'] ),
                ) );
            echo '</div>';
        }
	}

}