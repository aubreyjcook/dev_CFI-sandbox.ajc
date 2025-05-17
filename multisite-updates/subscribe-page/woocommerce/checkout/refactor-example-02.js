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