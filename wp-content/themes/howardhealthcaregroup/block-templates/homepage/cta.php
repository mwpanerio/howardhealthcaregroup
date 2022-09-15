<section class="cta section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="cta__wrap">
                    <div class="cta__content">
                        <h5><span><?php echo get_field('subheading'); ?></span></h5>
                        <h2><?php echo get_field('title'); ?></h2>
                    </div>
                    <div class="cta__info">
                        <?php while(have_rows('button')): the_row(); ?>
                        <div class="cta__info__wrap">
                            <h4><?php echo get_sub_field('upper_text'); ?></h4>
                            <a href="tel:<?php echo strip_tags(get_sub_field('lower_text')); ?>">
                                <?php echo get_sub_field('lower_text'); ?>
                            </a>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>