<?php
    $background_overlay_type = get_field('background_overlay_type');
    $background_image = get_field('background_image');
?>
<?php if($background_overlay_type == 'gradient'): ?>
<section class="full-width-image-text section-padding full-width-image-text--direct-overlay full-width-image-gradient-overlay2">
    <?php echo fx_get_image_tag($background_image, 'full-width-image-text__img object-fit'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <?php while(have_rows('content')): the_row(); ?>
                <div class="full-width-image-text__content">
                    <?php if($subheading = get_sub_field('subheading')): ?>
                    <h5><span><?php echo $subheading; ?></span></h5>
                    <?php endif; ?>
                    <?php if($title = get_sub_field('title')): ?>
                    <h2 class="full-width-image-text__headline"><?php echo $title; ?></h2>
                    <?php endif; ?>
                    <?php if($description = get_sub_field('description')): ?>
                        <div class="full-width-image-text__description">
                            <?php echo $description; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>
<?php else: ?>
    <?php $background_color = get_field('background_color'); ?>
    <section class="full-width-image-text full-width-image-<?php echo $background_color; ?>-overlay section-padding full-width-image-text--box-overlay full-width-image-text--direct-overlay">
        <?php echo fx_get_image_tag($background_image, 'full-width-image-text__img object-fit'); ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <?php while(have_rows('content')): the_row(); ?>
                    <div class="full-width-image-text__content">
                        <?php if($subheading = get_sub_field('subheading')): ?>
                        <h5><span><?php echo $subheading; ?></span></h5>
                        <?php endif; ?>
                        <?php if($title = get_sub_field('title')): ?>
                        <h2 class="full-width-image-text__headline"><?php echo $title; ?></h2>
                        <?php endif; ?>
                        <?php if($description = get_sub_field('description')): ?>
                            <div class="full-width-image-text__description">
                                <?php echo $description; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>