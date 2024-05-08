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
	public function __construct() {
		add_action( 'init', [ $this, 'on_init' ], 1 );
	}

	/**
	 * @return void
	 */
	public function on_init(): void {
		if ( is_admin() ) {
			ProductController::run();
			WooCommerceSettingsController::run();
		} else {
			BannerController::run();
		}
	}
}
