<section class="testimonials-form-block section-padding bg-gray">
    <div class="container">
        <div class="row testimonials-row-flex">
            <div class="col-lg-6">
                <?php while(have_rows('testimonial_section')): the_row(); ?>
                <div class="testimonials-wrap">
                    <div class="testimonials-top-content">
                        <div class="testimonials-heading">
                            <h5><span><?php echo get_sub_field('subheading'); ?></span></h5>
                            <h2><?php echo get_sub_field('title'); ?></h2>
                        </div>
                        <?php if($button = get_sub_field('link')): ?>
                        <div class="testimonials-btn">
                            <a href="<?php echo $button['url']; ?>" class="btn btn-primary"<?php echo $button['target'] ? ' target="' . $button['target'] . '"': ''; ?>><?php echo $button['title']; ?></a>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="testimonials-column">
                        <div class="js-testimonials-slider fx-slider">
                            <?php
                                $testimonial_to_posts = get_sub_field('testimonial_to_post');

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
                <?php endwhile; ?>
            </div>
            <div class="col-lg-6">
                <div class="form-block">
                    <div class="form-block__top-content text-center">
                        <h3>Get in Touch</h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-col">
                                <label>First Name <sup>*</sup></label>
                                <input type="text" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-col">
                                <label>Last Name <sup>*</sup></label>
                                <input type="text" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-col">
                                <label>Work Phone <sup>*</sup></label>
                                <input type="tel" placeholder="###-###-####">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-col">
                                <label>Work Email <sup>*</sup></label>
                                <input type="text" placeholder="example@domain.com">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-col">
                                <label>Practice Name  <sup>*</sup></label>
                                <input type="text" placeholder="Practice Name">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-col">
                                <label>Your Message <sup>*</sup></label>
                                <textarea placeholder="Enter your message here…"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-col text-center">
                                <button class="btn btn-primary">Get in Touch With Team</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>