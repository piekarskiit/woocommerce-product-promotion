<?php
/**
 * Plugin Name: Woocommerce Product Promotion
 * Description: Plugin for WooCommerce.
 * Version: 1.0.0
 * Author: Karol Piekarski
 * Author URI: https://piekarski.it
 * Requires Plugins: woocommerce
 * Text Domain: wpp_translate
 * Domain Path: /languages
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once 'vendor/autoload.php';

PiekarskiIT\Config\PluginInfo::run(__FILE__);
PiekarskiIT\Config\Config::run();
PiekarskiIT\App\App::run();