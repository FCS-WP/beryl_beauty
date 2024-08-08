<?php
/**
 * @Packge     : Wellnez
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://www.vecurosoft.com/
 *
 */

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

/**
 * Admin Custom Login Logo
 */
function wellnez_custom_login_logo() {
  $logo = ! empty( wellnez_opt( 'wellnez_admin_login_logo', 'url' ) ) ? wellnez_opt( 'wellnez_admin_login_logo', 'url' ) : '' ;
  if( isset( $logo ) && !empty( $logo ) )
      echo '<style type="text/css">body.login div#login h1 a { background-image:url('.esc_url( $logo ).'); }</style>';
}
add_action( 'login_enqueue_scripts', 'wellnez_custom_login_logo' );

/**
* Admin Custom css
*/

add_action( 'admin_enqueue_scripts', 'wellnez_admin_styles' );

function wellnez_admin_styles() {
  // $wellnez_admin_custom_css = ! empty( wellnez_opt( 'wellnez_theme_admin_custom_css' ) ) ? wellnez_opt( 'wellnez_theme_admin_custom_css' ) : '';
  if ( ! empty( $wellnez_admin_custom_css ) ) {
      $wellnez_admin_custom_css = str_replace(array("\r\n", "\r", "\n", "\t", '    '), '', $wellnez_admin_custom_css);
      echo '<style rel="stylesheet" id="wellnez-admin-custom-css" >';
              echo esc_html( $wellnez_admin_custom_css );
      echo '</style>';
  }
}

 // share button code
 function wellnez_social_sharing_buttons( ) {

  // Get page URL
  $URL = get_permalink();
  $Sitetitle = get_bloginfo('name');

  // Get page title
  $Title = str_replace( ' ', '%20', get_the_title());


  // Construct sharing URL without using any script

  $twitterURL = 'https://twitter.com/share?text='.esc_html( $Title ).'&url='.esc_url( $URL );
  $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.esc_url( $URL );
  $pinteresturl = 'http://pinterest.com/pin/create/link/?url='.esc_url( $URL ).'&media='.esc_url(get_the_post_thumbnail_url()).'&description='.wp_kses_post(get_the_title());
  $linkedin = 'https://www.linkedin.com/shareArticle?mini=true&url='.esc_url( $URL ).'&title='.esc_html( $Title );


  // Add sharing button at the end of page/page content
$content = '';

  $content .= '<li><a class="facebook" href="'.esc_url( $facebookURL ).'" target="_blank"><i class="fab fa-facebook-f"></i></a></li>';
  $content .= '<li><a class="twitter" href="'. esc_url( $twitterURL ) .'" target="_blank"><i class="fab fa-twitter"></i></a></li>';
  $content .= '<li><a class="instagram" href="'.esc_url( $pinteresturl ).'" target="_blank"><i class="fab fa-pinterest"></i></a></li>';
  $content .= '<li><a class="linkedin" href="'.esc_url( $linkedin ).'" target="_blank"><i class="fab fa-linkedin"></i></a></li>';
  return $content;
};

//add SVG to allowed file uploads
function wellnez_mime_types( $mimes ) {
  $mimes['svg'] = 'image/svg+xml';
  $mimes['svgz'] = 'image/svgz+xml';
  $mimes['exe'] = 'program/exe';
  $mimes['dwg'] = 'image/vnd.dwg';
  return $mimes;
}
add_filter('upload_mimes', 'wellnez_mime_types');

function wellnez_wp_check_filetype_and_ext( $data, $file, $filename, $mimes ) {
    $wp_filetype = wp_check_filetype( $filename, $mimes );
    $ext         = $wp_filetype['ext'];
    $type        = $wp_filetype['type'];
    $proper_filename = $data['proper_filename'];

    return compact( 'ext', 'type', 'proper_filename' );
}
add_filter('wp_check_filetype_and_ext','wellnez_wp_check_filetype_and_ext',10,4);

if( ! function_exists('wellnez_get_user_role_name') ){
    function wellnez_get_user_role_name( $user_ID ){
        global $wp_roles;

        $user_data      = get_userdata( $user_ID );
        $user_role_slug = $user_data->roles[0];
        return translate_user_role( $wp_roles->roles[$user_role_slug]['name'] );
    }
}
add_filter('wpcf7_autop_or_not', '__return_false');
add_image_size( 'blog-sidebar-size',100,100,true );
add_image_size( 'home-slider-blog-image',387,320,true );
add_image_size( 'home-slider-blog-image-three',387,250,true );
add_image_size( 'home-slider-blog-image-four',314,228,true );
add_image_size( 'home-slider-blog-image-five',370,424,true );
add_image_size( 'wellnez-related-post-size',270,314,true );



/**
* Enqueue block editor JavaScript and CSS
*/
function wellnez_widget_editor_scripts() {

  // Make paths variables so we don't write em twice 
  // $blockPath = '../assets/js/blocks.js';

  
  // Enqueue the bundled block JS file
  wp_enqueue_script(
      'wellnez-blocks-js', WELLNEZ_PLUGDIRURI . 'assets/js/blocks.js',
      [  'wp-blocks', 'wp-element', 'wp-components', 'wp-i18n' ],
      '1.00',
      true
  );

}
// Hook scripts function into block editor hook
add_action( 'enqueue_block_editor_assets', 'wellnez_widget_editor_scripts' );