<?php

namespace PiekarskiIT\App\Controllers\Frontend;

use Exception;
use PiekarskiIT\App\Helpers\Render;

class BannerController {


	/**
	 * @return void
	 */
	public static function run(): void {
		add_action( 'wp_body_open', [ new self(), 'show_banner' ] );
	}

	/**
	 * Show banner
	 *
	 * @return void
	 * @throws Exception
	 */
	public function show_banner(): void {
		$promote_product_id = get_option( '_promote_product_id' );

		if ( !$promote_product_id ) {
			return;
		}

		$product = wc_get_product( $promote_product_id );

		if ( !$product instanceof \WC_Product ) {
			return;
		}

		if ( $product->get_status() !== 'publish' ) {
			return;
		}

		$promote_product_checkbox_date = get_option( '_promote_product_checkbox_date' );

		if ( 'yes' === $promote_product_checkbox_date ) {
			$zone                          = new \DateTimeZone( wp_timezone_string() );
			$now                           = new \DateTime( 'now', $zone );
			$promote_product_datetime_date = new \DateTime( get_option( '_promote_product_datetime_date' ), $zone );

			if ( $now > $promote_product_datetime_date ) {
				return;
			}
		}

		Render::view(
			'Frontend/Banner/Top',
			[
				'promote_product_url'              => $product->get_permalink(),
				'promote_product_title'            => get_option( '_promote_product_text' ) ?? $product->get_title(),

				'promote_product_text'             => get_option( 'product_promotion_title' ),
				'promote_product_text_color'       => get_option( 'product_promotion_text_color' ),
				'promote_product_background_color' => get_option( 'product_promotion_background_color' ),
			]
		);
	}
}
