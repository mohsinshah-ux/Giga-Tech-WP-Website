<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

const ICON_BUTTON_ASSETS_VERSION_fa685551 = '1.0.0';

function register_icon_button_widget_fa685551( $widgets_manager ) {
    require_once __DIR__ . '/widget-icon-button.php';
    $widgets_manager->register( new \AngieSnippets\Icon_Button_fa685551() );
}
add_action( 'elementor/widgets/register', 'register_icon_button_widget_fa685551' );

function register_icon_button_assets_fa685551() {
	wp_register_style( 'icon-button-style-fa685551', angie_cs_get_snippet_asset_url( __FILE__, 'style.css' ), [], ICON_BUTTON_ASSETS_VERSION_fa685551 );
}
add_action( 'wp_enqueue_scripts', 'register_icon_button_assets_fa685551' );