<section class="full-width-image-text section-padding full-width-image-text--box-overlay full-width-image-text--direct-overlay">
    <?php echo fx_get_image_tag(get_field('background_image'), 'full-width-image-text__img object-fit'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="full-width-image-text__content">
                    <h5><span> <?php echo get_field('subheading'); ?></span></h5>
                    <h2 class="full-width-image-text__headline"><?php echo get_field('title'); ?></h2>
                    <div class="full-width-image-text__description">
                        <div class="read-more__box">
                            <div class="read-more__content js-read-more">
                                <div class="read-more__wrapper">
                                    <?php echo get_field('description'); ?>
                                </div>
                            </div>
                            <a class="expand js-read-more-expand" href="javascript:;">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>