<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
/**
 *
 * Team Widget .
 *
 */
class Wellnez_Product_Banner extends Widget_Base {

	public function get_name() {
		return 'wellnezproductbanner';
	}

	public function get_title() {
		return __( 'Product Banner', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'banner-section',
			[
				'label'     => __( 'Banner Section', 'wellnez' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'productbanner_style',
			[
				'label' 		=> __( 'Banner Style', 'wellnez' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  			=> __( 'Style One', 'wellnez' ),
					'2' 			=> __( 'Style Two', 'wellnez' )
				],
			]
		);

        $this->add_control(
			'productbanner_iamge',
			[
				'label'     => __( 'Image', 'wellnez' ),
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
			'banner_title',
            [
				'label'         => __( 'Title', 'wellnez' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'skinpure NEW Beauty' , 'wellnez' ),
				'label_block'   => true,
			]
		);
		$this->add_control(
			'banner_regular_price',
            [
				'label'         => __( 'Regular Price', 'wellnez' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '$75.00' , 'wellnez' ),
				'label_block'   => true,
			]
		);

		$this->add_control(
			'banner_sell_price',
            [
				'label'         => __( 'Sell Price', 'wellnez' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '$18.00' , 'wellnez' ),
				'label_block'   => true,
			]
		);
		$this->add_control(
			'banner_url',
			[
				'label' 		=> __( 'Banner Url', 'wellnez' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'wellnez' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);
        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		// This Button Use Content Top
		if( !empty( $settings['banner_url']['url'] ) ) {
            $this->add_render_attribute('banner_url','href',esc_url( $settings['banner_url']['url'] ));
        }
        if( !empty( $settings['banner_url']['nofollow'] ) ) {
            $this->add_render_attribute('banner_url','rel', 'nofollow' );
        }
        if( !empty( $settings['banner_url']['is_external'] ) ) {
            $this->add_render_attribute('banner_url','target','_blank');
        }
		$this->add_render_attribute('banner_url','class', 'link-overlay' );
		

		?>

		<div class="banner-style1 mega-hover">
			<a <?php echo $this->get_render_attribute_string('banner_url'); ?>></a>
			<?php if( !empty( $settings['productbanner_iamge']['url'] ) ): ?>
				<div class="banner-img">
					<?php echo wellnez_img_tag( array(
						'url'	=> esc_url( $settings[ 'productbanner_iamge' ][ 'url' ] ),
						'alt'   => 'banner',
					) );
					?>
				</div>
			<?php endif; ?>

			<div class="banner-content">
				<?php if( !empty( $settings[ 'banner_title' ] ) ): ?>
					<h3 class="banner-title">
						<?php echo wp_kses_post( $settings[ 'banner_title' ] ); ?>
					</h3>
				<?php endif; ?>

				<?php if( !empty( $settings[ 'banner_sell_price' ] ) ): ?>
					<span class="banner-price">
						<?php echo esc_html( $settings[ 'banner_sell_price' ] ); ?>
						<del><?php echo esc_html( $settings[ 'banner_regular_price' ] ); ?></del>
					</span>
				<?php endif; ?>
			</div>
		</div>
		<?php 


		
	}
}