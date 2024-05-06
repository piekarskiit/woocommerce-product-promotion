<?php

namespace PiekarskiIT\App\Controllers\Backend;

class WooCommerceSettingsController
{
    public static function run(): void
    {
        add_action('woocommerce_products_general_settings', [new self(), 'custom_woocommerce_product_settings']);
    }

    public function custom_woocommerce_product_settings($settings)
    {

        $settings[] = array(
            'title' => __('Product Promotion', 'wpp_translate'),
            'desc' => '',
            'type' => 'title',
        );

        $settings[] = array(
            'title' => __('Title', 'wpp_translate'),
            'desc' => __('Fill title', 'wpp_translate'),
            'id' => 'product_promotion_title',
            'type' => 'text',
            'default' => __('FLASH SALE', 'wpp_translate')
        );

        $settings[] = array(
            'title' => __('Background color', 'wpp_translate'),
            'desc' => __('Select background color', 'wpp_translate'),
            'id' => 'product_promotion_background_color',
            'type' => 'color',
            'default' => '#000000'
        );

        $settings[] = array(
            'title' => __('Text color', 'wpp_translate'),
            'desc' => __('Select text color', 'wpp_translate'),
            'id' => 'product_promotion_text_color',
            'type' => 'color',
            'default' => '#ffffff'
        );

        $settings[] = array(
            'type' => 'sectionend',
            'id' => 'product_promotion_options',
        );

        return $settings;
    }
}
