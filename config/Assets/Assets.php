<?php
/**
 * Assets config.
 *
 * @package WooCommerce Product Promotion
 */

namespace PiekarskiIT\Config\Assets;

use PiekarskiIT\Config\PluginInfo;

class Assets {


	/**
	 * Run class.
	 *
	 * @return void
	 */
	public static function run(): void {
		add_action( 'wp_enqueue_scripts', [ new self(), 'scripts' ] );
		add_action( 'admin_enqueue_scripts', [ new self(), 'admin_scripts' ] );
	}

	/**
	 * Enqueue scripts and styles.
	 *
	 * @return void
	 */
	public function scripts(): void {
		if ( is_admin() ) {
			return;
		}

		wp_enqueue_style( 'wpp-styles', PluginInfo::get_instance()->get_plugin_assets_url() . '/public/assets/css/frontend.css', [], PluginInfo::get_instance()->get_plugin_version() );
		wp_enqueue_script( 'wpp-scripts', PluginInfo::get_instance()->get_plugin_assets_url() . '/public/assets/js/frontend.js', [ 'jquery' ], PluginInfo::get_instance()->get_plugin_version(), true );
	}

	/**
	 * Enqueue admin scripts and styles.
	 *
	 * @return void
	 */
	public function admin_scripts(): void {
		if ( !is_admin() ) {
			return;
		}

		wp_enqueue_style( 'wpp-backend-styles', PluginInfo::get_instance()->get_plugin_assets_url() . '/public/assets/css/backend.css', [], PluginInfo::get_instance()->get_plugin_version() );
		wp_enqueue_script( 'wpp-backend-scripts', PluginInfo::get_instance()->get_plugin_assets_url() . '/public/assets/js/backend.js', [], PluginInfo::get_instance()->get_plugin_version(), true );
	}
}
