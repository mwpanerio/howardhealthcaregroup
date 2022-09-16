<?php

/**
 * Register FX blocks
 * 
 * fx_register_block() is, at its core, a wrapper function for acf_register_block_type with additional parameters for 
 * our supporting functionality 
 * 
 * @see Guru card: https://app.getguru.com/card/Tn9zzk8c/FX-ACF-Blocks
 * @see more info for acf_register_block_type(): https://www.advancedcustomfields.com/resources/acf_register_block_type/
 * 
 * Below is a reference for the parameters you can pass to fx_register_block(). You can also pass any setting from 
 * acf_register_block_type() to fx_register_block().
 * 
 * Required arguments: "name", "title", and "template"
 * 
 */

// @todo — remove $reference_settings before launch
$reference_settings = [

    // required
    'name'                  => '', // (string) unique name to identify block (no spaces)
    'title'                 => '', // (string) display title for block
    'template'              => '', // (string) relative path of the template for block (e.g "/block-templates/innerpage/template.php")
    
    // optional
    'css'                   => '', // (string) block-specific stylesheet. Assumed to be in /themes/fx/assets/css, so use relative path (e.g. "homepage/homepage-block.css")
    'css_deps'              => [], // (array|string) CSS dependency handles. These will be loaded before block's stylesheet. Dependencies must already be registered
    'js'                    => '', // (string) block-specific script. Assumed to be in /themes/fx/assets/js, so use relative path (e.g. "homepage/homepage-block.js")
    'js_deps'               => [], // (array|string) JS dependency handles. These will be loaded before block's script. Dependencies must already be registered
    'description'           => '', // (string) short, useful description of block to indicate block's purpose
    'category'              => '', // (string) category for where block appears in Block Library
    'icon'                  => '', // (array|string) can be a dashicon or SVG image used to identify the block
    'keywords'              => '', // (array) terms to help find block in block editor
    'post_types'            => [], // (array) if declared, will restrict block to being available for only specified post types. Default is "page"
    'exclude_post_types'    => [], // (array) post types that block should NOT appear for
    'mode'                  => '', // (string) display mode for block when you add block in Block Editor
    'supports'              => '', // (associative array) features to support. See https://developer.wordpress.org/block-editor/developers/block-api/block-supports/
];




/**
 * General blocks
 * 
 * These blocks are intended to be used anywhere, including the homepage and innerpage.
 * 
 * Block template path: /themes/fx/block-templates/general
 * Stylesheet path:     /themes/fx/assets/css/general
 * Script path:         /themes/fx/assets/js/general
 * 
 */


/**
 * Create a "FX General Blocks" category in the block editor. Use "fx-general-blocks" as your "category" value in 
 * fx_register_block()
 * 
 */
fx_add_block_category( 'FX General Blocks', 'fx-general-blocks' );


/**
 * Plain WYSIWYG block for general usage
 * 
 */
fx_register_block(
    [
        'name'          => 'wysiwyg',
        'title'         => 'WYSIWYG',
        'template'      => 'innerpage/wysiwyg.php',
        'description'   => 'A basic "What you see is what you get" editor.',
        'css_deps'      => [ 'fx_wysiwyg', 'fx_choices_custom', 'contact-form-7' ],
        'js_deps'       => [ 'contact-form-7', 'wpcf7-recaptcha', 'google-recaptcha' ],
        'post_types'    => [],
    ]
);


/**
 * To avoid issues with CF7 assets, we're creating our own CF7 block. You shouldn't need to touch this section.
 *
 */
$cf7_settings = [
    'name'          => 'cf7-block',
    'title'         => 'CF7 Block',
    'template'      => 'general/cf7-block.php',
    'description'   => 'Adds a CF7 block to page',
    'css'           => 'innerpage/form-block.css',
    'css_deps'      => [ 'fx_choices_custom', 'contact-form-7' ],
    'js_deps'       => [ 'contact-form-7', 'wpcf7-recaptcha', 'google-recaptcha' ],
    'keywords'      => [ 'cf7', 'contact', 'form' ],
    'mode'          => 'edit',
    'post_types'    => [], // all post types
];
$cf7_icon = WP_PLUGIN_DIR . '/contact-form-7/assets/icon.svg';
if( file_exists( $cf7_icon ) ) {
    $cf7_settings['icon'] = file_get_contents( $cf7_icon );
}
fx_register_block( $cf7_settings );

