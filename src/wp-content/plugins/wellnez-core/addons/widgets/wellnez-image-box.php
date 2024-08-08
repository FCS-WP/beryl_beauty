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
 * Image Widget .
 *
 */
class Wellnez_Image_Box extends Widget_Base {

	public function get_name() {
		return 'wellnezimagebox';
	}

	public function get_title() {
		return __( 'Image Box', 'wellnez' );
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
				'label' 	=> __( 'Image Box', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );


		$this->add_responsive_control('per_line', [
            'label'              => __('Columns per row', 'wellnez'),
            'type'               => Controls_Manager::SELECT,
            'default'            => '3',
            'tablet_default'     => '6',
            'mobile_default'     => '12',
            'options'            => [
                '12' => '1',
                '6'  => '2',
                '4'  => '3',
                '3'  => '4',
				''  =>  '5',
            ],
            'frontend_available' => true,
        ]);
		
		
		$repeater = new Repeater();
        $repeater->add_control(
			'image',
			[
				'label' 		=> __( 'Choose Image', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'link',
			[
				'label' 		=> __( 'Link', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXT,
                'placeholder' 	=> __( 'https://your-link.com', 'wellnez' ),
			]
        );
		$repeater->add_control(
			'custom_class',
			[
				'label' 		=> __( 'Css Class', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXT,
                'placeholder' 	=> __( 'add custom class', 'wellnez' ),
			]
        );
		$this->add_control(
			'image_slider',
			[
				'label' 		=> __( 'Image Sliders', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'image' => Utils::get_placeholder_image_src(),
					],
					[
						'image' => Utils::get_placeholder_image_src(),
					],
					[
						'image' => Utils::get_placeholder_image_src(),
					],
					[
						'image' => Utils::get_placeholder_image_src(),
					],
					[
						'image' => Utils::get_placeholder_image_src(),
					],
				]
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'heading_section',
			[
				'label' 	=> __( 'Top Content', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'show_title_box',
			[
				'label'        => __( 'Show Top Content', 'plugin-domain' ),
				'type'         =>   Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'wellnez' ),
				'label_off'    => __( 'Hide', 'wellnez' ),
				'return_value' => 'yes',
				'default'      => 'no',
			]
		);

		$this->add_control(
			'title',
			[
				'label' 		=> __( 'Title', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXT,
                'placeholder' 	=> __( '#instagram', 'wellnez' ),
			]
        );
		$this->add_control(
			'subtitle',
			[
				'label' 		=> __( 'Sub Title', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXT,
                'placeholder' 	=> __( '@Wellnez.info', 'wellnez' ),
			]
        );
		$this->add_control(
			'title_link',
			[
				'label' 		=> __( 'Sub Title Url', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXT,
                'placeholder' 	=> __( '#', 'wellnez' ),
			]
        );
		$this->end_controls_section();


		$this->start_controls_section(
			'heading_style',
			[
				'label' 	=> __( 'Top Content', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_responsive_control(
            'title_margin',
            [
                'label'      => __('Wraper Margin', 'wellnez'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .row.gy-3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
		$this->add_control(
			'title_color',
			[
				'label' 	=> __( 'Title Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sec-title' => 'color: {{VALUE}}',
                ],
			]
        );
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'sub_title_typo',
				'label' 	=> __( 'Title Typo', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .sec-title',
			]
		);

		

		$this->add_control(
			'sub_title_color',
			[
				'label' 	=> __( 'Sub Title Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .user-id-link' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typo',
				'label' 	=> __( 'Title Typo', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .user-id-link',
			]
		);
		
		$this->end_controls_section();

		

	}

	protected function render() {

        $settings = $this->get_settings_for_display();


	


		$grid_classes = [];
		$grid_classes[] = 'col-lg-' . $settings['per_line'];
		$grid_classes[] = 'col-md-' . $settings['per_line_tablet'];
		$grid_classes[] = 'col-sm-' . $settings['per_line_mobile'];

		if( '5' == $settings[ 'per_line']){
			$grid_classes = [];
		}else{
			$grid_classes[] = 'col-lg';
		}
		
		$grid_classes = implode(' ', $grid_classes);
		$this->add_render_attribute('gride_classes', 'class', [$grid_classes]);

		?>

			<?php if( 'yes' ==  $settings[ 'show_title_box' ]  ): ?>
				<div class="container-xxl">
					<div class="row gy-3  align-items-end">
						<div class="col-sm-auto">
							<?php if(!empty( $settings[ 'title' ] )): ?>
								<h2 class="sec-title mb-n2">
									<?php echo esc_html($settings[ 'title' ]); ?>
								</h2>
							<?php endif; ?>
						</div>
						<div class="col-sm">
							<div class="sec-line pb-1"></div>
						</div>
						<?php if(!empty( $settings[ 'title' ] )): ?>
							<div class="col-sm-auto d-none d-lg-block">
								<a href="<?php echo esc_url($settings[ 'title_link' ]) ?>" class="user-id-link">
									<?php echo esc_html($settings[ 'subtitle' ]); ?>
								</a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if( !empty( $settings['image_slider']) ): ?>
				<div class="row gy-gx justify-content-between">
					<?php foreach( $settings[ 'image_slider' ] as $slider ): ?>
						<div <?php echo $this->get_render_attribute_string('gride_classes'); ?>>
							<div class="gallery-style1 mega-hover ">
								<div class="gallery-img <?php echo esc_attr( $slider[ 'custom_class' ] ); ?>" >
									<a href="<?php echo esc_url( $slider[ 'link' ] ); ?>">
										<?php echo wellnez_img_tag( array(
											'url'	=> esc_url( $slider[ 'image' ][ 'url' ] ),
											'alt'   => 'gallery',
										) );
										?>
									</a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		<?php

	}
}