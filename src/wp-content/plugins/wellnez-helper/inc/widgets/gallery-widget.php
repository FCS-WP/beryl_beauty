<?php
/**
* @version  1.0
* @package  Mixlax
* @author   Vecurosoft <support@vecurosoft.com>
*
* Websites: http://www.vecurosoft.com
*
*/

/**************************************
* Creating Gallery Widget
***************************************/

class mixlax_gallery_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'mixlax_gallery_widget',

                // Widget name will appear in UI
                esc_html__( 'Mixlax :: Gallery', 'mixlax' ),

                // Widget description
                array(
                    'classname'                     => '',
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add Gallery Widget', 'mixlax' ),
                )
            );
        }

        // This is where the action happens
        public function widget( $args, $instance ) {

            $title      = apply_filters( 'widget_title', $instance['title'] );

            //before and after widget arguments are defined by themes
            echo $args['before_widget'];

                if( !empty( $title  ) ){
                    echo $args['before_title'];
                        echo esc_html( $title );
                    echo $args['after_title'];
                }
				$mixlax_gallery_image = wellnez_opt( 'mixlax_gallery_image_widget' );

				if( !empty( $mixlax_gallery_image ) && isset( $mixlax_gallery_image ) ){
					echo '<div class="instagram-feeds">';
                        echo '<ul>';
							foreach( $mixlax_gallery_image as $single_image ){
								echo '<li><a href="'.esc_url( $single_image['url'] ).'">';
									echo wellnez_img_tag( array(
										'url'	=> esc_url( $single_image['image'] ),
									) );
								echo '</a></li>';
							}
						echo '</ul>';
                    echo '</div>';
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

            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'mixlax'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
				<a href="<?php echo esc_url( home_url('/').'wp-admin/admin.php?page=Mixlax&tab=14' );?>"><?php _e( 'Add Gallery Image', 'mixlax' )?></a>
            </p>

            <?php
        }


        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {

            $instance = array();
            $instance['title'] 	        = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

            return $instance;
        }
    } // Class mixlax_gallery_widget ends here


    // Register and load the widget
    function mixlax_gallery_widget() {
        register_widget( 'mixlax_gallery_widget' );
    }
    add_action( 'widgets_init', 'mixlax_gallery_widget' );