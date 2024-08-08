<?php
/**
 * @Packge     : Mixlax
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://www.vecurosoft.com/
 *
 */


// Blocking direct access
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

function mixlax_core_essential_scripts( ) {
    wp_enqueue_script( 'mixlax-ajax', MIXLAX_PLUGDIRURI.'assets/js/mixlax.ajax.js',array( 'jquery' ), '1.0', true );
    wp_localize_script(
    'mixlax-ajax',
    'mixlaxajax',
        array(
            'action_url'    => admin_url( 'admin-ajax.php' ),
            'nonce'	        => wp_create_nonce( 'mixlax-nonce' ),
        )
    );
}

add_action( 'wp_enqueue_scripts', 'mixlax_core_essential_scripts' );


// mixlax Section subscribe ajax callback function
add_action( 'wp_ajax_mixlax_subscribe_ajax', 'mixlax_subscribe_ajax' );
add_action( 'wp_ajax_nopriv_mixlax_subscribe_ajax', 'mixlax_subscribe_ajax' );

function mixlax_subscribe_ajax( ){
    $apiKey = wellnez_opt( 'mixlax_subscribe_apikey' );
    $listid = wellnez_opt( 'mixlax_subscribe_listid' );

    if( ! wp_verify_nonce( $_POST['security'], 'mixlax-nonce' ) ) {
       echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__( 'You are not allowed.', 'mixlax' ).'</div>';
    }else{
        if( !empty( $apiKey ) && !empty( $listid )  ){
           $MailChimp = new DrewM\MailChimp\MailChimp( $apiKey );

           $result = $MailChimp->post("lists/{$listid}/members",[
               'email_address'    => esc_attr( $_POST['sectsubscribe_email'] ),
               'status'           => 'subscribed',
           ]);

           if ( $MailChimp->success()) {
               if( $result['status'] == 'subscribed' ){
                   echo '<div class="alert alert-success mt-2" role="alert">'.esc_html__( 'Thank you, you have been added to our mailing list.', 'mixlax' ).'</div>';
               }
           }elseif( $result['status'] == '400' ) {
               echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__( 'This Email address is already exists.', 'mixlax' ).'</div>';
           }else{
               echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__( 'Sorry something went wrong.', 'mixlax' ).'</div>';
           }
        }else{
           echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__( 'Apikey Or Listid Missing.', 'mixlax' ).'</div>';
        }
    }
    wp_die();

}