<?php

if ( ! defined( 'ABSPATH' ) ) { exit; }

const CUSTOM_BUTTON_ASSETS_VERSION_d1aeb1d9 = '1.0.2';

function register_custom_button_widget_d1aeb1d9( $widgets_manager ) {
    require_once __DIR__ . '/widget-custom-button.php';
    $widgets_manager->register( new \AngieSnippets\Custom_Button_d1aeb1d9() );
}
add_action( 'elementor/widgets/register', 'register_custom_button_widget_d1aeb1d9' );

function register_custom_button_assets_d1aeb1d9() {
	wp_register_style( 'custom-button-style-d1aeb1d9', angie_cs_get_snippet_asset_url( __FILE__, 'style.css' ), [], CUSTOM_BUTTON_ASSETS_VERSION_d1aeb1d9 );
}
add_action( 'wp_enqueue_scripts', 'register_custom_button_assets_d1aeb1d9' );