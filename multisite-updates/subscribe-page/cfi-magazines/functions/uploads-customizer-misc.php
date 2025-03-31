<?php
// Hide Admin Bar for All Users Except Administrators
if ( !current_user_can( 'edit_posts' ) || !is_user_logged_in() ) {
	add_filter('show_admin_bar', '__return_false', 99999);
}

remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'pre_link_description', 'wp_filter_kses' );
remove_filter( 'pre_link_notes', 'wp_filter_kses' );
remove_filter( 'term_description', 'wp_kses_data' );

add_theme_support( 'post-thumbnails' );

function branch_customizer($wp_customize) {
	//$wp_customize->remove_section('title_tagline'); 
	//$wp_customize->remove_section('colors'); 
	$wp_customize->remove_section('background_image'); 
	$wp_customize->remove_section('static_front_page');  
	//$wp_customize->remove_section('custom_css');  
}
add_action('customize_register', 'branch_customizer');

/**
* Create Logo Setting and Upload Control
*/
function magazine_customizer_settings($wp_customize) {

$wp_customize->remove_control('blogname');
$wp_customize->remove_control('blogdescription');
$wp_customize->remove_section('background_image'); 
$wp_customize->remove_section('static_front_page');

// add a setting for the site logo
$wp_customize->add_setting('site_logo');
// Add a control to upload the logo
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_logo',
	array(
	'label' => 'Upload Logo',
	'section' => 'title_tagline',
	'settings' => 'site_logo',
) ) );

$wp_customize->add_setting('site_logo_mobile');

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_logo_mobile',
	array(
	'label' => 'Upload Mobile Logo',
	'section' => 'title_tagline',
	'settings' => 'site_logo_mobile',
) ) );


// Add controls for color customization
$wp_customize->remove_setting('background_color');

$wp_customize->add_setting('bs_background_color', array(
	'default' => '#FAFAFA'));

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bs_background_color', array(
	'label'      => __( 'Background Color', 'mytheme' ),
	'section'    => 'colors',
	'settings'   => 'bs_background_color',
) ) );

$wp_customize->add_setting('text_color', array(
	'default' => '#333'));

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_color', array(
	'label'      => __( 'Text Color', 'mytheme' ),
	'section'    => 'colors',
	'settings'   => 'text_color',
) ) );


$wp_customize->add_setting('primary_color', array(
	'default' => '#26A4DE'));

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
	'label'      => __( 'Primary Color', 'mytheme' ),
	'section'    => 'colors',
	'settings'   => 'primary_color',
) ) );

$wp_customize->add_setting('dark_primary_color', array(
	'default' => '#2A9ACE'));

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dark_primary_color', array(
	'label'      => __( 'Dark Primary Color', 'mytheme' ),
	'section'    => 'colors',
	'settings'   => 'dark_primary_color',
) ) );

$wp_customize->add_setting('secondary_color', array(
	'default' => '#414A9B'));

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_color', array(
	'label'      => __( 'Secondary Color', 'mytheme' ),
	'section'    => 'colors',
	'settings'   => 'secondary_color',
) ) );

$wp_customize->add_setting('dark_secondary_color', array(
	'default' => '#303885'));

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dark_secondary_color', array(
	'label'      => __( 'Dark Secondary Color', 'mytheme' ),
	'section'    => 'colors',
	'settings'   => 'dark_secondary_color',
) ) );

$wp_customize->add_setting('tags', array(
	'default' => '#26A4DE'));

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tags', array(
	'label'      => __( 'Tags', 'mytheme' ),
	'section'    => 'colors',
	'settings'   => 'tags',
) ) );

}

add_action('customize_register', 'magazine_customizer_settings');

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

function my_mce_buttons_2( $buttons ) {	
	/**
	 * Add in a core button that's disabled by default
	 */
	$buttons[] = 'superscript';
	$buttons[] = 'subscript';

	return $buttons;
}
add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );
