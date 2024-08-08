<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Background;
use \Elementor\Repeater;
/**
 *
 * Project Filter Widget .
 *
 */
class Wellnez_Project_Filter extends Widget_Base {

	public function get_name() {
		return 'wellnezprojectfilter';
	}

	public function get_title() {
		return __( 'Project Gallrty', 'wellnez' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'wellnez' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'project_section',
			[
				'label' 	=> __( 'Project', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'pstyle',
			[
				'label' 	=> __( 'Style', 'wellnez' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'gx-20',
				'options' 	=> [
					'gx-20'  		=> __( 'Style One', 'wellnez' ),
					'' 		=> __( 'Style Two', 'wellnez' ),
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'project_image',
			[
				'label' 	=> esc_html__( 'Project Image', 'wellnez' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' 	=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'project_title',
			[
				'label' 	=> __( 'Project Title', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default'   => __( 'Development Projects', 'wellnez' ),
			]
		);

		$repeater->add_control(
			'project_single_page',
			[
				'label' 	=> __( 'Project Single Page Url', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default'   => __( '#', 'wellnez' ),
			]
		);

		$repeater->add_control(
			'project_subtitle',
			[
				'label' 	=> __( 'Project Subtitle', 'wellnez' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default'   => __( 'App Solution', 'wellnez' ),
			]
		);

		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Slides', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'project_title' 		=> __( 'App Development', 'wellnez' ),
						'project_subtitle' 	    => __( 'App Solution', 'wellnez' ),
					],
					[
						'project_title' 		=> __( 'Portfolio Design', 'wellnez' ),
						'project_subtitle' 	    => __( 'UI Design', 'wellnez' ),
					],
					[
						'project_title' 		=> __( 'Database checkup', 'wellnez' ),
						'project_subtitle' 	    => __( 'Cyber Security', 'wellnez' ),
					],
					[
						'project_title' 		=> __( 'Digital Marketing', 'wellnez' ),
						'project_subtitle' 	    => __( 'Affiliate', 'wellnez' ),
					],
				],
				'title_field' 	=> '{{{ project_title }}}',
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'project_style_section',
			[
				'label' => __( 'Project Style', 'wellnez' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' 		=> 'background',
				'label' 	=> __( 'Background', 'wellnez' ),
				'types' 	=> [ 'classic', 'gradient', 'video' ],
				'selector' 	=> '{{WRAPPER}} .gallery-style1 .gallery-shape',
			]
		);

        $this->add_control(
			'project_title_color',
			[
				'label' 	=> __( 'Project Title Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gallery-style1 .gallery-title' => 'color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'project_title_typography',
				'label' 	=> __( 'Project Title Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .gallery-style1 .gallery-title',
			]
		);

        $this->add_control(
			'project_subtitle_color',
			[
				'label' 	=> __( 'Project Subtitle Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gallery-style1 .gallery-tag' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'project_subtitle_typography',
				'label' 	=> __( 'Project Subtitle Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .gallery-style1 .gallery-tag',
			]
		);

	}

	protected function render() {

        $settings = $this->get_settings_for_display();



		?>
			<section class="outer-wrap1">
				<div class="container-xxl px-0 portfolio-filter-container"> 
					<div class="row <?php echo esc_attr( $settings[ 'pstyle' ] ); ?> gy-gx filter-active">
						<?php foreach( $settings[ 'slides' ] as $slide  ): ?>
							<div class="col-md-6 col-xxl-auto filter-item">
								<div class="gallery-style1">
									<?php if( !empty( $slide['project_image']['url'] ) ): ?>
										<div class="gallery-img">
											<?php echo wellnez_img_tag( array(
												'url'	=> esc_url( $slide[ 'project_image' ][ 'url' ] ),
												'alt'   => 'Gallery Image',
												'class' => 'w-100',

											) );
											?>
										</div>
									<?php endif; ?>

								<div class="gallery-shape" data-overlay="white" data-opacity="9"></div>
								<div class="gallery-content">

										<?php if( !empty( $slide['project_image']['url'] ) ): ?>
											<a href="<?php echo esc_url( $slide[ 'project_image' ][ 'url' ] ) ?>" class="gallery-btn popup-image">
												<i class="fal fa-plus"></i>
											</a>
										<?php endif; ?>

										<?php if( !empty( $slide[ 'project_title' ] ) ): ?>
											<h3 class="gallery-title">
												<a href="<?php echo esc_url( $slide[ 'project_single_page' ] ); ?>" class="text-inherit">
													<?php echo esc_html( $slide[ 'project_title' ] ); ?>
												</a>
											</h3>
										<?php endif; ?>
										<?php if( !empty( $slide[ 'project_subtitle' ] ) ): ?>
											<span class="gallery-tag"><?php echo esc_html( $slide[ 'project_subtitle' ] ); ?></span>
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</section>
		<?php 
	}
}