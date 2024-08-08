<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * Progress Bar Widget .
 *
 */
class Wellnez_Progress_Bar extends Widget_Base {

	public function get_name() {
		return 'wellnezprogressbar';
	}

	public function get_title() {
		return __( 'Progress Bar', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'progress_bar_section',
			[
				'label'		 	=> __( 'Progress Bar', 'wellnez' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

        $repeater = new Repeater();

        $repeater->add_control(
			'progress_bar_title',
			[
				'label' 	=> __( 'Progress Bar Title', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'BUSINESS SECURITY', 'wellnez' )
			]
        );

        $repeater->add_control(
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
					'size' 		=> 80,
				],
			]
		);

		$this->add_control(
			'progress_bar_repeater',
			[
				'label' 		=> __( 'Progress Bar', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'progress_bar_title'       => __( 'BUSINESS SECURITY', 'wellnez' ),
					],
					[
						'progress_bar_title'       => __( 'CAREER DEVELOPMENT', 'wellnez' ),
					],
					[
						'progress_bar_title'       => __( 'BUSINESS INOVATION', 'wellnez' ),
					],
				],
				'title_field' 	=> '{{{ progress_bar_title }}}',
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'progress_bar_style_section',
			[
				'label' => __( 'Progress Bar Title Style', 'wellnez' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
			'title_color',
			[
				'label' 	=> __( 'Title Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progress-box__title' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'progress_bar_title_typography',
				'label' 	=> __( 'Progress Bar Title Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .progress-box__title',
			]
		);

		$this->add_control(
			'bar_bg_color',
			[
				'label' 	=> __( 'Bar Bg Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progress-box__bar' => 'background-color: {{VALUE}}',
				],
			]
		);

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();


        if( ! empty( $settings['progress_bar_repeater'] ) ){
            echo '<div class="progress-bar-wrapper">';
                foreach( $settings['progress_bar_repeater'] as $single_data ){
                    echo '<div class="progress-box">';
                        if( ! empty( $single_data['progress_bar_title'] ) ){
                            echo '<h3 class="progress-box__title">'.esc_html( $single_data['progress_bar_title'] ).'</h3>';
                        }
                        echo '<span class="progress-box__number">'.esc_html( $single_data['progress_bar_width']['size'] ).'%</span>';
                        echo '<div class="progress-box__progress">';
                            echo '<div class="progress-box__bar" role="progressbar" style="width: '.esc_attr( $single_data['progress_bar_width']['size'] ).'%" aria-valuenow="'.esc_attr( $single_data['progress_bar_width']['size'] ).'" aria-valuemin="0" aria-valuemax="100"></div>';
                        echo '</div>';
                    echo '</div>';
                }
            echo '</div>';
        }
	}
}