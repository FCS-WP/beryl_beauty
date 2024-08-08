<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
/**
 *
 * Offer Widget .
 *
 */
class Mixlax_Offer extends Widget_Base {

	public function get_name() {
		return 'mixlaxoffer';
	}

	public function get_title() {
		return __( 'Offer', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }


	public function get_categories() {
		return [ 'mixlax' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'offer_section',
			[
				'label' => __( 'Offer', 'mixlax' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'offer_img',
			[
				'label' 	=> __( 'Offer Image', 'mixlax' ),
				'type' 		=> Controls_Manager::MEDIA,
				'dynamic' 	=> [
					'active' => true,
				],
				'default' 	=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'offer_title',
			[
				'label' 	=> __( 'Title', 'mixlax' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default' 	=> __( 'Default Title', 'mixlax' ),
			]
		);
		$this->add_control(
			'offer_desc',
			[
				'label' 	=> __( 'Description', 'mixlax' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default' 	=> __( 'Offer Description', 'mixlax' ),
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
			'offer_style',
			[
				'label'		 => __( 'Style', 'mixlax' ),
				'tab'		 => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' 	=> __( 'Title Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .widget_offer_banner_horizontal .title' => 'color: {{VALUE}}',
                ]
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .widget_offer_banner_horizontal .title',
			]
		);
		$this->add_control(
			'round_background_color',
			[
				'label' 	=> __( 'Round Shape Background Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .widget_offer_banner_horizontal .price-box' => 'background-color: {{VALUE}}',
                ]
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'wrapper', 'class', 'widget widget_offer_banner_horizontal');
		
		$this->add_render_attribute( 'link', 'class', 'link-overlay' );
		
        if( !empty( $settings['link']['url'] ) ) {
            $this->add_render_attribute('link','href',esc_url( $settings['link']['url'] ));
        }

        if( !empty( $settings['link']['nofollow'] ) ) {
            $this->add_render_attribute('link','rel', 'nofollow' );
        }

        if( !empty( $settings['link']['is_external'] ) ) {
            $this->add_render_attribute('link','target','_blank');
        }
		
		echo '<!-- Offer Widget -->';
		echo '<div '.$this->get_render_attribute_string('wrapper').'>';
		  	echo '<a '.$this->get_render_attribute_string('link').'></a>';
			if( ! empty( $settings['offer_title'] ) ){
		  		echo '<h3 class="title">'.wp_kses_post( $settings['offer_title'] ).'</h3>';
			}
			if( ! empty( $settings['offer_desc'] ) ){
			  	echo '<div class="price-box">'.wp_kses_post( $settings['offer_desc'] ).'</div>';
			}
			if( ! empty( $settings['offer_img']['url'] ) ){
			  	echo wellnez_img_tag( array(
					'url'	=> esc_url( $settings['offer_img']['url'] ),
				) );
			}
		echo '</div>';
		echo '<!-- Offer Widget End -->';
	}

}