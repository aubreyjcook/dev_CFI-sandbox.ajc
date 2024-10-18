<?php

function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[20][0] = 'Quackwatch';
    //$submenu['edit.php'][5][0] = 'Quackwatch Pages';
    //$submenu['edit.php'][10][0] = 'Add Quackwatch Pages';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['page']->labels;
    $labels->name = 'Quackwatch';
    $labels->singular_name = 'Quackwatch';
    $labels->add_new = 'Add Quackwatch Page';
    $labels->add_new_item = 'Add Quackwatch Page';
    $labels->edit_item = 'Edit Quackwatch Pages';
    $labels->new_item = 'Quackwatch Page';
    $labels->view_item = 'View Quackwatch';
    $labels->search_items = 'Search Quackwatch Pages';
    $labels->not_found = 'No Quackwatch Pages found';
    $labels->not_found_in_trash = 'No Quackwatch Pages found in Trash';
    $labels->all_items = 'All Quackwatch Pages';
    $labels->menu_name = 'Quackwatch';
    $labels->name_admin_bar = 'Quackwatch';
}

add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );


function cfi_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = get_the_author();
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
}
 
add_filter( 'get_the_archive_title', 'cfi_archive_title' );


/* Add Custom Post Types to Author Archives */
function post_types_author_archives($query) {
	
	// Add post types to author archives
	if ( $query->is_taxonomy('authors') )
        $query->set( 'post_type', array('page', 'acupuncture', 'allergy', 'autism', 'cancer', 'cases', 'chelation', 'chiropractic', 'credential', 'dental', 'device', 'diet', 'fibro', 'homeopathy', 'ihealth-pilot', 'infomercial', 'mental-health', 'mlm', 'naturopathy', 'nccam', 'nutrition', 'pharmacy') );
	
	// Remove the action after it's run
	remove_action( 'pre_get_posts', 'post_types_author_archives' );
}
add_action( 'pre_get_posts', 'post_types_author_archives' );

// Add Categories to Page
function add_categories_to_pages() {
    register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'add_categories_to_pages' );

function wpb_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

/*
* Callback function to filter the MCE settings
*/
 
function my_mce_before_init_insert_formats( $init_array ) {  
 
    // Define the style_formats array
     
        $style_formats = array(  
    /*
    * Each array child is a format with it's own settings
    * Notice that each array has title, block, classes, and wrapper arguments
    * Title is the label which will be visible in Formats menu
    * Block defines whether it is a span, div, selector, or inline style
    * Classes allows you to define CSS classes
    * Wrapper whether or not to add a new block-level element around any selected elements
    */
        array(  
            'title' => 'Red Bold',  
            'block' => 'span',  
            'classes' => 'boldred',
            'wrapper' => true,
                
        ),  
        array(  
            'title' => 'Revision Date',  
            'block' => 'span',  
            'classes' => 'revisiondate',
            'wrapper' => true,
        ),  
        array(  
            'title' => 'Highlight',  
            'block' => 'span',  
            'classes' => 'highlight',
            'wrapper' => true,
        ),  
        array(  
            'title' => 'Small Caps',  
            'block' => 'span',  
            'classes' => 'smallcap',
            'wrapper' => true,
        ),
        array(  
            'title' => 'Footnote',  
            'block' => 'span',  
            'classes' => 'footnote',
            'wrapper' => true,
        ),
        array(  
            'title' => 'UPPERCASE',  
            'block' => 'span',  
            'classes' => 'uppercase',
            'wrapper' => true,
        ),
        array(  
            'title' => 'lowercase',  
            'block' => 'span',  
            'classes' => 'lowercase',
            'wrapper' => true,
        ),
        array(  
            'title' => 'Title Case',  
            'block' => 'span',  
            'classes' => 'titlecase',
            'wrapper' => true,
        )
    );  
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );  
        
    return $init_array;  
    
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 

