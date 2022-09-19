<?php 
    $icon_with_texts = get_field('icon_with_text');
?>
<section class="text-block-icon bg-gray">
    <div class="container">
        <div class="text-block-icon__wrap">
            <?php if($icon_with_texts): ?>
            <div class="text-block-icon__icon">
                <div class="row card-icon-flex">
                    <?php while(have_rows('icon_with_text')): the_row(); ?>
                    <div class="col-lg-4 col-sm-6 col-xxs-12 card-icon-item js-card-article">
                        <a class="card-icon card-icon--home card-icon--link" href="#">
                            <div class="card-icon__top">
                                <div class="card-icon__img-wrap">
                                    <div class="card-icon__icon">
                                        <?php echo fx_get_image_tag(get_sub_field('icon')); ?>                                           
                                    </div>
                                </div>
                                <div class="card-icon__details">
                                    <h4 class="card-icon__title"><?php echo get_sub_field('title'); ?></h4>
                                    <div class="card-icon__description">
                                        <?php echo get_sub_field('description'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-icon__bottom">
                                <span class="btn btn-tertiary card-icon__cta">Read More</span>
                            </div>
                        </a>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php endif; ?>
            <?php while(have_rows('right_content')): the_row(); ?>
            <div class="text-block-icon__text">
                <h5><span><?php echo get_sub_field('subheading'); ?></span></h5>
                <h2><?php echo get_sub_field('title'); ?></h2>
                <?php echo get_sub_field('description'); ?>
                <div class="text-block-icon__image clearfix">
                    <?php echo fx_get_image_tag(get_sub_field('image')); ?>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>