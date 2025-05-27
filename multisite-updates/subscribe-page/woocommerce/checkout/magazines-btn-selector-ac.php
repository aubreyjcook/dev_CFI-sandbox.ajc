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
    
</form>

<script>
console.log('WP Scripts:', Object.keys(window.wp));
console.log('Subscription Vars:', window.subscription_vars);
</script>