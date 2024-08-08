<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Mixlax Core Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class Mixlax_Extension {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Elementor_Test_Extension The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Elementor_Test_Extension An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}


	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );

        // Register widget scripts
		add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ]);

		// Specific Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'mixlax_regsiter_widget_scripts' ] );

        // category register
		add_action( 'elementor/elements/categories_registered',[ $this, 'mixlax_elementor_widget_categories' ] );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'mixlax' ),
			'<strong>' . esc_html__( 'Mixlax Core', 'mixlax' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'mixlax' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'mixlax' ),
			'<strong>' . esc_html__( 'Mixlax Core', 'mixlax' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'mixlax' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'mixlax' ),
			'<strong>' . esc_html__( 'Mixlax Core', 'mixlax' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'mixlax' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() {

		// Include Widget files
		require_once( MIXLAX_ADDONS . '/widgets/section-title.php' );
		require_once( MIXLAX_ADDONS . '/widgets/about-us-image.php' );
		require_once( MIXLAX_ADDONS . '/widgets/blog-post.php' );
		require_once( MIXLAX_ADDONS . '/widgets/client-logo.php' );
		require_once( MIXLAX_ADDONS . '/widgets/button.php' );
		require_once( MIXLAX_ADDONS . '/widgets/contact-slider.php' );
		require_once( MIXLAX_ADDONS . '/widgets/testimonial-slider.php' );
		require_once( MIXLAX_ADDONS . '/widgets/team-member.php' );
	 	require_once( MIXLAX_ADDONS . '/widgets/mixlax-faq.php' );
	 	require_once( MIXLAX_ADDONS . '/widgets/mixlax-newsletter.php' );
	 	require_once( MIXLAX_ADDONS . '/widgets/skill-bar.php' );
	 	require_once( MIXLAX_ADDONS . '/widgets/mixlax-pricing-table.php' );
	 	require_once( MIXLAX_ADDONS . '/widgets/mixlax-counterup.php' );
	 	require_once( MIXLAX_ADDONS . '/widgets/mixlax-project.php' );
	 	require_once( MIXLAX_ADDONS . '/widgets/animation-image.php' );
	 	require_once( MIXLAX_ADDONS . '/widgets/image.php' );
	 	require_once( MIXLAX_ADDONS . '/widgets/about-us-counter-box.php' );
	 	require_once( MIXLAX_ADDONS . '/widgets/service-slider.php' );
	 	require_once( MIXLAX_ADDONS . '/widgets/mixlax-service.php' );
	 	require_once( MIXLAX_ADDONS . '/widgets/mixlax-tab.php' );
	 	require_once( MIXLAX_ADDONS . '/widgets/mixlax-separator.php' );
	 	require_once( MIXLAX_ADDONS . '/widgets/mixlax-feature.php' );
	 	require_once( MIXLAX_ADDONS . '/widgets/mixlax-gallery.php' );
	 	require_once( MIXLAX_ADDONS . '/widgets/mixlax-pricing-slider.php' );
	 	require_once( MIXLAX_ADDONS . '/widgets/mixlax-feature-image.php' );
	 	require_once( MIXLAX_ADDONS . '/widgets/mixlax-pricing-tab.php' );
	 	require_once( MIXLAX_ADDONS . '/widgets/pagination-layout.php' );
	 	require_once( MIXLAX_ADDONS . '/widgets/feature-slider.php' );
	 	require_once( MIXLAX_ADDONS . '/widgets/project-details-meta.php' );
	 	require_once( MIXLAX_ADDONS . '/widgets/project-next-prev.php' );

		// Header Elements
		require_once( MIXLAX_ADDONS . '/header/header.php' );

		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Section_Title_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_About_Us_Image() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Blog_Post() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Client_Logo() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Button() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Contact_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Testimonial_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Team_Member() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Faq() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Newsletter() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Skill_Bar() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Pricing_Table() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Counterup() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Project() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Animation_Image() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Image() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Aboutus_Counter_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Service_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Service() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Tab_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Separator_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Feature() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Gallery() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Pricing_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Feature_Image() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Pricing_Tab() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Pagination_Layout() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Feature_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Project_Details_Meta() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Project_Next_Prev() );

		// Header Widget Register
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Mixlax_Header() );


	}

    public function widget_scripts() {
        wp_enqueue_script(
            'mixlax-frontend-script',
            MIXLAX_PLUGDIRURI . 'assets/js/mixlax-frontend.js',
            array('jquery'),
            false,
            true
		);
	}

	public function mixlax_regsiter_widget_scripts( ) {

		wp_register_script(
            'counter-up',
            MIXLAX_PLUGDIRURI . 'assets/js/jquery.counterup.min.js',
            array('jquery'),
            '1.0',
            true
		);

		wp_register_script(
            'imagesloaded',
            MIXLAX_PLUGDIRURI . 'assets/js/imagesloaded.pkgd.min.js',
            array('jquery'),
            '1.0',
            true
		);

		wp_register_script(
            'isotope',
            MIXLAX_PLUGDIRURI . 'assets/js/isotope.pkgd.min.js',
            array('jquery'),
            '1.0',
            true
		);


	}

    function mixlax_elementor_widget_categories( $elements_manager ) {
        $elements_manager->add_category(
            'mixlax',
            [
                'title' => __( 'Wellnez Helper', 'mixlax' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );
        $elements_manager->add_category(
            'mixlax_footer_elements',
            [
                'title' => __( 'Wellnez Footer Elements', 'mixlax' ),
                'icon' 	=> 'fa fa-plug',
            ]
		);

		$elements_manager->add_category(
            'mixlax_header_elements',
            [
                'title' => __( 'Wellnez Header Elements', 'mixlax' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );

	}

}

Mixlax_Extension::instance();