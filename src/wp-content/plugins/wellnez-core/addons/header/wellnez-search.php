<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Header Widget .
 *
 */
class Wellnez_Search extends Widget_Base {

	public function get_name() {
		return 'wellnezsearch';
	}

	public function get_title() {
		return __( 'Search Form', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez_header_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'header_search',
			[
				'label' 	=> __( 'Header Search', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'placeholder_text',
			[
				'label' 		=> __( 'What are you looking for', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default'		=> __( 'Search Here...', 'wellnez' ),
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'search_style',
			[
				'label' 	=> __( 'Style', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'search_color',
			[
				'label' 		=> __( 'Search Icon Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-icons i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label' => esc_html__( 'Size', 'wellnez' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 30,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .header-icons i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'search_background_color',
			[
				'label' 		=> __( 'Search Background Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-icons button.searchBoxTggler' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'search_background_hover_color',
			[
				'label' 		=> __( 'Search Background Hover Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-icons button.searchBoxTggler:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'border_radius',
			[
				'label'         => __( 'Border Radius', 'wellnez' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .header-icons button.searchBoxTggler' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->add_responsive_control(
			'search_padding',
			[
				'label'         => __( 'Padding', 'wellnez' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .header-icons button.searchBoxTggler' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_section();


    }

	protected function render() {

        $settings = $this->get_settings_for_display();

		echo '<div class="header-icons">';
		echo '<button class="searchBoxTggler"><i class="far fa-search"></i></button>';
		echo '</div>';
		

		echo '<div class="popup-search-box">';
			echo '<button class="searchClose"><i class="fal fa-times"></i></button>';
			echo '<form action="'.esc_url( home_url() ).'" class="header-search">';
				echo '<input name="s" type="text" placeholder="'.esc_attr( $settings['placeholder_text'] ).'">';
				echo '<button type="submit" aria-label="search-button"><i class="far fa-search"></i></button>';
			echo '</form>';
		echo '</div>';

	}

}


