<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * Faq Widget .
 *
 */
class Wellnez_Faq extends Widget_Base {

	public function get_name() {
		return 'wellnezfaq';
	}

	public function get_title() {
		return __( 'Faq', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'faq_section',
			[
				'label'		 	=> __( 'Faq', 'wellnez' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );
		
		$this->add_control(
			'faq_style',
			[
				'label' 	=> __( 'FAQ Style', 'wellnez' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    '1'   		=> __( 'Style One', 'wellnez' ),
                    '2'   		=> __( 'Style Two', 'wellnez' ),
                ],
                'default'  	=> '1'
			]
        );
		
        $repeater = new Repeater();

        $repeater->add_control(
			'faq_question',
			[
				'label' 	=> __( 'Faq Question', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Ethical testing rather than ethical interfaces?', 'wellnez' )
			]
        );

        $repeater->add_control(
			'faq_answer',
			[
				'label' 	=> __( 'Faq Answer', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Assertively conceptualize cooperative potentialities with process centric internal or "organic" sources. Authoritatively pontificate B2C metrics via one-to-one synergy.', 'wellnez' )
			]
        );

		$this->add_control(
			'faq_repeater',
			[
				'label' 		=> __( 'Faq', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'faq_question'    => __( 'Ethical testing rather than ethical interfaces?', 'wellnez' ),
						'faq_answer'      => __( 'Assertively conceptualize cooperative potentialities with process centric internal or "organic" sources. Authoritatively pontificate B2C metrics via one-to-one synergy.', 'wellnez' ),
					],
					[
						'faq_question'    => __( 'Latin derived from Cicero\'s 1st-century BC text De', 'wellnez' ),
                        'faq_answer'      => __( 'Assertively conceptualize cooperative potentialities with process centric internal or "organic" sources. Authoritatively pontificate B2C metrics via one-to-one synergy.', 'wellnez' ),
					],
					[
						'faq_question'    => __( 'Creation timelines for the standard lorem passage', 'wellnez' ),
                        'faq_answer'      => __( 'Assertively conceptualize cooperative potentialities with process centric internal or "organic" sources. Authoritatively pontificate B2C metrics via one-to-one synergy.', 'wellnez' ),
					],
					[
						'faq_question'    => __( 'Lorem ipsum was purposefully designed to have', 'wellnez' ),
                        'faq_answer'      => __( 'Assertively conceptualize cooperative potentialities with process centric internal or "organic" sources. Authoritatively pontificate B2C metrics via one-to-one synergy.', 'wellnez' ),
					],
				],
				'title_field' 	=> '{{{ faq_question }}}',
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'faq_style_section',
			[
				'label' => __( 'Faq Question Style', 'wellnez' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);


        $this->add_control(
			'accordion_box_color',
			[
				'label' 	=> __( 'Accordion Box Background', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .accordion-box' => 'background-color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'faq_question_color',
			[
				'label' 	=> __( 'Faq Question Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .accordion-box .accordion-button' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'faq_question_typography',
				'label' 	=> __( 'Faq Question Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .accordion-box .accordion-button',
			]
		);

        $this->add_responsive_control(
			'faq_question_margin',
			[
				'label' 		=> __( 'Faq Question Margin', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-box .accordion-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'faq_question_padding',
			[
				'label' 		=> __( 'Faq Question Padding', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-box .accordion-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

		$this->add_control(
			'faq_answer_color',
			[
				'label' 		=> __( 'Faq Answer Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-body p' => 'color: {{VALUE}}',
                ],
				'separator'		=> 'before'
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'faq_answer_typography',
				'label' 	=> __( 'Faq Answer Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .accordion-body p',
			]
        );

        $this->add_responsive_control(
			'faq_answer_margin',
			[
				'label' 		=> __( 'Faq Answer Margin', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-body p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'faq_answer_padding',
			[
				'label' 		=> __( 'Faq Answer Padding', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-body p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( $settings['faq_style'] == '1' ){
			$class = "accordion-style1 layout2";
		}else{
			$class = "accordion accordion-style2";
		}
		
        if( ! empty( $settings['faq_repeater'] ) ){
            echo '<div class="accordion '.esc_attr( $class ).'" id="accordionLayout1">';
				$x = 1;
                foreach( $settings['faq_repeater'] as $single_data ){
					if( $x == '1' ){
						$ariaexpanded 	= 'true';
						$class 			= 'show';
						$collesed 		= '';
					}else{
						$ariaexpanded 	= 'false';
						$class 			= '';
						$collesed 		= 'collapsed';
					}
                    echo '<div class="accordion-item accordion-box">';
                        if( ! empty( $single_data['faq_question'] ) ){
                            echo '<h2 class="accordion-header" id="accHead'.esc_attr( $x ).'">';
                                echo '<button class="accordion-button '.esc_attr( $collesed ).'" type="button" data-bs-toggle="collapse" data-bs-target="#accBody'.esc_attr( $x ).'" aria-expanded="'.esc_attr( $ariaexpanded ).'" aria-controls="accBody'.esc_attr( $x ).'">';
                                    echo esc_html( $single_data['faq_question'] );
                                echo '</button>';
                            echo '</h2>';
                        }
                        if( ! empty( $single_data['faq_answer'] ) ){
                            echo '<div id="accBody'.esc_attr( $x ).'" class="accordion-collapse collapse '.esc_attr( $class ).'" aria-labelledby="accHead'.esc_attr( $x ).'" data-bs-parent="#accordionLayout1">';
                                echo '<div class="accordion-body">';
                                    echo '<p class="mb-0">'.esc_html( $single_data['faq_answer'] ).'</p>';
                                echo '</div>';
                            echo '</div>';
                        }
                    echo '</div>';
					$x++;
                }
            echo '</div>';
        }
	}
}