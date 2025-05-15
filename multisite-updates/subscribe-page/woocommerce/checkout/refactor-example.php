<div class="product-grid">
    <!-- Product A -->
    <div class="product product-a">
        <h2>Product A</h2>
        <div class="product-description">
            <!-- Your existing description -->
        </div>
        
        <?php 
        $product_a = wc_get_product(123); // Parent variable product ID
        $available_variations = $product_a->get_available_variations();
        ?>
        
        <h3>Subscription Length</h3>
        <div class="subscription-options">
            <?php foreach ($available_variations as $variation) : 
                $duration = $variation['attributes']['attribute_subscription_length'];
                $price = wc_price($variation['display_price']);
            ?>
                <label>
                    <input type="radio" 
                           name="product_a_variation" 
                           value="<?php echo esc_attr($variation['variation_id']); ?>"
                           <?php checked($duration, '1-year'); ?>>
                    <?php echo esc_html(ucfirst($duration)); ?> - <?php echo $price; ?>
                </label>
            <?php endforeach; ?>
        </div>
        
        <button class="single_add_to_cart_button" 
                data-product-id="<?php echo $product_a->get_id(); ?>"
                data-variation-id="<?php echo esc_attr($available_variations[0]['variation_id']); ?>">
            Add to Order
        </button>
    </div>

    <!-- Repeat for Product B -->
</div>