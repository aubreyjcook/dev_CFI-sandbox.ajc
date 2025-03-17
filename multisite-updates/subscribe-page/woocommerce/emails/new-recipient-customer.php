<?php
/**
 * Recipient customer new account email
 *
 * @package WooCommerce Subscriptions Gifting/Templates/Emails
 * @version 2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<p><?php printf( esc_html__( 'Hi there,', 'woocommerce-subscriptions-gifting' ) ); ?></p>
<p>
<?php
// Translators: 1) is the purchaser's name, 2) is the blog's name.
printf( esc_html__( '%1$s just purchased a subscription for you at %2$s so we\'ve created an account for you for you to read articles online.', 'woocommerce-subscriptions-gifting' ), wp_kses( $subscription_purchaser, wp_kses_allowed_html( 'user_description' ) ), esc_html( $blogname ) );
?>
</p>

<p>
<?php
// Translators: placeholder is a username.
printf( esc_html__( 'Your username is: %s', 'woocommerce-subscriptions-gifting' ), '<strong>' . esc_html( $user_login ) . '</strong>' );
?>
</p>
<p><?php printf( esc_html__( 'Your password has been automatically generated: %s', 'woocommerce-subscriptions-gifting' ), '<strong>' . esc_html( $user_password ) . '</strong>' ); ?></p>
<p><?php printf( __( 'To get started we recommend visiting the site tour so you can learn your way around: <a href="'.esc_url(home_url('')).'/welcome/">'.esc_url(home_url('')).'/welcome/</a>. Then <a href="'.esc_url(home_url('')).'/member-login/">login</a> to enjoy your subscription, and be sure to visit your account area where you can change your username, mailing address, view your orders and subscription info, and change your password.' ) ) ; ?></p>

<?php do_action( 'woocommerce_email_footer', $email ); ?>
≈