// @todo — add additional general blocks below with the "fx-general-blocks" category




/**
 * Homepage blocks
 * 
 * These blocks are intended to be used ONLY on the homepage.
 * 
 * Block template path: /themes/fx/block-templates/homepage
 * Stylesheet path:     /themes/fx/assets/css/homepage
 * Script path:         /themes/fx/assets/js/homepage
 * 
 */

/**
 * Create a "FX Homepage Blocks" category in the block editor. Use "fx-homepage-blocks" as your "category" value in 
 * fx_register_block()
 * 
 */
fx_add_block_category( 'FX Homepage Blocks', 'fx-homepage-blocks' );


/**
 * This is the main homepage "outer block." All other homepage blocks should be added within this block in the Block 
 * Editor and in block-templates/homepage/homepage-block.php
 * 
 */
fx_register_block(
    [
        'name'          => 'homepage-block',
        'title'         => 'Homepage',
        'template'      => 'homepage/homepage-block.php',
        'description'   => 'The main content block for the homepage',
        'mode'          => 'preview',
        'supports'      => [ 'jsx' => true ], // enables support for inner blocks
        'category'      => 'fx-homepage-blocks',
    ]
);

// @todo —  remove this block if not using a homepage masthead slider

fx_register_block(
    [
        'name'          => 'homepage-masthead-slider',
        'title'         => 'Homepage - Masthead Slider',
        'template'      => 'homepage/masthead-slider.php',
        'description'   => 'Slider block for the homepage masthead.',
        'css'           => 'homepage/masthead-static.css',
        'css_deps'      => [ 'fx_slick' ],
        'js'            => 'homepage/masthead-slider.js',
        'js_deps'       => [ 'fx_slick' ],
        'category'      => 'fx-homepage-blocks',
    ]
);

fx_register_block(
    [
        'name'          => 'homepage-icon-with-text',
        'title'         => 'Homepage - Icon With Text',
        'template'      => 'homepage/icon-with-text.php',
        'description'   => '',
        'css'           => 'homepage/icon-with-text.css',
        'category'      => 'fx-homepage-blocks',
    ]
);

fx_register_block(
    [
        'name'          => 'homepage-half-image-text',
        'title'         => 'Homepage - Half Image Text',
        'template'      => 'homepage/half-image-text.php',
        'description'   => '',
        'css_deps'      => [ 'fx_contained_image_text' ],
        'category'      => 'fx-homepage-blocks',
    ]
);

fx_register_block(
    [
        'name'          => 'homepage-testimonial-with-form',
        'title'         => 'Homepage - Testimonial With Form',
        'template'      => 'homepage/testimonial-with-form.php',
        'description'   => '',
        'css'           => 'homepage/testimonial-with-form.css',
        'css_deps'      => [ 'fx_slick', 'fx_choices_custom', 'contact-form-7' ],
        'js'            => 'homepage/testimonials-slider.js',
        'js_deps'       => [ 'fx_slick', 'contact-form-7', 'wpcf7-recaptcha', 'google-recaptcha' ],
        'category'      => 'fx-homepage-blocks',
    ]
);


fx_register_block(
    [
        'name'          => 'homepage-half-floating-image-text',
        'title'         => 'Homepage - Floating Double Image with Text',
        'template'      => 'homepage/half-floating-image-text.php',
        'description'   => '',
        'css_deps'      => [ 'fx_contained_image_text' ],
        'category'      => 'fx-homepage-blocks',
    ]
);

fx_register_block(
    [
        'name'          => 'homepage-full-width-background-text',
        'title'         => 'Homepage - Full Width Background with Text',
        'template'      => 'homepage/full-width-background-text.php',
        'description'   => '',
        'css_deps'      => [ 'fx_full_width_image_text' ],
        'category'      => 'fx-homepage-blocks',
    ]
);

fx_register_block(
    [
        'name'          => 'homepage-post-to-display',
        'title'         => 'Homepage - Posts To Display',
        'template'      => 'homepage/post-to-display.php',
        'description'   => '',
        'css'           => 'homepage/cards.css',
        'category'      => 'fx-homepage-blocks',
    ]
);

fx_register_block(
    [
        'name'          => 'homepage-cta',
        'title'         => 'Homepage - CTA',
        'template'      => 'homepage/cta.php',
        'description'   => '',
        'css'           => 'homepage/cta.css',
        'category'      => 'fx-homepage-blocks',
    ]
);

