(function($){
    "use strict";
    
    let $mixlax_page_breadcrumb_area = $("#_mixlax_page_breadcrumb_area");
    let $mixlax_page_settings = $("#_mixlax_page_breadcrumb_settings");
    let $mixlax_page_title = $("#_mixlax_page_title");
    let $mixlax_page_title_settings = $("#_mixlax_page_title_settings");

    if( $mixlax_page_breadcrumb_area.val() == '1' ) {
        $(".cmb2-id--mixlax-page-breadcrumb-settings").show();
        if( $mixlax_page_settings.val() == 'global' ) {
            $(".cmb2-id--mixlax-page-title").hide();
            $(".cmb2-id--mixlax-page-title-settings").hide();
            $(".cmb2-id--mixlax-custom-page-title").hide();
            $(".cmb2-id--mixlax-page-breadcrumb-trigger").hide();
        } else {
            $(".cmb2-id--mixlax-page-title").show();
            $(".cmb2-id--mixlax-page-breadcrumb-trigger").show();
    
            if( $mixlax_page_title.val() == '1' ) {
                $(".cmb2-id--mixlax-page-title-settings").show();
                if( $mixlax_page_title_settings.val() == 'default' ) {
                    $(".cmb2-id--mixlax-custom-page-title").hide();
                } else {
                    $(".cmb2-id--mixlax-custom-page-title").show();
                }
            } else {
                $(".cmb2-id--mixlax-page-title-settings").hide();
                $(".cmb2-id--mixlax-custom-page-title").hide();
    
            }
        }
    } else {
        $mixlax_page_breadcrumb_area.parents('.cmb2-id--mixlax-page-breadcrumb-area').siblings().hide();
    }


    // breadcrumb area
    $mixlax_page_breadcrumb_area.on("change",function(){
        if( $(this).val() == '1' ) {
            $(".cmb2-id--mixlax-page-breadcrumb-settings").show();
            if( $mixlax_page_settings.val() == 'global' ) {
                $(".cmb2-id--mixlax-page-title").hide();
                $(".cmb2-id--mixlax-page-title-settings").hide();
                $(".cmb2-id--mixlax-custom-page-title").hide();
                $(".cmb2-id--mixlax-page-breadcrumb-trigger").hide();
            } else {
                $(".cmb2-id--mixlax-page-title").show();
                $(".cmb2-id--mixlax-page-breadcrumb-trigger").show();
        
                if( $mixlax_page_title.val() == '1' ) {
                    $(".cmb2-id--mixlax-page-title-settings").show();
                    if( $mixlax_page_title_settings.val() == 'default' ) {
                        $(".cmb2-id--mixlax-custom-page-title").hide();
                    } else {
                        $(".cmb2-id--mixlax-custom-page-title").show();
                    }
                } else {
                    $(".cmb2-id--mixlax-page-title-settings").hide();
                    $(".cmb2-id--mixlax-custom-page-title").hide();
        
                }
            }
        } else {
            $(this).parents('.cmb2-id--mixlax-page-breadcrumb-area').siblings().hide();
        }
    });

    // page title
    $mixlax_page_title.on("change",function(){
        if( $(this).val() == '1' ) {
            $(".cmb2-id--mixlax-page-title-settings").show();
            if( $mixlax_page_title_settings.val() == 'default' ) {
                $(".cmb2-id--mixlax-custom-page-title").hide();
            } else {
                $(".cmb2-id--mixlax-custom-page-title").show();
            }
        } else {
            $(".cmb2-id--mixlax-page-title-settings").hide();
            $(".cmb2-id--mixlax-custom-page-title").hide();

        }
    });

    //page settings
    $mixlax_page_settings.on("change",function(){
        if( $(this).val() == 'global' ) {
            $(".cmb2-id--mixlax-page-title").hide();
            $(".cmb2-id--mixlax-page-title-settings").hide();
            $(".cmb2-id--mixlax-custom-page-title").hide();
            $(".cmb2-id--mixlax-page-breadcrumb-trigger").hide();
        } else {
            $(".cmb2-id--mixlax-page-title").show();
            $(".cmb2-id--mixlax-page-breadcrumb-trigger").show();
    
            if( $mixlax_page_title.val() == '1' ) {
                $(".cmb2-id--mixlax-page-title-settings").show();
                if( $mixlax_page_title_settings.val() == 'default' ) {
                    $(".cmb2-id--mixlax-custom-page-title").hide();
                } else {
                    $(".cmb2-id--mixlax-custom-page-title").show();
                }
            } else {
                $(".cmb2-id--mixlax-page-title-settings").hide();
                $(".cmb2-id--mixlax-custom-page-title").hide();
    
            }
        }
    });

    // page title settings
    $mixlax_page_title_settings.on("change",function(){
        if( $(this).val() == 'default' ) {
            $(".cmb2-id--mixlax-custom-page-title").hide();
        } else {
            $(".cmb2-id--mixlax-custom-page-title").show();
        }
    });
    
})(jQuery);