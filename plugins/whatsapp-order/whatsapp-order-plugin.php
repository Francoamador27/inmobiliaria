
<?php
/*
Plugin Name: WhatsApp Order Plugin
Description: A plugin to add a WhatsApp button to WooCommerce order details.
Version: 1.0
Author: Tu Nombre
*/
function add_whatsapp_button_to_order_received($order_id) {
    if ( is_order_received_page() ) {
        $order_id = absint( get_query_var( 'order-received' ) );
        $order= wc_get_order( $order_id );
        $products = $order->get_items();
        $total_amount = $order->get_total();
		$first_name = $order->get_billing_first_name();
		$last_name = $order->get_billing_last_name();
		$address = $order->get_billing_address_1();
		$city = $order->get_billing_city();
		$state = $order->get_billing_state();
		$postcode = $order->get_billing_postcode();
		$shipping_method = $order->get_shipping_method();
		$shipping_price = $order->get_shipping_total();



        
        echo '<h1>No te olvides de enviar tu pedido por whatsapp</h1><a id="enviar-whatsapp" class="button alt" href="' . get_whatsapp_url( $products, $total_amount,$first_name,$address,$postcode,$city,$shipping_method,$last_name,$shipping_price ) . '">Enviar mi pedido por WhatsApp</a>';
    }
}
add_action( 'woocommerce_order_details_before_order_table', 'add_whatsapp_button_to_order_received' );

function get_whatsapp_url( $products, $total_amount,$first_name,$address,$postcode,$city,$shipping_method,$last_name,$shipping_price ) {
   $message = "¡Hola! Mi pedido tiene los siguientes detalles:%0A";
	
	$message = "Lista de Productos: %0A";

    
    foreach ( $products as $product ) {
        $productName = $product->get_name();
         $productObject = $product->get_product();
		$productDescription = $product->get_product()->get_short_description(); // Nueva línea
        $productQuantity = $product->get_quantity(); // Nueva línea
        $productSubtotal = wc_price( $product->get_subtotal() ); // Nueva línea
        $productPrice = $productObject->get_price();
        $subTotal = $productPrice * $productQuantity;
        $message .= "Producto Nombre: " . $productName . "%0A";
        $message .= "Descripción: " . $productDescription . "%0A"; // Nueva línea
        $message .= "Precio: $ " . $productPrice . "%0A"; // Nueva línea
        $message .= "Cantidad: " . $productQuantity . "%0A"; // Nueva línea
        $message .= "SubTotal: " . $subTotal . "%0A"; // Nueva línea

        $message .= "%0A";

    }
    


    $message .= "%0A Cliente: " . $first_name . " " . $last_name . "\n";
    $message .= "%0A Dirección: " . $address . "\n";
    $message .= "%0A Ciudad: " . $city . "\n";
    $message .= "%0A Código Postal: " . $postcode . "\n\n";
    $message .= "%0A Método de envío: " . $shipping_method . "\n\n";
    $message .= "%0A Precio de envío: " . $shipping_price . "\n\n";
    $message .= "%0A Precio total: $" . $total_amount . "\n\n";
    
    $encodedMessage = $message ;
    $whatsappURL = "https://api.whatsapp.com/send?phone=5493513295504&text={$message}";
    
    return $whatsappURL;
}?>