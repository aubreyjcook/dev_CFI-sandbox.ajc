<?php
// Add Custom Post Types
	function create_news() {
	    $args = array(
	      'public' => true,
	      'label'  => 'News',
	      'has_archive' => true,
	      'menu_position' => 3,
	      'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'revisions'),
	      'taxonomies' => array('post_tag'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'news'
        	),
	      'show_in_rest' => true,
		  'show_in_graphql' => true,
		  'graphql_single_name' => 'newsPost',
		  'graphql_plural_name' => 'newsPosts',
	    );
	    register_post_type( 'news', $args );
	}
	add_action( 'init', 'create_news' );

	function create_press_releases() {
	    $args = array(
	      'public' => true,
	      'label'  => 'Press Releases',
	      'has_archive' => true,
	      'menu_position' => 3,
	      'supports' => array('title', 'excerpt', 'editor', 'revisions'),
	      'taxonomies' => array('post_tag'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'press_releases'
        	),
	      'show_in_rest' => true,
		  'show_in_graphql' => true,
		  'graphql_single_name' => 'pressRelease',
		  'graphql_plural_name' => 'pressReleases',
	    );
	    register_post_type( 'press_releases', $args );
	}
	add_action( 'init', 'create_press_releases' );

	function create_newsdesk() {
	    $args = array(
	      'public' => true,
	      'label'  => 'Newsdesk',
	      'has_archive' => true,
	      'menu_position' => 3,
	      'supports' => array('title', 'revisions'),
	      'taxonomies' => array(''),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'newsdesk'
		  ),
		  'show_in_rest' => true,
		  'show_in_graphql' => true,
		  'graphql_single_name' => 'newsdesk',
		  'graphql_plural_name' => 'newsdeskPosts',
	    );
	    register_post_type( 'newsdesk', $args );
	}
	add_action( 'init', 'create_newsdesk' );

	function create_action_alerts() {
	    $args = array(
	      'public' => true,
	      'label'  => 'Action Alerts',
	      'has_archive' => true,
	      'menu_position' => 3,
	      'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'revisions'),
	      'taxonomies' => array(''),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'alerts'
        	),
	      'show_in_rest' => true,
		  'show_in_graphql' => true,
		  'graphql_single_name' => 'actionAlert',
		  'graphql_plural_name' => 'actionAlerts',
	    );
	    register_post_type( 'action_alerts', $args );
	}
	add_action( 'init', 'create_action_alerts' );

	function create_secular_celebrants() {
	    $args = array(
	      'public' => true,
	      'label'  => 'Secular Celebrants',
	      'has_archive' => false,
	      'menu_position' => 3,
	      'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
	      'taxonomies' => array(''),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'celebrants'
		  ),
		  'show_in_rest' => true,
		  'show_in_graphql' => true,
		  'graphql_single_name' => 'celebrant',
		  'graphql_plural_name' => 'celebrants',
	    );
	    register_post_type( 'celebrants', $args );
	}
	add_action( 'init', 'create_secular_celebrants' );

	function create_speakers_bureau() {
	    $args = array(
	      'public' => true,
	      'label'  => 'Speakers',
	      'has_archive' => false,
	      'menu_position' => 3,
	      'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
	      'taxonomies' => array(''),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'speakers'
		  ),
		  'show_in_rest' => true,
		  'show_in_graphql' => true,
		  'graphql_single_name' => 'speaker',
		  'graphql_plural_name' => 'speakers',
	    );
	    register_post_type( 'speakers', $args );
	}
	add_action( 'init', 'create_speakers_bureau' );

	function create_legal_cases_briefs() {
	    $args = array(
	      'public' => true,
	      'label'  => 'Legal Cases',
	      'has_archive' => false,
	      'menu_position' => 3,
	      'supports' => array('title', 'editor', 'revisions'),
	      'taxonomies' => array(''),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'cases'
		  ),
		  'show_in_rest' => true,
		  'show_in_graphql' => true,
		  'graphql_single_name' => 'case',
		  'graphql_plural_name' => 'cases',
	    );
	    register_post_type( 'cases', $args );
	}
	add_action( 'init', 'create_legal_cases_briefs' );

	function create_videos() {
	    $args = array(
	      'public' => true,
	      'label'  => 'Videos',
	      'has_archive' => true,
	      'menu_position' => 3,
	      'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
	      'taxonomies' => array('post_tag'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'video'
		  ),
		  'show_in_rest' => true,
		  'show_in_graphql' => true,
		  'graphql_single_name' => 'video',
		  'graphql_plural_name' => 'videos',
	    );
	    register_post_type( 'videos', $args );
	}
	add_action( 'init', 'create_videos' );

	function create_luminate_emails() {
	    $args = array(
	      'public' => true,
	      'exclude_from_search' => true,
	      'label'  => 'Email Builder',
	      'has_archive' => false,
	      'menu_position' => 3,
	      'supports' => array('title', 'editor', 'revisions'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'luminate_email'
        	),
	      'show_in_rest' => true,
	    );
	    register_post_type( 'luminate_emails', $args );
	}
	add_action( 'init', 'create_luminate_emails' );

	function create_covid19_internal() {
	    $args = array(
		  'public' => true,
		  'exclude_from_search' => true,
	      'label'  => 'COVID-19 CFI Resources',
	      'has_archive' => true,
	      'menu_position' => 3,
	      'supports' => array('title', 'thumbnail', 'revisions'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'covid19'
        	),
	      'show_in_rest' => true,
		  'show_in_graphql' => true,
		  'graphql_single_name' => 'covid19Post',
		  'graphql_plural_name' => 'covid19Posts',
	    );
	    register_post_type( 'covid19', $args );
	}
	add_action( 'init', 'create_covid19_internal' );

	function create_covid19_external() {
	    $args = array(
	      'public' => true,
	      'exclude_from_search' => true,
	      'label'  => 'COVID-19 External Resources',
	      'has_archive' => true,
	      'menu_position' => 3,
	      'supports' => array('title', 'revisions'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'covid19-ext'
        	),
		  'show_in_rest' => true,
		  'show_in_graphql' => true,
		  'graphql_single_name' => 'covid19extPost',
		  'graphql_plural_name' => 'covid19extPosts',
	    );
	    register_post_type( 'covid19-ext', $args );
	}
	add_action( 'init', 'create_covid19_external' );

	function create_advocacy() {
	    $args = array(
	      'public' => true,
	      'exclude_from_search' => false,
	      'label'  => 'Advocacy',
	      'has_archive' => false,
		  'hierarchical' => true,
	      'menu_position' => 3,
	      'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'advocacy'
        	),
	      'show_in_rest' => true,
		  'show_in_graphql' => true,
		  'graphql_single_name' => 'advocacyPage',
		  'graphql_plural_name' => 'advocacyPages',
	    );
	    register_post_type( 'advocacy', $args );
	}
	add_action( 'init', 'create_advocacy' );

	function create_group_resources() {
	    $args = array(
	      'public' => true,
	      'exclude_from_search' => false,
	      'label'  => 'Group Resources',
	      'has_archive' => false,
		  'hierarchical' => true,
	      'menu_position' => 3,
	      'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'group-resources'
        	),
	      'show_ui' => true,
		  'show_in_menu' => true,
		  'show_in_admin_bar'     => true,
		  'show_in_nav_menus'     => true,
		  'can_export'            => true,
		  'has_archive'           => false,
		  'exclude_from_search'   => false,
		  'publicly_queryable'    => true,
		  'capability_type'       => 'post',
		  'show_in_rest' => true,
		  'show_in_graphql' => true,
		  'graphql_single_name' => 'groupresourcePage',
		  'graphql_plural_name' => 'groupresourcePages',
	    );
	    register_post_type( 'group_resources', $args );
	}
	add_action( 'init', 'create_group_resources' );

	function create_groups() {
	    $args = array(
	      'public' => true,
		  'hierarchical' => false,
	      'label'  => 'Groups',
	      'has_archive' => false,
	      'menu_position' => 3,
		  'supports' => array( 'title', 'editor', 'revisions' ),
	      'taxonomies' => array(''),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'groups'
		  ),
		  'show_ui' => true,
		  'show_in_menu' => true,
		  'show_in_admin_bar'     => true,
		  'show_in_nav_menus'     => true,
		  'can_export'            => true,
		  'has_archive'           => false,
		  'exclude_from_search'   => false,
		  'publicly_queryable'    => true,
		  'capability_type'       => 'post',
		  'show_in_rest' => true,
		  'show_in_graphql' => true,
		  'graphql_single_name' => 'group',
		  'graphql_plural_name' => 'groups',
	    );
	    register_post_type( 'groups', $args );
	}
	add_action( 'init', 'create_groups' );
