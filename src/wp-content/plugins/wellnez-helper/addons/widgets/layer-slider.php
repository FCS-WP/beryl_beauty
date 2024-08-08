<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Hero Slider Widget .
 *
 */
class Mixlax_Hero_Slider extends Widget_Base{

	public function get_name() {
		return 'carvisheroslider';
	}

	public function get_title() {
		return __( 'Hero Slider', 'mixlax' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'mixlax' ];
	}

	public function get_style_depends() {
		return [ 'layerslider' ];
	}

	public function get_script_depends() {
		return [ 'greenshok','layersliders', 'layerslider-transitions' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'hero_slider_section',
			[
				'label' 	=> __( 'Hero Slider', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'slider_style',
			[
				'label' 	=> __( 'Slider Style', 'mixlax' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'one',
				'options' 	=> [
					'one'  		=> __( 'Style One', 'mixlax' ),
					'two' 		=> __( 'Style Two', 'mixlax' ),
					'three' 	=> __( 'Style Three', 'mixlax' ),
					'four' 		=> __( 'Style Four', 'mixlax' ),
				],
			]
		);
		$this->add_control(
			'enable_action_box', [
				'label' 		=> __( 'Enable Action Box?', 'mixlax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'mixlax' ),
				'label_off' 	=> __( 'No', 'mixlax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
        );
		$this->add_control(
			'action_box_title', [
				'label' 		=> __( 'Action Box Title', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'SUPPORT & ORDER' , 'mixlax' ),
				'label_block' 	=> true,
				'condition'     => [ 'enable_action_box' => 'yes' ]
			]
        );
		$this->add_control(
			'action_box_number', [
				'label' 		=> __( 'Action Box Number', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '052 (699) 256 - 692' , 'mixlax' ),
				'label_block' 	=> true,
				'condition'     => [ 'enable_action_box' => 'yes' ]
			]
        );

		$repeater = new Repeater();

		$repeater->add_control(
			'slider_subtitle', [
				'label' 		=> __( 'Slider Subtitle', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'MIXLAX AUTO CAR SERVICES' , 'mixlax' ),
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'slider_subtitle_bg', [
				'label' 		=> __( 'Slider Subtite Bg?', 'mixlax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'mixlax' ),
				'label_off' 	=> __( 'No', 'mixlax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
        );
        $repeater->add_control(
			'slider_title', [
				'label' 		=> __( 'Slider Title', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'THE BEST CAR SERVICES PROVIDE YOU' , 'mixlax' ),
				'label_block' 	=> true,
			]
		);
        $repeater->add_control(
			'slider_desc', [
				'label' 		=> __( 'Slider Description', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Set Slider Description' , 'mixlax' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'slider_image',
			[
				'label' 		=> __( 'Slider Image', 'mixlax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
			]
        );
		$repeater->add_control(
			'slider_overlay_image',
			[
				'label' 		=> __( 'Slider Overlay Image?', 'mixlax' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
			]
        );
		$repeater->add_control(
			'first_button_text', [
				'label' 		=> __( 'First Button Text', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'More Deatails' , 'mixlax' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'first_button_url',
			[
				'label' 		=> __( 'First Button Url', 'mixlax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'mixlax' ),
				'show_external' => true,
				'default'	 	=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);
		$repeater->add_control(
			'second_button_text', [
				'label' 		=> __( 'Second Button Text', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Get A Service' , 'mixlax' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'second_button_url',
			[
				'label' 		=> __( 'Second Button Url', 'mixlax' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'mixlax' ),
				'show_external' => true,
				'default'	 	=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);
		$repeater->add_control(
			'slider_video_button', [
				'label' 		=> __( 'Show Video Button?', 'mixlax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'mixlax' ),
				'label_off' 	=> __( 'No', 'mixlax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
        );
		$repeater->add_control(
			'video_url', [
				'label' 		=> __( 'Video Url', 'mixlax' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'https://www.youtube.com/watch?v=_sI_Ps7JSEk' , 'mixlax' ),
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Slides', 'mixlax' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'slider_subtitle' 		=> __( 'MIXLAX AUTO CAR SERVICES', 'mixlax' ),
						'slider_title' 			=> __( 'THE BEST CAR SERVICES PROVIDE YOU', 'mixlax' ),
						'slider_image' 			=> Utils::get_placeholder_image_src(),
					],
					[
						'slider_subtitle' 		=> __( 'MIXLAX AUTO CAR SERVICES', 'mixlax' ),
						'slider_title' 			=> __( 'THE BEST CAR SERVICES PROVIDE YOU', 'mixlax' ),
						'slider_image' 			=> Utils::get_placeholder_image_src(),
					],
					[
						'slider_subtitle' 		=> __( 'MIXLAX AUTO CAR SERVICES', 'mixlax' ),
						'slider_title' 			=> __( 'THE BEST CAR SERVICES PROVIDE YOU', 'mixlax' ),
						'slider_image' 			=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' => '{{{ slider_title }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'slider_control_section',
			[
				'label' 	=> __( 'Slider Control', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'slider_nav',
			[
				'label' 		=> __( 'Slider Nav Button?', 'mixlax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'mixlax' ),
				'label_off' 	=> __( 'No', 'mixlax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$this->add_control(
			'slider_nav_on_hover',
			[
				'label' 		=> __( 'Slider Nav Button On Hover?', 'mixlax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'mixlax' ),
				'label_off' 	=> __( 'No', 'mixlax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'		=> [ 'slider_nav' => 'yes' ],

			]
		);

		$this->add_control(
			'slider_pause_on_hover',
			[
				'label' 			=> __( 'Pause On Hover?', 'mixlax' ),
				'type' 				=> Controls_Manager::SWITCHER,
				'label_on' 			=> __( 'Yes', 'mixlax' ),
				'label_off' 		=> __( 'No', 'mixlax' ),
				'return_value' 		=> 'yes',
				'default' 			=> 'yes',
			]
		);

		$this->add_control(
			'slider_nav_prev_next',
			[
				'label' 			=> __( 'Slider Prev Next?', 'mixlax' ),
				'type' 				=> Controls_Manager::SWITCHER,
				'label_on' 			=> __( 'Yes', 'mixlax' ),
				'label_off' 		=> __( 'No', 'mixlax' ),
				'return_value' 		=> 'yes',
				'default' 			=> 'yes',
			]
		);

		$this->add_control(
			'slider_nav_prev_next_on_hover',
			[
				'label' 			=> __( 'Slider Prev Next On Hover?', 'mixlax' ),
				'type' 				=> Controls_Manager::SWITCHER,
				'label_on' 			=> __( 'Yes', 'mixlax' ),
				'label_off' 		=> __( 'No', 'mixlax' ),
				'return_value' 		=> 'yes',
				'default' 			=> 'yes',
				'condition'			=> [ 'slider_nav_prev_next' => 'yes' ],
			]
		);

		$this->add_control(
			'slider_height',
			[
				'label' 		=> __( 'Slider Height', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 5000,
						'step' 		=> 50,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 1000,
				],
			]
		);

		$this->add_control(
			'slider_mobile_height',
			[
				'label' 		=> __( 'Slider Mobile Height', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 5000,
						'step' 		=> 50,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 1200,
				],
			]
		);

		$this->add_control(
			'slider_tablet_height',
			[
				'label' 		=> __( 'Slider Tablet Height', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 5000,
						'step' 		=> 50,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 900,
				],
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

		$this->end_controls_section();

        $this->start_controls_section(
			'hero_slider_slider_subtitle_style_section',
			[
				'label' 	=> __( 'Slider Subtitle', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'hero_slider_slider_subtitle_color',
			[
				'label' 		=> __( 'Slider Subtitle Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .hero-sec-wrapper .ls-layers .ls-wrapper span.small-title.ls-layer' => 'color: {{VALUE}}!important',
				],
			]
        );

		$this->add_control(
			'enable_subtitle_before_shape', [
				'label' 		=> __( 'Subtite Before Shape?', 'mixlax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'mixlax' ),
				'label_off' 	=> __( 'No', 'mixlax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'no',
			]
        );
		$this->add_control(
			'hero_subtitle_before_shape_bg',
			[
				'label' 		=> __( 'Before Shape Bg', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .small-title.small_before_shape:before' => 'background-color: {{VALUE}}!important',
				],
				'condition' => [ 'enable_subtitle_before_shape' => 'yes' ],
			]
        );
		$this->add_responsive_control(
			'before_shape_top_position',
			[
				'label' 		=> __( 'Before Shape Top Position', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ '%' ],
				'range' 		=> [
					'%' 		=> [
						'min' 		=> 0,
						'max' 		=> 100,
						'step' 		=> 1,
					],
				],
				'default' 	=> [
					'unit' 		=> '%',
					'size' 		=> 50,
				],
				'condition' => [ 'enable_subtitle_before_shape' => 'yes' ],
				'selectors' => [
					'{{WRAPPER}} .small-title.small_before_shape:before' => 'top: {{SIZE}}{{UNIT}}!important;',
				],

			]
		);
		$this->add_responsive_control(
			'before_shape_fhdtop_position',
			[
				'label' 		=> __( 'Before Shape Left Position', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> -100,
						'max' 		=> 100,
						'step' 		=> 1,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 50,
				],
				'condition' => [ 'enable_subtitle_before_shape' => 'yes' ],
				'selectors' => [
					'{{WRAPPER}} .small-title.small_before_shape:before' => 'left: {{SIZE}}%!important;',
				],

			]
		);
		$this->add_responsive_control(
			'before_shape_width',
			[
				'label' 		=> __( 'Before Shape Width', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ '%' ],
				'range' 		=> [
					'%' 		=> [
						'min' 		=> 0,
						'max' 		=> 100,
					],
				],
				'default' 	=> [
					'unit' 		=> '%',
					'size' 		=> 35,
				],
				'condition' => [ 'enable_subtitle_before_shape' => 'yes' ],
				'selectors' => [
					'{{WRAPPER}} .small-title.small_before_shape:before' => 'width: {{SIZE}}{{UNIT}}!important;',
				],

			]
		);
		$this->add_control(
			'enable_subtitle_after_shape', [
				'label' 		=> __( 'Subtite After Shape?', 'mixlax' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'mixlax' ),
				'label_off' 	=> __( 'No', 'mixlax' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'no',
			]
        );
		$this->add_responsive_control(
			'hero_subtitle_after_shape_bg',
			[
				'label' 		=> __( 'After Shape Bg', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .small-title.small_after_shape:after' => 'background-color: {{VALUE}}!important',
				],
				'condition' => [ 'enable_subtitle_after_shape' => 'yes' ],
			]
        );
		$this->add_responsive_control(
			'after_shape_top_position',
			[
				'label' 		=> __( 'After Shape Top Position', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ '%' ],
				'range' 		=> [
					'%' 		=> [
						'min' 		=> 0,
						'max' 		=> 100,
						'step' 		=> 1,
					],
				],
				'default' 	=> [
					'unit' 		=> '%',
					'size' 		=> 50,
				],
				'condition' => [ 'enable_subtitle_after_shape' => 'yes' ],
				'selectors' => [
					'{{WRAPPER}} .small-title.small_after_shape:after' => 'top: {{SIZE}}{{UNIT}}!important;',
				],

			]
		);
		$this->add_responsive_control(
			'after_shape_left_position',
			[
				'label' 		=> __( 'After Shape Right Position', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> -100,
						'max' 		=> 100,
						'step' 		=> 1,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> -33,
				],
				'condition' => [ 'enable_subtitle_after_shape' => 'yes' ],
				'selectors' => [
					'{{WRAPPER}} .small-title.small_after_shape:after' => 'right: {{SIZE}}%!important;',
				],

			]
		);
		$this->add_responsive_control(
			'after_shape_width',
			[
				'label' 		=> __( 'After Shape Width', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ '%' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 100,
						'step' 		=> 1,
					],
				],
				'default' 	=> [
					'unit' 		=> '%',
					'size' 		=> 35,
				],
				'condition' => [ 'enable_subtitle_after_shape' => 'yes' ],
				'selectors' => [
					'{{WRAPPER}} .small-title.small_after_shape:after' => 'width: {{SIZE}}{{UNIT}}!important;',
				],

			]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'hero_slider_slider_subtitle_typography',
				'label' 		=> __( 'Slider Subtitle Typography', 'mixlax' ),
				'selector' 		=> '{{WRAPPER}} .hero-sec-wrapper .ls-layers .ls-wrapper span.small-title.ls-layer',
			]
        );

		$this->add_responsive_control(
			'subtitle_font_size',
			[
				'label' 		=> __( 'Subtitle Font Size', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 200,
						'step' 		=> 1,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 24,
				],
			]
		);

		$this->add_responsive_control(
			'subtitle_line_height',
			[
				'label' 		=> __( 'Subtitle Line Height', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 300,
						'step' 		=> 5,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 80,
				],
			]
		);

		$this->add_responsive_control(
			'subtitle_letter_spacing',
			[
				'label' 		=> __( 'Subtitle Letter Spacing', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 20,
						'step' 		=> 0.1,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 5,
				],
			]
		);

		$this->add_responsive_control(
			'subtitle_top_position',
			[
				'label' 		=> __( 'Subtitle Top Spacing', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> -1000,
						'max' 		=> 1500,
						'step' 		=> 5,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 262,
				],
			]
		);

		$this->add_responsive_control(
			'subtitle_left_position',
			[
				'label' 		=> __( 'Subtitle Left Spacing', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px','%' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 1500,
						'step' 		=> 1,
					],
					'%' 		=> [
						'min' 		=> 0,
						'max' 		=> 100,
						'step' 		=> 1,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 55,
				],
			]
		);

		$this->add_responsive_control(
			'subtitle_width',
			[
				'label' 		=> __( 'Subtitle Width', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 2000,
						'step' 		=> 10,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 810,
				],
			]
		);

		$this->add_responsive_control(
			'subtitle_height',
			[
				'label' 		=> __( 'Subtitle Height', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 2000,
						'step' 		=> 10,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 80,
				],
			]
		);
		$this->add_responsive_control(
			'subtitle_offsetxin',
			[
				'label' 		=> __( 'Subtitle Offsetxin', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> -3000,
						'max' 		=> 3000,
						'step' 		=> 100,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> -500,
				],
			]
		);
		$this->add_responsive_control(
			'subtitle_offsetxout',
			[
				'label' 		=> __( 'Subtitle Offsetxout', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> -3000,
						'max' 		=> 3000,
						'step' 		=> 100,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> -100,
				],
			]
		);
		$this->add_responsive_control(
			'subtitle_durationout',
			[
				'label' 		=> __( 'Subtitle Durationout', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 3000,
						'step' 		=> 100,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 400,
				],
			]
		);

		$this->add_responsive_control(
			'subtitle_delayin',
			[
				'label' 		=> __( 'Subtitle Delay In', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> -3000,
						'max' 		=> 3000,
						'step' 		=> 100,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 800,
				],
			]
		);

        $this->add_responsive_control(
			'hero_slider_slider_subtitle_margin',
			[
				'label' 		=> __( 'Slider Subtitle Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-sec-wrapper .ls-layers .ls-wrapper span.small-title.ls-layer' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
                ],
			]
        );

        $this->add_responsive_control(
			'hero_slider_slider_subtitle_padding',
			[
				'label' 		=> __( 'Slider Subtitle Padding', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-sec-wrapper .ls-layers .ls-wrapper span.small-title.ls-layer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'hero_slider_slider_title_style_section',
			[
				'label' 	=> __( 'Slider Title', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'hero_slider_slider_title_color',
			[
				'label' 		=> __( 'Slider Title Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .hero-sec-wrapper .big-title.ls-layer' => 'color: {{VALUE}}!important',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'hero_slider_slider_title_typography',
				'label' 	=> __( 'Slider Title Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .hero-sec-wrapper .big-title.ls-layer',
			]
        );

		$this->add_responsive_control(
			'title_font_size',
			[
				'label' 		=> __( 'Title Font Size', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 200,
						'step' 		=> 1,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 60,
				],
			]
		);

		$this->add_responsive_control(
			'title_line_height',
			[
				'label' 		=> __( 'Title Line Height', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 300,
						'step' 		=> 5,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 75,
				],
			]
		);

		$this->add_responsive_control(
			'title_letter_spacing',
			[
				'label' 		=> __( 'Title Letter Spacing', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 20,
						'step' 		=> 0.1,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 0.2,
				],
			]
		);
		$this->add_responsive_control(
			'title_top_position',
			[
				'label' 		=> __( 'Title Top Spacing', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> -1000,
						'max' 		=> 1500,
						'step' 		=> 5,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 390,
				],
			]
		);

		$this->add_responsive_control(
			'title_left_position',
			[
				'label' 		=> __( 'Title Left Spacing', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px','%' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 1500,
						'step' 		=> 1,
					],
					'%' 		=> [
						'min' 		=> 0,
						'max' 		=> 100,
						'step' 		=> 1,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 55,
				],
			]
		);

		$this->add_control(
			'title_offsetyin',
			[
				'label' 		=> __( 'Title Offsetyin', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> -3000,
						'max' 		=> 3000,
						'step' 		=> 10,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 30,
				],
			]
		);

		$this->add_control(
			'title_durationin',
			[
				'label' 		=> __( 'Title Durationin', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> -3000,
						'max' 		=> 3000,
						'step' 		=> 100,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 600,
				],
			]
		);

		$this->add_control(
			'title_delayin',
			[
				'label' 		=> __( 'Title Delay In', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 5000,
						'step' 		=> 500,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 1000,
				],
			]
		);

		$this->add_control(
			'title_offsetyout',
			[
				'label' 		=> __( 'Title Offsetyout', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> -1000,
						'max' 		=> 3000,
						'step' 		=> 10,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> -30,
				],
			]
		);

		$this->add_control(
			'title_durationout',
			[
				'label' 		=> __( 'Title Duration Out', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 3000,
						'step' 		=> 100,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 400,
				],
			]
		);


        $this->add_responsive_control(
			'hero_slider_slider_title_margin',
			[
				'label' 		=> __( 'Slider Title Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-sec-wrapper .big-title.ls-layer' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'hero_slider_slider_title_padding',
			[
				'label' 			=> __( 'Slider Title Padding', 'mixlax' ),
				'type' 				=> Controls_Manager::DIMENSIONS,
				'size_units' 		=> [ 'px', '%', 'em' ],
				'selectors' 		=> [
					'{{WRAPPER}} .hero-sec-wrapper .big-title.ls-layer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'hero_slider_slider_desc_style_section',
			[
				'label' 	=> __( 'Slider Description', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'hero_slider_slider_desc_color',
			[
				'label' 		=> __( 'Slider Description Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .hero-sec-wrapper p.text' => 'color: {{VALUE}}!important',
				],
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'hero_slider_slider_desc_typography',
				'label' 	=> __( 'Slider Description Typography', 'mixlax' ),
				'selector' 	=> '{{WRAPPER}} .hero-sec-wrapper p.text',
			]
		);

		$this->add_responsive_control(
			'desc_font_size',
			[
				'label' 		=> __( 'Description Font Size', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 200,
						'step' 		=> 1,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 16,
				],
			]
		);

		$this->add_responsive_control(
			'desc_line_height',
			[
				'label' 		=> __( 'Description Line Height', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 300,
						'step' 		=> 5,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 28,
				],
			]
		);

		$this->add_responsive_control(
			'desc_letter_spacing',
			[
				'label' 		=> __( 'Description Letter Spacing', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 20,
						'step' 		=> 0.1,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 0.2,
				],
			]
		);
		$this->add_responsive_control(
			'desc_top_position',
			[
				'label' 		=> __( 'Description Top Spacing', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> -1000,
						'max' 		=> 1500,
						'step' 		=> 5,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 565,
				],
			]
		);

		$this->add_responsive_control(
			'desc_left_position',
			[
				'label' 		=> __( 'Description Left Spacing', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 1500,
						'step' 		=> 1,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 55,
				],
			]
		);

        $this->add_responsive_control(
			'hero_slider_slider_desc_margin',
			[
				'label' 		=> __( 'Slider Description Margin', 'mixlax' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-sec-wrapper p.text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'hero_slider_slider_desc_padding',
			[
				'label' 			=> __( 'Slider Description Padding', 'mixlax' ),
				'type' 				=> Controls_Manager::DIMENSIONS,
				'size_units' 		=> [ 'px', '%', 'em' ],
				'selectors' 		=> [
					'{{WRAPPER}} .hero-sec-wrapper p.text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'slider_first_button_style_section',
			[
				'label' 	=> __( 'First Button', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'first_button_style',
			[
				'label' 		=> __( 'Button Style', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options' 		=> [
					'one'  		=> __( 'Style One', 'mixlax' ),
					'two' 		=> __( 'Style Two', 'mixlax' ),
				],
			]
		);
		$this->add_control(
			'first_button_color',
			[
				'label' 		=> __( 'Button Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .hero-sec-wrapper .primary-btn.first-button' => 'color: {{VALUE}}!important',
				],
			]
		);
		$this->add_control(
			'first_button_bgcolor',
			[
				'label' 		=> __( 'Button Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .hero-sec-wrapper .primary-btn.first-button' => 'background-color: {{VALUE}}!important',
				],
			]
		);
		$this->add_control(
			'first_button_bg_hover_color',
			[
				'label' 		=> __( 'Button Hover Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .hero-sec-wrapper .primary-btn.first-button.type2 .btn-bg' => 'background-color: {{VALUE}}!important',
				],
			]
		);
		$this->add_responsive_control(
			'first_button_top_position',
			[
				'label' 		=> __( 'Button Top Spacing', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> -1000,
						'max' 		=> 1500,
						'step' 		=> 5,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 685,
				],
			]
		);

		$this->add_responsive_control(
			'first_button_left_position',
			[
				'label' 		=> __( 'Button Left Spacing', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 1500,
						'step' 		=> 1,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 55,
				],
			]
		);

		$this->add_responsive_control(
			'first_button_width',
			[
				'label' 		=> __( 'Button Width', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 500,
						'step' 		=> 10,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 200,
				],
			]
		);

		$this->add_responsive_control(
			'first_button_height',
			[
				'label' 		=> __( 'Button Height', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 500,
						'step' 		=> 10,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 50,
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'slider_second_button_style_section',
			[
				'label' 	=> __( 'Second Button', 'mixlax' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'second_button_style',
			[
				'label' 		=> __( 'Button Style', 'mixlax' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options' 		=> [
					'one'  		=> __( 'Style One', 'mixlax' ),
					'two' 		=> __( 'Style Two', 'mixlax' ),
				],
			]
		);
		$this->add_control(
			'second_button_color',
			[
				'label' 		=> __( 'Button Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .hero-sec-wrapper .primary-btn.second-button' => 'color: {{VALUE}}!important',
				],
			]
		);
		$this->add_control(
			'second_button_hover_color',
			[
				'label' 		=> __( 'Button Hover Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .hero-sec-wrapper .primary-btn.second-button:hover' => 'color: {{VALUE}}!important',
				],
			]
		);
		$this->add_control(
			'second_button_bgcolor',
			[
				'label' 		=> __( 'Button Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .hero-sec-wrapper .primary-btn.second-button' => 'background-color: {{VALUE}}!important',
				],
			]
		);
		$this->add_control(
			'second_button_bg_hover_color',
			[
				'label' 		=> __( 'Button Hover Background Color', 'mixlax' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .hero-sec-wrapper .primary-btn.second-button.type2 .btn-bg' => 'background-color: {{VALUE}}!important',
				],
			]
		);
		$this->add_responsive_control(
			'second_button_top_position',
			[
				'label' 		=> __( 'Button Top Spacing', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> -1000,
						'max' 		=> 1500,
						'step' 		=> 5,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 685,
				],
			]
		);

		$this->add_responsive_control(
			'second_button_left_position',
			[
				'label' 		=> __( 'Button Left Spacing', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 1500,
						'step' 		=> 1,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 275,
				],
			]
		);

		$this->add_responsive_control(
			'second_button_width',
			[
				'label' 		=> __( 'Button Width', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 500,
						'step' 		=> 10,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 200,
				],
			]
		);

		$this->add_responsive_control(
			'second_button_height',
			[
				'label' 		=> __( 'Button Height', 'mixlax' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 		=> [
						'min' 		=> 0,
						'max' 		=> 500,
						'step' 		=> 10,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 50,
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		if( $settings['slider_nav'] == 'yes' ) {
			$this->add_render_attribute( 'slider-active', 'data-slider-nav-button', 'true' );
			if( $settings['slider_nav_on_hover'] == 'yes' ) {
				$this->add_render_attribute( 'slider-active', 'data-on-hover-nav', 'true' );
			} else {
				$this->add_render_attribute( 'slider-active', 'data-on-hover-nav', 'false' );
	        }
		} else {
			$this->add_render_attribute( 'slider-active', 'data-slider-nav-button', 'false' );
        }


		if( $settings['slider_pause_on_hover'] == 'yes' ) {
			$this->add_render_attribute( 'slider-active', 'data-pause-on-hover', 'true' );
		} else {
			$this->add_render_attribute( 'slider-active', 'data-pause-on-hover', 'false' );
        }

		if( $settings['slider_nav_prev_next'] == 'yes' ) {
			$this->add_render_attribute( 'slider-active', 'data-slider-prev-next', 'true' );
			if( $settings['slider_nav_prev_next_on_hover'] == 'yes' ) {
				$this->add_render_attribute( 'slider-active', 'data-on-hover-prev-next', 'true' );
			} else {
				$this->add_render_attribute( 'slider-active', 'data-on-hover-prev-next', 'false' );
			}
		} else {
			$this->add_render_attribute( 'slider-active', 'data-slider-prev-next', 'false' );
        }

		$this->add_render_attribute( 'slider-active', 'data-slider-height', $settings['slider_height']['size'] );
		$this->add_render_attribute( 'slider-active', 'data-slider-mobile-height', $settings['slider_mobile_height']['size'] );
		$this->add_render_attribute( 'slider-active', 'data-slider-tablet-height', $settings['slider_tablet_height']['size'] );

		// SLider Option
		$this->add_render_attribute( 'slider-active', 'class', 'hero-slider-active' );
		$this->add_render_attribute( 'slider-active', 'data-skin-css', MIXLAX_DIR_SKIN_CSS_URI );

		if( $settings['slider_style'] == 'two' ){
			$hero_class = "hero-layout1 hero-layout2";
		}elseif( $settings['slider_style'] == 'three' ){
			$hero_class = "hero-layout1 hero-layout3";
		}else{
			$hero_class = "hero-layout1";
		}

		$mixlax_layer_slider = $settings['slides'];

		if( !empty( $mixlax_layer_slider ) ){
		// Slider Version One
		echo '<!-- Hero Area -->';
		  	echo '<div class="hero-sec-wrapper '.esc_attr( $hero_class ).'">';

					if( $settings['enable_action_box'] == 'yes' ){
						$mixlax_phone   		=  $settings['action_box_number'];
						$mixlax_replace 		= array(' ','-',' - ','(',')');
						$mixlax_with 	 		= array('','','','','');
						$mixlax_mobileurl 	    = str_replace( $mixlax_replace, $mixlax_with, $mixlax_phone );
						echo '<!-- Phone Box -->';
					    echo '<div class="phone-box d-none d-xl-flex align-items-center">';
					        echo '<div class="icon">';
					            echo '<a href="'.esc_attr( 'tel:'.$mixlax_mobileurl ).'"><i class="fas fa-phone"></i></a>';
					        echo '</div>';
					        echo '<div class="content">';
					            echo '<span>'.esc_html( $settings['action_box_title'] ).'</span>';
					            echo '<a href="'.esc_attr( 'tel:'.$mixlax_mobileurl ).'">'.esc_html( $settings['action_box_number'] ).'</a>';
					        echo '</div>';
					    echo '</div>';
					}
				 ?>
		    	<div <?php echo $this->get_render_attribute_string( 'slider-active' );?>>
					<?php
						foreach( $mixlax_layer_slider as $single_slide ){
							if( $settings['slider_style'] == 'one' ){
								$duration = "7000";
								$transition2d = "4";
							}elseif( $settings['slider_style'] == 'two' ){
								$duration = "700000";
								$transition2d = "4";
							}elseif( $settings['slider_style'] == 'three' ){
								$duration = "8000";
								$transition2d = "1";
							}else{
								$duration = "7000";
								$transition2d = "4";
							}
					?>
		      		<!-- Single Hero Slide -->
		      		<div class="single-hero-slide ls-slide" data-ls="duration: <?php echo esc_attr( $duration );?>; transition2d: <?php echo esc_attr( $transition2d );?>;">
		        		<!-- Hero Image -->
						<?php
							if( ! empty( $single_slide['slider_image']['url'] ) ){
								echo wellnez_img_tag( array(
									'url'	=> esc_url( $single_slide['slider_image']['url'] ),
									'class'	=> 'ls-bg',
								) );
							}
							if( $settings['slider_style'] == 'four' ){
								echo "<div style='background-image: linear-gradient(to right, rgb(255, 255, 255) 48%, rgba(255,255,255,0.9) 57%, rgba(255, 255, 255, 0.2) 76%, rgba(255, 255, 255, 0) 80%); left:0px; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; width:1492px; height:100%; z-index: 2;' class='ls-l' data-ls='position:fixed; offsetxin:-900; delayin: 400; easingin:easeOutQuint; offsetxout:-300; durationout:400;'></div>";
								echo '<img src="'.esc_url(  MIXLAX_DIR_ASSIST_URI. 'img/hero-4-shape-1.png' ).'" alt="'.esc_attr__( 'Hero Shape','mixlax' ).'" class="ls-l" style="top: 315px; left: 370px; width: 215px; height: 44px;" data-ls="durationin:700; delayin:1700; easingin:easeOutQuint; scalexin:1.4; scalexout:1.4;">';
							}
						?>
		        	<!-- Overly Shape -->
					<?php if( !empty( $single_slide['slider_overlay_image']['url'] ) ){ ?>
			        	<div data-bg-img="<?php echo esc_url( $single_slide['slider_overlay_image']['url'] ) ?>" style='background-size: cover;background-position: 50% 50%;top:0px; left:0px; text-align:initial; font-weight:400; font-style:normal;
				          text-decoration:none; mix-blend-mode:normal; width:100%; height:100%; z-index: 2;' class="ls-l"
				          data-ls="position:fixed; offsetxin:-900; delayin: 400; easingin:easeOutQuint; offsetxout:-300;
				          durationout:400;">
				        </div>
					<?php
						}
						if( $single_slide['slider_subtitle_bg'] == 'yes' ){
					?>
			        	<!-- Subtitle Bg Layer -->
			        	<img src="<?php echo esc_url( MIXLAX_DIR_ASSIST_URI. 'img/slider-1-shape.svg' );?>" class="ls-l sub-title-bg" alt="<?php echo esc_attr__( 'Slider Bg Image', 'mixlax' );?>"
			          style="width: 910px; height: 134px; left: -270px; top: 248px;" data-ls="offsetxin:-900; delayin: 400; easingin:easeOutQuint; offsetxout:-300; durationout:400;">
			        	<!-- Small Title -->
					<?php
						}
						if( ! empty( $single_slide['slider_subtitle'] ) ){

						if( $settings['enable_subtitle_before_shape'] == 'yes' ){
							$before_class = 'small_before_shape';
						}else{
							$before_class = "";
						}
						if( $settings['enable_subtitle_after_shape'] == 'yes' ){
							$after_class = ' small_after_shape';
						}else{
							$after_class = "";
						}
						if( $settings['slider_style'] == 'three' ){
					?>
			        	<span class="small-title ls-l <?php echo esc_attr( $before_class.$after_class );?>" style="letter-spacing: <?php echo esc_attr( $settings['subtitle_letter_spacing']['size'] );?>px;line-height:<?php echo esc_attr( $settings['subtitle_line_height']['size'] );?>px;font-size:<?php echo esc_attr( $settings['subtitle_font_size']['size'] );?>px;top:<?php echo $settings['subtitle_top_position']['size'];?>px; left: <?php echo esc_attr( $settings['subtitle_left_position']['size'].$settings['subtitle_left_position']['unit'] );?>; width: <?php echo esc_attr( $settings['subtitle_width']['size'] );?>px; height: <?php echo esc_attr( $settings['subtitle_height']['size'] );?>px;"
			          data-ls="showinfo:1;offsetxin:<?php echo esc_attr( $settings['subtitle_offsetxin']['size'] );?>;easingin:easeOutExpo;transformoriginout:0% 50% 0; delayin:<?php echo esc_attr( $settings['subtitle_delayin']['size'] );?>; easingout:easeInQuint; offsetxout:-1000;"><?php echo esc_html( $single_slide['slider_subtitle'] );?></span>
			  		<?php
						}else{
					?>
					<span class="small-title ls-l <?php echo esc_attr( $before_class.$after_class );?>" style="letter-spacing: <?php echo esc_attr( $settings['subtitle_letter_spacing']['size'] );?>px;line-height:<?php echo esc_attr( $settings['subtitle_line_height']['size'] );?>px;font-size:<?php echo esc_attr( $settings['subtitle_font_size']['size'] );?>px;top:<?php echo $settings['subtitle_top_position']['size'];?>px; left: <?php echo esc_attr( $settings['subtitle_left_position']['size'].$settings['subtitle_left_position']['unit'] );?>; width: <?php echo esc_attr( $settings['subtitle_width']['size'] );?>px; height: <?php echo esc_attr( $settings['subtitle_height']['size'] );?>px;"
				  data-ls="offsetxin:<?php echo esc_attr( $settings['subtitle_offsetxin']['size'] );?>; delayin:<?php echo esc_attr( $settings['subtitle_delayin']['size'] );?>; easingin:easeOutQuint; offsetxout:<?php echo esc_attr( $settings['subtitle_offsetxout']['size'] );?>; durationout:<?php echo esc_attr( $settings['subtitle_durationout']['size'] );?>;"><?php echo esc_html( $single_slide['slider_subtitle'] );?></span>
					<?php
						}
				 		}
						if( ! empty( $single_slide['slider_title'] ) ){
							if( $settings['slider_style'] == 'three' ){
								?>
						<h1 class="big-title ls-l" style="letter-spacing:<?php echo esc_attr( $settings['title_letter_spacing']['size'] );?>px;line-height:<?php echo esc_attr( $settings['title_line_height']['size'] );?>px;top:  <?php echo esc_attr( $settings['title_top_position']['size'] );?>px; left: <?php echo esc_attr( $settings['title_left_position']['size'].$settings['title_left_position']['unit'] );?>; font-size:<?php echo esc_attr( $settings['title_font_size']['size'] );?>px; white-space: normal; width: 964px;text-align:center;" data-ls="showinfo:1; offsetxin:500; delayin:<?php echo esc_attr( $settings['title_delayin']['size'] );?>; easingin:easeOutExpo; offsetxout:-1000; easingout:easeInQuint; transformoriginout:0% 50% 0;">
						  	<?php echo wp_kses_post( $single_slide['slider_title'] );?>
						</h1>
					<?php
							}else{
					?>
		        	<!-- Big Title -->
		        	<h1 class="big-title ls-l" style="letter-spacing:<?php echo esc_attr( $settings['title_letter_spacing']['size'] );?>px;line-height:<?php echo esc_attr( $settings['title_line_height']['size'] );?>px;font-size:<?php echo esc_attr( $settings['title_font_size']['size'] );?>px;top: <?php echo esc_attr( $settings['title_top_position']['size'] );?>px; left:<?php echo esc_attr( $settings['title_left_position']['size'].$settings['title_left_position']['unit'] );?>;"  data-ls="offsetyin:<?php echo esc_attr( $settings['title_offsetyin']['size'] );?>; durationin:<?php echo esc_attr( $settings['title_durationin']['size'] );?>; delayin:<?php echo esc_attr( $settings['title_delayin']['size'] );?>; offsetyout:<?php echo esc_attr( $settings['title_offsetyout']['size'] );?>; durationout:<?php echo esc_attr( $settings['title_durationout']['size'] );?>;">
			          	<?php echo wp_kses_post( $single_slide['slider_title'] );?>
			        </h1>
					<?php
						}
				  		}
						if( ! empty( $single_slide['slider_desc'] ) ){
					?>
		          	<!-- Text -->
		        	<p class="text ls-l" style="letter-spacing: <?php echo esc_attr( $settings['desc_letter_spacing']['size'] );?>px;line-height:<?php echo esc_attr( $settings['desc_line_height']['size'] );?>px;font-size:<?php echo esc_attr( $settings['desc_font_size']['size'] );?>px;top: <?php echo esc_attr( $settings['desc_top_position']['size'] );?>px; left: <?php echo $settings['desc_left_position']['size'];?>px; white-space: normal; width: 580px;" data-ls="offsetyin:30; durationin:600; delayin:1200; offsetyout:-30; durationout:400;">
		          		<?php echo wp_kses_post( $single_slide['slider_desc'] );?>
		          	</p>
			  		<?php
				 		}
					if( $settings['slider_style'] == 'three' ){
						$target 	= $single_slide['first_button_url']['is_external'] ? ' target="_blank"' : '';
						$nofollow 	= $single_slide['first_button_url']['nofollow'] ? ' rel="nofollow"' : '';
						if( !empty( $single_slide['first_button_text'] ) ){
							if( $settings['first_button_style'] == 'two' ){
								$first_btn_class = "skew";
							}else{
								$first_btn_class = "";
							}
					?>
		        	<!-- Hero Btn -->
		        	<a href="<?php echo esc_url( $single_slide['first_button_url']['url'] );?>" <?php echo wp_kses_post( $target.$nofollow );?> class="primary-btn first-button type2 hover-white ls-l <?php echo esc_attr( $first_btn_class );?>"
		        style="top:<?php echo esc_attr( $settings['first_button_top_position']['size'] );?>px; left: <?php echo esc_attr( $settings['first_button_left_position']['size'] );?>px; height:<?php echo esc_attr( $settings['first_button_height']['size'] );?>px; width:<?php echo esc_attr( $settings['first_button_width']['size'] );?>px; z-index: 3; line-height: 50px; box-shadow: none;"
		          data-ls="showinfo:1; offsetxin:500; delayin:1150; easingin:easeOutExpo; offsetxout:-1000; easingout:easeInQuint; transformoriginout:0% 50% 0; hover:true; hoveropacity:1;"><?php echo esc_html( $single_slide['first_button_text'] );?></a>
				  	<?php
					    }
					    $target_two 	= $single_slide['second_button_url']['is_external'] ? ' target="_blank"' : '';
					    $nofollow_two 	= $single_slide['second_button_url']['nofollow'] ? ' rel="nofollow"' : '';
					    if( !empty( $single_slide['second_button_text'] ) ){
							if( $settings['second_button_style'] == 'two' ){
								$second_btn_class = "skew";
							}else{
								$second_btn_class = "";
							}
				  	?>
		          	<!-- Hero Btn -->
		          	<a href="<?php echo esc_url( $single_slide['second_button_url']['url'] );?>" <?php echo wp_kses_post( $target_two.$nofollow_two );?> class="primary-btn second-button outline-btn white-btn type2 ls-l <?php echo esc_attr( $second_btn_class );?>"
		          style="top: <?php echo esc_attr( $settings['second_button_top_position']['size'] );?>px; left: <?php echo esc_attr( $settings['second_button_left_position']['size'] );?>px; height: <?php echo esc_attr( $settings['second_button_height']['size'] );?>px; width: <?php echo esc_attr( $settings['second_button_width']['size'] );?>px; z-index: 3; line-height: 50px; box-shadow: none;"
		          data-ls="showinfo:1; offsetxin:500; delayin:1150; easingin:easeOutExpo; offsetxout:-1000; easingout:easeInQuint; transformoriginout:0% 50% 0; hover:true; hoveropacity:1;"><?php echo esc_html( $single_slide['second_button_text'] );?></a>
			  		<?php
						}
					}else{
						$target 	= $single_slide['first_button_url']['is_external'] ? ' target="_blank"' : '';
						$nofollow 	= $single_slide['first_button_url']['nofollow'] ? ' rel="nofollow"' : '';
						if( !empty( $single_slide['first_button_text'] ) ){
							if( $settings['first_button_style'] == 'two' ){
								$first_btn_class = "skew";
							}else{
								$first_btn_class = "";
							}
					?>
		        	<!-- Hero Btn -->
		        	<a href="<?php echo esc_url( $single_slide['first_button_url']['url'] );?>" <?php echo wp_kses_post( $target.$nofollow );?> class="primary-btn first-button type2 hover-white ls-l <?php echo esc_attr( $first_btn_class );?>"
		        style="top:<?php echo esc_attr( $settings['first_button_top_position']['size'] );?>px; left: <?php echo esc_attr( $settings['first_button_left_position']['size'] );?>px; height:<?php echo esc_attr( $settings['first_button_height']['size'] );?>px; width:<?php echo esc_attr( $settings['first_button_width']['size'] );?>px; z-index: 3; line-height: 50px; box-shadow: none;"
		          data-ls="offsetyin:150; durationin:700; delayin:1400; easingin:easeOutQuint; rotatexin:20; scalexin:1.4;
		          scalexout:1.4; durationout:500; parallaxlevel:0;"><?php echo esc_html( $single_slide['first_button_text'] );?></a>
				  	<?php
					    }
					    $target_two 	= $single_slide['second_button_url']['is_external'] ? ' target="_blank"' : '';
					    $nofollow_two 	= $single_slide['second_button_url']['nofollow'] ? ' rel="nofollow"' : '';
					    if( !empty( $single_slide['second_button_text'] ) ){
							if( $settings['second_button_style'] == 'two' ){
								$second_btn_class = "skew";
							}else{
								$second_btn_class = "";
							}
				  	?>
		          	<!-- Hero Btn -->
		          	<a href="<?php echo esc_url( $single_slide['second_button_url']['url'] );?>" <?php echo wp_kses_post( $target_two.$nofollow_two );?> class="primary-btn second-button outline-btn white-btn type2 ls-l <?php echo esc_attr( $second_btn_class );?>"
		          style="top: <?php echo esc_attr( $settings['second_button_top_position']['size'] );?>px; left: <?php echo esc_attr( $settings['second_button_left_position']['size'] );?>px; height: <?php echo esc_attr( $settings['second_button_height']['size'] );?>px; width: <?php echo esc_attr( $settings['second_button_width']['size'] );?>px; z-index: 3; line-height: 50px; box-shadow: none;"
		          data-ls="offsetyin:150; durationin:700; delayin:1600; easingin:easeOutQuint; rotatexin:20; scalexin:1.4; scalexout:1.4; durationout:400;"><?php echo esc_html( $single_slide['second_button_text'] );?></a>
			  		<?php
						}
				 		}
						if( $single_slide['slider_video_button'] == 'yes' ){
					?>
			          	<!-- Hero Video Btn -->
			          	<div class="hero-btn-wrap ls-l"
			          style="top: 450px; left: 985px; width: 100px; height: 100px; font-size: 32px; line-height: 100px;" data-ls="offsetyin: -150; durationin:700; delayin: 1800; easingin:easeOutQuint; rotatexin:-20; scalexin:1.8; scalexout:1.8; durationout:500;">
				          	<a data-fancybox href="<?php echo esc_url( $single_slide['video_url'] );?>" class="video-btn ripple-wrap"
				            style="width: 100%; height: 100%; font-size: inherit; line-height: inherit;">
					            <span class="btn-text"><i class="fal fa-play"></i></span>
					            <span class="ripple ripple-1"></span>
					            <span class="ripple ripple-2"></span>
					            <span class="ripple ripple-3"></span>
				            </a>
			        	</div>
					<?php } ?>
			    </div>
		      <!-- Single Hero Slide end -->
		  	<?php
				}
			?>

		    </div>

		  </div>
		  <!-- Hero Area end -->
		<?php
		}

	}

}