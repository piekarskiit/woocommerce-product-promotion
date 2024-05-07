<?php
/**
 * Top banner each pages view.
 *
 * @var string $promote_product_url
 * @var string $promote_product_title
 * @var string $promote_product_text
 * @var string $promote_product_text_color
 * @var string $promote_product_background_color
 *
 * @package WooCommerce Product Promotion
 */

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

?>

<a href="<?php echo esc_url( $promote_product_url ); ?>"
	class="wpp__top-banner-wrapper"
	style="--wpp-bg-color: <?php echo esc_attr( $promote_product_background_color ); ?>;--wpp-color: <?php echo esc_attr( $promote_product_text_color ); ?>"
>
	<span class="wpp__top-banner">
		<?php printf( "%s: %s", esc_attr( $promote_product_text ), esc_attr( $promote_product_title ) ); ?>
	</span>
</a>
