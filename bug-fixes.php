<?php
/*
Plugin Name: maskice.hr WooCommerce Bug Fixes and Improvements
Plugin URI: https://github.com/markoidzan
Description: For private usage
Version: 1.0
Author: Marko Idžan
Author URI: https://idzan.com.hr
*/


function maskice_empty_cart_fix() {
	return get_site_url();
	//Can use any page instead, like return '/sample-page/';
}
add_filter( 'woocommerce_return_to_shop_redirect', 'maskice_empty_cart_fix' );

?>