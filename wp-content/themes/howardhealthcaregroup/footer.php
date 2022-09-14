        <footer class="page-footer">
            <div class="container">
                <div class="footer-wrap">
                    <div class="footer-logo-col column col-bdr">
                        <div class="footer-logo ">
                            <?php
                                $logo_id    = fx_get_client_logo_image_id(); 
                                $home_url   = get_home_url();
                            ?>
                            <a href="<?php echo esc_url( $home_url ); ?>">
                                <?php echo fx_get_image_tag( $logo_id, 'img-responsive'); ?>
                            </a>
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
