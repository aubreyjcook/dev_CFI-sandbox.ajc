<?php

include(get_stylesheet_directory().'/functions/uploads-customizer-misc.php');

include(get_stylesheet_directory().'/functions/custom-post-types.php');

include(get_stylesheet_directory().'/functions/custom-taxonomies.php');

include(get_stylesheet_directory().'/functions/acf-fields.php');

include(get_stylesheet_directory().'/functions/overrides.php');

//include(get_theme_root().'/css/gutenberg.php');

//include(get_stylesheet_directory().'/functions/gutenberg.php');

//include(get_stylesheet_directory()./functions/multisite-blog-feed');

// Add everyaction donation script
function register_scripts() {
  wp_enqueue_script( 'custom_form_js', site_url() . '/js/everyactionmembership.js', [], true);
}
add_action( 'wp_enqueue_scripts', 'register_scripts' );

// Adjusting excerpt length for Search
function custom_excerpt_length( $length ) {
    return 125;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Add Footer Menu
function register_footer_menu() {
  register_nav_menu('secondary-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'register_footer_menu' );

// Queue parent style followed by child/customized style
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'cfi-style', get_theme_root_uri() . '/css/style.css', array(), filemtime(get_theme_root() . '/css/style.css') );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime(get_stylesheet_directory() . '/style.css') ) ;
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', PHP_INT_MAX);

function theme_login_styles() {
    wp_enqueue_style( 'cfi-style', get_theme_root_uri() . '/css/login.css', array(), filemtime(get_theme_root() . '/css/login.css') );
}
add_action( 'login_enqueue_scripts', 'theme_login_styles' );

add_editor_style();


// adjust the text to "Report abuse" rather than "Report comment"
add_filter( 'zeno_report_comments_flagging_link_text', 'adjust_flagging_text' );
function adjust_flagging_text( $text ) {
    return '<span class="fas fa-exclamation-circle"></span> Report abuse';
}


// Add options page
if( function_exists('acf_add_options_sub_page') ) {
	acf_add_options_sub_page('Quackwatch Info');
}

	  
/**
 * Custom 404 Redirect Function for Patterns 1, 2, 3, and 4
 * - Pattern 1: Remove the first segment after '/related/'
 * - Pattern 2: Remove intermediate segments under '/related/tests/'
 * - Pattern 3: Remove the last duplicate segment if the last two segments are identical
 * - Pattern 4: Truncate path to root level if redundant segments follow a root-level segment
 * - Pattern 5: Handle nested structure cases, retaining the last segment
 * - Pattern 6: Keep only the first and last segments, discarding intermediates
 */
function custom_404_redirect_patterns() {
    if (is_404()) {
        // Get the requested URI and trim leading/trailing slashes
        $requested_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        // Split the URI into segments
        $segments = explode('/', $requested_uri);

        // **Pattern 6: Keep only the first and last segments, discarding intermediates**
        if (count($segments) >= 3) {
            // Get the first and last segments
            $first_segment = $segments[0];
            $last_segment = $segments[count($segments) - 1];

            // Reconstruct the new path
            $new_path = $first_segment . '/' . $last_segment . '/';

            // Construct the new URL
            $new_url = home_url('/' . $new_path);

            // Optional: Log the redirect attempt (for debugging)
            // Uncomment the line below to enable logging
            // custom_404_redirect_log($requested_uri, $new_url);

            // Check if the new URL exists to prevent unnecessary redirects
            if (custom_404_redirect_page_exists($new_url)) {
                // Perform the 301 Permanent Redirect
                wp_redirect($new_url, 301);
                exit;
            }
        }

        // **Pattern 5: Handle nested structure cases, retaining the last segment**
        if (count($segments) >= 3) {
            // Get the root segment (first segment)
            $root_segment = $segments[0];
            $last_segment = $segments[count($segments) - 1];

            if (strtolower($last_segment) !== strtolower($root_segment)) {
                $new_path = $root_segment . '/' . $last_segment . '/';
                $new_url = home_url('/related/' . $new_path);
                if (custom_404_redirect_page_exists($new_url)) {
                    wp_redirect($new_url, 301);
                    exit;
                }
            }
        }

        // Check if the URL starts with 'related/'
        if (strpos($requested_uri, 'related/') === 0) {
            // Remove 'related/' from the beginning
            $path = substr($requested_uri, strlen('related/'));

            // Split the remaining path into segments
            $segments = explode('/', $path);

            // **Pattern 4: Truncate path to root level if redundant segments follow a root-level segment**
            if (count($segments) >= 3) {
                // Get the first segment after '/related/' (considered as the root)
                $root_segment = $segments[0];

                // Check if the last segment matches the root segment
                if (strtolower($segments[count($segments) - 1]) === strtolower($root_segment)) {
                    // Truncate to just the root segment
                    $new_path = $root_segment . '/';

                    // Construct the new URL
                    $new_url = home_url('/related/' . $new_path);

                    // Optional: Log the redirect attempt (for debugging)
                    // Uncomment the line below to enable logging
                    // custom_404_redirect_log($requested_uri, $new_url);

                    // Check if the new URL exists to prevent unnecessary redirects
                    if (custom_404_redirect_page_exists($new_url)) {
                        // Perform the 301 Permanent Redirect
                        wp_redirect($new_url, 301);
                        exit;
                    }
                }
            }

            // **Pattern 3: Remove the last duplicate segment if the last two segments are identical**
            $count = count($segments);
            if ($count >= 2 && $segments[$count - 1] === $segments[$count - 2]) {
                // Remove the last segment (duplicate)
                array_pop($segments);

                // Reconstruct the new path
                $new_path = implode('/', $segments) . '/';

                // Construct the new URL
                $new_url = home_url('/related/' . $new_path);

                // Optional: Log the redirect attempt (for debugging)
                // Uncomment the line below to enable logging
                // custom_404_redirect_log($requested_uri, $new_url);

                // Check if the new URL exists to prevent unnecessary redirects
                if (custom_404_redirect_page_exists($new_url)) {
                    // Perform the 301 Permanent Redirect
                    wp_redirect($new_url, 301);
                    exit;
                }
            }

            // **Pattern 2: Remove intermediate segments under 'related/tests/'**
            if (count($segments) >= 3 && strtolower($segments[0]) === 'tests') {
                // Remove the intermediate segment (second segment)
                $modified_segments = $segments;
                array_splice($modified_segments, 1, 1); // Remove second segment

                // Reconstruct the new path
                $new_path = implode('/', $modified_segments) . '/';

                // Construct the new URL
                $new_url = home_url('/related/' . $new_path);

                // Optional: Log the redirect attempt (for debugging)
                // Uncomment the line below to enable logging
                // custom_404_redirect_log($requested_uri, $new_url);

                // Check if the new URL exists to prevent unnecessary redirects
                if (custom_404_redirect_page_exists($new_url)) {
                    // Perform the 301 Permanent Redirect
                    wp_redirect($new_url, 301);
                    exit;
                }
            }

            // **Pattern 1: Remove the first segment after 'related/'**
            if (count($segments) >= 2) {
                // Remove the first segment
                $modified_segments = $segments;
                array_shift($modified_segments);

                // Reconstruct the new path
                $new_path = implode('/', $modified_segments) . '/';

                // Construct the new URL
                $new_url = home_url('/related/' . $new_path);

                // Optional: Log the redirect attempt (for debugging)
                // Uncomment the line below to enable logging
                // custom_404_redirect_log($requested_uri, $new_url);

                // Check if the new URL exists to prevent unnecessary redirects
                if (custom_404_redirect_page_exists($new_url)) {
                    // Perform the 301 Permanent Redirect
                    wp_redirect($new_url, 301);
                    exit;
                }
            }
        }
    }
}
add_action('template_redirect', 'custom_404_redirect_patterns');

/**
 * Checks if a page exists for the given URL with caching.
 *
 * @param string $url The URL to check.
 * @return bool True if the page exists, false otherwise.
 */
function custom_404_redirect_page_exists($url) {
    // Create a unique cache key based on the URL
    $cache_key = 'custom_404_page_exists_' . md5($url);
    
    // Attempt to retrieve the cached result
    $exists = get_transient($cache_key);
    
    if ($exists === false) {
        // Parse the URL to get the path
        $parsed_url = wp_parse_url($url);
        $path = isset($parsed_url['path']) ? $parsed_url['path'] : '';
    
        // Get the home URL path
        $home_path = parse_url(home_url(), PHP_URL_PATH);
        if ($home_path) {
            // Remove the home path from the URL path
            $relative_path = str_replace($home_path, '', $path);
        } else {
            $relative_path = $path;
        }
        $relative_path = trim($relative_path, '/');
    
        // Check if the page exists
        $page = get_page_by_path($relative_path);
    
        $exists = ($page instanceof WP_Post);
    
        // Cache the result for 12 hours
        set_transient($cache_key, $exists, 12 * HOUR_IN_SECONDS);
    }
    

    return $exists;
											 

									  
}

/**
 * Logs redirect attempts to a file for debugging purposes.
 *
 * @param string $original_uri The original requested URI.
 * @param string $redirect_url The URL to which the request is redirected.
 */
function custom_404_redirect_log($original_uri, $redirect_url) {
    // Define the log file path
    $upload_dir = wp_upload_dir();
    $log_file = trailingslashit($upload_dir['basedir']) . 'custom-404-redirect.log';

    // Prepare the log entry with timestamp
    $log_entry = sprintf(
        "[%s] 404: %s => Redirected to: %s\n",
        current_time('mysql'),
        $original_uri,
        $redirect_url
    );

    // Append the log entry to the file
    file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);
}

//Replace external links to sciencebasedmedicine.org with its anchor tag and removing the hyperlink as a result of the site being flagged by google ads as comprimised. Remove this function if and when their site is fixed
function modify_outbound_links($content) {
    // First, check if the target string exists before running the regex to save time
    if (strpos($content, 'sciencebasedmedicine.org') !== false) {
        // Only run the regex if the string is present
        $pattern = '/<a\s+(?:[^>]*?\s+)?href="https?:\/\/(www\.)?sciencebasedmedicine\.org\/[^"]*"[^>]*>([^<]+)<\/a>/i'; // Captures link text
        $replacement = '$2';
        $content = preg_replace($pattern, $replacement, $content);
    }
    return $content;
}
add_filter('the_content', 'modify_outbound_links');