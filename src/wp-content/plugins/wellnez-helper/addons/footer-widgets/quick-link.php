<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
/**
 * 
 * Quick Link Widget .
 *
 */
class Mixlax_Footer_Quick_Link extends Widget_Base {

	public function get_name() {
		return 'mixlaxfooterquciklink';
	}

	public function get_title() {
		return __( 'Quick Link', 'mixlax' );
	}


	public function get_icon() {
		return 'fa fa-code';
    }
    

	public function get_categories() {
		return [ 'mixlax_footer_elements' ];
	}

	
	protected function _register_controls() {

		$this->start_controls_section(
			'quick_link_section',
			[
				'label' => __( 'Quick Link', 'mixlax' ),
				'tab' 	=> Controls_Manager::TAB_CONTENT,
			]
        );
		
		$this->add_control(
			'title_text',
			[
				'label' 	=> __( 'Quick Link Title', 'mixlax' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default' 	=> __( 'Quick Link', 'mixlax' ),
			]
        );
		
        $menus = $this->mixlax_menu_select();
		
		if( !empty( $menus ) ){
	        $this->add_control(
				'mixlax_menu_select',
				[
					'label'     	=> __( 'Select Menu', 'mixlax' ),
					'type'      	=> Controls_Manager::SELECT,
					'options'   	=> $menus,
					'description' 	=> sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'mixlax' ), admin_url( 'nav-menus.php' ) ),
				]
			);
		}else {
			$this->add_control(
				'no_menu',
				[
					'type' 				=> Controls_Manager::RAW_HTML,
					'raw' 				=> '<strong>' . __( 'There are no menus in your site.', 'mixlax' ) . '</strong><br>' . sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to create one.', 'mixlax' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
					'separator' 		=> 'after',
					'content_classes' 	=> 'elementor-panel-alert elementor-panel-alert-info',
				]
			);
        }
		
        $this->end_controls_section();
		
        $this->start_controls_section(
			'quick_link_style_section',
			[
				'label' => __( 'Quick Link Style', 'mixlax' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
        $this->add_control(
			'quick_link_button_color',
			[
				'label' => __( 'Quick Link Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-layout4 .widget-links ul li a' => 'color: {{VALUE}}',
                ]
			]
        );
		
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'quick_link_button_typography',
				'label' => __( 'Quick Link Typography', 'mixlax' ),
                'selector' => '{{WRAPPER}} .footer-layout4 .widget-links ul li a',
			]
		);
		
        $this->add_responsive_control(
			'quick_link_button_margin',
			[
				'label' => __( 'Quick Link Margin', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .footer-layout4 .widget-links ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
		
        $this->add_responsive_control(
			'quick_link_button_padding',
			[
				'label' => __( 'Quick Link Padding', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .footer-layout4 .widget-links ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
		
        $this->end_controls_section();


    }
    
    protected function mixlax_menu_select(){
	    $mixlax_menu = wp_get_nav_menus();
	    $menu_array  = array();
		$menu_array[''] = __( 'Select A Menu','mixlax' );
	    foreach( $mixlax_menu as $menu ){
	        $menu_array[ $menu->slug ] = $menu->name;
	    }
	    return $menu_array;
	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		
        echo '<div class="footer-layout4">';
	        echo '<div class="widget footer-widget widget-links">';
				if( ! empty( $settings['title_text'] ) ){
					echo '<h3 class="widget_title">'.esc_html( $settings['title_text'] ).'</h3>';
				}
	            if( ! empty( $settings['mixlax_menu_select'] ) ){
	                wp_nav_menu( array(
	                    'menu'              => $settings['mixlax_menu_select'],
	                    'menu_class'        => "quick-link",
	                    'container'         => "" 
	                ) );
	            }
	        echo '</div>';
        echo '</div>';
	}

}