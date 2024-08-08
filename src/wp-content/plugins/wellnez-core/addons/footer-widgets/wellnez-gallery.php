<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * Gallery Image Widget .
 *
 */
class Wellnez_Gallery_Image extends Widget_Base {

	public function get_name() {
		return 'wellnezgalleryimage';
	}

	public function get_title() {
		return __( 'Gallery Image', 'wellnez' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'wellnez' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'gallery_image_section',
			[
				'label' 	=> __( 'Gallery Image', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'gallery_style',
			[
				'label' 	=> esc_html__( 'Gallery Style', 'wellnez' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 		=> [
					'1'			=> esc_html__( 'Style One', 'wellnez' ),
					'2' 		=> esc_html__( 'Style Two', 'wellnez' ),
				],
			]
		);

		$this->add_control(
			'section_subtitle',
            [
				'label'         => __( 'Section SubTitle', 'wellnez' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Gallery' , 'wellnez' ),
				'label_block'   => true,
				'condition'		=> [ 'gallery_style' => '2' ]

			]
		);

		$this->add_control(
			'section_title',
            [
				'label'         => __( 'Section Title', 'wellnez' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Gallery Posts' , 'wellnez' ),
				'label_block'   => true,

			]
		);

        $repeater = new Repeater();

		$repeater->add_control(
			'gallery_image',
			[
				'label' 	=> __( 'Gallery Image', 'wellnez' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' => [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'image_link',
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
			'gallery',
			[
				'label' 		=> __( 'Gallery Images', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'gallery_image' => Utils::get_placeholder_image_src(),
					],
					[
						'gallery_image' => Utils::get_placeholder_image_src(),
					],
					[
						'gallery_image' => Utils::get_placeholder_image_src(),
					],
					[
						'gallery_image' => Utils::get_placeholder_image_src(),
					],
					[
						'gallery_image' => Utils::get_placeholder_image_src(),
					],
				]
			]
		);

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( $settings['gallery_style'] == '1' ){
			echo '<div class="widget footer-widget">';
				if( ! empty( $settings['section_title'] ) ){
					echo '<h4 class="widget_title">'.esc_html( $settings['section_title'] ).'</h4>';
				}
				if( ! empty( $settings['gallery'] ) ){
					echo '<div class="footer-gallery">';
						foreach( $settings['gallery'] as $singlelogo ) {
							$target 	= $singlelogo['image_link']['is_external'] ? ' target="_blank"' : '';
							$nofollow 	= $singlelogo['image_link']['nofollow'] ? ' rel="nofollow"' : '';
							echo '<div class="gal-item">';
								echo '<a '.wp_kses_post( $nofollow.$target ).' href="'.esc_url( $singlelogo['image_link']['url'] ).'">';
									echo '<img class="w-100" src="'.esc_url( $singlelogo['gallery_image']['url'] ).'" alt="'.esc_attr( wellnez_image_alt( $singlelogo['gallery_image']['url']) ).'">';
								echo '</a>';
							echo '</div>';
						}
					echo '</div>';
				}
			echo '</div>';
		}else{  
			echo '<section class="vs-gallery-wrapper">';
				echo '<div class="container">';
					echo '<div class="row gx-30">';
						echo '<div class="text-center text-lg-start col-lg-4 align-self-center">';
							echo '<div class="title-area mb-30">';
								if( ! empty( $settings['section_subtitle'] ) ){
									echo '<span class="sub-title">'.esc_html( $settings['section_subtitle'] ).'</span>';
								}
								if( ! empty( $settings['section_title'] ) ){
									echo '<h2 class="sec-title mb-0">'.esc_html( $settings['section_title'] ).'</h2>';
								}
							echo '</div>';
						echo '</div>';
						if( ! empty( $settings['gallery'] ) ){
							foreach( $settings['gallery'] as $singlelogo ){
								if( ! empty( $singlelogo['gallery_image']['url'] ) ){
									echo '<div class="mb-30 col-sm-6 col-lg-4">';
										echo '<div class="gallery-box">';
											echo wellnez_img_tag( array(
												'url'	=> esc_url( $singlelogo['gallery_image']['url'] ),
												'class' => 'w-100',
											) );
											echo '<a href="'.esc_url( $singlelogo['gallery_image']['url'] ).'" class="popup-image gal-btn"><i class="far fa-plus"></i></a>';
										echo '</div>';
									echo '</div>';
								}
							}
						}
					echo '</div>';
				echo '</div>';
			echo '</section>';
		}
	}
}