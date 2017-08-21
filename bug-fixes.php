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

/*
More functions for expanding Dashboard widget 
*/

function maskice_internal_dashboard () {

	global $wp_meta_boxes;



	wp_add_dashboard_widget('maskice_internal', 'maskice.hr - Korisni linkovi za administratore' , 'maskice_widget_dash_linkovi');

}



function maskice_widget_dash_linkovi () {

	echo '<p>Webmail: <a href="http://mail.maskice.hr">mail.maskice.hr (via Zoho Mail)</a></p><hr>

	<p>Web Chat: <a href="https://maskice.hr/wp-admin/admin.php?page=scx_console">Chat Console</a></p><hr>

	<p>Server Info: <a href="https://sodium.studio4web.com:2083/cpsess4926472052/frontend/paper_lantern/index.html">Server Konzola</a></p>

	<p>Username: opremaza<br>Password: **************</p>';

}



add_action ('wp_dashboard_setup','maskice_internal_dashboard');

/* Some old exntender code */


<?php
/**

 * Add new register fields for WooCommerce registration.

 *

 * @return string Register fields HTML.

 */

function wooc_extra_register_fields() {

    ?>



    <p class="form-row form-row-first">

    <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>

    <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />

    </p>



    <p class="form-row form-row-last">

    <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>

    <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />

    </p>



    <div class="clear"></div>



    <p class="form-row form-row-wide">

    <label for="reg_billing_phone"><?php _e( 'Phone', 'woocommerce' ); ?> <span class="required">*</span></label>

    <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php if ( ! empty( $_POST['billing_phone'] ) ) esc_attr_e( $_POST['billing_phone'] ); ?>" />

    </p>

	

	



    <?php

}



add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );



function wooc_extra_register_fields_checkbox() {

    ?>

	

	



    <?php

}



add_action( 'woocommerce_register_form', 'wooc_extra_register_fields_checkbox' );



/**

 * Validate the extra register fields.

 *

 * @param  string $username          Current username.

 * @param  string $email             Current email.

 * @param  object $validation_errors WP_Error object.

 *

 * @return void

 */

function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {

    if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {

        $validation_errors->add( 'billing_first_name_error', __( 'Molimo unesite Vaše ime!', 'woocommerce' ) );

    }



    if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {

        $validation_errors->add( 'billing_last_name_error', __( 'Molimo unesite Vaše prezime!', 'woocommerce' ) );

    }





    if ( isset( $_POST['billing_phone'] ) && empty( $_POST['billing_phone'] ) ) {

        $validation_errors->add( 'billing_phone_error', __( 'Molimo unesite Vaš broj telefona ili mobitela!', 'woocommerce' ) );

    }

	

	

}



add_action( 'woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3 );



/**

 * Save the extra register fields.

 *

 * @param  int  $customer_id Current customer ID.

 *

 * @return void

 */

function wooc_save_extra_register_fields( $customer_id ) {

    if ( isset( $_POST['billing_first_name'] ) ) {

        // WordPress default first name field.

        update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );



        // WooCommerce billing first name.

        update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );

    }



    if ( isset( $_POST['billing_last_name'] ) ) {

        // WordPress default last name field.

        update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );



        // WooCommerce billing last name.

        update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );

    }



    if ( isset( $_POST['billing_phone'] ) ) {

        // WooCommerce billing phone

        update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );

    }

}



add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );



$digit1 = mt_rand(1,20);

$digit2 = mt_rand(1,20);

if( mt_rand(0,1) === 1 ) {

    $math = "$digit1 + $digit2";

    $_SESSION['answer'] = $digit1 + $digit2;

} else {

    $math = "$digit1 - $digit2";

    $_SESSION['answer'] = $digit1 - $digit2;

}



if ($_SESSION['answer'] == $_POST['answer'] ) {

    // value entered is correct

}

else {

    // value is incorrect, kindly try again

}


?>