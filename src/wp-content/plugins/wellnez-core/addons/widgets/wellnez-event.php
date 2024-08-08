<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * Event Widget .
 *
 */
class Wellnez_Event extends Widget_Base {

	public function get_name() {
		return 'wellnezevent';
	}

	public function get_title() {
		return __( 'Event', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'wellnez' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'event_section',
			[
				'label'		 	=> __( 'Event', 'wellnez' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );
        
        $this->add_control(
			'event_date_text',
			[
				'label' 	=> __( 'Event Date Text', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Date', 'wellnez' )
			]
        );
        
        $this->add_control(
			'event_topic_text',
			[
				'label' 	=> __( 'Event Topic Text', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Event Topic', 'wellnez' )
			]
        );
        
        $this->add_control(
			'event_author_text',
			[
				'label' 	=> __( 'Event Author Text', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Author Name', 'wellnez' )
			]
        );
        
        $this->add_control(
			'event_booking_text',
			[
				'label' 	=> __( 'Event Booking Text', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Book Seat', 'wellnez' )
			]
        );
        
        $repeater = new Repeater();

        $repeater->add_control(
			'event_date',
			[
				'label' 	=> __( 'Event Date', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( '21 Feb 2022', 'wellnez' )
			]
        );

        $repeater->add_control(
			'event_topic_image',
			[
				'label'     => __( 'Event Topic Image', 'wellnez' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
        
        $repeater->add_control(
			'event_title',
			[
				'label' 	=> __( 'Event Title', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Online Business Growth', 'wellnez' )
			]
        );
        
        $repeater->add_control(
			'event_topic',
			[
				'label' 	=> __( 'Event Topic', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Online Topic, Business', 'wellnez' )
			]
        );
        
        $repeater->add_control(
			'event_author_image',
			[
				'label'     => __( 'Event Author Image', 'wellnez' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
        
        $repeater->add_control(
			'event_author_name',
			[
				'label' 	=> __( 'Event Author Name', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Jamica Deo', 'wellnez' )
			]
        );
        
        $repeater->add_control(
			'event_author_designation',
			[
				'label' 	=> __( 'Event Author Designation', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Consultant', 'wellnez' )
			]
        );
        
        $repeater->add_control(
			'event_booing_button',
			[
				'label' 	=> __( 'Event Button Text', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Book Seat', 'wellnez' )
			]
        );
        
        $repeater->add_control(
			'event_booing_url',
			[
				'label' 	=> __( 'Event Button Url?', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( '#', 'wellnez' )
			]
        );
        
		$this->add_control(
			'event_repeater',
			[
				'label' 		=> __( 'Event', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'event_title'       => __( 'Online Business Growth', 'wellnez' ),
					],
					[
						'event_title'       => __( 'Information Consultancy', 'wellnez' ),
					],
					[
						'event_title'       => __( 'Energy Saving Solutions', 'wellnez' ),
					],
					[
						'event_title'       => __( 'Energy Saving Solutions', 'wellnez' ),
					],
				],
				'title_field' 	=> '{{{ event_title }}}',
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'event_style_section',
			[
				'label' => __( 'Event Title Style', 'wellnez' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'table_head_bg_color',
			[
				'label' 	=> __( 'Table Head Background Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .event-table__head' => 'background-color: {{VALUE}}',
                ],
			]
        );
        
        $this->add_control(
			'table_head_text_color',
			[
				'label' 	=> __( 'Table Head Text Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .event-table__coltitle' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'table_head_text_typography',
				'label' 	=> __( 'Table Head Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .event-table__coltitle',
			]
		);

        $this->add_control(
            'table_content_bg_color',
            [
                'label' 	=> __( 'Table Content Background Color', 'wellnez' ),
                'type' 		=> Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .event-table__item' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_control(
			'table_date_text_color',
			[
				'label' 	=> __( 'Table Date Text Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .event-table__date' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'table_date_text_typography',
				'label' 	=> __( 'Table Date Text Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .event-table__date',
			]
		);
        
        $this->add_control(
			'table_event_text_color',
			[
				'label' 	=> __( 'Table Event Text Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .event-table__title a' => 'color: {{VALUE}}',
                ],
			]
        );
        
        $this->add_control(
			'table_event_text_hover_color',
			[
				'label' 	=> __( 'Table Event Text Hover Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .event-table__title a:hover' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'table_event_text_typography',
				'label' 	=> __( 'Table Event Text Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .event-table__title',
			]
		);
        
        $this->add_control(
			'table_event_topic_color',
			[
				'label' 	=> __( 'Table Event Topic Text Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .event-table__text' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'table_event_topic_typography',
				'label' 	=> __( 'Table Event Topic Text Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .event-table__text',
			]
		);
        
        $this->add_control(
			'table_event_author_color',
			[
				'label' 	=> __( 'Table Event Author Text Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .event-table__name' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'table_author_topic_typography',
				'label' 	=> __( 'Table Event Author Text Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .event-table__name',
			]
		);
        
        $this->add_control(
			'table_event_designation_color',
			[
				'label' 	=> __( 'Event Designation Text Color', 'wellnez' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .event-table__degi' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'table_designation_typography',
				'label' 	=> __( 'Event Designation Text Typography', 'wellnez' ),
                'selector' 	=> '{{WRAPPER}} .event-table__degi',
			]
		);
        
        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( ! empty( $settings['event_repeater'] ) ){
            echo '<div class="event-table">';
                echo '<div class="event-table__head">';
                    if( ! empty( $settings['event_date_text'] ) ){
                        echo '<div class="event-table__col">';
                            echo '<h3 class="event-table__coltitle">'.esc_html( $settings['event_date_text'] ).'</h3>';
                        echo '</div>';
                    }
                    if( ! empty( $settings['event_topic_text'] ) ){
                        echo '<div class="event-table__col">';
                            echo '<h3 class="event-table__coltitle">'.esc_html( $settings['event_topic_text'] ).'</h3>';
                        echo '</div>';
                    }
                    if( ! empty( $settings['event_author_text'] ) ){
                        echo '<div class="event-table__col">';
                            echo '<h3 class="event-table__coltitle">'.esc_html( $settings['event_author_text'] ).'</h3>';
                        echo '</div>';
                    }
                    if( ! empty( $settings['event_booking_text'] ) ){
                        echo '<div class="event-table__col">';
                            echo '<h3 class="event-table__coltitle">'.esc_html( $settings['event_booking_text'] ).'</h3>';
                        echo '</div>';
                    }
                echo '</div>';
                echo '<div class="event-table__body">';
                    foreach( $settings['event_repeater'] as $single_data ){
                        echo '<div class="event-table__item">';
                            if( ! empty( $single_data['event_date'] ) ){
                                echo '<div class="event-table__col">';
                                    echo '<span class="event-table__date">'.esc_html( $single_data['event_date'] ).'</span>';
                                echo '</div>';
                            }
                            echo '<div class="event-table__col">';
                                echo '<div class="event-table__media">';
                                    if( ! empty( $single_data['event_topic_image']['url'] ) ){
                                        echo '<div class="event-table__img">';
                                            echo wellnez_img_tag( array(
                                                'url'   => esc_url( $single_data['event_topic_image']['url'] ),
                                            ) );
                                        echo '</div>';
                                    }
                                    echo '<div class="media-body">';
                                        if( ! empty( $single_data['event_title'] ) ){
                                            echo '<h4 class="event-table__title">';
                                                echo '<a href="'.esc_url( $single_data['event_booing_url'] ).'">'.esc_html( $single_data['event_title'] ).'</a>';
                                            echo '</h4>';
                                        }
                                        if( ! empty( $single_data['event_topic'] ) ){
                                            echo '<p class="event-table__text">'.esc_html( $single_data['event_topic'] ).'</p>';
                                        }
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="event-table__col">';
                                echo '<div class="event-table__author">';
                                    if( ! empty( $single_data['event_author_image']['url'] ) ){
                                        echo '<div class="event-table__avater">';
                                            echo wellnez_img_tag( array(
                                                'url'   => esc_url( $single_data['event_author_image']['url'] ),
                                            ) );
                                        echo '</div>';
                                    }
                                    echo '<div class="media-body">';
                                        if( ! empty( $single_data['event_author_name'] ) ){
                                            echo '<h5 class="event-table__name">'.esc_html( $single_data['event_author_name'] ).'</h5>';
                                        }
                                        if( ! empty( $single_data['event_author_designation'] ) ){
                                            echo '<span class="event-table__degi">'.esc_html( $single_data['event_author_designation'] ).'</span>';
                                        }
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                            if( ! empty( $single_data['event_booing_button'] ) ){
                                echo '<div class="event-table__col">';
                                    echo '<a href="'.esc_url( $single_data['event_booing_url'] ).'" class="vs-btn style8 event-table__btn">'.esc_html( $single_data['event_booing_button'] ).'</a>';
                                echo '</div>';
                            }
                        echo '</div>';
                    }
                echo '</div>';
            echo '</div>';
        }
	}
}