<?php

/**
 * Plugin Name: ButtonGetAQuote
 * Plugin URI: https://www.facebook.com/machaservacristian
 * Description: This plugin injects Javascript
 * Version: 1.0.0
 * Author: Cristianv.ms
 * Author URI: https://www.facebook.com/machaservacristian
 * License: GPL2
 */

add_action('wp_footer', function () { ?>
    <script>
        function getCart(url) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function(response) {
                if (xhr.readyState === 4) {
                    window.open(`${url}/cart?data=${xhr.responseText}`);
                }
            }

            xhr.open('POST', 'https://www.rcr-flooring.com/wp-admin/admin-ajax.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
            xhr.send('action=getcartajx');
        }

        const button = document.createElement('button');
        button.type = 'button';
        button.innerText = 'GET A QUOTE';
        button.setAttribute('onclick', "getCart('https://rcr-cart.web.app')");

        const divRenderBtn = document.getElementsByClassName('vi-wcaio-sidebar-cart-footer-products')[0].appendChild(button);
    </script>
<?php }, 9999); ?>