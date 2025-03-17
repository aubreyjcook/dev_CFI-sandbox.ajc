<?php
/**
 * Customer new account email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/plain/customer-new-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails\Plain
 * @version 6.0.0
 */

defined( 'ABSPATH' ) || exit;

echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=\n";
echo esc_html( wp_strip_all_tags( $email_heading ) );
echo "\n=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=\n\n";

/* translators: %s: Customer username */
echo sprintf( esc_html__( 'Hi %s,', 'woocommerce' ), esc_html( $user_login ) ) . "\n\n";
/* translators: %1$s: Site title, %2$s: Username, %3$s: My account link */
echo sprintf( esc_html__( 'An account was just created for you on the %1$s website. If you are a print or digital subscriber, you may begin your subscription online now! You have full access to the current issue and archives by logging in. Your username to login is %2$s.', 'woocommerce' ), esc_html( $blogname ), esc_html( $user_login ) ) . "\n\n";

if ( 'yes' === get_option( 'woocommerce_registration_generate_password' ) && $password_generated ) {
	/* translators: %s Auto generated password */
	echo sprintf( esc_html__( 'Your password has been automatically generated: %s.', 'woocommerce' ), esc_html( $user_pass ) ) . "\n\n";
}

echo sprintf( esc_html__( 'To get started we recommend visiting the site tour so you can learn your way around: <a href="'.esc_url(home_url('')).'/welcome/">'.esc_url(home_url('')).'/welcome/</a>. Then <a href="'.esc_url(home_url('')).'/member-login/">login</a> to enjoy your subscription, and be sure to visit your account area where you can change your mailing address, view your orders and subscription info, and change your password.', 'woocommerce' ) ) . "\n\n";

echo sprintf( esc_html__( 'We look forward to seeing you soon.', 'woocommerce' ) ) . "\n\n";

echo "\n\n----------------------------------------\n\n";

/**
 * Show user-defined additional content - this is set in each email's settings.
 */
if ( $additional_content ) {
	echo esc_html( wp_strip_all_tags( wptexturize( $additional_content ) ) );
	echo "\n\n----------------------------------------\n\n";
}

echo wp_kses_post( apply_filters( 'woocommerce_email_footer_text', get_option( 'woocommerce_email_footer_text' ) ) );
