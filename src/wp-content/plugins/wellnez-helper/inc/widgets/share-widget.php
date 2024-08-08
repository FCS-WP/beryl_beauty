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
*Creating Contact Information Widget
***************************************/

class mixlax_social_share_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'mixlax_social_share_widget',
			// Widget name will appear in UI
			esc_html__( 'Mixlax :: Social Share Page', 'mixlax' ),
			// Widget description
			array(
				'description'	 => esc_html__( 'Add Social Share Page Widget', 'mixlax' ),
				'classname'		 => 'widget_social_links',
			)
		);
	}

// This is where the action happens
public function widget( $args, $instance ) {
	$title 			= apply_filters( 'widget_title', $instance['title'] );

	//before and after widget arguments are defined by themes
	echo $args['before_widget'];
    echo '<!-- About Widget Start -->';
		if ( ! empty( $title ) ){
			echo $args['before_title'] . $title . $args['after_title'];
		}
		
		// Get page URL
		$URL = site_url();

		// Construct sharing URL without using any script

		$twitterURL = 'https://twitter.com/share?url='.esc_url( $URL );
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.esc_url( $URL );
		$pinteresturl = 'http://pinterest.com/pin/create/link/?url='.esc_url( $URL );
		$linkedin = 'https://www.linkedin.com/shareArticle?mini=true&url='.esc_url( $URL );

        echo '<ul>';
			echo '<li><a class="facebook" href="'.esc_url( $facebookURL ).'" target="_blank"><i class="fab fa-facebook"></i>'.esc_html__( 'Facebook', 'mixlax' ).'</a></li>';
			echo '<li><a class="twitter" href="'. esc_url( $twitterURL ) .'" target="_blank"><i class="fab fa-twitter"></i>'.esc_html__( 'Twitter', 'mixlax' ).'</a></li>';
			echo '<li><a class="pinterest" href="'.esc_url( $pinteresturl ).'" target="_blank"><i class="fab fa-pinterest"></i>'.esc_html__( 'Pinterest', 'mixlax' ).'</a></li>';
			echo '<li><a class="linkedin" href="'.esc_url( $linkedin ).'" target="_blank"><i class="fab fa-linkedin"></i>'.esc_html__( 'Linkedin', 'mixlax' ).'</a></li>';
        echo '</ul>';
	echo $args['after_widget'];
    echo '<!-- About Widget End -->';


}

// Widget Backend
public function form( $instance ) {
	//Title
	if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
	}else {
		$title = esc_html__( 'Never Miss News', 'mixlax' );
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
function mixlax_social_share_load_widget() {
	register_widget( 'mixlax_social_share_widget' );
}
add_action( 'widgets_init', 'mixlax_social_share_load_widget' );