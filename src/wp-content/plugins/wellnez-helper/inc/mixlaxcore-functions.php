<?php
/**
 * @Packge     : Mixlax
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
function mixlax_custom_login_logo() {
    $logo = ! empty( wellnez_opt( 'mixlax_admin_login_logo', 'url' ) ) ? wellnez_opt( 'mixlax_admin_login_logo', 'url' ) : '' ;
    if( isset( $logo ) && ! empty( $logo ) ){
        echo '<style type="text/css">body.login div#login h1 a { background-image:url('.esc_url( $logo ).'); }</style>';
    }
}
add_action( 'login_enqueue_scripts', 'mixlax_custom_login_logo' );

/**
* Admin Custom css
*/

add_action( 'admin_enqueue_scripts', 'mixlax_admin_styles' );

function mixlax_admin_styles() {
  // $mixlax_admin_custom_css = ! empty( wellnez_opt( 'mixlax_theme_admin_custom_css' ) ) ? wellnez_opt( 'mixlax_theme_admin_custom_css' ) : '';
  if ( ! empty( $mixlax_admin_custom_css ) ) {
        $mixlax_admin_custom_css = str_replace(array("\r\n", "\r", "\n", "\t", '    '), '', $mixlax_admin_custom_css);
        echo '<style rel="stylesheet" id="mixlax-admin-custom-css" >';
            echo esc_html( $mixlax_admin_custom_css );
        echo '</style>';
    }
}

 // share button code
 function mixlax_social_sharing_buttons( ) {

     // Get page URL
    $URL        = get_permalink();
    $Sitetitle  = get_bloginfo('name');

    // Get page title
    $Title  = str_replace( ' ', '%20', get_the_title());

    // Construct sharing URL without using any script
    $twitterURL     = 'https://twitter.com/share?text='.esc_html( $Title ).'&url='.esc_url( $URL );
    $facebookURL    = 'https://www.facebook.com/sharer/sharer.php?u='.esc_url( $URL );
    $pinteresturl   = 'http://pinterest.com/pin/create/link/?url='.esc_url( $URL ).'&media='.esc_url(get_the_post_thumbnail_url()).'&description='.wp_kses_post(get_the_title());
    $linkedin       = 'https://www.linkedin.com/shareArticle?mini=true&url='.esc_url( $URL ).'&title='.esc_html( $Title );

    // Add sharing button at the end of page/page content
    $content = '';

    $content .= '<li><a class="facebook" href="'.esc_url( $facebookURL ).'" target="_blank"><i class="fab fa-facebook"></i></a></li>';
    $content .= '<li><a class="twitter" href="'. esc_url( $twitterURL ) .'" target="_blank"><i class="fab fa-twitter"></i></a></li>';
    $content .= '<li><a class="pinterest" href="'.esc_url( $pinteresturl ).'" target="_blank"><i class="fab fa-pinterest"></i></a></li>';
    $content .= '<li><a class="linkedin" href="'.esc_url( $linkedin ).'" target="_blank"><i class="fab fa-linkedin"></i></a></li>';
    return $content;
};

//add SVG to allowed file uploads
function mixlax_mime_types( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svgz+xml';
    $mimes['exe'] = 'program/exe';
    $mimes['dwg'] = 'image/vnd.dwg';
    return $mimes;
}
add_filter('upload_mimes', 'mixlax_mime_types');

function mixlax_wp_check_filetype_and_ext( $data, $file, $filename, $mimes ) {
    $wp_filetype = wp_check_filetype( $filename, $mimes );
    $ext         = $wp_filetype['ext'];
    $type        = $wp_filetype['type'];
    $proper_filename = $data['proper_filename'];

    return compact( 'ext', 'type', 'proper_filename' );
}
add_filter( 'wp_check_filetype_and_ext', 'mixlax_wp_check_filetype_and_ext', 10, 4 );



// Project Post Type
add_action( 'init','mixlax_project', 0 );

