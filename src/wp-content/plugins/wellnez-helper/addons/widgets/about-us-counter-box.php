<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
/**
 *
 * About Us Counter Box Widget .
 *
 */
class Mixlax_Aboutus_Counter_Box extends Widget_Base {

	public function get_name() {
		return 'mixlaxaboutuscountbox';
	}

	public function get_title() {
		return __( 'About Us Count Box', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

	public function get_script_depends() {
		return [ 'counter-up' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'counter_section',
			[
				'label' 	=> __( 'Content', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'image_one',
			[
				'label'     => __( 'Choose About Us One Image', 'mixlax' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'image_two',
			[
				'label'     => __( 'Choose About Us Two Image', 'mixlax' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
			'link',
			[
				'label'         => __( 'Link', 'mixlax' ),
				'type'          => Controls_Manager::URL,
                'placeholder'   => __( 'https://your-link.com', 'mixlax' ),
                'show_external' => true,
				'default'       => [
					'url'          => '#',
					'is_external'  => true,
					'nofollow'     => true,
				],
			]
        );

		$this->add_control(
			'counter_number',
			[
				'label'     => __( 'Counter Number', 'mixlax' ),
				'type'      => Controls_Manager::TEXTAREA,
				'default' 	=> __( '25', 'mixlax' ),
			]
		);

		$this->add_control(
			'counter_text',
			[
				'label'     => __( 'Counter Text', 'mixlax' ),
				'type'      => Controls_Manager::TEXTAREA,
				'default' 	=> __( 'Years Of Experience', 'mixlax' ),
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'counterup_style_section',
			[
				'label' 	=> __( 'Counter Up Style', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'counterup_bg_color',
			[
				'label' 	=> __( 'Background Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-box1' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'counterup_color',
			[
				'label' 		=> __( 'Counter Up Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .counter-box1 .counter' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'counterup_typhography',
				'label' 		=> __( 'Counter Up Typography', 'mixlax' ),
				'selector' 		=> '{{WRAPPER}} .counter-box1 .counter',
			]
		);
		$this->add_control(
			'counterup_text_color',
			[
				'label' 		=> __( 'Counter Up Text Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .counter-box1 .counter-text' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'counterup_text_typhography',
				'label' 		=> __( 'Counter Up Text Typography', 'mixlax' ),
				'selector' 		=> '{{WRAPPER}} .counter-box1 .counter-text',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( ! empty( $settings['link']['url'] ) ) {
            $this->add_render_attribute('link','href',esc_url( $settings['link']['url'] ));
        }

        if( ! empty( $settings['link']['nofollow'] ) ) {
            $this->add_render_attribute( 'link', 'rel', 'nofollow' );
        }

        if( ! empty( $settings['link']['is_external'] ) ) {
            $this->add_render_attribute('link','target','_blank');
        }

        echo '<div class="about-image-box4 position-relative mb-30 mb-xl-0 pb-90">';
            echo '<div class="big-img d-block d-lg-inline-block">';
                if( ! empty( $settings['link']['url'] ) ){
                    echo '<a '.$this->get_render_attribute_string('link').'>';
                }
                if( ! empty( $settings['image_one']['url'] ) ){
                    echo wellnez_img_tag( array(
                        'url'   => esc_url( $settings['image_one']['url'] ),
                    ) );
                }
                if( !empty( $settings['link']['url'] ) ){
                   echo '</a>';
				}
            echo '</div>';
            echo '<div class="small-img1 d-none d-xl-inline-block">';
                if( ! empty( $settings['link']['url'] ) ){
                    echo '<a '.$this->get_render_attribute_string('link').'>';
                }
                if( ! empty( $settings['image_two']['url'] ) ){
                    echo wellnez_img_tag( array(
                        'url'   => esc_url( $settings['image_two']['url'] ),
                        'class' => 'w-100',
                    ) );
                }
                if( !empty( $settings['link']['url'] ) ){
                   echo '</a>';
				}
            echo '</div>';
            echo '<div class="experance-box">';
                echo '<div class="box-content bg-theme">';
                    if( ! empty( $settings['counter_number'] ) ){
                        echo '<span class="text-font2 sec-title-style1 text-white counter">'.esc_html( $settings['counter_number'] ).'</span>';
                    }
                    if( !empty( $settings['counter_text'] ) ){
                        echo '<p class="text-font2 text-md mb-0 text-white">'.esc_html( $settings['counter_text'] ).'</p>';
                    }
                echo '</div>';
            echo '</div>';
        echo '</div>';

	}

}