<?php

if ( ! defined( 'ABSPATH' ) ) { exit; }

const SUB_HEADING_ASSETS_VERSION_8958a847 = '1.0.0';

function register_sub_heading_widget_8958a847( $widgets_manager ) {
    require_once __DIR__ . '/widget-sub-heading.php';
    $widgets_manager->register( new \AngieSnippets\Sub_Heading_8958a847() );
}
add_action( 'elementor/widgets/register', 'register_sub_heading_widget_8958a847' );

function register_sub_heading_assets_8958a847() {
	wp_register_style( 'sub-heading-style-8958a847', angie_cs_get_snippet_asset_url( __FILE__, 'style.css' ), [], SUB_HEADING_ASSETS_VERSION_8958a847 );
}
add_action( 'wp_enqueue_scripts', 'register_sub_heading_assets_8958a847' );