<?php
/**
 * Plugin Name: AddAttributes
 * Plugin URI: https://www.facebook.com/machaservacristian
 * Description: This plugin add Attribute
 * Version: 1.0.0
 * Author: Cristianv.ms
 * Author URI: https://www.facebook.com/machaservacristian
 * License: GPL2
 */

 function add_attribute_card() {
   global $product;
    echo "<span class='ast-woo-product-category' style='margin-left: 24px;position: absolute;right: 24px;margin-top: 0.2rem;'>" . $product->get_attribute('Level') . "</span>";
 }

add_action('woocommerce_after_shop_loop_item', 'add_attribute_card', 10);
