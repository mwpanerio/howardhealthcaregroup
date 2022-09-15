<section class="masthead masthead--innerpage">
    <div class="container">
        <div class="masthead--innerpage__wrap">
            <?php if ( is_search() ): ?>
                <h3 class="h1">Search Results</h3><?php /* different heading type for SEO benefit */ ?>
            <?php elseif ( is_home() ): ?>
                <h3 class="h1">Blog</h3><?php /* different heading type for SEO benefit */ ?>
            <?php elseif ( is_404() ) : ?>
                <h1><?php the_field('404_title', 'option'); ?></h1>
            <?php else : ?>
                <h1><?php the_title(); ?></h1>
            <?php endif; ?>
            <div class="back-to-page hidden-sm-up"><a href="#"><i class="icon-left-angle"></i> Go to Home </a></div>
            <?php
                if( function_exists( 'yoast_breadcrumb' ) ) {
                    yoast_breadcrumb( '<div class="breadcrumbs hidden-xs-down">', '</div>' );
                }
            ?>
        </div>
    </div>
</section>