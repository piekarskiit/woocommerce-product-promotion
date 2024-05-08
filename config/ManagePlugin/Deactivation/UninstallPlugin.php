<?php
/**
 * Unstallation plugin.
 *
 * @package WooCommerce Product Promotion
 */

namespace PiekarskiIT\Config\ManagePlugin\Deactivation;

use PiekarskiIT\Config\PluginInfo;

class UninstallPlugin {

	/**
	 * Run class.
	 *
	 * @return void
	 */
	public static function run(): void {
		register_uninstall_hook( PluginInfo::get_instance()->get_plugin_file_path(), [ self::class, 'uninstall' ] );
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
