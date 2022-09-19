<?php
    $image_to_display_type = get_field('image_to_display_type');
    $image_class_modifier = '';

    if($image_to_display_type == 'single') {
        $image_class_modifier = 'inner';
    } else {
        $image_class_modifier = 'two-image';
    }
?>
<section class="image-text image-text--<?php echo $image_class_modifier; ?> section-padding <?php echo get_field('background_color'); ?>">
    <div class="container">
        <div class="row flex-row <?php echo $image_class_modifier; ?> <?php echo get_field('image_position') == 'right' ? 'flex-opposite': ''; ?>">
            <div class="col-md-6 image-text__half image-text__img">
                <?php if($image_to_display_type == 'single'): ?>
                    <?php while(have_rows('image_to_display')): the_row(); ?>
                        <?php if($main_image = get_sub_field('main_image')): ?>
                            <?php echo fx_get_image_tag($main_image, 'object-fit'); ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="image-text__img__overlay">
                        <?php while(have_rows('image_to_display')): the_row(); ?>
                            <?php if($main_image = get_sub_field('main_image')): ?>
                            <div class="image-text__img__large">
                                <?php echo fx_get_image_tag($main_image, 'object-fit'); ?>
                            </div>
                            <?php endif; ?>
                            <?php if($floating_image = get_sub_field('floating_image')): ?>
                            <div class="image-text__img__small">
                                <?php echo fx_get_image_tag($floating_image, 'object-fit'); ?>
                            </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div> 
                <?php endif; ?>
            </div>
            <div class="col-md-6 image-text__half image-text__text">
                <?php if($subheading = get_field('subheading')): ?>
                    <h5><span><?php echo $subheading; ?></span></h5>
                <?php endif; ?>
                <?php if($title = get_field('title')): ?>
                    <h2><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php if($description = get_field('description')): ?>
                    <?php echo $description; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- <section class="image-text image-text--two-image section-padding">
    <div class="container">
        <div class="row flex-row column-reverse two-image">
            <div class="col-md-6 image-text__half image-text__img">
                <div class="image-text__img__overlay">
                    <div class="image-text__img__large">
                        <img src="../wp-content/themes/howardhealthcaregroup/assets/img/left-image-learge.jpg" alt="" class="object-fit">
                    </div>
                    <div class="image-text__img__small">
                        <img src="../wp-content/themes/howardhealthcaregroup/assets/img/left-image-small.jpg" alt="" class="object-fit">
                    </div>
                </div>       
            </div>
            <div class="col-md-6 image-text__half image-text__text">
                <h5><span>This is an Example Sub-Heading</span></h5>
                <h2>This is a Half n Half Section</h2>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr.</p>
                <a href="#" class="btn btn-primary">Primary CTA Button</a>
            </div>
        </div>
    </div>
</section> -->