<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Repeater;
use \Elementor\Utils;
/**
 *
 * Pricing Box Widget .
 *
 */
class Wellnez_Pricing_Box extends Widget_Base {

	public function get_name() {
		return 'wellnezpricingbox';
	}

	public function get_title() {
		return __( 'Pricing Box', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'pricing_table_section',
			[
				'label' 	=> __( 'Pricing Box', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'package_shape',
			[
				'label' 		=> __( 'Package Shape', 'wellnez' ),
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
			'price',
			[
				'label'     => __( 'Price', 'wellnez' ),
                'type'      => Controls_Manager::TEXT,
				'default'   => __('12'),
				'label_block' => true,
			]
        );
		$this->add_control(
			'currency',
			[
				'label'     => __( 'Currency', 'wellnez' ),
                'type'      => Controls_Manager::TEXT,
				'default'   => __('$'),
				'label_block' => true,
			]
        );
		$this->add_control(
			'package',
			[
				'label'     => __( 'Package Name', 'wellnez' ),
                'type'      => Controls_Manager::TEXT,
				'default'   => __('Mega Plan'),
				'label_block' => true,
			]
        );
		$this->add_control(
			'package_duration',
			[
				'label'     => __( 'Package Duration', 'wellnez' ),
                'type'      => Controls_Manager::TEXT,
				'default'   => __('Bridal & 3 Person'),
				'label_block' => true,
			]
        );

		$this->add_control(
			'package_list',
			[
				'label'     => __( 'Package Feature', 'wellnez' ),
                'type'      => Controls_Manager::WYSIWYG,
				'default'   => __('Free Custom Domain'),
			]
        );

		$this->add_control(
			'package_btn',
			[
				'label'     => __( 'Button Text', 'wellnez' ),
                'type'      => Controls_Manager::TEXT,
				'default'   => __('Book Now'),
				'label_block' => true,
			]
        );


        $this->add_control(
			'link',
			[
				'label' 		=> __( 'Link', 'wellnez' ),
				'type' 			=> Controls_Manager::URL,
                'placeholder' 	=> __( '#', 'wellnez' ),
                'show_external' => true,
				'default' 		=> [
					'url' 			=> '',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
        );
		$this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();

		// This Button Crad One
		if( !empty( $settings['link']['url'] ) ) {
            $this->add_render_attribute('link','href',esc_url( $settings['link']['url'] ));
        }
        if( !empty( $settings['link']['nofollow'] ) ) {
            $this->add_render_attribute('link','rel', 'nofollow' );
        }
        if( !empty( $settings['link']['is_external'] ) ) {
            $this->add_render_attribute('link','target','_blank');
        }
		$this->add_render_attribute('link','class', 'vs-btn style3' );

		?>
		<div class="package-style1">
			<div class="package-top">
				<div class="package-left">
					<?php if(!empty($settings['price'])): ?>
						<p class="package-price">
							<?php echo esc_html($settings['price']); ?><span class="currency"><?php echo esc_html($settings['currency']); ?>
							</span>
						</p>
					<?php endif; ?>
					<?php if($settings['package_duration']): ?>
						<p class="package-duration">
							<?php echo esc_html( $settings['package_duration'] ); ?>
						</p>
					<?php ?>
				</div>
				<?php if(!empty($settings['package'])): ?>
					<h3 class="package-name">
						<?php echo esc_html($settings['package']); ?>
					</h3>
				<?php endif; ?>
			</div>

			<?php if($settings['package_shape']['url']): ?>
				<div class="package-shape">
					<?php echo wellnez_img_tag( array(
						'url'	=> esc_url( $settings['package_shape']['url'] ),
						'alt'   => 'shape',
					) );
					?>
				</div>
			<?php endif; ?>

			<div class="package-list">
				<ul class="list-unstyled">
					<?php  echo wp_kses_post( $settings['package_list'] ); ?>
				</ul>
			</div>

			<?php if(!empty($settings['package_btn'])); ?>
				<div class="package-btn">
					<a <?php echo $this->get_render_attribute_string('link'); ?>>
						<?php echo esc_html($settings['package_btn']); ?>
					</a>
				</div>
			<?php endif; ?>
		</div>
		<?php 

		 
	}
}