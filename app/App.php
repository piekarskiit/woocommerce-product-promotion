<?php
/**
 * Initializes all functions divided into backend and frontend.
 *
 * @package WooCommerce Product Promotion
 */

namespace PiekarskiIT\App;

use PiekarskiIT\App\Controllers\Backend\ProductController;
use PiekarskiIT\App\Controllers\Backend\WooCommerceSettingsController;
use PiekarskiIT\App\Controllers\Frontend\BannerController;

class App {

	/**
	 * Initializes all functions divided into backend and frontend.
	 *
	 * @return void
	 */
	public static function run(): void {
		add_action( 'init', [ __CLASS__, 'on_init' ] );
	}

	/**
	 * @return void
	 */
	public function on_init(): void {
		if ( is_admin() ) {
			ProductController::init_hooks();
			WooCommerceSettingsController::init_hooks();
		} else {
			BannerController::init_hooks();
		}
	}
}
