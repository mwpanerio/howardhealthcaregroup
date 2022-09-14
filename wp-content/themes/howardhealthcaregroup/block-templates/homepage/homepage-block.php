<?php

/** 
 * $template note:
 * 
 * Block names should be prefixed with acf/. So if the name you specified in
 * fx_register_block is 'your-block-name', the name you should use here is
 * 'acf/your-block-name' 
 */

$template = [
	['acf/homepage-masthead-slider'],
    ['acf/homepage-icon-with-text'],
    ['acf/homepage-half-image-text'],
    ['acf/homepage-testimonial-with-form'],
    ['acf/homepage-half-floating-image-text'],
    ['acf/homepage-full-width-background-text'],
    ['acf/homepage-post-to-display'],
    ['acf/homepage-cta'],
];

?>

<div>
    <InnerBlocks template="<?php echo esc_attr( wp_json_encode( $template ) )?>" templateLock="all" />
</div>
