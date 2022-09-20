<?php
    $subheading = get_field('subheading');
    $title = get_field('title');
    $description = get_field('description');
?>
<section class="cards-icon bg-gray section-padding cards-icon--inner">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="title-heading text-center">
                    <?php if($subheading): ?>
                    <h5 class="center"><span><?php echo $subheading; ?></span></h5>
                    <?php endif; ?>
                    <?php if($title): ?>
                    <h2><?php echo $title; ?></h2>
                    <?php endif; ?>
                    <?php if($description): ?>
                        <?php echo $description; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row card-icon-flex">
            <?php if(have_rows('icon_buttons')): ?>
            <?php while(have_rows('icon_buttons')): the_row(); ?>
            <div class="col-lg-3 col-sm-6 col-xxs-12 card-icon-item js-card-article">
                <a class="card-icon card-icon--link" href="<?php echo get_sub_field('link')['url']; ?>"<?php echo get_sub_field('link')['target'] ? ' target="' . get_sub_field('link')['target'] . '"': ''; ?>>
                    <div class="card-icon__top">
                        <div class="card-icon__img-wrap">
                            <div class="card-icon__icon">
                                <?php echo fx_get_image_tag(get_sub_field('icon_image')); ?>                                          
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
            <?php endif; ?>
        </div>
    </div>
    </section>