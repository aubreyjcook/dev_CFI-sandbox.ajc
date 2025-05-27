function enqueue_subscription_scripts() {
    wp_enqueue_script(
        'subscription-form', 
        get_stylesheet_directory_uri() . '/js/subscription-form.js', 
        array('jquery'), 
        filemtime(get_stylesheet_directory() . '/js/subscription-form.js'), 
        true
    );
    
    // Localize script data
    wp_localize_script('subscription-form', 'subscription_vars', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'checkout_url' => wc_get_checkout_url()
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_subscription_scripts');