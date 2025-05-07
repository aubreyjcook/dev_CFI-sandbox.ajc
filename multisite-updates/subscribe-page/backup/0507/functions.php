<?php

include(get_stylesheet_directory().'/functions/uploads-customizer-misc.php');

include(get_stylesheet_directory().'/functions/custom-post-types.php');

// Conditionally switch GTM installation files based on the site ID
if ( get_current_blog_id() == 29 ) {  
    include(get_stylesheet_directory().'/functions/si-gtm-integration.php');
} elseif ( get_current_blog_id() == 26 ) {  
    include(get_stylesheet_directory().'/functions/fi-gtm-integration.php');
}

include(get_stylesheet_directory().'/functions/custom-taxonomies.php');

include(get_stylesheet_directory().'/functions/overrides.php');

include(get_stylesheet_directory().'/functions/acf-fields.php');

include(get_theme_root().'/css/gutenberg.php');

include(get_stylesheet_directory().'/functions/gutenberg.php');



// Add everyaction donation script
function register_scripts() {
  wp_enqueue_script( 'custom_form_js', site_url() . '/js/everyactionmembership.js', [], true);
}
add_action( 'wp_enqueue_scripts', 'register_scripts' );


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


// Add options page
if( function_exists('acf_add_options_sub_page') ) {
	acf_add_options_sub_page('CFI Info');
}




add_filter('wf_pklist_product_table_additional_column_val', 'wt_pklist_add_custom_col_vl', 10, 6);
function wt_pklist_add_custom_col_vl($column_data, $template_type, $columns_key, $_product, $order_item, $order)
{
if($columns_key=='Promo Code')
{
     $column_data='data';
}
return $column_data;
}

//Adding CPTs to category archive pages
function custom_post_type_cat_filter($query) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ($query->is_category()) {
      $query->set( 'post_type', array( 'post', 'videos', 'blog' ) );
    }
  }
}

add_action('pre_get_posts','custom_post_type_cat_filter');

include(get_stylesheet_directory().'/functions/custom-endpoints.php');