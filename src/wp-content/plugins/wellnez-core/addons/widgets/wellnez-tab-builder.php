<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Tab Builder Widget .
 *
 */
class Wellnez_Tab_Builder extends Widget_Base {

	public function get_name() {
		return 'wellneztabbuilder';
	}

	public function get_title() {
		return __( 'Tab Builder', 'wellnez' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	protected function register_controls() {

		$this->start_controls_section(
			'tab_builder_title_section',
			[
				'label' 	=> __( 'Tab Builder', 'wellnez' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'tab_style',
			[
				'label' 	=> __( 'Tab Button Style', 'wellnez' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    '1'   		=> __( 'Style One', 'wellnez' ),
                    '2'   		=> __( 'Style Two', 'wellnez' ),
                ],
                'default'  	=> '1'
			]
        );

		$repeater = new Repeater();

        $repeater->add_control(
            'tab_builder_title_image',
            [
                'label'     => __( 'Tab Builder Image', 'wellnez' ),
                'type'      => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
			'tab_builder_title_title',
			[
				'label' 	=> __( 'Tab Builder Title', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Digital Marketing', 'wellnez' )
			]
        );

        $repeater->add_control(
			'tab_builder_title_subtitle',
			[
				'label' 	=> __( 'Tab Builder SubTitle', 'wellnez' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( '259 Jobs Done', 'wellnez' )
			]
        );

		$repeater->add_control(
			'wellnez_tab_builder_title_option',
			[
				'label'     => __( 'Select Data', 'wellnez' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options'   => $this->wellnez_tab_builder_title_choose_option(),
				'default'	=> ''
			]
		);

		$this->add_control(
			'tab_builder_title_repeater',
			[
				'label' 		=> __( 'Tab', 'wellnez' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'tab_builder_title_title'       => __( 'Digital Marketing', 'wellnez' ),
						'tab_builder_subtitle'    		=> __( '259 Jobs Done', 'wellnez' ),
					],
					[
						'tab_builder_title_title'       => __( 'Web Development', 'wellnez' ),
						'tab_builder_subtitle'    		=> __( '403 Jobs Done', 'wellnez' ),
					],
					[
						'tab_builder_title_title'       => __( 'Machine Learning', 'wellnez' ),
						'tab_builder_subtitle'    		=> __( '105 Jobs Done', 'wellnez' ),
					],
					[
						'tab_builder_title_title'       => __( 'Software Services', 'wellnez' ),
						'tab_builder_subtitle'    		=> __( '1259 Jobs Done', 'wellnez' ),
					],
				],
				'title_field' 	=> '{{{ tab_builder_title_title }}}',
			]
		);

        $this->end_controls_section();


    }

	public function wellnez_tab_builder_title_choose_option(){

		$wellnez_post_query = new WP_Query( array(
			'post_type'				=> 'wellnez_tab_build',
			'posts_per_page'	    => -1,
		) );

		$wellnez_tab_builder_title_title = array();
		$wellnez_tab_builder_title_title[''] = __( 'Select a Title','Wellnez');

		while( $wellnez_post_query->have_posts() ) {
			$wellnez_post_query->the_post();
			$wellnez_tab_builder_title_title[ get_the_ID() ] =  get_the_title();
		}
		wp_reset_postdata();

		return $wellnez_tab_builder_title_title;

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( $settings['tab_style'] == '1' ){
			$tab_class = 'service-tab-menu';
		}else{
			$tab_class = 'contact-tab-menu';
		}

		echo '<div class="tab-builder">';
			echo '<div class="nav '.esc_attr( $tab_class ).'" id="nav-tabservice" role="tablist">';
				$x = 0;
				foreach( $settings['tab_builder_title_repeater'] as $single_menu ){
					if( $x == 0 ){
						$active = 'active';
						$area   = 'true';
					}else{
						$active = '';
						$area   = 'false';
					}
	                echo '<button class="nav-link '.esc_attr( $active ).'" id="nav-digitalmarketing-tab'.$x.'" data-bs-toggle="tab" data-bs-target="#nav-digitalmarketing'.$x.'" type="button" role="tab" aria-controls="nav-digitalmarketing'.$x.'" aria-selected="'.esc_attr( $area ).'">';
						if( ! empty( $single_menu['tab_builder_title_image']['url'] ) ){
							echo '<span class="btn-img">';
								echo wellnez_img_tag( array(
									'url'	=> esc_url( $single_menu['tab_builder_title_image']['url'] )
								) );
							echo '</span>';
						}
						if( ! empty( $single_menu['tab_builder_title_title'] ) ){
		                    echo '<span class="btn-title h6">'.esc_html( $single_menu['tab_builder_title_title'] ).'</span>';
						}
						if( ! empty( $single_menu['tab_builder_title_subtitle'] ) ){
		                    echo '<span class="btn-text">'.esc_html( $single_menu['tab_builder_title_subtitle'] ).'</span>';
						}
	                echo '</button>';
				$x++;
				}
            echo '</div>';
			echo '<div class="tab-content" id="nav-tabserviceContent">';
				$x = 0;
				foreach( $settings['tab_builder_title_repeater'] as $single_menu ){
					if( $x == 0 ){
						$active = 'active';
					}else{
						$active = '';
					}
					$elementor = \Elementor\Plugin::instance();
					if( ! empty( $single_menu['wellnez_tab_builder_title_option'] ) ){
						echo '<div class="tab-pane fade show '.esc_attr( $active ).'" id="nav-digitalmarketing'.$x.'" role="tabpanel" aria-labelledby="nav-digitalmarketing-tab'.$x.'">';
		                    echo $elementor->frontend->get_builder_content_for_display( $single_menu['wellnez_tab_builder_title_option'] );
		                echo '</div>';
					}
				$x++;
				}
			echo '</div>';
		echo '</div>';
	}

}