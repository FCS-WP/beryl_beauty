<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
use \Elementor\Utils;
/**
 *
 * Contact Info Widget .
 *
 */
class Mixlax_Contact_Slider extends Widget_Base {

	public function get_name() {
		return 'mixlaxcontactslider';
	}

	public function get_title() {
		return __( 'Contact Slider', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'contact_info_section',
			[
				'label' 	=> __( 'Contact Slider', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$repeater = new Repeater();

		$repeater->add_control(
			'contact_info_bg',
			[
				'label' 	=> __( 'Background Image', 'mixlax' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' => [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'contact_icon',
			[
				'label'         => __( 'Choose Contact Icon', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => 'flaticon-contact',
			]
		);

		$repeater->add_control(
			'contact_title',
			[
				'label'         => __( 'Set Title', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'New York', 'mixlax' ),
			]
		);

		$repeater->add_control(
			'contact_info',
			[
				'label'         => __( 'Set Contact Info', 'mixlax' ),
				'type'          => Controls_Manager::WYSIWYG,
			]
		);

		$repeater->add_control(
			'button_text',
			[
				'label'         => __( 'Set Button Text', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Get Directions', 'mixlax' ),
			]
		);

		$repeater->add_control(
			'button_url',
			[
				'label'         => __( 'Set Button Url', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '#', 'mixlax' ),
			]
		);



		$this->add_control(
			'contact_information',
			[
				'label' 		=> __( 'Contact Information', 'mixlax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'contact_icon' 			=> __( 'flaticon-contact', 'mixlax' ),
						'contact_title' 		=> __( 'New York', 'mixlax' ),
					],
					[
						'contact_icon' 			=> __( 'flaticon-contact', 'mixlax' ),
						'contact_title' 		=> __( 'New York', 'mixlax' ),
					],
					[
						'contact_icon' 			=> __( 'flaticon-contact', 'mixlax' ),
						'contact_title' 		=> __( 'New York', 'mixlax' ),
					],
					[
						'contact_icon' 			=> __( 'flaticon-contact', 'mixlax' ),
						'contact_title' 		=> __( 'New York', 'mixlax' ),
					],
				],
                'title_field' 	=> '{{{ email_address_one }}}',
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'slider_control_section',
			[
				'label' 		=> __( 'Slider Control', 'mixlax' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'desktop_items',
			[
				'label' 		=> __( 'Items To Show', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ '%' ],
				'range' 		=> [
					'%' 	=> [
						'min' 		=> 0,
						'step' 		=> 1,
						'max' 		=> 10,
					],
				],
				'default' 		=> [
					'unit' 			=> '%',
					'size' 			=> 3,
				],
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'general',
			[
				'label' 	=> __( 'General', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'box_background_color',
			[
				'label' 		=> __( 'Box Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-contact-box1' => 'background-color:{{VALUE}}',
                ]
			]
        );

		$this->add_control(
			'box_border_color',
			[
				'label' 		=> __( 'Box Border Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-contact-box1' => 'border: 2px solid {{VALUE}}',
                ]
			]
        );

		$this->add_control(
			'icon_color',
			[
				'label' 		=> __( 'Icon Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-contact-box1 .icon' => 'color: {{VALUE}}',
                ]
			]
        );

		$this->add_control(
			'active_text_color',
			[
				'label' 		=> __( 'Active Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .slick-center .vs-contact-box1 > *' => 'color: {{VALUE}}',
                ]
			]
        );

		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'wrapper', 'class', 'row vs-carousel' );

        $this->add_render_attribute( 'wrapper', 'data-slide-to-show', $settings['desktop_items']['size'] );

        $this->add_render_attribute( 'wrapper', 'data-centermode', 'true' );


		echo '<section class="vs-contactinfo-wrapper">';
			echo '<div class="container">';
				echo '<div '.$this->get_render_attribute_string( 'wrapper' ).'>';
					if( !empty( $settings['contact_information'] ) ):
						foreach( $settings['contact_information'] as $contact ):
							echo '<div class="col-lg-4">';
			                    echo '<div class="vs-contact-box1 text-center mb-30">';
									if( ! empty( $contact['contact_info_bg']['url'] ) ){
				                        echo '<div class="contact-img background-image" data-vs-img="'.esc_url( $contact['contact_info_bg']['url'] ).'" data-overlay="black" data-opacity="7"></div>';
									}
									if( ! empty( $contact['contact_icon'] ) ){
				                        echo '<span class="icon mb-4 d-block"><i class="fa-4x '.esc_attr( $contact['contact_icon'] ).'"></i></span>';
									}
									if( ! empty( $contact['contact_title'] ) ){
			                        	echo '<h4 class="mb-15">'.esc_html( $contact['contact_title'] ).'</h4>';
									}
									if( ! empty( $contact['contact_info'] ) ){
										echo  wp_kses_post( $contact['contact_info'] );
									}
									if( ! empty( $contact['button_text'] ) ){
				                        echo '<a href="'.esc_url( $contact['button_url'] ).'" class="vs-btn vs-style1">'.esc_html( $contact['button_text'] ).'</a>';
									}
			                    echo '</div>';
			                echo '</div>';
						endforeach;
					endif;
				echo '</div>';
			echo '</div>';
		echo '</section>';
	}

}