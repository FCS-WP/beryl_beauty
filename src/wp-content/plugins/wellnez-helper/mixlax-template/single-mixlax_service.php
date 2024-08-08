<?php 

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    // header
    get_header();
	
	echo '<section class="our-service-wrapper service-detaiils-wrap service-details-layout1  pt-130">';
	  	echo '<div class="container">';
	    	echo '<div class="row">';
				do_action( 'mixlax_service_col_start_wrap' );
                    echo '<div class="service-details">';
    					while( have_posts( ) ) :
    		                the_post();
    		                the_content();

    		            endwhile;
    		            wp_reset_postdata();
    				echo '</div>';
				echo '</div>';
				do_action( 'mixlax_service_sidebar' );
			echo '</div>';
		echo '</div>';
	echo '</section>';
	
	get_footer();