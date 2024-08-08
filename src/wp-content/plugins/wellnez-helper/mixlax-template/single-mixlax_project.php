<?php

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    // header
    get_header();

	echo '<section class="vs-gallery-wrapper vs-gallery-details">';
        echo '<div class="vs-gallery-content">';
			while( have_posts( ) ) :
                the_post();
                the_content();

            endwhile;
            wp_reset_postdata();
		echo '</div>';
	echo '</section>';

	get_footer();