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