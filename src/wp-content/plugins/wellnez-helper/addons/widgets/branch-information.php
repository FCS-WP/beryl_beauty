<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
use \Elementor\Utils;
/**
 * 
 * Branch Information Widget .
 *
 */
class Mixlax_Branch_Information extends Widget_Base {

	public function get_name() {
		return 'mixlaxbranchinformation';
	}

	public function get_title() {
		return __( 'Branch Information', 'mixlax' );
	}


	public function get_icon() {
		return 'fa fa-code';
    }
    

	public function get_categories() {
		return [ 'mixlax' ];
	}

	
	protected function _register_controls() {

		$this->start_controls_section(
			'branch_section',
			[
				'label' 	=> __( 'Branch Information', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		
		$this->add_control(
			'branch_info_style',
			[
				'label' 	=> __( 'Style', 'mixlax' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  	=> __( 'Style One', 'mixlax' ),
					'2' 	=> __( 'Style Two', 'mixlax' ),
				],
			]
		);
		
		$repeater = new Repeater();
		
		$repeater->add_control(
			'branch_image',
			[
				'label'         => __( 'Branch Image', 'mixlax' ),
				'type'          => Controls_Manager::MEDIA,
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'author_image',
			[
				'label'         => __( 'Author Image', 'mixlax' ),
				'type'          => Controls_Manager::MEDIA,
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$repeater->add_control(
			'author_name',
			[
				'label'         => __( 'Author Name', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Jerray Jact', 'mixlax' ),
			]
		);
		$repeater->add_control(
			'author_desi',
			[
				'label'         => __( 'Author Designation', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Manager', 'mixlax' ),
			]
		);
		$repeater->add_control(
			'author_email',
			[
				'label'         => __( 'Author Email', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'david-smith@gmail.com', 'mixlax' ),
			]
		);
		$repeater->add_control(
			'author_number',
			[
				'label'         => __( 'Author Phone', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '(+244) 1999 256 289', 'mixlax' ),
			]
		);
		$repeater->add_control(
			'branch_name',
			[
				'label'         => __( 'Branch Name', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Carvis Joffre Paris, Service Center', 'mixlax' ),
			]
		);
		$repeater->add_control(
			'branch_location',
			[
				'label'         => __( 'Branch Location', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'An der Schillingbrucke 20, Aalen Aalen 73431', 'mixlax' ),
			]
		);
		$repeater->add_control(
			'branch_phone_number',
			[
				'label'         => __( 'Branch Phone Number', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '+85 (1256) 125 12562', 'mixlax' ),
			]
		);
		$repeater->add_control(
			'branch_email',
			[
				'label'         => __( 'Branch Email', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'carvis-services.dc@gmail.com', 'mixlax' ),
			]
		);
		$repeater->add_control(
			'button_text',
			[
				'label'         => __( 'Button Text', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Contact Us', 'mixlax' ),
			]
		);

		$this->add_control(
			'branch_information',
			[
				'label' 		=> __( 'Branch Information', 'mixlax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'email_address_one' => __( 'support@yourmail.com', 'mixlax' ),
					],
				],
                'title_field' 	=> '{{{ email_address_one }}}',
				'condition'		=> [ 'branch_info_style'	=> '1' ],
			]
		);
		$this->add_control(
			'branch_image',
			[
				'label'         => __( 'Branch Image', 'mixlax' ),
				'type'          => Controls_Manager::MEDIA,
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'branch_info_style'	=> '2' ],
			]
		);
		$this->add_control(
			'author_image',
			[
				'label'         => __( 'Author Image', 'mixlax' ),
				'type'          => Controls_Manager::MEDIA,
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'branch_info_style'	=> '2' ],
			]
		);
		
		$this->add_control(
			'author_name',
			[
				'label'         => __( 'Author Name', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Jerray Jact', 'mixlax' ),
				'condition'		=> [ 'branch_info_style'	=> '2' ],
			]
		);
		$this->add_control(
			'author_desi',
			[
				'label'         => __( 'Author Designation', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Manager', 'mixlax' ),
				'condition'		=> [ 'branch_info_style'	=> '2' ],
			]
		);
		$this->add_control(
			'author_email',
			[
				'label'         => __( 'Author Email', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'david-smith@gmail.com', 'mixlax' ),
				'condition'		=> [ 'branch_info_style'	=> '2' ],
			]
		);
		$this->add_control(
			'author_number',
			[
				'label'         => __( 'Author Phone', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '(+244) 1999 256 289', 'mixlax' ),
				'condition'		=> [ 'branch_info_style'	=> '2' ],
			]
		);
		$this->add_control(
			'branch_name',
			[
				'label'         => __( 'Branch Name', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Carvis Joffre Paris, Service Center', 'mixlax' ),
				'condition'		=> [ 'branch_info_style'	=> '2' ],
			]
		);
		$this->add_control(
			'branch_location',
			[
				'label'         => __( 'Branch Location', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'An der Schillingbrucke 20, Aalen Aalen 73431', 'mixlax' ),
				'condition'		=> [ 'branch_info_style'	=> '2' ],
			]
		);
		$this->add_control(
			'branch_phone_number',
			[
				'label'         => __( 'Branch Phone Number', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '+85 (1256) 125 12562', 'mixlax' ),
				'condition'		=> [ 'branch_info_style'	=> '2' ],
			]
		);
		$this->add_control(
			'branch_email',
			[
				'label'         => __( 'Branch Email', 'mixlax' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'carvis-services.dc@gmail.com', 'mixlax' ),
				'condition'		=> [ 'branch_info_style'	=> '2' ],
			]
		);
        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		if( $settings['branch_info_style'] == 1 ){
			if( ! empty( $settings['branch_information'] ) ){
				echo '<!-- branch Information Area -->';
				echo '<div class="carvis-branch-information branch-information-layout1  ">';
					echo '<div class="container">';
						echo '<!-- Branch Information Slider Active -->';
						echo '<div class="inner-wrapper branchInfo-slider-active wow fadeInUp" data-wow-delay="0.4s">';
							foreach( $settings['branch_information'] as $branch_information ){
								echo '<!-- Single Branch Information -->';
								echo '<div class="single-branch-info">';
									echo '<div class="row align-items-center">';
										echo '<div class="col-lg-6">';
											echo '<!-- Branch Info Header -->';
											echo '<div class="branch-info-head">';
												if( ! empty( $branch_information['branch_image']['url'] ) ){
													echo '<!-- Branch Image -->';
													echo '<div class="branch-img">';
														echo wellnez_img_tag( array(
															'url'	=> esc_url( $branch_information['branch_image']['url'] ),
														) );
													echo '</div>';
												}
												echo '<!-- Branch Officer Info -->';
												echo '<div class="branch-officer-info">';
													echo '<!-- Toggler Button -->';
													echo '<a href="#" class="officer-info-toggler button">';
														echo '<i class="fal fa-user"></i>';
														echo '<span class="ripple ripple-1"></span>';
														echo '<span class="ripple ripple-2"></span>';
														echo '<span class="ripple ripple-3"></span>';
													echo '</a>';
													echo '<!-- Branch Officer Information -->';
													echo '<div class="officer-info-box">';
														if( ! empty( $branch_information['author_image']['url'] ) ){
															echo '<div class="avater">';
																echo wellnez_img_tag( array(
																	'url'	=> esc_url( $branch_information['author_image']['url'] ),
																) );
															echo '</div>';
														}
														if( ! empty( $branch_information['author_name'] ) ){
															echo '<h3 class="name">'.esc_html( $branch_information['author_name'] ).'</h3>';
														}
														if( ! empty( $branch_information['author_desi'] ) ){
															echo '<span class="degi">'.esc_html( $branch_information['author_desi'] ).'</span>';
														}
														$replace 	= array(' ','-',' - ');
													    $with 		= array('','','');
														$emailurl   = str_replace( $replace, $with, $branch_information['author_email'] );
														$phoneurl   = str_replace( $replace, $with, $branch_information['author_number'] );
														if( ! empty( $branch_information['author_email'] ) ){
															echo '<p class="contact-info"><a href="'.esc_attr( 'mailto:'.$emailurl ).'"><i class="fal fa-envelope"></i>'.esc_html( $branch_information['author_email'] ).'</a></p>';
														}
														if( ! empty( $branch_information['author_number'] ) ){
															echo '<p class="contact-info"><a href="'.esc_attr( 'tel:'.$phoneurl ).'"><i class="far fa-phone-alt"></i>'.esc_html( $branch_information['author_number'] ).'</a></p>';
														}
													echo '</div>';
													echo '<!-- Branch Officer Information End -->';
												echo '</div>';
											echo '</div>';
											echo '<!-- Branch Info Header -->';
										echo '</div><!-- .col END -->';
										echo '<div class="col-lg-6">';
											echo '<!-- branch info body -->';
											echo '<div class="branch-info-body">';
												if( ! empty( $branch_information['branch_name'] ) ){
													echo '<h2 class="branch-title">'.esc_html( $branch_information['branch_name'] ).'</h2>';
												}
												if( ! empty( $branch_information['branch_location'] ) ){
													echo '<p class="branch-location"><i class="fas fa-map-marker-alt"></i>'.esc_html( $branch_information['branch_location'] ).'</p>';
												}
												echo '<!-- Branch Information Area -->';
												echo '<div class="branch-info">';
													$phoneurltwo   = str_replace( $replace, $with, $branch_information['branch_phone_number'] );
													if( ! empty( $branch_information['branch_phone_number'] ) ){
														echo '<!-- Singele Info -->';
														echo '<div class="info-box">';
															echo '<div class="icon">';
																echo '<span><i class="fas fa-phone-alt"></i></span>';
															echo '</div>';
															
															echo '<div class="content">';
																echo '<span>'.esc_html__( 'Get In Touch', 'mixlax' ).'</span>';
																echo '<p class="text"><a href="'.esc_attr( 'tel:'.$phoneurltwo ).'">'.esc_html( $branch_information['branch_phone_number'] ).'</a></p>';
															echo '</div>';
														echo '</div>';
													}
													$emailurltwo   = str_replace( $replace, $with, $branch_information['branch_email'] );
													if( ! empty( $branch_information['branch_email'] ) ){
														echo '<!-- Singele Info -->';
														echo '<div class="info-box">';
															echo '<div class="icon">';
																echo '<span><i class="fal fa-envelope"></i></span>';
															echo '</div>';
															echo '<div class="content">';
																echo '<span>'.esc_html__( 'mail Us','mixlax' ).'</span>';
																echo '<p class="text"><a href="'.esc_attr( 'mailto:'.$emailurltwo ).'">'.esc_html( $branch_information['branch_email'] ).'</a></p>';
															echo '</div>';
														echo '</div>';
													}
												echo '</div>';
												if( ! empty( $branch_information['button_text'] ) ){
													echo '<!-- Branch Information Area -->';
													echo '<a href="'.esc_attr( 'mailto:'.$emailurltwo ).'" class="primary-btn">'.esc_html( $branch_information['button_text'] ).'</a>';
												}
												echo '<!-- map button -->';
												echo '<a href="#google-map" class="map-button button scroll-down">';
													echo '<i class="fas fa-map-marker-alt"></i>';
													echo '<span class="ripple ripple-1"></span>';
													echo '<span class="ripple ripple-2"></span>';
													echo '<span class="ripple ripple-3"></span>';
												echo '</a>';
											echo '</div>';
											echo '<!-- branch info body end -->';
										echo '</div><!-- .col END -->';
									echo '</div><!-- .row END -->';
								echo '</div>';
								echo '<!-- Single Branch Information end -->';
							}
						echo '</div>';
					echo '</div><!-- .container END -->';
				echo '</div>';
				echo '<!-- branch Information Area end -->';
			}
		}else{
			echo '<div class="branch-information-layout2">';
		        echo '<div class="container">';
		            echo '<div class="single-branch-info mb-30">';
						if( ! empty( $settings['branch_image']['url'] ) ){
							echo '<!-- Branch Image -->';
							echo '<div class="branch-img">';
								echo wellnez_img_tag( array(
									'url'	=> esc_url( $settings['branch_image']['url'] ),
								) );
							echo '</div>';
						}
		                echo '<div class="branch-officer-info">';
		                    echo '<!-- Toggler Button -->';
		                    echo '<a href="#" class="officer-info-toggler button">';
		                        echo '<i class="fal fa-user"></i>';
		                        echo '<span class="ripple ripple-1"></span>';
		                        echo '<span class="ripple ripple-2"></span>';
		                        echo '<span class="ripple ripple-3"></span>';
		                    echo '</a>';
							echo '<div class="officer-info-box">';
								if( ! empty( $settings['author_image']['url'] ) ){
									echo '<div class="avater">';
										echo wellnez_img_tag( array(
											'url'	=> esc_url( $settings['author_image']['url'] ),
										) );
									echo '</div>';
								}
								if( ! empty( $settings['author_name'] ) ){
									echo '<h3 class="name">'.esc_html( $settings['author_name'] ).'</h3>';
								}
								if( ! empty( $settings['author_desi'] ) ){
									echo '<span class="degi">'.esc_html( $settings['author_desi'] ).'</span>';
								}
								$replace 	= array(' ','-',' - ');
								$with 		= array('','','');
								$emailurl   = str_replace( $replace, $with, $settings['author_email'] );
								$phoneurl   = str_replace( $replace, $with, $settings['author_number'] );
								if( ! empty( $settings['author_email'] ) ){
									echo '<p class="contact-info"><a href="'.esc_attr( 'mailto:'.$emailurl ).'"><i class="fal fa-envelope"></i>'.esc_html( $settings['author_email'] ).'</a></p>';
								}
								if( ! empty( $settings['author_number'] ) ){
									echo '<p class="contact-info"><a href="'.esc_attr( 'tel:'.$phoneurl ).'"><i class="far fa-phone-alt"></i>'.esc_html( $settings['author_number'] ).'</a></p>';
								}
							echo '</div>';
		                echo '</div>';
		
		                echo '<div class="branch-info">';
							if( ! empty( $settings['branch_name'] ) ){
								echo '<h2 class="branch-title">'.esc_html( $settings['branch_name'] ).'</h2>';
							}
							if( ! empty( $settings['branch_location'] ) ){
								echo '<p class="branch-location"><i class="fas fa-map-marker-alt"></i>'.esc_html( $settings['branch_location'] ).'</p>';
							}
		                    echo '<div class="row ">';
		                        echo '<div class="col-sm-6 col-md-5 col-lg-6">';
								$phoneurltwo   = str_replace( $replace, $with, $settings['branch_phone_number'] );
								if( ! empty( $settings['branch_phone_number'] ) ){
		                            echo '<!-- Singele Info -->';
		                            echo '<div class="info-box">';
		                                echo '<div class="icon">';
		                                    echo '<span><i class="fas fa-phone-alt"></i></span>';
		                                echo '</div>';
		                                echo '<div class="content">';
		                                    echo '<span class="info-title">'.esc_html__( 'Get In Touch','mixlax' ).'</span>';
		                                    echo '<p class="text"><a href="'.esc_attr( 'tel:'.$phoneurltwo ).'">'.esc_html( $settings['branch_phone_number'] ).'</a></p>';
		                                echo '</div>';
		                            echo '</div>';
								}
		                        echo '</div>';
		                        echo '<div class="col-sm-6 col-md-5 col-lg-6 pt-2 pt-sm-0">';
									$emailurltwo   = str_replace( $replace, $with, $settings['branch_email'] );
									if( ! empty( $settings['branch_email'] ) ){
										echo '<!-- Singele Info -->';
										echo '<div class="info-box">';
											echo '<div class="icon">';
												echo '<span><i class="fal fa-envelope"></i></span>';
											echo '</div>';
											echo '<div class="content">';
												echo '<span class="info-title">'.esc_html__( 'mail Us','mixlax' ).'</span>';
												echo '<p class="text"><a href="'.esc_attr( 'mailto:'.$emailurltwo ).'">'.esc_html( $settings['branch_email'] ).'</a></p>';
											echo '</div>';
										echo '</div>';
									}
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}
	}

}