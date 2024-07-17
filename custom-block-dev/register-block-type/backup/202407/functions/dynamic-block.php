<?php

function register_dynamic_block() {
    wp_register_script(
        'dynamic-block-script',
        get_stylesheet_directory_uri() . '/blocks/dynamic-block/block.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n' ),
        filemtime( get_stylesheet_directory() . '/blocks/dynamic-block/block.js' ),
        true // Load in footer
    );

    wp_register_style(
        'dynamic-block-editor-style',
        get_stylesheet_directory_uri() . '/blocks/dynamic-block/editor.css',
        array( 'wp-edit-blocks' ),
        filemtime( get_stylesheet_directory() . '/blocks/dynamic-block/editor.css' )
    );

    wp_register_style(
        'dynamic-block-style',
        get_stylesheet_directory_uri() . '/blocks/dynamic-block/style.css',
        array(),
        filemtime( get_stylesheet_directory() . '/blocks/dynamic-block/style.css' )
    );

    register_block_type( 'mytheme/dynamic-block', array(
        'editor_script' => 'dynamic-block-script',
        'editor_style'  => 'dynamic-block-editor-style',
        'style'         => 'dynamic-block-style',
        'render_callback' => 'render_dynamic_block'
    ) );
}
add_action( 'init', 'register_dynamic_block' );

function render_dynamic_block($attributes) {
    $script_url = isset($attributes['scriptUrl']) ? esc_url($attributes['scriptUrl']) : '';

    if ($script_url) {
        wp_enqueue_script(
            'external-dynamic-script',
            $script_url,
            array(),
            null,
            true
        );
    }

    ob_start();
    ?>
    <div class="wp-block-mytheme-dynamic-block">
        <!-- Placeholder for external script content -->
        <div id="external-script-placeholder"></div>
    </div>
    <?php
    return ob_get_clean();
}
?>
