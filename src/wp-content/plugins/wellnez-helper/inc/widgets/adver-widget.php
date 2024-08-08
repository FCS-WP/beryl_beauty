<?php
/**
* @version  1.0
* @package  mixlax
* @author   Vecurosoft <support@mixlax.com>
*
* Websites: http://www.vecurosoft.com
*
*/

/**************************************
* Creating Advertise Image Widget
***************************************/

class mixlax_adver_img_widget extends WP_Widget {

        function __construct() {
        
            parent::__construct(
                // Base ID of your widget
                'mixlax_adver_img_widget', 
            
                // Widget name will appear in UI
                esc_html__( 'Mixlax :: Advertise Image', 'mixlax' ),
            
                // Widget description
                array( 
                    'classname'   					=> 'widget_offer_banner',
                    'customize_selective_refresh' 	=> true,  
                    'description' 					=> esc_html__( 'Add Advertise Image Widget', 'mixlax' ),   
                )
            );

        }
    
        // This is where the action happens
        public function widget( $args, $instance ) {
            
            $title  		= apply_filters( 'widget_title', $instance['title'] );
            $adver_img  	= ( !empty( $instance['adver_img'] ) ) ? $instance['adver_img'] : "";
            $author_name  	= ( !empty( $instance['author_name'] ) ) ? $instance['author_name'] : "";  
            $title_url  	= ( !empty( $instance['title_url'] ) ) ? $instance['title_url'] : "";  
            $price  		= ( !empty( $instance['price'] ) ) ? $instance['price'] : "";
            
            //before and after widget arguments are defined by themes
            echo $args['before_widget']; 
            
                if( !empty( $title  ) ){
                    echo $args['before_title']; 
                        echo esc_html( $title );
                    echo $args['after_title']; 
            	}
				
				echo '<a href="'.esc_url( $title_url ).'">';
	              echo '<h3 class="title">';
	                echo '<span class="text-white f-34">'.esc_html__( 'Services', 'mixlax' ).'</span>';
	                echo esc_html__( 'Your', 'mixlax' );
	                echo '<span class="text_medium f-47"><span class="text-white">'.esc_html__( 'Car', 'mixlax' ).'</span> '.esc_html__( ' At', 'mixlax' ).'</span>';
	                echo '<span class="text-white f-65">'.esc_html__( 'Very', 'mixlax' ).'</span>';
	                echo '<span class="text_sm f-39">'.esc_html__( 'LOWEST', 'mixlax' ).'</span>';
	                echo '<span class="text_medium f-48">'.esc_html__( 'PRICE', 'mixlax' ).'</span>';
	              echo '</h3>';
	            echo '</a>';
				
				echo '<div class="price-box">';
	              echo '<span class="text">'.esc_html__( 'Start', 'mixlax' ).'</span>';
	              echo '<span class="price"><sup>'.esc_html__( '$','mixlax' ).'</sup>'.esc_html( $price ).'</span>';
	              echo '<span class="sub">'.esc_html__( '/off', 'mixlax' ).'</span>';
	            echo '</div>';
				echo wellnez_img_tag( array(
					'url'	=> esc_url( $adver_img )
				) );
            echo $args['after_widget'];
            echo '<!-- End of Author Widget -->';
        }
            
        // Widget Backend 
        public function form( $instance ) {
    
            //Title	
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }else {
                $title = '';
            }
			
            // Title Url
            if ( isset( $instance[ 'title_url' ] ) ) {
                $title_url = $instance[ 'title_url' ];
            }else {
                $title_url = '#';
            }

            // Description
            if ( isset( $instance[ 'price' ] ) ) {
                $price = $instance[ 'price' ];
            }else {
                $price = '30';
            }
            
            //Image
            if ( isset( $instance[ 'adver_img' ] ) ) {
                $adver_img = $instance[ 'adver_img' ];
            }else {
                $adver_img = '';
            }

            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'mixlax'); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <input value="<?php echo esc_attr($adver_img); ?>" name="<?php echo $this->get_field_name( 'adver_img' ); ?>" type="hidden" class="widefat adver_img_img_val" type="text" />
                <img class="adver_img_img_show" src="<?php echo esc_url($adver_img); ?>" alt="">
            </p>

            <p>
                <button class="button adver-img-up-button"><?php ( empty( $adver_img ) ) ?  esc_html_e("Upload Image","mixlax") : esc_html_e("Change Image","mixlax"); ?></button>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'title_url' ); ?>"><?php _e( 'Title Url:' ,'mixlax'); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'title_url' ); ?>" name="<?php echo $this->get_field_name( 'title_url' ); ?>" type="text" value="<?php echo esc_attr( $title_url ); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'price' ) ); ?>"><?php _e( 'Price:' ,'mixlax'); ?></label> 
                <textarea class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'price' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'price' ) ); ?>" cols="30" rows="10"><?php echo wp_kses_post( $price ); ?></textarea>
            </p>
			
			<script>
            jQuery(function($){
                'use strict';
                /**
                 *
                 * About Widget About Us upload
                 *
                 */
                $( function(){
                    $(".adver_img_img_show").css({"margin":"0 auto","display":"block","max-width":"80%"});
                    $(document).on('widget-updated',function(event,widget){
                        var widget_id = $(widget).attr('id');
                        if(widget_id.indexOf('mixlax_aboutus_widget')!=-1){
                            $imgval = $(".adver_img_img_val").val();
                            $(".adver_img_img_show").attr("src",$imgval);
                            $(".adver_img_img_show").css({"margin":"0 auto","display":"block","max-width":"80%"});
                        }
                    });
                    $("body").off("click",".adver-img-up-button");
                    $("body").on("click",".adver-img-up-button",function( e ){

                        let frame = wp.media({
                            title: 'Select or Upload Media',
                            button: {
                                text: 'Use this Image'
                            },
                            multiple: false
                        });

                        frame.on("select",function(){
                            // Get media attachment details from the frame state
                            let $img = frame.state().get('selection').first().toJSON();

                            $(".adver_img_img_show").attr("src",$img.url);
                            $(".adver_img_img_val").val($img.url);

                            $(".adver_img_img_val").trigger('change');

                            $(".adver-img-up-button").text("Change Image");
                        });

                        // Open Media Modal
                        frame.open();
                        e.preventDefault();
                    });
                });
            });
            </script>
            <?php 
        }
    
        
        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {
            
            $instance = array();
            $instance['title'] 	        = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';        
            $instance['title_url'] 	= ( ! empty( $new_instance['title_url'] ) ) ? strip_tags( $new_instance['title_url'] ) : '';        
            $instance['price'] 	        = ( ! empty( $new_instance['price'] ) ) ? wp_kses_post( $new_instance['price'] ) : '';        
            $instance['adver_img'] 	    = ( ! empty( $new_instance['adver_img'] ) ) ? strip_tags( $new_instance['adver_img'] ) : '';
            return $instance;
        }
    } // Class mixlax_adver_img_widget ends here
    

    // Register and load the widget
    function mixlax_adver_img_load_widget() {
        register_widget( 'mixlax_adver_img_widget' );
    }
    add_action( 'widgets_init', 'mixlax_adver_img_load_widget' );