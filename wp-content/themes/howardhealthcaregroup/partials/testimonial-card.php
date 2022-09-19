<div class="testimonials-column__item">
    <div class="testimonials-content">
        <i class="icon-large-quotes"></i>
        <?php echo get_field('testimonial_content', get_the_ID()); ?>
        <h4><span>– <?php echo get_field('client_name', get_the_ID()); ?></span> <?php echo get_field('location', get_the_ID()) ? ', ' . get_field('location', get_the_ID()): ''; ?> </h4>
    </div>
</div>