<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
/**
 *
 * Skill About Widget .
 *
 */
class Wellnez_Skill_About extends Widget_Base {

	public function get_name() {
		return 'wellnezskillabout';
	}

	public function get_title() {
		return __( 'Skill About', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'skill_about_section',
			[
				'label' 	=> __( 'Skill About', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		
		$this->add_control(
			'skill_title_text',
			[
				'label' 	=> __( 'Skill Title text', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default'   => __( 'Growing Business', 'wellnez' ),
			]
		);
        
        $this->add_control(
			'progress_bar_width',
			[
				'label' 		=> __( 'Bar Width', 'wellnez' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ '%' ],
				'range' 		=> [
					'%' 			=> [
						'min' 			=> 0,
						'max' 			=> 100,
						'step'			=> 5,
					],
				],
				'default' 	=> [
					'unit' 		=> '%',
					'size' 		=> 41,
				],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'skill_about_style_section',
			[
				'label' => __( 'Skill About Style', 'wellnez' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'skill_about_number_color',
			[
				'label' 	=> __( 'Skill About Number Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .skill-about .skill-percentage' => 'color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'skill_about_number_typography',
				'label' 	=> __( 'Skill About Number Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .skill-about .skill-percentage',
			]
		);

        $this->add_control(
			'skill_about_title_color',
			[
				'label' 	=> __( 'Skill About Title Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .skill-about .skill-title' => 'color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'skill_about_title_typography',
				'label' 	=> __( 'Skill About Title Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .skill-about .skill-title',
			]
		);
        
        $this->add_control(
			'skill_about_subtitle_color',
			[
				'label' 	=> __( 'Skill About SubTitle Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .skill-about .skill-text' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'skill_about_subtitle_typography',
				'label' 	=> __( 'Skill About SubTitle Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .skill-about .skill-text',
			]
		);

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<div class="vs-skillbar">';
            echo '<div class="skillbar-head">';
				if( ! empty( $settings['skill_title_text'] ) ){
					echo '<h4 class="skillbar-title">'.esc_html( $settings['skill_title_text'] ).'</h4>';
				}
				if( ! empty( $settings['progress_bar_width']['size'] ) ){
					echo '<span class="skillbar-number">'.esc_html( $settings['progress_bar_width']['size'] ).'%</span>';
				}
			echo '</div>';
			
            echo '<div class="skillbar-progress">';
                echo '<div class="progress-value" role="progressbar" style="width: '.esc_attr( $settings['progress_bar_width']['size'] ).'%" aria-valuenow="'.esc_attr( $settings['progress_bar_width']['size'] ).'" aria-valuemin="0" aria-valuemax="100"></div>';
            echo '</div>';
        echo '</div>';

	}

}