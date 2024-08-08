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
class Wellnez_AboutImage extends Widget_Base {

	public function get_name() {
		return 'wellnezaboutimage';
	}
 
	public function get_title() {
		return __( 'About Image', 'wellnez' );
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
			'about_version',
			[
				'label' 		=> __( 'Style', 'wellnez' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  			=> __( 'Style One', 'wellnez' ),
					'2' 			=> __( 'Style Two', 'wellnez' ),
				],
			]
		);

		$this->add_control(
			'about_image',
			[
				'label' 		=> __( 'Image One', 'wellnez' ),
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
			'about_image_two',
			[
				'label' 		=> __( 'Image Two', 'wellnez' ),
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
			'about_image_three',
			[
				'label' 		=> __( 'Image Three', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'about_version' => '2' ],
			]
		);
		$this->add_control(
			'about_image_sahpe',
			[
				'label' 		=> __( 'Image Shape', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'about_version' => '2' ],
			]
		);
        $this->end_controls_section();



	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		
		?>
		<?php if( '1' == $settings[ 'about_version' ]  ): ?>
			<div class="img-box10">
				<?php if( $settings['about_image']['url'] ): ?>
					<div class="img-1">
						<?php echo wellnez_img_tag( array(
							'url'	=> esc_url( $settings['about_image']['url'] ),
							'alt'   => 'about',
						) );
						?>
					</div>
				<?php endif; ?>

				<?php if( $settings['about_image_two']['url'] ): ?>
					<div class="img-2">
						<?php echo wellnez_img_tag( array(
							'url'	=> esc_url( $settings['about_image_two']['url'] ),
							'alt'   => 'about',
						) );
						?>
					</div>
				<?php endif; ?>
			</div>
			<?php elseif( '2' == $settings[ 'about_version' ] ): ?>
			<div class="img-box7">
				<?php if( $settings['about_image']['url'] ): ?>
					<div class="img-1">
						<?php echo wellnez_img_tag( array(
							'url'	=> esc_url( $settings['about_image']['url'] ),
							'alt'   => 'thumb',
						) );
						?>
						<div class="img-4">
							<?php echo wellnez_img_tag( array(
								'url'	=> esc_url( $settings['about_image_sahpe']['url'] ),
								'alt'   => 'thumb',
							) );
							?>
						</div>
					</div>
				<?php endif; ?>

				<?php if( $settings['about_image_two']['url'] ): ?>
					<div class="img-2">
						<?php echo wellnez_img_tag( array(
							'url'	=> esc_url( $settings['about_image_two']['url'] ),
							'alt'   => 'about',
						) );
						?>
					</div>
				<?php endif; ?>
				<?php if( $settings['about_image_three']['url'] ): ?>
					<div class="img-3">
						<?php echo wellnez_img_tag( array(
							'url'	=> esc_url( $settings['about_image_three']['url'] ),
							'alt'   => 'about',
						) );
						?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	<?php
	}

}