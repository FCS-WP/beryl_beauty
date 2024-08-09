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
*   Creating Newsletter Widget
***************************************/

class mixlax_newsletter_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
    		// Base ID of your widget
    		'mixlax_newsletter_widget',
    		// Widget name will appear in UI
    		esc_html__( 'Mixlax :: Newsletter', 'mixlax' ),
    		// Widget description
    		array(
				'description' 	              => esc_html__( 'Add Newsletter', 'mixlax' ),
				'classname'		              => 'widget_newsletter',
                'customize_selective_refresh' => true,
			)
		);
	}

// This is where the action happens
public function widget( $args, $instance ) {
	$title 			= apply_filters( 'widget_title', $instance['title'] );
	$placeholder 	= apply_filters( 'widget_placeholder', $instance['placeholder'] );


	// before and after widget arguments are defined by themes
	echo $args['before_widget'];

    if ( ! empty( $title ) ){
        echo $args['before_title'] . $title . $args['after_title'];
    }
	
	echo '<form class="newsletter-form">';
		echo '<input class="form-control" type="email" placeholder="'.esc_attr( $placeholder ).'" required >';
			echo '<button type="submit" class="primary-btn">';
                echo esc_html__( 'Submit','mixlax' );
			echo '</button>';
	echo '</form>';
	
	echo $args['after_widget'];
}

// Widget Backend
public function form( $instance ) {
	//Title
	if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
	}else {
		$title = esc_html__( 'Subscribe Us', 'mixlax' );
	}

	// Placeholder Text
	if ( isset( $instance[ 'placeholder' ] ) ) {
		$placeholder = $instance[ 'placeholder' ];
	}else{
		$placeholder = __( 'Your Email Address', 'mixlax' );
	}

// Widget admin form
	?>
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>">
			<?php
				_e( 'Title:' ,'mixlax');
			?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'placeholder' ); ?>">
			<?php
				_e( 'Placeholder:' ,'mixlax' );
			?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'placeholder' ); ?>" name="<?php echo $this->get_field_name( 'placeholder' ); ?>" type="text" value="<?php echo esc_attr( $placeholder ); ?>" />
	</p>
<?php
	}
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
    	$instance 					= array();
    	$instance['title'] 			= ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    	$instance['placeholder']  	= ( ! empty( $new_instance['placeholder'] ) ) ? strip_tags( $new_instance['placeholder'] ) : '';

    	return $instance;
	}
} // Class mixlax_subscribe_widget ends here


// Register and load the widget
function mixlax_newsletter_load_widget() {
	register_widget( 'mixlax_newsletter_widget' );
}
add_action( 'widgets_init', 'mixlax_newsletter_load_widget' );