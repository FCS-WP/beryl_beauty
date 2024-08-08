<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
/**
 *
 * About Us Image Widget .
 *
 */
class Mixlax_About_Us_Image extends Widget_Base {

	public function get_name() {
		return 'mixlaxaboutusimage';
	}

	public function get_title() {
		return __( 'About Us Image', 'mixlax' );
	}

    public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'about_us_image_section',
			[
				'label' 	=> __( 'About Us Image', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'about_image_style',
			[
				'label' 		=> __( 'ABout Image Style', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' => [
					'1'  		=> __( 'Style One', 'mixlax' ),
					'2' 		=> __( 'Style Two', 'mixlax' ),
				],
			]
		);

        $this->add_control(
			'image_one',
			[
				'label'     => __( 'Choose About Us One Image', 'mixlax' ),
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
			'image_two',
			[
				'label'     	=> __( 'Choose About Us Two Image', 'mixlax' ),
				'type'      	=> Controls_Manager::MEDIA,
				'dynamic'   	=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'about_image_style' => '1' ],
			]
		);
        $this->add_control(
			'image_three',
			[
				'label'     => __( 'Choose About Us Three Image', 'mixlax' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'about_image_style' => '1' ],
			]
		);
        $this->add_control(
			'patern_image',
			[
				'label'     => __( 'Choose Pattern Image', 'mixlax' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'about_image_style' => '1' ],
			]
		);

        $this->add_control(
			'link',
			[
				'label'         => __( 'Link', 'mixlax' ),
				'type'          => Controls_Manager::URL,
                'placeholder'   => __( 'https://your-link.com', 'mixlax' ),
                'show_external' => true,
				'default'       => [
					'url'          => '#',
					'is_external'  => true,
					'nofollow'     => true,
				],
				'condition'		=> [ 'about_image_style' => '1' ],
			]
        );


        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('wrapper','class','img-box7');

        if( !empty( $settings['link']['url'] ) ) {
            $this->add_render_attribute('link','href',esc_url( $settings['link']['url'] ));
        }

        if( ! empty( $settings['link']['nofollow'] ) ) {
            $this->add_render_attribute( 'link', 'rel', 'nofollow' );
        }

        if( !empty( $settings['link']['is_external'] ) ) {
            $this->add_render_attribute('link','target','_blank');
        }

		if( $settings['about_image_style'] == '1' ){
	        echo '<div '.$this->get_render_attribute_string( 'wrapper' ).'>';
	            echo '<div class="img-1">';
	                if( !empty( $settings['link']['url'] ) ){
	                    echo '<a '.$this->get_render_attribute_string('link').'>';
	                }
	                if( ! empty( $settings['image_one']['url'] ) ){
	                    echo wellnez_img_tag( array(
	                        'url'   => esc_url( $settings['image_one']['url'] ),
	                    ) );
	                }
	                if( !empty( $settings['link']['url'] ) ){
	                   echo '</a>';
					}
	                if( ! empty( $settings['patern_image']['url'] ) ){
	                    echo '<div class="img-4">';
	                        echo wellnez_img_tag( array(
	                            'url'   => esc_url( $settings['patern_image']['url'] ),
	                        ) );
	                    echo '</div>';
	                }
	            echo '</div>';
	            echo '<div class="img-2">';
	                if( !empty( $settings['link']['url'] ) ){
	                    echo '<a '.$this->get_render_attribute_string('link').'>';
	                }
	                if( ! empty( $settings['image_two']['url'] ) ){
	                    echo wellnez_img_tag( array(
	                        'url'   => esc_url( $settings['image_two']['url'] ),
	                    ) );
	                }
	                if( !empty( $settings['link']['url'] ) ){
	                   echo '</a>';
					}
	            echo '</div>';
	            echo '<div class="img-3">';
	                if( ! empty( $settings['link']['url'] ) ){
	                    echo '<a '.$this->get_render_attribute_string('link').'>';
	                }
	                if( ! empty( $settings['image_three']['url'] ) ){
	                    echo wellnez_img_tag( array(
	                        'url'   => esc_url( $settings['image_three']['url'] ),
	                    ) );
	                }
	                if( !empty( $settings['link']['url'] ) ){
	                   echo '</a>';
					}
	            echo '</div>';
	        echo '</div>';
		}else{
			if( ! empty( $settings['image_one']['url'] ) ){
				echo '<div class="about-image-box5 position-relative text-center z-index-common">';
	                echo '<span class="ripple d-none d-md-inline-block"></span>';
					echo wellnez_img_tag( array(
						'url'   => esc_url( $settings['image_one']['url'] ),
					) );
	            echo '</div>';
			}
		}
	}

}