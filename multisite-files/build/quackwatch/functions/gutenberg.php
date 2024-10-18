<?php

// Customize for the post types that should have Gutenberg
gutenberg_ramp_load_gutenberg(
    [
        'post_types' => [ 'page' ]
    ]
);

//Add custom styles for Gutenberg
//add_action( 'enqueue_block_editor_assets', 'cfi_gutenberg_styles' );

/**
 * Load Gutenberg stylesheet.
 */
function cfi_gutenberg_styles() {
	// Load the theme styles within Gutenberg.
	//wp_enqueue_style( 'cfi-style', get_theme_root_uri() . '/css/gutenberg-styles.css', array(), filemtime(get_theme_root() . '/css/gutenberg-styles.css') );
	//wp_enqueue_style( 'gutenberg-styles', get_stylesheet_directory_uri(). 'gutenberg-styles.css' , array(), filemtime(get_stylesheet_directory() . '/gutenberg-styles.css') );
}

// Customize for the post types that allow Gutenberg and the blocks that should be available
add_filter( 'allowed_block_types', 'misha_allowed_block_types', 10, 2 );
 
function misha_allowed_block_types( $allowed_blocks, $post ) {
 
	if( $post->post_type === 'page' ) {
		return array (
			'core/paragraph',
			'core/image',
			'core/heading',
			'core/gallery',
			'core/list',
			'core/quote',
			'core/audio',
			'core/buttons',
			'core/cover',
			'core/file',
			'core/video',
			'core/code',
			'core/freeform',
			'core/html',
			'core/pullquote',
			'core/table',
			'core/separator',
			'core/spacer',
			'core/columns',
			'core/shortcode',
			'core/embed',
			'core-embed/twitter',
			'core-embed/youtube',
			'core-embed/facebook',
			'core-embed/instagram',
			'core-embed/wordpress',
			'acf/collapse',
			'acf/button',
			'acf/external-sources-block',
			'acf/internal-sources-block',
		);
	}

	/*if( $post->post_type === 'post' || $post->post_type === 'news' || $post->post_type === 'press_releases' ) {
		return array (
			'core/paragraph',
			'core/image',
			'core/heading',
			'core/gallery',
			'core/list',
			'core/quote',
			'core/audio',
			'core/cover',
			'core/file',
			'core/video',
			'core/code',
			'core/freeform',
			'core/html',
			'core/pullquote',
			'core/table',
			'core/separator',
			'core/spacer',
			'core/columns',
			'core/shortcode',
			'core/embed',
			'core-embed/twitter',
			'core-embed/youtube',
			'core-embed/facebook',
			'core-embed/instagram',
			'core-embed/wordpress',
			'acf/button',
		);
	}

	if( $post->post_type === 'luminate_emails' ) {
		return array (
			'acf/email-text',
			'acf/email-full-image',
			'acf/email-image-centered',
			'acf/email-image-right',
			'acf/email-image-left',
			'acf/email-post',
			'acf/email-heading',
			'acf/email-event-listing',
			'acf/email-button',
			'acf/email-divider',
			'acf/email-action-alert',
		); 
	}*/
}
