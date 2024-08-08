<?php
    /**
     * Class For Builder
     */
    class WellnezBuilder{

        function __construct(){
            // register admin menus
        	add_action( 'admin_menu', [$this, 'register_settings_menus'] );

            // Custom Footer Builder With Post Type
			add_action( 'init',[ $this,'post_type' ],0 );

 		    add_action( 'elementor/frontend/after_enqueue_scripts', [ $this,'widget_scripts'] );

			add_filter( 'single_template', [ $this, 'load_canvas_template' ] );

            add_action( 'elementor/element/wp-page/document_settings/after_section_end', [ $this,'wellnez_add_elementor_page_settings_controls' ],10,2 );

		}

		public function widget_scripts( ) {
			wp_enqueue_script( 'wellnez-core',WELLNEZ_PLUGDIRURI.'assets/js/wellnez-core.js',array( 'jquery' ),'1.0',true );
		}


        public function wellnez_add_elementor_page_settings_controls( \Elementor\Core\DocumentTypes\Page $page ){

			$page->start_controls_section(
                'wellnez_header_option',
                [
                    'label'     => __( 'Header Option', 'wellnez' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );


            $page->add_control(
                'wellnez_header_style',
                [
                    'label'     => __( 'Header Option', 'wellnez' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'wellnez' ),
    					'header_builder'       => __( 'Header Builder', 'wellnez' ),
    				],
                    'default'   => 'prebuilt',
                ]
			);

            $page->add_control(
                'wellnez_header_builder_option',
                [
                    'label'     => __( 'Header Name', 'wellnez' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->wellnez_header_choose_option(),
                    'condition' => [ 'wellnez_header_style' => 'header_builder'],
                    'default'	=> ''
                ]
            );

            $page->end_controls_section();

            $page->start_controls_section(
                'wellnez_footer_option',
                [
                    'label'     => __( 'Footer Option', 'wellnez' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );
            $page->add_control(
    			'wellnez_footer_choice',
    			[
    				'label'         => __( 'Enable Footer?', 'wellnez' ),
    				'type'          => \Elementor\Controls_Manager::SWITCHER,
    				'label_on'      => __( 'Yes', 'wellnez' ),
    				'label_off'     => __( 'No', 'wellnez' ),
    				'return_value'  => 'yes',
    				'default'       => 'yes',
    			]
    		);
            $page->add_control(
                'wellnez_footer_style',
                [
                    'label'     => __( 'Footer Style', 'wellnez' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'wellnez' ),
    					'footer_builder'       => __( 'Footer Builder', 'wellnez' ),
    				],
                    'default'   => 'prebuilt',
                    'condition' => [ 'wellnez_footer_choice' => 'yes' ],
                ]
            );
            $page->add_control(
                'wellnez_footer_builder_option',
                [
                    'label'     => __( 'Footer Name', 'wellnez' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->wellnez_footer_choose_option(),
                    'condition' => [ 'wellnez_footer_style' => 'footer_builder','wellnez_footer_choice' => 'yes' ],
                    'default'	=> ''
                ]
            );

			$page->end_controls_section();

        }

		public function register_settings_menus(){
			add_menu_page(
				esc_html__( 'Wellnez Builder', 'wellnez' ),
            	esc_html__( 'Wellnez Builder', 'wellnez' ),
				'manage_options',
				'wellnez',
				[$this,'register_settings_contents__settings'],
				'dashicons-admin-site',
				2
			);

			add_submenu_page('wellnez', esc_html__('Footer Builder', 'wellnez'), esc_html__('Footer Builder', 'wellnez'), 'manage_options', 'edit.php?post_type=wellnez_footer');
			add_submenu_page('wellnez', esc_html__('Header Builder', 'wellnez'), esc_html__('Header Builder', 'wellnez'), 'manage_options', 'edit.php?post_type=wellnez_header');
			add_submenu_page('wellnez', esc_html__('Tab Builder', 'wellnez'), esc_html__('Tab Builder', 'wellnez'), 'manage_options', 'edit.php?post_type=wellnez_tab_build');
		}

		// Callback Function
		public function register_settings_contents__settings(){
            echo '<h2>';
			    echo esc_html__( 'Welcome To Header And Footer Builder Of This Theme','wellnez' );
            echo '</h2>';
		}

		public function post_type() {

			$labels = array(
				'name'               => __( 'Footer', 'wellnez' ),
				'singular_name'      => __( 'Footer', 'wellnez' ),
				'menu_name'          => __( 'Wellnez Footer Builder', 'wellnez' ),
				'name_admin_bar'     => __( 'Footer', 'wellnez' ),
				'add_new'            => __( 'Add New', 'wellnez' ),
				'add_new_item'       => __( 'Add New Footer', 'wellnez' ),
				'new_item'           => __( 'New Footer', 'wellnez' ),
				'edit_item'          => __( 'Edit Footer', 'wellnez' ),
				'view_item'          => __( 'View Footer', 'wellnez' ),
				'all_items'          => __( 'All Footer', 'wellnez' ),
				'search_items'       => __( 'Search Footer', 'wellnez' ),
				'parent_item_colon'  => __( 'Parent Footer:', 'wellnez' ),
				'not_found'          => __( 'No Footer found.', 'wellnez' ),
				'not_found_in_trash' => __( 'No Footer found in Trash.', 'wellnez' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'wellnez_footer', $args );

			$labels = array(
				'name'               => __( 'Header', 'wellnez' ),
				'singular_name'      => __( 'Header', 'wellnez' ),
				'menu_name'          => __( 'Wellnez Header Builder', 'wellnez' ),
				'name_admin_bar'     => __( 'Header', 'wellnez' ),
				'add_new'            => __( 'Add New', 'wellnez' ),
				'add_new_item'       => __( 'Add New Header', 'wellnez' ),
				'new_item'           => __( 'New Header', 'wellnez' ),
				'edit_item'          => __( 'Edit Header', 'wellnez' ),
				'view_item'          => __( 'View Header', 'wellnez' ),
				'all_items'          => __( 'All Header', 'wellnez' ),
				'search_items'       => __( 'Search Header', 'wellnez' ),
				'parent_item_colon'  => __( 'Parent Header:', 'wellnez' ),
				'not_found'          => __( 'No Header found.', 'wellnez' ),
				'not_found_in_trash' => __( 'No Header found in Trash.', 'wellnez' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'wellnez_header', $args );

            $labels = array(
				'name'               => __( 'Tab Builder', 'wellnez' ),
				'singular_name'      => __( 'Tab Builder', 'wellnez' ),
				'menu_name'          => __( 'Foodelio Tab Builder', 'wellnez' ),
				'name_admin_bar'     => __( 'Tab Builder', 'wellnez' ),
				'add_new'            => __( 'Add New', 'wellnez' ),
				'add_new_item'       => __( 'Add New Tab Builder', 'wellnez' ),
				'new_item'           => __( 'New Tab Builder', 'wellnez' ),
				'edit_item'          => __( 'Edit Tab Builder', 'wellnez' ),
				'view_item'          => __( 'View Tab Builder', 'wellnez' ),
				'all_items'          => __( 'All Tab Builder', 'wellnez' ),
				'search_items'       => __( 'Search Tab Builder', 'wellnez' ),
				'parent_item_colon'  => __( 'Parent Tab Builder:', 'wellnez' ),
				'not_found'          => __( 'No Tab Builder found.', 'wellnez' ),
				'not_found_in_trash' => __( 'No Tab Builder found in Trash.', 'wellnez' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'wellnez_tab_build', $args );

		}

		function load_canvas_template( $single_template ) {

			global $post;

			if ( 'wellnez_footer' == $post->post_type || 'wellnez_header' == $post->post_type || 'wellnez_tab_build' == $post->post_type ) {

				$elementor_2_0_canvas = ELEMENTOR_PATH . '/modules/page-templates/templates/canvas.php';

				if ( file_exists( $elementor_2_0_canvas ) ) {
					return $elementor_2_0_canvas;
				} else {
					return ELEMENTOR_PATH . '/includes/page-templates/canvas.php';
				}
			}

			return $single_template;
		}

        public function wellnez_footer_choose_option(){

			$wellnez_post_query = new WP_Query( array(
				'post_type'			=> 'wellnez_footer',
				'posts_per_page'	    => -1,
			) );

			$wellnez_builder_post_title = array();
			$wellnez_builder_post_title[''] = __('Select a Footer','Wellnez');

			while( $wellnez_post_query->have_posts() ) {
				$wellnez_post_query->the_post();
				$wellnez_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $wellnez_builder_post_title;

		}

		public function wellnez_header_choose_option(){

			$wellnez_post_query = new WP_Query( array(
				'post_type'			=> 'wellnez_header',
				'posts_per_page'	    => -1,
			) );

			$wellnez_builder_post_title = array();
			$wellnez_builder_post_title[''] = __('Select a Header','Wellnez');

			while( $wellnez_post_query->have_posts() ) {
				$wellnez_post_query->the_post();
				$wellnez_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $wellnez_builder_post_title;

        }

    }

    $builder_execute = new WellnezBuilder();