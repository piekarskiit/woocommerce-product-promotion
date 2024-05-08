<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use PiekarskiIT\App\Controllers\Backend\WooCommerceSettingsController;

class WooCommerceSettingsControllerTest extends TestCase
{
    public function __construct(string $name)
    {
        parent::__construct($name);

    }

    public function testPassEmptyArray(): void
    {
        $settings = [];
        $custom_woocommerce_product_settings = (new WooCommerceSettingsController)->custom_woocommerce_product_settings($settings);

        $this->assertNotEmpty($custom_woocommerce_product_settings);
    }
}