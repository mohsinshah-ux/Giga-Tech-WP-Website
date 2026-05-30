<?php

if ( ! defined( 'ABSPATH' ) ) { exit; }

const COMPARISON_WIDGET_ASSETS_VERSION_2c1d9cbb = '2.0.0';

function register_comparison_widget_2c1d9cbb( $widgets_manager ) {
    require_once __DIR__ . '/widget-comparison.php';
    $widgets_manager->register( new \AngieSnippets\Comparison_Widget_2c1d9cbb() );
}
add_action( 'elementor/widgets/register', 'register_comparison_widget_2c1d9cbb' );

function register_comparison_assets_2c1d9cbb() {
    wp_register_style( 'comparison-style-2c1d9cbb', angie_cs_get_snippet_asset_url( __FILE__, 'style.css' ), [], COMPARISON_WIDGET_ASSETS_VERSION_2c1d9cbb );
}
add_action( 'wp_enqueue_scripts', 'register_comparison_assets_2c1d9cbb' );
