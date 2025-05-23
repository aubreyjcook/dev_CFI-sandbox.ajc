document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('subscriptionForm');
    const typeRadios = document.querySelectorAll('input[name="subscription_type"]');
    const durationRadios = document.querySelectorAll('input[name="subscription_duration"]');
    const productIdField = document.getElementById('selected_product_id');

    // Initialize product data (same as PHP structure)
    const productData = {
        digital: {
            '1-year': <?php echo $product_data['digital']['1-year']['id']; ?>,
            '2-year': <?php echo $product_data['digital']['2-year']['id']; ?>
        },
        print: {
            '1-year': <?php echo $product_data['print']['1-year']['id']; ?>,
            '2-year': <?php echo $product_data['print']['2-year']['id']; ?>
        }
    };
    
   function updateProductId() {
        const selectedType = document.querySelector('input[name="subscription_type"]:checked').value;
        const selectedDuration = document.querySelector('input[name="subscription_duration"]:checked').value;
        productIdField.value = productData[selectedType][selectedDuration];
    }
    
    // Set event listeners for UI updates
    typeRadios.forEach(radio => radio.addEventListener('change', updateProductId));
    durationRadios.forEach(radio => radio.addEventListener('change', updateProductId));

    // Handle form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const productId = productIdField.value;
        
        // Show loading state
        const submitBtn = form.querySelector('button[type="submit"]');
        submitBtn.disabled = true;
        submitBtn.textContent = 'Processing...';

        // Prepare AJAX data
        const formData = new FormData();
        formData.append('action', 'process_subscription_selections');
        formData.append('products', JSON.stringify([{id: productId}]));
        formData.append('_ajax_nonce', '<?php echo wp_create_nonce('add-to-cart'); ?>');

        // Send to WooCommerce
        fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Optional: Show success message
                alert('Subscription added to cart!');
                
                // Redirect to checkout
                window.location.href = '<?php echo wc_get_checkout_url(); ?>';
            } else {
                alert('Error: Could not add to cart. Please try again.');
                console.error('Failed products:', data.errors);
            }
        })
        .catch(error => {
            console.error('AJAX error:', error);
            alert('Network error occurred. Please try again.');
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Add to Order';
        });
    });
});