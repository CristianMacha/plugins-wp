<?php
/**
 * Plugin Name: GetCartItems
 * Plugin URI: https://www.facebook.com/machaservacristian
 * Description: This plugin injects Javascript
 * Version: 1.0.0
 * Author: Cristianv.ms
 * Author URI: https://www.facebook.com/machaservacristian
 * License: GPL2
 */

add_action('wp_ajax_getcartajx', 'get_data_cart_ajax');
add_action('wp_ajax_nopriv_getcartajx', 'get_data_cart_ajax');

function get_data_cart_ajax()
{
    $cart = WC()->cart->get_cart();
    $products = array();
    foreach ($cart as $cart_item_key => $cart_item) {
        $product = $cart_item['data'];
        $product_id = $cart_item['product_id'];
        $quantity = $cart_item['quantity'];
        $image_id = $product->get_image_id();

        $productItem = new stdClass();
        $productItem->name = $product->name;
        $productItem->key = $cart_item['key'];
        $productItem->image = wp_get_attachment_image_url($image_id, 'large');
        $productItem->material = $cart_item['variation']['attribute_pa_material'];
        $productItem->tile = $cart_item['variation']['attribute_pa_custom-tile'];
        $productItem->quantity = $quantity;
        array_push($products, $productItem);
    }

    $json = json_encode($products);
    echo $json;
    wp_die();
}
