<section class="cta section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="cta__wrap">
                    <div class="cta__content">
                        <?php if($subheading = get_field('subheading')): ?>
                        <h5><span><?php echo $subheading; ?></span></h5>
                        <?php endif; ?>
                        <?php if($title = get_field('title')): ?>
                        <h2><?php echo $title; ?></h2>
                        <?php endif; ?>
                    </div>
                    <div class="cta__info">
                        <?php while(have_rows('button')): the_row(); ?>
                        <div class="cta__info__wrap">
                            <?php if($upper_text = get_sub_field('upper_text') ): ?>
                            <h4><?php echo $upper_text; ?></h4>
                            <?php endif; ?>
                            <a href="tel:<?php echo strip_tags(get_sub_field('phone_number')); ?>">
                                <i class="icon-phone"></i>
                                <span><?php echo get_sub_field('phone_number'); ?></span>
                            </a>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>