<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet"> 
    <!-- font-family: 'Lato', sans-serif; -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet"> 
    <!-- font-family: 'Playfair Display', serif; -->

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <?php
        $logo_id    = fx_get_client_logo_image_id(); 
        $home_url   = get_home_url();
    ?>

    <header class="page-header">
        <div class="header-top">
            <div class="container clearfix">
                <div class="logo">
                    <a class="site-logo" href="<?php echo esc_url( $home_url ); ?>">
                        <?php echo fx_get_image_tag( $logo_id, 'img-responsive'); ?>
                    </a>
                </div>
                <div class="header-right">
                    <nav class="nav-primary">
                        <?php
                            wp_nav_menu( array(
                                'menu'           => 'Header Menu', // Do not fall back to first non-empty menu.
                            ) );
                        ?>
                    </nav>
                    <div class="search js-search-toggle hidden-md-down"><i class="icon-search"></i></div>
                    <div class="header-phone-btn hidden-xs-down"><a href="tel:(848) 456-8200" class="btn btn-primary"><i class="icon-phone"></i> (848) 456-8200</a></div>
                    <div class="header-contact-btn hidden-xs-down"><a href="<?php echo get_the_permalink(71); ?>" class="btn btn-primary">Contact Us</a></div>
                    <div class="search js-search-toggle hidden-lg"><i class="icon-search"></i></div>
                    <div class="toggle-menu hidden-lg">
                        <span class="toggle-menu__icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                        <i class="icon-responsive-menu"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-header hidden-sm-up">
            <div class="container clearfix">
                <ul class="clearfix">
                    <li><a href="tel:(848) 456-8200"><i class="icon-phone"></i> (848) 456-8200</a></li>
                    <li><a href="<?php echo get_the_permalink(71); ?>">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <div class="desktop-menu__search">
            <div class="container">
                <div class="desktop-menu_wrap">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
    </header>