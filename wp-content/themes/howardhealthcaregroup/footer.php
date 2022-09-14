        <!-- <footer id="page-footer" class="page-footer">

            <div class="footer-contact-info">
                <?php
                    // gets contact information set in Theme Settings
                    $address    = fx_get_client_address();
                    $email      = fx_get_client_email( true );
                    $phone      = fx_get_client_phone_number();
                    $phone_link = fx_get_client_phone_number( true );
                ?>

                <h5 class="footer__headline">Contact Us</h5>

                <?php if( !empty( $address ) ): ?>
                    <address class="footer-contact__address">
                        <?php echo $address; ?>
                    </address>
                <?php endif; ?>

                <?php if( !empty( $email ) ): ?>
                    <div class="footer-contact__email">
                        Email: <a href="<?php echo esc_url( sprintf( 'mailto:%s', $email ) ); ?>"><?php echo $email; ?></a>
                    </div>
                <?php endif; ?>

                <?php if( !empty( $phone ) ): ?>
                    <div class="footer-contact__phone">
                        Call: <a href="<?php echo esc_url( sprintf( 'tel:%s', $phone_link ) ); ?>"><?php echo $phone; ?></a>
                    </div>
                <?php endif; ?>
            </div>
            
            <?php
                // Output the footer navigation
                wp_nav_menu(
                    [
                        'container'         => 'nav',
                        'container_class'   => 'footer-navigation',
                        'depth'             => 1,
                        'theme_location'    => 'footer_menu',
                    ]
                );
            ?>
        </footer> -->

        <footer class="page-footer">
            <div class="container">
                <div class="footer-wrap">
                    <div class="footer-logo-col column col-bdr">
                        <div class="footer-logo ">
                            <a href="#"><img src="../wp-content/themes/howardhealthcaregroup/assets/img/footer-logo.png" alt="Cohen Howard, LLP" class="img-responsive"></a>
                            <div class="logo-info">
                                <?php echo get_field('copyright_text', 'option'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="footer-contact-col column col-bdr">
                        <h3>Contact Information</h3>
                        <?php while(have_rows('addresses', 'option')): the_row(); ?>
                        <p>
                            <i class="icon-location"></i>
                            <?php echo get_sub_field('heading'); ?>
                            <span><?php echo get_sub_field('address'); ?></span>
                        </p>
                        <div class="derection">
                            <a href="https://maps.google.com/maps?q=<?php echo strip_tags(get_sub_field('address')); ?>">Get Directions <i class="icon-right-arrow"></i></a>
                        </div>
                        <?php endwhile; ?>
                        <div class="footer-phone">
                            <?php if($phone = get_field('phone', 'option')): ?>
                                <p><i class="icon-phone"></i> <a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></p>
                            <?php endif; ?>
                            <?php if($fax = get_field('fax', 'option')): ?>
                                <p><i class="icon-fax"></i> <a href="tel:<?php echo $fax; ?>"><?php echo $fax; ?></a></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="footer-col column hidden-lg hidden-xs-down">
                        <div class="back-top-btn"><a href="#top" class="btn btn-primary">Back to Top <i class="icon-up-arrow"></i></a></div>
                        <div class="footer-bottom">
                            <ul>
                                <?php while(have_rows('helper_links', 'option')): the_row(); ?>
                                <li>
                                    <a href="<?php echo get_sub_field('links')['url']; ?>"<?php echo get_sub_field('links')['target'] ? ' target="' . get_sub_field('links')['target'] . '"': ''; ?>><?php echo get_sub_field('links')['title']; ?> </a>
                                </li>
                                <?php endwhile; ?>
                                <li>Copyright © <?php echo date('Y'); ?>. All Rights Reserved.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-links-col column col-bdr ">
                        <h3>Quick Links</h3>
                        <?php
                            // Output the footer navigation
                            wp_nav_menu(
                                [
                                    'menu'           => 'Quick Links',
                                ]
                            );
                        ?>
                    </div>
                    <div class="footer-col column hidden-sm hidden-md">
                        <div class="back-top-btn"><a href="#top" class="btn btn-primary">Back to Top <i class="icon-up-arrow"></i></a></div>
                        <div class="footer-bottom">
                            <ul>
                                <?php while(have_rows('helper_links', 'option')): the_row(); ?>
                                <li>
                                    <a href="<?php echo get_sub_field('links')['url']; ?>"<?php echo get_sub_field('links')['target'] ? ' target="' . get_sub_field('links')['target'] . '"': ''; ?>><?php echo get_sub_field('links')['title']; ?> </a>
                                </li>
                                <?php endwhile; ?>
                                <li>Copyright © <?php echo date('Y'); ?>. All Rights Reserved.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
		
        <!-- Back To Top Icon area
        <button class="back-to-top js-back-to-top" type="button">
            <span class="back-to-top__label">Back to top</span>
            <i class="icon-arrow-up"></i>
        </button>
        -->

        <?php wp_footer(); ?>
    </body>
</html>
