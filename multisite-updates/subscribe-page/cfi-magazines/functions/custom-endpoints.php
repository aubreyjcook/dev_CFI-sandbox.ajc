//<?php
add_action('rest_api_init', function() {
    register_rest_route('custom/v1', '/endpoint/', array(
        /* old ajc 05-05-2025 
        'methods' => 'GET',
        'callback' => 'custom_endpoint_handler',
        'permission_callback' => '__return_true' // Or your custom permission check */

        'methods' => 'POST',
        'callback' => 'custom_endpoint_handler',
        'permission_callback' => function (WP_REST_Request $request) {
            $nonce = $request->get_header('X-WP-Nonce');

            return wp_verify_nonce($nonce, 'wp_rest');
        }
    ));
});

function custom_endpoint_handler(WP_REST_Request $request) {
    // Process request and return response
    // return new WP_REST_Response(['message' => 'Custom REST endpoint'], 200);
    $params = $request->get_params();

    WC()->cart->empty_cart(); // Clear the cart before adding new items
    
    $errors = [];
    if(!empty($params['product_a'])){
        WC()->cart->add_to_cart($params['product_a']);
    }
    if(!empty($params['product_b'])){
        WC()->cart->add_to_cart($params['product_b']);
    }

    return new WP_REST_Response([
        'success' => empty($errors),
        'cart-count' => WC()->cart->get_cart_contents_count(),
    ], 200);
}