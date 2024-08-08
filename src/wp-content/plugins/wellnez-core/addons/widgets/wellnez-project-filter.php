<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * Project Filter Widget .
 *
 */
class Wellnez_Project_Filter_Two extends Widget_Base{

	public function get_name() {
		return 'wellnezprojectfiltertwo';
	}

	public function get_title() {
		return __( 'Project Filter Two', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'project_filter_section',
			[
				'label' 	=> __( 'Project Filter', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'tab_text', [
				'label' 		=> __( 'Tab Text', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Business' , 'wellnez' ),
				'label_block' 	=> true,
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
						'tab_text' 		=> __( 'Business', 'wellnez' ),
					],
					[
						'tab_text' 		=> __( 'Finance', 'wellnez' ),
					],
					[
						'tab_text' 		=> __( 'Agency', 'wellnez' ),
					],
					[
						'tab_text' 		=> __( 'Others', 'wellnez' ),
					],
				],
				'title_field' 	=> '{{{ tab_text }}}',
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'project_image', [
				'label' 		=> __( 'Project Image', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
        );

		$repeater->add_control(
			'project_title', [
				'label' 		=> __( 'Project Title', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Web Development' , 'wellnez' ),
				'label_block' 	=> true,
			]
        );

		$repeater->add_control(
			'project_subtitle', [
				'label' 		=> __( 'Project Subtitle', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Expert Opinion' , 'wellnez' ),
				'label_block' 	=> true,
			]
        );
		
		$repeater->add_control(
			'project_details_url', [
				'label' 		=> __( 'Project Details Url?', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '#' , 'wellnez' ),
				'label_block' 	=> true,
			]
        );

		$repeater->add_control(
			'category_one',
			[
				'label' 		=> __( 'Write Category', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'business', 'wellnez' ),
				'placeholder' 	=> __( 'Type Your Tab Text Here', 'wellnez' ),
				'description' 	=> __( 'Please Write The Same Name As You Write In Tab Text.' )
			]
		);
		$repeater->add_control(
			'category_two',
			[
				'label' 		=> __( 'Write Category', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'finance', 'wellnez' ),
				'placeholder' 	=> __( 'Type Your Tab Text Here', 'wellnez' ),
				'description' 	=> __( 'Please Write The Same Name As You Write In Tab Text.' )
			]
		);
		$repeater->add_control(
			'category_three',
			[
				'label' 		=> __( 'Write Category', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'Agency', 'wellnez' ),
				'placeholder' 	=> __( 'Type Your Tab Text Here', 'wellnez' ),
				'description' 	=> __( 'Please Write The Same Name As You Write In Tab Text.' )
			]
		);
		$repeater->add_control(
			'category_four',
			[
				'label' 		=> __( 'Write Category', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'others', 'wellnez' ),
				'placeholder' 	=> __( 'Type Your Tab Text Here', 'wellnez' ),
				'description' 	=> __( 'Please Write The Same Name As You Write In Tab Text.' )
			]
		);

		$this->add_control(
			'project_slides',
			[
				'label' 		=> __( 'Project Slides', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'project_title' 		  => __( 'Web Development', 'wellnez' ),
						'project_subtitle' 	      => __( 'Expert Opinion', 'wellnez' ),
					],
					[
						'project_title' 		  => __( 'Master Planing', 'wellnez' ),
						'project_subtitle' 	      => __( 'Professinal', 'wellnez' ),
					],
					[
						'project_title' 		  => __( 'Affiliat Marketing', 'wellnez' ),
						'project_subtitle' 	      => __( 'Digital Research', 'wellnez' ),
					],
					[
						'project_title' 		  => __( 'IOS App Design', 'wellnez' ),
						'project_subtitle' 	      => __( 'Future Develope', 'wellnez' ),
					],
					[
						'project_title' 		  => __( 'Managment Team', 'wellnez' ),
						'project_subtitle' 	      => __( 'Assistant Dev', 'wellnez' ),
					],
					[
						'project_title' 		  => __( 'Digital Research', 'wellnez' ),
						'project_subtitle' 	      => __( 'Support Team', 'wellnez' ),
					],
				],
				'title_field' 	=> '{{{ project_title }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'tab_style_section',
			[
				'label' 	=> __( 'Tab Style', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'tab_bg_color',
			[
				'label' 		=> __( 'Tab Background Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .filter-menu1' => 'background-color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'tab_color',
			[
				'label' 		=> __( 'Tab Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .filter-menu1 button' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'tab_color_hover',
			[
				'label' 		=> __( 'Tab Color Hover', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .filter-menu1 button:hover' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'tab_typography',
				'label' 	=> __( 'Tab Typography', 'wellnez' ),
				'selector' 	=> '{{WRAPPER}} .filter-menu1 button',
			]
        );

        $this->add_responsive_control(
			'tab_margin',
			[
				'label' 		=> __( 'Tab Margin', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .filter-menu1 button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'tab_padding',
			[
				'label' 		=> __( 'Tab Padding', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .filter-menu1 button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'project_style_section',
			[
				'label' 	=> __( 'Project Style', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'project_bg_color',
			[
				'label' 		=> __( 'Project Background Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .project-style3 .project-bottom' => 'background-color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'project_title_color',
			[
				'label' 		=> __( 'Project Title Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .project-style3 .project-title' => 'color: {{VALUE}}',
				],
			]
        );
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'project_title_typography',
				'label' 	=> __( 'Project Title Typography', 'wellnez' ),
				'selector' 	=> '{{WRAPPER}} .project-style3 .project-title',
			]
        );
		
        $this->add_control(
			'project_subtitle_color',
			[
				'label' 		=> __( 'Project SubTitle Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .project-style3 .project-category' => 'color: {{VALUE}}',
				],
			]
        );
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'project_subtitle_typography',
				'label' 	=> __( 'Project SubTitle Typography', 'wellnez' ),
				'selector' 	=> '{{WRAPPER}} .project-style3 .project-category',
			]
        );
    
        $this->end_controls_section();


	}


	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'wrapper', 'class', 'row filter-active2' );

		if( ! empty( $settings['slides'] ) || ! empty( $settings['project_slides'] ) ){

			echo '<section class="vs-project-wrapper">';
				echo '<div class="container">';
					echo '<div class="filter-menu1 filter-menu-active">';
						echo '<button data-filter="*" class="active">'.esc_html__( 'All', 'wellnez' ).'</button>';
						foreach( $settings['slides'] as $tab_data ) {
							$data 			= strtolower( $tab_data['tab_text'] );
							$replace 		= array(' ','-',' - ');
							$with 			= array('','','');
							$final_data 	= str_replace( $replace, $with, $data );
							echo '<button data-filter=".'.esc_attr( $final_data ).'">'.esc_html( $tab_data['tab_text'] ).'</button>';
						}
					echo '</div>';
                    echo '<div '.$this->get_render_attribute_string('wrapper').'>';

                        foreach( $settings['project_slides'] as $singleslide ) {
							$cat_one 			= strtolower( $singleslide['category_one'] );
							$cat_two 			= strtolower( $singleslide['category_two'] );
							$cat_three 			= strtolower( $singleslide['category_three'] );
							$cat_four 			= strtolower( $singleslide['category_four'] );
							$replace 			= array(' ','-',' - ');
							$with 				= array('','','');
							$cat_one_final 		= str_replace( $replace, $with, $cat_one );
							$cat_two_final 		= str_replace( $replace, $with, $cat_two );
							$cat_three_final 	= str_replace( $replace, $with, $cat_three );
							$cat_four_final 	= str_replace( $replace, $with, $cat_four );
							echo '<div class="col-md-6 col-lg-4 filter-item '.esc_attr( $cat_one_final.' '.$cat_two_final.' '.$cat_three_final .' '.$cat_four_final ).'">';
								echo '<div class="project-style3">';
									if( ! empty( $singleslide['project_image']['url'] ) ){
										echo '<div class="project-img">';
											echo wellnez_img_tag( array(
												'url'	=> esc_url( $singleslide['project_image']['url'] ),
											) );
										echo '</div>';
									}
									echo '<div class="project-bottom">';
										echo '<div class="media-body">';
											if( ! empty( $singleslide['project_title'] ) ){
												echo '<h3 class="project-title h5"><a href="'.esc_url( $singleslide['project_details_url'] ).'" class="text-reset">'.esc_html( $singleslide['project_title'] ).'</a></h3>';
											}
											
											if( ! empty( $singleslide['project_subtitle'] ) ){
												echo '<div class="project-category">'.esc_html( $singleslide['project_subtitle'] ).'</div>';
											}
										echo '</div>';
										echo '<a href="'.esc_url( $singleslide['project_details_url'] ).'" class="icon-btn style4"><i class="fas fa-long-arrow-right"></i></a>';
									echo '</div>';
								echo '</div>';
		                    echo '</div>';
                        }
                    echo '</div>';
	            echo '</div>';
		    echo '</section>';
		}
	}

}