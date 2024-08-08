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

class mixlax_recent_posts_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'mixlax_recent_posts_widget',

                // Widget name will appear in UI
                esc_html__( 'Mixlax :: Recent Posts', 'mixlax' ),

                // Widget description
                array(
                    'classname'                     => 'widget_recent_entries',
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add Recent Posts Widget', 'mixlax' ),
                )
            );
        }

        // This is where the action happens
        public function widget( $args, $instance ) {

            $title          = apply_filters( 'widget_title', $instance['title'] );
            $show_date      = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
            // $widget_style	= apply_filters( 'widget_style', $instance['widget_style'] );

        	$widget_style  	= empty( $instance['widget_style'] ) ? 'style_two' : $instance['widget_style'];
            //Post Count
            if ( isset( $instance[ 'post_count' ] ) ) {
                $post_count = $instance[ 'post_count' ];
            }else {
                $post_count = '4';
            }

            //before and after widget arguments are defined by themes
            echo $args['before_widget'];

                if( !empty( $title  ) ){
                    echo $args['before_title'];
                        echo esc_html( $title );
                    echo $args['after_title'];
                }


                $query_args = array(
                    "post_type"             => "post",
                    "posts_per_page"        => esc_attr( $post_count ),
                    "post_status"           => "publish",
                    "ignore_sticky_posts"   => true
                );


                $recentposts = new WP_Query( $query_args );

                if( $recentposts->have_posts(  ) ) {
                    echo '<div class="vs-widget-recent-post has-light-border">';
                        echo '<!-- Widget Content -->';
                            while( $recentposts->have_posts(  ) ) {
                                $recentposts->the_post();
                                echo '<div class="recent-post media">';
                                    if( has_post_thumbnail() ){
                                        echo '<div class="media-img">';
                                            echo wellnez_img_tag( array(
                                                "url"   => esc_url( get_the_post_thumbnail_url( null, 'blog-sidebar-image' ) ),
                                            ) );
                                        echo '</div>';
                                    }
                                    echo '<div class="media-body pl-20">';
                                        if( $widget_style == "style_one" ){
                                            if( $show_date ){
                                                echo '<span><i class="fal fa-calendar-alt text-theme"></i><a href="'.esc_url( wellnez_blog_date_permalink() ).'">'.esc_html( get_the_time( 'd F Y' ) ).'</a></span>';
                                            }
                                            echo '<h4 class="h5 mb-0"><a href="'.esc_url( get_the_permalink() ).'">'.wp_trim_words( wp_kses_post( get_the_title() ), '8', '' ).'</a></h4>';
                                        }else{
                                            echo '<h4 class="recent-post-title h6 mb-0"><a href="'.esc_url( get_the_permalink() ).'">'.wp_trim_words( wp_kses_post( get_the_title() ), '8', '' ).'</a></h4>';
                                            if( $show_date ){
                                                echo '<span><i class="fal fa-calendar-alt text-theme"></i><a href="'.esc_url( wellnez_blog_date_permalink() ).'">'.esc_html( get_the_time( 'd F Y' ) ).'</a></span>';
                                            }
                                        }
                                    echo '</div>';
                                echo '</div>';
                            }
                            wp_reset_postdata();
                        echo '<!-- End of Widget Content -->';
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

            //Post Count
            if ( isset( $instance[ 'post_count' ] ) ) {
                $post_count = $instance[ 'post_count' ];
            }else {
                $post_count = '4';
            }

            // Show Date
            $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;

            $instance = wp_parse_args(
        		(array) $instance,
        		array(
        			'widget_style'   => 'style_one',
        			'title'          => '',
        		)
        	);

            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'mixlax'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'post_count' ); ?>"><?php _e( 'Number of Posts to show:' ,'mixlax'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'post_count' ); ?>" name="<?php echo $this->get_field_name( 'post_count' ); ?>" type="text" value="<?php echo esc_attr( $post_count ); ?>" />
            </p>
            <p>
                <input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
    		    <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label>
            </p>
            <p>
        		<label for="<?php echo esc_attr( $this->get_field_id( 'widget_style' ) ); ?>"><?php _e( 'Choose Style:' ); ?></label>
        		<select name="<?php echo esc_attr( $this->get_field_name( 'widget_style' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'widget_style' ) ); ?>" class="widefat">
        			<option value="style_one"<?php selected( $instance['widget_style'], 'style_one' ); ?>><?php _e( 'Style One' ); ?></option>
        			<option value="style_two"<?php selected( $instance['widget_style'], 'style_two' ); ?>><?php _e( 'Style Two' ); ?></option>
        		</select>
        	</p>
            <?php
        }


        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {

            $instance = array();
            $instance['title'] 	        = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['post_count'] 	= ( ! empty( $new_instance['post_count'] ) ) ? strip_tags( $new_instance['post_count'] ) : '4';
            $instance['show_date']      = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
            if ( in_array( $new_instance['widget_style'], array( 'style_one', 'style_two', 'ID' ) ) ) {
                $instance['widget_style'] = $new_instance['widget_style'];
            } else {
                $instance['widget_style'] = 'style_two';
            }
            return $instance;
        }
    } // Class mixlax_recent_posts_widget ends here


    // Register and load the widget
    function mixlax_recent_posts_load_widget() {
        register_widget( 'mixlax_recent_posts_widget' );
    }
    add_action( 'widgets_init', 'mixlax_recent_posts_load_widget' );