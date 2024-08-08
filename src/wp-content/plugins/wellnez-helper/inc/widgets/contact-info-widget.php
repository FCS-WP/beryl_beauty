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

class mixlax_contact_info_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'mixlax_contact_info_widget',
			// Widget name will appear in UI
			esc_html__( 'Mixlax :: Contact Info', 'mixlax' ),
			// Widget description
			array(
				'description'	 => esc_html__( 'Add Contact Info', 'mixlax' ),
				'classname'		 => 'vs-widget-about pr-lg-4',
			)
		);
	}

// This is where the action happens
public function widget( $args, $instance ) {
	$title 			= apply_filters( 'widget_title', $instance['title'] );
	$about_logo  	= ( !empty( $instance['about_logo'] ) ) ? $instance['about_logo'] : "";
	$about_text 	= apply_filters( 'widget_about_text', $instance['about_text'] );
	$mobile 		= apply_filters( 'widget_mobile', $instance['mobile'] );
	$email 			= apply_filters( 'widget_email', $instance['email'] );
	//Remove ' ' , '-', ' - ' from email
	$email 			= is_email( $email );
	$replace 		= array(' ','-',' - ');
	$with 			= array('','','');
	$emailurl 		= str_replace( $replace, $with, $email );

	$mobileurl 	    = str_replace( $replace, $with, $mobile );
	//before and after widget arguments are defined by themes
	echo $args['before_widget'];
    echo '<!-- About Widget Start -->';
    	if( !empty( $title ) || !empty( $about_text ) ||  !empty( $email ) || !empty( $mobile ) ):

			if ( ! empty( $title ) ){
				echo $args['before_title'] . $title . $args['after_title'];
			}

			if( ! empty( $about_logo ) ){
				echo '<div class="widget-about-logo mb-20 mb-lg-25">';
					echo '<a href="'.esc_url( home_url( '/' ) ).'">';
						echo wellnez_img_tag( array(
							'url'	=> esc_url( $about_logo ),
							'class' => 'svg',
						) );
					echo '</a>';
				echo '</div>';
			}
			if( !empty( $about_text ) ){
			  	echo '<p class="widget-about-text mb-20">';
				  	echo wp_kses_post( $about_text );
			  	echo '</p>';
		    }
			if( !empty( $mobile ) ){
				echo '<p class="contact-info-style1">';
					echo '<i class="far fa-phone text-theme"></i>';
					echo '<a href="'.esc_attr( 'tel:'.$mobileurl ).'">'.esc_html( $mobile ).'</a>';
				echo '</p>';
			}
            if( !empty( $email ) ){
                echo '<p class="contact-info-style1">';
                   	echo '<i class="fal fa-envelope text-theme"></i>';
                   	echo '<a href="'.esc_attr( 'mailto:'.$emailurl ).'">'.esc_html( $email ).'</a>';
                echo '</p>';
            }

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
		$title = esc_html__( 'Support Center', 'mixlax' );
	}

	// Image
	if ( isset( $instance[ 'about_logo' ] ) ) {
		$about_logo = $instance[ 'about_logo' ];
	}else {
		$about_logo = '';
	}

	// About Text
	if ( isset( $instance[ 'about_text' ] ) ) {
		$about_text = $instance[ 'about_text' ];
	}else {
		$about_text = '';
	}

	// E-mail one
	if ( isset( $instance[ 'email' ] ) ) {
		$email = $instance[ 'email' ];
	}else {
		$email = '';
	}
	// Mobile
    if ( isset( $instance[ 'mobile' ] ) ) {
        $mobile = $instance[ 'mobile' ];
    }else {
        $mobile = '';
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
		<input value="<?php echo esc_attr( $about_logo ); ?>" name="<?php echo $this->get_field_name( 'about_logo' ); ?>" type="hidden" class="widefat about_logo_img_val" type="text" />
		<img class="about_logo_img_show" src="<?php echo esc_url( $about_logo ); ?>" alt="">
	</p>
	<p>
		<button class="button adver-img-up-button"><?php ( empty( $about_logo ) ) ?  esc_html_e("Upload Image","mixlax") : esc_html_e("Change Image","mixlax"); ?></button>
	</p>
	<p>
        <label for="<?php echo $this->get_field_id( 'about_text' ); ?>">
            <?php
                _e( 'About Text:' ,'mixlax');
            ?>
        </label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'about_text' ); ?>" name="<?php echo $this->get_field_name( 'about_text' ); ?>" type="text" value="<?php echo esc_attr( $about_text ); ?>" />
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
		<label for="<?php echo $this->get_field_id( 'email' ); ?>">
			<?php
				_e( 'Email :' ,'mixlax');
			?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
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
			$(".about_logo_img_show").css({"margin":"0 auto","display":"block","max-width":"80%"});
			$(document).on('widget-updated',function(event,widget){
				var widget_id = $(widget).attr('id');
				if(widget_id.indexOf('mixlax_aboutus_widget')!=-1){
					$imgval = $(".about_logo_img_val").val();
					$(".about_logo_img_show").attr("src",$imgval);
					$(".about_logo_img_show").css({"margin":"0 auto","display":"block","max-width":"80%"});
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

					$(".about_logo_img_show").attr("src", $img.url);
					$(".about_logo_img_val").val( $img.url );

					$(".about_logo_img_val").trigger( 'change' );

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

	$instance['title'] 		= ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

	$instance['about_logo']	= ( ! empty( $new_instance['about_logo'] ) ) ? strip_tags( $new_instance['about_logo'] ) : '';

	$instance['about_text'] = ( ! empty( $new_instance['about_text'] ) ) ? strip_tags( $new_instance['about_text'] ) : '';

	$instance['email'] 		= ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';

	$instance['mobile']  	= ( ! empty( $new_instance['mobile'] ) ) ? strip_tags( $new_instance['mobile'] ) : '';

	return $instance;
}
}
// Class mixlax_subscribe_widget ends here

// Register and load the widget
function mixlax_contact_info_load_widget() {
	register_widget( 'mixlax_contact_info_widget' );
}
add_action( 'widgets_init', 'mixlax_contact_info_load_widget' );