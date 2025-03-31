<?php

function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Articles';
    $submenu['edit.php'][5][0] = 'Articles';
    $submenu['edit.php'][10][0] = 'Add Articles';
    $submenu['edit.php'][16][0] = 'Tags';
}

function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Articles';
    $labels->singular_name = 'Article';
    $labels->add_new = 'Add Article';
    $labels->add_new_item = 'Add Article';
    $labels->edit_item = 'Edit Article';
    $labels->new_item = 'Articles';
    $labels->view_item = 'View Article';
    $labels->search_items = 'Search Articles';
    $labels->not_found = 'No Articles found';
    $labels->not_found_in_trash = 'No Articles found in Trash';
    $labels->all_items = 'All Articles';
    $labels->menu_name = 'Articles';
    $labels->name_admin_bar = 'Articles';
}
 
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );

// Add Custom Post Types
function create_blog() {
    $args = array(
      'public' => true,
      'label'  => 'Online Exclusives',
      'has_archive' => true,
      'menu_position' => 3,
      'supports' => array('title', 'excerpt', 'editor', 'thumbnail'),
      'taxonomies' => array('post_tag', 'category'),
      'rewrite' => array(
        'with_front' => false,
        'slug'       => 'exclusive'
      ),
      'show_in_rest' => true,
      'show_in_graphql' => true,
        'graphql_single_name' => 'Blog',
      'graphql_plural_name' => 'Blogs',
    );
    register_post_type( 'blog', $args );
}
add_action( 'init', 'create_blog' );

function create_newsletter() {
    $args = array(
      'public' => true,
      'label'  => 'Newsletter',
      'has_archive' => true,
      'menu_position' => 3,
      'supports' => array('title', 'excerpt', 'editor', 'thumbnail'),
      'taxonomies' => array('post_tag', 'category'),
      'rewrite' => array(
        'with_front' => false,
        'slug'       => 'newsletter'
      ),
      'show_in_rest' => true,
    );
    register_post_type( 'newsletter', $args );
}
add_action( 'init', 'create_newsletter' );

function create_videos() {
  $args = array(
    'public' => true,
    'label'  => 'Videos',
    'has_archive' => true,
    'menu_position' => 3,
    'supports' => array('title', 'excerpt', 'editor', 'thumbnail'),
    'taxonomies' => array('post_tag', 'category'),
    'rewrite' => array(
      'with_front' => false,
      'slug'       => 'video'
    ),
    'show_in_rest' => true,
  );
  register_post_type( 'videos', $args );
}
add_action( 'init', 'create_videos' );

