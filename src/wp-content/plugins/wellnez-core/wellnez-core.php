<?php
/**
 * Plugin Name: Wellnez Core
 * Description: This is a helper plugin of wellnez theme
 * Version:     2.1.3
 * Author:      Vecurosoft
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: /languages
 * Text Domain: wellnez
 */
 // Blocking direct access
if( ! defined( 'ABSPATH' ) ) {
    exit();
}

// Define Constant
define( 'WELLNEZ_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'WELLNEZ_PLUGIN_INC_PATH', plugin_dir_path( __FILE__ ) . 'inc/' );
define( 'WELLNEZ_PLUGIN_CMB2EXT_PATH', plugin_dir_path( __FILE__ ) . 'cmb2-ext/' );
define( 'WELLNEZ_PLUGIN_WIDGET_PATH', plugin_dir_path( __FILE__ ) . 'inc/widgets/' );
define( 'WELLNEZ_PLUGDIRURI', plugin_dir_url( __FILE__ ) );
define( 'WELLNEZ_ADDONS', plugin_dir_path( __FILE__ ) .'addons/' );
define( 'WELLNEZ_CORE_PLUGIN_TEMP', plugin_dir_path( __FILE__ ) .'wellnez-template/' );

// load textdomain
load_plugin_textdomain( 'wellnez', false, basename( dirname( __FILE__ ) ) . '/languages' );

//include file.
require_once WELLNEZ_PLUGIN_INC_PATH .'wellnezcore-functions.php';
require_once WELLNEZ_PLUGIN_INC_PATH . 'MCAPI.class.php';
require_once WELLNEZ_PLUGIN_INC_PATH .'wellnezajax.php';
require_once WELLNEZ_PLUGIN_INC_PATH .'builder/builder.php';

require_once WELLNEZ_PLUGIN_CMB2EXT_PATH . 'cmb2ext-init.php';

//Widget
require_once WELLNEZ_PLUGIN_WIDGET_PATH . 'recent-post-widget.php';
require_once WELLNEZ_PLUGIN_WIDGET_PATH . 'social-widget.php';
require_once WELLNEZ_PLUGIN_WIDGET_PATH . 'about-us-widget.php';
require_once WELLNEZ_PLUGIN_WIDGET_PATH . 'about-me-widget.php';
require_once WELLNEZ_PLUGIN_WIDGET_PATH . 'newsletter-widget.php';
// require_once WELLNEZ_PLUGIN_WIDGET_PATH . 'footer-map.php';

//addons
require_once WELLNEZ_ADDONS . 'addons.php';