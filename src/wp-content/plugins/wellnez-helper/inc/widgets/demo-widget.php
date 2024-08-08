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
* Creating Recent Post Widget
***************************************/

class mixlax_demo_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'mixlax_demo_widget',

                // Widget name will appear in UI
                esc_html__( 'Mixlax :: Demo Widget', 'mixlax' ),

                // Widget description
                array(
                    'customize_selective_refresh' => true,
                    'description' => esc_html__( 'Add Demo Widget', 'mixlax' ),
                )
            );

        }

        // This is where the action happens
        public function widget( $args, $instance ) {

            $title      = apply_filters( 'widget_title', $instance['title'] );
            if ( isset( $instance[ 'demo_img_url' ] ) ) {
                $demo_img_url = $instance[ 'demo_img_url' ];
            }else {
                $demo_img_url = '#';
            }
            

            //before and after widget arguments are defined by themes
            echo $args['before_widget'];
                if( !empty( $title  ) ){
                    echo $args['before_title'];
                        echo esc_html( $title );
                    echo $args['after_title'];
                }
                echo '<div class="mixlax-demo">';
                    echo '<div class="image">';
                        echo '<a href="'.esc_url( $demo_img_url ).'">';
                            if ( isset( $instance[ 'demo_img' ] ) ) {
                                $demo_img = $instance[ 'demo_img' ];
                                echo '<img src="'.esc_url($demo_img).'" alt="'.wellnez_image_alt($demo_img).'">';
                            }
                            //demo badge
                            if ( isset( $instance[ 'demo_badge' ] ) ) {
                                $demo_badge = $instance[ 'demo_badge' ];
                            }else {
                                $demo_badge = '';
                            }
                            if( $demo_badge == '1' ) {
                                echo '<span class="menu-item-label new">';
                                    echo '<span class="text">'.esc_html__('New','mixlax').'</span>';
                                    echo '<span></span>';
                                echo '</span>';
                            }
                            if( $demo_badge == '2' ) {
                                echo '<span class="menu-item-label hot">';
                                    echo '<span class="text">'.esc_html__('Hot','mixlax').'</span>';
                                    echo '<span></span>';
                                echo '</span>';
                            }
                        echo '</a>';
                    echo '</div>';
                    //text
                    if ( isset( $instance[ 'text' ] ) ) {
                        echo '<h5>'.esc_html($instance[ 'text' ]).'</h5>';
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

            //demo badge
            if ( isset( $instance[ 'demo_badge' ] ) ) {
                $demo_badge = $instance[ 'demo_badge' ];
            }else {
                $demo_badge = '';
            }

            //Image
            if ( isset( $instance[ 'demo_img' ] ) ) {
                $demo_img = $instance[ 'demo_img' ];
            }else {
                $demo_img = '';
            }

            //text
            if ( isset( $instance[ 'text' ] ) ) {
                $text = $instance[ 'text' ];
            }else {
                $text = '';
            }

            //Image Url
            if ( isset( $instance[ 'demo_img_url' ] ) ) {
                $demo_img_url = $instance[ 'demo_img_url' ];
            }else {
                $demo_img_url = '';
            }

            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'mixlax'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <input value="<?php echo esc_attr($demo_img); ?>" name="<?php echo $this->get_field_name( 'demo_img' ); ?>" type="hidden" class="widefat img_val" type="text" />
                <img class="img_show" src="<?php echo esc_url($demo_img); ?>" alt="">
            </p>

            <p>
                <button class="button about-up-btn"><?php ( empty( $demo_img ) ) ?  esc_html_e("Upload Image","mixlax") : esc_html_e("Change Image","mixlax"); ?></button>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'demo_img_url' ); ?>"><?php _e( 'Image URL:' ,'mixlax'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'demo_img_url' ); ?>" name="<?php echo $this->get_field_name( 'demo_img_url' ); ?>" type="text" value="<?php echo esc_attr( $demo_img_url ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'demo_badge' ); ?>"><?php _e( 'Badge:' ,'mixlax'); ?></label>
                <select class="widefat" id="<?php echo $this->get_field_id( 'demo_badge' ); ?>" name="<?php echo $this->get_field_name( 'demo_badge' ); ?>" >
                    <option value="" <?php if ( $demo_badge == '' ) echo 'selected="selected"'; ?>><?php echo esc_html__('Select a badge','mixlax') ?></option>
                    <option value="1" <?php if ( $demo_badge == 1 ) echo 'selected="selected"'; ?>><?php echo esc_html__('New','mixlax') ?></option>
                    <option value="2" <?php if ( $demo_badge == 2 ) echo 'selected="selected"'; ?>><?php echo esc_html__('Hot','mixlax') ?></option>
                </select>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Text:' ,'mixlax'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>" />
            </p>
            <script>
            jQuery(function($){
                'use strict';
                /**
                 *
                 * About Widget Logo upload
                 *
                 */
                $( function(){
                    $(".img_show").css({"margin":"0 auto","display":"block","max-width":"80%"});
                    $(document).on('widget-updated',function(event,widget){
                        var widget_id = $(widget).attr('id');
                        if(widget_id.indexOf('mixlax_demo_widget')!=-1){
                            $imgval = $(".img_val").val();
                            $(".img_show").attr("src",$imgval);
                            $(".img_show").css({"margin":"0 auto","display":"block","max-width":"80%"});
                        }
                    });
                    $("body").off("click",".about-up-btn");
                    $("body").on("click",".about-up-btn",function( e ){
                        
                        let frame = wp.media({
                            title: 'Select or Upload Media Logo',
                            button: {
                                text: 'Use this Logo'
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
            $instance['title'] 	        = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['text'] 	        = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';
            $instance['demo_badge'] 	= ( ! empty( $new_instance['demo_badge'] ) ) ? strip_tags( $new_instance['demo_badge'] ) : '';
            $instance['demo_img'] 	    = ( ! empty( $new_instance['demo_img'] ) ) ? strip_tags( $new_instance['demo_img'] ) : '';
            $instance['demo_img_url'] 	    = ( ! empty( $new_instance['demo_img_url'] ) ) ? strip_tags( $new_instance['demo_img_url'] ) : '';
            return $instance;
        }
    } // Class mixlax_demo_widget ends here


    // Register and load the widget
    function mixlax_demo_load_widget() {
        register_widget( 'mixlax_demo_widget' );
    }
    add_action( 'widgets_init', 'mixlax_demo_load_widget' );