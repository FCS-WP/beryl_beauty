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
class Mixlax_Team_Single extends Widget_Base {

	public function get_name() {
		return 'mixlaxteamsingle';
	}

	public function get_title() {
		return __( 'Team Single', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'team_single_section',
			[
				'label' 	=> __( 'Content', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'team_single_style',
			[
				'label' 	=> __( 'Team Single Style', 'mixlax' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'mixlax' ),
					'2' 		=> __( 'Style Two', 'mixlax' ),
				],
			]
		);

		$this->add_control(
			'team_single_image',
			[
				'label'     => __( 'Team Single Image', 'mixlax' ),
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
			'person_designation',
            [
				'label'         => __( 'Person Designation', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Engineer' , 'mixlax' ),
				'label_block'   => true,
			]
		);
		$this->add_control(
			'person_name',
            [
				'label'         => __( 'Person Name', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'David Smith' , 'mixlax' ),
				'label_block'   => true,
			]
		);
		$this->add_control(
			'person_details',
            [
				'label'         => __( 'Person Details', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'David Smith' , 'mixlax' ),
				'label_block'   => true,
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

		$this->start_controls_section(
			'general',
			[
				'label' 	=> __( 'General', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'degi_color',
			[
				'label' 		=> __( 'Designation Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .team-details-layout1 .team-member .member-details .degi' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'degi_typography',
				'label'         => __( 'Designation Typography', 'mixlax' ),
                'selector'      => '{{WRAPPER}} .team-details-layout1 .team-member .member-details .degi',
			]
		);
		$this->add_control(
			'person_color',
			[
				'label' 		=> __( 'Person Name Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .team-details-layout1 .team-member .member-details .name' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'person_typography',
				'label'         => __( 'Person Name Typography', 'mixlax' ),
                'selector'      => '{{WRAPPER}} .team-details-layout1 .team-member .member-details .name',
			]
		);
		$this->add_control(
			'person_details_color',
			[
				'label' 		=> __( 'Person Meta Title Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .team-details-layout1 .team-member .member-details .member-information ul li span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'person_deatails_typography',
				'label'         => __( 'Person Meta Title Typography', 'mixlax' ),
                'selector'      => '{{WRAPPER}} .team-details-layout1 .team-member .member-details .member-information ul li span',
			]
		);
		$this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		if( $settings['team_single_style'] == 1 ){
			echo '<!-- Team Details Area -->';
				echo '<section class="our-team-wrapper team-details-wrap team-details-layout1">';
			  		echo '<div class="container">';
			    		echo '<div class="row">';
			      			echo '<!-- Single Team -->';
		      				echo '<div class="col-12">';
		        				echo '<div class="team-member">';
		          					echo '<div class="member-details-area wow fadeInUp" data-wow-delay="0.4s">';
							            echo '<div class="row gx-0 align-items-center">';
							              	echo '<div class="col-lg-5">';
											  	if( !empty( $settings['team_single_image']['url'] ) ){
									                echo '<div class="member-img">';
										                echo wellnez_img_tag( array(
															'url'	=> esc_url( $settings['team_single_image']['url'] )
														) );
									                echo '</div>';
												}
							              	echo '</div>';
							              	echo '<div class="col-lg-7">';
							                	echo '<div class="member-details">';
													if( !empty( $settings['person_designation'] ) ){
										                echo '<span class="degi">'.esc_html( $settings['person_designation'] ).'</span>';
													}
													if( !empty( $settings['person_name'] ) ){
										                echo '<h2 class="name">'.esc_html( $settings['person_name'] ).'</h2>';
													}
													if( !empty( $settings['person_details'] ) ){
										                echo '<!-- Member Information -->';
									                  	echo '<div class="member-information">';
									                    	echo '<ul>';
									                     		echo wp_kses_post( $settings['person_details'] );
									                    	echo '</ul>';
									                  	echo '</div>';
													}
								                  	echo '<!-- Member Social Links -->';
										            echo '<ul class="social-links">';
													  	foreach( $settings['social_icon_four_slide'] as $social_icon ){
														   	$target_social 	= $social_icon['social_icon_for_four_link']['is_external'] ? ' target="_blank"' : '';
														   	$nofollow_social 	= $social_icon['social_icon_for_four_link']['nofollow'] ? ' rel="nofollow"' : '';
														   	echo '<li><a '.wp_kses_post( $target_social.$nofollow_social ).' href="'.esc_url( $social_icon['social_icon_for_four_link']['url'] ).'"><i class="'.esc_attr( $social_icon['social_icon_for_four']['value'] ).'"></i></a></li>';
													   	}
										            echo '</ul>';
										        echo '</div>';
								            echo '</div>';
								        echo '</div>';
								    echo '</div>';
								echo '</div><!-- Team END -->';
							echo '</div><!-- .col END -->';
						echo '</div><!-- .row END -->';
					echo '</div><!-- .container END -->';
				echo '</section>';
			echo '<!-- Team Details Area end -->';
		}else{
			echo '<div class="team-details-wrap team-details-layout2">';
				if( !empty( $settings['team_single_image']['url'] ) ){
					echo '<div class="member-img">';
						echo wellnez_img_tag( array(
							'url'	=> esc_url( $settings['team_single_image']['url'] ),
							'class' => 'w-100',
						) );
					echo '</div>';
				}
				echo '<div class="member-info ">';
					if( !empty( $settings['person_name'] ) ){
						echo '<h2 class="member-name">'.esc_html( $settings['person_name'] ).'</h2>';
					}
					if( !empty( $settings['person_designation'] ) ){
						echo '<span class="degi">'.esc_html( $settings['person_designation'] ).'</span>';
					}
					if( !empty( $settings['person_details'] ) ){
						echo '<ul class="member-info-list">';
							echo wp_kses_post( $settings['person_details'] );
						echo '</ul>';
					}
					echo '<ul class="social-links">';
						foreach( $settings['social_icon_four_slide'] as $social_icon ){
							$target_social 	= $social_icon['social_icon_for_four_link']['is_external'] ? ' target="_blank"' : '';
							$nofollow_social 	= $social_icon['social_icon_for_four_link']['nofollow'] ? ' rel="nofollow"' : '';
							echo '<li><a '.wp_kses_post( $target_social.$nofollow_social ).' href="'.esc_url( $social_icon['social_icon_for_four_link']['url'] ).'"><i class="'.esc_attr( $social_icon['social_icon_for_four']['value'] ).'"></i></a></li>';
						}
					echo '</ul>';
				echo '</div>';
			echo '</div>';
		}
	}

}