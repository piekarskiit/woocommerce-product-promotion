<?php
/**
 * Styles helper class.
 *
 * @package WooCommerce Product Promotion
 */

namespace PiekarskiIT\App\Helpers;

class Styles {
	/**
	 * @param string[]|string $defaults .
	 * @param string[]|string $classes  .
	 *
	 * @return string
	 */
	public static function classes( $defaults, $classes ) {
		$classes  = is_array( $classes ) ? $classes : explode( ' ', $classes );
		$defaults = is_array( $defaults ) ? $defaults : explode( ' ', $defaults );

		return trim( join( ' ', array_unique( array_merge( $defaults, $classes ) ) ) );
	}
}
