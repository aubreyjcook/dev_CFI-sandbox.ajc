<?php
/* This was an attempt to establish a custom endpoint via post but wasn't successful due to undetermined configurations on the server, new approach needed, 05-17-2025 ac */
add_action('rest_api_init', function() {
    register_rest_route('custom/v1', '/endpoint/', [
        'methods' => WP_REST_Server::CREATABLE, // Handles POST requests
        'callback' => 'custom_endpoint_handler',
        'permission_callback' => '__return_true'
    ]);
});

function custom_endpoint_handler(WP_REST_Request $request) {
    // Now accessible via POST
    return new WP_REST_Response(['message' => 'POST successful!'], 200);
}