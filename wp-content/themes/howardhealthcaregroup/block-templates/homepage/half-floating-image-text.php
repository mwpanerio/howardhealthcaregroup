<section class="image-text image-text-floating--homepage section-padding">
    <div class="container">
        <div class="row flex-row column-reverse two-image">
            <div class="col-md-6 image-text__half image-text__img">
                <?php while(have_rows('image_to_display')): the_row(); ?>
                <div class="image-text__img__overlay">
                    <?php if($large_image = get_sub_field('large_image')): ?>
                    <div class="image-text__img__large">
                        <span></span>
                        <?php echo fx_get_image_tag($large_image, 'object-fit'); ?>
                    </div>
                    <?php endif; ?>
                    <?php if($small_image = get_sub_field('small_image')): ?>
                    <div class="image-text__img__small">
                        <span></span>
                        <?php echo fx_get_image_tag($small_image, 'object-fit'); ?>
                    </div>
                    <?php endif; ?>
                </div> 
                <?php endwhile; ?>
            </div>
            <div class="col-md-6 image-text__half image-text__text">
                <h5><span><?php echo get_field('subheading'); ?></span></h5>
                <h2><?php echo get_field('title'); ?></h2>
                <?php echo get_field('description'); ?>
            </div>
        </div>
    </div>
</section>