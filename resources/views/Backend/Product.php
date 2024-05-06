<?php
/**
 * Product Settings view.
 *
 * @var string $promote_product_activate_value
 * @var string $promote_product_text_value
 * @var string $promote_product_checkbox_date_value
 * @var string $promote_product_datetime_date_value
 *
 * @package WooCommerce Product Promotion
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

woocommerce_wp_checkbox(
	array(
		'id'          => '_promote_product_activate',
		'value'       => $promote_product_activate_value,
		'data_type'   => 'checkbox',
        'wrapper_class' => 'show_if_simple',
		'label'       => __( 'Promote this product', 'wpp_translate' ),
		'description' => '',
	)
); ?>


<div class="show_if_simple is_hidden" id="promote_product_fields">

	<?php
	woocommerce_wp_text_input(
		array(
			'id'          => '_promote_product_text',
			'value'       => $promote_product_text_value,
			'label'       => __( 'Promote custom text', 'wpp_translate' ),
			'description' => __( 'If you leave it blank - it will fill with the standard title', 'wpp_translate' ),
		)
	);

	woocommerce_wp_checkbox(
		array(
			'id'            => '_promote_product_checkbox_date',
			'value'         => $promote_product_checkbox_date_value,
			'data_type'     => 'checkbox',
			'label'         => __( 'Would you like to set a promotion end date?', 'wpp_translate' ),
			'description'   => '',
		)
	);
	?>
	<div class="show_if_simple is_hidden" id="promote_product_checkbox_date_fields">
		<?php
		woocommerce_wp_text_input(
			array(
				'id'          => '_promote_product_datetime_date',
				'value'       => $promote_product_datetime_date_value,
				'type'        => 'datetime-local',
				'label'       => __( 'Promote to', 'wpp_translate' ),
				'description' => __( 'Enter the date to which the promotion will be active', 'wpp_translate' ),
				'data_type'   => 'promote_product_datetime',
			)
		);
		?>
	</div>

	<?php
		wp_nonce_field( 'promote_product_action', 'promote_product_nonce' );
	?>
</div>