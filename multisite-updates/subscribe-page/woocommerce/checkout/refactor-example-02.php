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

<form class="subscription-form" method="post">
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

    <button type="submit" class="button">Subscribe Now</button>
</form>