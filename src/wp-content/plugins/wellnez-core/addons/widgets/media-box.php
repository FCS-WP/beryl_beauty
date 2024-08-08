<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\HEADING;
use \Elementor\Repeater;
/**
 *
 * Image Widget .
 *
 */
class Wellnez_MediaBox extends Widget_Base {

	public function get_name() {
		return 'wellnezmediabox';
	}
 
	public function get_title() {
		return __( 'MediaBox Image', 'wellnez' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'wellnez' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'image_section',
			[
				'label' 	=> __( 'Images', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'media_image',
			[
				'label' 		=> __( 'Image', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'dis_content', [
				'label' 		=> __( 'Content', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'A range of different massage techniques, reflexology, body scrubs and facial are available on site which will help you unwind ' , 'wellnez' ),
				'label_block' 	=> true,
			]
        );
        $this->end_controls_section();


		
		$this->start_controls_section(
			'mdeia_style_option',
			[
				'label' 	=> __( 'Style', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'mdeia_color',
			[
				'label' 		=> __( 'Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .media-style4 .media-text' => 'color: {{VALUE}}',
                ]
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'mdeia_typography',
				'label'         => __( 'Typography', 'wellnez' ),
                'selector'      => '{{WRAPPER}} .media-style4 .media-text',
			]
		);
		$this->add_responsive_control(
			'mdeia_margin',
			[
				'label'         => __( 'Image Margin', 'wellnez' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .media-style4 .media-img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		
		?>

        <div class="media-style4 mb-4">
             <?php if( $settings['media_image']['url'] ): ?>
				<div class="media-img">
					<?php echo wellnez_img_tag( array(
						'url'	=> esc_url( $settings['media_image']['url'] ),
						'alt'   => 'media',
					) );
					?>
				</div>
			<?php endif; ?>
            <div class="media-body">
                <p class="media-text">
                    <?php echo esc_html( $settings[ 'dis_content' ] ); ?>
                </p>
            </div>
        </div>
	<?php
	}

}