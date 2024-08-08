<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
/**
 *
 * Newsletter Widget .
 *
 */
class Mixlax_Newsletter_Widgets extends Widget_Base {

	public function get_name() {
		return 'mixlaxnewsletter';
	}

	public function get_title() {
		return __( 'Newsletter', 'mixlax' );
	}


	public function get_icon() {
		return 'icon-Group-825';
    }


	public function get_categories() {
		return [ 'mixlax_footer_elements' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'newsletter_section',
			[
				'label'     => __( 'Newsletter Options', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'newsletter_style',
			[
				'label' 		=> __( 'Newsletter Style', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options' 		=> [
					'one'  	=> __( 'Style One', 'mixlax' ),
					'two' 	=> __( 'Style Two', 'mixlax' ),
				],
			]
		);
        $this->add_control(
			'newsletter_title',
			[
				'label'     => __( 'Newsletter Title', 'mixlax' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __( 'Newsletter Title', 'mixlax' )
			]
        );
		$this->add_control(
			'newsletter_sub',
			[
				'label'     => __( 'Newsletter Subtitle', 'mixlax' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __( 'Newsletter Subtitle', 'mixlax' )
			]
        );
        $this->add_control(
			'newsletter_subtitle',
			[
				'label'     => __( 'Newsletter Description', 'mixlax' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __( 'Newsletter Description', 'mixlax' )
			]
        );
        $this->add_control(
			'newsletter_placeholder',
			[
				'label'     => __( 'Newsletter Placeholder Text', 'mixlax' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __( 'Newsletter Placeholder Text', 'mixlax' )
			]
        );
        $this->add_control(
			'newsletter_icon',
			[
				'label'     => __( 'Icon', 'mixlax' ),
				'type'      => Controls_Manager::ICONS,
				'default'   => [
					'value'          => 'fa fa-sign-in',
					'library'        => 'solid',
				],
			]
		);
        $this->add_control(
			'newsletter_submit',
			[
				'label'     => __( 'Newsletter Submit Button Text', 'mixlax' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __( 'Newsletter Submit Button Text', 'mixlax' )
			]
        );
        $this->end_controls_section();

        $this->start_controls_section(
			'newsletter_title_style_section',
			[
				'label'     => __( 'Newsletter Style', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
            'newsletter_title_options',
            [
                'label'     => __( 'Newsletter Title Options', 'mixlax' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
			'newsletter_title_color',
			[
				'label'     => __( 'Newsletter Title Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .widget.widget_newsletter .widget_title' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'newsletter_title_typography',
				'label'     => __( 'Newsletter Title Typography', 'mixlax' ),
                'selector'  => '{{WRAPPER}} .widget.widget_newsletter .widget_title',
			]
        );
        $this->add_control(
			'newsletter_title_margin',
			[
				'label'         => __( 'Newsletter Title Margin', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .widget.widget_newsletter .widget_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->add_control(
			'newsletter_title_padding',
			[
				'label'         => __( 'Newsletter Title Padding', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .widget.widget_newsletter .widget_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);
		$this->add_control(
            'newsletter_sub_options',
            [
                'label'     => __( 'Newsletter Subtitle Options', 'mixlax' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
			'newsletter_sub_color',
			[
				'label'     => __( 'Newsletter Subtitle Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .widget.widget_newsletter .widget_sub' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'newsletter_sub_typography',
				'label'     => __( 'Newsletter Subtitle Typography', 'mixlax' ),
                'selector'  => '{{WRAPPER}} .widget.widget_newsletter .widget_sub',
			]
        );
        $this->add_control(
			'newsletter_sub_margin',
			[
				'label'         => __( 'Newsletter Subtitle Margin', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .widget.widget_newsletter .widget_sub' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->add_control(
			'newsletter_sub_padding',
			[
				'label'         => __( 'Newsletter Subtitle Padding', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .widget.widget_newsletter .widget_sub' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);
        $this->add_control(
			'newsletter_subtitle_options',
			[
				'label'     => __( 'Newsletter Description Options', 'mixlax' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'newsletter_subtitle_color',
			[
				'label'     => __( 'Newsletter Description Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .widget.widget_newsletter p' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'newsletter_subtitle_typography',
				'label'     => __( 'Newsletter Description Typography', 'mixlax' ),
                'selector'  => '{{WRAPPER}} .widget.widget_newsletter p',
			]
        );
        $this->add_control(
			'newsletter_subtitle_margin',
			[
				'label'         => __( 'Newsletter Description Margin', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .widget.widget_newsletter p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->add_control(
			'newsletter_subtitle_padding',
			[
				'label'         => __( 'Newsletter Description Padding', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .widget.widget_newsletter p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);
		$this->add_control(
            'newsletter_other_options',
            [
                'label'     => __( 'Newsletter Other Options', 'mixlax' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
		$this->add_control(
			'newsletter_write_color',
			[
				'label'     => __( 'Newsletter Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .widget.widget_newsletter input' => 'color: {{VALUE}}!important',
                ],
			]
        );
        $this->add_control(
			'newsletter_placeholder_color',
			[
				'label'     => __( 'Newsletter Placeholder Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .widget.widget_newsletter input::placeholder' => 'color: {{VALUE}}!important',
                ],
			]
        );
        $this->add_control(
			'newsletter_button_color',
			[
				'label'     => __( 'Newsletter Button Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .widget.widget_newsletter .submit-btn span' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_control(
			'newsletter_icon_color',
			[
				'label'     => __( 'Newsletter Icon Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .widget.widget_newsletter .submit-btn i' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'newsletter_button_typography',
				'label'     => __( 'Newsletter Button Typography', 'mixlax' ),
                'selector'  => '{{WRAPPER}} .widget.widget_newsletter .submit-btn',
			]
        );
		$this->add_control(
			'button_margin',
			[
				'label' 		=> __( 'Button Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .widget.widget_newsletter .submit-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_padding',
			[
				'label' 		=> __( 'Button Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .widget.widget_newsletter .submit-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'newsletter_button_border_color',
			[
				'label'     => __( 'Newsletter Button Border Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .widget.widget_newsletter .theme-input-group .submit-btn' => 'border-color: {{VALUE}}!important',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'input_border',
				'label'     => __( 'Border', 'mixlax' ),
				'selector'  => '{{WRAPPER}} .widget.widget_newsletter .theme-input-group input',
			]
		);

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( $settings['newsletter_style'] == 'one' ){
			$style_div = 'theme-input-group';
			$submit_btn = 'submit-btn';
		}else{
			$style_div = 'd-flex flex-column flex-sm-row align-items-sm-center';
			$submit_btn = 'ml-sm-4 mt-4 mt-sm-0 submit-btn btn_icon barlow';
		}

        echo '<div class="widget widget_newsletter">';
			if( !empty( $settings['newsletter_sub'] ) ){
				echo mixlax_heading_tag( array(
                    'tag'       => 'h6',
                    'text'      => esc_html( $settings['newsletter_sub'] ),
                    'class'     => 'widget_sub',
                ) );
			}
            if( !empty( $settings['newsletter_title'] ) ){
                echo mixlax_heading_tag( array(
                    'tag'       => 'h3',
                    'text'      => esc_html( $settings['newsletter_title'] ),
                    'class'     => 'widget_title',
                ) );
            }

            echo '<!-- Newsletter Form -->';
            echo '<form class="newslatter-form style_3">';
                if( !empty( $settings['newsletter_subtitle'] ) ){
                    echo wellnez_paragraph_tag( array(
                        'text'      => wp_kses_post( $settings['newsletter_subtitle'] ),
                    ) );
                }
                echo '<div class="'.esc_attr( $style_div ).'">';
                    echo '<input class="theme-input-style" type="email" placeholder="'.esc_attr( $settings['newsletter_placeholder'] ).'">';
                    echo '<button type="submit" class="'.esc_attr( $submit_btn ).'">';
                        if( !empty( $settings['newsletter_icon']['value'] ) ){
                            echo '<i class="'.$settings['newsletter_icon']['value'].'"></i>';
                        }
                        if( !empty( $settings['newsletter_submit'] ) ){
                            echo '<span>'.esc_html( $settings['newsletter_submit'] ).'</span>';
                        }
                    echo '</button>';
                echo '</div>';
            echo '</form>';
            echo '<!-- End Newsletter Form -->';
        echo '</div>';

	}
}