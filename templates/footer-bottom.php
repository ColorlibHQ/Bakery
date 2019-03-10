<?php 
// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'bakery' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );

?>

<div class="copyright-text">
    <div class="container">
        <div class="row footer-bottom d-flex justify-content-between">
            <p class="col-lg-8 col-sm-6 footer-text m-0"><?php echo wp_kses_post( bakery_opt( 'bakery-copyright-text-settings', $copyText ) ); ?></p>
        </div>
    </div>
</div>