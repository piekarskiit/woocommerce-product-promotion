<?php
/**
 * Unstallation plugin.
 *
 * @package WooCommerce Product Promotion
 */

namespace PiekarskiIT\Config\ManagePlugin\Deactivation;

use PiekarskiIT\Config\PluginInfo;

class UninstallPlugin {

	public function __construct() {
		register_uninstall_hook( PluginInfo::get_instance()->get_plugin_file_path(), [ __CLASS__, 'uninstall' ] );
	}

	/**
	 * @return void
	 */
	public static function uninstall(): void {
		delete_option( '_promote_product_id' );
		delete_option( '_promote_product_activate' );
		delete_option( '_promote_product_text' );
		delete_option( '_promote_product_checkbox_date' );
		delete_option( '_promote_product_datetime_date' );
	}
}
