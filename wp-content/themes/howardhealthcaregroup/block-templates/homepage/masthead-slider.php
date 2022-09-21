<?php 
    $slides = get_field('slides');
    if( have_rows( 'slides' ) ):
?>

<section class="masthead masthead--homepage js-masthead-homepage-slider fx-slider">
    

    <?php $skip_lazy = true; // skip lazy loading for first image to improve paint times
    while( have_rows( 'slides' ) ): the_row(); ?>
        <article class="masthead-slide fx-slide">
            <div class="masthead-slide__background">
                <?php echo fx_get_image_tag( get_sub_field( 'background_image' ), 'masthead-bg object-fit', ); ?>
            </div>
            <div class="masthead__content">
                <div class="container">
                    <div class="masthead__content__wrap masthead-animation js-masthead-animation">
                        <div class="masthead-animation-item js-masthead-animation-item">
                            <h5><span> <?php the_sub_field( 'subheading' ); ?> </span></h5>
                        </div>
                        <div class="masthead-animation-item js-masthead-animation-item">
                            <h2 class="masthead-slide__title h1"><?php the_sub_field( 'headline' ); ?></h2>
                        </div>
                        <?php if($button = get_sub_field('button')): ?>
                            <div class="masthead-animation-item js-masthead-animation-item">
                                <a href="<?php echo $button['url']; ?>" class="btn btn-white"<?php echo $button['target'] ? ' target="' . $button['target'] . '"' : ''; ?>>
                                    <i class="icon-phone"></i> <?php echo $button['title']; ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if(count($slides) > 1): ?>
                            <div class="masthead__content__dots masthead-animation-item js-masthead-animation-item">
                                <?php $slide_count = 0; foreach($slides as $slide): ?>
                                <button class="<?php echo $slide_count == 0 ? 'is-active ': ''; ?>js-masthead-dot" data-slide-dots="<?php echo $slide_count; ?>"></button>
                                <?php $slide_count++; endforeach ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
                    
        </article>
    <?php $skip_lazy = false;
    endwhile; ?>
</section>
<?php if(get_field('add_testimonial_slider')): ?>
<?php 
    $testimonials = get_field('testimonial_to_posts');
    
    if($testimonials):
?>
<section class="testimonials-block">
    <div class="container">
        <div class="testimonials-block__wrap">
            <h3><span><i class="icon-small-quotes"></i> Client Testimonials</span></h3>
            <div class="js-testimonials-block-slider fx-slider">
                <?php
                    foreach($testimonials as $testimonial):
                ?>
                <div class="testimonials-block-item fx-slide">
                    <div class="testimonials-block__content">
                        <?php echo get_field('testimonial_content', $testimonial); ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
