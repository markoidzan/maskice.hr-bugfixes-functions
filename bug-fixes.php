<?php
/*
Plugin Name: maskice.hr WooCommerce Bug Fixes and Improvements
Plugin URI: https://github.com/markoidzan
Description: For private usage
Version: 1.3
Author: Marko Idžan
Author URI: https://idzan.com.hr
WC requires at least: 3.0.0
WC tested up to: 3.3.4
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

function maskice_remove_query_strings( $src ) {
  if( strpos( $src, '?ver=' ) )
    $src = remove_query_arg( 'ver', $src );
    return $src;
  }
add_filter( 'style_loader_src', 'maskice_remove_query_strings', 10, 2 );
add_filter( 'script_loader_src', 'maskice_remove_query_strings', 10, 2 );


function maskice_remove_script_version( $src ){
  $parts = explode( '?ver', $src );
  return $parts[0];
}
add_filter( 'script_loader_src', 'maskice_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'maskice_remove_script_version', 15, 1 );

add_filter( 'wc_product_has_unique_sku', '__return_false' ); 


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
