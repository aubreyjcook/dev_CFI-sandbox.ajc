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
			array('post', 'press_releases', 'news', 'videos', 'action_alerts'),
			array(
				'hierarchical' => true,
				'labels' => $labels,
				'show_admin_column' => true,
				'rewrite' => array( 'slug' => 'authors' ),
				'public' => true,
				'show_in_rest' => true,
				'show_in_graphql' => true,
				'graphql_single_name' => 'author',
				'graphql_plural_name' => 'authors',
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
			array('post', 'news', 'press_releases', 'action_alerts', 'cases'), //or array('post', 'custom_post_type_name', 'etc') to add taxonomy to many posts
			array(
				'hierarchical' => true,
				'labels' => $labels,
				'show_admin_column' => true,
				'rewrite' => array( 'slug' => 'issues' ),
				'public' => true,
				'show_in_rest' => true,
				'show_in_graphql' => true,
				'graphql_single_name' => 'issue',
				'graphql_plural_name' => 'issues',
			)
		);
	}
	add_action( 'init', 'taxonomy_issues_init' );

	function taxonomy_news_categories_init() {
		$labels = array(
			'name' => _x( 'Department', 'taxonomy general name'),
			'singular_name' => _x( 'Department', 'taxonomy singular name'),
			'search_items' => __( 'Search Departments' ),
			'all_items' => __( 'All Departments' ),
			'parent_item' => __( 'Leave This Blank' ),
			'parent_item_colon' => __( 'Not Applicable:' ),
			'edit_item' => __( 'Edit Department' ),
			'update_item' => __( 'Update Department' ),
			'add_new_item' => __( 'Add New Department' ),
			'new_item_name' => __( 'New Department Name' ),
			'menu_name' => __( 'Departments' ),
		);

		register_taxonomy(
			'department',
			array('post', 'news', 'press_releases'), //or array('post', 'custom_post_type_name', 'etc') to add taxonomy to many posts
			array(
				'hierarchical' => true,
				'labels' => $labels,
				'show_admin_column' => true,
				'rewrite' => array( 'slug' => 'department' ),
				'public' => true,
				'show_in_rest' => true,
				'show_in_graphql' => true,
				'graphql_single_name' => 'department',
				'graphql_plural_name' => 'departments',
			)
		);
	}
	add_action( 'init', 'taxonomy_news_categories_init' );

	function taxonomy_speaker_topics_init() {
		$labels = array(
			'name' => _x( 'Speaker Topics', 'taxonomy general name'),
			'singular_name' => _x( 'Speaker Topic', 'taxonomy singular name'),
			'search_items' => __( 'Search Speaker Topics' ),
			'all_items' => __( 'All Topics' ),
			'parent_item' => __( 'Overall Topic' ),
			'edit_item' => __( 'Edit Speaker Topic' ),
			'update_item' => __( 'Update Speaker Topic' ),
			'add_new_item' => __( 'Add New Speaker Topic' ),
			'new_item_name' => __( 'New Speaker Topic Name' ),
			'menu_name' => __( 'Speaker Topics' ),
		);

		register_taxonomy(
			'speaker_topics',
			'speakers',
			array(
				'hierarchical' => true,
				'labels' => $labels,
				'rewrite' => array( 'slug' => 'speaker_topics' ),
				'show_in_rest' => true,
				'show_in_graphql' => true,
				'graphql_single_name' => 'speakerTopic',
				'graphql_plural_name' => 'speakerTopics',
			)
		);
	}
	add_action( 'init', 'taxonomy_speaker_topics_init' );

	function taxonomy_speaker_locations_init() {
		$labels = array(
			'name' => _x( 'Speaker Locations', 'taxonomy general name'),
			'singular_name' => _x( 'Speaker Location', 'taxonomy singular name'),
			'search_items' => __( 'Search Speaker Locations' ),
			'all_items' => __( 'All Locations' ),
			'parent_item' => __( 'Overall Location' ),
			'edit_item' => __( 'Edit Speaker Location' ),
			'update_item' => __( 'Update Speaker Location' ),
			'add_new_item' => __( 'Add New Speaker Location' ),
			'new_item_name' => __( 'New Speaker Location Name' ),
			'menu_name' => __( 'Speaker Locations' ),
		);

		register_taxonomy(
			'speaker_locations',
			'speakers',
			array(
				'hierarchical' => true,
				'labels' => $labels,
				'rewrite' => array( 'slug' => 'speaker_locations' ),
				'show_in_rest' => true,
				'show_in_graphql' => true,
				'graphql_single_name' => 'speakerLocation',
				'graphql_plural_name' => 'speakerLocations',
			)
		);
	}
	add_action( 'init', 'taxonomy_speaker_locations_init' );

	function taxonomy_speaker_affilation_init() {
		$labels = array(
			'name' => _x( 'Speaker Affiliation', 'taxonomy general name'),
			'singular_name' => _x( 'Speaker Affiliation', 'taxonomy singular name'),
			'search_items' => __( 'Search Speaker Affiliation' ),
			'all_items' => __( 'All Speakers' ),
			'parent_item' => __( 'Leave This Blank' ),
			'parent_item_colon' => __( 'Not Applicable:' ),
			'edit_item' => __( 'Edit Speaker Affiliation' ),
			'update_item' => __( 'Update Speaker Affiliation' ),
			'add_new_item' => __( 'Add New Speaker Affiliation' ),
			'new_item_name' => __( 'New Speaker Affiliation Name' ),
			'menu_name' => __( 'Speaker Affiliation' ),
		);

		register_taxonomy(
			'speaker_affiliation',
			'speakers',
			array(
				'hierarchical' => false,
				'labels' => $labels,
				'rewrite' => array( 'slug' => 'speaker_affiliation' ),
				'show_in_rest' => true,
				'show_in_graphql' => true,
				'graphql_single_name' => 'speakerAffiliation',
				'graphql_plural_name' => 'speakerAffiliation',
			)
		);
	}
	add_action( 'init', 'taxonomy_speaker_affilation_init' );

	function taxonomy_celebrant_locations_init() {
		$labels = array(
			'name' => _x( 'Celebrant Locations', 'taxonomy general name'),
			'singular_name' => _x( 'Celebrant Location', 'taxonomy singular name'),
			'search_items' => __( 'Search Celebrant Locations' ),
			'all_items' => __( 'All Locations' ),
			'parent_item' => __( 'Overall Location' ),
			'edit_item' => __( 'Edit Celebrant Location' ),
			'update_item' => __( 'Update Celebrant Location' ),
			'add_new_item' => __( 'Add New Celebrant Location' ),
			'new_item_name' => __( 'New Celebrant Location Name' ),
			'menu_name' => __( 'Celebrant Locations' ),
		);

		register_taxonomy(
			'celebrant_locations',
			'celebrants',
			array(
				'hierarchical' => true,
				'labels' => $labels,
				'rewrite' => array( 'slug' => 'celebrant_locations' ),
				'show_in_rest' => true,
				'show_in_graphql' => true,
				'graphql_single_name' => 'celebrantLocation',
				'graphql_plural_name' => 'celebrantLocations',
			)
		);
	}
	add_action( 'init', 'taxonomy_celebrant_locations_init' );

	function taxonomy_group_locations_init() {
		$labels = array(
			'name' => _x( 'Group Locations', 'taxonomy general name'),
			'singular_name' => _x( 'Group Location', 'taxonomy singular name'),
			'search_items' => __( 'Search Group Locations' ),
			'all_items' => __( 'All Locations' ),
			'parent_item' => __( 'Overall Location' ),
			'edit_item' => __( 'Edit Group Location' ),
			'update_item' => __( 'Update Group Location' ),
			'add_new_item' => __( 'Add New Group Location' ),
			'new_item_name' => __( 'New Group Location Name' ),
			'menu_name' => __( 'Group Locations' ),
		);

		register_taxonomy(
			'group_locations',
			'groups',
			array(
				'hierarchical' => true,
				'labels' => $labels,
				'show_admin_column' => true,
				'rewrite' => array( 'slug' => 'group_locations' ),
				'show_in_rest' => true,
				'show_in_graphql' => true,
				'graphql_single_name' => 'groupLocation',
				'graphql_plural_name' => 'groupLocations',
			)
		);
	}
	add_action( 'init', 'taxonomy_group_locations_init' );

	function taxonomy_group_category_init() {
		$labels = array(
			'name' => _x( 'Group Categories', 'taxonomy general name'),
			'singular_name' => _x( 'Group Category', 'taxonomy singular name'),
			'search_items' => __( 'Search Group Categories' ),
			'all_items' => __( 'All Categories' ),
			'parent_item' => __( 'Overall Category' ),
			'edit_item' => __( 'Edit Group Category' ),
			'update_item' => __( 'Update Group Category' ),
			'add_new_item' => __( 'Add New Group Category' ),
			'new_item_name' => __( 'New Group Category Name' ),
			'menu_name' => __( 'Group Categories' ),
		);

		register_taxonomy(
			'group_categories',
			'groups',
			array(
				'hierarchical' => true,
				'labels' => $labels,
				'show_admin_column' => true,
				'rewrite' => array( 'slug' => 'group_categories' ),
				'show_in_rest' => true,
				'show_in_graphql' => true,
				'graphql_single_name' => 'groupCategory',
				'graphql_plural_name' => 'groupCategories',
			)
		);
	}
	add_action( 'init', 'taxonomy_group_category_init' );

	function taxonomy_video_events() {
		$labels = array(
			'name' => _x( 'Events', 'taxonomy general name'),
			'singular_name' => _x( 'Event', 'taxonomy singular name'),
			'search_items' => __( 'Search Events' ),
			'all_items' => __( 'All Events' ),
			'parent_item' => __( 'N/A' ),
			'edit_item' => __( 'Edit Event' ),
			'update_item' => __( 'Update Event' ),
			'add_new_item' => __( 'Add New Event' ),
			'new_item_name' => __( 'New Event Name' ),
			'menu_name' => __( 'Events' ),
		);

		register_taxonomy(
			'video_events',
			'videos',
			array(
				'hierarchical' => true,
				'labels' => $labels,
				'rewrite' => array( 'slug' => 'video_events' ),
				'show_in_rest' => true,
				'show_in_graphql' => true,
				'graphql_single_name' => 'videoEvent',
				'graphql_plural_name' => 'videoEvents',
			)
		);
	}
	add_action( 'init', 'taxonomy_video_events' );

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
					'graphql_single_name' => 'volumeInfo',
					'graphql_plural_name' => 'volumeInfo',
				)
			);
		}
	add_action( 'init', 'taxonomy_volumes_init' );

	function taxonomy_resource_topics_init() {
		$labels = array(
			'name' => _x( 'Resource Topic', 'taxonomy general name'),
			'singular_name' => _x( 'Resource Topic', 'taxonomy singular name'),
			'search_items' => __( 'Search Resource Topics' ),
			'all_items' => __( 'All Resource Topics' ),
			'parent_item' => __( 'Overall Resource Topics' ),
			'edit_item' => __( 'Edit Resource Topic' ),
			'update_item' => __( 'Update Resource Topic' ),
			'add_new_item' => __( 'Add New Resource Topic' ),
			'new_item_name' => __( 'New Resource Topic Name' ),
			'menu_name' => __( 'Resource Topics' ),
		);

		register_taxonomy(
			'resource_topics',
			'group_resources',
			array(
				'hierarchical' => true,
				'labels' => $labels,
				'show_admin_column' => true,
				'rewrite' => array( 'slug' => 'resource_topics' ),
				'show_in_rest' => true,
				'show_in_graphql' => true,
				'graphql_single_name' => 'resourcetopic',
				'graphql_plural_name' => 'resourcetopics',
			)
		);
	}
	add_action( 'init', 'taxonomy_resource_topics_init' );

	function taxonomy_resource_authors_init() {
		$labels = array(
			'name' => _x( 'Resource Author', 'taxonomy general name'),
			'singular_name' => _x( 'Resource Author', 'taxonomy singular name'),
			'search_items' => __( 'Search Resource Authors' ),
			'all_items' => __( 'All Resource Authors' ),
			'parent_item' => __( 'Overall Resource Authors' ),
			'edit_item' => __( 'Edit Resource Author' ),
			'update_item' => __( 'Update Resource Author' ),
			'add_new_item' => __( 'Add New Resource Author' ),
			'new_item_name' => __( 'New Resource Author Name' ),
			'menu_name' => __( 'Resource Author' ),
		);

		register_taxonomy(
			'resource_authors',
			'group_resources',
			array(
				'hierarchical' => true,
				'labels' => $labels,
				'show_admin_column' => true,
				'rewrite' => array( 'slug' => 'resource_authors' ),
				'show_in_rest' => true,
				'show_in_graphql' => true,
				'graphql_single_name' => 'resourceauthor',
				'graphql_plural_name' => 'resourceauthors',
			)
		);
	}
	add_action( 'init', 'taxonomy_resource_authors_init' );

	function taxonomy_resource_publications_init() {
		$labels = array(
			'name' => _x( 'Resource Publication', 'taxonomy general name'),
			'singular_name' => _x( 'Resource Publication', 'taxonomy singular name'),
			'search_items' => __( 'Search Resource Publications' ),
			'all_items' => __( 'All Resource Publications' ),
			'parent_item' => __( 'Overall Resource Publications' ),
			'edit_item' => __( 'Edit Resource Publication' ),
			'update_item' => __( 'Update Resource Publication' ),
			'add_new_item' => __( 'Add New Resource Publication' ),
			'new_item_name' => __( 'New Resource Publication Name' ),
			'menu_name' => __( 'Resource Publication' ),
		);

		register_taxonomy(
			'resource_publications',
			'group_resources',
			array(
				'hierarchical' => true,
				'labels' => $labels,
				'show_admin_column' => true,
				'rewrite' => array( 'slug' => 'resource_publications' ),
				'show_in_rest' => true,
				'show_in_graphql' => true,
				'graphql_single_name' => 'resourcepublication',
				'graphql_plural_name' => 'resourcepublication',
			)
		);
	}
	add_action( 'init', 'taxonomy_resource_publications_init' );
