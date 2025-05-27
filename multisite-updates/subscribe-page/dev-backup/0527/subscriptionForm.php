<!-- Subscription Type Selection -->
    <div class="subscription-type">
        <label>
            <input type="radio" 
                   name="subscription_type" 
                   value="digital" 
                   checked="checked">
            Digital Subscription
        </label>
        <label>
            <input type="radio" 
                   name="subscription_type" 
                   value="print">
            Print + Digital Subscription
        </label>
    </div>

    <!-- Duration Selection -->
    <div class="subscription-duration">
        <h3>Subscription Length</h3>
        <div class="options">
            <?php foreach ($product_data['digital'] as $duration => $data) : ?>
                <label>
                    <input type="radio" 
                           name="subscription_duration" 
                           value="<?php echo $duration; ?>"
                           data-product-id="<?php echo $data['id']; ?>"
                           <?php checked($duration, '1-year'); ?>>
                    <?php echo ucfirst($duration); ?> - <?php echo $data['price']; ?>
                </label>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Hidden field for final product ID -->
    <!--
    <input type="hidden" name="selected_product_id" id="selected_product_id" 
           value="<?php //echo $product_data['digital']['1-year']['id']; ?>"> 
    

    <button type="submit" class="button">Add to Order</button>
    -->

    <!-- woocommerce template hook for old button
    https://woocommerce.github.io/code-reference/namespaces/default.html#function_wc_get_template -->
    <!-- old button (enclosed in php) -->
    <!-- <php wc_get_template( 'checkout/add-to-cart/opc.php', array( 'product' => $selected_product ), '', PP_One_Page_Checkout::$template_path );> -->