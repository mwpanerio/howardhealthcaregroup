<?php if( have_rows( 'slides' ) ): ?>

<section class="masthead masthead--homepage js-masthead-homepage-slider fx-slider">
    

    <?php $skip_lazy = true; // skip lazy loading for first image to improve paint times
    while( have_rows( 'slides' ) ): the_row(); ?>
        <article class="masthead-slide fx-slide">

            <?php echo fx_get_image_tag( get_sub_field( 'background_image' ), 'masthead-bg object-fit', ); ?>
            <div class="masthead__content">
                <div class="container">
                    <div class="masthead__content__wrap">
                        <h5><span> <?php the_sub_field( 'subheading' ); ?> </span></h5>
                        <h2 class="masthead-slide__title h1"><?php the_sub_field( 'headline' ); ?></h2>
                        <a href="#" class="btn btn-white"><i class="icon-phone"></i> Call Us Now!</a>
                    </div>
                </div>
            </div>
                    
        </article>
    <?php $skip_lazy = false;
    endwhile; ?>
</section>
<?php endif; ?>
