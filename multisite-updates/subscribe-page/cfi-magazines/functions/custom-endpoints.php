<?php
add_action('rest_api_init', function() {
    error_log('Registering custom REST endpoint'); // Debugging line
    register_rest_route('custom/v1', '/endpoint/', array(1
        'methods' => 'GET',
        'callback' => 'custom_endpoint_handler',
        'permission_callback' => '__return_true' // Or your custom permission check
    ));
});

function custom_endpoint_handler(WP_REST_Request $request) {
    // Process request and return response
    return new WP_REST_Response(['message' => 'Custom REST endpoint'], 200);
}