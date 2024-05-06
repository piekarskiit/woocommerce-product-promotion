<?php
/**
 * Plugin info class.
 *
 * @package WooCommerce Product Promotion
 */

namespace PiekarskiIT\Config;

class PluginInfo {


	/**
	 * @var self|null
	 */
	private static $instance;
	/**
	 * @var string
	 */
	private static string $plugin_file;

	/**
	 * @param string $plugin_file .
	 *
	 * @return  PluginInfo
	 */
	public static function run( string $plugin_file ): PluginInfo {
		return self::get_instance( $plugin_file );
	}

	/**
	 * @param string $plugin_file .
	 *
	 * @return self
	 */
	public static function get_instance( string $plugin_file = '' ): self {
		if ( is_null( self::$instance ) ) {
			self::$instance    = new self();
			self::$plugin_file = $plugin_file;
		}

		return self::$instance;
	}

	/**
	 * @return string
	 */
	public function get_plugin_version(): string {
		if ( !function_exists( 'get_plugin_data' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		$plugin_data = get_plugin_data( self::$plugin_file );

		return $plugin_data['Version'];
	}

	/**
	 * @return string
	 */
	public function get_plugin_path(): string {
		return dirname( self::$plugin_file );
	}

	/**
	 * @return string
	 */
	public function get_plugin_file_path(): string {
		return self::$plugin_file;
	}

	/**
	 * @return string
	 */
	public function get_plugin_assets_url(): string {
		return plugin_dir_url( self::$plugin_file );
	}
}
