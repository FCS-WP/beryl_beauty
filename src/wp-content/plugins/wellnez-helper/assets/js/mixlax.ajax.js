/*

[Main Script]

Project: Vecurosoft
Version: 1.0
Author : mixlax.com

*/
;(function($){
    "use strict";
/* ------------------------------------------------------------------------- *

    * Mail Chimp ajax

    * ------------------------------------------------------------------------- */

   var $widgetsubscribeForm = $('form.newsletter-form');

   // Subscribe Shortcode MailChimp ajax
    $widgetsubscribeForm.on('submit',function(e){
       let $emailAdd = $(this).find('input[type="email"]').val();
       $.ajax({
           type: 'POST',
           url: mixlaxajax.action_url,
           data:{
                sectsubscribe_email: $emailAdd,
                security: mixlaxajax.nonce,
                action: 'mixlax_subscribe_ajax'
           },

           success: function(data){
               $('form.newsletter-form input[type="email"]').val('');
               $('.mixlax-newsletter').append(data);
           },

           error: function(){
               $('.mixlax-newsletter').append('<div class="alert alert-danger mt-2" role="alert">Something Goes Wrong</div>');

           }
       });
       e.preventDefault();
    });

})(jQuery);