<?php
/**
 * Config class.
 *
 * @package WooCommerce Product Promotion
 */

namespace PiekarskiIT\Config;

use PiekarskiIT\Config\Assets\Assets;
use PiekarskiIT\Config\ManagePlugin\ManagePlugin;

class Config {

	/**
	 * Config constructor.
	 *
	 * @return void
	 */
	public static function run(): void {
		CheckRequirements::init_hooks();
		ManagePlugin::run();
		Assets::init_hooks();
	}
}
