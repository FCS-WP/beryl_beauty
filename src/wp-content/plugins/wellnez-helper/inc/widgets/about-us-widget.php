<?php
/**
* @version  1.0
* @package  mixlax
* @author   Vecurosoft <support@vecurosoft.com>
*
* Websites: http://www.vecurosoft.com
*
*/

/**************************************
* Creating About Us Widget
***************************************/

class mixlax_aboutus_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'mixlax_aboutus_widget',

                // Widget name will appear in UI
                esc_html__( 'Mixlax :: About Us Widget', 'mixlax' ),

                // Widget description
                array(
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add About Us Widget', 'mixlax' ),
                    'classname'		                => 'widget_about mb-0',
                )
            );

        }

        // This is where the action happens
        public function widget( $args, $instance ) {

            $title      = apply_filters( 'widget_title', $instance['title'] );
			$about_us 	= apply_filters( 'widget_about_us', $instance['about_us'] );
            if ( isset( $instance[ 'aboutus_img_url' ] ) ) {
                $aboutus_img_url = $instance[ 'aboutus_img_url' ];
            }else {
                $aboutus_img_url = '#';
            }


            //before and after widget arguments are defined by themes
            echo $args['before_widget'];
                if( !empty( $title  ) ){
                    echo $args['before_title'];
                        echo esc_html( $title );
                    echo $args['after_title'];
                }
                if( !empty( $aboutus_img_url ) ){
                    echo '<a href="'.esc_url( $aboutus_img_url ).'">';
                }
                    if ( isset( $instance[ 'aboutus_img' ] ) ) {
                        $aboutus_img = $instance[ 'aboutus_img' ];
                        echo wellnez_img_tag( array(
                            'url'   => esc_url( $aboutus_img ),
                        ) );
                    }
                if( !empty( $aboutus_img_url ) ){
                    echo '</a>';
                }
				if( !empty( $about_us ) ){
	                echo '<p class="about-text">'.wp_kses_post( $about_us ).'</p>';
	            }
            echo $args['after_widget'];
        }

        // Widget Backend
        public function form( $instance ) {

             //Title
             if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }else {
                $title = '';
            }

            //Image
            if ( isset( $instance[ 'aboutus_img' ] ) ) {
                $aboutus_img = $instance[ 'aboutus_img' ];
            }else {
                $aboutus_img = '';
            }

            //Image Url
            if ( isset( $instance[ 'aboutus_img_url' ] ) ) {
                $aboutus_img_url = $instance[ 'aboutus_img_url' ];
            }else {
                $aboutus_img_url = '';
            }
			
			if ( isset( $instance[ 'about_us' ] ) ) {
				$about_us = $instance[ 'about_us' ];
			}else {
				$about_us = '';
			}
			
            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'mixlax'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <input value="<?php echo esc_attr( $aboutus_img ); ?>" name="<?php echo $this->get_field_name( 'aboutus_img' ); ?>" type="hidden" class="widefat img_val" type="text" />
                <img class="img_show" src="<?php echo esc_url( $aboutus_img ); ?>" alt="">
            </p>

            <p>
                <button class="button about-up-btn"><?php ( empty( $aboutus_img ) ) ?  esc_html_e( "Upload Image", "mixlax" ) : esc_html_e( "Change Image", "mixlax" ); ?></button>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'aboutus_img_url' ); ?>"><?php _e( 'Image URL:' ,'mixlax'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'aboutus_img_url' ); ?>" name="<?php echo $this->get_field_name( 'aboutus_img_url' ); ?>" type="text" value="<?php echo esc_attr( $aboutus_img_url ); ?>" />
            </p>
			<p>
				<label for="<?php echo $this->get_field_id( 'about_us' ); ?>">
					<?php
						_e( 'About Us:' ,'dvpn');
					?>
				</label>
		        <textarea class="widefat" id="<?php echo $this->get_field_id( 'about_us' ); ?>" name="<?php echo $this->get_field_name( 'about_us' ); ?>" rows="8" cols="80"><?php echo esc_html( $about_us ); ?></textarea>
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
                    $(".img_show").css({"margin":"0 auto","display":"block","max-width":"80%"});
                    $(document).on('widget-updated',function(event,widget){
                        var widget_id = $(widget).attr('id');
                        if(widget_id.indexOf('mixlax_aboutus_widget')!=-1){
                            $imgval = $(".img_val").val();
                            $(".img_show").attr("src",$imgval);
                            $(".img_show").css({"margin":"0 auto","display":"block","max-width":"80%"});
                        }
                    });
                    $("body").off("click",".about-up-btn");
                    $("body").on("click",".about-up-btn",function( e ){

                        let frame = wp.media({
                            title: 'Select or Upload Media About Us',
                            button: {
                                text: 'Use this About Us'
                            },
                            multiple: false
                        });

                        frame.on("select",function(){
                            // Get media attachment details from the frame state
                            let $img = frame.state().get('selection').first().toJSON();

                            $(".img_show").attr("src",$img.url);
                            $(".img_val").val($img.url);

                            $(".img_val").trigger('change');

                            $(".about-up-btn").text("Change Image");
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
            $instance['title'] 	        	= ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['aboutus_img'] 	    = ( ! empty( $new_instance['aboutus_img'] ) ) ? strip_tags( $new_instance['aboutus_img'] ) : '';
            $instance['aboutus_img_url'] 	= ( ! empty( $new_instance['aboutus_img_url'] ) ) ? strip_tags( $new_instance['aboutus_img_url'] ) : '';
            $instance['about_us'] 			= ( ! empty( $new_instance['about_us'] ) ) ? strip_tags( $new_instance['about_us'] ) : '';
			return $instance;
        }
    } // Class mixlax_aboutus_widget ends here


    // Register and load the widget
    function mixlax_aboutus_load_widget() {
        register_widget( 'mixlax_aboutus_widget' );
    }
    add_action( 'widgets_init', 'mixlax_aboutus_load_widget' );