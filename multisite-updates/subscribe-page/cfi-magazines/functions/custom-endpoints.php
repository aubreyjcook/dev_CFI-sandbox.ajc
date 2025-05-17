<?php
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