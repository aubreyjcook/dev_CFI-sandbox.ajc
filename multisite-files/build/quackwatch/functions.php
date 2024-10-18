<?php

include(get_stylesheet_directory().'/functions/uploads-customizer-misc.php');

include(get_stylesheet_directory().'/functions/custom-post-types.php');

include(get_stylesheet_directory().'/functions/custom-taxonomies.php');

include(get_stylesheet_directory().'/functions/acf-fields.php');

include(get_stylesheet_directory().'/functions/overrides.php');

//include(get_theme_root().'/css/gutenberg.php');

//include(get_stylesheet_directory().'/functions/gutenberg.php');

//include(get_stylesheet_directory()./functions/multisite-blog-feed');

// Add everyaction donation script
function register_scripts() {
  wp_enqueue_script( 'custom_form_js', site_url() . '/js/everyactionmembership.js', [], true);
}
add_action( 'wp_enqueue_scripts', 'register_scripts' );

// Adjusting excerpt length for Search
function custom_excerpt_length( $length ) {
    return 125;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Add Footer Menu
function register_footer_menu() {
  register_nav_menu('secondary-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'register_footer_menu' );

// Queue parent style followed by child/customized style
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'cfi-style', get_theme_root_uri() . '/css/style.css', array(), filemtime(get_theme_root() . '/css/style.css') );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime(get_stylesheet_directory() . '/style.css') ) ;
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', PHP_INT_MAX);

function theme_login_styles() {
    wp_enqueue_style( 'cfi-style', get_theme_root_uri() . '/css/login.css', array(), filemtime(get_theme_root() . '/css/login.css') );
}
add_action( 'login_enqueue_scripts', 'theme_login_styles' );

add_editor_style();


// adjust the text to "Report abuse" rather than "Report comment"
add_filter( 'zeno_report_comments_flagging_link_text', 'adjust_flagging_text' );
function adjust_flagging_text( $text ) {
    return '<span class="fas fa-exclamation-circle"></span> Report abuse';
}


// Add options page
if( function_exists('acf_add_options_sub_page') ) {
	acf_add_options_sub_page('Quackwatch Info');
}

