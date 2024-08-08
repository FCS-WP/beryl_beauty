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
class Wellnez_Hero_Three extends Widget_Base {

	public function get_name() {
		return 'wellnezherothree';
	}

	public function get_title() {
		return __( 'Hero Home Three', 'wellnez' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'wellnez' ];
	}


	protected function register_controls() {

		
		$this->start_controls_section(
			'slider_content',
			[
				'label' 	=> __( 'Slider Content', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'button_text',
            [
				'label'         => __( 'Button Text', 'wellnez' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'how to make your makeup last all day' , 'wellnez' ),
				'label_block'   => true,
			]
		);
		$this->add_control(
			'link',
			[
				'label' 		=> __( 'Button Url', 'wellnez' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'wellnez' ),
			]
		);

		$repeater = new Repeater();

        $repeater->add_control(
			'image',
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
        $repeater->add_control(
			'sub_title',
            [
				'label'         => __( 'Sub Title', 'wellnez' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'skincare inspires' , 'wellnez' ),
				'label_block'   => true,
			]
		);

        $repeater->add_control(
			'title',
            [
				'label'         => __( 'Title', 'wellnez' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Skin Refresh' , 'wellnez' ),
				'label_block'   => true,
			]
		);
        
		$this->add_control(
			'herothree_slides',
			[
				'label' 		=> __( 'Sliders', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'image' 	  => Utils::get_placeholder_image_src(),
						'sub_title'   => __( 'skincare inspires', 'wellnez' ),
						'title'       => __( 'Specialty SPA', 'wellnez' ),
					],
					[
						'image' 	  => Utils::get_placeholder_image_src(),
						'sub_title'   => __( 'Beauty inspires', 'wellnez' ),
						'title'       => __( 'Skin facial', 'wellnez' ),
					],
					[
						'image' 	  => Utils::get_placeholder_image_src(),
						'sub_title'   => __( 'Modern Care', 'wellnez' ),
						'title'       => __( 'Oil Massage', 'wellnez' ),
					],
					[
						'image' 	  => Utils::get_placeholder_image_src(),
						'sub_title'   => __( 'Expert Opinion', 'wellnez' ),
						'title'       => __( 'Health Care', 'wellnez' ),
					],
				],
				'title_field' 	=> '{{title}}',
			]
		);

        $this->end_controls_section();


		//Button  Style
		$this->start_controls_section(
			'slider_settings',
			[
				'label' 	=> __( 'Slider Settings', 'wellnez' ),
                'tab' 		=> Controls_Manager::TAB_CONTENT,
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

		$this->start_controls_section(
			'title_style',
			[
				'label' 	=> __( 'Title', 'wellnez' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'title_color',
			[
				'label' 	=> __( 'Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .media-style2 .media-title' => 'color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'active_title_color',
			[
				'label' 	=> __( 'Active Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slick-current .media-title' => 'color: {{VALUE}}',
                ],
			]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typo',
				'label' 	=> __( 'Title Typo', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .media-style2 .media-title',
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'subtitle_style',
			[
				'label' 	=> __( 'Sub Title', 'wellnez' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'subtitle_color',
			[
				'label' 	=> __( 'Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .media-style2 .media-label' => 'color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'subtitle_color_active',
			[
				'label' 	=> __( 'Active Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slick-current .media-label' => 'color: {{VALUE}}',
                ],
			]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'sub_typo',
				'label' 	=> __( 'Button Typo', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .media-style2 .media-label',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'button_style',
			[
				'label' 	=> __( 'Button', 'wellnez' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'button_color',
			[
				'label' 	=> __( 'Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .circle-btn' => 'color: {{VALUE}}',
                ],
			]
        );
		
		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'wrapper', 'class', 'image-carousel' );




		if( $settings['slider_autoplay'] == 'yes' ) {
			$this->add_render_attribute( 'wrapper', 'data-slick-autoplay', 'true' );
		} else {
			$this->add_render_attribute( 'wrapper', 'data-slick-autoplay', 'false' );
		}


		// Button
		if( !empty( $settings['link']['url'] ) ) {
            $this->add_render_attribute('link','href',esc_url( $settings['link']['url'] ));
        }
        if( !empty( $settings['link']['nofollow'] ) ) {
            $this->add_render_attribute('link','rel', 'nofollow' );
        }
        if( !empty( $settings['link']['is_external'] ) ) {
            $this->add_render_attribute('link','target','_blank');
        }
		$this->add_render_attribute('link','class','btn-icon');
        
		
		
		?>


		<div class="hero-layout3 ">
			<div class="image-carousel" id="heroimg">
				
				
				<?php foreach($settings[ 'herothree_slides' ] as $slides ): ?>
					<div>
						<?php if( !empty( $slides[ 'image' ][ 'url' ] ) ): ?>
							<div class="hero-img">
								<?php echo wellnez_img_tag( array(
										'url'	=> esc_url( $slides['image']['url'] ),
										'class' => 'w-100',
										'alt'   => 'hero',
									) );
								?>
							</div>
						<?php endif; ?>
					</div>
					
				<?php endforeach; ?>
			</div>

			<div class="media-slider">
				<?php if( !empty( $settings[ 'button_text' ] ) ) :?>
					<div class="circle-btn ">
						<a <?php echo $this->get_render_attribute_string('link'); ?>><i class="far fa-arrow-right"></i></a>
						<div class="btn-text">
							<svg viewBox="0 0 150 150">
								<path id="textsliderthree" d="M 0,75 a 75,75 0 1,1 0,1 z"></path>
								<text>
									<textPath href="#textsliderthree"><?php echo esc_html($settings[ 'button_text' ] ); ?></textPath>
								</text>
							</svg>
						</div>
					</div>
				<?php endif; ?>
				

				<div class="content-carousel" id="herocontent" >

					<?php foreach($settings[ 'herothree_slides' ] as $slides ): ?>
						<div>
							<div class="media-style2">
								<div class="media-shape"></div>
									<?php if( !empty( $slides[ 'sub_title' ] ) ): ?>
										<span class="media-label">
											<?php echo esc_html( $slides[ 'sub_title' ] ); ?>
										</span>
									<?php endif; ?>
									<?php if( !empty( $slides[ 'title' ] ) ): ?>
										<p class="media-title"><?php echo esc_html( $slides[ 'title' ] ); ?></p>
									<?php endif; ?>
								<div class="media-line"></div>
							</div>
						</div>
					<?php endforeach; ?>
					
				</div>
			</div>
		</div>
			
		<?php
        
	}

}