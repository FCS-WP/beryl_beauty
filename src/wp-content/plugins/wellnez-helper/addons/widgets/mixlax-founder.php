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
class Mixlax_Founder extends Widget_Base {

	public function get_name() {
		return 'mixlaxfounder';
	}

	public function get_title() {
		return __( 'Founder', 'mixlax' );
	}


	public function get_icon() {
		return 'fa fa-code';
    }


	public function get_categories() {
		return [ 'mixlax' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'founder_section',
			[
				'label' 	=> __( 'Content', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'founder_image',
			[
				'label'     => __( 'Founder Image', 'mixlax' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$icon_repeater = new Repeater();
		
		$icon_repeater->add_control(
			'social_icon_for_four',
			[
				'label' 		=> __( 'Social Icon One', 'mixlax' ),
				'type' 			=> Controls_Manager::ICONS,
				'default' 		=> [
					'value' 		=> 'fab fa-facebook-f',
					'library' 		=> 'solid',
				],
			]
		);
		$icon_repeater->add_control(
			'social_icon_for_four_link',
			[
				'label' 		=> __( 'Social Icon Link', 'mixlax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'mixlax' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);
		$this->add_control(
			'social_icon_four_slide',
			[
				'label' 		=> __( 'Social Icon', 'mixlax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $icon_repeater->get_controls(),
				'title_field' 	=> '{{social_icon_for_four.value}}',
			]
		);
        $this->end_controls_section();


	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		
		echo '<section class="mixlax-founder-wrap founder-layout1">';
			echo '<div class="mixlax-founder">';
				echo '<div class="founder-img">';
					if( !empty( $settings['founder_image']['url'] ) ){
			            echo wellnez_img_tag( array(
							'url'		=> esc_url( $settings['founder_image']['url'] )
						) );
					}
		            echo '<!-- Founder Social Links -->';
	            	echo '<div class="social-links">';
		              	echo '<ul>';
							foreach( $settings['social_icon_four_slide'] as $social_icon ){
								$target_social 		= $social_icon['social_icon_for_four_link']['is_external'] ? ' target="_blank"' : '';
								$nofollow_social 	= $social_icon['social_icon_for_four_link']['nofollow'] ? ' rel="nofollow"' : '';
								echo '<li><a '.wp_kses_post( $target_social.$nofollow_social ).' href="'.esc_url( $social_icon['social_icon_for_four_link']['url'] ).'"><i class="'.esc_attr( $social_icon['social_icon_for_four']['value'] ).'"></i></a></li>';
						  	}
		            	echo '</ul>';
	            	echo '</div>';
		        echo '</div>';
	        echo '</div>';
        echo '</section>';
	}

}