<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
/**
 *
 * Project Next Prev
 *
 */
class Mixlax_Project_Next_Prev extends Widget_Base {

	public function get_name() {
		return 'mixlaxprojectnextprev';
	}

	public function get_title() {
		return __( 'Project Navigation', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'project_navigation',
			[
				'label'	 	=> __( 'Project Navigation', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'box_background',
			[
				'label' 		=> __( 'Background', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
                'selectors' 	=> [
                    '{{WRAPPER}} .pagination-wrapper' => 'background-color: {{VALUE}}',
                ],
			]
		);

        $this->add_control(
            'title_color',
            [
                'label' 		=> __( 'Title Color', 'mixlax' ),
                'type' 			=> Controls_Manager::COLOR,
                'selectors' 	=> [
                    '{{WRAPPER}} .pagination-content .pagi-title a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'title_hover_color',
            [
                'label' 		=> __( 'Title Hover Color', 'mixlax' ),
                'type' 			=> Controls_Manager::COLOR,
                'selectors' 	=> [
                    '{{WRAPPER}} .pagination-content .pagi-title a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'label' 		=> __( 'Title Typography', 'mixlax' ),
                'selector' 	    => '{{WRAPPER}} .pagination-content .pagi-title',
			]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Title Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .pagination-content .pagi-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Title Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .pagination-content .pagi-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'separator'     => 'after',
			]
		);

        $this->add_control(
            'post_title_color',
            [
                'label' 		=> __( 'Post Title Color', 'mixlax' ),
                'type' 			=> Controls_Manager::COLOR,
                'selectors' 	=> [
                    '{{WRAPPER}} .pagination-content span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'post_title_typography',
				'label' 		=> __( 'Post Title Typography', 'mixlax' ),
                'selector' 	    => '{{WRAPPER}} .pagination-content span',
			]
		);

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		$mixlax_prev_post = get_previous_post();

		$mixlax_next_post = get_next_post();

        echo '<!-- Post Pagination -->';
        echo '<div class="pagination-wrapper pagination-layout2 p-2 p-lg-4 link-inherit mt-60 mb-30">';
            echo '<div class="row justify-content-between ">';
                echo '<div class="col-4">';
                    if( $mixlax_prev_post ){
                        $mixlax_prev_post_link   = get_permalink( $mixlax_prev_post->ID );
                        echo '<div class="pagination-content">';
                            echo '<h4 class="pagi-title mb-0"><a href="'.esc_url( $mixlax_prev_post_link ).'">'.esc_html__( 'Prev Project', 'mixlax' ).'</a></h4>';
                            echo '<span>'.esc_html( $mixlax_prev_post->post_title ).'</span>';
                        echo '</div>';
                    }
                echo '</div>';
                echo '<div class="col-3 text-center align-self-center">';
                    echo '<span class="icon-btn bg-theme"><i class="far fa-bars"></i></span>';
                echo '</div>';
                echo '<div class="col-4">';
                    if( $mixlax_next_post ){
                        $mixlax_next_post_link   = get_permalink( $mixlax_next_post->ID );
                        echo '<div class="pagination-content text-right">';
                            echo '<h4 class="pagi-title mb-0"><a href="'.esc_url( $mixlax_next_post_link ).'">'.esc_html__( 'Next Project', 'mixlax' ).'</a></h4>';
                             echo '<span>'.esc_html( $mixlax_next_post->post_title ).'</span>';
                        echo '</div>';
                    }
                echo '</div>';
            echo '</div>';
        echo '</div>';
	}

}