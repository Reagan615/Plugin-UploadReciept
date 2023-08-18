<?php
/**
 * Customer Rejected Receipt (plain text)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-rejected-receipt-template-plain.php
 *
 * HOWEVER, on occasion we will need to update template files and you
 * (the webmaster/developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @version 1.9.0
 */
# @Last modified by:   amirhp-com <its@amirhp.com>
# @Last modified time: 2022/08/15 16:59:38

defined( 'ABSPATH' ) || exit;
echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=\n";
echo esc_html( wp_strip_all_tags( $email_heading ) );
echo "\n=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=\n\n";
/* translators: %s: Customer billing full name */
$sent_to_admin = false; 
echo sprintf( __( 'The order #%d uploaded receipt has been rejected.', 'receipt-upload' ), $order->get_order_number() ) . "\n\n";
// Adding the custom link
echo sprintf( __( 'Please to upload a receipt again: %s', 'receipt-upload' ), '<a href="https://grocery.dbryge.com/?page_id=12198&preview=true#wpcf7-f12197-p12198-o1">Click here</a>' ) . "\n\n";
do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );
echo "\n----------------------------------------\n\n";
do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );
do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );
echo "\n\n----------------------------------------\n\n";
if ( $additional_content ) {
	echo esc_html( wp_strip_all_tags( wptexturize( $additional_content ) ) );
	echo "\n\n----------------------------------------\n\n";
}
echo wp_kses_post( apply_filters( 'woocommerce_email_footer_text', get_option( 'woocommerce_email_footer_text' ) ) );
