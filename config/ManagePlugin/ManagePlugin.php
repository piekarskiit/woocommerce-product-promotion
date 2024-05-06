<?php
/**
 * Manage plugin config.
 *
 * @package WooCommerce Product Promotion
 */

namespace PiekarskiIT\Config\ManagePlugin;

use PiekarskiIT\Config\ManagePlugin\Deactivation\DeactivationPlugin;

class ManagePlugin {

	/**
	 * Run class.
	 *
	 * @return void
	 */
	public static function run() {
		new DeactivationPlugin();
	}
}
