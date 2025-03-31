<?php
// Add GTM code to <head>
if ( !function_exists( 'wpl_gtm_head_code' ) ) {
    function wpl_gtm_head_code(){
    ?>
   <!-- Google Tag Manager MP -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MSVCWJ7');</script>
<!-- End Google Tag Manager -->
    <?php 
    }
    add_action('wp_head', 'wpl_gtm_head_code', 0);
}

// Add GTM <noscript> to <body>
if ( !function_exists( 'wpl_gtm_body_code' ) ) {
    function wpl_gtm_body_code() { 
    ?>
  <!-- Google Tag Manager (noscript) MP -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MSVCWJ7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <?php 
    }
    add_action( 'wp_body_open', 'wpl_gtm_body_code' );
}
