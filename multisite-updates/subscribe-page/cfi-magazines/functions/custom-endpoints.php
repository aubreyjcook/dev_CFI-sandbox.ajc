<?php
add_action('wp_ajax_process_subscription_selections', 'handle_subscription_selections');
add_action('wp_ajax_nopriv_process_subscription_selections', 'handle_subscription_selections');

function handle_subscription_selections() {
    try {
        // Verify nonce
        check_ajax_referer('add-to-cart', '_ajax_nonce');
        
        // Validate input
        if (empty($_POST['products'])) {
            throw new Exception('No products selected');
        }

        $products = json_decode(stripslashes($_POST['products']), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Invalid product data format');
        }

        WC()->cart->empty_cart();
        $errors = [];

        foreach ($products as $product) {
            if (empty($product['id']) || !is_numeric($product['id'])) {
                $errors[] = 'Invalid product ID';
                continue;
            }

            $product_obj = wc_get_product($product['id']);
            if (!$product_obj) {
                $errors[] = $product['id'];
                continue;
            }

            if (!WC()->cart->add_to_cart($product['id'])) {
                $errors[] = $product['id'];
            }
        }

        wp_send_json([
            'success' => empty($errors),
            'errors' => $errors,
            'cart_count' => WC()->cart->get_cart_contents_count(),
            'redirect_url' => wc_get_checkout_url()
        ]);

    } catch (Exception $e) {
        wp_send_json([
            'success' => false,
            'message' => $e->getMessage()
        ], 400);
    }
}

