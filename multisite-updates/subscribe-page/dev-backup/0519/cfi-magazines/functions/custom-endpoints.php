<?php
/* new from refactor example 02 function.php 2025-05-17 ac
this is to utilize the inherent wc functions
*/
add_action('wp_ajax_process_subscription_selections', 'handle_subscription_selections');
add_action('wp_ajax_nopriv_process_subscription_selections', 'handle_subscription_selections');

function handle_subscription_selections() {
    check_ajax_referer('add-to-cart', '_ajax_nonce');
    
    $products = json_decode(stripslashes($_POST['products']), true);
    WC()->cart->empty_cart();
    
    $errors = [];
    foreach ($products as $product) {
        if (!WC()->cart->add_to_cart($product['id'])) {
            $errors[] = $product['id'];
        }
    }
    
    wp_send_json([
        'success' => empty($errors),
        'errors' => $errors,
        'cart_count' => WC()->cart->get_cart_contents_count()
    ]);
}


/* This is for viewing the products array data on the dev inspector
Access via:
https://yoursite.com/wp-json/debug/v1/products/
05-17-2025 ac */
add_action('rest_api_init', function() {
    register_rest_route('debug/v1', '/products/', [
        'methods'  => 'GET',
        'callback' => function() {
            $products = [
                'digital' => [
                    '1-year' => wc_get_product(229026),
                    '2-year' => wc_get_product(289595)
                ],
                'print' => [
                    '1-year' => wc_get_product(229019),
                    '2-year' => wc_get_product(289637)
                ]
            ];
            return new WP_REST_Response($products);
        }
    ]);
});