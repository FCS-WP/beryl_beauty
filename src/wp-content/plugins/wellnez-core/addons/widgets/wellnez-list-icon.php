<?php

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Control_Media;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Icons_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Widget_Base;

class Wellnez_List_group extends Widget_Base {

	public function get_name() {
		return 'wellnez-list-groups';
	}

	public function get_title() {
		return esc_html__( 'List Group', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-editor-list-ol wellnez';
	}

	public function get_categories() {
		return [ 'wellnez' ];
	}

	public function get_keywords() {
		return [ 'wellnez', 'information', 'group', 'list', 'icon', 'socail' ];
	}

	protected function register_controls() {

		/*
		* Icon List Content
		*/
		$this->start_controls_section(
			'wellnez_section_list_content',
			[
				'label' => esc_html__( 'Content', 'wellnez' )
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
            'wellnez_list_icon_type',
            [
                'label' => __( 'Media Type', 'wellnez' ),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'icon',
				'options' => [
					'icon' => [
						'title' => __( 'Icon', 'wellnez' ),
						'icon' => 'eicon-star',
					],
					'number' => [
						'title' => __( 'Number', 'wellnez' ),
						'icon' => 'eicon-number-field',
					],
					'image' => [
						'title' => __( 'Image', 'wellnez' ),
						'icon' => 'eicon-image',
					],
				],
				'toggle' => false,
                'style_transfer' => true,
            ]
        );

		$repeater->add_control(
			'wellnez_list_icon',
			[
				'label'       => __( 'Icon', 'wellnez' ),
				'type'        => Controls_Manager::ICONS,
				'label_block' => true,
				'separator'   =>'after',
				'default'     => [
					'value'   => 'far fa-check-circle',
					'library' => 'fa-regular'
				],
				'condition' =>[
					'wellnez_list_icon_type' => 'icon'
				]
			]
		);

		$repeater->add_control(
			'wellnez_list_icon_number',
			[
				'label'   => esc_html__( 'Number', 'wellnez' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( '1', 'wellnez' ),
				'separator'   =>'after',
				'condition' =>[
					'wellnez_list_icon_type' => 'number'
				]
			]
		);

		$repeater->add_control(
			'wellnez_list_icon_number_image',
			[
				'label' => __( 'Choose Image', 'wellnez' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'separator'   =>'after',
				'dynamic' => [
					'active' => true,
				],
				'condition' =>[
					'wellnez_list_icon_type' => 'image'
				]
			]
		);

        $repeater->add_control(
			'wellnez_list_text',
			[
				'label'   => esc_html__( 'Text', 'wellnez' ),
				'type'    => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'List Text', 'wellnez' ),
				'dynamic' => [ 'active' => true ]
			]
		);

		$repeater->add_control(
			'wellnez_list_link',
			[
				'label' => __( 'List URL', 'wellnez' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'wellnez' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'wellnez_list_group',
			[
				'label' => __( 'List Items', 'elementor' ),
				'type' 		=> Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' => [
					[
						'wellnez_list_text' => __( 'List Item #1', 'elementor' ),
						'wellnez_list_icon' => [
							'value' => 'fas fa-check',
							'library' => 'fa-solid',
						],
					],
					[
						'wellnez_list_text' => __( 'List Item #2', 'elementor' ),
						'wellnez_list_icon' => [
							'value' => 'fas fa-check',
							'library' => 'fa-solid',
						],
					],
					[
						'wellnez_list_text' => __( 'List Item #3', 'elementor' ),
						'wellnez_list_icon' => [
							'value' => 'fas fa-check',
							'library' => 'fa-solid',
						],
					],
				],
				'title_field' => '{{{ elementor.helpers.renderIcon( this, wellnez_list_icon, {}, "i", "panel" ) }}}{{{ wellnez_list_text }}}'
			]
		);

		$this->end_controls_section();

		/*
		* Icon List Content
		*/
		$this->start_controls_section(
			'wellnez_section_list_style',
			[
				'label' => esc_html__( 'Container', 'wellnez' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'wellnez_section_list_layout',
			[
				'label' => __( 'Layout', 'wellnez' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'layout_1',
				'options' => [
					'layout_1' => __( 'Layout 1', 'wellnez' ),
					'layout_2' => __( 'Layout 2', 'wellnez' ),
					'layout_3' => __( 'Layout 3', 'wellnez' ),
				],
			]
		);

		$this->add_responsive_control(
			'wellnez_section_list_alignment',
			[
				'label'       => esc_html__( 'Alignment', 'wellnez' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'wellnez-list-group-left'   => [
						'title' => esc_html__( 'Left', 'wellnez' ),
						'icon'  => 'eicon-text-align-left'
					],
					'wellnez-list-group-center' => [
						'title' => esc_html__( 'Center', 'wellnez' ),
						'icon'  => 'eicon-text-align-center'
					],
					'wellnez-list-group-right'  => [
						'title' => esc_html__( 'Right', 'wellnez' ),
						'icon'  => 'eicon-text-align-right'
					]
				],
				'selectors_dictionary' => [
					'wellnez-list-group-left' => 'justify-content: flex-start; text-align: left;',
					'wellnez-list-group-center' => 'justify-content: center; text-align: center;',
					'wellnez-list-group-right' => 'justify-content: flex-end; text-align: right;',
				],
				'selectors' => [
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper' => '{{VALUE}};',
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item' => '{{VALUE}};',
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item a' => '{{VALUE}};',
				],
				'default'     => 'wellnez-list-group-left',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'            => 'wellnez_section_list_group_background',
				'types'           => [ 'classic', 'gradient' ],
				'selector'        => '{{WRAPPER}} .wellnez-list-group',
			]
		);

		$this->add_responsive_control(
			'wellnez_section_list_group_padding',
			[
				'label'      => __( 'Padding', 'wellnez' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
                    'top'      => '0',
                    'right'    => '0',
                    'bottom'   => '0',
                    'left'     => '0',
                    'unit'     => 'px',
                    'isLinked' => true
                ],
				'selectors'  => [
					'{{WRAPPER}} .wellnez-list-group' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'wellnez_section_list_group_border',
				'selector'  => '{{WRAPPER}} .wellnez-list-group'
			]
		);

		$this->add_responsive_control(
			'wellnez_section_list_group_radius',
			[
				'label'        => __( 'Border Radius', 'wellnez' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'unit'     => 'px'
				],
				'selectors'    => [
					'{{WRAPPER}} .wellnez-list-group' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'wellnez_section_list_group_shadow',
				'selector' => '{{WRAPPER}} .wellnez-list-group'
			]
		);

		$this->end_controls_section();

		/*
		* Icon List Content
		*/
		$this->start_controls_section(
			'wellnez_section_list_item_style',
			[
				'label' => esc_html__( 'List Item', 'wellnez' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'wellnez_section_list_item_padding',
			[
				'label'        => __( 'Item Padding', 'wellnez' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '10',
					'right'    => '10',
					'bottom'   => '10',
					'left'     => '10',
					'unit'     => 'px'
				],
				'selectors'    => [
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_control(
			'wellnez_section_list_item_separator',
            [
				'label'        => __( 'Item Separator', 'wellnez' ),
				'type'         =>  Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'wellnez' ),
				'label_off'    => __( 'Hide', 'wellnez' ),
				'return_value' => 'yes',
				'default'      => 'no',
				'condition'    => [
					'wellnez_section_list_layout!' => 'layout_3'
				]
			]
        );

		$this->add_responsive_control(
			'wellnez_section_list_item_separator_height',
			[
				'label' => __( 'Separator Height', 'wellnez' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper.layout_1 .wellnez-list-group-item:not(:last-child):after' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper.layout_2 .wellnez-list-group-item:not(:last-child):after' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'wellnez_section_list_item_separator' => 'yes',
					'wellnez_section_list_layout!' => 'layout_3'
				]
			]
		);

		$this->add_control(
			'wellnez_section_list_item_separator_color',
			[
				'label' => __( 'Separator Color', 'wellnez' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#e5e5e5',
				'selectors' => [
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper.layout_1 .wellnez-list-group-item:not(:last-child):after' => 'background: {{VALUE}}',
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper.layout_2 .wellnez-list-group-item:not(:last-child):after' => 'background: {{VALUE}}',
				],
				'condition' => [
					'wellnez_section_list_item_separator' => 'yes',
					'wellnez_section_list_layout!' => 'layout_3'
				]
			]
		);

		$this->add_responsive_control(
			'wellnez_list_item_spacing',
			[
				'label' => __( 'Item Spacing', 'wellnez' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper.layout_3 .wellnez-list-group-item:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'wellnez_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'            => 'wellnez_list_item_background',
				'types'           => [ 'classic', 'gradient' ],
				'selector'        => '{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper.layout_3 .wellnez-list-group-item',
				'condition' => [
					'wellnez_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'wellnez_list_item_border',
				'selector'  => '{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper.layout_3 .wellnez-list-group-item',
				'fields_options'  => [
                    'border' 	  => [
                        'default' => 'solid'
                    ],
                    'width'  	  => [
                        'default' 	 => [
                            'top'    => '1',
                            'right'  => '1',
                            'bottom' => '1',
                            'left'   => '1'
                        ]
                    ],
                    'color' 	  => [
                        'default' => '#e5e5e5',
                    ]
                ],
				'condition' => [
					'wellnez_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->add_responsive_control(
			'wellnez_list_item_radius',
			[
				'label'        => __( 'Border Radius', 'wellnez' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '10',
					'right'    => '10',
					'bottom'   => '10',
					'left'     => '10',
					'unit'     => 'px'
				],
				'selectors'    => [
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper.layout_3 .wellnez-list-group-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'condition' => [
					'wellnez_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'wellnez_list_item_shadow',
				'selector' => '{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper.layout_3 .wellnez-list-group-item',
				'condition' => [
					'wellnez_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->end_controls_section();

		/*
		* Icon List Icon Style
		*/
		$this->start_controls_section(
			'wellnez_section_list_icon_style',
			[
				'label' => esc_html__( 'Icon', 'wellnez' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'wellnez_list_icon_position',
			[
				'label'       => esc_html__( 'Icon Position', 'wellnez' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'wellnez-icon-left'   => [
						'title' => esc_html__( 'Left', 'wellnez' ),
						'icon'  => 'eicon-h-align-left'
					],
					'wellnez-icon-center' => [
						'title' => esc_html__( 'Center', 'wellnez' ),
						'icon'  => 'eicon-v-align-top'
					],
					'wellnez-icon-right'  => [
						'title' => esc_html__( 'Right', 'wellnez' ),
						'icon'  => 'eicon-h-align-right'
					]
				],
				'default'     => 'wellnez-icon-left'
			]
		);

		$this->add_responsive_control(
			'wellnez_list_icon_alignment',
			[
				'label'       => esc_html__( 'Icon Vertical Alignment', 'wellnez' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'wellnez-icon-align-left'   => [
						'title' => esc_html__( 'Top', 'wellnez' ),
						'icon'  => 'eicon-v-align-top'
					],
					'wellnez-icon-align-center' => [
						'title' => esc_html__( 'Center', 'wellnez' ),
						'icon'  => 'eicon-v-align-middle'
					],
					'wellnez-icon-align-right'  => [
						'title' => esc_html__( 'Bottom', 'wellnez' ),
						'icon'  => 'eicon-v-align-bottom'
					]
				],
				'default'     => 'wellnez-icon-align-left',
				'selectors_dictionary' => [
					'wellnez-icon-align-left' => 'align-items: flex-start;',
					'wellnez-icon-align-center' => 'align-items: center;',
					'wellnez-icon-align-right' => 'align-items: flex-end;',
				],
				'selectors' => [
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item' => '{{VALUE}};',
				],
				'condition' => [
					'wellnez_list_icon_position!' => 'wellnez-icon-center'
				]
			]
		);

		$this->add_responsive_control(
			'wellnez_list_icon_top_alignment',
			[
				'label'       => esc_html__( 'Icon Alignment', 'wellnez' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'wellnez-icon-top-align-left'   => [
						'title' => esc_html__( 'Left', 'wellnez' ),
						'icon'  => 'eicon-v-align-top'
					],
					'wellnez-icon-top-align-center' => [
						'title' => esc_html__( 'Center', 'wellnez' ),
						'icon'  => 'eicon-v-align-middle'
					],
					'wellnez-icon-top-align-right'  => [
						'title' => esc_html__( 'Right', 'wellnez' ),
						'icon'  => 'eicon-v-align-bottom'
					]
				],
				'default'     => 'wellnez-icon-left',
				'selectors_dictionary' => [
					'wellnez-icon-top-align-left' => 'text-align: left; margin-right: auto;',
					'wellnez-icon-top-align-center' => 'text-align: center; margin-left: auto; margin-right: auto;',
					'wellnez-icon-top-align-right' => 'text-align: right; margin-left: auto;',
				],
				'selectors' => [
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item .wellnez-list-group-icon' => '{{VALUE}};',
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item .wellnez-list-group-icon .wellnez-list-group-icon-image' => '{{VALUE}};',
				],
				'condition' => [
					'wellnez_list_icon_position' => 'wellnez-icon-center'
				]
			]
		);

		$this->add_responsive_control(
			'wellnez_section_list_item_icon_spacing',
			[
				'label' => __( 'Icon Right Spacing', 'wellnez' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item .wellnez-list-group-text' => 'padding-left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'wellnez_list_icon_position' => 'wellnez-icon-left'
				]
			]
		);
		$this->add_responsive_control(
			'wellnez_section_list_item_icon_left_spacing',
			[
				'label' => __( 'Icon Left Spacing', 'wellnez' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item .wellnez-list-group-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'wellnez_list_icon_position' => 'wellnez-icon-right'
				]
			]
		);
		$this->add_responsive_control(
			'wellnez_section_list_item_icon_bottom_spacing',
			[
				'label' => __( 'Icon Bottom Spacing', 'wellnez' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item .wellnez-list-group-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'wellnez_list_icon_position' => 'wellnez-icon-center'
				]
			]
		);

		$this->add_responsive_control(
			'wellnez_section_list_item_icon_size',
			[
				'label' => __( 'Icon Size', 'wellnez' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 16,
				],
				'selectors' => [
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item .wellnez-list-group-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item .wellnez-list-group-icon svg' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item .wellnez-list-group-icon .wellnez-list-group-icon-image' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wellnez_section_list_item_icon_color',
			[
				'label' => __( 'Icon Color', 'wellnez' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item .wellnez-list-group-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item .wellnez-list-group-icon svg path' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wellnez_section_list_item_icon_color_hover',
			[
				'label' => __( 'Icon Color Hover', 'wellnez' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item .wellnez-list-group-icon:hover i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item .wellnez-list-group-icon:hover svg path' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wellnez_section_list_item_icon_bg_color_hover',
			[
				'label' => __( 'Icon Background Hover', 'wellnez' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item .wellnez-list-group-icon.yes:hover' => 'background-color: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'wellnez_section_list_item_icon_border color_hover',
			[
				'label' => __( 'Icon Border Hover', 'wellnez' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item .wellnez-list-group-icon.yes:hover' => 'border-color: {{VALUE}} !important',
				],
			]
		);


		$this->add_responsive_control(
			'wellnez_section_list_item_image_radius',
			[
				'label'        => __( 'Image Radius', 'wellnez' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'unit'     => 'px'
				],
				'selectors'    => [
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item .wellnez-list-group-icon .wellnez-list-group-icon-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'wellnez_list_item_icon_box_enable',
			[
				'label' => __( 'Enable Icon Box', 'wellnez' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'wellnez' ),
				'label_off' => __( 'Hide', 'wellnez' ),
				'return_value' => 'yes',
				'default' => 'no',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'wellnez_list_item_icon_box_width',
			[
				'label' => __( 'Icon Box Width', 'wellnez' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item .wellnez-list-group-icon.yes' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper.layout_1 .wellnez-list-group-item .wellnez-list-group-text' => 'width: calc( 100% - {{SIZE}}{{UNIT}} );',
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper.layout_2 .wellnez-list-group-item .wellnez-list-group-text' => 'width: calc( 100% - {{SIZE}}{{UNIT}} );',
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper.layout_3 .wellnez-list-group-item .wellnez-list-group-text' => 'width: calc( 100% - {{SIZE}}{{UNIT}} );',
				],
				'condition' => [
					'wellnez_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'wellnez_list_item_icon_box_height',
			[
				'label' => __( 'Icon Box Height', 'wellnez' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item .wellnez-list-group-icon.yes' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'wellnez_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'            => 'wellnez_list_item_icon_box_background',
				'types'           => [ 'classic', 'gradient' ],
				'selector'        => '{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item .wellnez-list-group-icon.yes',
				'condition' => [
					'wellnez_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'            => 'wellnez_list_item_icon_box_background_hover',
				'types'           => [ 'classic', 'gradient' ],
				'selector'        => '{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item .wellnez-list-group-icon.yes:hover',
				'condition' => [
					'wellnez_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'wellnez_list_item_icon_box_border',
				'selector'  => '{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item .wellnez-list-group-icon.yes',
				'condition' => [
					'wellnez_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'wellnez_list_item_icon_box_radius',
			[
				'label'        => __( 'Border Radius', 'wellnez' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'unit'     => 'px'
				],
				'selectors'    => [
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item .wellnez-list-group-icon.yes' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'condition' => [
					'wellnez_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'wellnez_list_item_icon_box_shadow',
				'selector' => '{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item .wellnez-list-group-icon.yes',
				'condition' => [
					'wellnez_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->end_controls_section();

		/*
		* Icon List Text
		*/
		$this->start_controls_section(
			'wellnez_section_list_text_style',
			[
				'label' => esc_html__( 'Text', 'wellnez' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'wellnez_section_list_text_alignment',
			[
				'label'       => esc_html__( 'Text Alignment', 'wellnez' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'wellnez-text-align-left'   => [
						'title' => esc_html__( 'Left', 'wellnez' ),
						'icon'  => 'eicon-text-align-left'
					],
					'wellnez-text-align-center' => [
						'title' => esc_html__( 'Center', 'wellnez' ),
						'icon'  => 'eicon-text-align-left'
					],
					'wellnez-text-align-right'  => [
						'title' => esc_html__( 'Right', 'wellnez' ),
						'icon'  => 'eicon-text-align-left'
					]
				],
				'default'     => 'wellnez-text-align-left',
				'selectors_dictionary' => [
					'wellnez-text-align-left' => 'text-align: left;',
					'wellnez-text-align-center' => 'text-align: center;',
					'wellnez-text-align-right' => 'text-align: right;',
				],
				'selectors' => [
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item .wellnez-list-group-text' => '{{VALUE}};',
				],
				'condition' => [
					'wellnez_list_icon_position' => 'wellnez-icon-center'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wellnez_section_list_text_typography',
				'label' => __( 'Typography', 'wellnez' ),
				'selector' => '{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item .wellnez-list-group-text',
			]
		);

		$this->add_control(
			'wellnez_section_list_text_color',
			[
				'label' => __( 'Text Color', 'wellnez' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item .wellnez-list-group-text' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wellnez_section_list_text_hover_color',
			[
				'label' => __( 'Text Color Hover', 'wellnez' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wellnez-list-group .wellnez-list-group-wrapper .wellnez-list-group-item .wellnez-list-group-text:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

	}
	protected function render() {
		$settings = $this->get_settings_for_display();

		?>
		<div class="wellnez-list-group">
			<ul class="wellnez-list-group-wrapper <?php echo $settings['wellnez_section_list_layout']; ?>">
				<?php foreach( $settings['wellnez_list_group'] as $list ) : ?>
				<?php
					$target = $list['wellnez_list_link']['is_external'] ? ' target="_blank"' : '';
					$nofollow = $list['wellnez_list_link']['nofollow'] ? ' rel="nofollow"' : '';
				?>
					<li class="wellnez-list-group-item <?php echo $settings['wellnez_list_icon_position']?>">
						<?php if ( !empty( $list['wellnez_list_link']['url'] ) ) { ?>
						<a href="<?php echo $list['wellnez_list_link']['url']; ?>" <?php echo $target; ?> <?php echo $nofollow; ?> >
						<?php } ?>
							<div class="wellnez-list-group-icon <?php echo $settings['wellnez_list_item_icon_box_enable']; ?>">
								<?php if ( $list['wellnez_list_icon_type'] === 'icon' && !empty($list['wellnez_list_icon']) ){ ?>
									<?php Icons_Manager::render_icon( $list['wellnez_list_icon'], [ 'aria-hidden' => 'true' ] ); ?>
								<?php } ?>
								<?php if ( $list['wellnez_list_icon_type'] === 'number' && !empty($list['wellnez_list_icon_type']) ){ ?>
									<div class="wellnez-list-group-icon-number">
										<?php echo $list['wellnez_list_icon_number']; ?>
									</div>
								<?php } ?>
								<?php if ( $list['wellnez_list_icon_type'] === 'image' && !empty($list['wellnez_list_icon_type']) ){ ?>
									<div class="wellnez-list-group-icon-image">
										<img src="<?php echo $list['wellnez_list_icon_number_image']['url'] ?>" alt="<?php echo $list['wellnez_list_text']; ?>">
									</div>
								<?php } ?>
							</div>
							<?php if ( !empty( $list['wellnez_list_text'] ) ) { ?>
								<span class="wellnez-list-group-text">
									<?php echo $list['wellnez_list_text']; ?>
								</span>
							<?php } ?>
						<?php if ( !empty( $list['wellnez_list_link']['url'] ) ) { ?>
						</a>
						<?php } ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php
	}
}