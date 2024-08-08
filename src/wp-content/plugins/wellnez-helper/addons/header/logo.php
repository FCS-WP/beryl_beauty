<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Logo Widget .
 *
 */
class Mixlax_Logo extends Widget_Base {

	public function get_name() {
		return 'mixlaxlogo';
	}

	public function get_title() {
		return __( 'Logo', 'mixlax' );
	}


	public function get_icon() {
		return 'icon-Group-825';
    }
    

	public function get_categories() {
		return [ 'mixlax_header_elements' ];
	}

	
	protected function _register_controls() {

		$this->start_controls_section(
			'logo_section',
			[
				'label' => __( 'Logo', 'mixlax' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
        
        $this->add_control(
			'logo_img',
			[
				'label' => __( 'Logo', 'mixlax' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'defaultimage', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default' => 'large',
				'separator' => 'none',
			]
        );
        
        $this->add_control(
			'sticky_logo_img',
			[
				'label' => __( 'Sticky logo', 'mixlax' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'stickyimage', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default' => 'large',
				'separator' => 'none',
			]
		);

        $this->add_control(
			'website_link',
			[
				'label' => __( 'Logo Link', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_responsive_control(
			'logo_alignment',
			[
				'label' => __( 'Logo Alignment', 'mixlax' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'mixlax' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'mixlax' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'mixlax' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .mixlax-logo-wrapper' => 'text-align: {{VALUE}} !important;',
				],
				'default'	=> 'center',
				'toggle' => true,
			]
		);


        $this->end_controls_section();
        
        $this->start_controls_section(
			'logo_style_section',
			[
				'label' => __( 'Logo Style', 'mixlax' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_responsive_control(
			'width',
			[
				'label' => __( 'Width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%', 'px', 'vw' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .logo' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'space',
			[
				'label' => __( 'Max Width', 'elementor' ) . ' (%)',
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .logo' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'logo_margin',
			[
				'label' => __( 'Logo Margin', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .logo' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        
        $this->add_responsive_control(
			'logo_padding',
			[
				'label' => __( 'Logo Padding', 'mixlax' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}}  .logo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);
    

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('wrapper','class','logo');

        if( !empty( $settings['website_link']['url'] ) ) {
            $this->add_render_attribute('wrapper','href',esc_url( $settings['website_link']['url'] ));
        }

        if( !empty( $settings['website_link']['nofollow'] ) ) {
            $this->add_render_attribute('wrapper','rel', 'nofollow' );
        }

        if( !empty( $settings['website_link']['is_external'] ) ) {
            $this->add_render_attribute('wrapper','target','_blank');
        }
		echo '<!-- Logo -->';
		echo '<div class="mixlax-logo-wrapper">';
			echo '<a '.$this->get_render_attribute_string('wrapper').'>';
				echo '<img src="'.esc_url( Group_Control_Image_Size::get_attachment_image_src($settings['logo_img']['id'],'defaultimage',$settings) ).'" alt="'.esc_attr( wellnez_image_alt( Group_Control_Image_Size::get_attachment_image_src($settings['logo_img']['id'],'defaultimage',$settings) ) ).'" class="default-logo">';
				if( !empty( $settings['sticky_logo_img']['id'] ) ) {
					echo '<img src="'.esc_url( Group_Control_Image_Size::get_attachment_image_src($settings['sticky_logo_img']['id'],'stickyimage',$settings) ).'" alt="'.esc_attr( wellnez_image_alt( Group_Control_Image_Size::get_attachment_image_src($settings['sticky_logo_img']['id'],'stickyimage',$settings) ) ).'" class="sticky-logo">';
				}
			echo '</a>';
		echo '</div>';
		echo '<!-- End Logo -->';
	}

}