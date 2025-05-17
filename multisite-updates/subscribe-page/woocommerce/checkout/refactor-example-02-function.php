<?php
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