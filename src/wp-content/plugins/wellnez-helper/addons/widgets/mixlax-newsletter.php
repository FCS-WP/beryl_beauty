<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Background;
/**
 *
 * Newsletter Widget .
 *
 */
class Mixlax_Newsletter extends Widget_Base {

	public function get_name() {
		return 'mixlaxnewsletter';
	}

	public function get_title() {
		return __( 'Newsletter', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'newsletter_content',
			[
				'label' 	=> __( 'Newsletter', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'newsletter_placeholder',
			[
				'label' 		=> __( 'Newsletter Placeholder Text', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Enter Your Email', 'mixlax' ),
			]
		);
		$this->add_control(
			'newsletter_button',
			[
				'label' 		=> __( 'Newsletter Button Text', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Subscribe', 'mixlax' ),
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'faq_section_style',
			[
				'label' 	=> __( 'Newsletter Style', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Button Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn .vs-btn-text' => 'color: {{VALUE}}!important',
				],
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'label' 		=> __( 'Button Hover Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn:hover .vs-btn-text' => 'color: {{VALUE}}!important',
				],
			]
		);

		$this->add_control(
			'button_background_color',
			[
				'label' 		=> __( 'Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .subscribe-form-style1 .vs-btn' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_background_hover_color',
			[
				'label' 		=> __( 'Button Background On Hover', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn.vs-style1 .vs-btn-shape' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'button_typography',
				'label' 		=> __( 'Button Typography', 'mixlax' ),
				'selector' 		=> '{{WRAPPER}} .vs-btn .vs-btn-text',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		echo '<div class="mixlax-newsletter">';
			echo '<form action="#" class="subscribe-form-style1 newsletter-form d-sm-flex bg-white p-2">';
				echo '<input required type="email" placeholder="'.esc_attr( $settings['newsletter_placeholder'] ).'" class="form-control">';
				echo '<button type="submit" class="vs-btn vs-style1">'.esc_html( $settings['newsletter_button'] ).'</button>';
			echo '</form>';
		echo '</div>';

	}

}