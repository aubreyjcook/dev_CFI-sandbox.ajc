<?php
// Define product pairs
$products = [
    'digital' => [
        '1-year' => 229026,
        '2-year' => 289595
    ],
    'print' => [
        '1-year' => 229019,
        '2-year' => 289637
    ]
];

// Fetch product data
$product_data = [];
foreach ($products as $type => $durations) {
    foreach ($durations as $duration => $id) {
        $product = wc_get_product($id);
        if ($product) {
            $product_data[$type][$duration] = [
                'id' => $id,
                'price' => $product->get_price_html(),
                'title' => $product->get_title()
            ];
        }
    }
}
?>

<form id="subscriptionForm" method="post" action="">
    <!-- Digital Subscription -->
    <div class="product digital">
        <h2>Digital Subscription</h2>
        <div class="options">
            <?php foreach ($product_data['digital'] as $duration => $data) : ?>
                <label>
                    <input type="radio" 
                           name="digital_subscription" 
                           value="<?php echo $data['id']; ?>"
                           <?php checked($duration, '1-year'); ?>>
                    <?php echo ucfirst($duration); ?> - <?php echo $data['price']; ?>
                </label>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Print Subscription -->
    <div class="product print">
        <h2>Print + Digital Subscription</h2>
        <div class="options">
            <?php foreach ($product_data['print'] as $duration => $data) : ?>
                <label>
                    <input type="radio" 
                           name="print_subscription" 
                           value="<?php echo $data['id']; ?>"
                           <?php checked($duration, '1-year'); ?>>
                    <?php echo ucfirst($duration); ?> - <?php echo $data['price']; ?>
                </label>
            <?php endforeach; ?>
        </div>
    </div>

    <button type="submit" class="button">Add to Order</button>

    <!-- woocommerce template hook for old button
    https://woocommerce.github.io/code-reference/namespaces/default.html#function_wc_get_template -->
    <!-- old button (enclosed in php) -->
    <!-- <php wc_get_template( 'checkout/add-to-cart/opc.php', array( 'product' => $selected_product ), '', PP_One_Page_Checkout::$template_path );> -->
</form>

<script>
// Temporary test button
/*
document.body.innerHTML += `
  <button id="testButton" style="position:fixed;top:10px;right:10px;z-index:9999;">
    Test Endpoint
  </button>
`;
*/

/* new from refactor examnple 02 */
document.querySelector('.subscription-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Get selected products
    const digitalProduct = document.querySelector('input[name="digital_subscription"]:checked')?.value;
    const printProduct = document.querySelector('input[name="print_subscription"]:checked')?.value;
    
    // Prepare cart data
    const productsToAdd = [];
    if (digitalProduct) productsToAdd.push({ id: digitalProduct });
    if (printProduct) productsToAdd.push({ id: printProduct });

    // Clear cart and add items
    fetch(wc_add_to_cart_params.ajax_url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            action: 'process_subscription_selections',
            products: JSON.stringify(productsToAdd),
            _ajax_nonce: wc_add_to_cart_params.nonce
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = wc_add_to_cart_params.cart_url;
        }
    });
});

/* Not used 2025-05-17 ac
document.getElementById('testButton').addEventListener('click', async () => {
  try {
    const response = await fetch('/wp-json/custom/v1/test-endpoint/', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ test: 'frontend_data' })
    });
    const data = await response.json();
    console.log('Test Response:', data);
    alert(`Check console! Cart items changed by: ${data.cart_change}`);
  } catch (error) {
    console.error('Test Failed:', error);
  }
});

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
        const ajaxEndpoint = 'https://skepticalinquirer.org/wp-json/custom/v1/endpoint/';
        
        fetch(ajaxEndpoint, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                // If using a nonce, include it here (e.g., 'X-WP-Nonce': myPluginData.nonce)
                // make this work ajc 05-05-2025
                //'X-WP-Nonce': myPluginData.nonce // Example nonce, replace with your actual nonce
            },
            body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.querySelector('.cart-count').textContent = data.cartCount; // Update cart count in the UI.
                // Optionally, redirect or update the UI.
                window.location.href = '/checkout/';
            } else {
                alert('Failed to update cart');
            }
        })
        .catch(error => {
            console.error('AJAX error:', error);
        });
    });
});
*/
</script>
