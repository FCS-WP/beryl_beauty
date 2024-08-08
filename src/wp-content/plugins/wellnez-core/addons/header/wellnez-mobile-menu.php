<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Mobilemenu Widget .
 *
 */
class Wellnez_Mobilemenu extends Widget_Base {

	public function get_name() {
		return 'wellnezmobilemenu';
	}

	public function get_title() {
		return __( 'Mobile Menu', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez_header_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'mobile_menu_section',
			[
				'label' 	=> __( 'Mobile Menu', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'logo',
			[
				'label'     => esc_html__( 'Mobile Logo', 'wellnez' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => [
					'url'          => Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
			'logo_link',
			[
				'label'         => __( 'Link', 'wellnez' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '#', 'wellnez' ),
				'placeholder'   => __( 'Type Url Here', 'wellnez' ),
			]
		);

		$this->add_control(
			'menu_bg_color',
			[
				'label' 		=> __( 'Menu Background Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-menu-toggle' => 'background-color: {{VALUE}}',
                ],
			]
        );

        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( has_nav_menu( 'mobile-menu' ) ){
            echo '<button class="vs-menu-toggle"><i class="fal fa-bars"></i></button>';
            echo '<div class="vs-menu-wrapper">';
                echo '<div class="vs-menu-area text-center">';
                    echo '<button class="vs-menu-toggle"><i class="fal fa-times"></i></button>';
                    echo '<div class="mobile-logo">';
                        echo '<a href="'.esc_url( $settings['logo_link'] ).'">';
                            echo  wellnez_img_tag(array(
                                'url'   => esc_url( $settings['logo']['url'] )
                            ));
                        echo '</a>';
                    echo '</div>';
                    echo '<div class="vs-mobile-menu">';
                        wp_nav_menu( array(
                            "theme_location"    => 'mobile-menu',
                            "container"         => '',
                            "menu_class"        => ''
                        ) );
                    echo '</div>';
                echo '</div>';
            echo '</div>';
		}
	}
}