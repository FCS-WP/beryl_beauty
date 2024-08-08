<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Background;
use \Elementor\Utils;
/**
 *
 * Mixlax Separator Widget .
 *
 */
class Mixlax_Separator_Widget extends Widget_Base {

	public function get_name() {
		return 'mixlaxseparator';
	}

	public function get_title() {
		return __( 'Mixlax Separator', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_title_section',
			[
				'label'		 	=> __( 'Mixlax Separator', 'mixlax' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
            'separator_image',
            [
                'label' 		=> __( 'Separator Image', 'mixlax' ),
                'type' 			=> Controls_Manager::MEDIA,
                'default' 		=> [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'section_title_style_section',
			[
				'label' 	=> __( 'Mixlax Separator Style', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'          => 'background',
				'label'         => __( 'Background', 'mixlax' ),
				'types'         => [ 'gradient' ],
				'selector'      => '{{WRAPPER}} .divider-style1 .divider-icon:before',
			]
		);

        $this->add_control(
            'icon_color',
            [
                'label' 	=> __( 'Icon Color', 'mixlax' ),
                'type' 		=> Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .divider-style1 .divider-icon' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_bg_color',
            [
                'label' 	=> __( 'Icon Background Color', 'mixlax' ),
                'type' 		=> Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .divider-style1 .divider-icon' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<div class="divider-style1">';
            echo '<span class="divider-icon">';
                if( ! empty( $settings['separator_image']['url'] ) ){
					echo wellnez_img_tag( array(
						'url'   => esc_url( $settings['separator_image']['url'] ),
					) );
                }
            echo '</span>';
        echo '</div>';
	}
}