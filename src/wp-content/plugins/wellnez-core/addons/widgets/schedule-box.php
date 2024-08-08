<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\HEADING;
use \Elementor\Repeater;
/**
 *
 * Image Widget .
 *
 */
class Wellnez_ScheduleBox extends Widget_Base {

	public function get_name() {
		return 'wellnezschedulebox';
	}
 
	public function get_title() {
		return __( 'ScheduleBox Image', 'wellnez' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'wellnez' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'image_section',
			[
				'label' 	=> __( 'Images', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'schedule_version',
			[
				'label' 		=> __( 'Style', 'wellnez' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  			=> __( 'Style One', 'wellnez' ),
					'2' 			=> __( 'Style Two', 'wellnez' ),
				],
			]
		);

		$this->add_control(
			'schedule_image',
			[
				'label' 		=> __( 'Background Image', 'wellnez' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'schedule_sub_title', [
				'label' 		=> __( 'Sub Title', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'TIME SCHEDULE' , 'wellnez' ),
				'label_block' 	=> true,
			]
        );
        $this->add_control(
			'schedule_title', [
				'label' 		=> __( 'Title', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'Opening Hours' , 'wellnez' ),
				'label_block' 	=> true,
			]
        );

        $repeater = new Repeater();
        $repeater->add_control(
			'schedule_time', [
				'label' 		=> __( 'Schedule Time', 'wellnez' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '#' , 'wellnez' ),
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'schedule_time_list',
			[
				'label' 		=> __( 'Schedule List', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'schedule_time' 		=> __( 'Mon-Fri: 9 AM - 6 PM', 'wellnez' ),
					],
					[
						'schedule_time' 		=> __( 'Saturday: 10 AM - 3 PM', 'wellnez' ),
					],
					[
						'schedule_time' 		=> __( 'Sunday: Closed', 'wellnez' ),
					],
				],
				'title_field' 	=> '{{{ schedule_time }}}',
			]
		);
        $this->end_controls_section();


		
		$this->start_controls_section(
			'title_style_option',
			[
				'label' 	=> __( 'Title', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .schedule-label' => 'color: {{VALUE}}',
                ]
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'title_typography',
				'label'         => __( 'Typography', 'wellnez' ),
                'selector'      => '{{WRAPPER}} .schedule-label',
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label'         => __( 'Image Margin', 'wellnez' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .schedule-label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->end_controls_section();

		$this->start_controls_section(
			'title_sub_title_option',
			[
				'label' 	=> __( 'Sub Title', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_sub_color',
			[
				'label' 		=> __( 'Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .schedule-label' => 'color: {{VALUE}}',
                ]
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'title_sub_typography',
				'label'         => __( 'Typography', 'wellnez' ),
                'selector'      => '{{WRAPPER}} .schedule-label',
			]
		);
		$this->add_responsive_control(
			'title_sub_margin',
			[
				'label'         => __( 'Image Margin', 'wellnez' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .schedule-label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->end_controls_section();

        
		$this->start_controls_section(
			'list_sub_title_option',
			[
				'label' 	=> __( 'Schedule ', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'list_sub_color',
			[
				'label' 		=> __( 'Color', 'wellnez' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .schedule-time' => 'color: {{VALUE}}',
                ]
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'list_sub_typography',
				'label'         => __( 'Typography', 'wellnez' ),
                'selector'      => '{{WRAPPER}} .schedule-time',
			]
		);
		$this->add_responsive_control(
			'list_sub_margin',
			[
				'label'         => __( 'Image Margin', 'wellnez' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .schedule-time' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		
		?>

        <div class="schedule-box1 style<?php echo esc_attr($settings[ 'schedule_version' ] ); ?>">
            <?php if( $settings['schedule_image']['url'] ): ?>
				<div class="schedule-img mega-hover">
					<?php echo wellnez_img_tag( array(
						'url'	=> esc_url( $settings['schedule_image']['url'] ),
						'alt'   => 'banner',
					) );
					?>
				</div>
			<?php endif; ?>
            <div class="schedule-content">
                <?php if( !empty( $settings[ 'schedule_sub_title' ] ) ): ?>
                    <span class="schedule-label">
                        <?php echo esc_html( $settings[ 'schedule_sub_title' ] ); ?>
                    </span>
                <?php endif; ?>
                <?php if( !empty( $settings[ 'schedule_title' ] ) ): ?>
                    <h2 class="schedule-title"><?php echo esc_html( $settings[ 'schedule_title' ] ); ?></h2>
                <?php endif; ?>
                <?php foreach( $settings[ 'schedule_time_list' ] as $schedule_times ): ?>
                    <p class="schedule-time">
                        <?php echo esc_html( $schedule_times[ 'schedule_time' ] ); ?>
                    </p>
                <?php endforeach; ?>
            </div>
        </div>
	<?php
	}

}