<section class="testimonials testimonials--lists section-padding bg-gray">
    <div class="container">
        <div class="testimonials-wrap">
            <div class="testimonials-top-content">
                <div class="testimonials-heading">
                    <?php if($subheading = get_field('subheading')): ?>
                    <h5><span><?php echo $subheading; ?></span></h5>
                    <?php endif; ?>
                    <?php if($title = get_field('title')): ?>
                    <h2><?php echo $title; ?></h2>
                    <?php endif; ?>
                </div>
                <?php if($button = get_field('button')): ?>
                <div class="testimonials-btn">
                    <a href="<?php echo $button['url']; ?>" class="btn btn-primary"<?php echo $button['target'] ? ' target="' . $button['target'] . '"': ''; ?>><?php echo $button['title']; ?></a>
                </div>
                <?php endif; ?>
            </div>
            <?php
                $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
                if( empty( $paged ) ) {
                    $paged = 1;
                }

                $args = array(
                    'post_type' => 'testimonial',
                    'posts_per_page' => get_option('posts_per_page'),
                    'paged'=> $paged
                );

                $testimonial_posts = new WP_Query( $args );
                $load_more_total = $testimonial_posts->found_posts;

                if($testimonial_posts->have_posts()):
            ?>
            <div class="testimonials-column js-load-more-block"
                data-load-more-post-type="<?php echo esc_attr('testimonial'); ?>"
                data-load-more-total="<?php echo esc_attr( $load_more_total ); ?>"
                data-load-more-current-page="<?php echo esc_attr( $paged ); ?>">
                <div class="testimonials-column__inner js-load-more-posts">
                    <?php while($testimonial_posts->have_posts()): $testimonial_posts->the_post(); ?>
                        <?php echo get_template_part( 'partials/loop-content' ); ?>
                    <?php endwhile; ?>
                </div>
                <div class="testimonials-column__pagination">
                    <?php get_template_part( 'partials/pagination' ); ?> 
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>