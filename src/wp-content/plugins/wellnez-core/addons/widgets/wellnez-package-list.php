<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Repeater;
use \Elementor\Utils;
/**
 *
 * Package Box Widget .
 *
 */
class Wellnez_Package_Box extends Widget_Base {

	public function get_name() {
		return 'wellnezpackage';
	}

	public function get_title() {
		return __( 'Package Box', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-price-list';
    }

	public function get_categories() {
		return [ 'wellnez' ];
	}

 
	protected function register_controls() {

		$this->start_controls_section(
			'package_table_section',
			[
				'label' 	=> __( 'Package Box', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		$repeater = new Repeater();

        $repeater->add_control(
			'pack_image',
			[
				'label' 		=> __( 'Image', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);

        $repeater->add_control(
			'package',
			[
				'label' 	=> __( 'Package Name', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Basic', 'wellnez' )
			]
        );

        $repeater->add_control(
			'package_dis',
			[
				'label' 	=> __( 'Package Discription', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Lorem ipsum dolor sit ameto ext commonly used.', 'wellnez' )
			]
        );

        $repeater->add_control(
			'price_befre_text',
			[
				'label' 	=> __( 'Price Befre Text', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'only', 'wellnez' )
			]
        );

        $repeater->add_control(
			'price',
			[
				'label' 	=> __( 'Price', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( '$58', 'wellnez' ),
			]
        );
        

        
        $repeater->add_control(
			'link',
			[
				'label' 		=> __( 'Single Page Link', 'wellnez' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'wellnez' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

        // pack_image
		$this->add_control(
			'packages_list',
			[
				'label' 		=> __( 'Package list', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'price_befre_text' 			=> __( 'Only', 'wellnez' ),
						'price' 			=> __( '$58', 'wellnez' ),
						'package' 	=> __( 'Spa Treetment', 'wellnez' ),
						'package_dis' 	=> __( 'Lorem ipsum dolor sit ameto ext commonly used.', 'wellnez' ),
					],
				],
				'title_field' 	=> '{{{ package }}}',
			]
		);

        $this->end_controls_section();

		
        $this->start_controls_section(
			'package_table_style_section',
			[
				'label' 	=> __( 'Package Name', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        
        $this->add_control(
			'package_table_color',
			[
				'label' 		=> __( 'Package Title Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .package-style3 .package-name' => 'color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'package_table_typography',
				'label' 	=> __( 'Package Title Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .package-style3 .package-name',
			]
        );
        $this->end_controls_section();

        // DISCRIPTION
        $this->start_controls_section(
			'package_dis_style',
			[
				'label' 	=> __( 'Package Discription', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'package_dis_color',
			[
				'label' 		=> __( 'Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .package-style3 .package-text' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'package_dis_typo',
				'label' 	=> __( 'Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .package-style3 .package-text',
			]
        );
        $this->end_controls_section();
        
        // DISCRIPTION
        $this->start_controls_section(
			'package_price_style',
			[
				'label' 	=> __( 'Package Price', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'package_price_color',
			[
				'label' 		=> __( 'Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .package-style3 .amount' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'package_price_typo',
				'label' 	=> __( 'Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .package-style3 .amount',
			]
        );
        $this->end_controls_section();


        // DISCRIPTION
        $this->start_controls_section(
			'package_box_style',
			[
				'label' 	=> __( 'Box', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'package_box_color',
			[
				'label' 		=> __( 'Background Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .package-style3' => 'background-color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'package_box_hover_color',
			[
				'label' 		=> __( 'Background Hover Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .package-style3:hover' => 'background-color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'package_box_hover_text_color',
			[
				'label' 		=> __( 'Background Text Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .package-style3:hover .package-name a, {{WRAPPER}} .package-style3:hover .amount, {{WRAPPER}} .package-style3:hover .package-price,  {{WRAPPER}}  .package-style3:hover .package-text ' => 'background-color: {{VALUE}}',
                ],
			]
        );

        $this->add_responsive_control(
			'package_box_margin',
			[
				'label' 		=> __( 'Margin', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .package-style3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'package_box_padding',
			[
				'label' 		=> __( 'Padding', 'wellnez' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .package-style3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        
        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();
        $packages_list = $settings[ 'packages_list' ]; 
		?>	
            <?php foreach( $packages_list as $package ): ?>
                <div class="package-style3">

                    <?php if( !empty( $package[ 'pack_image' ][ 'url' ] ) ): ?>
                        <div class="package-icon">
                            <?php echo wellnez_img_tag( array(
                                    'url'	=> esc_url( $package['pack_image']['url'] ),
                                    'alt'   => 'icon',
                                ) );
                            ?>
                        </div>
                    <?php endif; ?>
                    <div class="media-body">
                        <div class="package-top">
                            <?php if( !empty( $package[ 'package' ] ) ): ?>
                                <h3 class="package-name">
                                    <a href="<?php echo esc_url( $package[ 'link' ]['url'] ); ?>" class="text-inherit">
                                        <?php echo esc_html( $package[ 'package' ] ); ?>
                                    </a>
                                </h3>
                            <?php  endif; ?>
                            <div class="package-line"></div>

                            <?php if( !empty( $package[ 'price' ] ) ): ?>
                                <p class="package-price"><?php echo esc_html( $package[ 'price_befre_text' ] ) ?>
                                <span class="amount"><?php echo esc_html( $package[ 'price' ] ) ?></span></p>
                            <?php  endif; ?>
                        </div>
                        <?php if( !empty( $package[ 'package_dis' ] ) ): ?>
                            <p class="package-text"><?php echo esc_html( $package[ 'package_dis' ] ); ?></p>
                        <?php  endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
		<?php

	}
}