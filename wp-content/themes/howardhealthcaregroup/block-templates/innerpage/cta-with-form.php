<section class="full-width-image-text full-width-image-gradient-overlay section-padding full-width-image-text--box-overlay full-width-image-text--direct-overlay">
    <?php echo fx_get_image_tag(get_field('background_image'), 'full-width-image-text__img object-fit'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="full-width-image-text__content full-width-image-text__form">
                    <?php if($form_title = get_field('form_title')): ?>
                    <h3 class="text-center"><?php echo $form_title; ?></h3>
                    <?php endif; ?>
                    <?php echo apply_shortcodes(get_field('form_shortcode')); ?>
                </div>
            </div>
        </div>
    </div>
</section>