<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
/**
 *
 * Pagination Layout Widget .
 *
 */
class Mixlax_Pagination_Layout extends Widget_Base {

	public function get_name() {
		return 'mixlaxpaginationlayout';
	}

	public function get_title() {
		return __( 'Pagination Layout', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'pagination_section',
			[
				'label'     => __( 'Pagination', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'prev_title_text',
			[
				'label' 	=> __( 'Prev Title', 'mixlax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Prev Project', 'mixlax' )
			]
        );

        $this->add_control(
			'prev_desc_text',
			[
				'label' 	=> __( 'Prev Description Text', 'mixlax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Relaxation & Body Massage', 'mixlax' )
			]
        );

        $this->add_control(
			'prev_link',
			[
				'label' 		=> __( 'Prev Link', 'mixlax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'mixlax' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

        $this->add_control(
			'next_title_text',
			[
				'label' 	=> __( 'Next Title', 'mixlax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Next Project', 'mixlax' )
			]
        );

        $this->add_control(
			'next_desc_text',
			[
				'label' 	=> __( 'Next Description Text', 'mixlax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Hair Style & Color', 'mixlax' )
			]
        );

        $this->add_control(
			'next_link',
			[
				'label' 		=> __( 'Next Link', 'mixlax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'mixlax' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'pagination_style_section',
			[
				'label' 	=> __( 'Style', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'title_color',
			[
				'label' 	=> __( 'Title Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pagination-content .pagi-title' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'title_hover_color',
			[
				'label' 	=> __( 'Title Hover Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pagination-content .pagi-title a:hover' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'title_typography',
				'label'         => __( 'Title Typography', 'mixlax' ),
                'selector'      => '{{WRAPPER}} .pagination-content .pagi-title',
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
                ]
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
			'description_color',
			[
				'label' 	=> __( 'Description Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pagination-content span' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'description_typography',
				'label'         => __( 'Button Typography', 'mixlax' ),
                'selector'      => '{{WRAPPER}} .pagination-content span',
			]
        );

        $this->add_responsive_control(
			'description_margin',
			[
				'label' 		=> __( 'Description Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .pagination-content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'description_padding',
			[
				'label' 		=> __( 'Description Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .pagination-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<!-- Post Pagination -->';
        echo '<div class="pagination-wrapper pagination-layout2 p-2 p-lg-4 link-inherit">';
            echo '<div class="row justify-content-between ">';
                echo '<div class="col-4">';
                    echo '<div class="pagination-content">';
                        if( ! empty( $settings['prev_title_text'] ) ){
                            $target     = $settings['prev_link']['is_external'] ? ' target="_blank"' : '';
		                    $nofollow   = $settings['prev_link']['nofollow'] ? ' rel="nofollow"' : '';
                            echo '<h4 class="pagi-title mb-0"><a '.wp_kses_post( $target.$nofollow ).' href="'.esc_url( $settings['prev_link']['url'] ).'">'.esc_html( $settings['prev_title_text'] ).'</a></h4>';
                        }
                        if( ! empty( $settings['prev_desc_text'] ) ){
                            echo '<span>'.esc_html( $settings['prev_desc_text'] ).'</span>';
                        }
                    echo '</div>';
                echo '</div>';
                echo '<div class="col-3 text-center align-self-center">';
                    echo '<div class="icon-btn bg-theme"><i class="far fa-bars"></i></div>';
                echo '</div>';
                echo '<div class="col-4">';
                    echo '<div class="pagination-content text-right">';
                        if( ! empty( $settings['next_title_text'] ) ){
                            $target_two     = $settings['next_link']['is_external'] ? ' target="_blank"' : '';
                            $nofollow_two   = $settings['next_link']['nofollow'] ? ' rel="nofollow"' : '';
                            echo '<h4 class="pagi-title mb-0"><a '.wp_kses_post( $target_two.$nofollow_two ).' href="'.esc_url( $settings['next_link']['url'] ).'">'.esc_html( $settings['next_title_text'] ).'</a></h4>';
                        }
                        if( ! empty( $settings['next_desc_text'] ) ){
                            echo '<span>'.esc_html( $settings['next_desc_text'] ).'</span>';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
	}

}