// @todo — add additional homepage blocks below with the "fx-homepage-blocks" category




/**
 * Innerpage blocks
 * 
 * These blocks are intended to be used ONLY on innerpages
 * 
 * Block template path: /themes/fx/block-templates/innerpage
 * Stylesheet path:     /themes/fx/assets/css/innerpage
 * Script path:         /themes/fx/assets/js/innerpage
 * 
 */

/**
 * Create a "FX Innerpage Blocks" category in the block editor. Use "fx-innerpage-blocks" as your "category" value in 
 * fx_register_block()
 * 
 */
fx_add_block_category( 'FX Innerpage Blocks', 'fx-innerpage-blocks' );

// @todo — add additional innerpage blocks below with the "fx-innerpage-blocks" category

fx_register_block(
    [
        'name'          => 'innerpage-cta-with-form',
        'title'         => 'Innerpage - CTA with Form',
        'template'      => 'innerpage/cta-with-form.php',
        'description'   => '',
        'css_deps'      => [ 'fx_full_width_image_text', 'fx_choices_custom', 'contact-form-7' ],
        'js_deps'       => [ 'contact-form-7', 'wpcf7-recaptcha', 'google-recaptcha' ],
        'category'      => 'fx-innerpage-blocks',
    ]
);

fx_register_block(
    [
        'name'          => 'innerpage-image-buttons',
        'title'         => 'Innerpage - Image Buttons',
        'template'      => 'innerpage/image-buttons.php',
        'description'   => '',
        'css'           => 'innerpage/image-buttons.css',
        'category'      => 'fx-innerpage-blocks',
    ]
);

fx_register_block(
    [
        'name'          => 'innerpage-icon-buttons',
        'title'         => 'Innerpage - Icon Buttons',
        'template'      => 'innerpage/icon-buttons.php',
        'description'   => '',
        'css'           => 'innerpage/card-icon.css',
        'category'      => 'fx-innerpage-blocks',
    ]
);

fx_register_block(
    [
        'name'          => 'innerpage-half-image-text',
        'title'         => 'Innerpage - Half Image / Half Text',
        'template'      => 'innerpage/half-image-text.php',
        'description'   => '',
        'css_deps'      => ['fx_contained_image_text'],
        'category'      => 'fx-innerpage-blocks',
    ]
);

fx_register_block(
    [
        'name'          => 'innerpage-full-width-background-image-with-text',
        'title'         => 'Innerpage - Full with Background Overlay with Text',
        'template'      => 'innerpage/full-width-background-image-with-text.php',
        'description'   => '',
        'css_deps'      => ['fx_full_width_image_text'],
        'category'      => 'fx-innerpage-blocks',
    ]
);

fx_register_block(
    [
        'name'          => 'innerpage-accordion',
        'title'         => 'Innerpage - Accordion',
        'template'      => 'innerpage/accordion.php',
        'description'   => '',
        'css_deps'      => ['fx_accordion'],
        'js_deps'      => ['fx_accordion'],
        'category'      => 'fx-innerpage-blocks',
    ]
);

fx_register_block(
    [
        'name'          => 'innerpage-testimonials',
        'title'         => 'Innerpage - Testimonials',
        'template'      => 'innerpage/testimonials.php',
        'description'   => '',
        'css'           => 'innerpage/testimonials.css',
        'css_deps'      => [ 'fx_slick' ],
        'js'            => 'homepage/testimonials-slider.js',
        'js_deps'       => [ 'fx_slick' ],
        'category'      => 'fx-innerpage-blocks',
    ]
);

fx_register_block(
    [
        'name'          => 'innerpage-cta-call-us-button',
        'title'         => 'Innerpage - CTA with Call Us Button',
        'template'      => 'innerpage/cta-call-us-button.php',
        'description'   => '',
        'css'           => 'homepage/cta.css',
        'category'      => 'fx-innerpage-blocks',
    ]
);

fx_register_block(
    [
        'name'          => 'innerpage-cta-with-newsletter-signup',
        'title'         => 'Innerpage - CTA with Newsletter Signup',
        'template'      => 'innerpage/cta-with-newsletter-signup.php',
        'description'   => '',
        'css'           => 'homepage/cta.css',
        'category'      => 'fx-innerpage-blocks',
    ]
);