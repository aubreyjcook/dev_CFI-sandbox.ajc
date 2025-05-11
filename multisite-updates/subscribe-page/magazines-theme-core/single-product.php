<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header(); 
global $wpdb,$table_prefix;
$blocked_ips = $wpdb->get_results('SELECT ip FROM '.$table_prefix.'lionscripts_ip_address_blocker');
$ip_list = array();
foreach($blocked_ips as $blocked_ip) {
    $ip_list[] .= $blocked_ip->ip;
}

$visitor_ip = $_SERVER['REMOTE_ADDR'];

if(in_array($visitor_ip,$ip_list)) {
    echo '<div class="pt-5 pb-5 px-5">Your IP address has been blocked. Please contact us at <a href="mailto:webhelp@centerforinquiry.org">webhelp@centerforinquiry.org</a> for assistance.</div>';
} else {
?>

    <?php
        /**
         * woocommerce_before_main_content hook.
         *
         * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
         * @hooked woocommerce_breadcrumb - 20
         */
        do_action( 'woocommerce_before_main_content' );
    ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'template-parts/content-products' ); ?>

        <?php endwhile; // end of the loop. ?>

    <?php
        /**
         * woocommerce_after_main_content hook.
         *
         * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
         */
        do_action( 'woocommerce_after_main_content' );
    ?>

    <?php
        /**
         * woocommerce_sidebar hook.
         *
         * @hooked woocommerce_get_sidebar - 10
         */
        //do_action( 'woocommerce_sidebar' );
    ?>

<?php 
}
get_footer();

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
