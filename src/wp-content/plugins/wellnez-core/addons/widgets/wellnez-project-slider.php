<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Background;
use \Elementor\Repeater;
/**
 *
 * Project Slider Widget .
 *
 */
class Wellnez_Project_Slider extends Widget_Base {

	public function get_name() {
		return 'wellnezprojectslider';
	}

	public function get_title() {
		return __( 'Project Slider', 'wellnez' );
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
				'label' 	=> __( 'Project Slider', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'project_style',
			[
				'label' 		=> __( 'Project Style', 'wellnez' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  			=> __( 'Style One', 'wellnez' ),
					'2' 			=> __( 'Style Two', 'wellnez' )
				],
			]
		);

		$this->add_control(
			'project_subtitle',
			[
				'label' 	=> __( 'Project SubTitle', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default'   => __( 'OUR LATEST PROJECTS', 'wellnez' ),
				'condition'	=> [ 'project_style' => '1' ],
			]
		);

		$this->add_control(
			'project_title',
			[
				'label' 	=> __( 'Project Title', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default'   => __( 'Our Successful Projects', 'wellnez' ),
				'condition'	=> [ 'project_style' => '1' ],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'project_image',
			[
				'label' 	=> esc_html__( 'Project Image', 'wellnez' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'project_url',
			[
				'label' 	=> __( 'Project Url', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default'   => __( '#', 'wellnez' ),
			]
		);

		$repeater->add_control(
			'project_title',
			[
				'label' 	=> __( 'Project Title', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default'   => __( 'Development Projects', 'wellnez' ),
			]
		);

		$repeater->add_control(
			'project_subtitle',
			[
				'label' 	=> __( 'Project Subtitle', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default'   => __( 'App Solution', 'wellnez' ),
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
						'project_title' 		=> __( 'App Development', 'wellnez' ),
						'project_subtitle' 	    => __( 'App Solution', 'wellnez' ),
					],
					[
						'project_title' 		=> __( 'Portfolio Design', 'wellnez' ),
						'project_subtitle' 	    => __( 'UI Design', 'wellnez' ),
					],
					[
						'project_title' 		=> __( 'Database checkup', 'wellnez' ),
						'project_subtitle' 	    => __( 'Cyber Security', 'wellnez' ),
					],
					[
						'project_title' 		=> __( 'Digital Marketing', 'wellnez' ),
						'project_subtitle' 	    => __( 'Affiliate', 'wellnez' ),
					],
				],
				'title_field' 	=> '{{{ project_title }}}',
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default'   => __( 'View Details', 'wellnez' ),
				'condition'	=> [ 'project_style' => '2' ],
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
			'project_style_section',
			[
				'label' => __( 'Project Style', 'wellnez' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' 		=> 'background',
				'label' 	=> __( 'Background', 'wellnez' ),
				'types' 	=> [ 'classic', 'gradient', 'video' ],
				'selector' 	=> '{{WRAPPER}} .project-style2 .project-shape',
			]
		);

        $this->add_control(
			'project_title_color',
			[
				'label' 	=> __( 'Project Title Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .project-style2 .project-title' => 'color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'project_title_typography',
				'label' 	=> __( 'Project Title Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .project-style2 .project-title',
			]
		);

        $this->add_control(
			'project_subtitle_color',
			[
				'label' 	=> __( 'Project Subtitle Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .project-style2 .project-label' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'project_subtitle_typography',
				'label' 	=> __( 'Project Subtitle Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .project-style2 .project-label',
			]
		);

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'wrapper', 'class', 'row vs-carousel' );
		$this->add_render_attribute( 'wrapper', 'id', 'projectslide1' );
		$this->add_render_attribute( 'wrapper', 'data-slick-arrows', 'false' );
		$this->add_render_attribute( 'wrapper', 'data-slick-autoplay', 'false' );
		$this->add_render_attribute( 'wrapper', 'data-slide-to-show', $settings['slide_to_show']['size'] );

		echo '<div class="project-wrapper">';
			if( $settings['project_style'] == '1' ){
	            echo '<div class="container">';
	                echo '<div class="row justify-content-between">';
	                    echo '<div class="col-lg-auto text-center text-lg-start">';
	                        echo '<div class="title-area">';
	                            if( ! empty( $settings['project_subtitle'] ) ){
	                                echo '<span class="sec-subtitle"><i class="fas fa-bring-forward"></i>'.esc_html( $settings['project_subtitle'] ).'</span>';
	                            }
	                            if( ! empty( $settings['project_title'] ) ){
	                                echo '<h2 class="sec-title3 h1">'.esc_html( $settings['project_title'] ).'</h2>';
	                            }
	                        echo '</div>';
	                    echo '</div>';

	                    echo '<div class="col-auto d-none d-lg-block">';
	                        echo '<div class="sec-btns">';
	                            echo '<button class="vs-btn style4" data-slick-prev="#projectslide1"><i class="far fa-arrow-left"></i>'.esc_html__( 'Prev','wellnez' ).'</button>';
	                            echo '<button class="vs-btn style4" data-slick-next="#projectslide1">'.esc_html__( 'Next','wellnez' ).'<i class="far fa-arrow-right"></i></button>';
	                        echo '</div>';
	                    echo '</div>';

	                echo '</div>';
	            echo '</div>';
	    		echo '<div class="container-fluid overflow-hidden px-xxl-0">';
	    			echo '<div '.$this->get_render_attribute_string('wrapper').'>';
	    				foreach( $settings['slides'] as $singleslide ) {
	                        echo '<div class="col-xl-3">';
	                            echo '<div class="project-style2">';
	                                echo '<div class="project-img">';
	                                    if( ! empty( $singleslide['project_image']['url'] ) ){
	                                        echo wellnez_img_tag( array(
	    										'url'	=> esc_url( $singleslide['project_image']['url'] ),
	    									) );
	                                    }
	                                    echo '<div class="project-shape"></div>';
	                                    echo '<a href="'.esc_url( $singleslide['project_url'] ).'" class=" icon-btn style3"><i class="far fa-search"></i></a>';
	                                echo '</div>';
	                                echo '<div class="project-content">';
	                                    if( ! empty( $singleslide['project_subtitle'] ) ){
	                                        echo '<span class="project-label">'.esc_html( $singleslide['project_subtitle'] ).'</span>';
	                                    }
	                                    if( ! empty( $singleslide['project_title'] ) ){
	                                        echo '<h3 class="project-title h5">'.esc_html( $singleslide['project_title'] ).'</h3>';
	                                    }
	                                echo '</div>';
	                            echo '</div>';
	                        echo '</div>';
	    				}
	    			echo '</div>';
	    		echo '</div>';
			}else{
				echo '<div class="container">';
					echo '<div '.$this->get_render_attribute_string('wrapper').'>';
						foreach( $settings['slides'] as $singleslide ) {
							echo '<div class="col-xl-3">';
			                    echo '<div class="project-style1">';
									if( ! empty( $singleslide['project_image']['url'] ) ){
				                        echo '<div class="project-img">';
				                            echo '<a href="'.esc_url( $singleslide['project_url'] ).'">';
												echo wellnez_img_tag( array(
													'url'	=> esc_url( $singleslide['project_image']['url'] ),
												) );
											echo '</a>';
				                        echo '</div>';
									}
			                        echo '<div class="project-content">';
										if( ! empty( $singleslide['project_title'] ) ){
				                            echo '<h3 class="project-title h6"><a class="text-inherit" href="'.esc_url( $singleslide['project_url'] ).'">'.esc_html( $singleslide['project_title'] ).'</a></h3>';
										}
										if( ! empty( $settings['button_text'] ) ){
			                            	echo '<a href="'.esc_url( $singleslide['project_url'] ).'" class="vs-btn style3">'.esc_html( $settings['button_text'] ).'<i class="far fa-arrow-right"></i></a>';
										}
									echo '</div>';
			                    echo '</div>';
			                echo '</div>';
						}
		 			echo '</div>';
	 			echo '</div>';
			}
		echo '</div>';
	}
}