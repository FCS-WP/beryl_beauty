<?php 

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    // header
    get_header();
	
	echo '<section class="service-layout3 our-service-wrapper pt-90 pb-60">';
	  	echo '<div class="container">';
	    	echo '<div class="row">';
				if( have_posts() ):
					while( have_posts() ):
						the_post();
						echo '<div class="col-sm-6 col-lg-4 col-xl-4 ">';
							echo '<div class="service-box">';
								echo '<div class="service-content">';
									if( get_the_title() ){
										echo '<a href="'.esc_url( get_the_permalink() ).'">';
											echo '<h3 class="title">'.wp_kses_post( get_the_title() ).'</h3>';
										echo '</a>';
									}
									if( !empty( wellnez_meta( 'flat_icon_class' ) ) ){
										echo '<span class="shape-icon"><i class="'.esc_attr( wellnez_meta( 'flat_icon_class' ) ).'"></i></span>';
									}
									if( get_the_excerpt() ){
										echo '<p>'.wp_kses_post( get_the_excerpt() ).'</p>';
									}
								echo '</div>';
							echo '</div>';
						echo '</div>';
					endwhile;
					wp_reset_postdata();
				endif;
			echo '</div>';
		echo '</div>';
	echo '</section>';
	
	get_footer();