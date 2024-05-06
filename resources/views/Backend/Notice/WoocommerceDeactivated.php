<?php
/**
 * Notice - WooCommerce deactivated.
 *
 * @var string $message
 *
 * @package WooCommerce Product Promotion
 */

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="error">
	<p>
		<?php echo esc_attr( $message ); ?>
	</p>
</div>