function widget_customization(){
 
    // Unregister some of the default sidebars
    unregister_sidebar( 'sidebar-right' );
    unregister_sidebar( 'sidebar-left' );
    unregister_sidebar( 'header-right' );
    unregister_sidebar( 'footer-left' );
    unregister_sidebar( 'footer-right' );
    unregister_sidebar( 'navbar-right' );

    register_sidebar( array(
        'name'          => __( 'Universal Sidebar', 'textdomain' ),
        'id'            => 'universal-sidebar',
        'description'   => __( 'Widgets in this area will be shown on all pages. Do not use for Hot Topics or Recommended Links.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Quackwatch Sidebar', 'textdomain' ),
        'id'            => 'quackwatch-sidebar',
        'description'   => __( 'Widgets in this area will be shown on all pages unless their own sidebar has content. Use for Hot Topics or Recommended Links', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Acupuncture Watch Sidebar', 'textdomain' ),
        'id'            => 'acupuncture-sidebar',
        'description'   => __( 'For Acupunture Watch specific Hot Topics and Recommended Links.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Allergy Watch Sidebar', 'textdomain' ),
        'id'            => 'allergy-sidebar',
        'description'   => __( 'For Allergy Watch specific Hot Topics and Recommended Links.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Autism Watch Sidebar', 'textdomain' ),
        'id'            => 'autism-sidebar',
        'description'   => __( 'For Autism Watch specific Hot Topics and Recommended Links.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Cancer Treatment Watch Sidebar', 'textdomain' ),
        'id'            => 'cancer-sidebar',
        'description'   => __( 'For Cancer Treatment Watch specific Hot Topics and Recommended Links.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Casewatch Sidebar', 'textdomain' ),
        'id'            => 'cases-sidebar',
        'description'   => __( 'For Casewatch specific Hot Topics and Recommended Links.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Chelation Watch Sidebar', 'textdomain' ),
        'id'            => 'chelation-sidebar',
        'description'   => __( 'For Chelation Watch specific Hot Topics and Recommended Links.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Chirobase Sidebar', 'textdomain' ),
        'id'            => 'chiropractic-sidebar',
        'description'   => __( 'For Chirobase specific Hot Topics and Recommended Links.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Credential Watch Sidebar', 'textdomain' ),
        'id'            => 'credential-sidebar',
        'description'   => __( 'For Credential Watch specific Hot Topics and Recommended Links.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Dental Watch Sidebar', 'textdomain' ),
        'id'            => 'dental-sidebar',
        'description'   => __( 'For Dental Watch specific Hot Topics and Recommended Links.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Device Watch Sidebar', 'textdomain' ),
        'id'            => 'device-sidebar',
        'description'   => __( 'For Device Watch specific Hot Topics and Recommended Links.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Diet Scam Watch Sidebar', 'textdomain' ),
        'id'            => 'diet-sidebar',
        'description'   => __( 'For Diet Scam Watch specific Hot Topics and Recommended Links.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Fibromyalgia Watch Sidebar', 'textdomain' ),
        'id'            => 'fibromyalgia-sidebar',
        'description'   => __( 'For Fibromyalgia Watch specific Hot Topics and Recommended Links..', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Homeowatch Sidebar', 'textdomain' ),
        'id'            => 'homeopathy-sidebar',
        'description'   => __( 'For Homeowatch specific Hot Topics and Recommended Links.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Infomercial Watch Sidebar', 'textdomain' ),
        'id'            => 'infomercial-sidebar',
        'description'   => __( 'For Infomercial Watch specific Hot Topics and Recommended Links.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Internet Health Pilot Sidebar', 'textdomain' ),
        'id'            => 'ihealth-pilot-sidebar',
        'description'   => __( 'For iHealth Pilot specific Hot Topics and Recommended Links.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Mental Health Watch Sidebar', 'textdomain' ),
        'id'            => 'mental-health-sidebar',
        'description'   => __( 'For Mental Health Watch specific Hot Topics and Recommended Links.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'MLM Watch Sidebar', 'textdomain' ),
        'id'            => 'mlm-sidebar',
        'description'   => __( 'For MLM Watch specific Hot Topics and Recommended Links.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Naturowatch Sidebar', 'textdomain' ),
        'id'            => 'naturopathy-sidebar',
        'description'   => __( 'For Naturowatch specific Hot Topics and Recommended Links.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'NCCAM Watch Sidebar', 'textdomain' ),
        'id'            => 'nccam-sidebar',
        'description'   => __( 'For NCCAM Watch specific Hot Topics and Recommended Links.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Nutriwatch Sidebar', 'textdomain' ),
        'id'            => 'nutrition-sidebar',
        'description'   => __( 'For Nutriwatch specific Hot Topics and Recommended Links.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Pharmwatch Sidebar', 'textdomain' ),
        'id'            => 'pharmacy-sidebar',
        'description'   => __( 'For Pharmwatch specific Hot Topics and Recommended Links.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'widget_customization', 11 );

function footer_js() {
    wp_enqueue_script( 'general', 'https://centerforinquiry.org/js/new/main_init.js', array('jquery') );
    wp_enqueue_script( 'clipboard', 'https://unpkg.com/clipboard@2/dist/clipboard.min.js', array('jquery') );
    wp_enqueue_script( 'copy', 'https://centerforinquiry.org/wp-content/themes/quackwatch/js/copy-link-plugin/comp-copy-qw.js', array('jquery') );
    wp_enqueue_script( 'navigation', 'https://centerforinquiry.org/wp-content/themes/quackwatch/js/select-switch-plugin/selectSwitch-comp-qw.js', array('jquery') );
}
add_action('wp_enqueue_scripts', 'footer_js');
