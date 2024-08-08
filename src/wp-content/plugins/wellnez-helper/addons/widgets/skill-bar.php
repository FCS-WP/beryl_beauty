<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * Skill Bar Widget .
 *
 */
class Mixlax_Skill_Bar extends Widget_Base {

	public function get_name() {
		return 'mixlaxskillbar';
	}

	public function get_title() {
		return __( 'Skill Bar', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'skill_bar_section',
			[
				'label' 	=> __( 'Skill Bar', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'skill_bar_column',
			[
				'label' 		=> __( 'Skill Bar Column', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '6',
				'options' 		=> [
					'6'  			=> __( '2 Column', 'mixlax' ),
					'4' 			=> __( '3 Column', 'mixlax' ),
					'3' 			=> __( '4 Column', 'mixlax' ),
					'2' 			=> __( '6 Column', 'mixlax' ),
				],
			]
		);

        $repeater = new Repeater();

		$repeater->add_control(
			'skill_bar_text',
			[
				'label' 	=> __( 'Skill Bar Text', 'mixlax' ),
				'type' 		=> Controls_Manager::TEXTAREA,
			]
		);

		$repeater->add_control(
			'progress_bar_width',
			[
				'label' 		=> __( 'Skill Bar Width', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ '%' ],
				'range' 		=> [
					'%' 	=> [
						'min' 	=> 0,
						'max' 	=> 100,
					],
				],
				'default' 	=> [
					'unit' 		=> '%',
					'size' 		=> 70,
				],
			]
		);

		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Skill Bar', 'mixlax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'skill_bar_text' => __( 'Facewash','mixlax' ),
					],
					[
						'skill_bar_text' => __( 'Hair Cut','mixlax' ),
					],
				],
				'title_field' => '{{{ skill_bar_text }}}',
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'skill_bar_style',
			[
				'label' 	=> __( 'Style', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_responsive_control(
			'skill_bar_margin',
			[
				'label'         => __( 'Skill Bar Margin', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .vs-skill-bar1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Title Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-skill-bar1 .bar-head h4,{{WRAPPER}} .vs-skill-bar1 .bar-head span' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'label' 		=> __( 'Title Typography', 'mixlax' ),
				'selector' 		=> '{{WRAPPER}} .vs-skill-bar1 .bar-head h4,{{WRAPPER}} .vs-skill-bar1 .bar-head span',
			]
		);

		$this->add_control(
			'bar_background_color',
			[
				'label' 		=> __( 'Bar Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-skill-bar1 .progress-value' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( ! empty( $settings['slides'] ) ){
			echo '<div class="skill-area">';
				echo '<div class="row gutters-40">';
					foreach ( $settings['slides'] as $progress_bar ) {
						echo '<div class="col-lg-'.esc_attr( $settings['skill_bar_column'] ).' col-md-6">';
	                        echo '<div class="vs-skill-bar1 mb-35">';
	                            echo '<div class="bar-head d-flex justify-content-between">';
									if( ! empty( $progress_bar['skill_bar_text'] ) ){
	                                	echo '<h4 class="text-md mb-2">'.esc_html( $progress_bar['skill_bar_text'] ).'</h4>';
									}
									if( ! empty( $progress_bar['progress_bar_width']['size'] ) ){
		                                echo '<span class="text-md text-font2">'.esc_html( $progress_bar['progress_bar_width']['size'] ).'%</span>';
									}
	                            echo '</div>';
								if( ! empty( $progress_bar['progress_bar_width']['size'] ) ){
		                            echo '<div class="vs-progress">';
		                                echo '<div class="progress-value" data-valuenow="'.esc_attr( $progress_bar['progress_bar_width']['size'] ).'"></div>';
		                            echo '</div>';
								}
	                        echo '</div>';
	                    echo '</div>';
					}
				echo '</div>';
			echo '</div>';
		}
	}

}