function mixlax_project(){
    $labels = array(
        'name'               => esc_html__( 'Projects', 'post Category general name', 'mixlax' ),
        'singular_name'      => esc_html__( 'Project', 'post Category singular name', 'mixlax' ),
        'menu_name'          => esc_html__( 'Projects', 'admin menu', 'mixlax' ),
        'name_admin_bar'     => esc_html__( 'Project', 'add new on admin bar', 'mixlax' ),
        'add_new'            => esc_html__( 'Add New', 'Project', 'mixlax' ),
        'add_new_item'       => esc_html__( 'Add New Project', 'mixlax' ),
        'new_item'           => esc_html__( 'New Project', 'mixlax' ),
        'edit_item'          => esc_html__( 'Edit Project', 'mixlax' ),
        'view_item'          => esc_html__( 'View Project', 'mixlax' ),
        'all_items'          => esc_html__( 'All Projects', 'mixlax' ),
        'search_items'       => esc_html__( 'Search Projects', 'mixlax' ),
        'parent_item_colon'  => esc_html__( 'Parent Projects:', 'mixlax' ),
        'not_found'          => esc_html__( 'No Projects found.', 'mixlax' ),
        'not_found_in_trash' => esc_html__( 'No Projects found in Trash.', 'mixlax' ),
    );

    $args = array(
        'labels'             => $labels,
        'description'        => esc_html__( 'Description.', 'mixlax' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-index-card',
        'supports'           => array( 'title', 'thumbnail', 'editor', 'excerpt', 'elementor' ),
        'rewrite'            => array( 'slug' => 'all-projects' ),
    );

    register_post_type( 'mixlax_project', $args );

    $labels = array(
        'name'                       => esc_html__( 'Categories', 'taxonomy general name', 'mixlax' ),
        'singular_name'              => esc_html__( 'Category', 'taxonomy singular name', 'mixlax' ),
        'search_items'               => esc_html__( 'Search Categorys', 'mixlax' ),
        'popular_items'              => esc_html__( 'Popular Categorys', 'mixlax' ),
        'all_items'                  => esc_html__( 'All Categorys', 'mixlax' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => esc_html__( 'Edit Category', 'mixlax' ),
        'update_item'                => esc_html__( 'Update Category', 'mixlax' ),
        'add_new_item'               => esc_html__( 'Add New Category', 'mixlax' ),
        'new_item_name'              => esc_html__( 'New Category Name', 'mixlax' ),
        'separate_items_with_commas' => esc_html__( 'Separate Categorys with commas', 'mixlax' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove Categorys', 'mixlax' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used Categorys', 'mixlax' ),
        'not_found'                  => esc_html__( 'No Categorys found.', 'mixlax' ),
        'menu_name'                  => esc_html__( 'Categories', 'mixlax' ),
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug' => 'project-category' ),
    );

    register_taxonomy( 'project_category', 'mixlax_project', $args );

    // Add new taxonomy, NOT hierarchical (like tags)
    $labels = array(
        'name'                       => esc_html__( 'Tags', 'taxonomy general name', 'mixlax' ),
        'singular_name'              => esc_html__( 'Tag', 'taxonomy singular name', 'mixlax' ),
        'search_items'               => esc_html__( 'Search Tags', 'mixlax' ),
        'popular_items'              => esc_html__( 'Popular Tags', 'mixlax' ),
        'all_items'                  => esc_html__( 'All Tags', 'mixlax' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => esc_html__( 'Edit Tag', 'mixlax' ),
        'update_item'                => esc_html__( 'Update Tag', 'mixlax' ),
        'add_new_item'               => esc_html__( 'Add New Tag', 'mixlax' ),
        'new_item_name'              => esc_html__( 'New Tag Name', 'mixlax' ),
        'separate_items_with_commas' => esc_html__( 'Separate Tags with commas', 'mixlax' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove Tags', 'mixlax' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used Tags', 'mixlax' ),
        'not_found'                  => esc_html__( 'No Tags found.', 'mixlax' ),
        'menu_name'                  => esc_html__( 'Tags', 'mixlax' ),
    );

    $args = array(
        'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug' => 'project-tag' ),
    );

    register_taxonomy( 'project_tag', 'mixlax_project', $args );
}

if( ! function_exists( 'mixlax_projects_category' ) ){
    function mixlax_projects_category(){
        $cat_array = array();
        $cat_array[] = esc_html__( 'Select a category','mixlax' );
        $terms = get_terms( array(
            'taxonomy'      => 'project_category',
            'hide_empty'    => true
        ) );
        if( is_array( $terms ) && $terms ){
            foreach( $terms as $term ){
                $cat_array[$term->slug] = $term->name;
            }
        }
        return $cat_array;
    }
}

/**
 * Single Template
 */
add_filter( 'single_template', 'mixlax_core_template_redirect' );

if( ! function_exists( 'mixlax_core_template_redirect' ) ){
    function mixlax_core_template_redirect( $single_template ){

        global $post;

        // Service Single Page
        if( $post ){
            if( $post->post_type == 'mixlax_project' ){
                $single_template = MIXLAX_CORE_PLUGIN_TEMP . 'single-mixlax_project.php';
            }
        }

        return $single_template;
    }
}

/**
 * Archive Template
 */
add_filter( 'archive_template', 'mixlax_core_template_archive' );

if( ! function_exists( 'mixlax_core_template_archive' ) ){
    function mixlax_core_template_archive( $archive_template ){

        global $post;

        // Service Archive Template
        if( $post ){
            if( $post->post_type == 'mixlax_project' ){
                $archive_template = MIXLAX_CORE_PLUGIN_TEMP . 'archive-mixlax_project.php';
            }
        }

        return $archive_template;
    }
}



add_filter('wpcf7_autop_or_not', '__return_false');
// Add Image Size
add_image_size( 'blog-sidebar-image', 70, 70, true );
add_image_size( 'blog-post-image-one', 370, 280, true );
add_image_size( 'blog-post-image-three', 370, 310, true );
add_image_size( 'blog-post-image-four', 370, 340, true );