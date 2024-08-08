<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 * 
 * List Style Widget .
 *
 */
class Mixlax_List_Style_Logo extends Widget_Base {

	public function get_name() {
		return 'mixlaxliststyle';
	}

	public function get_title() {
		return __( 'List', 'mixlax' );
	}


	public function get_icon() {
		return 'fa fa-code';
    }
    

	public function get_categories() {
		return [ 'mixlax' ];
	}

	
	protected function _register_controls() {

		$this->start_controls_section(
			'list_style_section',
			[
				'label' 	=> __( 'List Style', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label' 		=> __( 'List', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default'		=> __( 'OUR BRANDS SUPPORTS','avivis' ),
			]
		);

		$this->add_control(
			'list',
			[
				'label' 		=> __( 'Add List', 'mixlax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' => __( '24 Month / 24,000km Nationwide Warranty monotone','mixlax' ),
					],
					[
						'title' => __( '24 Month / 24,000km Nationwide Warranty monotone','mixlax' ),
					],
				]
			]
		);

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		
		if( ! empty( $settings['list'] ) || isset( $settings['list'] ) ){
			echo '<div class="about-content-box6">';
				echo '<ul>';
					foreach ( $settings['list'] as $list ) {
				        echo '<li>'.esc_html( $list['title'] ).'</li>';
					}
			    echo '</ul>';
			echo '</div>';
		}
	}

}