<?php
/**
 * Template to display product selection fields in a table with an accordion for 2-year subscriptions
 *
 * @package WooCommerce-One-Page-Checkout/Templates
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<table class="shop_table" cellspacing="0">
	<?php foreach( $products as $product ) : 
		$product_id = $product->get_id();
	?>
		<?php if ( $product_id == 229026 || $product_id == 229019 ) : ?>
			<!-- Display 1-year subscription products normally -->
			<tr class="product-item cart <?php if ( wcopc_get_products_prop( $product, 'in_cart' ) ) echo 'selected'; ?>">
				<td class="product-thumbnail">
					<a href="?add-to-cart=<?php echo $product_id; ?>"><?php echo $product->get_image('large'); ?></a>
				</td>
				<td class="product-name">
					<?php echo $product->get_title(); ?>
					<?php if ( $product->is_type( 'variation' ) ) : ?>
						<?php $attribute_string = sprintf( '&nbsp;(%s)', wc_get_formatted_variation( $product->get_variation_attributes(), true ) ); ?>
						<span class="attributes"><?php echo esc_html( apply_filters( 'wcopc_attributes', $attribute_string, $product->get_variation_attributes(), $product ) ); ?></span>
					<?php else : ?>
						<?php $attributes = $product->get_attributes(); ?>
						<?php foreach ( $attributes as $attribute ) : ?>
							<?php $attribute_string = sprintf( '&nbsp;(%s)', $product->get_attribute( $attribute['name'] ) ); ?>
							<span class="attributes"><?php echo esc_html( apply_filters( 'wcopc_attributes', $attribute_string, $attribute, $product ) ); ?></span>
						<?php endforeach; ?>
					<?php endif; ?>
				</td>
				<td class="product-description">
					<?php echo $product->get_short_description(); ?>
				</td>
				<td class="product-price">
					<span itemprop="price" class="price"><?php echo $product->get_price_html(); ?></span>
				</td>
				<td class="product-quantity">
					<?php wc_get_template( 'checkout/add-to-cart/opc.php', array( 'product' => $product ), '', PP_One_Page_Checkout::$template_path ); ?>
				</td>
			</tr>
		<?php endif; ?>
	<?php endforeach; // end of the loop. ?>
</table>

<!-- Accordion for 2-year subscription products -->
<div class="accordion">
	<button class="accordion-toggle">2-Year Subscriptions</button>
	<div class="accordion-content">
		<table class="shop_table" cellspacing="0">
			<?php foreach( $products as $product ) : 
				$product_id = $product->get_id();
			?>
				<?php if ( $product_id == 289595 || $product_id == 289637 ) : ?>
					<!-- Display 2-year subscription products inside the accordion -->
					<tr class="product-item cart <?php if ( wcopc_get_products_prop( $product, 'in_cart' ) ) echo 'selected'; ?>">
						<td class="product-thumbnail">
							<a href="?add-to-cart=<?php echo $product_id; ?>"><?php echo $product->get_image('large'); ?></a>
						</td>
						<td class="product-name">
							<?php echo $product->get_title(); ?>
							<?php if ( $product->is_type( 'variation' ) ) : ?>
								<?php $attribute_string = sprintf( '&nbsp;(%s)', wc_get_formatted_variation( $product->get_variation_attributes(), true ) ); ?>
								<span class="attributes"><?php echo esc_html( apply_filters( 'wcopc_attributes', $attribute_string, $product->get_variation_attributes(), $product ) ); ?></span>
							<?php else : ?>
								<?php $attributes = $product->get_attributes(); ?>
								<?php foreach ( $attributes as $attribute ) : ?>
									<?php $attribute_string = sprintf( '&nbsp;(%s)', $product->get_attribute( $attribute['name'] ) ); ?>
									<span class="attributes"><?php echo esc_html( apply_filters( 'wcopc_attributes', $attribute_string, $attribute, $product ) ); ?></span>
								<?php endforeach; ?>
							<?php endif; ?>
						</td>
						<td class="product-description">
							<?php echo $product->get_short_description(); ?>
						</td>
						<td class="product-price">
							<span itemprop="price" class="price"><?php echo $product->get_price_html(); ?></span>
						</td>
						<td class="product-quantity">
							<?php wc_get_template( 'checkout/add-to-cart/opc.php', array( 'product' => $product ), '', PP_One_Page_Checkout::$template_path ); ?>
						</td>
					</tr>
				<?php endif; ?>
			<?php endforeach; // end of the loop. ?>
		</table>
	</div>
</div>

<!-- Accordion CSS -->
<style>
.accordion {
	margin-top: 20px;
	border: 1px solid #ddd;
	border-radius: 4px;
}

.accordion-toggle {
	width: 100%;
	padding: 10px;
	text-align: left;
	background-color: #f7f7f7;
	border: none;
	cursor: pointer;
	font-size: 16px;
	font-weight: bold;
}

.accordion-toggle:hover {
	background-color: #e0e0e0;
}

.accordion-content {
	display: none;
	padding: 10px;
	background-color: #fff;
}

.accordion-content.active {
	display: block;
}
</style>

<!-- Accordion JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
	const accordionToggle = document.querySelector('.accordion-toggle');
	const accordionContent = document.querySelector('.accordion-content');

	if (accordionToggle && accordionContent) {
		accordionToggle.addEventListener('click', function() {
			accordionContent.classList.toggle('active');
		});
	}
});
</script>