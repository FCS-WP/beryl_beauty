<?php

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Icons_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Widget_Base;

class Wellnez_Dual_Heading extends Widget_Base {

	public function get_name() {
		return 'wllnez-dual-headding';
	}

	public function get_title() {
		return esc_html__( 'Dual Heading', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-t-letter';
	}

	public function get_categories() {
		return [ 'wellnez' ];
	}

    public function get_keywords() {
        return [ 'wellnez', 'multi', 'double', 'heading', 'title' ];
    }

    protected function register_controls() {

		/**
		* Dual Heading Content Section
		*/
		$this->start_controls_section(
			'wellnez_addons_dual_heading_content',
			[
				'label' => esc_html__( 'Content', 'wellnez' )
			]
        );

        $this->add_control(
            'wellnez_addons_dual_first_heading',
            [
                'label'       => esc_html__( 'Before Heading', 'wellnez' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Before', 'wellnez' )
            ]
        );

        $this->add_control(
            'wellnez_addons_dual_second_heading',
            [
                'label'       => esc_html__( 'Middle Heading', 'wellnez' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => esc_html__( 'Middle', 'wellnez' )
            ]
        );



        $this->add_control(
            'wellnez_addons_after_headding_show',
            [
                'label'        => esc_html__( 'Enable After Heading', 'wellnez' ),
                'type'         => Controls_Manager::SWITCHER,
                'default'      => 'no',
                'return_value' => 'yes'
            ]
        );

        $this->add_control(
            'wellnez_addons_dual_thard_heading',
            [
                'label'       => esc_html__( 'After Heading', 'wellnez' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'After', 'wellnez' ),
                'condition' => [
                    'wellnez_addons_after_headding_show' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'wellnez_addons_dual_heading_title_link',
            [
                'label'       => __( 'Heading URL', 'wellnez' ),
                'type'        => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'wellnez' ),
                'label_block' => true
            ]
        );
        $this->add_control(
            'wellnez_addons_sub_headding_show',
            [
                'label'        => esc_html__( 'Enable Sub Heading', 'wellnez' ),
                'type'         => Controls_Manager::SWITCHER,
                'default'      => 'no',
                'return_value' => 'yes'
            ]
        );

        $this->add_control(
            'wellnez_addons_dual_heading_description',
            [
                'label'       => __( 'Sub Heading', 'wellnez' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'dynamic'     => [ 'active' => true ],
                'condition' => [
                    'wellnez_addons_sub_headding_show' => 'yes',
                ],
                'default'     => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'wellnez' )
            ]
        );

        $this->add_control(
            'wellnez_addons_dual_heading_icon_show',
            [
                'label'        => esc_html__( 'Enable Icon', 'wellnez' ),
                'type'         => Controls_Manager::SWITCHER,
                'default'      => 'no',
                'return_value' => 'yes'
            ]
        );

        $this->add_control(
            'wellnez_addons_dual_heading_icon',
            [
                'label'   => __( 'Icon', 'wellnez' ),
                'type'    => Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fab fa-wordpress-simple',
                    'library' => 'fa-brands'
                ],
                'condition' => [
                    'wellnez_addons_dual_heading_icon_show' => 'yes'
                ]
            ]
        );


        $this->end_controls_section();

        /*
        * Dual Heading Styling Section
        */
        $this->start_controls_section(
            'wellnez_addons_dual_heading_styles_general',
            [
                'label' => esc_html__( 'General Styles', 'wellnez' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_responsive_control(
            'wellnez_addons_dual_heading_alignment',
            [
                'label'       => esc_html__( 'Alignment', 'wellnez' ),
                'type'        => Controls_Manager::CHOOSE,
                'toggle'      => false,
                'label_block' => true,
                'options'     => [
                    'left'      => [
                        'title' => esc_html__( 'Left', 'wellnez' ),
                        'icon'  => 'eicon-text-align-left'
                    ],
                    'center'    => [
                        'title' => esc_html__( 'Center', 'wellnez' ),
                        'icon'  => 'eicon-text-align-center'
                    ],
                    'right'     => [
                        'title' => esc_html__( 'Right', 'wellnez' ),
                        'icon'  => 'eicon-text-align-right'
                    ]
                ],
                'default'       => 'center',
                'label_block'   => true,
                'selectors'     => [
                    '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'wellnez_addons_dual_heading_icon_color',
            [
                'label'     => esc_html__( 'Icon Color', 'wellnez' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#132C47',
                'condition' => [
                    'wellnez_addons_dual_heading_icon_show'    => 'yes',
                    'wellnez_addons_dual_heading_icon[value]!' => ''
                ],
                'selectors' => [
                    '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-icon i' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'wellnez_addons_dual_heading_icon_size',
            [
                'label'        => __( 'Icon Size', 'wellnez' ),
                'type'         => Controls_Manager::SLIDER,
                'range'        => [
                    'px'       => [
                        'min'  => 10,
                        'max'  => 150,
                        'step' => 2
                    ]
                ],
                'default'      => [
                    'unit'     => 'px',
                    'size'     => 36
                ],
                'selectors'    => [
                    '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-icon i' => 'font-size: {{SIZE}}{{UNIT}};'
                ],
                'condition'    => [
                    'wellnez_addons_dual_heading_icon_show'    => 'yes',
                    'wellnez_addons_dual_heading_icon[value]!' => ''
                ]
            ]
        );

        $this->add_responsive_control(
            'wellnez_addons_dual_heading_icon_margin',
            [
                'label'      => __('Icon Margin', 'wellnez'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'default'    => [
                    'top'    => '0',
                    'right'  => '0',
                    'bottom' => '15',
                    'left'   => '0'
                ],
                'selectors'  => [
                    '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition' => [
                    'wellnez_addons_dual_heading_icon_show'    => 'yes',
                    'wellnez_addons_dual_heading_icon[value]!' => ''
                ]
            ]
        );

        $this->end_controls_section();

        /*
            * Dual Heading First Part Styling Section
            */
        $this->start_controls_section(
            'wellnez_addons_dual_first_heading_styles',
            [
                'label' => esc_html__( 'Before Heading', 'wellnez' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'wellnez_addons_dual_heading_first_text_color',
            [
                'label'     => esc_html__( 'Color', 'wellnez' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#FF6C4B',
                'selectors' => [
                    '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .first-heading, {{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title a .first-heading' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'            => 'wellnez_addons_dual_heading_first_bg_color',
                'types'           => [ 'classic', 'gradient' ],
                'default'         => '#222222',
                'selector'        => '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .first-heading, {{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title a .first-heading',
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'name'     => 'wellnez_addons_dual_first_heading_typography',
                'selector' => '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .first-heading'
			]
        );

        $this->add_responsive_control(
            'wellnez_addons_dual_first_heading_margin',
            [
                'label'      => __('Margin', 'wellnez'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .first-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'wellnez_addons_dual_first_heading_padding',
            [
                'label'      => __('Padding', 'wellnez'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .first-heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'wellnez_addons_dual_first_heading_radius',
            [
                'label'      => __('Border radius', 'wellnez'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .first-heading' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'wellnez_addons_dual_first_heading_border',
                'selector' => '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .first-heading'
            ]
        );
        $this->add_control(
			'show_title_first_strok',
			[
				'label' => __( 'Show Text Strok', 'wellnez' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'wellnez' ),
				'label_off' => __( 'Hide', 'wellnez' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

        $this->add_control(
			'show_title_first_strok_width',
			[
				'label' => __( 'Text Stroke Width', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'condition' => [
                    'show_title_first_strok' => 'yes'
                ],
				'selectors' => [
					'{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .first-heading' => '-webkit-text-stroke-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'show_title_first_strok_color',
			[
				'label' => __( 'Text Stroke Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'show_title_first_strok' => 'yes'
                ],
				'selectors' => [
					'{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .first-heading' => '-webkit-text-stroke-color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'show_title_first_strok_fill_color',
			[
				'label' => __( 'Text Stroke Fill Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'show_title_first_strok' => 'yes'
                ],
				'selectors' => [
					'{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .first-heading' => '-webkit-text-fill-color: {{VALUE}}',
				],
			]
		);
        $this->end_controls_section();


        /*
		* Dual Heading Thard Part Styling Section
		*/
        $this->start_controls_section(
                'wellnez_addons_dual_second_heading_styles',
                [
                    'label' => esc_html__( 'Middle Heading', 'wellnez' ),
                    'tab'   => Controls_Manager::TAB_STYLE
                ]
        );

        $this->add_control(
                'wellnez_addons_dual_heading_second_text_color',
                [
                    'label'     => esc_html__( 'Color', 'wellnez' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#132C47',
                    'selectors' => [
                        '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .second-heading,  {{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .second-heading a ' => 'color: {{VALUE}};'
                    ]
                ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'wellnez_addons_dual_heading_second_bg_color',
                'types'    => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .second-heading,  {{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .second-heading a '
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'wellnez_addons_dual_second_heading_typography',
                'selector' => '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .second-heading '
            ]
        );

        $this->add_responsive_control(
            'wellnez_addons_dual_second_heading_margin',
            [
                'label'      => __('Margin', 'wellnez'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .second-heading ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'wellnez_addons_dual_second_heading_padding',
            [
                'label'      => __('Padding', 'wellnez'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .second-heading ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'wellnez_addons_dual_second_heading_radius',
            [
                'label'      => __('Border radius', 'wellnez'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .second-heading ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'wellnez_addons_dual_second_heading_border',
                'selector' => '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .second-heading '
            ]
        );
        $this->add_control(
			'show_title_second_strok',
			[
				'label' => __( 'Show Text Strok', 'wellnez' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'wellnez' ),
				'label_off' => __( 'Hide', 'wellnez' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

        $this->add_control(
			'show_title_second_strok_width',
			[
				'label' => __( 'Text Stroke Width', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'condition' => [
                    'show_title_second_strok' => 'yes'
                ],
				'selectors' => [
					'{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .second-heading' => '-webkit-text-stroke-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'show_title_second_strok_color',
			[
				'label' => __( 'Text Stroke Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'show_title_second_strok' => 'yes'
                ],
				'selectors' => [
					'{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .second-heading' => '-webkit-text-stroke-color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'show_title_second_strok_fill_color',
			[
				'label' => __( 'Text Stroke Fill Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'show_title_second_strok' => 'yes'
                ],
				'selectors' => [
					'{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .second-heading' => '-webkit-text-fill-color: {{VALUE}}',
				],
			]
		);
        $this->end_controls_section();


        /*
		* Dual Heading Thard Part Styling Section
		*/
        $this->start_controls_section(
            'wellnez_addons_dual_thard_heading_styles',
            [
                'label' => esc_html__( 'After Heading', 'wellnez' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'wellnez_addons_after_headding_show' => 'yes',
                ],
            ]
         );

        $this->add_control(
                'wellnez_addons_dual_heading_thard_text_color',
                [
                    'label'     => esc_html__( 'Color', 'wellnez' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#132C47',
                    'selectors' => [
                        '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .thard-heading,  {{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .thard-heading a ' => 'color: {{VALUE}};'
                    ]
                ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'wellnez_addons_dual_heading_thard_bg_color',
                'types'    => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .thard-heading,  {{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .thard-heading a '
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'wellnez_addons_dual_thard_heading_typography',
                'selector' => '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .thard-heading '
            ]
        );

        $this->add_responsive_control(
            'wellnez_addons_dual_thard_heading_margin',
            [
                'label'      => __('Margin', 'wellnez'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .thard-heading ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'wellnez_addons_dual_thard_heading_padding',
            [
                'label'      => __('Padding', 'wellnez'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .thard-heading ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'wellnez_addons_dual_thard_heading_radius',
            [
                'label'      => __('Border radius', 'wellnez'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .thard-heading ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'wellnez_addons_dual_thard_heading_border',
                'selector' => '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .thard-heading '
            ]
        );
        $this->add_control(
			'show_title_third_strok',
			[
				'label' => __( 'Show Text Strok', 'wellnez' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'wellnez' ),
				'label_off' => __( 'Hide', 'wellnez' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

        $this->add_control(
			'show_title_third_strok_width',
			[
				'label' => __( 'Text Stroke Width', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'condition' => [
                    'show_title_third_strok' => 'yes'
                ],
				'selectors' => [
					'{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .thard-heading ' => '-webkit-text-stroke-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'show_title_third_strok_color',
			[
				'label' => __( 'Text Stroke Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'show_title_second_strok' => 'yes'
                ],
				'selectors' => [
					'{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .thard-heading ' => '-webkit-text-stroke-color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'show_title_third_strok_fill_color',
			[
				'label' => __( 'Text Stroke Fill Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'show_title_third_strok' => 'yes'
                ],
				'selectors' => [
					'{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper .wellnez-dual-heading-title .thard-heading ' => '-webkit-text-fill-color: {{VALUE}}',
				],
			]
		);
        $this->end_controls_section();

        /*
            * Dual Heading description Styling Section
        */
        $this->start_controls_section(
            'wellnez_addons_dual_heading_description_styles',
            [
                'label' => esc_html__( 'Sub Heading', 'wellnez' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );


        $this->add_control(
            'wellnez_addons_dual_heading_description_text_color',
            [
                'label'     => esc_html__( 'Color', 'wellnez' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#989B9E',
                'selectors' => [
                    '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper p.wellnez-dual-heading-description' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'            => 'wellnez_addons_dual_heading_description_typography',
                'fields_options'  => [
                    'font_weight' => [
                        'default' => '400'
                    ]
                ],
                'selector'        => '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper p.wellnez-dual-heading-description'
            ]
        );

        $this->add_responsive_control(
            'wellnez_addons_dual_heading_description_margin',
            [
                'label'      => __('Margin', 'wellnez'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper p.wellnez-dual-heading-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'wellnez_addons_dual_heading_description_padding',
            [
                'label'      => __('Padding', 'wellnez'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .wellnez-dual-heading .wellnez-dual-heading-wrapper p.wellnez-dual-heading-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings          = $this->get_settings_for_display();

        $this->add_render_attribute( 'wellnez_addons_dual_first_heading', 'class', 'first-heading' );
        $this->add_inline_editing_attributes( 'wellnez_addons_dual_first_heading', 'none' );

        $this->add_render_attribute( 'wellnez_addons_dual_second_heading', 'class', 'second-heading' );
        $this->add_inline_editing_attributes( 'wellnez_addons_dual_second_heading', 'none' );

        $this->add_render_attribute( 'wellnez_addons_dual_thard_heading', 'class', 'thard-heading' );
        $this->add_inline_editing_attributes( 'wellnez_addons_dual_thard_heading', 'none' );

        $this->add_render_attribute( 'wellnez_addons_dual_heading_description', 'class', 'wellnez-dual-heading-description' );
        $this->add_inline_editing_attributes( 'wellnez_addons_dual_heading_description' );

        if( $settings['wellnez_addons_dual_heading_title_link']['url'] ) {
            $this->add_render_attribute( 'wellnez_addons_dual_heading_title_link', 'href', esc_url( $settings['wellnez_addons_dual_heading_title_link']['url'] ) );
            if( $settings['wellnez_addons_dual_heading_title_link']['is_external'] ) {
                $this->add_render_attribute( 'wellnez_addons_dual_heading_title_link', 'target', '_blank' );
            }
            if( $settings['wellnez_addons_dual_heading_title_link']['nofollow'] ) {
                $this->add_render_attribute( 'wellnez_addons_dual_heading_title_link', 'rel', 'nofollow' );
            }
        }

        echo '<div class="wellnez-dual-heading">';
            echo '<div class="wellnez-dual-heading-wrapper">';

                if ( 'yes' === $settings['wellnez_addons_dual_heading_icon_show'] && !empty( $settings['wellnez_addons_dual_heading_icon']['value'] ) ) :
                    echo '<span class="wellnez-dual-heading-icon">';
                        Icons_Manager::render_icon( $settings['wellnez_addons_dual_heading_icon'] );
                    echo '</span>';
                endif;

                echo '<h1 class="wellnez-dual-heading-title">';
                    if( !empty( $settings['wellnez_addons_dual_heading_title_link']['url'] ) ) :
                        echo '<a '.$this->get_render_attribute_string( 'wellnez_addons_dual_heading_title_link' ).'>';
                    endif;
                    echo '<span '.$this->get_render_attribute_string( 'wellnez_addons_dual_first_heading' ).'>'.$settings['wellnez_addons_dual_first_heading'].'</span>';
                    echo '<span '.$this->get_render_attribute_string( 'wellnez_addons_dual_second_heading' ).'>'.$settings['wellnez_addons_dual_second_heading'].'</span>';
                    echo '<span '.$this->get_render_attribute_string( 'wellnez_addons_dual_thard_heading' ).'>'.$settings['wellnez_addons_dual_thard_heading'].'</span>';
                    if( !empty( $settings['wellnez_addons_dual_heading_title_link']['url'] ) ) {
                        echo '</a>';
                    }
                echo '</h1>';

                if ( !empty($settings['wellnez_addons_dual_heading_description'] ) ) :
                    echo '<p '.$this->get_render_attribute_string( 'wellnez_addons_dual_heading_description' ).'>'.wp_kses_post( $settings['wellnez_addons_dual_heading_description'] ).'</p>';
                endif;

            echo '</div>';
        echo '</div>';
    }
}