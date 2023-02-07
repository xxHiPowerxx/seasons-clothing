<?php 

add_action( 'wp_enqueue_scripts', 'salient_child_enqueue_styles', 100);

function salient_child_enqueue_styles() {
		
		$nectar_theme_version = nectar_get_theme_version();
		wp_enqueue_style( 'salient-child-style', get_stylesheet_directory_uri() . '/style.css', '', $nectar_theme_version );
		
    if ( is_rtl() ) {
   		wp_enqueue_style(  'salient-rtl',  get_template_directory_uri(). '/rtl.css', array(), '1', 'screen' );
		}
}

/**
 * Add a custom field (in an order) to the emails
 */
add_filter( 'woocommerce_email_order_meta_fields', 'seasons_woocommerce_email_order_meta_fields', 10, 3 );

function seasons_woocommerce_email_order_meta_fields( $fields, $sent_to_admin, $order ) {
    $fields['how_did_hear'] = array(
        'label' => __( 'How Did They Hear About Us?' ),
        'value' => get_post_meta( $order->id, 'how_did_hear', true ),
    );
    return $fields;
}

// Change add to cart text on single product page
add_filter( 'woocommerce_product_single_add_to_cart_text', 'seasons_woocommerce_add_to_cart_button_text_single' ); 
function seasons_woocommerce_add_to_cart_button_text() {
    return __( 'Buy Now', 'woocommerce' ); 
}

// Change add to cart text on product archives page
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_add_to_cart_button_text_archives' );
function woocommerce_add_to_cart_button_text_archives() {
    return __( 'Buy Now', 'woocommerce' );
}


?>