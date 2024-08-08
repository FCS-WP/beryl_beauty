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
class Wellnez_Offcanvas extends Widget_Base {

	public function get_name() {
		return 'wellnezoffcanvas';
	}

	public function get_title() {
		return __( 'Offcanvas', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez_header_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'offcanvas_section',
			[
				'label' 	=> __( 'Offcanvas', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'offcanvas_version',
			[
				'label' 		=> __( 'Style', 'wellnez' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  			=> __( 'Style One', 'wellnez' ),
					'2' 			=> __( 'Style Two', 'wellnez' ),
				],
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' 		=> __( 'Icon Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .icon-btn.style3' => 'color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'icon_hover_color',
			[
				'label' 		=> __( 'Icon Hover Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .icon-btn.style3:hover' => 'color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'icon_bg_color',
			[
				'label' 		=> __( 'Icon Background Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .icon-btn.style3' => 'background-color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'icon_bg_hover_color',
			[
				'label' 		=> __( 'Icon Background Hover Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .icon-btn.style3:hover' => 'background-color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'offcanvas_bg_color',
			[
				'label' 		=> __( 'Offcanvas Background Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .sidemenu-wrapper .sidemenu-content' => 'background-color: {{VALUE}}',
                ],
			]
        );

        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( '1' == $settings[ 'offcanvas_version' ] ){
			echo '<button class="bar-btn sideMenuToggler"><span class="bar">
			</span> <span class="bar"></span> <span class="bar"></span></button>';
		}else{
			echo '<button class="icon-btn style3 sideMenuToggler d-none d-xl-inline-block"><i class="fal fa-bars"></i></button>';
		}

        if( is_active_sidebar('wellnez-offcanvas-sidebar') ){
            echo '<div class="sidemenu-wrapper d-none d-lg-block">';
                echo '<div class="sidemenu-content">';
                    echo '<button class="closeButton sideMenuCls"><i class="fal fa-times"></i></button>';
                    dynamic_sidebar( 'wellnez-offcanvas-sidebar' );
                echo '</div>';
            echo '</div>';
        };

	}
}