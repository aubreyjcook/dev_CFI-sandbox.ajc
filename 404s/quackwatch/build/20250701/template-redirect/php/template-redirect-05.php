<?php	 
/**
 * Custom 404 Redirect Function for Patterns 1, 2, 3, and 4
 * - Pattern 1: Remove the first segment after '/related/'
 * - Pattern 2: Remove intermediate segments under '/related/tests/'
 * - Pattern 3: Remove the last duplicate segment if the last two segments are identical
 * - Pattern 4: Truncate path to root level if redundant segments follow a root-level segment
 */
function custom_404_redirect_patterns() {
    if (is_404()) {
        // Get the requested URI and trim leading/trailing slashes
        $requested_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

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
