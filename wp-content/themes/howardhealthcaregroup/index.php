<?php get_header(); ?>

<?php get_template_part('partials/masthead'); ?>

<?php $pagination = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1; ?>
<?php if ( 1 === $pagination ) : // Only show Featured post on first page of posts ?>
    <?php
        $featured_post_query = new WP_Query(
            [
                'posts_per_page' => 1,
                'meta_key'       => 'post_featured',
                'meta_value'     => '1',
            ] 
        );
    ?>
    <?php if ( $featured_post_query->have_posts() ) : while ( $featured_post_query->have_posts() ) : $featured_post_query->the_post(); ?>
        <div class="featured-post">
            <div class="container">
                <h5>
                    <span>FEATURED POST</span>
                </h5>
                <?php get_template_part( 'partials/loop-content' ); ?>
            </div>
        </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
<?php endif; ?>

<?php if( have_posts() ): ?>
    <section class="blog-listing-container js-load-more-block section-padding bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-listing js-load-more-posts">    
                        <?php while( have_posts() ): the_post(); ?>
                            <?php get_template_part( 'partials/loop-content' ); ?>
                        <?php endwhile; ?>
                    </div>
                    <div class="blog-listing__pagination">
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