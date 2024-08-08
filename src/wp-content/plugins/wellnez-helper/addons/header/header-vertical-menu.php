<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
/**
 * 
 * Menu Button Widget .
 *
 */
class Mixlax_Header_Vertical_menu extends Widget_Base {

	public function get_name() {
		return 'mixlaxheaderverticalmenu';
	}

	public function get_title() {
		return __( 'Vertical Menu', 'mixlax' );
	}


	public function get_icon() {
		return 'icon-Group-825';
    }
    

	public function get_categories() {
		return [ 'mixlax_header_elements' ];
	}

	
	protected function _register_controls() {

		$this->start_controls_section(
			'vertical_menu_section',
			[
				'label' => __( 'Vertical Menu', 'mixlax' ),
				'tab' => Controls_Manager::TAB_CONTENT,
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
        
        $this->add_control(
			'vertical_menu_text',
			[
				'label' => __( 'Menu Button Text', 'mixlax' ),
                'type' => Controls_Manager::TEXTAREA,
                'default'  => __( 'All Menu', 'mixlax' ),
			]
        );

        $this->end_controls_section();
        
        $this->start_controls_section(
			'vertical_menu_button_style_section',
			[
				'label' => __( 'Menu Button Style', 'mixlax' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'vertical_menu_button_bg_color',
			[
				'label' => __( 'Menu Button Background Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .category-trigger' => 'background-color: {{VALUE}}',
                ]
			]
        );
        
        $this->add_control(
			'vertical_menu_button_color',
			[
				'label' => __( 'Menu Button Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .category-trigger' => 'color: {{VALUE}}',
					'{{WRAPPER}} .category-trigger .menu-trigger span' => 'background-color: {{VALUE}}',
                ]
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'vertical_menu_button_typography',
				'label' => __( 'Menu Button Typography', 'mixlax' ),
                'selector' => '{{WRAPPER}} .category-trigger',
			]
		);

        $this->add_responsive_control(
			'vertical_menu_button_margin',
			[
				'label' => __( 'Menu Button Margin', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .category-trigger' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
        
        $this->add_responsive_control(
			'vertical_menu_button_padding',
			[
				'label' => __( 'Menu Button Padding', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .category-trigger' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
			'vertical_menu_style_section',
			[
				'label' => __( 'Menu Style', 'mixlax' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'vertical_menu_bg_color',
			[
				'label' => __( 'Menu Background Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .category-dropdown' => 'background-color: {{VALUE}}',
                ]
			]
        );
        
        $this->add_control(
			'vertical_menu_color',
			[
				'label' => __( 'Menu Button Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .category-dropdown li a' => 'color: {{VALUE}}',
                ]
			]
        );

        $this->add_control(
			'vertical_menu_hover_color',
			[
				'label' => __( 'Menu Hover Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .category-dropdown li a:hover' => 'color: {{VALUE}}',
                ]
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __( 'Border', 'mixlax' ),
				'selector' => '{{WRAPPER}} .category-dropdown li',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'vertical_menu_typography',
				'label' => __( 'Menu Typography', 'mixlax' ),
                'selector' => '{{WRAPPER}} .category-dropdown li a',
			]
		);

        $this->add_responsive_control(
			'vertical_menu_margin',
			[
				'label' => __( 'Menu Margin', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .category-dropdown li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
        
        $this->add_responsive_control(
			'vertical_menu_padding',
			[
				'label' => __( 'Menu Padding', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .category-dropdown li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        echo '<div class="category-wrapper">';
            echo '<!-- Category Trigger -->';
            echo '<div class="category-trigger d-flex align-items-center" data-toggle="collapse" data-target="cat_drop">';
                echo '<span class="menu-trigger">';
                    echo '<span></span>';
                    echo '<span></span>';
                    echo '<span></span>';
                echo '</span>';
                echo wp_kses_post( $settings['vertical_menu_text'] );
            echo '</div>';
            echo '<!-- End Category Trigger -->';

            echo '<!-- Category Dropdown -->';
            if( !empty( $settings['mixlax_menu_select'] ) ){
                wp_nav_menu( array(
                    'menu'              => $settings['mixlax_menu_select'],
                    'menu_class'        => "category-dropdown list-unstyled",
                    'menu_id'           => "cat_drop",
                    'container'         => "" 
                ) );
            }

            echo '<!-- End Category Dropdown -->';
        echo '</div>';
	}

}