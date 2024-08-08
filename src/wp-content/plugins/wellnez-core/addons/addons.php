<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Wellnez Core Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class Wellnez_Extension {

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

        // category register
		add_action( 'elementor/elements/categories_registered',[ $this, 'wellnez_elementor_widget_categories' ] );

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
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'wellnez' ),
			'<strong>' . esc_html__( 'Wellnez Core', 'wellnez' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'wellnez' ) . '</strong>'
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
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'wellnez' ),
			'<strong>' . esc_html__( 'Wellnez Core', 'wellnez' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'wellnez' ) . '</strong>',
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
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'wellnez' ),
			'<strong>' . esc_html__( 'Wellnez Core', 'wellnez' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'wellnez' ) . '</strong>',
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
		require_once( WELLNEZ_ADDONS . '/widgets/section-title.php' );
		require_once( WELLNEZ_ADDONS . '/widgets/blog-post.php' );
		require_once( WELLNEZ_ADDONS . '/widgets/button.php' );
		require_once( WELLNEZ_ADDONS . '/widgets/testimonial-slider.php' );
		require_once( WELLNEZ_ADDONS . '/widgets/team-member.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/dual-heading.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/hero-home-one.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/hero-home-two.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-counter.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-service-slider.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-faq.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-faq-area.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-service-box.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-image-box.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-progress-bar.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-work-process.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-project-slider.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-pricing-table.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-tab-builder.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-projects-filter.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-about-us.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-event.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-testimonial-area.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-project-filter.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-pricing-box.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-skill-about.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-list-icon.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-info-list.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-about.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-gallery-slider.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-service-section.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/shape-animation.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-image-slider.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/category-image-slider.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/hero-home-three.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/product-banner.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/image-card.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/video-box.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/service-list.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-video-area.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/testimonial-slider-two.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-instagram-slider.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-cta.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/wellnez-package-list.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/testimonila-slider-three.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/image-about-image.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/media-box.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/schedule-box.php' );
	 	require_once( WELLNEZ_ADDONS . '/widgets/testimonila-slider-four.php' );

		// Header Elements
		require_once( WELLNEZ_ADDONS . '/header/wellnez-megamenu.php' );
		require_once( WELLNEZ_ADDONS . '/header/wellnez-search.php' );
		require_once( WELLNEZ_ADDONS . '/header/wellnez-mobile-menu.php' );
		require_once( WELLNEZ_ADDONS . '/header/wellnez-offcanvas.php' );
		require_once( WELLNEZ_ADDONS . '/header/wellnez-language-switcher.php' );
		require_once( WELLNEZ_ADDONS . '/header/wellnez-new-header.php' );
		require_once( WELLNEZ_ADDONS . '/header/wellnez-logo.php' );

		// Footer Elements
		require_once( WELLNEZ_ADDONS . '/footer-widgets/newsletter-widget.php' );
		require_once( WELLNEZ_ADDONS . '/footer-widgets/wellnez-gallery.php' );

		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Section_Title_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Blog_Post() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Button() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Testimonial_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Team_Member() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Dual_Heading() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Counter() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Service_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Faq() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Faq_Area() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Service_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Image_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Progress_Bar() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Work_Process() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Project_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Pricing_Table() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Tab_Builder() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Project_Filter() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_About_Us_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Event() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Testimonial_Area() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Project_Filter_Two() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Pricing_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Skill_About() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_List_group() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_List_Info() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Hero_One() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Hero_Two() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_About() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Gallery_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Service_Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Animation_Image() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Image_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Category_Image_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Hero_Three() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Product_Banner() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Image_Card() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Video_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Service_List() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Video_Area() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Testimonial_Slider_Two() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Instagram_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Cta_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Package_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Testimonial_Slider_Three() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_AboutImage() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_MediaBox() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_ScheduleBox() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Testimonial_Slider_Four() );
		



		// Header Widget Register
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Megamenu() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Search() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Mobilemenu() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Offcanvas() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Language_Switcher() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_New_Header() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Site_Logo() );

		// Footer Widget Register
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Newsletter_Widgets() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wellnez_Gallery_Image() );

	}

    public function widget_scripts() {
        wp_enqueue_script(
            'wellnez-frontend-script',
            WELLNEZ_PLUGDIRURI . 'assets/js/wellnez-frontend.js',
            array('jquery'),
            false,
            true
		);

		wp_enqueue_style(
            'wellnez-widget-style',
            WELLNEZ_PLUGDIRURI . 'assets/css/style.css',
			microtime()
		);
	}

    function wellnez_elementor_widget_categories( $elements_manager ) {
        $elements_manager->add_category(
            'wellnez',
            [
                'title' => __( 'Wellnez', 'wellnez' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );
        $elements_manager->add_category(
            'wellnez_footer_elements',
            [
                'title' => __( 'Wellnez Footer Elements', 'wellnez' ),
                'icon' 	=> 'fa fa-plug',
            ]
		);

		$elements_manager->add_category(
            'wellnez_header_elements',
            [
                'title' => __( 'Wellnez Header Elements', 'wellnez' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );

	}

}

Wellnez_Extension::instance();