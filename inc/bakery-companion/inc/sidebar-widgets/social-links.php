<?php
/**
 * @version  1.0
 * @package  Bakery
 *
 */
 
 
/**************************************
*Creating Social Links Widget
***************************************/
 
class bakery_social_links_widget extends WP_Widget {


    function __construct() {

        parent::__construct(
        // Base ID of your widget
        'bakery_social_links_widget',

        // Widget name will appear in UI
        esc_html__( '[ Bakery ] Social Links', 'bakery' ),

        // Widget description
        array( 'description' => esc_html__( 'Add footer social links.', 'bakery' ), )
        );

    }

    // This is where the action happens
    public function widget( $args, $instance ) {
        
        $title 	    = apply_filters( 'widget_title', $instance['title'] );
        $desc 		= apply_filters( 'widget_desc', $instance['desc'] );
        $facebook   = apply_filters( 'widget_text', $instance['facebook'] );
        $twitter    = apply_filters( 'widget_text', $instance['twitter'] );
        $dribbble   = apply_filters( 'widget_text', $instance['dribbble'] );
        $behance    = apply_filters( 'widget_text', $instance['behance'] );
        $linkedin   = apply_filters( 'widget_text', $instance['linkedin'] );


            // before and after widget arguments are defined by themes
            echo wp_kses_post( $args['before_widget'] );
            if ( ! empty( $title ) )
            echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );

            if( $desc ){
                echo '<p>'.esc_html( $desc ).'</p>';
            }
            ?>
            <div class="footer-social d-flex align-items-center">
                <?php
                    if( ! empty( $facebook ) ) {
                        echo '<a href="'. esc_url( $facebook ) .'"><i class="fa fa-facebook"></i></a>';
                    }
                    if( ! empty( $twitter ) ) {
                        echo '<a href="'. esc_url( $twitter ).'"><i class="fa fa-twitter"></i></a>';
                    }
                    if( ! empty( $dribbble ) ) {
                        echo '<a href="'. esc_url( $dribbble ) .'"><i class="fa fa-dribbble"></i></a>';
                    }
                    if( ! empty( $behance ) ) {
                        echo '<a href="'. esc_url( $behance ).'"><i class="fa fa-behance"></i></a>';
                    }
                    if( ! empty( $linkedin ) ) {
                        echo '<a href="'. esc_url( $linkedin ).'"><i class="fa fa-linkedin"></i></a>';
                    }

                ?>
                
            </div>






        <?php
        echo wp_kses_post( $args['after_widget'] );
    }
            
    // Widget Backend 
    public function form( $instance ) {
        
        isset( $instance[ 'title' ] ) ? $title = $instance[ 'title' ] : $title = esc_html__( 'Social Links', 'bakery' );
        isset( $instance[ 'desc' ] ) ? $desc = $instance[ 'desc' ] : $desc = '';
        isset( $instance[ 'facebook' ] ) ? $facebook = $instance[ 'facebook' ] : $facebook = '';
        isset( $instance[ 'twitter' ] ) ? $twitter = $instance[ 'twitter' ] : $twitter = '';
        isset( $instance[ 'dribbble' ] ) ? $dribbble = $instance[ 'dribbble' ] : $dribbble = '';
        isset( $instance[ 'behance' ] ) ? $behance = $instance[ 'behance' ] : $behance = '';
        isset( $instance[ 'linkedin' ] ) ? $linkedin = $instance[ 'linkedin' ] : $linkedin = '';

        // Widget admin form
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:' ,'bakery'); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php esc_html_e( 'Short Description:' ,'bakery'); ?></label> 
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>"><?php echo esc_textarea( $desc ); ?></textarea>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php esc_html_e( 'Facebook:' ,'bakery'); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_html_e( 'Twitter:' ,'bakery'); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'dribbble' ) ); ?>"><?php esc_html_e( 'Dribbble:' ,'bakery'); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'dribbble' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'dribbble' ) ); ?>" type="text" value="<?php echo esc_attr( $dribbble ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'behance' ) ); ?>"><?php esc_html_e( 'Behance:' ,'bakery'); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'behance' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'behance' ) ); ?>" type="text" value="<?php echo esc_attr( $behance ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php esc_html_e( 'Linkedin:' ,'bakery'); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" type="text" value="<?php echo esc_attr( $linkedin ); ?>" />
        </p>
        <?php 
    }

	
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {

        $instance = array();
        $instance['title'] 	  = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['desc']     = ( ! empty( $new_instance['desc'] ) ) ? strip_tags( $new_instance['desc'] ) : '';
        $instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
        $instance['twitter']  = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
        $instance['dribbble'] = ( ! empty( $new_instance['dribbble'] ) ) ? strip_tags( $new_instance['dribbble'] ) : '';
        $instance['behance']  = ( ! empty( $new_instance['behance'] ) ) ? strip_tags( $new_instance['behance'] ) : '';
        $instance['linkedin'] = ( ! empty( $new_instance['linkedin'] ) ) ? strip_tags( $new_instance['linkedin'] ) : '';

        return $instance;

    }

} // Class bakery_social_links_widget ends here


// Register and load the widget
function bakery_social_links_load_widget() {
	register_widget( 'bakery_social_links_widget' );
}
add_action( 'widgets_init', 'bakery_social_links_load_widget' );