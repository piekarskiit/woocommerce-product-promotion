<?php
/**
 * Plugin Name: Woocommerce Product Promotion
 * Description: Plugin for WooCommerce.
 * Version: 1.0.0
 * Author: Karol Piekarski
 * Author URI: https://piekarski.it
 * Requires Plugins: woocommerce
 * Requires at least: 6.2
 * Tested up to: 6.5.2
 * WC requires at least: 8.5
 * WC tested up to: 8.8
 * Text Domain: wpp_translate
 * Domain Path: /languages
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once 'vendor/autoload.php';

PiekarskiIT\Config\PluginInfo::run(__FILE__);
new PiekarskiIT\Config\Config();
new PiekarskiIT\App\App();
