<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
/**
 *
 * Menu Widget .
 *
 */
class Mixlax_Border_Widgets extends Widget_Base {


	public function get_name() {
		return 'mixlaxborder';
	}

	public function get_title() {
		return __( 'Mixlax Separator', 'mixlax' );
	}


	public function get_icon() {
		return 'icon-Group-825';
    }


	public function get_categories() {
		return [ 'mixlax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'mixlax_menu',
			[
				'label'     => __( 'Mixlax Separator', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'border',
				'label'     => __( 'Border', 'mixlax' ),
				'selector'  => '{{WRAPPER}} .custom-border',
			]
		);
		$this->end_controls_section();

	}

	protected function render() {

		$settings 	= $this->get_settings_for_display();

        echo '<div class="custom-border">';
        echo '</div>';

	}
}