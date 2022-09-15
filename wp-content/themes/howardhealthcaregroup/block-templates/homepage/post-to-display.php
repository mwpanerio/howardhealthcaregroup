<section class="cards section-padding bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="cards__top-content text-center">
                    <h5 class="center">
                        <span><?php echo get_field('subheading'); ?></span>
                    </h5>
                    <h2><?php echo get_field('title'); ?></h2>
                </div>
                <div class="row card-flex">
                    <?php
                        $posts = get_field('posts_to_display');

                        foreach($posts as $post):
                    ?>
                    <div class="col-sm-6 col-lg-4 card-item">
                        <a href="<?php echo get_the_permalink($post); ?>" class="card card--link">
                            <div class="card__top">
                                <div class="card__img-wrap">
                                    <?php 
                                        $thumbnail = get_post_thumbnail_id($post) ? get_post_thumbnail_id($post) : get_field('placeholder_image', 'option');
                                        echo fx_get_image_tag($thumbnail, 'card__img object-fit', 'card__img object-fit');
                                    ?>
                                </div>
                                <div class="card__details">
                                    <h4 class="card__title"><?php echo get_the_title($post); ?></h4>
                                    <div class="card__description">
                                        <p>In late 2020, the No Surprises Act was enacted into law. The No Surprises Act changes the landscape for out-of- […] </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card__bottom">
                                <span class="btn btn-tertiary">Continue Reading</span>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php if($button = get_field('button')): ?>
                <div class="cards__all-btn text-center">
                    <a href="<?php echo $button['url']; ?>" class="btn btn-primary"<?php echo $button['target'] ? ' target="' . $button['target'] . '"': ''; ?>><?php echo $button['title']; ?></a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>