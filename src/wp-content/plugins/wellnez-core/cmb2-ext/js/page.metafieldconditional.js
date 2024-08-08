(function ($) {
    "use strict";

    let $wellnez_page_breadcrumb_area = $("#_wellnez_page_breadcrumb_area");
    let $wellnez_page_settings = $("#_wellnez_page_breadcrumb_settings");
    let $wellnez_page_breadcrumb_image = $("#_wellnez_breadcumb_image");
    let $wellnez_page_title = $("#_wellnez_page_title");
    let $wellnez_page_title_settings = $("#_wellnez_page_title_settings");

    if ($wellnez_page_breadcrumb_area.val() == '1') {
        $(".cmb2-id--wellnez-page-breadcrumb-settings").show();
        if ($wellnez_page_settings.val() == 'global') {
            $(".cmb2-id--wellnez-breadcumb-image").hide();
            $(".cmb2-id--wellnez-page-title").hide();
            $(".cmb2-id--wellnez-page-title-settings").hide();
            $(".cmb2-id--wellnez-custom-page-title").hide();
            $(".cmb2-id--wellnez-page-breadcrumb-trigger").hide();
        } else {
            $(".cmb2-id--wellnez-breadcumb-image").show();
            $(".cmb2-id--wellnez-page-title").show();
            $(".cmb2-id--wellnez-page-breadcrumb-trigger").show();

            if ($wellnez_page_title.val() == '1') {
                $(".cmb2-id--wellnez-page-title-settings").show();
                if ($wellnez_page_title_settings.val() == 'default') {
                    $(".cmb2-id--wellnez-custom-page-title").hide();
                } else {
                    $(".cmb2-id--wellnez-custom-page-title").show();
                }
            } else {
                $(".cmb2-id--wellnez-page-title-settings").hide();
                $(".cmb2-id--wellnez-custom-page-title").hide();

            }
        }
    } else {
        $wellnez_page_breadcrumb_area.parents('.cmb2-id--wellnez-page-breadcrumb-area').siblings().hide();
    }


    // breadcrumb area
    $wellnez_page_breadcrumb_area.on("change", function () {
        if ($(this).val() == '1') {
            $(".cmb2-id--wellnez-page-breadcrumb-settings").show();
            if ($wellnez_page_settings.val() == 'global') {
                $(".cmb2-id--wellnez-breadcumb-image").hide();
                $(".cmb2-id--wellnez-page-title").hide();
                $(".cmb2-id--wellnez-page-title-settings").hide();
                $(".cmb2-id--wellnez-custom-page-title").hide();
                $(".cmb2-id--wellnez-page-breadcrumb-trigger").hide();
            } else {
                $(".cmb2-id--wellnez-breadcumb-image").show();
                $(".cmb2-id--wellnez-page-title").show();
                $(".cmb2-id--wellnez-page-breadcrumb-trigger").show();

                if ($wellnez_page_title.val() == '1') {
                    $(".cmb2-id--wellnez-page-title-settings").show();
                    if ($wellnez_page_title_settings.val() == 'default') {
                        $(".cmb2-id--wellnez-custom-page-title").hide();
                    } else {
                        $(".cmb2-id--wellnez-custom-page-title").show();
                    }
                } else {
                    $(".cmb2-id--wellnez-page-title-settings").hide();
                    $(".cmb2-id--wellnez-custom-page-title").hide();

                }
            }
        } else {
            $(this).parents('.cmb2-id--wellnez-page-breadcrumb-area').siblings().hide();
        }
    });

    // page title
    $wellnez_page_title.on("change", function () {
        if ($(this).val() == '1') {
            $(".cmb2-id--wellnez-page-title-settings").show();
            if ($wellnez_page_title_settings.val() == 'default') {
                $(".cmb2-id--wellnez-custom-page-title").hide();
            } else {
                $(".cmb2-id--wellnez-custom-page-title").show();
            }
        } else {
            $(".cmb2-id--wellnez-page-title-settings").hide();
            $(".cmb2-id--wellnez-custom-page-title").hide();

        }
    });

    //page settings
    $wellnez_page_settings.on("change", function () {
        if ($(this).val() == 'global') {
            $(".cmb2-id--wellnez-breadcumb-image").hide();
            $(".cmb2-id--wellnez-page-title").hide();
            $(".cmb2-id--wellnez-page-title-settings").hide();
            $(".cmb2-id--wellnez-custom-page-title").hide();
            $(".cmb2-id--wellnez-page-breadcrumb-trigger").hide();
        } else {
            $(".cmb2-id--wellnez-breadcumb-image").show();
            $(".cmb2-id--wellnez-page-title").show();
            $(".cmb2-id--wellnez-page-breadcrumb-trigger").show();

            if ($wellnez_page_title.val() == '1') {
                $(".cmb2-id--wellnez-page-title-settings").show();
                if ($wellnez_page_title_settings.val() == 'default') {
                    $(".cmb2-id--wellnez-custom-page-title").hide();
                } else {
                    $(".cmb2-id--wellnez-custom-page-title").show();
                }
            } else {
                $(".cmb2-id--wellnez-page-title-settings").hide();
                $(".cmb2-id--wellnez-custom-page-title").hide();

            }
        }
    });

    // page title settings
    $wellnez_page_title_settings.on("change", function () {
        if ($(this).val() == 'default') {
            $(".cmb2-id--wellnez-custom-page-title").hide();
        } else {
            $(".cmb2-id--wellnez-custom-page-title").show();
        }
    });

})(jQuery);