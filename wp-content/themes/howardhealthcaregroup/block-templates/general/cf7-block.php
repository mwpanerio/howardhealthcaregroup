<?php
    $subheading = get_field('subheading');
    $title = get_field('title');
    $description = get_field('description');
    $form = get_field('cf7_shortcode');
    $form_title = get_field('form_title');
    $contact_info_sidebar = get_field('add_contact_info_sidebar');
?>
<section class="page-contact section-padding bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="contact-details">
                    <div class="contact-top-content">
                        <?php if($subheading): ?>
                            <h5><span><?php echo $subheading; ?></span></h5>
                        <?php endif; ?>
                        <?php if($title): ?>
                            <h2><?php echo $title; ?></h2>
                        <?php endif; ?>
                        <?php if($description): ?>
                            <?php echo $description; ?>
                        <?php endif; ?>
                    </div>
                    <div class="form-block">
                        <div class="form-block__top-content text-center">
                            <?php if($form_title): ?>
                                <h3><?php echo $form_title; ?></h3>
                            <?php endif; ?>
                        </div>
                        <?php
                            if( !empty( $form ) ) {
                                echo apply_shortcodes( $form );
                            }
                        ?>
                    </div>
                    <div class="form-info text-center">
                        <p>This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy" target="_blank"> Privacy Policy</a> and <a href="https://policies.google.com/terms" target="_blank">Terms of Service</a>  apply.</p>
                    </div>
                </div>
            </div>

            <?php if($contact_info_sidebar): ?>
            <div class="col-lg-3 col-lg-offset-1">
                <div class="contact-sidebar">
                    <h3>Our Contact Information</h3>
                    <?php if($phone = get_field('phone', 'option')): ?>
                        <div class="sidebar-col">
                            <h4>Phone <i class="icon-phone"></i></h4>
                            <a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
                        </div>
                    <?php endif; ?>
                    <?php if($fax = get_field('fax', 'option')): ?>
                        <div class="sidebar-col">
                            <h4>Fax <i class="icon-fax"></i></h4>
                            <a href="tel:<?php echo $fax; ?>"><?php echo $fax; ?></a>
                        </div>
                    <?php endif; ?>
                    <?php while(have_rows('addresses', 'option')): the_row(); ?>
                    <div class="sidebar-col">
                        <h4><?php echo get_sub_field('heading'); ?> <i class="icon-location"></i></h4>
                        <?php echo get_sub_field('address'); ?>
                        <div class="derection">
                            <a href="https://maps.google.com/maps?q=<?php echo strip_tags(get_sub_field('address')); ?>">Get Directions <i class="icon-right-arrow"></i></a>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>