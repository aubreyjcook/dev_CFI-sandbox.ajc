<?php
/**
 * Custom 404 Redirect Function for Pattern 2
 * Handles cases where the last segment is identical to the second-to-last segment.
 */
function custom_404_redirect_pattern2() {
    if (is_404()) {
        // Get the requested URI and trim leading/trailing slashes
        $requested_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        // Split the URI into segments
        $segments = explode('/', $requested_uri);

        // Check if the last two segments are identical
        $count = count($segments);
        if ($count >= 2 && $segments[$count - 1] === $segments[$count - 2]) {
            // Remove the last segment (duplicate)
            array_pop($segments);

            // Reconstruct the new path
            $new_path = implode('/', $segments) . '/';

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
    }
}
add_action('template_redirect', 'custom_404_redirect_pattern2');
