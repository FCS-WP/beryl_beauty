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
class Wellnez_Language_Switcher extends Widget_Base {

	public function get_name() {
		return 'wellnezlanguageswitcher';
	}

	public function get_title() {
		return __( 'Gtranslate', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez_header_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'gtranslate',
			[
				'label' 	=> __( 'Gtranslate', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'style_select',
			[
				'label' 		=> __( 'Please Select Your Style From Gtranslate', 'wellnez' ),
				'type' 			=> Controls_Manager::HEADING,
			]
		);

        $this->end_controls_section();


    }

	protected function render() {

        $settings = $this->get_settings_for_display();
        
        if( class_exists( 'Gtranslate' ) ){
            echo '<div class="header-dropdown style-white">';
                echo '<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-globe"></i>English</a>';
                echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">';
                    echo '<li>';
                        echo do_shortcode('[gtranslate]');
                    echo '</li>';
                echo '</ul>';
            echo '</div>';
        }

	}

}