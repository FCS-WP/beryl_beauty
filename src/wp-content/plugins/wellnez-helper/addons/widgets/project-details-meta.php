<?php
    use \Elementor\Widget_Base;
    use \Elementor\Controls_Manager;
    use \Elementor\Group_Control_Typography;
    use \Elementor\Group_Control_Background;
    /**
     *
     * Project Details Meta Widget .
     *
     */
class Mixlax_Project_Details_Meta extends Widget_Base {

	public function get_name() {
		return 'mixlaxprojectdetailsmeta';
	}

	public function get_title() {
		return __( 'Projects Details Meta', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

	// Add The Input For User
	protected function _register_controls(){
		$this->start_controls_section(
			'projects_details_meta',
			[
				'label'		=> __( 'Project Details Meta','mixlax' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'show_title',
			[
				'label'         => __( 'Show Title?', 'mixlax' ),
				'type'          => Controls_Manager::SWITCHER,
				'label_on'      => __( 'Show', 'mixlax' ),
				'label_off'     => __( 'Hide', 'mixlax' ),
				'return_value'  => 'yes',
				'default'       => 'yes',
			]
		);

        $this->add_control(
			'title_bottom_text',
			[
				'label'         => __( 'Title Bottom Text', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Case Name', 'mixlax' ),
                'condition'     => [ 'show_title'   => 'yes' ],
			]
		);

        $this->add_control(
			'show_date',
			[
				'label'         => __( 'Show Date?', 'mixlax' ),
				'type'          => Controls_Manager::SWITCHER,
				'label_on'      => __( 'Show', 'mixlax' ),
				'label_off'     => __( 'Hide', 'mixlax' ),
				'return_value'  => 'yes',
				'default'       => 'yes',
			]
		);

        $this->add_control(
			'date_bottom_text',
			[
				'label'         => __( 'Date Bottom Text', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Date', 'mixlax' ),
                'condition'     => [ 'show_date'   => 'yes' ],
			]
		);

        $this->add_control(
			'show_category',
			[
				'label'         => __( 'Show Category?', 'mixlax' ),
				'type'          => Controls_Manager::SWITCHER,
				'label_on'      => __( 'Show', 'mixlax' ),
				'label_off'     => __( 'Hide', 'mixlax' ),
				'return_value'  => 'yes',
				'default'       => 'yes',
			]
		);

        $this->add_control(
			'category_bottom_text',
			[
				'label'         => __( 'Category Bottom Text', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Category', 'mixlax' ),
                'condition'     => [ 'show_category'   => 'yes' ],
			]
		);

        $this->add_control(
			'show_video_button',
			[
				'label'         => __( 'Show Video Button?', 'mixlax' ),
				'type'          => Controls_Manager::SWITCHER,
				'label_on'      => __( 'Show', 'mixlax' ),
				'label_off'     => __( 'Hide', 'mixlax' ),
				'return_value'  => 'yes',
				'default'       => 'yes',
			]
		);

        $this->add_control(
			'video_url',
			[
				'label'         => __( 'Video Url?', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'https://www.youtube.com/embed/tgbNymZ7vqY', 'mixlax' ),
                'condition'     => [ 'show_video_button'   => 'yes' ],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'project_design',
			[
				'label'			=> __( 'General','mixlax' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
            'box_background_color',
            [
                'label' 		=> __( 'Box Background Color', 'mixlax' ),
                'type' 			=> Controls_Manager::COLOR,
                'selectors' 	=> [
                    '{{WRAPPER}} .vs-gallery-details .gallery-top-bar' => 'background-color: {{VALUE}}',
                ],
            ]
        );

		$this->end_controls_section();

        $this->start_controls_section(
            'project_design_style',
            [
                'label'			=> __( 'Style','mixlax' ),
                'tab' 			=> Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'meta_title_color',
			[
				'label' 		=> __( 'Meta Title Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .gallery-top-bar .title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'meta_title_typography',
				'label' 		=> __( 'Meta Title Typography', 'mixlax' ),
                'selector' 	    => '{{WRAPPER}} .gallery-top-bar .title',
			]
		);
		$this->add_responsive_control(
			'meta_title_margin',
			[
				'label' 		=> __( 'Meta Title Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .gallery-top-bar .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'meta_title_padding',
			[
				'label' 		=> __( 'Meta Title Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .gallery-top-bar .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'separator'     => 'after',
			]
		);

        $this->add_control(
			'meta_bottom_text_color',
			[
				'label' 		=> __( 'Bottom Text Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .gallery-top-bar span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'meta_bottom_text_typography',
				'label' 		=> __( 'Bottom Text Typography', 'mixlax' ),
                'selector' 	    => '{{WRAPPER}} .gallery-top-bar span',
			]
		);
		$this->add_responsive_control(
			'meta_bottom_text_margin',
			[
				'label' 		=> __( 'Bottom Text Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .gallery-top-bar span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'meta_bottom_text_padding',
			[
				'label' 		=> __( 'Bottom Text Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .gallery-top-bar span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


	}

	// Output For User
	protected function render(){
		$settings = $this->get_settings_for_display();

        echo '<div class="vs-gallery-wrapper vs-gallery-details">';
            echo '<div class="gallery-top-bar px-60 py-40 mx-50">';
                echo '<div class="row justify-content-between align-items-center">';
                    if( $settings['show_title'] == 'yes' ){
                        echo '<div class="col-md-auto bar-content">';
                            echo '<p class="h4 mb-0 title">'.esc_html( get_the_title() ).'</p>';
                            if( ! empty( $settings['title_bottom_text'] ) ){
                                echo '<span>'.esc_html(  $settings['title_bottom_text']  ).'</span>';
                            }
                        echo '</div>';
                    }
                    if( $settings['show_date'] == 'yes' ){
                        echo '<div class="col-md-auto bar-content">';
                            echo '<p class="h4 mb-0 title"><time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time></p>';
                            if( ! empty( $settings['date_bottom_text'] ) ){
                                echo '<span>'.esc_html( $settings['date_bottom_text'] ).'</span>';
                            }
                        echo '</div>';
                    }
                    if( $settings['show_category'] == 'yes' ){
                        echo '<div class="col-md-auto bar-content">';
                            $terms = get_the_terms( get_the_id(), 'project_category' );
                            echo '<p class="h4 mb-0 title">';
                                $data = array();
                                foreach ( $terms as $single_terms ) {
                                    $data[] = $single_terms->name;
                                }
                                echo join(', ', $data );
                            echo '</p>';
                            if( ! empty( $settings['category_bottom_text'] ) ){
                                echo '<span>'.esc_html( $settings['category_bottom_text'] ).'</span>';
                            }
                        echo '</div>';
                    }
                    if( $settings['show_video_button'] == 'yes' ){
                        echo '<div class="col-md-auto bar-content text-center">';
                            if( ! empty( $settings['video_url'] ) ){
                                echo '<a href="'.esc_url( $settings['video_url'] ).'" class="play-btn md-size popup-video"><i class="fas fa-play"></i></a>';
                            }
                        echo '</div>';
                    }
                echo '</div>';
            echo '</div>';
        echo '</div>';
	}
}