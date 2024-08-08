<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * Image Widget .
 *
 */
class Category_Image_Slider extends Widget_Base {

	public function get_name() {
		return 'categoryslider';
	}

	public function get_title() {
		return __( 'Category Slider', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'image_slider_section',
			[
				'label' 	=> __( 'Image Slider', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'image_style',
			[
				'label' 	=> __( 'Image Style', 'wellnez' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'wellnez' ),
					'2' 		=> __( 'Style Two', 'wellnez' ),
				],
			]
		);

        $repeater = new Repeater();

		$repeater->add_control(
			'image',
			[
				'label' 	=> __( 'Image', 'wellnez' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' => [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'title',
            [
				'label'         => __( 'Title', 'wellnez' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'PARABEN FREE' , 'wellnez' ),
				'label_block'   => true,
			]
		);
		$repeater->add_control(
			'title_link',
			[
				'label' 		=> __( 'Link', 'wellnez' ),
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

		$this->add_control(
			'category_slider',
			[
				'label' 		=> __( 'Category Sliders', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'image'      => Utils::get_placeholder_image_src(),
						'title'      => __('clean ingredient', 'wellnez'),
						'title_link' => __('#', 'wellnez'),
					],
					[
						'image'      => Utils::get_placeholder_image_src(),
						'title'      => __('ANCIENT FORMULAS', 'wellnez'),
						'title_link' => __('#', 'wellnez'),
					],
					[
						'image'      => Utils::get_placeholder_image_src(),
						'title'      => __('MADE SUSTAINABLY', 'wellnez'),
						'title_link' => __('#', 'wellnez'),
					],
					[
						'image'      => Utils::get_placeholder_image_src(),
						'title'      => __('PARABEN FREE', 'wellnez'),
						'title_link' => __('#', 'wellnez'),
					],
					[
						'image'      => Utils::get_placeholder_image_src(),
						'title'      => __('hair Towel', 'wellnez'),
						'title_link' => __('#', 'wellnez'),
					],
					[
						'image'      => Utils::get_placeholder_image_src(),
						'title'      => __('PARABEN FREE', 'wellnez'),
						'title_link' => __('#', 'wellnez'),
					],
					'title_field' 	=> '{{{ title }}}',
				]
			]
		);

        $this->end_controls_section();



        $this->start_controls_section(
			'slider_control_section',
			[
				'label' 		=> __( 'Slider Control', 'wellnez' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'desktop_items',
			[
				'label' 		=> __( 'Items To Show', 'wellnez' ),
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
					'size' 			=> 1,
				],
			]
		);

		$this->add_control(
			'slider_autoplay',
			[
				'label' 		=> __( 'Autoplay', 'wellnez' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'wellnez' ),
				'label_off' 	=> __( 'No', 'wellnez' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		$this->add_render_attribute( 'wrapper', 'class', 'row category-carousel has-slide-shadow' );
		
		if( $settings['slider_autoplay'] == 'yes' ) {
			$this->add_render_attribute( 'wrapper', 'data-slick-autoplay', 'true' );
		} else {
			$this->add_render_attribute( 'wrapper', 'data-slick-autoplay', 'false' );
		}

		?>
		<div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
			<?php if( !empty( $settings[ 'category_slider' ] ) ): ?>
				<?php foreach( $settings[ 'category_slider' ] as $slider ): ?>
					<div class="col-xl-3 col-md-2 col-sm-1">
						<div class="category-style1">
							<?php if( !empty( $slider[ 'image' ] [ 'url' ] ) ): ?>
								<div class="category-icon">
									<?php echo wellnez_img_tag( array(
											'url'	=> esc_url( $slider['image']['url'] ),
											'alt'   => 'categoryicon',
										) );
									?>
								</div>
							<?php endif; ?>

							<?php if( !empty($slider[ 'title' ]) ): 
									$target = $slider['title_link']['is_external'] ? ' target="_blank"' : '';
									$nofollow = $slider['title_link']['nofollow'] ? ' rel="nofollow"' : '';
								?>
								<h3 class="category-name">
									<a href="<?php echo esc_url($slider['title_link']['url']); ?>" <?php echo esc_attr( $target.$nofollow ); ?>   class="text-inherit">
										<?php echo esc_html($slider[ 'title' ]); ?>
									</a>
								</h3>
							<?php endif; ?>
						</div>
					</div> 
				<?php endforeach; ?>
			<?php endif; ?>
		</div>

		<?php 

	}

}