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