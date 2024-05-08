<?php

namespace PiekarskiIT\App\Controllers\Backend;

use PiekarskiIT\App\Helpers\Render;
use WC_Product;

class ProductController {
	/**
	 * Initializes all hooks
	 *
	 * @return void
	 */
	public static function init_hooks(): void {
		add_action( 'woocommerce_product_options_pricing', [ __CLASS__, 'custom_woocommerce_product_settings' ] );
		add_action( 'woocommerce_admin_process_product_object', [ __CLASS__, 'save_promotion_data' ] );
	}

	/**
	 * Custom WooCommerce product settings
	 *
	 * @return void
	 */
	public static function custom_woocommerce_product_settings(): void {
		$promote_product_id = get_option( '_promote_product_id' );

		if ( (int) $promote_product_id === get_the_ID() ) {
			$promote_product_activate_value      = get_option( '_promote_product_activate' );
			$promote_product_text_value          = get_option( '_promote_product_text' );
			$promote_product_checkbox_date       = get_option( '_promote_product_checkbox_date' );
			$promote_product_datetime_date_value = get_option( '_promote_product_datetime_date' );
		} else {
			$promote_product_activate_value      = 'no';
			$promote_product_text_value          = false;
			$promote_product_checkbox_date       = 'no';
			$promote_product_datetime_date_value = false;
		}

		Render::view(
			'Backend/Product',
			[
				'promote_product_activate_value'      => $promote_product_activate_value,
				'promote_product_text_value'          => $promote_product_text_value,
				'promote_product_checkbox_date_value' => $promote_product_checkbox_date,
				'promote_product_datetime_date_value' => $promote_product_datetime_date_value,
			]
		);
	}

	/**
	 * Save promotion data
	 *
	 * @param WC_Product $product .
	 *
	 * @return void
	 */
	public static function save_promotion_data( WC_Product $product ): void {

		$data = wp_unslash( $_POST );

		if ( !isset( $data['promote_product_nonce'] ) || !wp_verify_nonce( $data['promote_product_nonce'], 'promote_product_action' ) ) {
			return;
		}

		$promote_product_activate = isset( $data['_promote_product_activate'] ) ? 'yes' : 'no';

		if ( 'yes' === $promote_product_activate ) {
			$promote_product_text          = !empty( $data['_promote_product_text'] ) ? esc_attr( $data['_promote_product_text'] ) : false;
			$promote_product_datetime_date = !empty( $data['_promote_product_datetime_date'] ) ? esc_attr( $data['_promote_product_datetime_date'] ) : false;

			if ( !isset( $data['_promote_product_checkbox_date'] ) ) {
				$promote_product_checkbox_date = 'no';
			} else {
				$promote_product_checkbox_date = 'yes';
			}

			update_option( '_promote_product_id', $product->get_id() );
			update_option( '_promote_product_activate', $promote_product_activate );
			update_option( '_promote_product_text', $promote_product_text );
			update_option( '_promote_product_checkbox_date', $promote_product_checkbox_date );
			update_option( '_promote_product_datetime_date', $promote_product_datetime_date );
		} elseif ( (int) get_option( '_promote_product_id' ) === $product->get_id() ) {
			delete_option( '_promote_product_id' );
			delete_option( '_promote_product_activate' );
			delete_option( '_promote_product_text' );
			delete_option( '_promote_product_checkbox_date' );
			delete_option( '_promote_product_datetime_date' );
		}
	}
}
