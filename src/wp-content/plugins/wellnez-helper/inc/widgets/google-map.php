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
*Creating Google Maprmation Widget
***************************************/

class mixlax_google_map_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'mixlax_google_map_widget',
			// Widget name will appear in UI
			esc_html__( 'Mixlax :: Google Map', 'mixlax' ),
			// Widget description
			array(
				'description'	 => esc_html__( 'Add Google Map', 'mixlax' ),
				'classname'		 => 'widget_contact',
			)
		);
	}

// This is where the action happens
public function widget( $args, $instance ) {
	$title 	= apply_filters( 'widget_title', $instance['title'] );
	
	//before and after widget arguments are defined by themes
	echo $args['before_widget'];
		if ( ! empty( $title ) ){
			echo $args['before_title'] . $title . $args['after_title'];
		}
		echo '<div class="google-map" id="footer-map"></div>';
	echo $args['after_widget'];


}

// Widget Backend
public function form( $instance ) {
	//Title
	if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
	}else {
		$title = esc_html__( 'Support Center', 'mixlax' );
	}

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
		<a href="<?php echo esc_url( home_url('/').'wp-admin/admin.php?page=Mixlax&tab=1' );?>"><?php _e( 'Add Your Api Key From Here' )?></a>
	</p>
<?php
}
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();

	$instance['title'] 	= ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	
	return $instance;
}
}
// Class mixlax_subscribe_widget ends here

// Register and load the widget
function mixlax_google_map_load_widget() {
	register_widget( 'mixlax_google_map_widget' );
}
add_action( 'widgets_init', 'mixlax_google_map_load_widget' );