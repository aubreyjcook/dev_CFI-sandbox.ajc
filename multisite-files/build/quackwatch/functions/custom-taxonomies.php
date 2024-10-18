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
			array('post', 'page', 'allergy', 'cancer', 'credential', 'autism', 'chelation', 'dental', 'device', 'diet', 'fibromyalgia', 'homeopathy', 'ihealth-pilot', 'infomercial', 'mental-health', 'mlm', 'acupuncture', 'pharmacy', 'nutrition', 'nccam', 'ncahf', 'naturopathy', 'chiropractic', 'cases'),
			array(
				'hierarchical' => true,
				'labels' => $labels,
				'show_admin_column' => true,
				'rewrite' => array( 'slug' => 'authors' )
			)
		);
	}
	add_action( 'init', 'taxonomy_author_init' );
