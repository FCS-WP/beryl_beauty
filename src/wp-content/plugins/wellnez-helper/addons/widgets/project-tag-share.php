<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Utils;
/**
 *
 * Tag And Share Widget .
 *
 */
class Mixlax_Project_Tag_Share extends Widget_Base {

	public function get_name() {
		return 'mixlaxprojecttagshare';
	}

	public function get_title() {
		return __( 'Project Tag And Share', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'project_tag',
			[
				'label'	 	=> __( 'Project Tag And Share', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'widget_title',
			[
				'label' 		=> __( 'Title', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Related Tags & Share Post:', 'mixlax' ),
				'placeholder' 	=> __( 'Type your title here', 'mixlax' ),
			]
		);
        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		
		echo '<!-- Share Links Area -->';
		echo '<div class="share-links">';
			echo '<div class="row align-items-center">';
				echo '<div class="col-md-6 col-lg-8">';
					if( ! empty( $settings['widget_title'] ) ){
						echo '<h3 class="links-title">'.esc_html( $settings['widget_title'] ).'</h3>';
					}
					echo '<!-- Related Tags Area -->';
					$tags = get_the_terms( get_the_id(),'project_tag' );
					if( !empty( $tags ) || is_array( $tags ) ){
						echo '<div class="tagcloud">';
							foreach( $tags as $tag ){
								echo '<a href="'.esc_url( get_term_link( $tag->term_id ) ).'">'.esc_html( $tag->name ).'</a>';
							}
						echo '</div>';
					}
				echo '</div>';
				echo '<div class="col-md-6 col-lg-4 text-right">';
					echo '<div class="social-links">';
						echo '<ul>';
							echo mixlax_project_social_sharing_buttons();
						echo '</ul>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
		echo '<!-- Share Links Area end -->';
	}

}