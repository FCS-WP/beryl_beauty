<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Background;
use \Elementor\Repeater;
/**
 *
 * Image Widget .
 *
 */
class Mixlax_Experience_Info extends Widget_Base {

	public function get_name() {
		return 'carvisexperienceinfo';
	}

	public function get_title() {
		return __( 'About Us', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' 	=> __( 'Section Content', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		
		$this->add_control(
			'about_us_style',
			[
				'label' 	=> __( 'About Us Style', 'mixlax' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> [
					'1' => __( 'Style One', 'mixlax' ),
					'2' => __( 'Style Two', 'mixlax' ),
				],
				'default' => '1',
			]
        );
		
		$this->add_control(
			'section_title',
			[
				'label' 		=> __( 'Section Title', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default'		=> __( 'WE HAVE 25 YEARS', 'mixlax' ),
			]
		);

        $this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'mixlax' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' 		=> 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default' 	=> 'large',
				'separator' => 'none',
			]
		);

        $this->add_control(
			'link',
			[
				'label' 		=> __( 'Link', 'mixlax' ),
				'type' 			=> Controls_Manager::URL,
                'placeholder' 	=> __( 'https://your-link.com', 'mixlax' ),
                'show_external' => true,
				'default' => [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
        );
		
		$this->add_control(
			'experience_box_bg',
			[
				'label' 		=> __( 'Experience Box Background', 'mixlax' ),
				'type' 			=> Controls_Manager::HEADING,
				'condition'		=> [ 'about_us_style' => '1' ],
			]
		);
		
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' 			=> 'background',
				'label' 		=> __( 'Background', 'mixlax' ),
				'types' 		=> [ 'classic', 'gradient' ],
				'selector' 		=> '{{WRAPPER}} .about-us-sec .experiance-box',
				'condition'		=> [ 'about_us_style' => '1' ],
			]
		);
		
		$this->add_control(
			'main_title',
			[
				'label' 		=> __( 'Main Title', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default'		=> __( 'Experience', 'mixlax' ),
				'condition'		=> [ 'about_us_style' => '1' ],
			]
		);
		
		$this->add_control(
			'main_subtitle',
			[
				'label' 		=> __( 'Subtitle', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default'		=> __( 'Best Services Company', 'mixlax' ),
				'condition'		=> [ 'about_us_style' => '1' ],
			]
		);
		$this->add_control(
			'description',
			[
				'label' 		=> __( 'Description', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default'		=> __( 'Description', 'mixlax' ),
			]
		);
		$this->add_control(
			'video_button_text',
			[
				'label' 		=> __( 'Video Button Text', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default'		=> __( 'Watch Video', 'mixlax' ),
				'condition'		=> [ 'about_us_style' => '2' ],
			]
		);
		$this->add_control(
			'video_button_url',
			[
				'label' 		=> __( 'Video Button Url', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'condition'		=> [ 'about_us_style' => '2' ],
			]
		);
		$this->add_control(
			'signature_image',
			[
				'label' => __( 'Signature Image', 'mixlax' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'about_us_style' => '2' ],
			]
		);
		
		$this->add_control(
			'about_us_title',
			[
				'label' 		=> __( 'About Us Section Title', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default'		=> __( 'WELCOME TO MIXLAX', 'mixlax' ),
				'condition'		=> [ 'about_us_style' => '1' ],
			]
		);
		$this->add_control(
			'about_us_description',
			[
				'label' 		=> __( 'About Us Description', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default'		=> __( 'Write Abpout Us Description', 'mixlax' ),
				'condition'		=> [ 'about_us_style' => '1' ],
			]
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'list_title', [
				'label' 		=> __( 'Point', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'List Point' , 'mixlax' ),
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'list',
			[
				'label' 		=> __( 'List Item', 'mixlax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' => __( 'List #1', 'mixlax' ),
					],
					[
						'list_title' => __( 'List #2', 'mixlax' ),
					],
				],
				'title_field' 	=> '{{{ list_title }}}',
				'condition'		=> [ 'about_us_style' => '1' ],
			]
		);
		
		$this->add_control(
			'banner_ad_image',
			[
				'label' 		=> __( 'Banner Image', 'mixlax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic'		=> [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'about_us_style' => '1' ],
			]
		);
		$this->add_control(
			'banner_image_url',
			[
				'label' 		=> __( 'Link', 'mixlax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'mixlax' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
				'condition'		=> [ 'about_us_style' => '1' ],
			]
		);
		$this->add_control(
			'banner_ad_title', [
				'label' 		=> __( 'Banner Image Title', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition'		=> [ 'about_us_style' => '1' ],
			]
		);
		$this->add_control(
			'banner_ad_currency', [
				'label' 		=> __( 'Banner Currency', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition'		=> [ 'about_us_style' => '1' ],
			]
		);
		$this->add_control(
			'banner_ad_price', [
				'label' 		=> __( 'Banner Discount Price', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'condition'		=> [ 'about_us_style' => '1' ],
			]
		);
		$this->add_control(
			'time_action_title', [
				'label' 		=> __( 'Time Action Box Title', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'default'		=> __( 'Monday to Saturday', 'mixlax' ),
				'condition'		=> [ 'about_us_style' => '2' ],
			]
		);
		$this->add_control(
			'set_time', [
				'label' 		=> __( 'Set Time', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'default'		=> __( '8:00 am - 5:30 pm', 'mixlax' ),
				'condition'		=> [ 'about_us_style' => '2' ],
			]
		);
		$this->add_control(
			'phone_action_title', [
				'label' 		=> __( 'Phone Action Box Title', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'default'		=> __( 'PHONE NUMBER', 'mixlax' ),
				'condition'		=> [ 'about_us_style' => [ '1','2' ] ],
			]
		);
		$this->add_control(
			'phone_number', [
				'label' 		=> __( 'Set Phone Number', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'default'		=> __( '052 (699) 256 - 692', 'mixlax' ),
				'condition'		=> [ 'about_us_style' => [ '1','2' ] ],
			]
		);
		$this->add_control(
			'email_action_title', [
				'label' 		=> __( 'Email Action Box Title', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'default'		=> __( 'EMAIL ADDRESS', 'mixlax' ),
				'condition'		=> [ 'about_us_style' => [ '1','2' ] ],
			]
		);
		$this->add_control(
			'email_address', [
				'label' 		=> __( 'Set Phone Number', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'default'		=> __( 'info@mixlax.com', 'mixlax' ),
				'condition'		=> [ 'about_us_style' => [ '1','2' ] ],
			]
		);
		$this->add_control(
			'button_text', [
				'label' 		=> __( 'Button Text', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'label_block' 	=> true,
				'default'		=> __( 'GET MORE INFO', 'mixlax' ),
				'condition'		=> [ 'about_us_style' => [ '1','2' ] ],
			]
		);
		$this->add_control(
			'button_url',
			[
				'label' 		=> __( 'Button Url', 'mixlax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'mixlax' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
				'condition'		=> [ 'about_us_style' => [ '1','2' ] ],
			]
		);
        $this->end_controls_section();

		$this->start_controls_section(
			'general',
			[
				'label' => __( 'General', 'mixlax' ),
                'tab' => Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'section_bg_shape',
			[
				'label' 		=> __( 'Section Bg Shape', 'mixlax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
				'selectors' => [
                    '{{WRAPPER}} .about-wrap-layout1:before' 		=> 'background-image: url({{URL}});',
                ],
				'condition'		=> [ 'about_us_style' => [ '1','2' ] ],
			]
		);
		$this->end_controls_section();
		
        $this->start_controls_section(
			'section_style',
			[
				'label' 	=> __( 'Style', 'mixlax' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		
		$this->add_control(
			'section_title_color',
			[
				'label' 		=> __( 'Section Title Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-wrap-layout1 .about-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .about-wrap-layout2 .about-us-content .about-title' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_title_typography',
				'label' 	=> __( 'Section Title Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .about-wrap-layout1 .about-title,{{WRAPPER}} .about-wrap-layout2 .about-us-content .about-title',
			]
		);
		
		$this->add_control(
			'main_title_color',
			[
				'label' 		=> __( 'Main Title Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-us-sec .experiance-box .content .main-title' => 'color: {{VALUE}}',
				],
				'condition'		=> [ 'about_us_style' => '1' ],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'main_title_typography',
				'label' 	=> __( 'Main Title Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .about-us-sec .experiance-box .content .main-title',
				'condition'	=> [ 'about_us_style' => '1' ],
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' 		=> __( 'Subtitle Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-us-sec .experiance-box .content .title' => 'color: {{VALUE}}',
				],
				'condition'		=> [ 'about_us_style' => '1' ],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'subtitle_typography',
				'label' 	=> __( 'Subtitle Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .about-us-sec .experiance-box .content .title',
				'condition'	=> [ 'about_us_style' => '1' ],
			]
		);
		
		$this->add_control(
			'description_color',
			[
				'label' 		=> __( 'Description Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-us-sec .experiance-box .content .text,{{WRAPPER}} .about-wrap-layout2 .about-us-content p.text' => 'color: {{VALUE}}',
				],
				'condition'	=> [ 'about_us_style' => [ '1','2' ] ],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'description_typography',
				'label' 	=> __( 'Description Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .about-us-sec .experiance-box .content .text,{{WRAPPER}} .about-wrap-layout2 .about-us-content p.text',
				'condition'	=> [ 'about_us_style' => [ '1','2' ] ],
			]
		);
		
		$this->add_control(
			'about_us_title_color',
			[
				'label' 		=> __( 'About Us Section Title Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-wrap-layout1 .sub-title' => 'color: {{VALUE}}',
				],
				'condition'	=> [ 'about_us_style' => '1' ],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'about_us_title_typography',
				'label' 	=> __( 'About Us Section Title Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .about-wrap-layout1 .sub-title',
				'condition'	=> [ 'about_us_style' => '1' ],
			]
		);
		
		$this->add_control(
			'about_us_description_color',
			[
				'label' 		=> __( 'About Us Description Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-wrap-layout1 .about-us-content .text' => 'color: {{VALUE}}',
				],
				'condition'	=> [ 'about_us_style' => '1' ],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'about_us_description_typography',
				'label' 	=> __( 'About Us Description Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .about-wrap-layout1 .about-us-content .text',
				'condition'	=> [ 'about_us_style' => '1' ],
			]
		);
		
		$this->add_control(
			'about_us_list_color',
			[
				'label' 		=> __( 'About Us List Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-wrap-layout1 .about-us-content .features-list ul li' => 'color: {{VALUE}}',
				],
				'condition'		=> [ 'about_us_style' => '1' ],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'about_us_list_typography',
				'label' 	=> __( 'About Us List Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .about-wrap-layout1 .about-us-content .features-list ul li',
				'condition'	=> [ 'about_us_style' => '1' ],
			]
		);
		
		$this->add_control(
			'banner_image_title_color',
			[
				'label' 		=> __( 'Banner Image Title Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .widget_offer_banner .title' => 'color: {{VALUE}}',
				],
				'condition'		=> [ 'about_us_style' => '1' ],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'banner_image_title_typography',
				'label' 	=> __( 'Banner Image Title Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .widget_offer_banner .title',
				'condition'	=> [ 'about_us_style' => '1' ],
			]
		);
		$this->add_control(
			'action_box_title_color',
			[
				'label' 		=> __( 'Action Box Title Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-wrap-layout1 .action-area .action-box .content span,{{WRAPPER}} .about-wrap-layout2 .action-area .action-box .content span' => 'color: {{VALUE}}',
				],
				'condition'	=> [ 'about_us_style' => [ '1','2' ] ],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'action_box_title_typography',
				'label' 	=> __( 'Action Box Title Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .about-wrap-layout1 .action-area .action-box .content span,{{WRAPPER}} .about-wrap-layout2 .action-area .action-box .content span',
				'condition'	=> [ 'about_us_style' => [ '1','2' ] ],
			]
		);
		$this->add_control(
			'action_box_text_color',
			[
				'label' 		=> __( 'Action Box Text Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-wrap-layout1 .action-area .action-box .content .text,{{WRAPPER}} .about-wrap-layout2 .action-area .action-box .content .text' => 'color: {{VALUE}}',
				],
				'condition'	=> [ 'about_us_style' => [ '1','2' ] ],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'action_box_text_typography',
				'label' 	=> __( 'Action Box Text Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .about-wrap-layout1 .action-area .action-box .content .text,{{WRAPPER}} .about-wrap-layout2 .action-area .action-box .content .text',
				'condition'	=> [ 'about_us_style' => [ '1','2' ] ],
			]
		);
		$this->add_control(
			'button_text_color',
			[
				'label' 		=> __( 'Button Text Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .primary-btn .btn-text' => 'color: {{VALUE}}',
				],
				'condition'	=> [ 'about_us_style' => [ '1','2' ] ],
			]
		);
		$this->add_control(
			'button_background_color',
			[
				'label' 		=> __( 'Button Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .primary-btn' => 'background-color: {{VALUE}}',
				],
				'condition'	=> [ 'about_us_style' => [ '1','2' ] ],
			]
		);
		
		$this->add_control(
			'button_hover_background_color',
			[
				'label' 		=> __( 'Button Hover Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .primary-btn .btn-bg' => 'background-color: {{VALUE}}',
				],
				'condition'	=> [ 'about_us_style' => [ '1','2' ] ],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_text_typography',
				'label' 	=> __( 'Button Text Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .primary-btn .btn-text',
				'condition'	=> [ 'about_us_style' => [ '1','2' ] ],
			]
		);
		$this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('wrapper','class','about-us-img');


        if( !empty( $settings['link']['url'] ) ) {
            $this->add_render_attribute('link','href',esc_url( $settings['link']['url'] ));
        }

        if( !empty( $settings['link']['nofollow'] ) ) {
            $this->add_render_attribute('link','rel', 'nofollow' );
        }

        if( !empty( $settings['link']['is_external'] ) ) {
            $this->add_render_attribute('link','target','_blank');
        }
		
		if( $settings['about_us_style'] == '1' ){
			echo '<div class="about-us-sec about-wrap-layout1 pt-155 pb-130">';
				echo '<div class="container">';
		      		echo '<div class="row wow fadeInUp" data-wow-delay="0.4s">';
		        		echo '<div class="col-12">';
							if( ! empty( $settings['section_title'] ) ){
			          			echo '<!-- Title -->';
			          			echo '<h2 class="about-title">'.wp_kses_post( $settings['section_title'] ).'</h2>';
							}
			        	echo '</div>';
			        	echo '<!-- About Us Image Area -->';
				        echo '<div class="col-lg-5 col-xl-4">';
							echo '<div class="about-us-left">';
							    if( !empty( $settings['image']['id'] ) ) {
								    echo '<div '.$this->get_render_attribute_string('wrapper').'>';
									    if( !empty( $settings['link']['url'] ) ){
										    echo '<a '.$this->get_render_attribute_string('link').'>';
									   	}
									  	echo '<img src="'.esc_url( Group_Control_Image_Size::get_attachment_image_src($settings['image']['id'],'image',$settings) ).'" alt="'.esc_attr( mixlax_img_default_alt( Group_Control_Image_Size::get_attachment_image_src($settings['image']['id'],'image',$settings) ) ).'" >';

									    if( !empty( $settings['link']['url'] ) ){
										    echo '</a>';
									   	}
								    echo '</div>';
							    }
							    echo '<!-- Experience Box -->';
							    echo '<div class="experiance-box d-md-flex">';
								    echo '<div class="icon">';
									    echo '<span><i class="flaticon-award"></i></span>';
								    echo '</div>';
								    echo '<div class="content">';
									    if( !empty( $settings['main_title'] ) ){
										    echo '<h2 class="main-title">'.esc_html( $settings['main_title'] ).'</h2>';
									    }
									  	if( !empty( $settings['main_subtitle'] ) ){
										  	echo '<h3 class="title">'.esc_html( $settings['main_subtitle'] ).'</h3>';
									  	}
									  	if( !empty( $settings['description'] ) ){
										  	echo '<p class="text">'.wp_kses_post( $settings['description'] ).'</p>';
									  	}
								  	echo '</div>';
							  	echo '</div>';
							echo '</div>';
						echo '</div>';
				        echo '<!-- About Us Image Area end -->';
				        echo '<!-- About Us Content Area -->';
				        	echo '<div class="col-lg-7 col-xl-5">';
				          		echo '<div class="about-us-content">';
									if( ! empty( $settings['about_us_title'] ) ){
					            		echo '<h3 class="sub-title">'.wp_kses_post( $settings['about_us_title'] ).'</h3>';
									}
									if( ! empty( $settings['about_us_description'] ) ){
				            			echo '<p class="text">'.wp_kses_post( $settings['about_us_description'] ).'</p>';
									}
									if( !empty( $settings['list'] ) ){
				            			echo '<!-- Features List -->';
							            echo '<div class="features-list">';
							              	echo '<ul>';
												foreach( $settings['list'] as $single_list ){
								                	echo '<li>'.esc_html( $single_list['list_title'] ).'</li>';
												}
							              	echo '</ul>';
							            echo '</div>';
									}
				          		echo '</div>';
				        	echo '</div>';
				        echo '<!-- About Us Content Area end -->';
				        echo '<!-- Offer Widget -->';
				        echo '<div class="col col-lg-4 col-xl-3">';
				          	echo '<div class="widget widget_offer_banner d-none d-xl-block">';
						  	$target_banner   = $settings['banner_image_url']['is_external'] ? ' target="_blank"' : '';
						  	$nofollow_banner = $settings['banner_image_url']['nofollow'] ? ' rel="nofollow"' : '';
				            echo '<a href="'.esc_url( $settings['banner_image_url']['url'] ).'" '.wp_kses_post( $target_banner.$nofollow_banner ).' class="link-overlay"></a>';
								if( ! empty( $settings['banner_ad_title'] ) ){
						            echo '<h3 class="title">'.wp_kses_post( $settings['banner_ad_title'] ).'</h3>';
								}
				
					            echo '<div class="price-box">';
					                echo '<span class="text">'.esc_html__( 'Start', 'mixlax' ).'</span>';
					                echo '<span class="price"><sup>'.esc_html( $settings['banner_ad_currency'] ).'</sup>'.wp_kses_post( $settings['banner_ad_price'] ).'</span>';
					                echo '<span class="sub">'.esc_html__( '/Off', 'mixlax' ).'</span>';
					            echo '</div>';
				
					            if( !empty( $settings['banner_ad_image']['url'] ) ){
									echo wellnez_img_tag( array(
										'url'	=> esc_url( $settings['banner_ad_image']['url'] )
									) );
								}
				            
				          echo '</div>';
				        echo '</div>';
				        echo '<!-- Offer Widget end -->';
				        echo '<!-- Action Area -->';
				        echo '<div class="col-lg-11 col-xl-8 offset-xl-4">';
				          	echo '<div class="action-area d-md-flex justify-content-between align-items-center">';
				            	echo '<div class="action-box-area d-sm-flex">';
				              		echo '<!-- Single Action Box -->';
				              			echo '<div class="action-box">';
				                			echo '<div class="icon">';
						                  		echo '<span><i class="flaticon-call"></i></span>';
						                	echo '</div>';
				                			echo '<div class="content">';
												if( ! empty( $settings['phone_action_title'] ) ){
									                echo '<span>'.esc_html( $settings['phone_action_title'] ).'</span>';
												}
												$mixlax_phone   		=  $settings['phone_number'];
												$mixlax_replace 		= array(' ','-',' - ','(',')');
												$mixlax_with 	 		= array('','','','','');
												if( ! empty( $mixlax_phone ) ){
													$mixlax_mobileurl 	    = str_replace( $mixlax_replace, $mixlax_with, $mixlax_phone );
								                  	echo '<p class="text"><a href="'.esc_attr( 'tel:'.$mixlax_mobileurl ).'">'.esc_html( $mixlax_phone ).'</a></p>';
												}
											echo '</div>';
				              			echo '</div>';
				              			echo '<!-- action Box -->';
				              		echo '<div class="action-box">';
						                echo '<div class="icon">';
						                  	echo '<span><i class="flaticon-envelope"></i></span>';
						                echo '</div>';
				                		echo '<div class="content">';
											if( ! empty( $settings['email_action_title'] ) ){
												echo '<span>'.esc_html( $settings['email_action_title'] ).'</span>';
											}
											$mixlax_email   		=  $settings['email_address'];
											if( ! empty( $mixlax_email ) ){
												$mixlax_emailurl 	    = str_replace( $mixlax_replace, $mixlax_with, $mixlax_email );
								                echo '<p class="text"><a href="'.esc_attr( 'mailto:'.$mixlax_emailurl ).'">'.esc_html( $mixlax_email ).'</a></p>';
											}
				                		echo '</div>';
				              		echo '</div>';
				            	echo '</div>';
								if( ! empty( $settings['button_text'] ) ){
									$button_target = $settings['button_url']['is_external'] ? ' target="_blank"' : '';
									$button_nofollow = $settings['button_url']['nofollow'] ? ' rel="nofollow"' : '';
						            echo '<!-- Action Btn -->';
						            echo '<div class="action-btn">';
						              echo '<a '.wp_kses_post( $button_target.$button_nofollow ).' href="'.esc_url( $settings['button_url']['url'] ).'" class="primary-btn no-shadow">'.esc_html( $settings['button_text'] ).'</a>';
						            echo '</div>';
								}
					        echo '</div>';
				        echo '</div>';
				        echo '<!-- Action Area end -->';
			        echo '</div>';
			    echo '</div>';
		    echo '</div>';
		}else{
			echo '<!-- About Us Section -->';
			echo '<div class="about-us-sec about-wrap-layout2 pb-130">';
				if( !empty( $settings['section_bg_shape']['url'] ) ){
					echo '<!-- Bg Shape -->';
					echo '<div class="shape-bg">';
						echo wellnez_img_tag( array(
							'url'	=> esc_url( $settings['section_bg_shape']['url'] ),
						) );
					echo '</div>';
				}
				echo '<div class="container">';
					echo '<div class="row gutters-20 align-items-center wow fadeInUp" data-wow-delay="0.4s">';
						echo '<!-- About Us Image Area -->';
						echo '<div class="col-lg-5">';
							if( !empty( $settings['image']['id'] ) ) {
								echo '<div class="about-us-img">';
									if( !empty( $settings['link']['url'] ) ){
										echo '<a '.$this->get_render_attribute_string('link').'>';
								   }
								  echo '<img src="'.esc_url( Group_Control_Image_Size::get_attachment_image_src($settings['image']['id'],'image',$settings) ).'" alt="'.esc_attr( mixlax_img_default_alt( Group_Control_Image_Size::get_attachment_image_src($settings['image']['id'],'image',$settings) ) ).'" >';

									if( !empty( $settings['link']['url'] ) ){
										echo '</a>';
								   }
								echo '</div>';
							}
						echo '</div>';
						echo '<!-- About Us Image Area end -->';
						echo '<!-- About Us Content Area -->';
						echo '<div class="col-lg-7">';
							echo '<div class="about-us-content">';
								if( !empty( $settings['section_title'] ) ){
									echo '<h2 class="about-title">'.wp_kses_post( $settings['section_title'] ).'</h2>';
								}
								if( !empty( $settings['description'] ) ){
									echo '<p class="text">'.wp_kses_post( $settings['description'] ).'</p>';
								}
								echo '<div class="box d-sm-flex align-items-center">';
									if( !empty( $settings['video_button_text'] || $settings['video_button_url'] ) ){
										echo '<!-- Video Btn -->';
										echo '<div class="video-action">';
											echo '<a data-fancybox href="'.esc_url( $settings['video_button_url'] ).'" class="video-btn">';
												echo '<span class="btn-text"><i class="fal fa-play"></i></span>';
												echo '<span class="ripple ripple-1"></span>';
												echo '<span class="ripple ripple-2"></span>';
												echo '<span class="ripple ripple-3"></span>';
											echo '</a>';
											if( !empty( $settings['video_button_text'] ) ){
												echo '<a data-fancybox href="'.esc_url( $settings['video_button_url'] ).'" class="text">'.esc_html( $settings['video_button_text'] ).'</a>';
											}
										echo '</div>';
									}
									if( !empty( $settings['signature_image']['url'] ) ){
										echo '<!-- Author Signature -->';
										echo '<div class="author-signa">';
											echo wellnez_img_tag( array(
												'url'	=> esc_url( $settings['signature_image']['url'] )
											) );
										echo '</div>';
									}
								echo '</div>';
							echo '</div>';
						echo '</div>';
						echo '<!-- About Us Content Area end -->';
						echo '<!-- Action Area -->';
						echo '<div class="col-12">';
							echo '<div class="action-area pt-80 d-xl-flex justify-content-between align-items-center">';
								echo '<div class="action-box-area d-md-flex">';
									echo '<!-- Single Action Box -->';
									echo '<div class="action-box">';
										echo '<div class="icon">';
											echo '<span class="shape-icon"><i class="fal fa-clock"></i></span>';
										echo '</div>';
										echo '<div class="content">';
											if( !empty( $settings['time_action_title'] ) ){
												echo '<span>'.esc_html( $settings['time_action_title'] ).'</span>';
											}
											if( !empty( $settings['set_time'] ) ){
												echo '<p class="text">'.esc_html( $settings['set_time'] ).'</p>';
											}
										echo '</div>';
									echo '</div>';
									echo '<!-- action Box -->';
									echo '<div class="action-box">';
										echo '<div class="icon">';
											echo '<span class="shape-icon"><i class="fal fa-envelope"></i></span>';
										echo '</div>';
										echo '<div class="content">';
											if( ! empty( $settings['email_action_title'] ) ){
												echo '<span>'.esc_html( $settings['email_action_title'] ).'</span>';
											}
											$mixlax_email   		=  $settings['email_address'];
											$mixlax_replace 		= array(' ','-',' - ','(',')');
											$mixlax_with 	 		= array('','','','','');
											if( ! empty( $mixlax_email ) ){
												$mixlax_emailurl 	    = str_replace( $mixlax_replace, $mixlax_with, $mixlax_email );
												echo '<p class="text"><a href="'.esc_attr( 'mailto:'.$mixlax_emailurl ).'">'.esc_html( $mixlax_email ).'</a></p>';
											}
										echo '</div>';
									echo '</div>';
									echo '<!-- action Box -->';
									echo '<div class="action-box">';
										echo '<div class="icon">';
											echo '<span class="shape-icon"><i class="fas fa-phone-alt"></i></span>';
										echo '</div>';
										echo '<div class="content">';
											if( ! empty( $settings['phone_action_title'] ) ){
								                echo '<span>'.esc_html( $settings['phone_action_title'] ).'</span>';
											}
											$mixlax_phone   		=  $settings['phone_number'];
											$mixlax_replace 		= array(' ','-',' - ','(',')');
											$mixlax_with 	 		= array('','','','','');
											if( ! empty( $mixlax_phone ) ){
												$mixlax_mobileurl 	    = str_replace( $mixlax_replace, $mixlax_with, $mixlax_phone );
							                  	echo '<p class="text"><a href="'.esc_attr( 'tel:'.$mixlax_mobileurl ).'">'.esc_html( $mixlax_phone ).'</a></p>';
											}
										echo '</div>';
									echo '</div>';
								echo '</div>';
								if( ! empty( $settings['button_text'] ) ){
									$button_target = $settings['button_url']['is_external'] ? ' target="_blank"' : '';
									$button_nofollow = $settings['button_url']['nofollow'] ? ' rel="nofollow"' : '';
						            echo '<!-- Action Btn -->';
						            echo '<div class="action-btn">';
						              echo '<a '.wp_kses_post( $button_target.$button_nofollow ).' href="'.esc_url( $settings['button_url']['url'] ).'" class="primary-btn type2 skew">'.esc_html( $settings['button_text'] ).'</a>';
						            echo '</div>';
								}
							echo '</div>';
						echo '</div>';
						echo '<!-- Action Area end -->';
					echo '</div>';
				echo '</div>';
			echo '</div>';
			echo '<!-- About Us Section end -->';
		}
	}

}