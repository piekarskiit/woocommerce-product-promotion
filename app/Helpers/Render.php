<?php
/**
 * Render views and components class.
 *
 * @package WooCommerce Product Promotion
 */

namespace PiekarskiIT\App\Helpers;

use PiekarskiIT\Config\PluginInfo;

class Render {

	/**
	 * @param string $path    .
	 * @param mixed  $data    .
	 * @param bool   $display .
	 *
	 * @return string
	 */
	public static function view( string $path, mixed $data, bool $display = true ) {
		$path = self::get_path( $path );

		return self::render( $path, $data, $display );
	}

	/**
	 * @param string $path    .
	 * @param mixed  $data    .
	 * @param bool   $display .
	 *
	 * @return string
	 */
	public static function component( string $path, mixed $data, bool $display = true ) {
		$path = self::get_path( $path, true );

		return self::render( $path, $data, $display );
	}

	/**
	 * @param string $path    .
	 * @param mixed  $data    .
	 * @param bool   $display .
	 *
	 * @return string
	 */
	public static function render( string $path, mixed $data, bool $display = false ) {

		if ( file_exists( $path ) ) {
			if ( ! empty( $data ) ) {
				// phpcs:ignore WordPress.PHP.DontExtract.extract_extract
				extract( $data );
			}
			ob_start();
			include $path;
			$output = ob_get_clean();
		}

		if ( empty( $output ) ) {
			$output = esc_attr( __( 'Component not found', 'wpp_translate' ) );
		}

		if ( $display ) {
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			print $output;
		}

		return $output; // phpcs:ignore Universal.CodeAnalysis.ConstructorDestructorReturn.ReturnValueFound
	}

	/**
	 * @param string $path         .
	 * @param bool   $is_component .
	 *
	 * @return string
	 */
	public static function get_path( string $path, bool $is_component = false ) {
		$base = PluginInfo::get_instance()->get_plugin_path() . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;

		if ( $is_component ) {
			return $base . 'Components' . DIRECTORY_SEPARATOR . $path . '.php';
		}

		return $base . $path . '.php';
	}

	/**
	 * @param string[] $attributes .
	 *
	 * @return string
	 */
	public static function build_html_attr( $attributes ) {

		return ' ' . implode(
			' ',
			array_map(
				function ( $attr, $value ) {
					if ( ! $value ) {
						return "";
					}

					return "$attr='$value'";
				},
				array_keys( $attributes ),
				$attributes
			)
		);
	}
}
