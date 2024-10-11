<?php
// Add Custom Post Types
	function create_acuwatch() {
		$args = array(
		'public' => true,
		'labels'  => array( 'name' => 'Acupuncture', 'singular_name' => 'Acupuncture Watch', 'archives' => 'The Skeptical Guide to Acupuncture History, Theories, and Practices' ),
		'has_archive' => false,
		'menu_position' => 3,
		'hierarchical' => true,
		'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'author'),
		'taxonomies' => array('authors','category'),
		'rewrite' => array(
			'with_front' => false,
			'slug'       => 'acupuncture'
			),
		'show_in_rest' => true,
		);
		register_post_type( 'acupuncture', $args );
	}
	add_action( 'init', 'create_acuwatch' );

	function create_allergywatch() {
	    $args = array(
	      'public' => true,
	      'labels'  => array( 'name' => 'Allergy', 'singular_name' => 'Allergy Watch', 'archives' => 'Your Guide to Questionable Theories and Practices' ),
	      'has_archive' => false,
	      'menu_position' => 3,
	      'hierarchical' => true,
	      'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'author'),
	      'taxonomies' => array('authors','category'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'allergy'
        	),
	      'show_in_rest' => true,
	    );
	    register_post_type( 'allergy', $args );
	}
	add_action( 'init', 'create_allergywatch' );

	function create_autismwatch() {
	    $args = array(
	      'public' => true,
	      'labels'  => array( 'name' => 'Autism', 'singular_name' => 'Autism Watch', 'archives' => 'Your Scientific Guide to Autism' ),
	      'has_archive' => false,
	      'menu_position' => 3,
	      'hierarchical' => true,
	      'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'author'),
	      'taxonomies' => array('authors','category'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'autism'
        	),
	      'show_in_rest' => true,
	    );
	    register_post_type( 'autism', $args );
	}
	add_action( 'init', 'create_autismwatch' );

	function create_cancertreatment() {
	    $args = array(
	      'public' => true,
	      'labels'  => array( 'name' => 'Cancer Treatment', 'singular_name' => 'Cancer Treatment Watch', 'archives' => 'Your Guide to Intelligent Treatment' ),
	      'has_archive' => false,
	      'menu_position' => 3,
	      'hierarchical' => true,
	      'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'author'),
	      'taxonomies' => array('authors','category'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'cancer'
        	),
	      'show_in_rest' => true,
	    );
	    register_post_type( 'cancer', $args );
	}
	add_action( 'init', 'create_cancertreatment' );

	function create_casewatch() {
	    $args = array(
	      'public' => true,
	      'labels'  => array( 'name' => 'Cases', 'singular_name' => 'Casewatch', 'archives' => 'Your Guide to Health-Related Legal Matters' ),
	      'has_archive' => false,
	      'menu_position' => 3,
	      'hierarchical' => true,
	      'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'author'),
	      'taxonomies' => array('authors','category'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'cases'
        	),
	      'show_in_rest' => true,
	    );
	    register_post_type( 'cases', $args );
	}
	add_action( 'init', 'create_casewatch' );

	function create_chelationwatch() {
	    $args = array(
	      'public' => true,
	      'labels'  => array( 'name' => 'Chelation', 'singular_name' => 'Chelation Watch', 'archives' => 'A Skeptical View of Chelation Therapy'),
	      'has_archive' => false,
	      'menu_position' => 3,
	      'hierarchical' => true,
	      'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'author'),
	      'taxonomies' => array('authors','category'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'chelation'
        	),
	      'show_in_rest' => true,
	    );
	    register_post_type( 'chelation', $args );
	}
	add_action( 'init', 'create_chelationwatch' );

	function create_chirobase() {
	    $args = array(
	      'public' => true,
	      'labels'  => array( 'name' => 'Chiropractic', 'singular_name' => 'Chirobase', 'archives' => 'Your Skeptical Guide to Chiropractic History, Theories, and Practices' ),
	      'has_archive' => false,
	      'menu_position' => 3,
	      'hierarchical' => true,
	      'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'author'),
	      'taxonomies' => array('authors','category'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'chiropractic'
        	),
	      'show_in_rest' => true,
	    );
	    register_post_type( 'chiropractic', $args );
	}
	add_action( 'init', 'create_chirobase' );

	function create_credential() {
	    $args = array(
	      'public' => true,
	      'labels'  => array( 'name' => 'Credential', 'singular_name' => 'Credential Watch', 'archives' => 'Your Guide to Health-Related Education and Training' ),
	      'has_archive' => false,
	      'menu_position' => 3,
	      'hierarchical' => true,
	      'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'author'),
	      'taxonomies' => array('authors','category'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'credential'
        	),
	      'show_in_rest' => true,
	    );
	    register_post_type( 'credential', $args );
	}
	add_action( 'init', 'create_credential' );

	function create_dentalwatch() {
	    $args = array(
	      'public' => true,
	      'labels'  => array( 'name' => 'Dental', 'singular_name' => 'Dental Watch', 'archives' => 'Your Guide to Intelligent Dental Care' ),
	      'has_archive' => false,
	      'menu_position' => 3,
	      'hierarchical' => true,
	      'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'author'),
	      'taxonomies' => array('authors','category'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'dental'
        	),
	      'show_in_rest' => true,
	    );
	    register_post_type( 'dental', $args );
	}
	add_action( 'init', 'create_dentalwatch' );

	function create_devicewatch() {
	    $args = array(
	      'public' => true,
	      'labels'  => array( 'name' => 'Device', 'singular_name' => 'Device Watch', 'archives' => 'Your Guide to Questionable Medical Devices' ),
	      'has_archive' => false,
	      'menu_position' => 3,
	      'hierarchical' => true,
	      'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'author'),
	      'taxonomies' => array('authors','category'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'device'
        	),
	      'show_in_rest' => true,
	    );
	    register_post_type( 'device', $args );
	}
	add_action( 'init', 'create_devicewatch' );

	function create_dietscam() {
	    $args = array(
	      'public' => true,
	      'labels'  => array( 'name' => 'Diet', 'singular_name' => 'Diet Scam Watch', 'archives' => 'Your Guide to Weight-Control Schemes and Ripoffs' ),
	      'has_archive' => false,
	      'menu_position' => 3,
	      'hierarchical' => true,
	      'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'author'),
	      'taxonomies' => array('authors','category'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'diet'
        	),
	      'show_in_rest' => true,
	    );
	    register_post_type( 'diet', $args );
	}
	add_action( 'init', 'create_dietscam' );

	function create_fibrowatch() {
	    $args = array(
	      'public' => true,
	      'labels'  => array( 'name' => 'Fibromyalgia', 'singular_name' => 'Fibromyalgia Watch', 'archives' => 'Your Guide to the Fibromyalgia Marketplace' ),
	      'has_archive' => false,
	      'menu_position' => 3,
	      'hierarchical' => true,
	      'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'author'),
	      'taxonomies' => array('authors','category'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'fibromyalgia'
        	),
	      'show_in_rest' => true,
	    );
	    register_post_type( 'fibromyalgia', $args );
	}
	add_action( 'init', 'create_fibrowatch' );

	function create_homeowatch() {
	    $args = array(
	      'public' => true,
	      'labels'  => array( 'name' => 'Homeopathy', 'singular_name' => 'Homeowatch', 'archives' => 'Your Skeptical Guide to Homeopathic History, Theories, and Current Practices' ),
	      'has_archive' => false,
	      'menu_position' => 3,
	      'hierarchical' => true,
	      'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'author'),
	      'taxonomies' => array('authors','category'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'homeopathy'
        	),
	      'show_in_rest' => true,
	    );
	    register_post_type( 'homeopathy', $args );
	}
	add_action( 'init', 'create_homeowatch' );

	function create_ihealthpilot() {
	    $args = array(
	      'public' => true,
	      'labels'  => array( 'name' => 'iHealth Pilot', 'singular_name' => 'Internet Health Pilot', 'archives' => 'Your Gateway to Trustworthy Health Information' ),
	      'has_archive' => false,
	      'menu_position' => 3,
	      'hierarchical' => true,
	      'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'author'),
	      'taxonomies' => array('authors','category'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'ihealth-pilot'
        	),
	      'show_in_rest' => true,
	    );
	    register_post_type( 'ihealth-pilot', $args );
	}
	add_action( 'init', 'create_ihealthpilot' );

	function create_infomercial() {
	    $args = array(
	      'public' => true,
	      'labels'  => array( 'name' => 'Infomercial', 'singular_name' => 'Infomercial Watch', 'archives' => 'A Critical View of the Health Infomercial Marketplace' ),
	      'has_archive' => false,
	      'menu_position' => 3,
	      'hierarchical' => true,
	      'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'author'),
	      'taxonomies' => array('authors','category'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'infomercial'
        	),
	      'show_in_rest' => true,
	    );
	    register_post_type( 'infomercial', $args );
	}
	add_action( 'init', 'create_infomercial' );

	function create_mentalhealth() {
	    $args = array(
	      'public' => true,
	      'labels'  => array( 'name' => 'Mental Health', 'singular_name' => 'Mental Health Watch', 'archives' => 'Your Guide to the Mental Health Marketplace' ),
	      'has_archive' => false,
	      'menu_position' => 3,
	      'hierarchical' => true,
	      'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'author'),
	      'taxonomies' => array('authors','category'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'mental-health'
        	),
	      'show_in_rest' => true,
	    );
	    register_post_type( 'mental-health', $args );
	}
	add_action( 'init', 'create_mentalhealth' );

	function create_mlm() {
	    $args = array(
	      'public' => true,
	      'labels'  => array( 'name' => 'MLM', 'singular_name' => 'MLM Watch', 'archives' => 'The Skeptical Guide to Multilevel Marketing' ),
	      'has_archive' => false,
	      'menu_position' => 3,
	      'hierarchical' => true,
	      'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'author'),
	      'taxonomies' => array('authors','category'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'mlm'
        	),
	      'show_in_rest' => true,
	    );
	    register_post_type( 'mlm', $args );
	}
	add_action( 'init', 'create_mlm' );

	function create_naturopahy() {
	    $args = array(
	      'public' => true,
	      'labels'  => array( 'name' => 'Naturopathy', 'singular_name' => 'Naturowatch', 'archives' => 'The Skeptical Guide to Naturopathic History, Theories, and Practices' ),
	      'has_archive' => false,
	      'menu_position' => 3,
	      'hierarchical' => true,
	      'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'author'),
	      'taxonomies' => array('authors','category'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'naturopathy'
        	),
	      'show_in_rest' => true,
	    );
	    register_post_type( 'naturopathy', $args );
	}
	add_action( 'init', 'create_naturopahy' );

	function create_nccamwatch() {
	    $args = array(
	      'public' => true,
	      'labels'  => array( 'name' => 'NCCAM', 'singular_name' => 'NCCAM Watch', 'archives' => 'An Antidote to the National Center for Complementary and Alternative Medicine' ),
	      'has_archive' => false,
	      'menu_position' => 3,
	      'hierarchical' => true,
	      'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'author'),
	      'taxonomies' => array('authors','category'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'nccam'
        	),
	      'show_in_rest' => true,
	    );
	    register_post_type( 'nccam', $args );
	}
	add_action( 'init', 'create_nccamwatch' );

	function create_ncahf() {
	    $args = array(
	      'public' => true,
	      'labels'  => array( 'name' => 'NCAHF', 'singular_name' => 'National Council Against Health Fraud Archive', 'archives' => 'Enhancing Freedom of Choice through Reliable Health Information' ),
	      'has_archive' => false,
	      'menu_position' => 3,
	      'hierarchical' => true,
	      'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'author'),
	      'taxonomies' => array('authors','category'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'ncahf'
        	),
	      'show_in_rest' => true,
	    );
	    register_post_type( 'ncahf', $args );
	}
	add_action( 'init', 'create_ncahf' );

	function create_nutriwatch() {
	    $args = array(
	      'public' => true,
	      'labels'  => array( 'name' => 'Nutrition', 'singular_name' => 'Nutriwatch', 'archives' => 'Your Guide to Sensible Nutrition' ),
	      'has_archive' => false,
	      'menu_position' => 3,
	      'hierarchical' => true,
	      'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'author'),
	      'taxonomies' => array('authors','category'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'nutrition'
        	),
	      'show_in_rest' => true,
	    );
	    register_post_type( 'nutrition', $args );
	}
	add_action( 'init', 'create_nutriwatch' );

	function create_pharmacy() {
	    $args = array(
	      'public' => true,
	      'labels'  => array( 'name' => 'Pharmacy', 'singular_name' => 'Pharmwatch', 'archives' => 'Your Guide to the Drug Marketplace and Lower Prices' ),
	      'has_archive' => false,
	      'menu_position' => 3,
	      'hierarchical' => true,
	      'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'author'),
	      'taxonomies' => array('authors','category'),
	      'rewrite' => array(
            'with_front' => false,
            'slug'       => 'pharmacy'
        	),
	      'show_in_rest' => true,
	    );
	    register_post_type( 'pharmacy', $args );
	}
	add_action( 'init', 'create_pharmacy' );
