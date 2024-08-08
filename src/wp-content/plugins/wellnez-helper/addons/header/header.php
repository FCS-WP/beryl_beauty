<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Header Widget .
 *
 */
class Mixlax_Header extends Widget_Base {

	public function get_name() {
		return 'mixlaxheader';
	}

	public function get_title() {
		return __( 'Header', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax_header_elements' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'header_section',
			[
				'label' 	=> __( 'Header', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'header_style',
			[
				'label' 	=> __( 'Style', 'mixlax' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> [
					'1' => __( 'Style One', 'mixlax' ),
					'2' => __( 'Style Two', 'mixlax' ),
					'3' => __( 'Style Three', 'mixlax' ),
				],
				'default' => '1',
			]
        );

		$this->add_control(
			'show_top_bar',
			[
				'label' 		=> __( 'Show Top Bar?', 'mixlax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'mixlax' ),
				'label_off' 	=> __( 'Hide', 'mixlax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'		=> [ 'header_style' => '3' ],

			]
		);

		$this->add_control(
			'phone_number',
			[
				'label' 		=> __( 'Phone Number', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '0123456789', 'mixlax' ),
				'condition'		=> [ 'header_style' => [ '2', '3' ] ],
			]
		);
		$this->add_control(
			'email',
			[
				'label' 		=> __( 'Email', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'mixlax@email.com', 'mixlax' ),
				'condition'		=> [ 'header_style' => '2' ],
			]
		);
		$this->add_control(
			'address_location',
			[
				'label' 		=> __( 'Location', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '14/A, Brown Tower, NewYork, United State', 'mixlax' ),
				'condition'		=> [ 'header_style' => '3' ],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'social_icon',
			[
				'label' 	=> __( 'Social Icon', 'mixlax' ),
				'type' 		=> Controls_Manager::ICONS,
				'default' 	=> [
					'value' 	=> 'fab fa-facebook-f',
					'library' 	=> 'solid',
				],
			]
		);

		$repeater->add_control(
			'icon_link',
			[
				'label' 		=> __( 'Link', 'mixlax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'mixlax' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);

		$this->add_control(
			'social_icon_list',
			[
				'label' 		=> __( 'Social Icon', 'mixlax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'social_icon' => __( 'Add Social Icon','mixlax' ),
					],
					[
						'social_icon' => __( 'Add Social Icon','mixlax' ),
					],
				],
				'condition'		=> [ 'header_style' => '3' ],
			]
		);
		$this->add_control(
			'logo_image',
			[
				'label' 		=> __( 'Upload Logo', 'mixlax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'logo_link',
			[
				'label' 		=> __( 'Logo Link', 'mixlax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'mixlax' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
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

		if( !empty( $menus ) ){
	        $this->add_control(
				'mixlax_menu_select_two',
				[
					'label'     	=> __( 'Select Mixlax Menu', 'mixlax' ),
					'type'      	=> Controls_Manager::SELECT,
					'options'   	=> $menus,
					'description' 	=> sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'mixlax' ), admin_url( 'nav-menus.php' ) ),
					'condition'		=> [ 'header_style' => [ '2' ] ],
				]
			);
		}else {
			$this->add_control(
				'no_menu_two',
				[
					'type' 				=> Controls_Manager::RAW_HTML,
					'raw' 				=> '<strong>' . __( 'There are no menus in your site.', 'mixlax' ) . '</strong><br>' . sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to create one.', 'mixlax' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
					'separator' 		=> 'after',
					'content_classes' 	=> 'elementor-panel-alert elementor-panel-alert-info',
					'condition'			=> [ 'header_style' => [ '1','2' ] ],
				]
			);
		}

		$this->add_control(
			'show_search_icon',
			[
				'label' 		=> __( 'Show Search Icon?', 'mixlax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'mixlax' ),
				'label_off' 	=> __( 'Hide', 'mixlax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',

			]
		);

		$this->add_control(
			'show_offcanvas_icon',
			[
				'label' 		=> __( 'Show Offcanvas Icon?', 'mixlax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'mixlax' ),
				'label_off' 	=> __( 'Hide', 'mixlax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',

			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'general',
			[
				'label' 	=> __( 'General', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' 		=> 'background',
				'label' 	=> __( 'Background', 'mixlax' ),
				'types' 	=> [ 'classic', 'gradient', 'video' ],
				'selector' 	=> '{{WRAPPER}} .header-wrapper.header-layout,{{WRAPPER}} .header-wrapper.header-layout4,{{WRAPPER}} .header-wrapper.header-layout3',
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
					'{{WRAPPER}} .main-menu ul' => 'background-color: {{VALUE}}',
                ],
			]
        );
		$this->add_control(
			'sub_menu_background_color',
			[
				'label'     => __( 'Sub Menu Background Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .main-menu ul.mixlax-menu ul.sub-menu' => 'background-color: {{VALUE}}',
                ],
			]
        );
        $this->add_control(
			'menu_color',
			[
				'label'     => __( 'Menu Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .main-menu ul li a' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_control(
			'sub_menu_color',
			[
				'label'     => __( 'Sub Menu Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .main-menu ul.mixlax-menu ul.sub-menu li a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'sub_menu_border_top_color',
			[
				'label'     => __( 'Sub Menu Border Top Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .main-menu ul li ul.sub-menu' => 'border-top-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' 		=> 'menu_text_shadow',
				'label' 	=> __( 'Text Shadow', 'mixlax' ),
				'selector'  => '{{WRAPPER}} .main-menu ul li a',
			]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'menu_typography',
				'label'     => __( 'Menu Typography', 'mixlax' ),
                'selector'  => '{{WRAPPER}} .main-menu ul li a',
			]
        );
        $this->add_responsive_control(
			'menu_margin',
			[
				'label'         => __( 'Menu Margin', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .main-menu ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .main-menu ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
				'devices' 		=> [ 'desktop', 'tablet', 'mobile' ],
			]
		);
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'menu_border',
				'label'     => __( 'Border', 'mixlax' ),
				'selector'  => '{{WRAPPER}} .main-menu ul li a',
			]
		);
        $this->add_responsive_control(
			'menu_border_radius',
			[
				'label'         => __( 'Menu Border Radius', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .main-menu ul li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
				'devices' 		=> [ 'desktop', 'tablet', 'mobile' ],
			]
        );
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'menu_box_shadow',
				'label' 	=> __( 'Box Shadow', 'mixlax' ),
				'selector'  => '{{WRAPPER}} .main-menu ul li a',
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
					'{{WRAPPER}} .main-menu ul li a:hover' => 'background-color: {{VALUE}}',
                ],
			]
        );
        $this->add_control(
			'menu_hover_color',
			[
				'label'     => __( 'Menu Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .main-menu ul li a:hover' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' 		=> 'menu_hover_text_shadow',
				'label' 	=> __( 'Text Shadow', 'mixlax' ),
				'selector'  => '{{WRAPPER}} .main-menu ul li a:hover',
			]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'menu_hover_typography',
				'label'     => __( 'Menu Typography', 'mixlax' ),
                'selector'  => '{{WRAPPER}} .main-menu ul li a:hover',
			]
        );
        $this->add_responsive_control(
			'menu_hover_margin',
			[
				'label'         => __( 'Menu Margin', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .main-menu ul li:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .main-menu ul li a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
				'devices' 		=> [ 'desktop', 'tablet', 'mobile' ],
			]
		);
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'menu_hover_border',
				'label'     => __( 'Border', 'mixlax' ),
				'selector'  => '{{WRAPPER}} .main-menu ul li a:hover',
			]
		);
        $this->add_responsive_control(
			'menu_hover_border_radius',
			[
				'label'         => __( 'Menu Border Radius', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .main-menu ul li a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
				'devices' 		=> [ 'desktop', 'tablet', 'mobile' ],
			]
        );
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'menu_hover_box_shadow',
				'label' 	=> __( 'Box Shadow', 'mixlax' ),
				'selector'  => '{{WRAPPER}} .main-menu ul li a:hover',
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'topbar',
			[
				'label'     => __( 'Top Bar Style', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'top_bar_background_color',
			[
				'label'     => __( 'Top Bar Background Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-top-layout1' => 'background-color: {{VALUE}}',
                ],
			]
        );
		$this->add_control(
			'phone_color',
			[
				'label'     => __( 'Phone Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .info-links li a' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_control(
			'phone_hover_color',
			[
				'label'     => __( 'Phone Hover Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .info-links li a:hover' => 'color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'address_color',
			[
				'label'     => __( 'Address Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .info-links li' => 'color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'social_icon_color',
			[
				'label'     => __( 'Social Icon Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .social-links li a i' => 'color: {{VALUE}}',
                ],
			]
        );

		$this->end_controls_section();

    }

	public function mixlax_menu_select(){
	    $mixlax_menu = wp_get_nav_menus();
	    $menu_array  = array();
		$menu_array[''] = __( 'Select A Menu', 'mixlax' );
	    foreach( $mixlax_menu as $menu ){
	        $menu_array[ $menu->slug ] = $menu->name;
	    }
	    return $menu_array;
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		$mixlax_avaiable_menu   = $this->mixlax_menu_select();

		if( ! $mixlax_avaiable_menu ){
			return;
		}

		$args = [
			'menu' 			=> $settings['mixlax_menu_select'],
			'menu_class' 	=> 'mixlax-menu',
			'container' 	=> '',
		];

		$argstwo = [
			'menu' 			=> $settings['mixlax_menu_select_two'],
			'menu_class' 	=> 'mixlax-menu',
			'container' 	=> '',
		];

		$plcaholder_text = ! empty( $settings['placeholder_text'] ) ? $settings['placeholder_text'] : '';

		$target 	= $settings['logo_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow 	= $settings['logo_link']['nofollow'] ? ' rel="nofollow"' : '';

        if( $settings['header_style'] == '1' ) {
			echo '<div class="vs-header header-layout4">';
					echo '<div class="sticky-wrap">';
					echo '<div class="sticky-active">';
		        echo '<div class="container">';
		            echo '<div class="row justify-content-between align-items-center gx-60">';
		                echo '<div class="col-auto">';
							if( ! empty( $settings['logo_image']['url'] ) ){
			                    echo '<div class="header-logo">';
			                        echo '<a '.wp_kses_post( $target.$nofollow ).' href="'.esc_url( $settings['logo_link']['url'] ).'">';
										echo wellnez_img_tag( array(
											'url'	=> esc_url( $settings['logo_image']['url'] ),
											'class'	=> 'svg',
										) );
									echo '</a>';
			                    echo '</div>';
							}
		                echo '</div>';
		                echo '<div class="col-auto d-lg-block d-none">';
		                    echo '<nav class="main-menu menu-style1">';
								if( ! empty( $settings['mixlax_menu_select'] ) ){
									wp_nav_menu( $args );
								}
		                    echo '</nav>';
		                echo '</div>';
		                echo '<div class="col-auto text-end">';
											echo '<div class="header-btns">';
												if( $settings['show_search_icon'] == 'yes' ){
													echo '<a href="#" class="icon-btn style3 searchBoxTggler d-none d-lg-inline-block"><i class="fal fa-search"></i></a>';
												}
												if( is_active_sidebar( 'wellnez-offcanvas-sidebar' ) && $settings['show_offcanvas_icon'] == 'yes' ){
													echo '<a href="#" class="icon-btn style3 sideMenuToggler d-none d-lg-inline-block"><i class="fal fa-bars"></i></a>';
												}
												echo '<button type="button" class="vs-menu-toggle d-lg-none"><i class="far fa-bars"></i></button>';
											echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
					echo '</div>';
					echo '</div>';
		    echo '</div>';
        } elseif( $settings['header_style'] == '2' ) {
					echo '<div class="header-wrapper header-layout5">';
		        echo '<div class="container">';
							echo '<div class="row align-items-center">';
								echo '<div class="col-xl-2 d-none d-xl-block">';
									echo '<div class="header-btns">';
										if( ! empty( $settings['phone_number'] ) ){
											echo '<a href="'.esc_attr( 'tel:'.$settings['phone_number'] ).'" class="icon-btn style3"><i class="fas fa-phone-alt"></i></a>';
										}
										if( ! empty( $settings['email'] ) ){
											echo '<a href="'.esc_attr( 'mailto:'.$settings['email'] ).'" class="icon-btn style3"><i class="fal fa-envelope"></i></a>';
										}
										echo '</div>';
									echo '</div>';
								echo '<div class="col-md-5 col-xl-3 d-none d-lg-block">';
									echo '<nav class="main-menu menu-style1 text-center">';
									if( ! empty( $settings['mixlax_menu_select'] ) ){
										wp_nav_menu( $args );
									}
									echo '</nav>';
								echo '</div>';
								echo '<div class="col-6 col-lg-2 col-xl-2 text-left text-lg-center">';
									if( ! empty( $settings['logo_image']['url'] ) ){
										echo '<div class="header-logo">';
											echo '<a '.wp_kses_post( $target.$nofollow ).' href="'.esc_url( $settings['logo_link']['url'] ).'">';
												echo wellnez_img_tag( array(
											'url'	=> esc_url( $settings['logo_image']['url'] ),
											'class'	=> 'svg',
									));
									echo '</a>';
								echo '</div>';
				}
		                echo '</div>';
		                echo '<div class="col-md-5 col-xl-3 d-none d-lg-block">';
		                    echo '<nav class="main-menu menu-style1 text-center">';
								if( ! empty( $settings['mixlax_menu_select_two'] ) ){
									wp_nav_menu( $argstwo );
								}
		                    echo '</nav>';
		                echo '</div>';
		                echo '<div class="col-xl-2  d-none d-xl-block">';
		                    echo '<div class="header-btns text-end">';
								if( $settings['show_search_icon'] == 'yes' ){
			                        echo '<a href="#" class="icon-btn style3 searchBoxTggler"><i class="far fa-search"></i></a>';
								}
								if( is_active_sidebar( 'wellnez-offcanvas-sidebar' ) && $settings['show_offcanvas_icon'] == 'yes' ){
			                        echo '<a href="#" class="icon-btn style3 sideMenuToggler"><i class="fal fa-th-large"></i></a>';
								}
		                    echo '</div>';
		                echo '</div>';
		                echo '<div class="col-6 d-block d-lg-none text-end">';
		                    echo '<button type="button" class="vs-menu-toggle border-theme"><i class="far fa-bars"></i></button>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
        }else{
			echo '<div class="header-wrapper header-layout4">';
				if( $settings['show_top_bar'] == 'yes' ) {
								echo '<div class="header-top">';
										echo '<div class="container">';
												echo '<div class="row">';
													echo '<div class="col-auto d-none d-lg-block">';
														echo '<ul class="info-links list-style-none">';
															if( ! empty( $settings['phone_number'] ) ){
																echo '<li><a href="'.esc_attr( 'tel:'.$settings['phone_number'] ).'"><i class="fas fa-phone-alt"></i>'.esc_html( $settings['phone_number'] ).'</a></li>';
															}
															if( ! empty( $settings['address_location'] ) ){
																echo '<li><i class="fas fa-map-marker-alt"></i>'.esc_html( $settings['address_location'] ).'</li>';
															}
														echo '</ul>';
													echo '</div>';
													echo '<div class="col-md-12 col-lg-5">';
													if( ! empty( $settings['social_icon_list'] ) ){
														echo '<ul class="social-links text-center text-lg-end">';
														foreach( $settings['social_icon_list'] as $social_icon ){
															$social_target 		= $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
															$social_nofollow 	= $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';
																						echo '<li><a '.wp_kses_post( $social_target.$social_nofollow ).' href="'.esc_url( $social_icon['icon_link']['url'] ).'">';
																\Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] );
															echo '</a></li>';
														}
														echo '</ul>';
													}
													echo '</div>';
												echo '</div>';
										echo '</div>';
								echo '</div>';
				}
					echo '<div class="container">';
						echo '<div class="row align-items-center">';
							echo '<div class="col-6 col-lg-2">';
							if( ! empty( $settings['logo_image']['url'] ) ){
								echo '<div class="header-logo">';
									echo '<a '.wp_kses_post( $target.$nofollow ).' href="'.esc_url( $settings['logo_link']['url'] ).'">';
										echo wellnez_img_tag( array(
											'url'	=> esc_url( $settings['logo_image']['url'] ),
											'class'	=> 'svg',
										) );
									echo '</a>';
								echo '</div>';
							}
							echo '</div>';
							echo '<div class="col-6 col-lg-8 position-static text-right">';
								echo '<nav class="main-menu pl-0 menu-style2 d-none d-lg-block">';
									if( ! empty( $settings['mixlax_menu_select'] ) ){
										wp_nav_menu( $args );
									}
								echo '</nav>';
								echo '<button type="button" class="vs-menu-toggle d-inline-block d-lg-none"><i class="fas fa-bars"></i></button>';
							echo '</div>';
							echo '<div class="col-lg-2 text-right d-none d-lg-block">';
								echo '<div class="header-btns">';
								if( $settings['show_search_icon'] == 'yes' ){
									echo '<a href="#" class="icon-btn mr-2 searchBoxTggler"><i class="far fa-search"></i></a>';
								}
								if( is_active_sidebar( 'wellnez-offcanvas-sidebar' ) && $settings['show_offcanvas_icon'] == 'yes' ){
									echo '<a href="#" class="icon-btn sideMenuToggler"><i class="fal fa-th-large"></i></a>';
								}
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
		    echo '</div>';
		}

		// Popup Search Box
	    echo '<div class="popup-search-box d-none d-lg-block ">';
	        echo '<button class="searchClose border-theme text-theme"><i class="fal fa-times"></i></button>';
	        echo '<form action="'.esc_url( home_url( '/' ) ).'">';
	            echo '<input name="s" type="text" class="border-theme" placeholder="'.esc_attr__( 'What are you looking for', 'mixlax' ).'">';
	            echo '<button type="submit"><i class="fal fa-search"></i></button>';
	        echo '</form>';
	    echo '</div>';
		// Mobile Menu
		echo '<div class="vs-menu-wrapper">';
			echo '<div class="vs-menu-area">';
				echo '<button class="vs-menu-toggle"><i class="fal fa-times"></i></button>';
				if( ! empty( $settings['logo_image']['url'] ) ){
					echo '<div class="mobile-logo">';
						echo '<a '.wp_kses_post( $target.$nofollow ).' href="'.esc_url( $settings['logo_link']['url'] ).'">';
							echo wellnez_img_tag( array(
								'url'	=> esc_url( $settings['logo_image']['url'] ),
							) );
						echo '</a>';
					echo '</div>';
				} 
				echo '<div class="vs-mobile-menu">';
					wp_nav_menu( array(
						"theme_location"    => 'mobile-menu',
						"container"         => '',
						"menu_class"        => ''
					) );
				echo '</div>';
			echo '</div>';
		echo '</div>';

		// Offcanvas Sidebar
	    if( is_active_sidebar( 'wellnez-offcanvas-sidebar' ) ){
	        echo '<div class="sidemenu-wrapper d-none d-lg-block  ">';
	            echo '<div class="sidemenu-content">';
	                echo '<button class="closeButton border-theme sideMenuCls"><i class="far fa-times"></i></button>';
	                dynamic_sidebar( 'wellnez-offcanvas-sidebar' );
	            echo '</div>';
	        echo '</div>';
	    }

	}

}