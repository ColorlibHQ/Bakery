<?php
if( !defined( 'WPINC' ) ){
    die;
}
/**
 * @version  1.0
 * @package  Bakery
 *
 */
 
 
/**************************************
*Creating Author Widget
***************************************/
 
class bakery_author_widget extends WP_Widget {


function __construct() {

parent::__construct(
// Base ID of your widget
'bakery_author_widget',


// Widget name will appear in UI
esc_html__( '[ Bakery ] Author Widget', 'bakery' ),

// Widget description
array( 'description' => esc_html__( 'Add author content', 'bakery' ), )
);

}

// This is where the action happens
public function widget( $args, $instance ) {
	
$title 		= apply_filters( 'widget_title', $instance['title'] );
$designation= apply_filters( 'widget_designation', $instance['designation'] );
$image 		= apply_filters( 'widget_image', $instance['image'] );
$textarea   = apply_filters( 'widget_textarea', $instance['textarea'] );
$fburl      = apply_filters( 'widget_fburl', $instance['fburl'] );
$twiturl    = apply_filters( 'widget_twiturl', $instance['twiturl'] );
$dribbbleurl = apply_filters( 'widget_dribbbleurl', $instance['dribbbleurl'] );
$behanceurl  = apply_filters( 'widget_behanceurl', $instance['behanceurl'] );

// before and after widget arguments are defined by themes
echo wp_kses_post( $args['before_widget'] );
    
?>

    <div class="user-info-widget">
        <?php 
        // logo
        if( $image ){
            echo bakery_img_tag(
                array(
                    'url'   => esc_url( $image ),
                )
            );
        }
        //
        echo '<h4>'.esc_html( $title ).'</h4>';
        echo '<p>'. esc_html( $designation ).'</p>';
        // Social Media
        $social = array(
            'facebook'  => $fburl,
            'twitter'   => $twiturl,
            'dribbble'  => $dribbbleurl,
            'behance'   => $behanceurl,
        );

        if( count( $social ) > 0 ) {
            echo '<ul class="social-links">';
            foreach( $social as $key => $val ){
                if( $val ){
                    echo '<li><a href="'.esc_url( $val ).'"><i class="fa fa-'.esc_attr( $key ).'"></i></a></li>';
                }
                
            }
            echo '</ul>';
        }
        //
        if( $textarea ){
            echo '<p>'.wp_kses_post( $textarea).'</p>';
        }

        ?>                          
    </div>


<?php
echo wp_kses_post( $args['after_widget'] );
}
		
// Widget Backend 
public function form( $instance ) {
	
if ( isset( $instance[ 'title' ] ) ) {
	$title = $instance[ 'title' ];
}else {
	$title = esc_html__( 'Author Name', 'bakery' );
}


//	Designation
if ( isset( $instance[ 'designation' ] ) ) {
	$designation = $instance[ 'designation' ];
}else {
	$designation = '';
}

//	Text Area
if ( isset( $instance[ 'textarea' ] ) ) {
	$textarea = $instance[ 'textarea' ];
}else {
	$textarea = '';
}

//  fburl
if ( isset( $instance[ 'fburl' ] ) ) {
    $fburl = $instance[ 'fburl' ];
}else {
    $fburl = '';
}

//  twiturl
if ( isset( $instance[ 'twiturl' ] ) ) {
    $twiturl = $instance[ 'twiturl' ];
}else {
    $twiturl = '';
}

//  dribbbleurl
if ( isset( $instance[ 'dribbbleurl' ] ) ) {
    $dribbbleurl = $instance[ 'dribbbleurl' ];
}else {
    $dribbbleurl = '';
}

//  Behance url
if ( isset( $instance[ 'behanceurl' ] ) ) {
    $behanceurl = $instance[ 'behanceurl' ];
}else {
    $behanceurl = '';
}

//	logo
if ( isset( $instance[ 'image' ] ) ) {
	$image = $instance[ 'image' ];
}else {
	$image = '';
}

// Widget admin form
?>
<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:' ,'bakery'); ?></label>
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'designation' ) ); ?>"><?php esc_html_e( 'Designation:' ,'bakery'); ?></label>
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'designation' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'designation' ) ); ?>" type="text" value="<?php echo esc_attr( $designation ); ?>" />
</p>

<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'textarea' ) ); ?>"><?php esc_html_e( 'Short Descriptions:' ,'bakery'); ?></label>
<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'textarea' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'textarea' ) ); ?>"><?php echo esc_textarea( $textarea ); ?></textarea>
</p>

<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'Facebook Url' ) ); ?>"><?php esc_html_e( 'Facebook Url:' ,'bakery'); ?></label>
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'fburl' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'fburl' ) ); ?>" type="text" value="<?php echo esc_attr( $fburl ); ?>" />
</p>

<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'Twitter Url' ) ); ?>"><?php esc_html_e( 'Twitter Url:' ,'bakery'); ?></label>
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twiturl' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twiturl' ) ); ?>" type="text" value="<?php echo esc_attr( $twiturl ); ?>" />
</p>

<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'Dribbble Url' ) ); ?>"><?php esc_html_e( 'Dribbble Url:' ,'bakery'); ?></label>
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'dribbbleurl' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'dribbbleurl' ) ); ?>" type="text" value="<?php echo esc_attr( $dribbbleurl ); ?>" />
</p>

