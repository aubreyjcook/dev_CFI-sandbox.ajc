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

<div class="product-grid">
	<!-- Product A -->
	<div class="product product-a">
		<h2>Product A</h2>
		<div class="product-description">
			<strong>What’s Included</strong>
			<ul>
				<li>Unlimited access to skepticalinquirer.org</li>
				<li><em>Skeptical Inquirer</em>’s complete digital archive</li>
				<li>Download full issue PDFs for easier reading</li>
			</ul>
		</div>
		<h3>Subscription Length</h3>
		<div class="subscription-options">
			<label>
				<input type="radio" name="product_a_subscription" value="229026" data-product-id="229026" checked>
				1 Year - <?php echo $products[229026]['price']; ?>
			</label>
			<label>
				<input type="radio" name="product_a_subscription" value="289595" data-product-id="289595">
				2 Years - <?php echo $products[289595]['price']; ?>
			</label>
		</div>
		<div class="product-quantity">
			<?php
			// Default to the 1-year subscription for Product A
			$selected_product = $products[229026]['object'];
			?>
			<?php wc_get_template( 'checkout/add-to-cart/opc.php', array( 'product' => $selected_product ), '', PP_One_Page_Checkout::$template_path ); ?>
		</div>
	</div>

	<!-- Product B -->
	<div class="product product-b">
		<h2>Product B</h2>
		<div class="product-description">
			<strong>What’s Included</strong>
			<ul>
				<li>Unlimited access to skepticalinquirer.org</li>
				<li><em>Skeptical Inquirer</em>’s complete digital archive</li>
				<li>Download full issue PDFs for easier reading</li>
				<li>6 issues a year delivered to your door</li>
			</ul>
		</div>
		<h3>Subscription Length</h3>
		<div class="subscription-options">
			<label>
				<input type="radio" name="product_b_subscription" value="229019" data-product-id="229019" checked>
				1 Year - <?php echo $products[229019]['price']; ?>
			</label>
			<label>
				<input type="radio" name="product_b_subscription" value="289637" data-product-id="289637">
				2 Years - <?php echo $products[289637]['price']; ?>
			</label>
		</div>
		<div class="product-quantity">
			<?php
			// Default to the 1-year subscription for Product B
			$selected_product = $products[229019]['object'];
			?>
			<?php wc_get_template( 'checkout/add-to-cart/opc.php', array( 'product' => $selected_product ), '', PP_One_Page_Checkout::$template_path ); ?>
		</div>
	</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
	// Product A
	const productAOptions = document.querySelectorAll('input[name="product_a_subscription"]');
	const productAAddToCartButton = document.querySelector('.product-a .add_to_cart_button');

	// Product B
	const productBOptions = document.querySelectorAll('input[name="product_b_subscription"]');
	const productBAddToCartButton = document.querySelector('.product-b .add_to_cart_button');

	// Function to update the "Add to Order" button
	function updateAddToCartButton(selectedProductId, addToCartButton) {
		// Update the button's attributes
		addToCartButton.setAttribute('data-product_id', selectedProductId);
		addToCartButton.setAttribute('data-add_to_cart', selectedProductId);
		addToCartButton.setAttribute('id', `product_${selectedProductId}`);
		addToCartButton.setAttribute('value', selectedProductId);

		// Remove and re-add the button to force the OPC plugin to re-bind its event handlers
		const parent = addToCartButton.parentElement;
		const clone = addToCartButton.cloneNode(true);
		parent.removeChild(addToCartButton);
		parent.appendChild(clone);

		// Trigger the OPC plugin's event handlers
		if (typeof wcopc !== 'undefined' && typeof wcopc.bindAddToCartButtons === 'function') {
			wcopc.bindAddToCartButtons();
		}
	}

	// Add event listeners to Product A radio buttons
	productAOptions.forEach(option => {
		option.addEventListener('change', function() {
			updateAddToCartButton(this.getAttribute('data-product-id'), productAAddToCartButton);
		});
	});

	// Add event listeners to Product B radio buttons
	productBOptions.forEach(option => {
		option.addEventListener('change', function() {
			updateAddToCartButton(this.getAttribute('data-product-id'), productBAddToCartButton);
		});
	});
});
</script>