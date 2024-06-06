<?php
/*
Plugin Name: Custom Block
Description: A custom Gutenberg block.
Version: 1.0
Author: ACook
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function custom_block_assets() {
    // Register the block editor script
    wp_register_script(
        'custom-block-script',
        plugins_url( 'block.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n' ),
        filemtime( plugin_dir_path( __FILE__ ) . 'block.js' )
    );

    // Register the block editor styles
    wp_register_style(
        'custom-block-editor-style',
        plugins_url( 'editor.css', __FILE__ ),
        array( 'wp-edit-blocks' ),
        filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' )
    );

    // Register the front-end styles
    wp_register_style(
        'custom-block-style',
        plugins_url( 'style.css', __FILE__ ),
        array(),
        filemtime( plugin_dir_path( __FILE__ ) . 'style.css' )
    );

    // Register the block type
    register_block_type( 'custom-block/block', array(
        'editor_script' => 'custom-block-script',
        'editor_style' => 'custom-block-editor-style',
        'style' => 'custom-block-style',
    ) );
}

add_action( 'init', 'custom_block_assets' );