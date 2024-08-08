<?php
/**
 * @Packge     : Wellnez
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://www.vecurosoft.com/
 *
 */


// Blocking direct access
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

function wellnez_core_essential_scripts( ) {
    wp_enqueue_script('wellnez-ajax',WELLNEZ_PLUGDIRURI.'assets/js/wellnez.ajax.js',array( 'jquery' ),'1.0',true);
    wp_localize_script(
    'wellnez-ajax',
    'wellnezajax',
        array(
            'action_url' => admin_url( 'admin-ajax.php' ),
            'nonce'	     => wp_create_nonce( 'wellnez-nonce' ),
        )
    );
}

add_action('wp_enqueue_scripts','wellnez_core_essential_scripts');


// wellnez Section subscribe ajax callback function
add_action( 'wp_ajax_wellnez_subscribe_ajax', 'wellnez_subscribe_ajax' );
add_action( 'wp_ajax_nopriv_wellnez_subscribe_ajax', 'wellnez_subscribe_ajax' );

function wellnez_subscribe_ajax( ){
  $apiKey = wellnez_opt('wellnez_subscribe_apikey');
  $listid = wellnez_opt('wellnez_subscribe_listid');
   if( ! wp_verify_nonce($_POST['security'], 'wellnez-nonce') ) {
    echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('You are not allowed.', 'wellnez').'</div>';
   }else{
       if( !empty( $apiKey ) && !empty( $listid )  ){
           $MailChimp = new DrewM\MailChimp\MailChimp( $apiKey );

           $result = $MailChimp->post("lists/{$listid}/members",[
               'email_address'    => esc_attr( $_POST['sectsubscribe_email'] ),
               'status'           => 'subscribed',
           ]);

           if ($MailChimp->success()) {
               if( $result['status'] == 'subscribed' ){
                   echo '<div class="alert alert-success mt-2" role="alert">'.esc_html__('Thank you, you have been added to our mailing list.', 'wellnez').'</div>';
               }
           }elseif( $result['status'] == '400' ) {
               echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('This Email address is already exists.', 'wellnez').'</div>';
           }else{
               echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('Sorry something went wrong.', 'wellnez').'</div>';
           }
        }else{
           echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('Apikey Or Listid Missing.', 'wellnez').'</div>';
        }
   }

   wp_die();

}