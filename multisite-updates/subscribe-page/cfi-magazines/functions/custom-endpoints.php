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

// Example test via DeepSeek

function test_submission_handler(WP_REST_Request $request) {
    // Get raw input data
    $params = $request->get_params();
    
    // Simple WooCommerce interaction
    $cart_count_before = WC()->cart->get_cart_contents_count();
    WC()->cart->add_to_cart(229026); // Hardcoded test product
    $cart_count_after = WC()->cart->get_cart_contents_count();
    
    // Response with debug data
    return new WP_REST_Response([
        'success' => true,
        'received_data' => $params,
        'cart_change' => $cart_count_after - $cart_count_before,
        'debug' => [
            'cart_contents' => WC()->cart->get_cart(),
            'woocommerce_version' => WC()->version
        ]
    ], 200);
}

// Register temporary test route
add_action('rest_api_init', function() {
    register_rest_route('custom/v1', '/test-endpoint/', [
        'methods' => 'POST',
        'callback' => 'test_submission_handler',
        'permission_callback' => '__return_true' // Bypass auth for testing ONLY
    ]);
});

/* Instructions for test

2. Test with cURL (Directly from Terminal)

Run this command (replace YOURSITE.com):
bash

curl -X POST https://YOURSITE.com/wp-json/custom/v1/test-endpoint/ \
  -H "Content-Type: application/json" \
  -d '{"test":"value"}'

Expected Output:
json

{
  "success": true,
  "received_data": {"test":"value"},
  "cart_change": 1,
  "debug": {
    "cart_contents": {
      "a1b2c3d": {
        "product_id": 229026,
        "quantity": 1
      }
    },
    "woocommerce_version": "7.9.0"
  }
}



*/