<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
/**
 *
 * Image Widget .
 *
 */
class Mixlax_Image extends Widget_Base {

	public function get_name() {
		return 'mixlaximage';
	}

	public function get_title() {
		return __( 'Image', 'mixlax' );
	}


	public function get_icon() {
		return 'fa fa-code';
    }


	public function get_categories() {
		return [ 'mixlax' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'image_section',
			[
				'label' 	=> __( 'Image', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'image',
			[
				'label' 		=> __( 'Choose Image', 'mixlax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
			'image_align',
			[
				'label' 		=> __( 'Alignment', 'mixlax' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'text-left' 	=> [
						'title' 		=> __( 'Left', 'mixlax' ),
						'icon' 			=> 'fa fa-align-left',
					],
					'text-center' 	=> [
						'title' 		=> __( 'Center', 'mixlax' ),
						'icon' 			=> 'fa fa-align-center',
					],
					'text-right' 	=> [
						'title' 		=> __( 'Right', 'mixlax' ),
						'icon' 			=> 'fa fa-align-right',
					],
				],
				'default' 		=> 'text-left',
				'toggle' 		=> true,
			]
        );

        $this->add_control(
			'link',
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
			'video_btn',
			[
				'label' 		=> __( 'Video Button', 'mixlax' ),
				'type' 			=> Controls_Manager::SWITCHER,
                'label_on' 		=> __( 'Yes', 'mixlax' ),
				'label_off' 	=> __( 'No', 'mixlax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'no',
			]
		);

		$this->add_control(
			'video_link',
			[
				'label' 		=> __( 'Video Link', 'mixlax' ),
				'type' 			=> Controls_Manager::URL,
                'placeholder' 	=> __( 'https://your-link.com', 'mixlax' ),
				'default' 		=> [
					'url' => '#',
				],
				'condition'	=> ['video_btn' => 'yes']
			]
        );

		$this->add_control(
			'image_class',
			[
				'label'     => __( 'Image Class', 'mixlax' ),
                'type'      => Controls_Manager::TEXT,
			]
        );

        $this->end_controls_section();


        $this->start_controls_section(
			'image_style_section',
			[
				'label' 	=> __( 'Image Style', 'mixlax' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_responsive_control(
			'width',
			[
				'label' 		=> __( 'Width', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'default' 		=> [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' 	=> [ '%', 'px', 'vw' ],
				'range' 		=> [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .about-image-box3 img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'space',
			[
				'label' 	=> __( 'Max Width', 'mixlax' ) . ' (%)',
				'type' 		=> Controls_Manager::SLIDER,
				'default' 	=> [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .about-image-box3 img' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'separator_panel_style',
			[
				'type' 	=> Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'image_border',
				'selector' 	=> '{{WRAPPER}} .about-image-box3 img',
			]
		);

		$this->add_responsive_control(
			'image_border_radius',
			[
				'label' 		=> __( 'Border Radius', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .about-image-box3 img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'image_box_shadow',
				'selector' => '{{WRAPPER}} .about-image-box3 img',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'video_btn_style_section',
			[
				'label' 	=> __( 'Video Button Style', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'	=> ['video_btn' => 'yes']
			]
		);

		$this->add_control(
			'video_btn_color',
			[
				'label' 	=> __( 'Video Button Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .play-btn i' => 'color: {{VALUE}}',
                ]
			]
        );

		$this->add_control(
			'video_btn_hover_color',
			[
				'label' 	=> __( 'Video Button Hover Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .play-btn:hover i' => 'color: {{VALUE}}',
                ]
			]
        );

		$this->add_control(
			'video_btn_background_color',
			[
				'label' 	=> __( 'Video Button Background Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .play-btn i' => 'background-color: {{VALUE}}',
                ]
			]
		);

		$this->add_control(
			'video_btn_background_hover_color',
			[
				'label' 	=> __( 'Video Button Background Hover Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .play-btn:hover i' => 'background-color: {{VALUE}}',
                ]
			]
		);

		$this->add_control(
			'video_btn_ripple_effect_color',
			[
				'label' 		=> __( 'Video Button Ripple Effect Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .play-btn:after,{{WRAPPER}} .play-btn:before' => 'background-color: {{VALUE}}!important;',
                ]
			]
        );

		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'wrapper', 'class', 'about-image-box3 img-box8' );

        $this->add_render_attribute( 'wrapper', 'class', esc_attr( $settings['image_align'] ) );

        $this->add_render_attribute( 'wrapper', 'class', esc_attr( $settings['image_class'] ) );

        if( ! empty( $settings['link']['url'] ) ) {
            $this->add_render_attribute('link','href',esc_url( $settings['link']['url'] ) );
        }

        if( ! empty( $settings['link']['nofollow'] ) ) {
            $this->add_render_attribute( 'link', 'rel', 'nofollow' );
        }

        if( ! empty( $settings['link']['is_external'] ) ) {
            $this->add_render_attribute('link','target','_blank');
        }

        if( !empty( $settings['image']['url'] ) ) {
            echo '<div '.$this->get_render_attribute_string( 'wrapper' ).'>';
				if( ! empty( $settings['link']['url'] ) ){
                    echo '<a '.$this->get_render_attribute_string( 'link' ).'>';
				}

				echo '<div class="img-1">';
					echo wellnez_img_tag( array(
						'url'	=> esc_url( $settings['image']['url'] ),
						'class'	=> 'w-100'
					) );
				echo '</div>';

				if( ! empty( $settings['link']['url'] ) ){
                   echo '</a>';
				}

				if( !empty( $settings['video_btn'] == 'yes' && !empty( $settings['video_link']['url'] ) ) ) {
					echo '<a href="'.esc_url( $settings['video_link']['url'] ).'" class="popup-video play-btn style4 position-center">';
						echo '<i class="fas fa-play"></i>';
					echo '</a>';
				}
            echo '</div>';
        }
	}

}