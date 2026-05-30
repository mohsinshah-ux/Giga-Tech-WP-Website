<?php

if ( ! defined( 'ABSPATH' ) ) { exit; }

const DUAL_HEADING_ASSETS_VERSION_6e5b1bf5 = '1.0.0';

function register_dual_heading_widget_6e5b1bf5( $widgets_manager ) {
    require_once __DIR__ . '/widget-dual-heading.php';
    $widgets_manager->register( new \AngieSnippets\Dual_Heading_6e5b1bf5() );
}
add_action( 'elementor/widgets/register', 'register_dual_heading_widget_6e5b1bf5' );

function register_dual_heading_assets_6e5b1bf5() {
	wp_register_style( 'dual-heading-style-6e5b1bf5', angie_cs_get_snippet_asset_url( __FILE__, 'style.css' ), [], DUAL_HEADING_ASSETS_VERSION_6e5b1bf5 );
}
add_action( 'wp_enqueue_scripts', 'register_dual_heading_assets_6e5b1bf5' );
