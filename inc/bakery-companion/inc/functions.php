<?php 
/**
 * @Packge     : Bakery Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

if( ! defined( 'WPINC' ) ) {
    die;
}

// Add Image Size
add_image_size( 'bakery_260x180', 260, 180, true );
add_image_size( 'bakery_600x360', 600, 360, true );


// Instagram object Instance
function bakery_instagram_instance() {
    
    $api = Wpzoom_Instagram_Widget_API::getInstance();

    return $api;
}

// Blog Section
function bakery_blog_section( $postnumber ) {
    
    ?>
    <div class="row">
        <?php   
        $date_format = get_option( 'date_format' );

        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => esc_html( $postnumber ),
        );
        
        $query = new WP_Query( $args );
        
        if( $query->have_posts() ):
            while( $query->have_posts() ):
                $query->the_post();
                ?>
                <div class="single-blog col-lg-4 col-md-4">
	                <?php
	                // Thumbnail
	                if( has_post_thumbnail() ) {
		                echo '<div class="thumb">';
		                the_post_thumbnail( 'bakery_260x180', array( 'class' => 'f-img img-fluid mx-auto' ) );
		                echo '</div>';
	                }
	                ?>
                    <div class="bottom d-flex justify-content-between align-items-center flex-wrap">
                        <div>
                            <?php echo get_avatar( absint( get_the_author_meta('ID') ), '30', array('class'=>'img-fluid') ); ?>
                            <a href="<?php echo esc_url( get_author_posts_url( absint( get_the_author_meta( 'ID' ) ) ) ); ?>"><span><?php echo esc_html( get_the_author() ) ?></span></a>
                        </div>
                        <div class="meta">
	                        <?php echo get_the_date('jS M'); ?>
	                        <?php
	                        if( bakery_opt('bakery-blog-like-toggle') && function_exists('get_simple_likes_button') ) {
		                        echo get_simple_likes_button( absint( get_the_ID() ) );
	                        }
	                        ?>
                            <span class="lnr lnr-bubble"></span>
	                        <?php comments_popup_link('0', '1', '%', esc_attr('bakery_comment_class'), __('Comment are disable', 'bakery') ) ?>
                        </div>
                    </div>
                    <a href="<?php the_permalink(); ?>">
                        <h4><?php the_title(); ?></h4>
                    </a>
	                <?php
	                // Limited Excerpt
	                echo bakery_excerpt_length( '30' );
	                ?>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
    <?php
}

// 
function bakery_section_heading( $title = '', $subtitle = '' ) {
    if( $title || $subtitle ):
    ?>
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-50 col-lg-7">
                <div class="title text-center">
                <?php 
                // Title
                if( $title ){
                    echo bakery_heading_tag(
                        array(
                            'tag'    => 'h1',
                            'class'  => 'mb-10',
                            'text'   => esc_html( $title ),
                        )
                    );
                }
                // Sub Title
                if( $subtitle ){
                    echo bakery_paragraph_tag(
                        array(
                            'text'  => esc_html( $subtitle ),
                        )
                    );
                }
                ?>
            </div>
        </div>
    </div> 
    <?php
    endif;
}

// Set contact form 7 default form template
function bakery_contact7_form_content( $template, $prop ) {
    
    if ( 'form' == $prop ) {

        $template =
            '<div class="row"><div class="col-lg-6 form-group">[text* text-299 class:common-input class:mb-20 class:form-control placeholder "Enter your name"][email* email-836 class:common-input class:mb-20 class:form-control placeholder "Enter email address"][text* text-299 class:common-input class:mb-20 class:form-control placeholder "Enter your subject"]</div><div class="col-lg-6 form-group">[textarea* textarea-697 class:common-textarea class:form-control placeholder "Message"]</div><div class="col-lg-12"><div class="alert-msg" style="text-align: left;"></div>[submit class:cp-btn class:genric-btn class:primary class:circle "Send Message"]</div></div>';

        return $template;

    } else {
    return $template;
    } 
}
add_filter( 'wpcf7_default_template', 'bakery_contact7_form_content', 10, 2 );


function return_tab_data( $getTags, $menu_tabs ) {


	$y = [];
	foreach ( $getTags as $val ) {

		$t = [];

		foreach( $menu_tabs as $data ) {
			if( $data['label'] == $val ) {
				$t[] = $data;
			}
		}

		$y[$val] = $t;

	}

	return $y;
}