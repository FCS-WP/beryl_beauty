<?php
/**
 * Plugin Name: Wellnez Helper
 * Description: This is a helper plugin of wellnez theme
 * Version:     1.2
 * Author:      Vecurosoft
 * Author URI:  http://vecurosoft.com/
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: /languages
 * Text Domain: mixlax
 */

 // Blocking direct access
if( ! defined( 'ABSPATH' ) ) {
    exit();
}

// Define Constant
define( 'MIXLAX_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'MIXLAX_PLUGIN_INC_PATH', plugin_dir_path( __FILE__ ) . 'inc/' );
define( 'MIXLAX_PLUGIN_CMB2EXT_PATH', plugin_dir_path( __FILE__ ) . 'cmb2-ext/' );
define( 'MIXLAX_PLUGIN_WIDGET_PATH', plugin_dir_path( __FILE__ ) . 'inc/widgets/' );
define( 'MIXLAX_PLUGDIRURI', plugin_dir_url( __FILE__ ) );
define( 'MIXLAX_ADDONS', plugin_dir_path( __FILE__ ) .'addons/' );
define( 'MIXLAX_CORE_PLUGIN_TEMP', plugin_dir_path( __FILE__ ) .'mixlax-template/' );

// load textdomain
load_plugin_textdomain( 'mixlax', false, basename( dirname( __FILE__ ) ) . '/languages' );

//include file.
require_once MIXLAX_PLUGIN_INC_PATH .'mixlaxcore-functions.php';
require_once MIXLAX_PLUGIN_INC_PATH .'mixlaxajax.php';

//Widget
require_once MIXLAX_PLUGIN_WIDGET_PATH . 'recent-post-widget.php';
require_once MIXLAX_PLUGIN_WIDGET_PATH . 'contact-info-widget.php';
require_once MIXLAX_PLUGIN_WIDGET_PATH . 'social-widget.php';
require_once MIXLAX_PLUGIN_WIDGET_PATH . 'gallery-widget.php';
require_once MIXLAX_PLUGIN_WIDGET_PATH . 'about-me-widget.php';

//addons
require_once MIXLAX_ADDONS . 'addons.php';