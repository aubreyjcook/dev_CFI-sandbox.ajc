<?php 
/**
 * Custom 404 Redirect Function for Pattern 1
 * Removes the first segment after '/related/' and redirects to the new URL.
 */
function custom_404_redirect_pattern1() {
    if (is_404()) {
        // Get the requested URI and trim leading/trailing slashes
        $requested_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        // Check if the URL starts with 'related/'
        if (strpos($requested_uri, 'related/') === 0) {
            // Remove 'related/' from the beginning
            $path = substr($requested_uri, strlen('related/'));

            // Split the remaining path into segments
            $segments = explode('/', $path);

            // Check if there are at least two segments to apply Pattern 1
            if (count($segments) >= 2) {
                // Remove the first segment
                array_shift($segments);

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
        }
    }
}
add_action('template_redirect', 'custom_404_redirect_pattern1');

/**
 * Checks if a page exists for the given URL.
 *
 * @param string $url The URL to check.
 * @return bool True if the page exists, false otherwise.
 */
function custom_404_redirect_page_exists($url) {
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

    return ($page instanceof WP_Post);
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
