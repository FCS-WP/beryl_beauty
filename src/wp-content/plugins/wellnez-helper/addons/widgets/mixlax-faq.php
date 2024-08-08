<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Background;
/**
 *
 * FAQ Widget .
 *
 */
class Mixlax_Faq extends Widget_Base {

	public function get_name() {
		return 'mixlaxfaq';
	}

	public function get_title() {
		return __( 'FAQ', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'faq_section',
			[
				'label' 	=> __( 'Faq Content', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $repeater = new Repeater();

		$repeater->add_control(
			'faq_question',
			[
				'label' 	=> __( 'FAQ Question', 'mixlax' ),
				'type' 		=> Controls_Manager::TEXTAREA,
			]
		);
		$repeater->add_control(
			'faq_answer',
			[
				'label' 	=> __( 'FAQ Answer', 'mixlax' ),
				'type' 		=> Controls_Manager::TEXTAREA,
			]
		);

		$this->add_control(
			'faq',
			[
				'label' 		=> __( 'FAQ', 'mixlax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'faq_question'  => __( 'Lorem ipsum is placeholder text commonly','mixlax' ),
						'faq_answer' 	=> __( 'An immersive wellness company founded by Adam Gazzaley, Ph.D., and Alex Theory, Ph.D., The Vessel helps guests reset their brains with a host of customized journeys: Deep Space, Kairos, Ocean Cove, Zen Garden, Quantum Oneness, Crystal Cave, Lost Jungle.','mixlax' ),
					],
					[
						'faq_question'  => __( 'From its medieval origins to the digital','mixlax' ),
						'faq_answer' 	=> __( 'An immersive wellness company founded by Adam Gazzaley, Ph.D., and Alex Theory, Ph.D., The Vessel helps guests reset their brains with a host of customized journeys: Deep Space, Kairos, Ocean Cove, Zen Garden, Quantum Oneness, Crystal Cave, Lost Jungle.','mixlax' ),
					],
				]
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'faq_section_style',
			[
				'label' 	=> __( 'Faq Style', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' 		=> 'background',
				'label' 	=> __( 'Faq Background', 'mixlax' ),
				'types' 	=> [ 'classic', 'gradient', 'video' ],
				'selector' 	=> '{{WRAPPER}} .vs-faq .bg-light-theme',
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' 		=> __( 'Icon Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-faq-layout1 .vs-faq-title:before' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'icon_bg_color',
			[
				'label' 		=> __( 'Icon Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-faq-layout1 .vs-faq-title:before' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'faqtitle_color',
			[
				'label' 		=> __( 'Faq Title Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-faq-layout1 .vs-faq-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'faqtitle_typography',
				'label' 		=> __( 'Faq Title Typography', 'mixlax' ),
				'selector' 		=> '{{WRAPPER}} .vs-faq-layout1 .vs-faq-title',
			]
		);

		$this->add_control(
			'faqanswer_color',
			[
				'label' 		=> __( 'Faq Answer Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-faq-layout1 .vs-faq-body .faq-text' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'faqanswer_typography',
				'label' 		=> __( 'Faq Answer Typography', 'mixlax' ),
				'selector' 		=> '{{WRAPPER}} .vs-faq-layout1 .vs-faq-body .faq-text',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( !empty( $settings['faq'] ) ){
			echo '<div class="vs-faq-wrapper vs-faq-layout1" id="vs-accordion">';
				echo '<div class="container">';
					echo '<div class="row">';
						$x = 1;
						foreach( $settings['faq'] as $single_faq ){
							echo '<div class="vs-faq col-lg-6">';
								echo '<div class="bg-light-theme">';
									if( ! empty( $single_faq['faq_question'] ) ){
				                        echo '<div class="vs-faq-head">';
				                            echo '<button class="vs-faq-title collapsed" data-toggle="collapse" data-target="#vs-collapse'.esc_attr( $x ).'" aria-expanded="false" aria-controls="vs-collapse'.esc_attr( $x ).'">';
				                                echo esc_html( $single_faq['faq_question'] );
				                            echo '</button>';
				                        echo '</div>';
									}
									if( ! empty( $single_faq['faq_answer'] ) ){
				                        echo '<div id="vs-collapse'.esc_attr( $x ).'" class="collapse" data-parent="#vs-accordion">';
				                            echo '<div class="vs-faq-body">';
				                                echo '<p class="faq-text mb-0">'.wp_kses_post( $single_faq['faq_answer'] ).'</p>';
				                            echo '</div>';
				                        echo '</div>';
									}
			                    echo '</div>';
			                echo '</div>';
							$x++;
						}
					echo '</div>';
				echo '</div>';
			echo '</div>';
		}

	}

}