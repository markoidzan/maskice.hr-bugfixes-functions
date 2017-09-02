<?php
/*
Plugin Name: maskice.hr WooCommerce Bug Fixes and Improvements
Plugin URI: https://github.com/markoidzan
Description: For private usage
Version: 1.1
Author: Marko Idžan
Author URI: https://idzan.com.hr
*/


function maskice_empty_cart_fix() {
	return get_site_url();
	//Can use any page instead, like return '/sample-page/';
}
add_filter( 'woocommerce_return_to_shop_redirect', 'maskice_empty_cart_fix' );


/* 
 * Remove jquery migrate for enhanced performance
 */
function remove_jquery_migrate_maskice($scripts) {
   if ( is_admin() ) return;
   $scripts->remove( 'jquery' );
   $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
}
add_action( 'wp_default_scripts', 'remove_jquery_migrate_maskice' );

/*

function maskice_kucni_required ($fields) {

	$fields['billing']['billing_address_2']['required'] = true;

	return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'maskice_kucni_required' );



function maskice_woogoogad_billing_address_not_found_label_filter($label)
{
	return 'Adresa nije pronađena?';
}
add_filter('woogoogad_billing_address_not_found_label_filter', 'maskice_woogoogad_billing_address_not_found_label_filter');
*/
?>