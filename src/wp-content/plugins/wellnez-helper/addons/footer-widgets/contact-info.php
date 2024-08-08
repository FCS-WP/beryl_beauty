<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
/**
 *
 * Contact Widget .
 *
 */
class Mixlax_Contact_Info_Widgets extends Widget_Base {

	public function get_name() {
		return 'mixlaxcontactinfo';
	}

	public function get_title() {
		return __( 'Contact Info', 'mixlax' );
	}


	public function get_icon() {
		return 'fa fa-code';
    }


	public function get_categories() {
		return [ 'mixlax_footer_elements' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'contact_info_section',
			[
				'label'     => __( 'Contact Info', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );
		
		$this->add_control(
			'info_style',
			[
				'label' 	=> __( 'Contact Info Style', 'mixlax' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'mixlax' ),
					'2' 		=> __( 'Style Two', 'mixlax' ),
					
				],
			]
		);
		
        $this->add_control(
			'contact_title',
			[
				'label'     => __( 'Contact Title', 'mixlax' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __( 'Contact Us', 'mixlax' ),
			]
        );
		
		$repeater = new Repeater();

		$repeater->add_control(
			'open_day',
			[
				'label'     => __( 'Office Open Day', 'mixlax' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __( 'Mon - Fri:', 'mixlax' ),
			]
        );
		$repeater->add_control(
			'open_hour',
			[
				'label'     => __( 'Office Open Hour', 'mixlax' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __( ' 8.00 am - 8.00 pm', 'mixlax' ),
			]
        );
		$this->add_control(
			'office_hour',
			[
				'label' 		=> __( 'Office Hour', 'mixlax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'open_day' 	=> __( 'Mon - Fri:','mixlax' ),
						'open_hour' => __( ' 8.00 am - 8.00 pm','mixlax' ),
					],
					[
						'open_day' 	=> __( 'Saturday:','mixlax' ),
						'open_hour' => __( ' 9.00 am - 6.00 pm','mixlax' ),
					],
					[
						'open_day' 	=> __( 'Sunday','mixlax' ),
						'open_hour' => __( ' 9.00 am - 6.00 pm','mixlax' ),
					],
				],
				'condition'	=> [ 'info_style' => '2' ],
			]
		);
		
		$this->add_control(
			'phone_number',
			[
				'label'     => __( 'Phone Number', 'mixlax' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __( '+097 986 875 98 8', 'mixlax' ),
			]
        );
        $this->add_control(
			'email',
			[
				'label'     => __( 'Email', 'mixlax' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __( 'info@carvis.com', 'mixlax' ),
				'condition'	=> [ 'info_style' => '1' ],
			]
        );
		$this->add_control(
			'address',
			[
				'label'     => __( 'Address', 'mixlax' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __( '14/A, Brown Tower, NewYork, US', 'mixlax' ),
				'condition'	=> [ 'info_style' => '1' ],
			]
        );
		$this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'mixlax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Button Text', 'mixlax' ),
				'condition'	=> [ 'info_style' => '1' ],
			]
        );

        $this->add_control(
			'button_link',
			[
				'label' 		=> __( 'Link', 'mixlax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'mixlax' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				'condition'	=> [ 'info_style' => '1' ],
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
			'contact_info_style_section',
			[
				'label'     => __( 'Style', 'mixlax' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
			'contact_title_color',
			[
				'label'     => __( 'Title Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .widget.widget_contact .widget_title' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'contact_title_typography',
				'label'     => __( 'Title Typography', 'mixlax' ),
                'selector'  => '{{WRAPPER}} .widget.widget_contact .widget_title',
			]
        );
        $this->add_control(
			'contact_info_color',
			[
				'label'     => __( 'Contact Info Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-layout2 .widget_contact p' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'contact_info_typography',
				'label'     => __( 'Contact Info Typography', 'mixlax' ),
                'selector'  => '{{WRAPPER}} .footer-layout2 .widget_contact p',
			]
        );
		$this->add_control(
			'contact_info_anchor_color',
			[
				'label'     => __( 'Contact Info Anchor Hover Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-layout2 .widget_contact p a:hover' => 'color: {{VALUE}}',
                ],
				'condition'	=> [ 'info_style' => '1' ],
			]
        );
		$this->add_control(
			'button_color',
			[
				'label'     => __( 'Button Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .primary-btn' => 'color: {{VALUE}}',
                ],
				'condition'	=> [ 'info_style' => '1' ],
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'button_typography',
				'label'     => __( 'Button Typography', 'mixlax' ),
                'selector'  => '{{WRAPPER}} .primary-btn',
				'condition'	=> [ 'info_style' => '1' ],
			]
        );
		$this->add_control(
			'widget_background_color',
			[
				'label'     => __( 'Widget Background Color', 'mixlax' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-layout2 .widget_contact' => 'background-color: {{VALUE}}',
                ],
				'condition'	=> [ 'info_style' => '1' ],
			]
        );
        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $phone_number   =  $settings['phone_number'] ;

    	$replace 		= array(' ','-',' - ');
    	$with 			= array('','','');
    	$phoneurl 		= str_replace( $replace, $with, $phone_number );
		if( $settings['info_style'] == '1' ){
			$email   		=  $settings['email'] ;
			$email 			= is_email( $email );
	    	$emailurl 		= str_replace( $replace, $with, $email );
			echo '<div class="footer-layout2">';
				echo '<div class="widget footer-widget widget_contact">';
					if( !empty( $settings['contact_title'] ) ){
						echo '<!-- title -->';
						echo '<h3 class="widget_title">'.esc_html( $settings['contact_title'] ).'</h3>';
					}
					if( !empty( $phone_number ) ){
						echo '<p>'.esc_html__( 'Phone: ','mixlax' ).'<a href="'.esc_attr( 'tel:'.$phoneurl ).'">'.esc_html( $phone_number ).'</a></p>';
					}
					if( !empty( $email ) ){
						echo '<p>'.esc_html__( 'Email: ','mixlax' ).'<a href="'.esc_attr( 'mailto:'.$emailurl ).'">'.esc_html( $email ).'</a></p>';
					}
					if( !empty( $settings['address'] ) ){
						echo '<p>'.wp_kses_post( $settings['address'] ).'</p>';
					}
					if( !empty( $settings['button_text'] ) ){
						$target 	= $settings['button_link']['is_external'] ? ' target="_blank"' : '';
						$nofollow 	= $settings['button_link']['nofollow'] ? ' rel="nofollow"' : '';
						echo '<a '.wp_kses_post( $target.$nofollow ).' href="'.esc_url( $settings['button_link']['url'] ).'" class="primary-btn skew type2">'.esc_html( $settings['button_text'] ).'</a>';
					}
				echo '</div>';
			echo '</div>';
        }else{
			echo '<div class="footer-layout4">';
				echo '<div class="widget footer-widget">';
					if( !empty( $settings['contact_title'] ) ){
						echo '<!-- title -->';
						echo '<h3 class="widget_title">'.esc_html( $settings['contact_title'] ).'</h3>';
					}
					echo '<div class="widget_contact">';
						if( ! empty( $settings['office_hour'] ) ){
							foreach ( $settings['office_hour'] as $office_hour ) {
								echo '<p class="contact-time mb-1"><span>'.esc_html( $office_hour['open_day'] ).'</span>'.esc_html( $office_hour['open_hour'] ).'</p>';
							}
						}
                        echo '<div class="call-box">';
                            echo '<p class="mt-3 mb-0"><strong>'.esc_html__( 'Call Us 24/7 On:', 'mixlax' ).'</strong></p>';
							if( !empty( $phone_number ) ){
								echo '<p><a href="'.esc_attr( 'tel:'.$phoneurl ).'">'.esc_html( $phone_number ).'</a></p>';
							}
                        echo '</div>';
                    echo '</div>';
				echo '</div>';
			echo '</div>';
		}
	}
}