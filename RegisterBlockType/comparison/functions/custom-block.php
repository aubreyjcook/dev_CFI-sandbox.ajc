<?php
function custom_block_assets() {
    // Register the block editor script
    wp_register_script(
        'custom-block-script',
        get_stylesheet_directory_uri() . '/blocks/custom-block/block.js',
        array('wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n'), // Dependencies
        filemtime(get_stylesheet_directory() . '/blocks/custom-block/block.js')
    );

    // Register the block editor styles
    wp_register_style(
        'custom-block-editor-style',
        get_stylesheet_directory_uri() . '/blocks/custom-block/editor.css',
        array('wp-edit-blocks'), // Dependencies
        filemtime(get_stylesheet_directory() . '/blocks/custom-block/editor.css')
    );

    // Register the front-end styles
    wp_register_style(
        'custom-block-style',
        get_stylesheet_directory_uri() . '/blocks/custom-block/style.css',
        array(),
        filemtime(get_stylesheet_directory() . '/blocks/custom-block/style.css')
    );

    // Register the block type
    register_block_type('mytheme/custom-block', array(
        'editor_script' => 'custom-block-script',
        'editor_style' => 'custom-block-editor-style',
        'style' => 'custom-block-style',
    ));
}

add_action('init', 'custom_block_assets');
?>
