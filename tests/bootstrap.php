<?php
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/../../../wordpress/');
    require_once ABSPATH . 'wp-load.php';
    require_once ABSPATH . 'wp-config.php';
    require_once ABSPATH . 'wp-settings.php';
}

function _check_for_dependencies() {
    if (!is_plugin_active('some-plugin/some-plugin.php')) {
        exit('Some Plugin must be active to run the tests.' . PHP_EOL);
    }
}
tests_add_filter('plugins_loaded', '_check_for_dependencies');
putenv('WP_ENVIRONMENT_TYPE=test');


require_once 'vendor/autoload.php';
