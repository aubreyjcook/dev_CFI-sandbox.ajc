<?php
// Add Custom Taxonomies

function taxonomy_author_init() {
    $labels = array(
        'name' => _x( 'Authors', 'taxonomy general name'),
        'singular_name' => _x( 'Author', 'taxonomy singular name'),
        'search_items' => __( 'Search Authors' ),
        'all_items' => __( 'All Authors' ),
        'parent_item' => __( 'Not Applicable' ),
        'edit_item' => __( 'Edit Author' ),
        'update_item' => __( 'Update Author' ),
        'add_new_item' => __( 'Add New Author' ),
        'new_item_name' => __( 'New Author Name' ),
        'menu_name' => __( 'Authors' ),
    );

    register_taxonomy(
        'authors',
        array('post', 'blog', 'newsletter', 'videos'),
        array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_admin_column' => true,
            'rewrite' => array( 'slug' => 'authors' ),
            'show_in_rest' => true,
            'rest_base' => 'authors',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'show_in_graphql' => true,
            'graphql_single_name' => 'ArticleAuthor',
            'graphql_plural_name' => 'ArticleAuthor',
        )
    );
}
add_action( 'init', 'taxonomy_author_init' );

function taxonomy_issues_init() {
    $labels = array(
        'name' => _x( 'Issues', 'taxonomy general name'),
        'singular_name' => _x( 'Issue', 'taxonomy singular name'),
        'search_items' => __( 'Search Issues' ),
        'all_items' => __( 'All Issues' ),
        'parent_item' => __( 'Leave This Blank' ),
        'parent_item_colon' => __( 'Not Applicable:' ),
        'edit_item' => __( 'Edit Issue' ),
        'update_item' => __( 'Update Issue' ),
        'add_new_item' => __( 'Add New Issue' ),
        'new_item_name' => __( 'New Issue Name' ),
        'menu_name' => __( 'Issues' ),
    );

    register_taxonomy(
        'issues',
        array('post', 'blog'), //or array('post', 'custom_post_type_name', 'etc') to add taxonomy to many posts
        array(
            'hierarchical' => false,
            'labels' => $labels,
            'show_admin_column' => true,
            'rewrite' => array( 'slug' => 'issues' )
        )
    );
}
add_action( 'init', 'taxonomy_issues_init' );

function taxonomy_volumes_init() {
$labels = array(
        'name' => _x( 'Volumes', 'taxonomy general name'),
        'singular_name' => _x( 'Volume', 'taxonomy singular name'),
        'search_items' => __( 'Search Volumes' ),
        'all_items' => __( 'All Volumes' ),
        'parent_item' => __( 'Volume Number' ),
        'parent_item_colon' => __( 'Vol # for Issue' ),
        'edit_item' => __( 'Edit Volume' ),
        'update_item' => __( 'Update Volume' ),
        'add_new_item' => __( 'Add New Volume' ),
        'new_item_name' => __( 'New Volume' ),
        'menu_name' => __( 'Volume Info' ),
    );

    register_taxonomy(
        'volume-info',
        array('post'),
        array(
            'public' => true,
            'hierarchical' => true, //make false for tag-style taxonomies
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'has_archive' => true,
            'show_in_rest' => true,
            'rest_base' => 'volume-info',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'labels' => $labels,
            'rewrite' => array( 'slug' => 'volume' ),
            'show_in_graphql' => true,
            'graphql_single_name' => 'VolumeInfo',
            'graphql_plural_name' => 'VolumeInfo',
        )
    );
}
add_action( 'init', 'taxonomy_volumes_init' );

function taxonomy_newsletter_volumes_init() {
$labels = array(
        'name' => _x( 'Volumes', 'taxonomy general name'),
        'singular_name' => _x( 'Volume', 'taxonomy singular name'),
        'search_items' => __( 'Search Volumes' ),
        'all_items' => __( 'All Volumes' ),
        'parent_item' => __( 'Volume Number' ),
        'parent_item_colon' => __( 'Vol # for Issue' ),
        'edit_item' => __( 'Edit Volume' ),
        'update_item' => __( 'Update Volume' ),
        'add_new_item' => __( 'Add New Volume' ),
        'new_item_name' => __( 'New Volume' ),
        'menu_name' => __( 'SB Volume Info' ),
    );

    register_taxonomy(
        'newsletter-volume-info',
        array('newsletter'),
        array(
            'public' => true,
            'hierarchical' => true, //make false for tag-style taxonomies
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'has_archive' => true,
            'labels' => $labels,
            'rewrite' => array( 'slug' => 'newsletter-volume' )
        )
    );
}
add_action( 'init', 'taxonomy_newsletter_volumes_init' );

function subscriber_articles_init() {
$labels = array(
        'name' => _x( 'Article Access', 'taxonomy general name'),
        'singular_name' => _x( 'Article Access', 'taxonomy singular name'),
        'search_items' => __( 'Search Article Access' ),
        'all_items' => __( 'All Article Access' ),
        'parent_item' => __( 'Leave This Blank' ),
        'parent_item_colon' => __( 'Not Applicable:' ),
        'edit_item' => __( 'Edit Article Access' ),
        'update_item' => __( 'Update Article Access' ),
        'add_new_item' => __( 'Add New Article Access' ),
        'new_item_name' => __( 'New Article Access' ),
        'menu_name' => __( 'Article Access' ),
    );

    register_taxonomy(
        'article-access',
        array('post'),
        array(
            'public' => true,
            'hierarchical' => true, //make false for tag-style taxonomies
            'show_ui' => true,
            'show_admin_column' => TRUE,
            'query_var' => true,
            'has_archive' => true,
            'labels' => $labels,
            'show_in_rest' => true,
            'rest_base' => 'article-access',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'rewrite' => array( 'slug' => 'article-access' ),
            'default_term' => 'subscriber-only',
            'show_in_graphql' => true,
            'graphql_single_name' => 'ArticleAccess',
            'graphql_plural_name' => 'ArticleAccess',
        )
    );
}
add_action( 'init', 'subscriber_articles_init' );

