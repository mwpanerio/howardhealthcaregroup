<section class="wysiwyg section-padding <?php the_field('background_color'); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <?php if(get_field('add_sidebar_form')): ?>
                    <div class="wysiwyg__content-sidebar">
                        <div class="wysiwyg__content">
                            <div class="content-section">
                                <?php echo get_field('content'); ?>
                            </div>
                        </div>
                        <div class="wysiwyg__sidebar">
                            <div class="wysiwyg__sidebar__column">
                                <?php if($form_title = get_field('form_title')): ?>
                                    <h3 class="text-center"><?php echo $form_title; ?></h3>
                                <?php endif; ?>
                                <?php echo apply_shortcodes(get_field('form_shortcode')); ?>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <?php the_field( 'content' ); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>