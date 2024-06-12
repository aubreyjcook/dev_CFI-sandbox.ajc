<?php
function my_custom_blocks_assets() {
    // Register the donation block editor script
    wp_register_script(
        'donation-block-script',
        get_stylesheet_directory_uri() . '/blocks/donation-block/block.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n' ),
        filemtime( get_stylesheet_directory() . '/blocks/donation-block/block.js' )
    );

    // Register the donation block editor styles
    wp_register_style(
        'donation-block-editor-style',
        get_stylesheet_directory_uri() . '/blocks/donation-block/editor.css',
        array( 'wp-edit-blocks' ),
        filemtime( get_stylesheet_directory() . '/blocks/donation-block/editor.css' )
    );

    // Register the donation block front-end styles
    wp_register_style(
        'donation-block-style',
        get_stylesheet_directory_uri() . '/blocks/donation-block/style.css',
        array(),
        filemtime( get_stylesheet_directory() . '/blocks/donation-block/style.css' )
    );

    // Register the donation block type
    register_block_type( 'mytheme/donation-block', array(
        'editor_script' => 'donation-block-script',
        'editor_style'  => 'donation-block-editor-style',
        'style'         => 'donation-block-style',
    ) );
}

add_action( 'init', 'my_custom_blocks_assets' );
?>