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

class mixlax_inquiry_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'mixlax_inquiry_widget',
			// Widget name will appear in UI
			esc_html__( 'mixlax :: Inquiry Number', 'mixlax' ),
			// Widget description
			array(
				'description'	 => esc_html__( 'Add Inquiry Number', 'mixlax' ),
				'classname'		 => 'widget_inquiry',
			)
		);
	}

// This is where the action happens
public function widget( $args, $instance ) {
	$title 			= apply_filters( 'widget_title', $instance['title'] );
	$mobile 		= apply_filters( 'widget_mobile', $instance['mobile'] );
	$mobile01 		= apply_filters( 'widget_mobile01', $instance['mobile01'] );
	$mobile02 		= apply_filters( 'widget_mobile02', $instance['mobile02'] );


	//Remove ' ' , '-', ' - ' from phone link
	$replace 		= array(' ','-',' - ');
	$with 	 		= array('','','');
	$mobileurl 	    = str_replace( $replace, $with, $mobile );

	$mobile01url 	= str_replace( $replace, $with, $mobile01 );

	$mobile02url 	= str_replace( $replace, $with, $mobile02 );


	//before and after widget arguments are defined by themes
	echo $args['before_widget'];
    echo '<!-- About Widget Start -->';
    	if( !empty( $title ) || !empty( $mobile ) ||  !empty( $mobile01 ) ||  !empty( $mobile02 ) ):

			if ( ! empty( $title ) ){
				echo $args['before_title'] . $title . $args['after_title'];
			}
            echo '<div class="media">';
                echo wellnez_img_tag( array(
                    'url'       => esc_url( MIXLAX_DIR_ASSIST_URI.'img/icon/inquiry.svg' ),
                ) );
                echo '<div class="media-body inquiry_number">';
                    if( !empty( $mobile ) ){
                        echo '<a href="'.esc_attr( 'tel:'.$mobileurl ).'">'.esc_html( $mobile ).'</a>';
                    }
                    if( !empty( $mobile01 ) ){
                        echo '<a href="'.esc_attr( 'tel:'.$mobile01url ).'">'.esc_html( $mobile01 ).'</a>';
                    }
                    echo '<br>';
                    if( !empty( $mobile02 ) ){
                        echo '<a href="'.esc_attr( 'tel:'.$mobile02url ).'">'.esc_html( $mobile02 ).'</a>';
                    }
                echo '</div>';
            echo '</div>';
    	endif;
	echo $args['after_widget'];
    echo '<!-- About Widget End -->';


}

// Widget Backend
public function form( $instance ) {
	//Title
	if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
	}else {
		$title = esc_html__( 'Have Inquiry? Just Call', 'mixlax' );
	}

    // Mobile
    if ( isset( $instance[ 'mobile' ] ) ) {
        $mobile = $instance[ 'mobile' ];
    }else {
        $mobile = '';
    }
    // Mobile 01
    if ( isset( $instance[ 'mobile01' ] ) ) {
        $mobile01 = $instance[ 'mobile01' ];
    }else {
        $mobile01 = '';
    }
    // Mobile 02
    if ( isset( $instance[ 'mobile02' ] ) ) {
        $mobile02 = $instance[ 'mobile02' ];
    }else {
        $mobile02 = '';
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
        <label for="<?php echo $this->get_field_id( 'mobile' ); ?>">
            <?php
                _e( 'Mobile :' ,'mixlax');
            ?>
        </label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'mobile' ); ?>" name="<?php echo $this->get_field_name( 'mobile' ); ?>" type="text" value="<?php echo esc_attr( $mobile ); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'mobile01' ); ?>">
            <?php
                _e( 'Mobile :' ,'mixlax');
            ?>
        </label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'mobile01' ); ?>" name="<?php echo $this->get_field_name( 'mobile01' ); ?>" type="text" value="<?php echo esc_attr( $mobile01 ); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'mobile02' ); ?>">
            <?php
                _e( 'Mobile :' ,'mixlax');
            ?>
        </label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'mobile02' ); ?>" name="<?php echo $this->get_field_name( 'mobile02' ); ?>" type="text" value="<?php echo esc_attr( $mobile02 ); ?>" />
    </p>


<?php
}
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();

	$instance['title'] 	= ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

    $instance['mobile']  = ( ! empty( $new_instance['mobile'] ) ) ? strip_tags( $new_instance['mobile'] ) : '';

    $instance['mobile01']  = ( ! empty( $new_instance['mobile01'] ) ) ? strip_tags( $new_instance['mobile01'] ) : '';

    $instance['mobile02']  = ( ! empty( $new_instance['mobile02'] ) ) ? strip_tags( $new_instance['mobile02'] ) : '';

	return $instance;
}
}
// Class mixlax_subscribe_widget ends here

// Register and load the widget
function mixlax_inquiry_load_widget() {
	register_widget( 'mixlax_inquiry_widget' );
}
add_action( 'widgets_init', 'mixlax_inquiry_load_widget' );