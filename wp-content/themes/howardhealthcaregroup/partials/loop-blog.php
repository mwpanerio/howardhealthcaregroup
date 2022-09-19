<?php
	$thumb_id = get_post_thumbnail_id();

	// if no thumb ID, check for placeholder image (from ACF options page)
	if( empty( $thumb_id ) ) {
		$thumb_id = get_field( 'placeholder_image', 'option' );
	}

	$img_tag 	= fx_get_image_tag( $thumb_id, 'blog-post__img', 'medium' );
	$permalink 	= get_permalink();
	$terms 		= wp_get_object_terms( get_the_ID(), 'category' );
	$excerpt 	= wp_trim_words( get_the_excerpt(), 20, ' &hellip;' );
?>

<?php $blocks = parse_blocks( $post->post_content );

	foreach ( $blocks as $block ) {
	if ( 'acf/wysiwyg' === $block['blockName'] ) {
			if(isset($block["attrs"]["data"]["content"])) {
				$excerpt = strip_tags(trim($block["attrs"]["data"]["content"]));
			}
			break;
		}
	}

?>

<div class="col-xxs-12 col-xs-12 col-md-12">
	<article class="blog-post__item">
		<article class="blog-post__card">
			<a href="<?php echo esc_url( $permalink ); ?>" class="blog-post__card__link">
				<div class="blog-post__card__upper">
					<span class="blog-post__date hidden-md-down">
						<span><?php echo get_the_date('j'); ?></span>
						<span><?php echo get_the_date('M Y'); ?></span>
					</span>
					<span class="blog-post__date hidden-lg">
						<span><?php echo get_the_date('F j, Y'); ?></span>
					</span>
				</div>
				<h3 class="blog-post__title"><?php the_title(); ?></h3>
				<div class="blog-post__description">
					<p><?php echo $excerpt; ?></p>
				</div>
				<span class="btn btn-tertiary">Continue Reading</span>
			</a>
		</article>
	</article>
</div>
