<section class="cta cta--newsletter section-padding">
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
                        <div class="cta__info__form">
                            <?php echo apply_shortcodes(get_field('form_shortcode')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>