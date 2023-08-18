<?php
/**
 * Customer Rejected Receipt
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-rejected-receipt-template.php
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
# @Last modified time: 2022/08/15 16:59:22

if ( ! defined( 'ABSPATH' ) ) {exit;}
do_action( 'woocommerce_email_header', $email_heading, $email );
echo "<p>" . sprintf( __( 'The order #%d uploaded receipt has been rejected.', 'receipt-upload' ), $order->get_order_number() ) . "</p>";
// Adding the custom link
echo sprintf( __( 'Please to upload a receipt again: %s', 'receipt-upload' ), '<a href="https://grocery.dbryge.com/?page_id=12198&preview=true#wpcf7-f12197-p12198-o1">Click here</a>' ) . "\n\n";
$sent_to_admin = false; 
if ( $additional_content ) { echo wp_kses_post( wpautop( wptexturize( $additional_content ) ) ); }
echo do_shortcode( "[receipt-preview email='yes' order_id={$order->get_id()}]");
do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );
do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );
do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );
do_action( 'woocommerce_email_footer', $email );
