<?php
/**
 *
 * @Packge      Wellnez
 * @Author      Vecuro
 * @version     1.0
 *
 */

/**
 * Enqueue style of child theme
 */
function wellnez_child_enqueue_styles() {

    wp_enqueue_style( 'wellnez-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'wellnez-child-style', get_stylesheet_directory_uri() . '/style.css',array( 'wellnez-style' ),wp_get_theme()->get('Version'));

}
add_action( 'wp_enqueue_scripts', 'wellnez_child_enqueue_styles', 100000 );

/*
 * Define Variables
 */
if (!defined('THEME_DIR'))
    define('THEME_DIR', get_template_directory());
if (!defined('THEME_URL'))
    define('THEME_URL', get_template_directory_uri());


/*
 * Include framework files
 */
foreach (glob(THEME_DIR.'-child' . "/includes/*.php") as $file_name) {
    require_once ( $file_name );
}
