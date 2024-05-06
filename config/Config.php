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
	 */
	public function __construct() {
		CheckRequirements::run();
		ManagePlugin::run();
		Assets::run();
	}
}
