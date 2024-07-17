<?php

include(get_stylesheet_directory().'/functions/uploads-customizer-misc.php');
include(get_stylesheet_directory().'/functions/custom-post-types.php');
include(get_stylesheet_directory().'/functions/custom-taxonomies.php');
include(get_stylesheet_directory().'/functions/overrides.php');
include(get_stylesheet_directory().'/functions/acf-fields.php');
include(get_theme_root().'/css/gutenberg.php');
include(get_stylesheet_directory().'/functions/gutenberg.php');

// Include custom blocks
include(get_stylesheet_directory() . '/functions/custom-block.php');
include(get_stylesheet_directory() . '/functions/donation-block.php');


// Everyaction donation script
function register_scripts() {
    wp_enqueue_script('custom_form_js', site_url() . '/js/EAandFormmembership.js', [], true);
    wp_enqueue_script('mobile_nav_js', site_url() . '/js/cfi-mobile-nav.js', [], filemtime(site_url() . '/js/cfi-mobile-nav.js'), true);
}
add_action('wp_enqueue_scripts', 'register_scripts');





// Add Footer Menu
function register_footer_menu() {
    register_nav_menu('secondary-menu',__('Footer Menu'));
}
add_action('init', 'register_footer_menu');


// Queue parent style followed by child/customized style
function theme_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('cfi-style', get_theme_root_uri() . '/css/style.css', array(), filemtime(get_theme_root() . '/css/style.css'));
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime(get_stylesheet_directory() . '/style.css'));
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles', PHP_INT_MAX);

function theme_login_styles() {
    wp_enqueue_style('cfi-style', get_theme_root_uri() . '/css/login.css', array(), filemtime(get_theme_root() . '/css/login.css'));
}
add_action('login_enqueue_scripts', 'theme_login_styles');

add_editor_style();


// adjust the text to "Report abuse" rather than "Report comment"
add_filter('zeno_report_comments_flagging_link_text', 'adjust_flagging_text');
function adjust_flagging_text($text) {
    return '<span class="fas fa-exclamation-circle"></span> Report abuse';
}


// Add options page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
  
    acf_add_options_sub_page(array(
        'page_title' => __('CFI Info'),
        'show_in_graphql' => true,
    ));
	   
	  
    acf_add_options_sub_page(array(
        'page_title' => __('Slider'),
        'show_in_graphql' => true,
    ));
	   
}

/**
 * Add `unfiltered_html` capability to editors (or other user roles).
 * On WordPress multisite, `unfiltered_html` is blocked for everyone but super admins. This gives that cap back to editors 
 * and above.
 *
						 
 * @param  array  $caps    An array of capabilities.
 * @param  string $cap     The capability being requested.
 * @param  int    $user_id The current user's ID.
 */
function my_map_meta_cap($caps, $cap, $user_id) {
    if ('unfiltered_html' === $cap && user_can($user_id, 'administrator' || 'editor'))
        $caps = array('unfiltered_html');			
    return $caps;
}

add_filter('map_meta_cap', 'my_map_meta_cap', 1, 3);

// Remove emojis from CFI.org as it was impacting page speed
																
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

											   
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');

// Add facebook advertising pixel code
function add_facebook_domain_verification_meta_tag() {
    ?>
    <meta name="facebook-domain-verification" content="f0072shakir21st92u1qdzn1voauov" />
    <?php
}
add_action('wp_head', 'add_facebook_domain_verification_meta_tag');

// Add vibe.co TV advertising pixel code
function add_vibetv_pixel_code() {
    ?>
    <script>
        !function(v,i,b,e,c,o){if(!v[c]){var s=v[c]=function(){s.process?s.process.apply(s,arguments):s.queue.push(arguments)};s.queue=[],s.b=1*new Date;var t=i.createElement(b);t.async=!0,t.src=e;var n=i.getElementsByTagName(b)[0];n.parentNode.insertBefore(t,n)}}(window,document,"script","https://s.vibe.co/vbpx.js","vbpx");
        vbpx('init','dREExN');
        vbpx('event', 'page_view');
    </script>
    <?php
}
add_action('wp_head', 'add_vibetv_pixel_code');

function enqueue_custom_styles() {
    if (is_page(311370)) {
        // Enqueue the custom CSS file with a version number based on the file modification time
        wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/custom-style.css', array(), filemtime(get_stylesheet_directory() . '/custom-style.css'), 'all');
        
        // Enqueue the header CSS file with a version number based on the file modification time
        wp_enqueue_style('header-style', get_stylesheet_directory_uri() . '/header-style.css', array(), filemtime(get_stylesheet_directory() . '/header-style.css'), 'all');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');

add_action('wp_enqueue_scripts', 'enqueue_custom_styles');

?>
