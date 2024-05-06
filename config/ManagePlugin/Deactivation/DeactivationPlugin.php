<?php
/**
 * Deactivation plugin.
 *
 * @package WooCommerce Product Promotion
 */

namespace PiekarskiIT\Config\ManagePlugin\Deactivation;

use PiekarskiIT\Config\PluginInfo;

class DeactivationPlugin {
	public function __construct() {
		register_deactivation_hook( PluginInfo::get_instance()->get_plugin_file_path(), [ $this, 'deactivation' ] );
	}

	/**
	 * @return void
	 */
	public function deactivation() {
		do_action( 'pw_deactivated_plugin' );
	}
}
