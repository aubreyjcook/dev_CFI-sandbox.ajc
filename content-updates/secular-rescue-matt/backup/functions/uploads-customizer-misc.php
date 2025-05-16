<?php
remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'pre_link_description', 'wp_filter_kses' );
remove_filter( 'pre_link_notes', 'wp_filter_kses' );
remove_filter( 'term_description', 'wp_kses_data' );

add_theme_support( 'post-thumbnails' );

// Added to extend allowed files types in Media upload
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {

// Add *.EPS files to Media upload
$existing_mimes['eps'] = 'application/postscript';

// Add *.AI files to Media upload
$existing_mimes['ai'] = 'application/postscript';

// Add *.svg files to Media upload
$existing_mimes['svg'] = 'image/svg+xml';

return $existing_mimes;
}

@ini_set( 'upload_max_size' , '10M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

function branch_customizer($wp_customize) {
	$wp_customize->remove_section('title_tagline'); 
	$wp_customize->remove_section('colors'); 
	$wp_customize->remove_section('background_image'); 
	$wp_customize->remove_section('static_front_page');  
}
add_action('customize_register', 'branch_customizer');
