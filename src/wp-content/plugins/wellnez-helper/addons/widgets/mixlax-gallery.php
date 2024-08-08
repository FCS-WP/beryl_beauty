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
 * Gallery Widget .
 *
 */
class Mixlax_Gallery extends Widget_Base {

	public function get_name() {
		return 'mixlaxgallery';
	}

	public function get_title() {
		return __( 'Gallery', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'gallery_section',
			[
				'label' 	=> __( 'Gallery', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'gallery_style',
			[
				'label'         => __( 'Gallery Style', 'mixlax' ),
				'type'          => Controls_Manager::SELECT,
				'default'       => '1',
				'options'       => [
					'1'            => __( 'Style One', 'mixlax' ),
					'2'            => __( 'Style Two', 'mixlax' ),
					'3'            => __( 'Style Three', 'mixlax' ),
				],
			]
		);

        $repeater = new Repeater();

		$repeater->add_control(
			'gallery_image',
			[
				'label' 	=> __( 'Gallery Image', 'mixlax' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' => [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
			]
		);

        $repeater->add_control(
            'video_link',
            [
                'label' 	=> __( 'Video Link ( Style One )', 'mixlax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
            ]
        );

        $repeater->add_control(
            'subtitle',
            [
                'label' 	=> __( 'Subtitle ( Style One )', 'mixlax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Contact & Quote', 'mixlax' )
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' 	=> __( 'Title ( Style One )', 'mixlax' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Time to take rest now', 'mixlax' )
            ]
        );

		$this->add_control(
			'gallery_slider',
			[
				'label' 		=> __( 'Gallery', 'mixlax' ),
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
				],
                'condition'     => [ 'gallery_style'    => [ '1', '2' ] ]
			]
		);

        $this->add_control(
			'gallery_image_three',
			[
				'label' 	=> __( 'Gallery Image', 'mixlax' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' => [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
                'condition'     => [ 'gallery_style'    => '3' ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            'slider_control_section',
            [
                'label' 		=> __( 'Slider Control', 'mixlax' ),
                'tab' 			=> Controls_Manager::TAB_CONTENT,
                'condition'     => [ 'gallery_style'    => [ '1', '2' ] ]
            ]
        );

        $this->add_control(
            'slider_to_show',
            [
                'label' 		=> __( 'Items To Show', 'mixlax' ),
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
                    'size' 			=> 3,
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'style_section',
			[
				'label' 	=> __( 'Gallery Style', 'mixlax' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
                'condition' => [ 'gallery_style'    => '1' ]
			]
        );

        $this->add_control(
			'subtitle_color',
			[
				'label' 	=> __( 'Subtitle Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-gallery-layout1 .vs-gallery-content p' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'title_color',
			[
				'label' 	=> __( 'Title Color', 'mixlax' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-gallery-layout1 .vs-gallery-content .vs-gallery-title' => 'color: {{VALUE}}',
                ],
			]
        );


		$this->end_controls_section();


	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'wrapper', 'class', 'row gx-0 vs-carousel' );

        if( $settings['gallery_style'] == '1' || $settings['gallery_style'] == '2' ){
            $this->add_render_attribute( 'wrapper', 'data-slide-to-show', esc_attr( $settings['slider_to_show']['size'] ) );
        }
        if( $settings['gallery_style'] == '1' && ! empty( $settings['gallery_slider'] ) ){
            echo '<section class="vs-gallery-wrapper vs-gallery-layout1">';
                echo '<div class="container-fluid px-0">';
                    echo '<div '.$this->get_render_attribute_string( 'wrapper' ).'>';
                        foreach( $settings['gallery_slider'] as $gallery ){
                            echo '<div class="col-xl-4">';
                                echo '<div class="vs-gallery">';
                                    echo '<div class="vs-gallery-overlay" data-overlay="body" data-opacity="6"></div>';
                                    if( ! empty( $gallery['gallery_image']['url'] ) ){
                                        echo '<div class="vs-gallery-img">';
                                            echo wellnez_img_tag( array(
                                                'url'   => esc_url( $gallery['gallery_image']['url'] ),
                                                'class' => 'w-100',
                                            ) );
                                        echo '</div>';
                                    }
                                    echo '<div class="vs-gallery-content">';
                                        if( ! empty( $gallery['video_link'] ) ){
                                            echo '<a class="vs-gallery-btn popup-video" href="'.esc_url( $gallery['video_link'] ).'"><i class="fas fa-play"></i></a>';
                                        }
                                        if( ! empty( $gallery['subtitle'] ) ){
                                            echo '<p class="mb-10"><strong>'.esc_html( $gallery['subtitle'] ).'</strong></p>';
                                        }
                                        if( ! empty( $gallery['title'] ) ){
                                            echo '<h3 class="vs-gallery-title mb-0">'.esc_html( $gallery['title'] ).'</h3>';
                                        }
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }elseif( $settings['gallery_style'] == '2' && ! empty( $settings['gallery_slider'] ) ){
            echo '<div class="vs-gallery-wrapper vs-gallery-layout1">';
                echo '<div class="container-fluid px-0">';
                    echo '<div '.$this->get_render_attribute_string( 'wrapper' ).'>';
                        foreach( $settings['gallery_slider'] as $gallery ){
                            echo '<div class="col-xl-4">';
                                echo '<div class="vs-gallery">';
                                    echo '<div class="vs-gallery-overlay" data-overlay="body" data-opacity="6"></div>';
                                    if( ! empty( $gallery['gallery_image']['url'] ) ){
                                        echo '<div class="vs-gallery-img">';
                                            echo wellnez_img_tag( array(
                                                'url'   => esc_url( $gallery['gallery_image']['url'] ),
                                                'class' => 'w-100',
                                            ) );
                                        echo '</div>';
                                        echo '<a href="'.esc_url( $gallery['gallery_image']['url'] ).'" class="instagram-btn icon-btn popup-image"><i class="fa-2x fab fa-instagram"></i></a>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }else{
            if( ! empty( $settings['gallery_image_three']['url'] ) ){
                echo '<div class="gallery-style3">';
                    echo '<div class="vs-gallery image-scale-hover">';
                        echo '<a href="'.esc_url( $settings['gallery_image_three']['url'] ).'" class="icon-btn popup-image"><i class="far fa-eye"></i></a>';
                        echo wellnez_img_tag( array(
                            'url'   => esc_url( $settings['gallery_image_three']['url'] ),
                            'class' => 'w-100',
                        ) );
                    echo '</div>';
                echo '</div>';
            }
        }

	}

}