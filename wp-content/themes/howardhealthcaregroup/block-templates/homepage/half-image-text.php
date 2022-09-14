<?php
    $image_position = get_field('image_position');
    $image = get_field('image');
?>
<section class="image-text section-padding">
    <div class="container">
        <div class="row flex-row<?php echo $image_position = 'right' ? ' flex-opposite' : ''; ?>">
            <div class="col-md-6 image-text__half image-text__img">
                <?php echo fx_get_image_tag($image, 'object-fit'); ?>
                <?php while(have_rows('content_below_the_image')): the_row(); ?>
                <div class="image-text__img__info">
                    <h4>
                        <span>
                            <i class="icon-house"></i>
                            <?php echo get_sub_field('subheading'); ?>
                        </span>
                    </h4>
                    <p><?php echo get_sub_field('title'); ?></p>
                </div>            
                <?php endwhile; ?>
            </div>
            <div class="col-md-6 image-text__half image-text__text">
                <?php while(have_rows('main_content')): the_row(); ?>
                    <h5><span><?php echo get_sub_field('subheading'); ?></span></h5>
                    <h2><?php echo get_sub_field('title'); ?></h2>
                    <div class="read-more__box">
                        <div class="read-more__content js-read-more image-text__read-more">
                            <div class="read-more__wrapper">
                                <?php echo get_sub_field('description'); ?>
                            </div>
                        </div>
                        <a class="expand js-read-more-expand" href="javascript:;">Read More</a>
                    </div>
                    <?php if($button = get_sub_field('button')): ?>
                        <a href="<?php echo $button['url']; ?>" class="btn btn-primary"<?php echo $button['target'] ? ' target="' . $button['target'] . '"': ''; ?>><?php echo $button['title']; ?></a>
                    <?php endif; ?>
                <?php endwhile?>
            </div>
        </div>
    </div>
</section>