<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
/**
 *
 * About Widget .
 *
 */
class Mixlax_About_Widgets extends Widget_Base {

	public function get_name() {
		return 'mixlaxabout';
	}

	public function get_title() {
		return __( 'About Us', 'mixlax' );
	}


	public function get_icon() {
		return 'fa fa-code';
    }


	public function get_categories() {
		return [ 'mixlax_footer_elements' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'about_section',
			[
				'label'     => __( 'About Us Title', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'about_title',
			[
				'label'     => __( 'About Title', 'mixlax' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __( 'We Serve Quality Food', 'mixlax' )
			]
        );
        $this->add_control(
			'about_subtitle',
			[
				'label'     => __( 'About Subtitle', 'mixlax' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __( 'About Subtitle', 'mixlax' )
			]
        );
        $this->add_control(
			'service_action_title',
			[
				'label'     => __( 'Action Box Title', 'mixlax' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __( 'Services Hotline', 'mixlax' )
			]
        );
        $this->add_control(
			'phone_number',
			[
				'label'     => __( 'Phone Number', 'mixlax' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __( '05661-9262-0', 'mixlax' )
			]
        );
		
        $this->end_controls_section();

        $this->start_controls_section(
			'about_image_style_section',
			[
				'label'     => __( 'Image Style', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_responsive_control(
			'about_image_margin',
			[
				'label'         => __( 'Image Margin', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .widget.widget_about .widget_title img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'devices' => [ 'desktop', 'tablet','mobile' ],
			]
        );
        $this->add_responsive_control(
			'about_image_padding',
			[
				'label'         => __( 'Image Padding', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .widget.widget_about .widget_title img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'devices' => [ 'desktop', 'tablet','mobile' ],
			]
        );
        $this->end_controls_section();

        $this->start_controls_section(
			'about_title_style_section',
			[
				'label'     => __( 'Title Style', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
			'about_title_color',
			[
				'label'     => __( 'About Us Title Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .widget.widget_about .widget_title' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'about_title_typography',
				'label'     => __( 'About Title Typography', 'mixlax' ),
                'selector'  => '{{WRAPPER}} .widget.widget_about .widget_title',
			]
        );
        $this->add_responsive_control(
			'about_title_margin',
			[
				'label'         => __( 'About Title Margin', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .widget.widget_about .widget_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'devices' => [ 'desktop', 'tablet','mobile' ],
			]
        );
        $this->add_responsive_control(
			'about_title_padding',
			[
				'label'         => __( 'About Title Padding', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .widget.widget_about .widget_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'devices' => [ 'desktop', 'tablet','mobile' ],
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
			'about_subtitle_style_section',
			[
				'label'     => __( 'Subtitle Style', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'about_subtitle_color',
			[
				'label'     => __( 'About Subtitle Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .widget.widget_about p' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'about_subtitle_typography',
				'label'     => __( 'About Subtitle Typography', 'mixlax' ),
                'selector'  => '{{WRAPPER}} .widget.widget_about p',
			]
        );
        $this->add_responsive_control(
			'about_subtitle_margin',
			[
				'label'         => __( 'About Subtitle Margin', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .widget.widget_about p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'devices'       => [ 'desktop', 'tablet','mobile' ],
			]
        );
        $this->add_responsive_control(
			'about_subtitle_padding',
			[
				'label'         => __( 'About Subtitle Padding', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .widget.widget_about p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'devices'       => [ 'desktop', 'tablet','mobile' ],
			]
		);

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<div class="footer-area footer-layout3">';
        	echo '<div class="footer-wid-wrap">';
        		echo '<div class="widget footer-widget widget_about">';
		            if( !empty( $settings['about_title'] ) ){
		                echo '<h3 class="widget_title">';
		                    if( !empty( $settings['about_title'] ) ){
		                        echo esc_html( $settings['about_title'] );
		                    }
		                echo '</h3>';
		            }

		            if( !empty( $settings['about_subtitle'] ) ){
		                echo wellnez_paragraph_tag( array(
		                    'text'      => wp_kses_post( $settings['about_subtitle'] ),
							'class'		=> 'about-text',
		                ) );
		            }
					echo '<div class="action-box d-flex align-items-center">';
		              	echo '<div class="icon">';
		                	echo '<span><i class="fas fa-phone-alt"></i></span>';
		              	echo '</div>';
		              	echo '<div class="content">';
							if( !empty( $settings['service_action_title'] ) ){
			                	echo '<span>'.esc_html( $settings['service_action_title'] ).'</span>';
							}
							$phone 			= $settings['phone_number'];
							$replace 		= array(' ','-',' - ');
					    	$with 			= array('','','');
					    	$phoneurl 		= str_replace( $replace, $with, $phone );
		                	echo '<p class="text"><a href="'.esc_attr( 'tel:'.$phoneurl ).'">'.esc_html( $phone ).'</a></p>';
		              	echo '</div>';
		            echo '</div>';
        		echo '</div>';
        	echo '</div>';
        echo '</div>';

	}
}