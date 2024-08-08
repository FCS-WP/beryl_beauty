<?php
/**
* @version  1.0
* @package  wellnez
* @author   Vecurosoft <support@vecurosoft.com>
*
* Websites: http://www.vecurosoft.com
*
*/

/**************************************
* Creating About Us Widget
***************************************/

class wellnez_aboutus_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'wellnez_aboutus_widget',

                // Widget name will appear in UI
                esc_html__( 'Wellnez :: About Us Widget', 'wellnez' ),

                // Widget description
                array(
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add About Us Widget', 'wellnez' ),
                    'classname'		                => 'pt-0',
                )
            );

        }

        // This is where the action happens
        public function widget( $args, $instance ) {

            $title          = apply_filters( 'widget_title', $instance['title'] );
			$about_us 	    = apply_filters( 'widget_about_us', $instance['about_us'] );
			$button_text 	= apply_filters( 'widget_button_text', $instance['button_text'] );

            if ( isset( $instance[ 'button_url' ] ) ) {
                $button_url = $instance[ 'button_url' ];
            }else {
                $button_url = '#';
            }


            //before and after widget arguments are defined by themes
            echo $args['before_widget'];
                if( !empty( $title  ) ){
                    echo $args['before_title'];
                        echo esc_html( $title );
                    echo $args['after_title'];
                }
                echo '<div class="vs-widget-about">';
    				if( ! empty( $about_us ) ){
    	                echo '<p class="widget-about-text mb-25 pe-xl-5">'.wp_kses_post( $about_us ).'</p>';
    	            }
                    if( ! empty( $button_text ) ){
                        echo '<a href="'.esc_url( $button_url ).'" class="vs-btn style6 hover-white"><i class="far fa-map-marker-alt"></i> '.esc_html( $button_text ).'</a>';
                    }
                echo '</div>';
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
            if ( isset( $instance[ 'button_text' ] ) ) {
                $button_text = $instance[ 'button_text' ];
            }else {
                $button_text = '';
            }

            //Image Url
            if ( isset( $instance[ 'button_url' ] ) ) {
                $button_url = $instance[ 'button_url' ];
            }else {
                $button_url = '#';
            }

			if ( isset( $instance[ 'about_us' ] ) ) {
				$about_us = $instance[ 'about_us' ];
			}else {
				$about_us = '';
			}

            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'wellnez'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'button_text' ); ?>"><?php _e( 'Button Text' , 'wellnez' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" type="text" value="<?php echo esc_attr( $button_text ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'button_url' ); ?>"><?php _e( 'Image URL:' ,'wellnez'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'button_url' ); ?>" name="<?php echo $this->get_field_name( 'button_url' ); ?>" type="text" value="<?php echo esc_attr( $button_url ); ?>" />
            </p>
			<p>
				<label for="<?php echo $this->get_field_id( 'about_us' ); ?>">
					<?php
						_e( 'About Us:' ,'dvpn');
					?>
				</label>
		        <textarea class="widefat" id="<?php echo $this->get_field_id( 'about_us' ); ?>" name="<?php echo $this->get_field_name( 'about_us' ); ?>" rows="8" cols="80"><?php echo esc_html( $about_us ); ?></textarea>
			</p>
            <?php
        }


         // Updating widget replacing old instances with new
         public function update( $new_instance, $old_instance ) {

            $instance = array();
            $instance['title'] 	        	= ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['button_text'] 	    = ( ! empty( $new_instance['button_text'] ) ) ? strip_tags( $new_instance['button_text'] ) : '';
            $instance['button_url'] 	    = ( ! empty( $new_instance['button_url'] ) ) ? strip_tags( $new_instance['button_url'] ) : '';
            $instance['about_us'] 			= ( ! empty( $new_instance['about_us'] ) ) ? strip_tags( $new_instance['about_us'] ) : '';
			return $instance;
        }
    } // Class wellnez_aboutus_widget ends here


    // Register and load the widget
    function wellnez_aboutus_load_widget() {
        register_widget( 'wellnez_aboutus_widget' );
    }
    add_action( 'widgets_init', 'wellnez_aboutus_load_widget' );