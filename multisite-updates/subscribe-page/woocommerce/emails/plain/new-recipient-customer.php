<?php
/**
 * Recipient customer new account email
 *
 * @author James Allan
 * @version 2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

echo '= ' . $email_heading . " =\n\n";

echo sprintf( __( 'Hi there,', 'woocommerce-subscriptions-gifting' ) ) . "\n\n";
echo sprintf( __( '%1$s just purchased a subscription for you for %2$s magazine so we\'ve created an account for you to read articles online.', 'woocommerce-subscriptions-gifting' ), esc_html( $subscription_purchaser ), esc_html( $blogname ) ) . "\n\n";

echo sprintf( __( 'Your username is: %s', 'woocommerce-subscriptions-gifting' ), esc_html( $user_login ) ) . "\n";
echo sprintf( __( 'Your password has been automatically generated: %s', 'woocommerce-subscriptions-gifting' ), esc_html( $user_password ) ) . "\n\n";

sprintf( __( 'To get started we recommend visiting the site tour so you can learn your way around: <a href="'.esc_url(home_url('')).'/welcome/">'.esc_url(home_url('')).'/welcome/</a>. Then <a href="'.esc_url(home_url('')).'/member-login/">login</a> to enjoy your digital subscription, and be sure to visit your account area where you can change your username, mailing address, view your orders and subscription info, and change your password.' ) ) . "\n\n";

echo "\n=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=\n\n";

echo apply_filters( 'woocommerce_email_footer_text', get_option( 'woocommerce_email_footer_text' ) );
