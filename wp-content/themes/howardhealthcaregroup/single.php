<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php get_template_part('partials/masthead'); ?>

<section class="blog-single-container bg-gray section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php the_content(); ?>

                <div class="post-pagination">
                    <?php
                        $prev_post = get_previous_post();
                        if (!empty( $prev_post )): ?>
                            <a class="btn-post-pagination btn-previous-post" href="<?php echo $prev_post->guid ?>"><strong>Previous Article</strong><span class="post-pagination-text"><?php echo $prev_post->post_title ?></span><span class="mobile-arrow"></span></a>
                    <?php endif ?>

                     <?php
                        $next_post = get_next_post();
                        if (!empty( $next_post )): ?>
                          <a class="btn-post-pagination btn-next-post" href="<?php echo $next_post->guid ?>"><strong>Next Article</strong><span class="post-pagination-text"><?php echo $next_post->post_title ?></span><span class="mobile-arrow"></span></a>
                    <?php endif ?>
                </div>

                <?php get_template_part( 'partials/social-share' ); ?>
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>  
    </div>
</section>

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
                            <?php echo apply_shortcodes('[contact-form-7 id="180" title="Newsletter Sign Up"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php endwhile; endif; ?>

<?php get_footer();