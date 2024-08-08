<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Background;
/**
 *
 * FAQ Widget .
 *
 */
class Wellnez_Newsletter extends Widget_Base {

	public function get_name() {
		return 'wellneznewsletter';
	}

	public function get_title() {
		return __( 'Newsletter', 'wellnez' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'wellnez' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'newsletter_content',
			[
				'label' 	=> __( 'Newsletter', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'newsletter_style',
			[
				'label' 		=> __( 'Newsletter Style', 'wellnez' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options' 		=> [
					'one'  			=> __( 'Style One', 'wellnez' ),
					'two' 			=> __( 'Style Two', 'wellnez' ),
					'three' 		=> __( 'Style Three', 'wellnez' ),
					'four' 			=> __( 'Style Four', 'wellnez' ),
				],
			]
		);

		$this->add_control(
			'image',
			[
				'label' 		=> __( 'Set Image', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'newsletter_style' => [ 'one','two','three' ] ],
			]
		);
		$this->add_control(
			'section_title',
			[
				'label' 		=> __( 'Section Title', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'SUBSCRIBE TO NEWSLETTER', 'wellnez' ),
			]
		);
		$this->add_control(
			'section_subtitle',
			[
				'label' 		=> __( 'Section Subtitle', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Subtitle Text', 'wellnez' ),
			]
		);
		$this->add_control(
			'newsletter_placeholder',
			[
				'label' 		=> __( 'Newsletter Placeholder Text', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Enter Your Email', 'wellnez' ),
			]
		);
		$this->add_control(
			'newsletter_button',
			[
				'label' 		=> __( 'Newsletter Button Text', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Subscribe', 'wellnez' ),
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'faq_section_style',
			[
				'label' 	=> __( 'Newsletter Style', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Title Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .subscribe-sec-wrapper .subscribe-content .title,{{WRAPPER}} .widget_title' => 'color: {{VALUE}}!important',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'label' 		=> __( 'Title Typography', 'wellnez' ),
				'selector' 		=> '{{WRAPPER}} .subscribe-sec-wrapper .subscribe-content .title,{{WRAPPER}} .widget_title',
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' 		=> __( 'Sub Title Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .subscribe-sec-wrapper .subscribe-content .text,{{WRAPPER}} .widget-newsletter .text' => 'color: {{VALUE}}!important',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'subtitle_typography',
				'label' 		=> __( 'Sub Title Typography', 'wellnez' ),
				'selector' 		=> '{{WRAPPER}} .subscribe-sec-wrapper .subscribe-content .text,{{WRAPPER}} .widget-newsletter .text',
			]
		);
		$this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Button Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .primary-btn' => 'color: {{VALUE}}!important',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'button_typography',
				'label' 		=> __( 'Button Typography', 'wellnez' ),
				'selector' 		=> '{{WRAPPER}} .primary-btn',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( $settings['newsletter_style'] == 'one' ){
			echo '<!-- Subscribe Area -->';
			echo '<section class="subscribe-sec-wrapper subscribe-layout1">';
			  	echo '<div class="container">';
			    	echo '<div class="inner-wrapper background-image pt-70 pb-80" data-img="'.esc_attr( $settings['image']['url'] ).'">';
			      		echo '<div class="row gutters-20 text-center justify-content-center">';
			        		echo '<div class="col-11 col-md-10 col-lg-8 col-xl-6 wow fadeInUp" data-wow-delay="0.6s">';
			          			echo '<div class="subscribe-content">';
									if( !empty( $settings['section_title'] ) ){
				            			echo '<h2 class="title">'.wp_kses_post( $settings['section_title'] ).'</h2>';
									}
									if( !empty( $settings['section_subtitle'] ) ){
				            			echo '<p class="text">'.wp_kses_post( $settings['section_subtitle'] ).'</p>';
									}
			            			echo '<!-- Subscribe Form -->';
			            			echo '<form action="#" class="subsc-form newsletter-form">';
						              	echo '<div class="form-group d-sm-flex align-items-center">';
						                	echo '<input required type="email" placeholder="'.esc_attr( $settings['newsletter_placeholder'] ).'" class="form-control">';
						                	echo '<button type="submit" class="primary-btn hover-white">'.esc_html( $settings['newsletter_button'] ).'</button>';
						              	echo '</div>';
						            echo '</form>';
			          			echo '</div>';
			        		echo '</div>';
			      		echo '</div><!-- .row END -->';
			    	echo '</div>';
			  	echo '</div>';
				echo '<!-- .container END -->';
			echo '</section>';
			echo '<!-- Subscribe Area end -->';
		}elseif( $settings['newsletter_style'] == 'two' ){
			echo '<!-- Subscribe Area -->';
			echo '<section class="subscribe-sec-wrapper subscribe-layout2 background-image pt-90 pb-90" data-img="'.esc_attr( $settings['image']['url'] ).'" >';
			  echo '<div class="container">';
			    echo '<div class="row justify-content-center  align-items-center wow fadeInUp" data-wow-delay="0.4s">';
			      echo '<div class="col-lg-8 col-xl-5">';
			        echo '<!-- subscribe content -->';
			        echo '<div class="subscribe-content">';
						if( !empty( $settings['section_title'] ) ){
							echo '<h2 class="title">'.wp_kses_post( $settings['section_title'] ).'</h2>';
						}
						if( !empty( $settings['section_subtitle'] ) ){
							echo '<p class="text">'.wp_kses_post( $settings['section_subtitle'] ).'</p>';
						}
			        echo '</div>';
			      echo '</div>';
			      echo '<div class="col-lg-10 col-xl-7">';
			        echo '<!-- Subscribe Form -->';
			        echo '<form action="#" class="subsc-form newsletter-form">';
			          echo '<div class="form-group d-sm-flex align-items-center">';
			            echo '<div class="skew">';
			              echo '<input required type="email" placeholder="'.esc_attr( $settings['newsletter_placeholder'] ).'" class="form-control">';
			            echo '</div>';
			            echo '<button type="submit" class="primary-btn type2 skew hover-white">'.esc_html( $settings['newsletter_button'] ).'</button>';
			          echo '</div>';
			        echo '</form>';
			      echo '</div>';
			    echo '</div><!-- .row END -->';
			  echo '</div><!-- .container END -->';
			echo '</section>';
			echo '<!-- Subscribe Area end -->';
		}elseif( $settings['newsletter_style'] == 'three' ){
			echo '<!-- Subscribe Area -->';
			echo '<section class="subscribe-sec-wrapper subscribe-layout3 background-image pt-90 pb-100" data-img="'.esc_attr( $settings['image']['url'] ).'" >';
			  echo '<div class="container">';
			    echo '<div class="row justify-content-center  align-items-center wow fadeInUp" data-wow-delay="0.4s">';
			      echo '<div class="col-lg-8 col-xl-5">';
			        echo '<!-- subscribe content -->';
			        echo '<div class="subscribe-content">';
						if( !empty( $settings['section_title'] ) ){
							echo '<h2 class="title">'.wp_kses_post( $settings['section_title'] ).'</h2>';
						}
						if( !empty( $settings['section_subtitle'] ) ){
							echo '<p class="text">'.wp_kses_post( $settings['section_subtitle'] ).'</p>';
						}
			        echo '</div>';
			      echo '</div>';

			      echo '<div class="col-lg-10 col-xl-7">';
			        echo '<!-- Subscribe Form -->';
			        echo '<form action="#" class="subsc-form newsletter-form">';
			          echo '<div class="form-group d-sm-flex align-items-center">';
			            echo '<input required type="email" placeholder="'.esc_attr( $settings['newsletter_placeholder'] ).'" class="form-control">';
			            echo '<button type="submit" class="primary-btn hover-white">'.esc_html( $settings['newsletter_button'] ).'</button>';
			          echo '</div>';
			        echo '</form>';
			      echo '</div>';
			    echo '</div><!-- .row END -->';
			  echo '</div><!-- .container END -->';
			echo '</section>';
			echo '<!-- Subscribe Area end -->';
		}else{
			echo '<div class="footer-layout3">';
				echo '<div class="footer-wid-wrap">';
					echo '<div class="widget widget-newsletter footer-widget">';
					  echo '<!-- Title -->';
					  	if( !empty( $settings['section_title'] ) ){
						  	echo '<h3 class="widget_title">'.esc_html( $settings['section_title'] ).'</h3>';
					  	}
						if( !empty( $settings['section_subtitle'] ) ){
						  	echo '<p class="text">'.wp_kses_post( $settings['section_subtitle'] ).'</p>';
			  			}
					  	echo '<form action="#" class="newsletter-form">';
							echo '<div class="form-group">';
						  		echo '<input required type="email" placeholder="'.esc_attr( $settings['newsletter_placeholder'] ).'">';
						  	echo '<i class="fal fa-envelope"></i>';
						echo '</div>';
						echo '<button class="primary-btn skew hover-white" type="submit">'.esc_html( $settings['newsletter_button'] ).'</button>';
					  echo '</form>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		}
	}

}