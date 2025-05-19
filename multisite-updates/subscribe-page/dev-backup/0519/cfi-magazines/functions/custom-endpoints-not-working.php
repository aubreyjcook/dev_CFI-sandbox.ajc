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

    register_rest_route('custom/v1', '/test-endpoint/', [
        'methods' => 'POST',
        'callback' => 'live_test_submission_handler',
        'permission_callback' => function(WP_REST_Request $request) {
            // Triple-lock safety:
            // 1. Require admin privileges
            // 2. Check for secret key in request
            // 3. Verify nonce
            return current_user_can('administrator') 
                && $request->get_param('secret_key') === 'YOUR_UNIQUE_KEY'
                && wp_verify_nonce($request->get_header('X-WP-Nonce'), 'wp_rest');
        }
    ]);
});

function custom_endpoint_handler(WP_REST_Request $request) {
    // Process request and return response
    /* return new WP_REST_Response(['message' => 'Custom REST endpoint'], 200); */
    $params = $request->get_params();

    /* WC()->cart->empty_cart(); // Clear the cart before adding new items
    
    $errors = [];
    if(!empty($params['product_a'])){
        WC()->cart->add_to_cart($params['product_a']);
    }
    if(!empty($params['product_b'])){
        WC()->cart->add_to_cart($params['product_b']);
    } */

    return new WP_REST_Response([
        'success' => empty($errors),
        'cart-count' => WC()->cart->get_cart_contents_count(),
    ], 200);
}

function live_test_submission_handler(WP_REST_Request $request) {
    // 1. Use a SAFE TEST PRODUCT (low stock, unpublished, or specifically created for testing)
    $safe_test_product = 229026; // Must be a real but non-critical product
    
    // 2. Never modify real cart - use a temporary cart instance
    $temp_cart = clone WC()->cart;
    $temp_cart->empty_cart();
    
    // 3. Test operations
    $success = $temp_cart->add_to_cart($safe_test_product);
    
    // 4. Return debug data WITHOUT affecting real cart
    return new WP_REST_Response([
        'live_test' => [
            'success' => $success,
            'test_product' => $safe_test_product,
            'simulated_cart_count' => $temp_cart->get_cart_contents_count(),
            'real_cart_unchanged' => WC()->cart->get_cart_contents_count(),
            'received_data' => $request->get_params(),
            'warning' => 'This simulation did NOT modify the live cart'
        ]
    ], 200);
}


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