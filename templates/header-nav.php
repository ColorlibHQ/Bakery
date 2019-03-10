
<header id="header">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-4 header-top-left no-padding">
                    <div class="menu-social-icons">
		                <?php
		                $args = array(
			                'theme_location' => 'social-menu',
			                'container'      => '',
			                'depth'          => 1,
			                'menu_class'     => 'nav-social',
			                'fallback_cb'    => 'bakery_social_navwalker::fallback',
			                'walker'         => new bakery_social_navwalker(),
		                );
		                wp_nav_menu( $args );
		                ?>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-8 header-top-right no-padding">
                    <?php if( bakery_opt( 'bakery-header-top-phone' ) ) {
                        echo '<a href="tel:'. bakery_opt( 'bakery-header-top-phone' ) .'">'. bakery_opt( 'bakery-header-top-phone' ) .'</a>';
                    }
                    if( bakery_opt( 'bakery-header-top-email' ) ) {
                        echo '<a href="mailto:'. bakery_opt( 'bakery-header-top-email' ) .'">'. bakery_opt( 'bakery-header-top-email' ) .'</a>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>


    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
	        <?php
	        // Header Logo
	        echo bakery_theme_logo();
	        ?>
            <nav id="nav-menu-container">
                <?php
                //
                if( has_nav_menu( 'primary-menu' ) ) {
                    $args = array(
                        'theme_location' => 'primary-menu',
                        'container'      => '',
                        'depth'          => 2,
                        'menu_class'     => 'nav-menu',
                        'fallback_cb'    => 'bakery_bootstrap_navwalker::fallback',
                        'walker'         => new bakery_bootstrap_navwalker(),
                    );  
                    wp_nav_menu( $args );
                }
                ?>
            </nav><!-- #nav-menu-container -->

        </div>
    </div>
</header><!-- #header -->
