# Readme

## notes

*Where to find template files*

"The various template files on your WooCommerce site can be found via an FTP client or your hosts file manager, in /wp-content/plugins/woocommerce/templates/. Alternatively, you can find the template files on our repository on GitHub." -> https://github.com/woocommerce/woocommerce/blob/trunk/docs/theme-development/template-structure.md 


*Origin product pages*

Main subscribe page: https://skepticalinquirer.org/subscribe/

Product pages (legacy): https://skepticalinquirer.org/product/skeptical-inquirer-print-subscription/ https://skepticalinquirer.org/product/skeptical-inquirer-digital-subscription/

## LLM

### DeepSeek

*Output 01*

```
Core Components of a WooCommerce Cart Form
1. Product Selection Template (single-product/add-to-cart/variable.php)
php

<form class="cart" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype="multipart/form-data">
    
    <!-- Variation Selection -->
    <?php if ($product->is_type('variable')) : ?>
        <div class="variations">
            <?php foreach ($product->get_variation_attributes() as $attribute_name => $options) : ?>
                <div class="variation">
                    <label for="<?php echo esc_attr(sanitize_title($attribute_name)); ?>">
                        <?php echo wc_attribute_label($attribute_name); ?>
                    </label>
                    <?php
                    wc_dropdown_variation_attribute_options([
                        'options' => $options,
                        'attribute' => $attribute_name,
                        'product' => $product,
                    ]);
                    ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- Quantity Input -->
    <div class="quantity">
        <input type="number" name="quantity" value="1" min="1" max="<?php echo esc_attr($product->get_max_purchase_quantity()); ?>">
    </div>

    <!-- Submit Button -->
    <button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="single_add_to_cart_button">
        <?php echo esc_html($product->single_add_to_cart_text()); ?>
    </button>

    <!-- Hidden Fields -->
    <input type="hidden" name="product_id" value="<?php echo esc_attr($product->get_id()); ?>">
    <input type="hidden" name="variation_id" class="variation_id" value="0">
</form>

How It Works (PHP Perspective)
1. Form Initialization

    Action URL: Points to product permalink or cart page

    Method: POST with multipart/form-data encoding

    Key Elements:
    php

    do_action('woocommerce_before_add_to_cart_form');  // Hook for plugins
    $product->get_variation_attributes();  // Gets available variations

2. Variation Handling

    Dropdown Generation:
    php

    wc_dropdown_variation_attribute_options([
        'attribute' => 'pa_duration',
        'product' => $product,
    ]);

        Automatically creates <select> with variation options

        JavaScript updates variation_id when selections change

3. Cart Submission

    Form Submission:
    php

    // In woocommerce/includes/class-wc-form-handler.php
    WC_Form_Handler::add_to_cart_action() {
        if (isset($_POST['add-to-cart'])) {
            $product_id = absint($_POST['product_id']);
            $quantity = absint($_POST['quantity']);
            $variation_id = absint($_POST['variation_id']);
            
            WC()->cart->add_to_cart($product_id, $quantity, $variation_id);
        }
    }

Key Template Hooks for Your Implementation
1. Before Form
php

do_action('woocommerce_before_add_to_cart_form');

    Use Case: Add custom HTML before the form

    Your Implementation:
    php

    add_action('woocommerce_before_add_to_cart_form', function() {
        echo '<div class="product-description">Your content</div>';
    });

2. After Quantity Input
php

do_action('woocommerce_after_add_to_cart_quantity');

    Use Case: Add custom buttons or messages

    Your Implementation:
    php

    add_action('woocommerce_after_add_to_cart_quantity', function() {
        echo '<button class="custom-button">Special Offer</button>';
    });

3. Before Submit Button
php

do_action('woocommerce_before_add_to_cart_button');

    Use Case: Insert additional form fields

    Your Implementation:
    php

    add_action('woocommerce_before_add_to_cart_button', function() {
        echo '<input type="hidden" name="subscription_type" value="premium">';
    });

Adapting Your Current Form
1. Convert Radio Buttons to WC-Compatible Structure
php

<div class="variations">
    <?php 
    $attribute_name = 'pa_duration';
    $options = $product->get_variation_attributes()[$attribute_name];
    ?>
    <div class="variation">
        <?php foreach ($options as $option) : ?>
            <label>
                <input type="radio" 
                       name="attribute_<?php echo esc_attr($attribute_name); ?>" 
                       value="<?php echo esc_attr($option); ?>"
                       <?php checked($option, '1-year'); ?>>
                <?php echo esc_html($option); ?>
            </label>
        <?php endforeach; ?>
    </div>
</div>

2. Modified Add-to-Cart Button
php

<button type="submit" 
        class="single_add_to_cart_button" 
        data-product_id="<?php echo $product->get_id(); ?>"
        data-variation_id="<?php echo $default_variation_id; ?>">
    <?php echo $product->single_add_to_cart_text(); ?>
</button>

JavaScript Integration
javascript

// Update variation ID when radio changes
document.querySelectorAll('input[name^="attribute_"]').forEach(input => {
    input.addEventListener('change', function() {
        const form = this.closest('form.cart');
        form.querySelector('.variation_id').value = 
            get_matching_variation_id(this.value); // Your lookup function
    });
});

// AJAX add-to-cart
document.querySelector('form.cart').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    fetch(this.action, {
        method: 'POST',
        body: formData
    }).then(response => {
        $(document.body).trigger('added_to_cart'); // WC event
    });
});

Why This Structure Works

    Native WC Processing

        Uses built-in WC_Form_Handler

        Supports all WC validation rules

    Theme Compatibility

        Works with any WC-compatible theme

        Responsive by default

    Extensible
    php

// Example: Custom validation
add_filter('woocommerce_add_to_cart_validation', function($passed, $product_id) {
    if ($product_id == 123 && !isset($_POST['special_field'])) {
        wc_add_notice('Special field required', 'error');
        return false;
    }
    return $passed;
}, 10, 2);
```