<?php get_header(); ?>

<?php get_template_part('partials/masthead'); ?>

<?php if( have_posts() ): ?>
    <section class="<?php echo get_post_type(); ?>-listing-container js-load-more-block bg-gray section-padding" data-load-more-post-type="<?php echo get_post_type(); ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="<?php echo get_post_type(); ?>-listing js-load-more-posts">    
                        <?php while( have_posts() ): the_post(); ?>
                            <?php get_template_part( 'partials/loop-content' ); ?>
                        <?php endwhile; ?>
                    </div>
                    <div class="<?php echo get_post_type(); ?>-listing__pagination">
                        <div class="col-xxs-12">
                            <?php get_template_part( 'partials/pagination' ); ?> 
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>  
            </div>
        </div>
    </section>
<?php else: ?>
    Sorry, we couldn't find any posts.
<?php endif; ?>

<section class="cta cta--newsletter section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="cta__wrap">
                    <div class="cta__content">
                        <h5><span>STAY IN THE LOOP</span></h5>
                        <h2>Subscribe to Our Newsletter</h2>
                    </div>
                    <div class="cta__info">
                        <div class="cta__info__form">
                            <?php echo apply_shortcodes('[mailpoet_form id="1"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>