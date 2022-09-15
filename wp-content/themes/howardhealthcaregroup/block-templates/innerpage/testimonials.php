<section class="testimonials testimonials--full section-padding bg-gray">
    <div class="container">
        <div class="row testimonials-row-flex">
            <div class="col-lg-12">
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
                    <div class="testimonials-column">
                        <div class="js-testimonials-slider fx-slider">
                            <?php
                                $testimonial_to_posts = get_field('testimonial_to_post');

                                foreach($testimonial_to_posts as $testimonial_to_post):
                            ?>
                            <div class="testimonials-item fx-slide">
                                <div class="testimonials-content">
                                    <i class="icon-large-quotes"></i>
                                    <?php echo get_field('testimonial_content', $testimonial_to_post); ?>
                                    <h4><span>– <?php echo get_field('client_name', $testimonial_to_post); ?></span> <?php echo get_field('location', $testimonial_to_post) ? ', ' . get_field('location', $testimonial_to_post): ''; ?> </h4>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>