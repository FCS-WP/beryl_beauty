<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
/**
 *
 * Number Widget .
 *
 */
class Mixlax_Number_Widgets extends Widget_Base {

	public function get_name() {
		return 'mixlaxnumberwidget';
	}

	public function get_title() {
		return __( 'Inquiry Number', 'mixlax' );
	}


	public function get_icon() {
		return 'icon-Group-825';
    }


	public function get_categories() {
		return [ 'mixlax_footer_elements' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'inquiry_section',
			[
				'label'     => __( 'Inquiry Number', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'inquiry_title',
			[
				'label'     => __( 'Inquiry Title', 'mixlax' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __( 'Have Inquiry? Just Call', 'mixlax' ),
			]
        );
        $this->add_control(
			'inquiry_logo',
			[
				'label'     => __( 'Choose Logo', 'mixlax' ),
				'type'      => Controls_Manager::MEDIA,
			]
		);
        $this->add_control(
			'inquiry_number_one',
			[
				'label'     => __( 'Number', 'mixlax' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __( '02 658 478 9654', 'mixlax' )
			]
        );
        $this->add_control(
			'inquiry_number_two',
			[
				'label'     => __( 'Number', 'mixlax' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __( '02 658 478 9654', 'mixlax' )
			]
        );
        $this->add_control(
			'inquiry_number_three',
			[
				'label'     => __( 'Number', 'mixlax' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __( '02 658 478 9654', 'mixlax' )
			]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'inquiry_number_title_section',
			[
				'label'     => __( 'Title Style', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
			'inquiry_title_color',
			[
				'label'     => __( 'Title Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .widget.widget_inquiry .widget_title' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'inquiry_title_typography',
				'label'     => __( 'Title Typography', 'mixlax' ),
                'selector'  => '{{WRAPPER}} .widget.widget_inquiry .widget_title',
			]
        );
        $this->add_responsive_control(
			'inquiry_title_margin',
			[
				'label'         => __( 'Title Margin', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .widget.widget_inquiry .widget_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'devices' => [ 'desktop', 'tablet','mobile' ],
			]
        );
        $this->add_responsive_control(
			'inquiry_title_padding',
			[
				'label'         => __( 'Title Padding', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .widget.widget_inquiry .widget_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'devices' => [ 'desktop', 'tablet','mobile' ],
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
            'inquiry_image_style_section',
            [
                'label'     => __( 'Image Style', 'mixlax' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'inquiry_image_margin',
            [
                'label'         => __( 'Image Margin', 'mixlax' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .widget.widget_inquiry .media img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'devices' => [ 'desktop', 'tablet','mobile' ],
            ]
        );
        $this->add_responsive_control(
            'inquiry_image_padding',
            [
                'label'         => __( 'Image Padding', 'mixlax' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .widget.widget_inquiry .media img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'devices' => [ 'desktop', 'tablet','mobile' ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
			'inquiry_number_style_section',
			[
				'label'     => __( 'Number Style', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'inquiry_number_color',
			[
				'label'     => __( 'Number Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .inquiry_number a' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_control(
			'inquiry_number_color_hover',
			[
				'label'     => __( 'Number Color On Hover', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .inquiry_number a:hover' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'inquiry_number_typography',
				'label'     => __( 'Number Typography', 'mixlax' ),
                'selector'  => '{{WRAPPER}} .inquiry_number a',
			]
        );
        $this->add_responsive_control(
			'inquiry_number_margin',
			[
				'label'         => __( 'Number Margin', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .widget.widget_inquiry .inquiry_number a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'devices'       => [ 'desktop', 'tablet','mobile' ],
			]
        );
        $this->add_responsive_control(
			'inquiry_number_padding',
			[
				'label'         => __( 'Number Padding', 'mixlax' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .widget.widget_inquiry .inquiry_number a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'devices'       => [ 'desktop', 'tablet','mobile' ],
			]
		);

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $mobile   =  $settings['inquiry_number_one'] ;
        $mobile01 =  $settings['inquiry_number_two'] ;
        $mobile02 =  $settings['inquiry_number_three'] ;

        $replace 		= array(' ','-',' - ');
        $with 	 		= array('','','');
        $mobileurl 	    = str_replace( $replace, $with, $mobile );

        $mobile01url 	= str_replace( $replace, $with, $mobile01 );

        $mobile02url 	= str_replace( $replace, $with, $mobile02 );

        echo '<div class="widget widget_inquiry">';
            if( !empty( $settings['inquiry_title'] ) ){
                echo mixlax_heading_tag( array(
                    'text'      => esc_html( $settings['inquiry_title'] ),
                    'tag'       => 'h3',
                    'class'     => 'widget_title',
                ) );
            }

            echo '<div class="media">';
                if( !empty( $settings['inquiry_logo']['url'] ) ){
                    echo wellnez_img_tag( array(
                        'url'       => esc_url( $settings['inquiry_logo']['url'] ),
                    ) );
                }

                echo '<div class="media-body inquiry_number">';
                    if( !empty( $mobile ) ){
                        echo '<a href="'.esc_attr( 'tel:'.$mobileurl ).'">'.esc_html( $mobile ).'</a>';
                    }
                    if( !empty( $mobile01 ) ){
                        echo '<a href="'.esc_attr( 'tel:'.$mobile01url ).'">'.esc_html( $mobile01 ).'</a>';
                    }
                    if( !empty( $mobile02 ) ){
                        echo '<a href="'.esc_attr( 'tel:'.$mobile02url ).'">'.esc_html( $mobile02 ).'</a>';
                    }
                echo '</div>';
            echo '</div>';
        echo '</div>';

	}
}