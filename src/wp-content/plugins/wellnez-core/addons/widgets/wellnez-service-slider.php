<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Background;
use \Elementor\Repeater;
/**
 *
 * Service Slider Widget .
 *
 */
class Wellnez_Service_Slider extends Widget_Base {

	public function get_name() {
		return 'wellnezserviceslider';
	}

	public function get_title() {
		return __( 'Service Slider', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'counter_section',
			[
				'label' 	=> __( 'Service Slider', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'service_style',
			[
				'label' 		=> __( 'Service Style', 'wellnez' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  			=> __( 'Style One', 'wellnez' ),
					'2' 			=> __( 'Style Two', 'wellnez' ),
					'3' 			=> __( 'Style Three', 'wellnez' ),
					'4' 			=> __( 'Style Four', 'wellnez' ),
				],
			]
		);
		$this->add_control(
			'active_slider',
			[
				'label'     => esc_html__( 'Slider?', 'wellnez' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Show', 'wellnez' ),
				'label_off' => esc_html__( 'Hide', 'wellnez' ),
				'return_value' => 'yes',
				'default'   => 'yes',
			]
		);

		$this->add_control(
			'service_column',
			[
				'label' 		=> __( 'Service Column', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '3',
				'options'		=> [
					'12'  			=> __( 'Full Width', 'mixlax' ),
					'6' 			=> __( '2 Column', 'mixlax' ),
					'4' 			=> __( '3 Column', 'mixlax' ),
					'3' 			=> __( '4 Column', 'mixlax' ),
					'2' 			=> __( '6 Column', 'mixlax' ),
				],
				'condition'		=> [ 'active_slider' => '' ]
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'service_image',
			[
				'label' 	=> esc_html__( 'Service Image', 'wellnez' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'service_sahpe',
			[
				'label'     => esc_html__( 'Show Shape', 'wellnez' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Show', 'wellnez' ),
				'label_off' => esc_html__( 'Hide', 'wellnez' ),
				'return_value' => 'yes',
				'default'   => 'yes',
			]
		);

		$repeater->add_control(
			'service_title',
			[
				'label' 	=> __( 'Service Title', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default'   => __( 'Development Services', 'wellnez' ),
			]
		);

		$repeater->add_control(
			'service_url',
			[
				'label' 	=> __( 'Service Url', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default'   => __( '#', 'wellnez' ),
			]
		);

		$repeater->add_control(
			'service_description',
			[
				'label' 	=> __( 'Service Description', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default'   => __( 'Completely implement via highly efficient process improvements. engage high value before progressive data.', 'wellnez' ),
			]
		);

		$repeater->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default'   => __( 'Read More', 'wellnez' ),
			]
		);

		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Slides', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'service_title' 		=> __( 'Skin Treatment', 'wellnez' ),
						'service_description' 	=> __( 'There are many variations passages Ipsum available, but the majority have suffered in some.', 'wellnez' ),
					],
					[
						'service_title' 		=> __( 'Skin Treatment', 'wellnez' ),
						'service_description' 	=> __( 'There are many variations passages Ipsum available, but the majority have suffered in some.', 'wellnez' ),
					],
					[
						'service_title' 		=> __( 'Clean Ingredient', 'wellnez' ),
						'service_description' 	=> __( 'There are many variations passages Ipsum available, but the majority have suffered in some.', 'wellnez' ),
					],
				],
				'title_field' 	=> '{{{ service_title }}}',
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'slider_control_section',
			[
				'label' 		=> __( 'Slider Control', 'wellnez' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'slide_to_show',
			[
				'label' 		=> __( 'Slide To Show', 'wellnez' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 			=> [
						'min' 			=> 0,
						'max' 			=> 10,
						'step'			=> 1,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 3,
				],
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
			'service_style_section',
			[
				'label' => __( 'Service Slider Style', 'wellnez' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
			'service_title_color',
			[
				'label' 	=> __( 'Service Title Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature-title, {{WRAPPER}} .service-style5 .service-title' => 'color: {{VALUE}}!important',
                ],
			]
        );


        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'service_title_typography',
				'label' 	=> __( 'Service Title Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .feature-title, {{WRAPPER}} .service-style5 .service-title',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'service_style_dis',
			[
				'label' => __( 'Discription', 'wellnez' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
			'service_desc_color',
			[
				'label' 	=> __( 'Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature-style2 .feature-text, {{WRAPPER}} .service-style5 .service-text' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'service_text_typography',
				'label' 	=> __( 'Service Slider Text Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .feature-style2 .feature-text,  {{WRAPPER}} .service-style5 .service-text',
			]
		);
		$this->end_controls_section();

		
		$this->start_controls_section(
			'service_style_box',
			[
				'label' => __( 'Box', 'wellnez' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' 		=> 'background',
				'label' 	=> __( 'Background', 'wellnez' ),
				'types' 	=> [ 'classic', 'gradient', 'video' ],
				'selector' 	=> '{{WRAPPER}} .feature-style2, {{WRAPPER}} .service5-slider .service-style5',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' 		=> 'background_hover',
				'label' 	=> __( 'Hover Background', 'wellnez' ),
				'types' 	=> [ 'classic', 'gradient', 'video' ],
				'selector' 	=> '{{WRAPPER}} .service5-slider .service-style5:hover',
				'condition'		=> [ 'service_style' => '4' ]
,			]
		);

		
        $this->add_control(
			'service_title_color_hover',
			[
				'label' 	=> __( 'Hover Title Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
				
					'{{WRAPPER}} .service-style5:hover .service-text,  {{WRAPPER}}, .service-style5:hover .service-title a' => 'color: {{VALUE}}!important',
				],

			]
        );
		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if('yes'  == $settings['active_slider'] ){
			$this->add_render_attribute( 'wrapper', 'class', 'row service-carousel wow fadeInUp' );
			$this->add_render_attribute( 'wrapper', 'data-slick-arrows', 'false' );
			$this->add_render_attribute( 'wrapper', 'data-slick-autoplay', 'false' );
			$this->add_render_attribute( 'wrapper', 'data-slide-to-show', $settings['slide_to_show']['size'] );
			$this->add_render_attribute( 'wrapper', 'data-slick-dots', 'false' );
			$column_class = '4';
		}else{
			$this->add_render_attribute( 'wrapper', 'class', 'row' );
			$column_class = $settings['service_column'];
		}



		

		
		if( '1' ==  $settings[ 'service_style' ] ){
			echo '<div class="service-wrapper">';
				echo '<div class="container-fluid">';
					echo '<div '.$this->get_render_attribute_string('wrapper').'>';
						foreach( $settings['slides'] as $singleslide ) {
							echo '<div class="col-lg-4 col-xl-'.esc_attr( $column_class ).'">';
								echo '<div class="feature-style2">';
									if( ! empty( $singleslide['service_image']['url'] ) ){
										echo '<div class="vs-icon style2">';
											echo wellnez_img_tag( array(
												'url'	=> esc_url( $singleslide['service_image']['url'] ),
											) );
										echo '</div>';
									}
									if( ( 'yes' ==  $singleslide['service_sahpe'] ) ){
										echo '<div class="arrow-shape">';
											echo '<i class="arrow"></i>';
											echo '<i class="arrow"></i>';
											echo '<i class="arrow"></i>';
											echo '<i class="arrow"></i>';
										echo '</div>';
									}
									if( ! empty( $singleslide['service_title'] ) ){
										echo '<h3 class="service-title h4">';
											echo esc_html( $singleslide['service_title'] );
										echo '</h3>';
									}
									if( ! empty( $singleslide['service_description'] ) ){
										echo '<p class="feature-text">'.esc_html( $singleslide['service_description'] ).'</p>';
									}
									if( ! empty( $singleslide['button_text'] ) ){
										echo '<a href="'.esc_url( $singleslide['service_url'] ).'" class="link-btn style2">'.esc_html( $singleslide['button_text'] ).'</a>';
									}
								echo '</div>';
							echo '</div>';
						}
					echo '</div>';
				echo '</div>';
			echo '</div>';
		} else if( '2' ==  $settings[ 'service_style' ] ){
			echo '<div class="row">';
				foreach( $settings['slides'] as $singleslide ) {
					echo '<div class="col-md-6 col-xl-'.esc_attr( $column_class ).'">';
						echo '<div class="feature-style1">';
							if( ! empty( $singleslide['service_image']['url'] ) ){
								echo '<div class="vs-icon">';
									echo wellnez_img_tag( array(
										'url'	=> esc_url( $singleslide['service_image']['url'] ),
									) );
								echo '</div>';
							}
							if( ( 'yes' ==  $singleslide['service_sahpe'] ) ){
								echo '<div class="arrow-shape">';
									echo '<i class="arrow"></i>';
									echo '<i class="arrow"></i>';
									echo '<i class="arrow"></i>';
									echo '<i class="arrow"></i>';
								echo '</div>';
							}
							if( ! empty( $singleslide['service_title'] ) ){
								echo '<h3 class="service-title h4">';
									echo '<a href="'.esc_html( $singleslide['service_url'] ).'">';
										echo esc_html( $singleslide['service_title'] );
									echo '</a>';
								echo '</h3>';
							}
							if( ! empty( $singleslide['service_description'] ) ){
								echo '<p class="feature-text">'.esc_html( $singleslide['service_description'] ).'</p>';
							}
						echo '</div>';
					echo '</div>';
				};
			echo '</div>';
		}else if( '3' ==  $settings[ 'service_style' ] ){
			echo '<div '.$this->get_render_attribute_string('wrapper').'>';
				foreach( $settings['slides'] as $singleslide ) {
					echo '<div class="col-md-6 col-lg-'.esc_attr( $column_class ).'">';
						echo '<div class="service-style2">';
							if( ! empty( $singleslide['service_image']['url'] ) ){
								echo '<div class="vs-icon style3">';
									echo wellnez_img_tag( array(
										'url'	=> esc_url( $singleslide['service_image']['url'] ),
									) );
								echo '</div>';
							}
							if( ( 'yes' ==  $singleslide['service_sahpe'] ) ){
								echo '<div class="arrow-shape">';
									echo '<i class="arrow"></i>';
									echo '<i class="arrow"></i>';
									echo '<i class="arrow"></i>';
									echo '<i class="arrow"></i>';
								echo '</div>';
							}
							if( ! empty( $singleslide['service_title'] ) ){
								echo '<h3 class="service-title h5">';
									echo esc_html( $singleslide['service_title'] );
								echo '</h3>';
							}
							if( ! empty( $singleslide['service_description'] ) ){
								echo '<p class="service-text">'.esc_html( $singleslide['service_description'] ).'</p>';
							}
						echo '</div>';
					echo '</div>';
				};
			echo '</div>';
		}else if( '4' ==  $settings[ 'service_style' ] ){
			echo '<div class="service5-slider">';
				echo '<div '.$this->get_render_attribute_string('wrapper').'>';
					foreach( $settings['slides'] as $singleslide ) {
						echo '<div class="col-md-6 col-lg-4 col-xl-'.esc_attr( $column_class ).'">';
							echo '<div class="service-style5">';
								if( ! empty( $singleslide['service_image']['url'] ) ){
									echo '<div class="service-icon">';
										echo wellnez_img_tag( array(
											'url'	=> esc_url( $singleslide['service_image']['url'] ),
										) );
									echo '</div>'; 
								}
								echo '<div class="service-content">';
									if( ! empty( $singleslide['service_title'] ) ){
										echo '<h3 class="service-title h4">';
											echo '<a class="text-inherit" href="'.esc_html( $singleslide['service_url'] ).'">';
												echo esc_html( $singleslide['service_title'] );
											echo '</a>';
										echo '</h3>';
									}
									if( ! empty( $singleslide['service_description'] ) ){
										echo '<p class="service-text">'.esc_html( $singleslide['service_description'] ).'</p>';
									}

									?>
									<?php if( !empty( $singleslide['service_url'] ) ): ?>
										<a href="<?php echo esc_url( $singleslide['service_url'] ); ?>" class="service-btn" tabindex="0">
											<i class="far fa-plus"></i>
										</a>
									<?php endif; ?>
									<?php


								echo '</div>';
							echo '</div>';
						echo '</div>';
					};
				echo '</div>';
			echo '</div>';
		};
	}
}