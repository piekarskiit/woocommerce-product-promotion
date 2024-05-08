<?php

namespace PiekarskiIT\App\Controllers\Backend;

class WooCommerceSettingsController {

	/**
	 * Initializes all hooks.
	 *
	 * @return void
	 */
	public static function init_hooks(): void {
		add_filter( 'woocommerce_products_general_settings', [ __CLASS__, 'custom_woocommerce_product_settings' ] );
	}

	/**
	 * @param string[][] $settings .
	 *
	 * @return string[][]
	 */
	public static function custom_woocommerce_product_settings( array $settings ): array {
		$settings[] = array(
			'title' => __( 'Product Promotion', 'wpp_translate' ),
			'desc'  => '',
			'type'  => 'title',
		);

		$settings[] = array(
			'title'   => __( 'Title', 'wpp_translate' ),
			'desc'    => __( 'Fill title', 'wpp_translate' ),
			'id'      => 'product_promotion_title',
			'type'    => 'text',
			'css'     => 'min-width:435px;',
			'default' => __( 'FLASH SALE', 'wpp_translate' ),
		);

		$settings[] = array(
			'title'   => __( 'Background color', 'wpp_translate' ),
			'desc'    => __( 'Select background color', 'wpp_translate' ),
			'id'      => 'product_promotion_background_color',
			'type'    => 'color',
			'default' => '#000000',
		);

		$settings[] = array(
			'title'   => __( 'Text color', 'wpp_translate' ),
			'desc'    => __( 'Select text color', 'wpp_translate' ),
			'id'      => 'product_promotion_text_color',
			'type'    => 'color',
			'default' => '#ffffff',
		);

		$promote_product_id = get_option( '_promote_product_id' );

		if ( !empty( $promote_product_id ) ) {
			$product = wc_get_product( $promote_product_id );

			if ( $product instanceof \WC_Product ) {
				$settings[] = array(
					'title' => __( 'Promoted product', 'wpp_translate' ),
					// translators: %s is the url to the product edit page, %s product title.
					'text'  => sprintf( '<a href="%s" target="_blank">%s</a>', admin_url( 'post.php?post=' . $product->get_id() . '&action=edit' ), $product->get_title() ),
					'id'    => 'product_promotion_product',
					'type'  => 'info',
				);
			}
		} else {
			$settings[] = array(
				'title' => __( 'Promoted product', 'wpp_translate' ),
				// translators: %s is the url to the product list.
				'text'  => sprintf( __( 'You are not currently promoting any product. <a href="%s" target="_blank">Click here</a> to go to the product list.', 'wpp_translate' ), admin_url( 'edit.php?post_type=product' ) ),
				'id'    => 'product_promotion_product',
				'type'  => 'info',
			);
		}

		$settings[] = array(
			'type' => 'sectionend',
			'id'   => 'product_promotion_options',
		);

		return $settings;
	}
}
