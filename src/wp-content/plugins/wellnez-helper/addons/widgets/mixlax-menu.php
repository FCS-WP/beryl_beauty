<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Menu Widget .
 *
 */
class Mixlax_Menu_Widgets extends Widget_Base {

	public function get_name() {
		return 'mixlaxmenu';
	}

	public function get_title() {
		return __( 'Mixlax Menu', 'mixlax' );
	}


	public function get_icon() {
		return 'icon-Group-825';
    }


	public function get_categories() {
		return [ 'mixlax' ];
	}

	public function get_script_depends() {
		return [ 'onepage-nav' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'mixlax_menu',
			[
				'label'     => __( 'Menu', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$menus = $this->mixlax_menu_select();

		if( !empty( $menus ) ){
	        $this->add_control(
				'mixlax_menu_select',
				[
					'label'     	=> __( 'Select Mixlax Menu', 'mixlax' ),
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
			'menu_variation',
			[
				'label'     	=> __( 'Select Menu Style', 'mixlax' ),
				'type'      	=> Controls_Manager::SELECT,
				'options'   	=> [
					'vertical'			=>  __( 'Vertical','mixlax' ),
					'horizontal'		=>  __( 'Horizontal','mixlax' ),
					'dropdown'			=>  __( 'Dropdown','mixlax' ),
				],
				'default'		=> 'vertical',
			]
		);
		$this->add_control(
			'vertical_style',
			[
				'label'     	=> __( 'Select Vertical Style', 'mixlax' ),
				'type'      	=> Controls_Manager::SELECT,
				'options'   	=> [
					'vertical_dag'			=>  __( 'Style One','mixlax' ),
					'vertical_no_dag'		=>  __( 'Style Two','mixlax' ),
				],
				'default'		=> 'vertical_no_dag',
				'condition'		=> [ 'menu_variation' => 'vertical' ],
			]
		);
		$this->add_control(
			'vertical_line_style',
			[
				'label'     	=> __( 'Column', 'mixlax' ),
				'type'      	=> Controls_Manager::SELECT,
				'options'   	=> [
					'vertical_line'			=>  __( 'One Column','mixlax' ),
					'vertical_two_line'		=>  __( 'Two Column','mixlax' ),
				],
				'default'		=> 'vertical_line',
				'condition'		=> [ 'menu_variation' => 'vertical' ],
			]
		);
		$this->add_control(
			'horizontal_style',
			[
				'label'     	=> __( 'Select Style', 'mixlax' ),
				'type'      	=> Controls_Manager::SELECT,
				'options'   	=> [
					'normal'			=>  __( 'Normal Style','mixlax' ),
					'onepage'			=>  __( 'One Page Nav Style','mixlax' ),
				],
				'default'		=> 'normal',
				'condition'		=> [ 'menu_variation' => 'horizontal' ],
			]
		);
		$this->add_responsive_control(
			'align_items',
			[
				'label' 		=> __( 'Align', 'mixlax' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'label_block' 	=> false,
				'options' 		=> [
					'flex-start' 		=> [
						'title' 	=> __( 'Left', 'mixlax' ),
						'icon' 		=> 'fa fa-align-left',
					],
					'center' 	=> [
						'title' 	=> __( 'Center', 'mixlax' ),
						'icon' 		=> 'fa fa-align-center',
					],
					'flex-end' 	=> [
						'title' 	=> __( 'Right', 'mixlax' ),
						'icon' 		=> 'fa fa-align-right',
					],
				],
				'default'		=> 'flex-start',
				'condition' 	=> [
					'menu_variation'  => 'horizontal',
				],
				'devices' 	=> [ 'desktop', 'tablet','mobile' ],
				'selectors' => [
					'{{WRAPPER}} .mixlax_nav_menu ul' => 'justify-content: {{VALUE}}',
                ],
			]
		);
		$this->add_control(
			'align_items_vertical',
			[
				'label' 		=> __( 'Align', 'mixlax' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'label_block' 	=> false,
				'options' 		=> [
					'left' 		=> [
						'title' 	=> __( 'Left', 'mixlax' ),
						'icon' 		=> 'fa fa-align-left',
					],
					'center' 	=> [
						'title' 	=> __( 'Center', 'mixlax' ),
						'icon' 		=> 'fa fa-align-center',
					],
					'right' 	=> [
						'title' 	=> __( 'Right', 'mixlax' ),
						'icon' 		=> 'fa fa-align-right',
					],
				],
				'default'		=> 'left',
				'condition' 	=> [
					'menu_variation'  => 'vertical',
				],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'menu_style',
			[
				'label'     => __( 'Menu Style', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'menu_background_color',
			[
				'label'     => __( 'Menu Background Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mixlax_nav_menu ul li a' => 'background-color: {{VALUE}}',
                ],
			]
        );
		$this->add_control(
			'sub_menu_background_color',
			[
				'label'     => __( 'Sub Menu Background Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mixlax_nav_menu ul.mixlax_menu ul.sub-menu' => 'background-color: {{VALUE}}',
                ],
				'condition'	=> [ 'menu_variation' => 'dropdown' ],
			]
        );
        $this->add_control(
			'menu_color',
			[
				'label'     => __( 'Menu Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mixlax_nav_menu ul li a' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_control(
			'sub_menu_color',
			[
				'label'     => __( 'Sub Menu Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mixlax_nav_menu ul.mixlax_menu ul.sub-menu li a' => 'color: {{VALUE}}',
				],
				'condition'	=> [ 'menu_variation' => 'dropdown' ],
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' 		=> 'menu_text_shadow',
				'label' 	=> __( 'Text Shadow', 'mixlax' ),
				'selector'  => '{{WRAPPER}} .mixlax_nav_menu ul li a',
			]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'menu_typography',
				'label'     => __( 'Menu Typography', 'mixlax' ),
                'selector'  => '{{WRAPPER}} .mixlax_nav_menu ul li a',
			]
        );
        $this->add_responsive_control(
			'menu_margin',
			[
				'label'         => __( 'Menu Margin', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .mixlax_nav_menu ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
				'devices' 		=> [ 'desktop', 'tablet', 'mobile' ],
			]
        );
        $this->add_responsive_control(
			'menu_padding',
			[
				'label'         => __( 'Menu Padding', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .mixlax_nav_menu ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
				'devices' 		=> [ 'desktop', 'tablet', 'mobile' ],
			]
		);
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'menu_border',
				'label'     => __( 'Border', 'mixlax' ),
				'selector'  => '{{WRAPPER}} .mixlax_nav_menu ul li a',
			]
		);
        $this->add_responsive_control(
			'menu_border_radius',
			[
				'label'         => __( 'Menu Border Radius', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .mixlax_nav_menu ul li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
				'devices' 		=> [ 'desktop', 'tablet', 'mobile' ],
			]
        );
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'menu_box_shadow',
				'label' 	=> __( 'Box Shadow', 'mixlax' ),
				'selector'  => '{{WRAPPER}} .mixlax_nav_menu ul li a',
			]
		);

        $this->end_controls_section();


		$this->start_controls_section(
			'menu_hover_style',
			[
				'label'     => __( 'Menu Hover Style', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'menu_hover_background_color',
			[
				'label'     => __( 'Menu Background Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mixlax_nav_menu ul li a:hover' => 'background-color: {{VALUE}}',
                ],
			]
        );
        $this->add_control(
			'menu_hover_color',
			[
				'label'     => __( 'Menu Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mixlax_nav_menu ul li a:hover' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' 		=> 'menu_hover_text_shadow',
				'label' 	=> __( 'Text Shadow', 'mixlax' ),
				'selector'  => '{{WRAPPER}} .mixlax_nav_menu ul li a:hover',
			]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'menu_hover_typography',
				'label'     => __( 'Menu Typography', 'mixlax' ),
                'selector'  => '{{WRAPPER}} .mixlax_nav_menu ul li a:hover',
			]
        );
        $this->add_responsive_control(
			'menu_hover_margin',
			[
				'label'         => __( 'Menu Margin', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .mixlax_nav_menu ul li:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
				'devices' 		=> [ 'desktop', 'tablet', 'mobile' ],
			]
        );
        $this->add_responsive_control(
			'menu_hover_padding',
			[
				'label'         => __( 'Menu Padding', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .mixlax_nav_menu ul li a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
				'devices' 		=> [ 'desktop', 'tablet', 'mobile' ],
			]
		);
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'menu_hover_border',
				'label'     => __( 'Border', 'mixlax' ),
				'selector'  => '{{WRAPPER}} .mixlax_nav_menu ul li a:hover',
			]
		);
        $this->add_responsive_control(
			'menu_hover_border_radius',
			[
				'label'         => __( 'Menu Border Radius', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .mixlax_nav_menu ul li a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
				'devices' 		=> [ 'desktop', 'tablet', 'mobile' ],
			]
        );
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'menu_hover_box_shadow',
				'label' 	=> __( 'Box Shadow', 'mixlax' ),
				'selector'  => '{{WRAPPER}} .mixlax_nav_menu ul li a:hover',
			]
		);

        $this->end_controls_section();

	}

	public function mixlax_menu_select(){
	    $mixlax_menu = wp_get_nav_menus();
	    $menu_array  = array();
		$menu_array[''] = __( 'Select A Menu','mixlax' );
	    foreach( $mixlax_menu as $menu ){
	        $menu_array[ $menu->slug ] = $menu->name;
	    }
	    return $menu_array;
	}

	protected function render() {

		$settings 				= $this->get_settings_for_display();
		$mixlax_avaiable_menu   = $this->mixlax_menu_select();

		if( !$mixlax_avaiable_menu ){
			return;
		}

		$this->add_render_attribute( 'wrapper','class','mixlax_nav_menu');

		if( $settings['menu_variation'] == 'horizontal' && $settings['horizontal_style'] == 'onepage' ){
			$this->add_render_attribute( 'wrapper','class','on-page-menu d-none d-lg-block');
		}

		if( $settings['vertical_line_style'] == 'vertical_line' ){
			$flex_div = '';
		}else{
			$flex_div = 'style_2 d-flex flex-wrap';
		}

		if( $settings['align_items_vertical'] == 'left' ){
			$verticle_align = ' text-left';
		}elseif(  $settings['align_items_vertical'] == 'center'  ){
			$verticle_align = ' text-center';
		}else{
			$verticle_align = ' text-right';
		}

		if( $settings['menu_variation'] == 'vertical' ){
			$this->add_render_attribute( 'wrapper','class','widget widget_nav_menu');
			$menu_class = $flex_div.$verticle_align;
		}elseif( $settings['menu_variation'] == 'horizontal' && $settings['horizontal_style'] != 'onepage'){
			 $menu_class = 'nav footer-menu';
		}elseif( $settings['menu_variation'] == 'horizontal' && $settings['horizontal_style'] == 'onepage' ){
			$menu_class = 'onPageNav';
		}elseif( $settings['menu_variation'] == 'dropdown' ){
			 $menu_class = 'mixlax_menu';
		}else{
			 $menu_class = 'nav';
		}

		$args = [
			'menu' 			=> $settings['mixlax_menu_select'],
			'menu_class' 	=> $menu_class,
			'container' 	=> '',
		];

		echo '<nav '.$this->get_render_attribute_string('wrapper').'>';

			if( $settings['vertical_style'] == 'vertical_no_dag' ){
				echo '<div class="style_2">';
			}
			if( !empty( $settings['mixlax_menu_select'] ) ){
				wp_nav_menu( $args );
			}

			if( $settings['vertical_style'] == 'vertical_no_dag' ){
				echo '</div>';
			}
		echo '</nav>';

	}
}