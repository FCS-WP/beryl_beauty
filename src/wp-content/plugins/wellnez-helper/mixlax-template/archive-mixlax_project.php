<?php

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    // header
    get_header();

	echo '<section class="vs-gallery-wrapper vs-gallery-layout1 pt-130 pb-100">';
	  	echo '<div class="container">';
	    	echo '<div class="row">';
				if( have_posts() ):
					while( have_posts() ):
						the_post();
						echo '<div class="col-sm-6 col-lg-4 col-xl-4 pb-30">';
							echo '<div class="mixlax-project">';
								if( has_post_thumbnail() ){
									echo '<div class="project-img">';
                                        echo '<a href="'.esc_url( get_the_permalink() ).'">';
										    the_post_thumbnail( );
                                        echo '</a>';
									echo '</div>';
								}
							echo '</div>';
						echo '</div>';
					endwhile;
					wp_reset_postdata();
				endif;
			echo '</div>';
		echo '</div>';
	echo '</section>';

	get_footer();