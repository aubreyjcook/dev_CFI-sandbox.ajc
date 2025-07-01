<?php
// Ensure this code is within the PHP tags of functions.php

/**
 * Test Template Redirect Function
 * Redirects /test-redirect/ to the homepage to verify template_redirect is working.
 */
function test_template_redirect() {
    // Define the test slug
    $test_slug = 'test-redirect';

    // Get the current request URI and trim slashes
    $current_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

    // Check if the current URI matches the test slug
    if ($current_uri === $test_slug) {
        // Define the target URL (e.g., homepage)
        $target_url = home_url('/');

        // Perform the redirect with a 302 status
        wp_redirect($target_url, 302);
        exit;
    }
}
add_action('template_redirect', 'test_template_redirect');
