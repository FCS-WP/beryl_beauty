<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Background;
/**
 *
 * Plan Box Widget .
 *
 */
class Mixlax_Plan_Box extends Widget_Base {

	public function get_name() {
		return 'mixlaxplanbox';
	}

	public function get_title() {
		return __( 'Plan Box', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }


	public function get_categories() {
		return [ 'mixlax' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'plan_section',
			[
				'label' => __( 'Plan Box', 'mixlax' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'plan_desc',
			[
				'label' 	=> __( 'Description', 'mixlax' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default' 	=> __( 'Plan Box Description', 'mixlax' ),
			]
		);
		$this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'mixlax' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default' 	=> __( 'Get Services', 'mixlax' ),
			]
		);
        $this->add_control(
			'link',
			[
				'label' 			=> __( 'Link', 'mixlax' ),
				'type' 				=> Controls_Manager::URL,
                'placeholder' 		=> __( 'https://your-link.com', 'mixlax' ),
                'show_external' 	=> true,
				'default' 			=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
        );
        
        $this->end_controls_section();

		$this->start_controls_section(
			'plan_box_style',
			[
				'label'		 => __( 'Style', 'mixlax' ),
				'tab'		 => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' 		=> 'background',
				'label' 	=> __( 'Background', 'mixlax' ),
				'types' 	=> [ 'classic', 'gradient', 'video' ],
				'selector'	=> '{{WRAPPER}} .price-plan-layout1 .price-action-box',
			]
		);
		$this->add_control(
			'shape_image',
			[
				'label' 	=> __( 'Shape Image', 'mixlax' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => Utils::get_placeholder_image_src(),
				],
				'selectors' => [
					'{{WRAPPER}} .price-plan-layout1 .price-action-box .shape1' => 'background-image: url({{URL}})',
                ]
			]
		);
		$this->add_control(
			'desc_color',
			[
				'label' 	=> __( 'Description Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-plan-layout1 .price-action-box .text' => 'color: {{VALUE}}',
                ]
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'desc_typography',
				'label' 	=> __( 'Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .price-plan-layout1 .price-action-box .text',
			]
		);
		
		$this->add_control(
			'button_color',
			[
				'label' => __( 'Button Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .primary-btn' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_color',
			[
				'label' => __( 'Button Background Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .primary-btn' => 'background-color: {{VALUE}}',
                ],
			]
        );
        $this->add_control(
			'button_bg_color_hover',
			[
				'label' => __( 'Button Background Hover Color', 'mixlax' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .primary-btn .btn-bg' => 'background-color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __( 'Border', 'mixlax' ),
                'selector' => '{{WRAPPER}} .primary-btn',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography',
				'label' 	=> __( 'Button Typography', 'mixlax' ),
                'selector' 	=> '{{WRAPPER}} .primary-btn',
			]
        );
		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		
		$this->add_render_attribute( 'link', 'class', 'primary-btn white-btn' );
		
        if( !empty( $settings['link']['url'] ) ) {
            $this->add_render_attribute('link','href',esc_url( $settings['link']['url'] ));
        }

        if( !empty( $settings['link']['nofollow'] ) ) {
            $this->add_render_attribute('link','rel', 'nofollow' );
        }

        if( !empty( $settings['link']['is_external'] ) ) {
            $this->add_render_attribute('link','target','_blank');
        }
		echo '<div class="price-plan-wrapper price-plan-layout1">';
			echo '<!-- Price Action Box -->';
		        echo '<div class="price-action-box">';
		          	echo '<span class="shape shape1"></span>';
		          	echo '<span class="shape shape2"></span>';
					if( ! empty( $settings['plan_desc'] ) ){
			          	echo '<p class="text">'.wp_kses_post( $settings['plan_desc'] ).'</p>';
					}
					if( ! empty( $settings['button_text'] ) ){
						echo '<a '.$this->get_render_attribute_string('link').'>'.esc_html( $settings['button_text'] ).'</a>';
			        }
				echo '</div>';
	        echo '<!-- Price Action Box end -->';
		echo '</div>';
		
	}

}