<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'Behance Url' ) ); ?>"><?php esc_html_e( 'Behance Url:' ,'bakery'); ?></label>
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'behanceurl' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'behanceurl' ) ); ?>" type="text" value="<?php echo esc_attr( $behanceurl ); ?>" />
</p>

<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>"><?php _e( 'Image', 'bakery' ); ?>:</label>
	<div class="bakery-media-container">
		<div class="bakery-media-inner">
			<?php $img_style = ( $image != '' ) ? '' : 'style="display:none;"'; ?>
			<img id="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>-preview" src="<?php echo esc_attr( $image ); ?>" <?php echo wp_kses_post( $img_style ); ?> />
			<?php $no_img_style = ( $image != '' ) ? 'style="display:none;"' : ''; ?>
			<span class="bakery-no-image" id="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>-noimg" <?php echo wp_kses_post( $no_img_style ); ?>><?php _e( 'No image selected', 'bakery' ); ?></span>
		</div>
	
	<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'image' ) ); ?>" value="<?php echo esc_attr( $image ); ?>" class="bakery-media-url" />

	<input type="button" value="<?php echo _e( 'Remove', 'bakery' ); ?>" class="button bakery-media-remove" id="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>-remove" <?php echo wp_kses_post( $img_style ); ?> />

	<?php $button_text = ( $image != '' ) ? __( 'Change Image', 'bakery' ) : __( 'Select Image', 'bakery' ); ?>
	<input type="button" value="<?php echo esc_html( $button_text ); ?>" class="button bakery-media-upload" id="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>-button" />
	<br class="clear">
	</div>
</p>
<style>
.bakery-media-container {
	width: 98%;
}

.bakery-media-inner {
	border: 1px solid #ddd;
	padding: 10px;
	text-align: center;
	border-radius: 2px;
	margin-bottom: 10px;
}

.widget-description img,
.bakery-media-inner img {
	max-width: 100%;
	height: auto;
}

.bakery-media-url {
	display: none;
}

.bakery-media-remove {
	float: left;
	width: 48%;
}

.bakery-media-upload {
	float: right;
	width: 48%;
}
</style>
<script>
jQuery(function($){
    'use strict';
	/**
	 *
	 * About Widget Logo upload
	 *
	 */
	$( function(){
	    // Upload / Change Image
    function wpshed_image_upload( button_class ) {
        
        var _custom_media = true,
            _orig_send_attachment = wp.media.editor.send.attachment;

        $( 'body' ).on( 'click', button_class, function(e) {

            var button_id           = '#' + $( this ).attr( 'id' ),
                self                = $( button_id),
                send_attachment_bkp = wp.media.editor.send.attachment,
                button              = $( button_id ),
                id                  = button.attr( 'id' ).replace( '-button', '' );

            _custom_media = true;

            wp.media.editor.send.attachment = function( props, attachment ){

                if ( _custom_media ) {

                    $( '#' + id + '-preview'  ).attr( 'src', attachment.url ).css( 'display', 'block' );
                    $( '#' + id + '-remove'  ).css( 'display', 'inline-block' );
                    $( '#' + id + '-noimg' ).css( 'display', 'none' );
                    $( '#' + id ).val( attachment.url ).trigger( 'change' );  

                } else {

                    return _orig_send_attachment.apply( button_id, [props, attachment] );

                }
            }

            wp.media.editor.open( button );

            return false;
        });
    }
    wpshed_image_upload( '.bakery-media-upload' );

    // Remove Image
    function wpshed_image_remove( button_class ) {

        $( 'body' ).on( 'click', button_class, function(e) {

            var button              = $( this ),
                id                  = button.attr( 'id' ).replace( '-remove', '' );

            $( '#' + id + '-preview' ).css( 'display', 'none' );
            $( '#' + id + '-noimg' ).css( 'display', 'block' );
            button.css( 'display', 'none' );
            $( '#' + id ).val( '' ).trigger( 'change' );

        });
    }
    wpshed_image_remove( '.bakery-media-remove' );
	
	});
});
</script>
<?php 
}

	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {

	
$instance = array();
$instance['title'] 	      = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['designation']  = ( ! empty( $new_instance['designation'] ) ) ? strip_tags( $new_instance['designation'] ) : '';
$instance['textarea']     = ( ! empty( $new_instance['textarea'] ) ) ? strip_tags( $new_instance['textarea'] ) : '';
$instance['fburl']        = ( ! empty( $new_instance['fburl'] ) ) ? strip_tags( $new_instance['fburl'] ) : '';
$instance['twiturl']      = ( ! empty( $new_instance['twiturl'] ) ) ? strip_tags( $new_instance['twiturl'] ) : '';
$instance['dribbbleurl']  = ( ! empty( $new_instance['dribbbleurl'] ) ) ? strip_tags( $new_instance['dribbbleurl'] ) : '';
$instance['behanceurl']   = ( ! empty( $new_instance['behanceurl'] ) ) ? strip_tags( $new_instance['behanceurl'] ) : '';
$instance['image']  	  = ( ! empty( $new_instance['image'] ) ) ? strip_tags( $new_instance['image'] ) : '';

return $instance;
}

} // Class bakery_author_widget ends here


// Register and load the widget
function bakery_author_load_widget() {
	register_widget( 'bakery_author_widget' );
}
add_action( 'widgets_init', 'bakery_author_load_widget' );