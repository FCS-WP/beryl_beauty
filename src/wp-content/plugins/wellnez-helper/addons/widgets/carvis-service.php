<?php
    use \Elementor\Widget_Base;
    use \Elementor\Controls_Manager;
    use \Elementor\Group_Control_Typography;
    use \Elementor\Group_Control_Background;
    use \Elementor\Group_Control_Text_Shadow;
    use \Elementor\Group_Control_Box_Shadow;
    use \Elementor\Group_Control_Border;
    use \Elementor\Utils;
    /**
     *
     * Service Widget .
     *
     */
class Carvis_Service extends Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Service widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'carvisservice';
	}

	/**
	* Get widget title.
	*
	* Retrieve Service widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return __( 'Services', 'mixlax' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Service widget icon.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget icon.
	*/

	public function get_icon() {
		return 'fa fa-code';
    }
	/**
	* Get widget categories.
	*
	* Retrieve the list of categories the Service widget belongs to.
	*
	* @since 1.0.0
	* @access public
	*
	* @return array Widget categories.
	*/
	public function get_categories() {
		return [ 'mixlax' ];
	}


	// Add The Input For User
	protected function _register_controls(){
		$this->start_controls_section(
			'services_content',
			[
				'label'		=> __( 'Service Content','mixlax' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'service_style',
			[
				'label' 	=> __( 'Service Style', 'mixlax' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'one',
				'options' 	=> [
					'one'  		=> __( 'Style One', 'mixlax' ),
					'two' 		=> __( 'Style Two', 'mixlax' ),
					'three' 	=> __( 'Style Three', 'mixlax' ),
					'four' 	    => __( 'Style Four', 'mixlax' ),
					'five' 	    => __( 'Style Five', 'mixlax' ),
					'six' 	    => __( 'Style Six', 'mixlax' ),
				],
			]
		);

        $this->add_control(
			'disable_slider',
			[
				'label'         => __( 'Disable Slider?', 'mixlax' ),
				'type'          => Controls_Manager::SWITCHER,
				'label_on'      => __( 'Yes', 'mixlax' ),
				'label_off'     => __( 'No', 'mixlax' ),
				'return_value'  => 'yes',
				'default'       => 'no',
                'condition'     => [ 'service_style!' => ['one','four'] ]
			]
		);

		$this->add_control(
			'service_column',
			[
				'label' 	=> __( 'Service Column', 'mixlax' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'three',
				'options' 	=> [
					'full'  	=> __( 'Full Width', 'mixlax' ),
					'two'  		=> __( 'Two Column', 'mixlax' ),
					'three' 	=> __( 'Three Column', 'mixlax' ),
					'four' 		=> __( 'Four Column', 'mixlax' ),
					'six' 		=> __( 'Six Column', 'mixlax' ),
				],
                'condition'  => [ 'service_style' => ['one','four'] ]
			]
		);
		$this->add_control(
			'post_from',
			[
				'label' 		=> __( 'Post From', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'all',
				'options' 		=> [
					'all'  			=> __( 'All', 'mixlax' ),
					'categories' 	=> __( 'Categories', 'mixlax' ),
				],
			]
		);
		$this->add_control(
			'categories',
			[
				'label' 		=> __( 'Post From', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'options' 		=> carvis_services_category(),
				'condition' 	=> ['post_from' => 'categories'],
			]
		);
		$this->add_control(
			'post_limit',
			[
				'label' 		=> __( 'Post Limit', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXT,
				'placeholder'	=> __( 'Only Number Work. Like 4 or 6', 'mixlax' ),
			]
		);
		$this->add_control(
			'order',
			[
				'label' 		=> __( 'Order', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'ASC',
				'options' 		=> [
					'ASC'  			=> __( 'Ascending', 'mixlax' ),
					'DESC' 			=> __( 'Descending', 'mixlax' ),
				],
			]
		);
		$this->add_control(
			'order_by',
			[
				'label' 		=> __( 'Order By', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'date',
				'options' 		=> [
					'none'  		=> __( 'None', 'mixlax' ),
					'type' 			=> __( 'Type', 'mixlax' ),
					'title' 		=> __( 'Title', 'mixlax' ),
					'name' 			=> __( 'Name', 'mixlax' ),
					'date' 			=> __( 'Date', 'mixlax' ),
				],
			]
		);
		$this->add_control(
			'section_title',
			[
				'label' 		=> __( 'Section Title', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Default title', 'mixlax' ),
				'placeholder' 	=> __( 'Type your title here', 'mixlax' ),
                'condition'     => [ 'service_style!' => [ 'four','five','six' ] ]
			]
		);
		$this->add_control(
			'section_title_bg_text',
			[
				'label' 		=> __( 'Section Title Background Text', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Default title', 'mixlax' ),
				'placeholder' 	=> __( 'Type your title here', 'mixlax' ),
                'condition'     => [ 'service_style' => 'two' ]
			]
		);
		$this->add_control(
			'section_description',
			[
				'label' 		=> __( 'Section Description', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Section Description', 'mixlax' ),
				'placeholder' 	=> __( 'Type your description here', 'mixlax' ),
                'condition'     => [ 'service_style!' => [ 'four','five','six' ] ]
			]
		);
		$this->end_controls_section();

        $this->start_controls_section(
			'slider_control',
			[
				'label'		=> __( 'Slider Control','mixlax' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
                'condition' => [ 'service_style' => [ 'two', 'three', 'five','six' ] ]
			]
		);
        $this->add_control(
			'show_arrows',
			[
				'label'         => __( 'Show Arrows?', 'mixlax' ),
				'type'          => Controls_Manager::SWITCHER,
				'label_on'      => __( 'Show', 'mixlax' ),
				'label_off'     => __( 'Hide', 'mixlax' ),
				'return_value'  => 'yes',
				'default'       => 'yes',
			]
		);
        $this->add_control(
			'slider_autoplay',
			[
				'label'         => __( 'Slider Autoplay?', 'mixlax' ),
				'type'          => Controls_Manager::SWITCHER,
				'label_on'      => __( 'Yes', 'mixlax' ),
				'label_off'     => __( 'No', 'mixlax' ),
				'return_value'  => 'yes',
				'default'       => 'yes',
			]
		);
        $this->add_control(
			'slidestoshow',
			[
				'label'         => __( 'Slide To Show?', 'mixlax' ),
				'type'          => Controls_Manager::SLIDER,
				'size_units'    => [ 'px' ],
				'range'         => [
					'px'           => [
						'min'             => 0,
						'max'             => 15,
						'step'            => 1,
					],
				],
				'default'       => [
					'unit'         => 'px',
					'size'         => 3,
				],
			]
		);
        $this->add_control(
			'slidestoscroll',
			[
				'label'         => __( 'Slide To Scroll?', 'mixlax' ),
				'type'          => Controls_Manager::SLIDER,
				'size_units'    => [ 'px' ],
				'range'         => [
					'px'           => [
						'min'             => 0,
						'max'             => 15,
						'step'            => 1,
					],
				],
				'default'       => [
					'unit'         => 'px',
					'size'         => 3,
				],
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'service_design',
			[
				'label'			=> __( 'General','mixlax' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'show_back_top',
			[
				'label'         => __( 'Show Back To Top?', 'mixlax' ),
				'type'          => Controls_Manager::SWITCHER,
				'label_on'      => __( 'Show', 'mixlax' ),
				'label_off'     => __( 'Hide', 'mixlax' ),
				'return_value'  => 'yes',
				'default'       => 'yes',
                'condition'     => [ 'service_style' => 'three' ],
			]
		);
        $this->add_control(
			'backtotopbg',
			[
				'label' 	=> __( 'Back To Top Bg', 'mixlax' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
                'condition' => [ 'service_style' => 'three' ],
                'selectors' => [
                    '{{WRAPPER}} .scroll-btn' 		=> 'background-image: url({{URL}});',
                ],
			]
		);
		$this->add_control(
			'service_bg_shape',
			[
				'label' 	=> __( 'Choose Bg Shape', 'mixlax' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
                'condition' => [ 'service_style!' => [ 'four', 'five','six' ] ],
			]
		);
		$this->add_control(
			'service_bg_inner_shape',
			[
				'label' 	=> __( 'Choose Service Inner Shape', 'mixlax' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
                'condition' => [ 'service_style' => 'three' ],
                'selectors' => [
                    '{{WRAPPER}} .service-layout3 .inner-wrapper:before' 		=> 'background-image: url({{URL}});',
                ],
			]
		);

		$this->add_responsive_control(
			'service_margin',
			[
				'label' 		=> __( 'Service Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-layout1 .service-box,{{WRAPPER}} .service-layout2 .service-box,{{WRAPPER}} .service-layout3 .slick-slide .service-box,{{WRAPPER}} .service-layout4 .service-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'service_padding',
			[
				'label' 		=> __( 'Service Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-layout1 .service-box,{{WRAPPER}} .service-layout2 .service-box,{{WRAPPER}} .service-layout3 .slick-slide .service-box,{{WRAPPER}} .service-layout4 .service-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'service_border_radius',
			[
				'label' 		=> __( 'Service Border Radius', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-layout1 .service-box,{{WRAPPER}} .service-layout2 .service-box,{{WRAPPER}} .service-layout3 .slick-slide .service-box,{{WRAPPER}} .service-layout4 .service-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'       => 'box_shadow',
				'label'      => __( 'Box Shadow', 'mixlax' ),
				'selector'   => '{{WRAPPER}} .service-layout1 .service-box,{{WRAPPER}} .service-layout2 .service-box,{{WRAPPER}} .service-layout3 .slick-slide .service-box',
			]
		);
		$this->end_controls_section();

        $this->start_controls_section(
            'service_design_style',
            [
                'label'			=> __( 'Style','mixlax' ),
                'tab' 			=> Controls_Manager::TAB_STYLE,
                'condition'     => [ 'service_style!' => [ 'four', 'five','six' ] ]
            ]
        );
		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Title Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .section-title .title,{{WRAPPER}} .section-title2 .title,{{WRAPPER}} .section-title3 .title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'label' 		=> __( 'Title Typography', 'mixlax' ),
                'selector' 	    => '{{WRAPPER}} .section-title .title,{{WRAPPER}} .section-title2 .title,{{WRAPPER}} .section-title3 .title',
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .section-title .title,{{WRAPPER}} .section-title2 .title,{{WRAPPER}} .section-title3 .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .section-title .title,{{WRAPPER}} .section-title2 .title,{{WRAPPER}} .section-title3 .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'title_divider',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'description_color',
			[
				'label' 		=> __( 'Description Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .section-title p,{{WRAPPER}} .section-title2 p,{{WRAPPER}} .section-title3 p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'description_typography',
				'label' 		=> __( 'Description Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .section-title p,{{WRAPPER}} .section-title2 p,{{WRAPPER}} .section-title3 p',
			]
		);
		$this->add_responsive_control(
			'description_margin',
			[
				'label' 		=> __( 'Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .section-title p,{{WRAPPER}} .section-title2 p,{{WRAPPER}} .section-title3 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'description_padding',
			[
				'label' 		=> __( 'Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .section-title p,{{WRAPPER}} .section-title2 p,{{WRAPPER}} .section-title3 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
            'service_section_style',
            [
                'label'			=> __( 'Service Style','mixlax' ),
                'tab' 			=> Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'service_title_color',
			[
				'label' 		=> __( 'Service Title Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .our-service-wrapper .service-box .service-content .title,{{WRAPPER}} .service-layout3 .service-box .service-content .title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'service_title_color_on_hover',
			[
				'label' 		=> __( 'Service Title Color On Hover', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .our-service-wrapper .service-box:hover .service-content .title,{{WRAPPER}} .service-layout2 .service-box .service-content .title:hover,{{WRAPPER}} .service-layout3 .service-box .service-content .title:hover' => 'color: {{VALUE}}!important',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'service_title_typography',
				'label' 		=> __( 'Title Typography', 'mixlax' ),
                'selector' 	    => '{{WRAPPER}} .our-service-wrapper .service-box .service-content .title,{{WRAPPER}} .service-layout3 .service-box .service-content .title',
			]
		);
		$this->add_responsive_control(
			'service_title_margin',
			[
				'label' 		=> __( 'Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .our-service-wrapper .service-box .service-content .title,{{WRAPPER}} .service-layout3 .service-box .service-content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'service_title_padding',
			[
				'label' 		=> __( 'Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .our-service-wrapper .service-box .service-content .title,{{WRAPPER}} .service-layout3 .service-box .service-content .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'service_title_divider',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'service_description_color',
			[
				'label' 		=> __( 'Description Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .our-service-wrapper .service-box .service-content p,{{WRAPPER}} .service-layout3 .service-box .service-content p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'service_description_color_on_hover',
			[
				'label' 		=> __( 'Description Color On Hover', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .our-service-wrapper .service-box:hover .service-content p' => 'color: {{VALUE}}',
				],
                'condition'     => [ 'service_style' => 'one' ]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'service_description_typography',
				'label' 		=> __( 'Description Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .our-service-wrapper .service-box .service-content p,{{WRAPPER}} .service-layout3 .service-box .service-content p',
			]
		);
		$this->add_responsive_control(
			'service_description_margin',
			[
				'label' 		=> __( 'Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .our-service-wrapper .service-box .service-content p,{{WRAPPER}} .service-layout3 .service-box .service-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'service_description_padding',
			[
				'label' 		=> __( 'Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .our-service-wrapper .service-box .service-content p,{{WRAPPER}} .service-layout3 .service-box .service-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
		$settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'wrapper','data-owl-animate-in','fadeIn');

        if( $settings['service_column'] == 'two' ){
            $this->add_render_attribute( 'column','class','col-sm-6 col-lg-4 col-xl-6');
        }elseif( $settings['service_column'] == 'three' ){
            $this->add_render_attribute( 'column','class','col-sm-6 col-lg-4 col-xl-4');
        }elseif( $settings['service_column'] == 'four' ){
            $this->add_render_attribute( 'column','class','col-sm-6 col-lg-4 col-xl-3');
        }elseif( $settings['service_column'] == 'full' ){
            $this->add_render_attribute( 'column','class','col-sm-6 col-lg-4 col-xl-12');
        }else{
            $this->add_render_attribute( 'column','class','col-sm-6 col-lg-4 col-xl-6');
        }

        if( $settings['service_style'] == 'four' ){
            $this->add_render_attribute( 'column', 'class', 'wow fadeInUp' );
        }

		echo '<!-- service style one -->';
			if( $settings['post_from'] == "categories" ){
			   $service = array(
				   'post_type'         => 'carvis_service',
				   'posts_per_page'    => esc_attr( $settings['post_limit'] ),
				   'order'             => esc_attr( $settings['order'] ),
				   'orderby'           => esc_attr( $settings['order_by'] ),
				   'tax_query'         => array(
						   array(
							   'taxonomy'  => 'service_category',
							   'field'     => 'slug',
							   'terms'     => esc_attr( $settings['categories'] ),
						   )
					   ),
			   );
		    }else{
				$service = array(
				   'post_type'         => 'carvis_service',
				   'posts_per_page'    => esc_attr( $settings['post_limit'] ),
				   'order'             => esc_attr( $settings['order'] ),
				   'orderby'           => esc_attr( $settings['order_by'] ),
			   );
		    }

		$carvis_service = new WP_Query( $service );

		if( $settings['service_style'] == 'one' || $settings['service_style'] == 'four'  ){
            if( $settings['service_style'] == 'one' ){
                $section_class = "service-layout1 our-service-wrapper pb-100 pt-130";
            }else{
                $section_class = "service-layout4 our-service-wrapper pt-130 pb-130";
            }
			echo '<!-- Our Service -->';
			  	echo '<section class="'.esc_attr( $section_class ).'">';
                    if( $settings['service_style'] == 'one' ){
    					if( ! empty( $settings['service_bg_shape']['url'] ) ){
    				    	echo '<!-- Shape Bottom -->';
    				    	echo '<div class="shape-bg shape-br">';
    				      		echo wellnez_img_tag( array(
    								'url'	=> esc_url( $settings['service_bg_shape']['url'] )
    							) );
    				    	echo '</div>';
    					}
                    }
			    	echo '<div class="container">';
                        if( $settings['service_style'] == 'one' ){
    			      		echo '<div class="row text-center justify-content-center">';
        			        	echo '<!-- Section Title -->';
            			        	echo '<div class="col-md-10 col-lg-8 col-xl-6 wow fadeInUp" data-wow-delay="0.3s">';
            			          		echo '<div class="section-title">';
            								if( ! empty( $settings['section_title'] ) ){
            				            		echo '<h2 class="title">'.wp_kses_post( $settings['section_title'] ).'</h2>';
            								}
            								if( ! empty( $settings['section_description'] ) ){
            			            			echo '<p>'.wp_kses_post( $settings['section_description'] ).'</p>';
            								}
            			          		echo '</div>';
            			        	echo '</div>';
                                echo '<!-- Section Title -->';
        			      	echo '</div>';
                        }
                        if( $settings['service_style'] == 'one' ){
                            $this->add_render_attribute( 'inner-wrapper-one', 'class', 'row wow fadeInUp' );
                            $this->add_render_attribute( 'inner-wrapper-one', 'data-wow-delay', '0.4s' );
                        }else{
                            $this->add_render_attribute( 'inner-wrapper-one', 'class', 'row justify-content-center gx-0' );
                        }

			      	echo '<div '.$this->get_render_attribute_string( 'inner-wrapper-one' ).'>';
					if( $carvis_service->have_posts() ):
						while( $carvis_service->have_posts() ):
							$carvis_service->the_post();
					        echo '<!-- Single Service -->';
    					        echo '<div '.$this->get_render_attribute_string( 'column' ).' >';
    					          	echo '<div class="service-box">';
                                        if( $settings['service_style'] == 'one' ){
        									if( has_post_thumbnail( ) ){
        						            	echo '<div class="service-img">';
        						              		the_post_thumbnail();
        						            	echo '</div>';
        									}
                                        }
    									if( !empty( wellnez_meta( 'flat_icon_class' ) ) ){
    						            	echo '<span class="service-icon"><i class="'.esc_attr( wellnez_meta( 'flat_icon_class' ) ).'"></i></span>';
    									}
    									echo '<div class="service-content">';
    										if( get_the_title() ){
    							              	echo '<a href="'.esc_url( get_the_permalink() ).'">';
    							                	echo '<h3 class="title">'.wp_kses_post( get_the_title() ).'</h3>';
    							              	echo '</a>';
    										}
    					              		echo '<p>'.wp_kses_post( get_the_excerpt() ).'</p>';
    					            	echo '</div>';
                                        if( $settings['service_style'] == 'one' ){
    					            	    echo '<a href="'.esc_url( get_the_permalink() ).'" class="service-icon bottom-icon"><i class="fal fa-plus"></i></a>';
    					          		}
                                    echo '</div>';
					          		echo '</div>';
			                    endwhile;
			                wp_reset_postdata();
			            endif;
                    echo '</div>';
			    echo '</div>';
			echo '</section>';
			echo '<!-- Our Service end -->';
		}elseif( $settings['service_style'] == 'two' ){
			echo '<!-- Our Service -->';
			  	echo '<section class="service-layout2 our-service-wrapper pt-130 pb-100">';
					if( ! empty( $settings['service_bg_shape']['url'] ) ){
						echo '<!-- Shape Bottom -->';
						echo '<div class="shape-bg">';
							echo wellnez_img_tag( array(
								'url'	=> esc_url( $settings['service_bg_shape']['url'] )
							) );
						echo '</div>';
					}

				    echo '<div class="container">';
				      	echo '<div class="row text-center justify-content-center wow fadeInUp" data-wow-delay="0.4s">';
				        	echo '<!-- Section Title -->';
				        	echo '<div class="col-md-10 col-lg-8 col-xl-6">';
				          		echo '<div class="section-title2">';
									if( ! empty( $settings['section_title'] ) || ! empty( $settings['section_title_bg_text'] ) ){
					            		echo '<h2 data-text="'.wp_kses_post( $settings['section_title_bg_text'] ).'" class="title">'.wp_kses_post( $settings['section_title'] ).'</h2>';
									}
									if( ! empty( $settings['section_description'] ) ){
				            			echo '<p>'.wp_kses_post( $settings['section_description'] ).'</p>';
									}
				          		echo '</div>';
				        	echo '</div>';
				      	echo '</div>';

                        if( $settings['disable_slider'] == 'yes' ){
                            $slider_active_class = "service-slider1-deactive";
                        }else{
                            $slider_active_class = "service-slider1-active";
                        }

                        $this->add_render_attribute( 'wrapper', 'class', 'row gutters-20  wow fadeInUp '.esc_attr( $slider_active_class ).'' );
                        $this->add_render_attribute( 'wrapper', 'data-wow-delay', '0.4s' );

                        if( $settings['show_arrows'] == 'yes' ){
                            $this->add_render_attribute( 'wrapper', 'data-arrows', 'true' );
                        }else{
                            $this->add_render_attribute( 'wrapper', 'data-arrows', 'false' );
                        }
                        if( $settings['slider_autoplay'] == 'yes' ){
                            $this->add_render_attribute( 'wrapper', 'data-autoplay', 'true' );
                        }else{
                            $this->add_render_attribute( 'wrapper', 'data-autoplay', 'false' );
                        }
                        $this->add_render_attribute( 'wrapper', 'data-slide-to-show', $settings['slidestoshow']['size'] );
                        $this->add_render_attribute( 'wrapper', 'data-slide-to-scroll', $settings['slidestoscroll']['size'] );

			      		echo '<div '.$this->get_render_attribute_string( 'wrapper' ).'>';

                            if( $carvis_service->have_posts() ):
                                while( $carvis_service->have_posts() ):
                                    $carvis_service->the_post();
            					        echo '<!-- Single Service -->';
            					        echo '<div class="col-sm-6 col-lg-4 col-xl-3">';
            					          	echo '<div class="service-box">';
            					            	echo '<div class="service-img">';
                                                    if( has_post_thumbnail() ){
                					              		the_post_thumbnail();
                                                    }
            						              	echo '<a href="'.esc_url( get_the_permalink() ).'" class="service-icon">';
            							                echo '<i class="fal fa-check"></i>';
            							                echo '<span class="ripple ripple-1"></span>';
            							                echo '<span class="ripple ripple-2"></span>';
            							                echo '<span class="ripple ripple-3"></span>';
            						              	echo '</a>';
            					            	echo '</div>';
            					            	echo '<div class="service-content">';
                                                    if( get_the_title() ){
                						              	echo '<a href="'.esc_url( get_the_permalink() ).'">';
                						                	echo '<h3 class="title">'.wp_kses_post( get_the_title() ).'</h3>';
                						              	echo '</a>';
                                                    }
            							            echo '<p>'.wp_kses_post( get_the_excerpt() ).'</p>';
            							            echo '<a href="'.esc_url( get_the_permalink() ).'" class="service-icon bottom-icon"><i class="fal fa-plus"></i></a>';
            					            	echo '</div>';
            					          	echo '</div>';
            			        		echo '</div>';
            						endwhile;
        						wp_reset_postdata();
        					endif;
			      		echo '</div>';
			    	echo '</div>';
			  	echo '</section>';
			echo '<!-- Our Service end -->';
		}elseif( $settings['service_style'] == 'three' ){
            echo '<!-- Our Service -->';
                echo '<section class="service-layout3 our-service-wrapper pt-130 pb-110">';
                    if( $settings['show_back_top'] == 'yes' ){
                        echo '<!-- scroll btn -->';
                            echo '<div class="scroll-btn">';
                                echo '<a href="#scrollDown" class="scroll-down">';
                                echo '<i class="move"></i>';
                            echo '</a>';
                        echo '</div>';
                    }

                    if( ! empty( $settings['service_bg_shape']['url'] ) ){
                        echo '<!-- Shape Bottom -->';
                        echo '<div class="shape-bg">';
                            echo wellnez_img_tag( array(
                                'url'	=> esc_url( $settings['service_bg_shape']['url'] )
                            ) );
                        echo '</div>';
                    }

                    echo '<div class="container">';
                        echo '<div class="inner-wrapper">';
                            echo '<div class="row text-center justify-content-center wow fadeInUp" data-wow-delay="0.4s">';
                                echo '<!-- Section Title -->';
                                    echo '<div class="col-md-10 col-lg-8 col-xl-6">';
                                        echo '<div class="section-title3">';
                                            echo '<span class="icon"><i class="flaticon-automobile"></i></span>';
                                                if( ! empty( $settings['section_title'] ) ){
                				            		echo '<h2 class="title">'.wp_kses_post( $settings['section_title'] ).'</h2>';
                								}
                                                if( ! empty( $settings['section_description'] ) ){
                			            			echo '<p class="text">'.wp_kses_post( $settings['section_description'] ).'</p>';
                								}
                                            echo '<span class="shape"></span>';
                                        echo '</div>';
                                    echo '</div>';
                            echo '</div>';
                            if( $settings['disable_slider'] == 'yes' ){
                                $slider_active_class = "service-slider2-deactive";
                            }else{
                                $slider_active_class = "service-slider2-active";
                            }
                            $this->add_render_attribute( 'service-wrapper', 'class', 'row gutters-40  wow fadeInUp '.esc_attr( $slider_active_class ).'' );
                            $this->add_render_attribute( 'service-wrapper', 'data-wow-delay', '0.4s' );

                            if( $settings['show_arrows'] == 'yes' ){
                                $this->add_render_attribute( 'service-wrapper', 'data-arrows', 'true' );
                            }else{
                                $this->add_render_attribute( 'service-wrapper', 'data-arrows', 'false' );
                            }
                            if( $settings['slider_autoplay'] == 'yes' ){
                                $this->add_render_attribute( 'service-wrapper', 'data-autoplay', 'true' );
                            }else{
                                $this->add_render_attribute( 'service-wrapper', 'data-autoplay', 'false' );
                            }
                            $this->add_render_attribute( 'service-wrapper', 'data-slide-to-show', $settings['slidestoshow']['size'] );
                            $this->add_render_attribute( 'service-wrapper', 'data-slide-to-scroll', $settings['slidestoscroll']['size'] );

    			      		echo '<div '.$this->get_render_attribute_string( 'service-wrapper' ).'>';
                                echo '<!-- Single Service -->';
                                if( $carvis_service->have_posts() ):
                                    while( $carvis_service->have_posts() ):
                                        $carvis_service->the_post();
                                            echo '<div class="col-sm-6 col-lg-4 col-xl-4 ">';
                                                echo '<div class="service-box">';
                                                    echo '<div class="service-content">';
                                                        if( get_the_title() ){
                                                            echo '<a href="'.esc_url( get_the_permalink() ).'">';
                                                                echo '<h3 class="title">'.wp_kses_post( get_the_title() ).'</h3>';
                                                            echo '</a>';
                                                        }
                                                        if( !empty( wellnez_meta( 'flat_icon_class' ) ) ){
                    						            	echo '<span class="shape-icon"><i class="'.esc_attr( wellnez_meta( 'flat_icon_class' ) ).'"></i></span>';
                    									}
                                                        if( get_the_excerpt() ){
                                                            echo '<p>'.wp_kses_post( get_the_excerpt() ).'</p>';
                                                        }
                                                    echo '</div>';
                                                echo '</div>';
                                            echo '</div>';
                                        endwhile;
            						wp_reset_postdata();
            					endif;
                            echo '</div><!-- .row END -->';
                        echo '</div><!-- .inner-wrappper END -->';
                    echo '</div><!-- .container END -->';
                echo '</section>';
            echo '<!-- Our Service end -->';
        }elseif( $settings['service_style'] == 'five' ){
            echo '<!-- Our Service -->';
			  	echo '<section class="our-service-wrapper service-layout5">';
				    echo '<div class="container">';
                        if( $settings['disable_slider'] == 'yes' ){
                            $slider_active_class = "service-slider3-deactive";
                        }else{
                            $slider_active_class = "service-slider3-active";
                        }
                        $this->add_render_attribute( 'service-five-wrapper', 'class', 'row mb-65 '.esc_attr( $slider_active_class ).'' );
                        $this->add_render_attribute( 'service-five-wrapper', 'data-wow-delay', '0.4s' );

                        if( $settings['show_arrows'] == 'yes' ){
                            $this->add_render_attribute( 'service-five-wrapper', 'data-arrows', 'true' );
                        }else{
                            $this->add_render_attribute( 'service-five-wrapper', 'data-arrows', 'false' );
                        }
                        if( $settings['slider_autoplay'] == 'yes' ){
                            $this->add_render_attribute( 'service-five-wrapper', 'data-autoplay', 'true' );
                        }else{
                            $this->add_render_attribute( 'service-five-wrapper', 'data-autoplay', 'false' );
                        }
                        $this->add_render_attribute( 'service-five-wrapper', 'data-slide-to-show', $settings['slidestoshow']['size'] );
                        $this->add_render_attribute( 'service-five-wrapper', 'data-slide-to-scroll', $settings['slidestoscroll']['size'] );
			      		echo '<div '.$this->get_render_attribute_string( 'service-five-wrapper' ).'>';
                            if( $carvis_service->have_posts() ){
                                while( $carvis_service->have_posts() ){
                                    $carvis_service->the_post();
            					        echo '<!-- Single Service -->';
            					        echo '<div class="col-lg-4">';
            					          	echo '<div class="service-box">';
                                                if( !empty( wellnez_meta( 'flat_icon_class' ) ) ){
                                                    echo '<span class="service-icon"><i class="'.esc_attr( wellnez_meta( 'flat_icon_class' ) ).'"></i></span>';
                                                }
                                                if( get_the_title() ){
                                                    echo '<a href="'.esc_url( get_the_permalink() ).'">';
                                                        echo '<h3 class="service-title">'.wp_kses_post( get_the_title() ).'</h3>';
                                                    echo '</a>';
                                                }
            						            echo '<p class="service-text mb-20">'.wp_kses_post( get_the_excerpt() ).'</p>';
                                                echo '<a href="'.esc_url( get_the_permalink() ).'" class="read-more-btn">'.esc_html__( 'Read More', 'mixlax' ).'<i class="pl-1 far fa-angle-right"></i></a>';
            					          	echo '</div>';
            			        		echo '</div>';
            						}
        						wp_reset_postdata();
        					}
			      		echo '</div>';
			    	echo '</div>';
			  	echo '</section>';
			echo '<!-- Our Service end -->';
        }elseif( $settings['service_style'] =='six' ){
            echo '<!-- Our Service -->';
			  	echo '<section class="service-layout1 our-service-wrapper">';
				    echo '<div class="container">';
                        if( $settings['disable_slider'] == 'yes' ){
                            $slider_active_class = "service-slider4-deactive";
                        }else{
                            $slider_active_class = "service-slider4-active";
                        }
                        $this->add_render_attribute( 'service-six-wrapper', 'class', 'row justify-content-center vs-carousel mb-65 '.esc_attr( $slider_active_class ).'' );
                        $this->add_render_attribute( 'service-six-wrapper', 'data-wow-delay', '0.4s' );

                        if( $settings['show_arrows'] == 'yes' ){
                            $this->add_render_attribute( 'service-six-wrapper', 'data-arrows', 'true' );
                        }else{
                            $this->add_render_attribute( 'service-six-wrapper', 'data-arrows', 'false' );
                        }
                        if( $settings['slider_autoplay'] == 'yes' ){
                            $this->add_render_attribute( 'service-six-wrapper', 'data-autoplay', 'true' );
                        }else{
                            $this->add_render_attribute( 'service-six-wrapper', 'data-autoplay', 'false' );
                        }
                        $this->add_render_attribute( 'service-six-wrapper', 'data-slide-to-show', $settings['slidestoshow']['size'] );
                        $this->add_render_attribute( 'service-six-wrapper', 'data-slide-to-scroll', $settings['slidestoscroll']['size'] );
			      		echo '<div '.$this->get_render_attribute_string( 'service-six-wrapper' ).'>';
                            if( $carvis_service->have_posts() ){
                                while( $carvis_service->have_posts() ){
                                    $carvis_service->the_post();
            					        echo '<!-- Single Service -->';
            					        echo '<div class="col-lg-4 col-md-6">';
            					          	echo '<div class="service-box">';
                                                if( has_post_thumbnail() ){
                                                    echo '<div class="service-img">';
                                                        the_post_thumbnail();
                                                    echo '</div>';
                                                }
                                                if( !empty( wellnez_meta( 'flat_icon_class' ) ) ){
                                                    echo '<span class="service-icon"><i class="'.esc_attr( wellnez_meta( 'flat_icon_class' ) ).'"></i></span>';
                                                }
                                                echo '<div class="service-content">';
                                                    if( get_the_title() ){
                                                        echo '<a href="'.esc_url( get_the_permalink() ).'">';
                                                            echo '<h3 class="service-title">'.wp_kses_post( get_the_title() ).'</h3>';
                                                        echo '</a>';
                                                    }
                						            echo '<p class="service-text">'.wp_kses_post( get_the_excerpt() ).'</p>';
                                                echo '</div>';
                                                echo '<a href="'.esc_url( get_the_permalink() ).'" class="primary-btn hover-white w-100">'.esc_html__( 'Learn More', 'mixlax' ).'</a>';
            					          	echo '</div>';
            			        		echo '</div>';
            						}
        						wp_reset_postdata();
        					}
			      		echo '</div>';
			    	echo '</div>';
			  	echo '</section>';
			echo '<!-- Our Service end -->';
        }
	}
}