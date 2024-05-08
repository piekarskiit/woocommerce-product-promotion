<?php

namespace PiekarskiIT\Config;

use PiekarskiIT\App\Helpers\Render;

class CheckRequirements {

	/**
	 * Initializes all hooks.
	 *
	 * @return void
	 */
	public static function init_hooks(): void {
		add_action( 'admin_init', [ new self(), 'check_woocommerce_installed' ] );
	}

	/**
	 * Check if WooCommerce is installed.
	 *
	 * @return void
	 */
	public function check_woocommerce_installed(): void {
		if ( is_admin() && current_user_can( 'activate_plugins' ) && !is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
			add_action( 'admin_notices', [ $this, 'woocommerce_notice' ] );

			deactivate_plugins( PluginInfo::get_instance()->get_plugin_file_path() );
		}
	}

	/**
	 * Display a notice if WooCommerce is not installed.
	 *
	 * @return void
	 */
	public function woocommerce_notice(): void {
		Render::view(
			'Backend/Notice/WoocommerceDeactivated',
			[
				'message' => __( 'WooCommerce Product Promotion requires WooCommerce to be installed and active. Please install and activate WooCommerce', 'wpp_translate' ),
			]
		);
	}
}
