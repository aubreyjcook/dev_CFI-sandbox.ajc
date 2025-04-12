<?php
// Inside custom-endpoints.php

// Hook into the REST API initialization
add_action( 'rest_api_init', function () {
    register_rest_route( 'myplugin/v1', '/update_order', array(
        'methods'             => 'POST',
        'callback'            => 'myplugin_update_order_callback',
        'permission_callback' => function ( WP_REST_Request $request ) {
            // You can check user capabilities or a nonce here for security.
            return current_user_can( 'edit_posts' );
        },
    ) );
} );

/**
 * Callback function for the custom endpoint.
 *
 * @param WP_REST_Request $request
 * @return WP_REST_Response
 */
function myplugin_update_order_callback( WP_REST_Request $request ) {
    // Retrieve data from request.
    $product_a_id = sanitize_text_field( $request->get_param( 'product_a' ) );
    $product_b_id = sanitize_text_field( $request->get_param( 'product_b' ) );

    // Recreate product objects.
    $product_a = wc_get_product( $product_a_id );
    $product_b = wc_get_product( $product_b_id );

    // Process the data: add to WooCommerce cart, etc.
    if ( $product_a ) {
        WC()->cart->add_to_cart( $product_a->get_id(), 1 );
    }
    if ( $product_b ) {
        WC()->cart->add_to_cart( $product_b->get_id(), 1 );
    }

    $response = array(
        'success' => true,
        'message' => 'Products added to cart successfully!',
    );

    return new WP_REST_Response( $response, 200 );
}
