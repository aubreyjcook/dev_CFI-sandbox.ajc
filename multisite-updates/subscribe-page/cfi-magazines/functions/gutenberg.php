<?php



//Add custom styles for Gutenberg
add_action( 'enqueue_block_editor_assets', 'cfi_gutenberg_styles' );

/**
 * Load Gutenberg stylesheet.
 */
function cfi_gutenberg_styles() {
	// Load the theme styles within Gutenberg.
	wp_enqueue_style( 'cfi-style', get_theme_root_uri() . '/css/gutenberg-styles.css', array(), filemtime(get_theme_root() . '/css/gutenberg-styles.css') );
	wp_enqueue_style( 'gutenberg-styles', get_stylesheet_directory_uri(). '/gutenberg-styles.css' , array(), filemtime(get_stylesheet_directory() . '/gutenberg-styles.css') );

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
			'acf/posts-feed',
			'acf/collapse',
			'acf/membership-levels',
			'acf/image-card-left',
			'acf/image-card-top',
			'acf/simple-slider',
			'acf/highlight-block',
			'acf/button',
			'acf/cfi-heading',
			'acf/sub-heading',
			'acf/staff-listing',
			'acf/external-sources-block',
			'acf/internal-sources-block',
			'acf/subscribe-block',
			'cool-timleine/shortcode-block',
			'acf/donation-block',
			'jsforwphowto/cfi-heading',
			'jsforwphowto/cfi-subheading',
			'jsforwphowto/external-source',
			'jsforwphowto/staff',
			'jsforwphowto/donation',
			'eedee/block-gutenslider',
			'eedee/block-gutenslide',
			"ub/button",
		);
	}

	if( $post->post_type === 'post' || $post->post_type === 'blog' || $post->post_type === 'newsletter' || $post->post_type === 'videos' ) {
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
			'acf/button',
		);
	}
}
