<?php
    $subheading = get_field('subheading');
    $title = get_field('title');
    $description = get_field('description');
?>

<section class="fx-accordion fx-accordion js-accordion section-padding">
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
                <div class="fx-accordion__panels">
                    <?php 
                        $accordion_count = 0; 
                        while(have_rows('accordion')): the_row();
                    ?>
                    <article class="fx-accordion__panel js-accordion-item is-expanded" data-accordion-id="<?php echo $accordion_count; ?>">
                        <button class="fx-accordion__panel__toggle js-accordion-headline" type="button" data-accordion-id="<?php echo $accordion_count; ?>"><?php echo get_sub_field('heading'); ?></button>
                        <div class="fx-accordion__panel__content">
                            <?php echo get_sub_field('description'); ?>
                        </div>
                    </article>
                    <?php $accordion_count++; endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</section>