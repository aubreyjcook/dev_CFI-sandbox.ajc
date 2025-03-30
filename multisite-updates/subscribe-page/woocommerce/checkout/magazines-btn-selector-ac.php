<?php
// Get the product IDs from the shortcode
$product_ids = array( 229026, 229019, 289595, 289637 );

// Fetch product data
$products = array();
foreach ( $product_ids as $product_id ) {
	$product = wc_get_product( $product_id );
	if ( $product ) {
		$products[$product_id] = array(
			'price' => $product->get_price_html(),
			'title' => $product->get_title(),
			'object' => $product, // Store the product object
		);
	}
}
?>

<form id="subscriptionForm" method="post" action="">
    <div class="product product-a">
        <h2>Product A</h2>
        <div class="subscription-options" id="subscription-productA">
            <label>
                <input type="radio" name="product_a_subscription" value="229026" data-product-id="229026" checked>
                1 Year - <?php echo $products[229026]['price']; ?>
            </label>
            <label>
                <input type="radio" name="product_a_subscription" value="289595" data-product-id="289595">
                2 Years - <?php echo $products[289595]['price']; ?>
            </label>
        </div>
        <!-- Hidden input to store current selection -->
        <input type="hidden" name="selected_product_a" id="selected_product_a" value="229026">
    </div>

    <div class="product product-b">
        <h2>Product B</h2>
        <div class="subscription-options" id="subscription-productB">
            <label>
                <input type="radio" name="product_b_subscription" value="229019" data-product-id="229019" checked>
                1 Year - <?php echo $products[229019]['price']; ?>
            </label>
            <label>
                <input type="radio" name="product_b_subscription" value="289637" data-product-id="289637">
                2 Years - <?php echo $products[289637]['price']; ?>
            </label>
        </div>
        <!-- Hidden input to store current selection -->
        <input type="hidden" name="selected_product_b" id="selected_product_b" value="229019">
    </div>

    <!-- Final submission button -->
    <button type="submit" id="submitOrderButton">Submit Order</button>

    <!-- woocommerce template hook for old button
    https://woocommerce.github.io/code-reference/namespaces/default.html#function_wc_get_template -->
    <!-- old button (enclosed in php) -->
    <!-- <php wc_get_template( 'checkout/add-to-cart/opc.php', array( 'product' => $selected_product ), '', PP_One_Page_Checkout::$template_path );> -->
</form>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Create a state object for tracking selections.
    const subscriptionState = {
        productA: {
            selectedId: '229026', // default value for Product A
        },
        productB: {
            selectedId: '229019', // default value for Product B
        }
    };

    // Helper function to update the hidden inputs based on state.
    function updateHiddenInputs() {
        document.getElementById('selected_product_a').value = subscriptionState.productA.selectedId;
        document.getElementById('selected_product_b').value = subscriptionState.productB.selectedId;
    }

    // Attach event listeners for Product A options
    document.querySelectorAll('#subscription-productA input[type="radio"]').forEach((radio) => {
        radio.addEventListener('change', function() {
            const selectedId = this.getAttribute('data-product-id');
            subscriptionState.productA.selectedId = selectedId;
            console.log('Product A selection updated:', subscriptionState.productA.selectedId);
            updateHiddenInputs();
        });
    });

    // Attach event listeners for Product B options
    document.querySelectorAll('#subscription-productB input[type="radio"]').forEach((radio) => {
        radio.addEventListener('change', function() {
            const selectedId = this.getAttribute('data-product-id');
            subscriptionState.productB.selectedId = selectedId;
            console.log('Product B selection updated:', subscriptionState.productB.selectedId);
            updateHiddenInputs();
        });
    });

    // Option 1: Standard form submission (hidden inputs already updated)
    // The form will be submitted and processed on the server side.
    
    // Option 2: AJAX submission example:
    document.getElementById('subscriptionForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent default form submission.
        
        // Optionally update hidden inputs again (if needed)
        updateHiddenInputs();
        
        // Prepare data to send.
        const formData = {
            product_a: subscriptionState.productA.selectedId,
            product_b: subscriptionState.productB.selectedId
        };

        // Replace with your actual AJAX endpoint URL.
        const ajaxEndpoint = 'https://yourdomain.com/wp-json/myplugin/v1/update_order';
        
        fetch(ajaxEndpoint, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                // If using a nonce, include it here (e.g., 'X-WP-Nonce': myPluginData.nonce)
            },
            body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Order updated successfully:', data.message);
                // Optionally, redirect or update the UI.
            } else {
                console.error('Order update failed:', data.message);
            }
        })
        .catch(error => {
            console.error('AJAX error:', error);
        });
    });
});
</script>
